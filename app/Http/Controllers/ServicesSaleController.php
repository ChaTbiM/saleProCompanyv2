<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use Auth;

use App\Sale;
use App\ServicesSale;
use App\Tax;
use App\PosSetting;
use App\Payment;
use App\Account;
use App\Coupon;
use App\GiftCard;
use App\PaymentWithCheque;
use App\PaymentWithGiftCard;
use App\PaymentWithCreditCard;
use App\Employee;
use App\Customer;
use App\Service;
use Stripe\Stripe;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Unit;

class ServicesSaleController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        if ($data['pos']) {
            $data['reference_no'] = 'posr-' . date("Ymd") . '-' . date("his");
            $balance = $data['grand_total'] - $data['paid_amount'];
            if ($balance > 0 || $balance < 0) {
                $data['payment_status'] = 2;
            } else {
                $data['payment_status'] = 4;
            }

            if ($data['draft']) {
                $lims_sale_data = Sale::find($data['sale_id']);
                $lims_product_sale_data = ServicesSale::where('sale_id', $data['sale_id'])->get();
                foreach ($lims_product_sale_data as $product_sale_data) {
                    $product_sale_data->delete();
                }
                $lims_sale_data->delete();
            }
        } else {
            $data['reference_no'] = 'sr-' . date("Ymd") . '-' . date("his");
        }




        $document = $request->document;
        if ($document) {
            $v = Validator::make(
                [
                    'extension' => strtolower($request->document->getClientOriginalExtension()),
                ],
                [
                    'extension' => 'in:jpg,jpeg,png,gif,pdf,csv,docx,xlsx,txt',
                ]
            );
            if ($v->fails()) {
                return redirect()->back()->withErrors($v->errors());
            }

            $documentName = $document->getClientOriginalName();
            $document->move('public/sale/documents', $documentName);
            $data['document'] = $documentName;
        }
        if ($data['coupon_active']) {
            $lims_coupon_data = Coupon::find($data['coupon_id']);
            $lims_coupon_data->used += 1;
            $lims_coupon_data->save();
        }

        if ($data['salesman_id']) {
            $data['salesman_name'] = Employee::find($data['salesman_id'])->name;
        }


        $lims_sale_data = Sale::create($data);
        $lims_customer_data = Customer::find($data['customer_id']);
        //collecting male data
        $mail_data['email'] = $lims_customer_data->email;
        $mail_data['reference_no'] = $lims_sale_data->reference_no;
        $mail_data['sale_status'] = $lims_sale_data->sale_status;
        $mail_data['payment_status'] = $lims_sale_data->payment_status;
        $mail_data['total_qty'] = $lims_sale_data->total_qty;
        $mail_data['total_price'] = $lims_sale_data->total_price;
        $mail_data['order_tax'] = $lims_sale_data->order_tax;
        $mail_data['order_tax_rate'] = $lims_sale_data->order_tax_rate;
        $mail_data['order_discount'] = $lims_sale_data->order_discount;
        $mail_data['shipping_cost'] = $lims_sale_data->shipping_cost;
        $mail_data['grand_total'] = $lims_sale_data->grand_total;
        $mail_data['paid_amount'] = $lims_sale_data->paid_amount;

        $product_id = $data['product_id'];
        $product_code = $data['product_code'];
        $qty = $data['qty'];
        $sale_unit = $data['sale_unit'];
        $net_unit_price = $data['net_unit_price'];
        $discount = $data['discount'];
        $tax_rate = $data['tax_rate'];
        $tax = $data['tax'];
        $total = $data['subtotal'];
        $product_sale = [];

        foreach ($product_id as $i => $id) {
            $lims_product_data = Product::where('id', $id)->first();
            $product_sale['variant_id'] = null;
            if ($lims_product_data->type == 'combo' && $data['sale_status'] == 1) {
                $product_list = explode(",", $lims_product_data->product_list);
                $qty_list = explode(",", $lims_product_data->qty_list);
                $price_list = explode(",", $lims_product_data->price_list);

                foreach ($product_list as $key => $child_id) {
                    $child_data = Product::find($child_id);
                    $child_warehouse_data = Product_Warehouse::where([
                        ['product_id', $child_id],
                        ['warehouse_id', $data['warehouse_id']],
                    ])->first();

                    $child_data->qty -= $qty[$i] * $qty_list[$key];
                    $child_warehouse_data->qty -= $qty[$i] * $qty_list[$key];

                    $child_data->save();
                    $child_warehouse_data->save();
                }
            }

            if ($sale_unit[$i] != 'n/a') {
                $lims_sale_unit_data  = Unit::where('unit_name', $sale_unit[$i])->first();
                $sale_unit_id = $lims_sale_unit_data->id;
                if ($lims_product_data->is_variant) {
                    $lims_product_variant_data = ProductVariant::select('id', 'variant_id', 'qty')->FindExactProductWithCode($id, $product_code[$i])->first();
                    $product_sale['variant_id'] = $lims_product_variant_data->variant_id;
                }

                if ($data['sale_status'] == 1) {
                    if ($lims_sale_unit_data->operator == '*') {
                        $quantity = $qty[$i] * $lims_sale_unit_data->operation_value;
                    } elseif ($lims_sale_unit_data->operator == '/') {
                        $quantity = $qty[$i] / $lims_sale_unit_data->operation_value;
                    }
                    //deduct quantity
                    $lims_product_data->qty = $lims_product_data->qty - $quantity;
                    $lims_product_data->save();
                    //deduct product variant quantity if exist
                    if ($lims_product_data->is_variant) {
                        $lims_product_variant_data->qty -= $quantity;
                        $lims_product_variant_data->save();
                        $lims_product_warehouse_data = Product_Warehouse::FindProductWithVariant($id, $lims_product_variant_data->variant_id, $data['warehouse_id'])->first();
                    } else {
                        $lims_product_warehouse_data = Product_Warehouse::FindProductWithoutVariant($id, $data['warehouse_id'])->first();
                    }
                    //deduct quantity from warehouse
                    $lims_product_warehouse_data->qty -= $quantity;
                    $lims_product_warehouse_data->save();
                }
            } else {
                $sale_unit_id = 0;
            }
            if ($product_sale['variant_id']) {
                $variant_data = Variant::select('name')->find($product_sale['variant_id']);
                $mail_data['products'][$i] = $lims_product_data->name . ' [' . $variant_data->name . ']';
            } else {
                $mail_data['products'][$i] = $lims_product_data->name;
            }
            if ($lims_product_data->type == 'digital') {
                $mail_data['file'][$i] = url('/public/product/files') . '/' . $lims_product_data->file;
            } else {
                $mail_data['file'][$i] = '';
            }
            if ($sale_unit_id) {
                $mail_data['unit'][$i] = $lims_sale_unit_data->unit_code;
            } else {
                $mail_data['unit'][$i] = '';
            }

            $product_sale['sale_id'] = $lims_sale_data->id;
            $product_sale['product_id'] = $id;
            $product_sale['qty'] = $mail_data['qty'][$i] = $qty[$i];
            $product_sale['sale_unit_id'] = $sale_unit_id;
            $product_sale['net_unit_price'] = $net_unit_price[$i];
            $product_sale['discount'] = $discount[$i];
            $product_sale['tax_rate'] = $tax_rate[$i];
            $product_sale['tax'] = $tax[$i];
            $product_sale['total'] = $mail_data['total'][$i] = $total[$i];
            Product_Sale::create($product_sale);
        }
        if ($data['sale_status'] == 3) {
            $message = 'Sale successfully added to draft';
        } else {
            $message = ' Sale created successfully';
        }
        if ($mail_data['email'] && $data['sale_status'] == 1) {
            try {
                Mail::send('mail.sale_details', $mail_data, function ($message) use ($mail_data) {
                    $message->to($mail_data['email'])->subject('Sale Details');
                });
            } catch (\Exception $e) {
                $message = ' Sale created successfully. Please setup your <a href="setting/mail_setting">mail setting</a> to send mail.';
            }
        }

        if ($data['payment_status'] == 3 || $data['payment_status'] == 4 || ($data['payment_status'] == 2 && $data['pos'] && $data['paid_amount'] > 0)) {
            if ($data['paid_by_id'] == 1) {
                $paying_method = 'Cash';
            } elseif ($data['paid_by_id'] == 2) {
                $paying_method = 'Gift Card';
            } elseif ($data['paid_by_id'] == 3) {
                $paying_method = 'Credit Card';
            } elseif ($data['paid_by_id'] == 4) {
                $paying_method = 'Cheque';
            } elseif ($data['paid_by_id'] == 5) {
                $paying_method = 'Paypal';
            } else {
                $paying_method = 'Deposit';
            }

            $lims_payment_data = new Payment();
            $lims_payment_data->user_id = Auth::id();
            $lims_account_data = Account::where('is_default', true)->first();
            $lims_payment_data->account_id = $lims_account_data->id;
            $lims_payment_data->sale_id = $lims_sale_data->id;
            $data['payment_reference'] = 'spr-' . date("Ymd") . '-' . date("his");
            $lims_payment_data->payment_reference = $data['payment_reference'];
            $lims_payment_data->amount = $data['paid_amount'];
            $lims_payment_data->change = $data['paying_amount'] - $data['paid_amount'];
            $lims_payment_data->paying_method = $paying_method;
            $lims_payment_data->payment_note = $data['payment_note'];
            $lims_payment_data->save();

            $lims_payment_data = Payment::latest()->first();
            $data['payment_id'] = $lims_payment_data->id;
            if ($paying_method == 'Credit Card') {
                $lims_pos_setting_data = PosSetting::latest()->first();
                Stripe::setApiKey($lims_pos_setting_data->stripe_secret_key);
                $token = $data['stripeToken'];
                $grand_total = $data['grand_total'];

                $lims_payment_with_credit_card_data = PaymentWithCreditCard::where('customer_id', $data['customer_id'])->first();

                if (!$lims_payment_with_credit_card_data) {
                    // Create a Customer:
                    $customer = \Stripe\Customer::create([
                        'source' => $token
                    ]);

                    // Charge the Customer instead of the card:
                    $charge = \Stripe\Charge::create([
                        'amount' => $grand_total * 100,
                        'currency' => 'usd',
                        'customer' => $customer->id
                    ]);
                    $data['customer_stripe_id'] = $customer->id;
                } else {
                    $customer_id =
                        $lims_payment_with_credit_card_data->customer_stripe_id;

                    $charge = \Stripe\Charge::create([
                        'amount' => $grand_total * 100,
                        'currency' => 'usd',
                        'customer' => $customer_id, // Previously stored, then retrieved
                    ]);
                    $data['customer_stripe_id'] = $customer_id;
                }
                $data['charge_id'] = $charge->id;
                PaymentWithCreditCard::create($data);
            } elseif ($paying_method == 'Gift Card') {
                $lims_gift_card_data = GiftCard::find($data['gift_card_id']);
                $lims_gift_card_data->expense += $data['paid_amount'];
                $lims_gift_card_data->save();
                PaymentWithGiftCard::create($data);
            } elseif ($paying_method == 'Cheque') {
                PaymentWithCheque::create($data);
            } elseif ($paying_method == 'Paypal') {
                $provider = new ExpressCheckout;
                $paypal_data = [];
                $paypal_data['items'] = [];
                foreach ($data['product_id'] as $key => $product_id) {
                    $lims_product_data = Product::find($product_id);
                    $paypal_data['items'][] = [
                        'name' => $lims_product_data->name,
                        'price' => ($data['subtotal'][$key] / $data['qty'][$key]),
                        'qty' => $data['qty'][$key]
                    ];
                }
                $paypal_data['items'][] = [
                    'name' => 'Order Tax',
                    'price' => $data['order_tax'],
                    'qty' => 1
                ];
                $paypal_data['items'][] = [
                    'name' => 'Order Discount',
                    'price' => $data['order_discount'] * (-1),
                    'qty' => 1
                ];
                $paypal_data['items'][] = [
                    'name' => 'Shipping Cost',
                    'price' => $data['shipping_cost'],
                    'qty' => 1
                ];
                if ($data['grand_total'] != $data['paid_amount']) {
                    $paypal_data['items'][] = [
                        'name' => 'Due',
                        'price' => ($data['grand_total'] - $data['paid_amount']) * (-1),
                        'qty' => 1
                    ];
                }
                //return $paypal_data;
                $paypal_data['invoice_id'] = $lims_sale_data->reference_no;
                $paypal_data['invoice_description'] = "Reference # {$paypal_data['invoice_id']} Invoice";
                $paypal_data['return_url'] = url('/sale/paypalSuccess');
                $paypal_data['cancel_url'] = url('/sale/create');

                $total = 0;
                foreach ($paypal_data['items'] as $item) {
                    $total += $item['price'] * $item['qty'];
                }

                $paypal_data['total'] = $total;
                $response = $provider->setExpressCheckout($paypal_data);
                // This will redirect user to PayPal
                return redirect($response['paypal_link']);
            } elseif ($paying_method == 'Deposit') {
                $lims_customer_data = Customer::find($data['customer_id']);
                $lims_customer_data->expense += $data['paid_amount'];
                $lims_customer_data->save();
            }
        }
        if ($lims_sale_data->sale_status == '1') {
            return redirect('sales/gen_invoice/' . $lims_sale_data->id)->with('message', $message);
        } elseif ($data['pos']) {
            return redirect('pos')->with('message', $message);
        } else {
            return redirect('sales')->with('message', $message);
        }
    }
}
