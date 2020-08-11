@extends('layout.main') @section('content')
@if(session()->has('message'))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
        aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif
@if(session()->has('not_permitted'))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
        aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @php
                    $company_id = Auth::user()->company_id();
                    $hasServiceModule = DB::connection("mysql_base")->select('select * from companies_modules where
                    (company_id,module_id) = (?,?)',[$company_id,12]);
                    @endphp
                    @if (!empty($hasServiceModule))
                    <div class="card-header  d-flex flex-column justify-content-center align-items-start pb-0">
                        <h4>{{trans('file.Import Sale')}}</h4>

                        <div class="mt-2">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input form_type" id="is_product" type="radio" name="form_type"
                                    id="product_radio" value="product" checked>
                                <label class="form-check-label " for="inlineRadio1">product</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input form_type" id="is_service" type="radio" name="form_type"
                                    id="service_radio" value="service">
                                <label class="form-check-label" for="inlineRadio2">service</label>
                            </div>
                        </div>

                    </div>
                    @endif

                    <div class="card-body">
                        <p class="italic">
                            <small>{{trans('file.The field labels marked with * are required input fields')}}.</small>
                        </p>
                        {!! Form::open(['route' => 'sale.import', 'method' => 'post', 'files' => true, 'class' =>
                        'payment-form']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{trans('file.customer')}} *</label>
                                            <select required name="customer_id" class="selectpicker form-control"
                                                data-live-search="true" id="customer-id" data-live-search-style="begins"
                                                title="Select customer...">
                                                @foreach($lims_customer_list as $customer)
                                                <option value="{{$customer->id}}">
                                                    {{$customer->name . ' (' . $customer->phone_number . ')'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 warehouse_select">
                                        <div class="form-group">
                                            <label>{{trans('file.Warehouse')}} *</label>
                                            <select required name="warehouse_id" id="warehouse_id"
                                                class="selectpicker form-control" data-live-search="true"
                                                data-live-search-style="begins" title="Select warehouse...">
                                                @foreach($lims_warehouse_list as $warehouse)
                                                <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 biller_select">
                                        <div class="form-group">
                                            <label>{{trans('file.Biller')}} *</label>
                                            <select required name="biller_id" id="biller_id"
                                                class="selectpicker form-control" data-live-search="true"
                                                data-live-search-style="begins" title="Select Biller...">
                                                @foreach($lims_biller_list as $biller)
                                                <option value="{{$biller->id}}">
                                                    {{$biller->name . ' (' . $biller->company_name . ')'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                   
                                    {{--  --}}
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>{{trans('file.salesman')}} *</label>
                                        <select required name="salesman_id" class="selectpicker form-control"
                                            data-live-search="true" data-live-search-style="begins"
                                            title="Select Salesman...">
                                            @foreach($lims_seller_list as $seller)
                                            <option value="{{$seller->id}}">{{$seller->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('file.Upload CSV File')}} *</label>
                                            <input type="file" name="file" class="form-control" required />
                                            <p id="columns_order">{{trans('file.The correct column order is')}}
                                                (product_code, quantity, sale_unit, product_price, discount, tax_name)
                                                {{trans('file.and you must follow this')}}.
                                                {{trans('file.For Digital product sale_unit will be n/a')}}.
                                                {{trans('file.All columns are required')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label></label><br>
                                            <a download id="download_csv"
                                                href="../public/sample_file/sample_sale_products.csv"
                                                class="btn btn-primary btn-block btn-lg"><i
                                                    class="dripicons-download"></i>
                                                {{trans('file.Download Sample File')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="total_qty" value="0" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="total_discount" value="0" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="total_tax" value="0" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="total_price" value="0" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="item" value="0" />
                                            <input type="hidden" name="order_tax" value="0" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="grand_total" value="0" />
                                            <input type="hidden" name="paid_amount" value="0.00" />
                                            <input type="hidden" name="payment_status" value="2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{trans('file.Order Tax')}}</label>
                                            <select class="form-control" name="order_tax_rate">
                                                <option value="0">No Tax</option>
                                                @foreach($lims_tax_list as $tax)
                                                <option value="{{$tax->rate}}">{{$tax->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                <strong>{{trans('file.Order Discount')}}</strong>
                                            </label>
                                            <input type="number" name="order_discount" class="form-control"
                                                step="any" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                <strong>{{trans('file.Shipping Cost')}}</strong>
                                            </label>
                                            <input type="number" name="shipping_cost" class="form-control" step="any" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{trans('file.Attach Document')}}</label>
                                            <i class="dripicons-question" data-toggle="tooltip"
                                                title="Only jpg, jpeg, png, gif, pdf, csv, docx, xlsx and txt file is supported"></i>
                                            <input type="file" name="document" class="form-control" />
                                            @if($errors->has('extension'))
                                            <span>
                                                <strong>{{ $errors->first('extension') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{trans('file.Sale Status')}} *</label>
                                            <select name="sale_status" class="form-control">
                                                <option value="1">{{trans('file.Completed')}}</option>
                                                <option value="2">{{trans('file.Pending')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('file.Sale Note')}}</label>
                                            <textarea rows="5" class="form-control" name="sale_note"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('file.Staff Note')}}</label>
                                            <textarea rows="5" class="form-control" name="staff_note"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary"
                                        id="submit-button">
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $("ul#sale").siblings('a').attr('aria-expanded','true');
    $("ul#sale").addClass("show");
    $("ul#sale #sale-import-menu").addClass("active");


    paymentForm = $('.payment-form');
    
    let columnsOrderTextProduct = "{{trans('file.The correct column order is')}} (product_code, quantity, sale_unit, product_price, discount, tax_name) {{trans('file.and you must follow this')}}. {{trans('file.For Digital product sale_unit will be n/a')}}. {{trans('file.All columns are required')}}"
    
    let columnsOrderTextService = "{{trans('file.The correct column order is')}} (service_code, quantity, sale_unit, service_price, discount, tax_name) {{trans('file.and you must follow this')}}."

    paymentForm = $('.payment-form');
$(document).ready(()=>{

if($("#is_product").is(":checked")){
    $('#columns_order').text(columnsOrderTextProduct);
$(".product_search").show();
$(".service_search").hide();

$(".warehouse_select").show();
$(".biller_select").show();
$("#warehouse_id").show().prop('required',true);
$("#biller_id").show().prop('required',true);

paymentForm.attr("action","{{route('sale.import')}}"); 



}else if($("#is_service").is(":checked")){
    $('#columns_order').text(columnsOrderTextService);
$(".product_search").hide();
$(".service_search").show();
$(".warehouse_select").hide();
$(".biller_select").hide();
$("#warehouse_id").hide().prop('required',false);
$("#biller_id").hide().prop('required',false);

paymentForm.attr("action","{{route('service_sale.import')}}"); 

}

});




$(".form_type").on('change',(e)=>{
// Changing Sale Type
choosenFormType = $(e.target).val();
if(choosenFormType == "product"){

    $('#columns_order').text(columnsOrderTextProduct);
$(".product_search").show();
$(".service_search").hide();

$(".warehouse_select").show();
$(".biller_select").show();
$("#warehouse_id").show().prop('required',true);
$("#biller_id").show().prop('required',true);
$('#download_csv').attr('href','../public/sample_file/sample_sale_products.csv');
paymentForm.attr("action","{{route('sale.import')}}"); 
}else if(choosenFormType == "service"){

    $('#columns_order').text(columnsOrderTextService);

$(".product_search").hide();

$(".service_search").show();
$(".warehouse_select").hide();
$(".biller_select").hide();
$("#warehouse_id").hide().prop('required',false);
$("#biller_id").hide().prop('required',false);
$('#download_csv').attr('href','../public/sample_file/sample_sale_services.csv');
paymentForm.attr("action","{{route('service_sale.import')}}"); 
}

// Remove Table Items After Changing types

})

$('.selectpicker').selectpicker({
    style: 'btn-link',
});

$('[data-toggle="tooltip"]').tooltip();

</script>
@endsection