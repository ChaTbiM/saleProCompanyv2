<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Service;
use App\Role;
use App\ServiceCategory;
use App\Unit;
use App\Tax;
use App\Brand;
use Auth;
use Keygen;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::find(Auth::user()->role_id());
        if ($role->hasPermissionTo('services-index')) {
            $permissions = Role::findUserPermissions(); // findByName
            foreach ($permissions as $permission) {
                $all_permission[] = $permission->name;
            }
            if (empty($all_permission)) {
                $all_permission[] = 'dummy text';
            }
            return view('service.index', compact('all_permission'));
        } else {
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
        }
    }


    public function productData(Request $request)
    {
        $columns = array(
            2 => 'name',
            3 => 'code',
            4 => 'brand_id',
            4 => 'category_id',
            6 => 'qty',
            5 => 'unit_id',
            6 => 'price'
        );
        
        $totalData = Service::where('is_active', true)->count();
        $totalFiltered = $totalData;

        // if ($request->input('length') != -1) {
        //     $limit = $request->input('length');
        // } else {
        //     $limit = $totalData;
        // }
        // $start = $request->input('start');
        // $order = 'products.'.$columns[$request->input('order.0.column')];
        // $dir = $request->input('order.0.dir');
        // if (empty($request->input('search.value'))) {
        //     $products = Product::with('category', 'brand', 'unit')->offset($start)
        //                 ->where('is_active', true)
        //                 ->limit($limit)
        //                 ->orderBy($order, $dir)
        //                 ->get();
        // } else {
        //     $search = $request->input('search.value');
        //     $products =  Product::select('products.*')
        //                 ->with('category', 'brand', 'unit')
        //                 ->join('categories', 'products.category_id', '=', 'categories.id')
        //                 ->leftjoin('brands', 'products.brand_id', '=', 'brands.id')
        //                 ->where([
        //                     ['products.name', 'LIKE', "%{$search}%"],
        //                     ['products.is_active', true]
        //                 ])
        //                 ->orWhere([
        //                     ['products.code', 'LIKE', "%{$search}%"],
        //                     ['products.is_active', true]
        //                 ])
        //                 ->orWhere([
        //                     ['categories.name', 'LIKE', "%{$search}%"],
        //                     ['categories.is_active', true],
        //                     ['products.is_active', true]
        //                 ])
        //                 ->orWhere([
        //                     ['brands.title', 'LIKE', "%{$search}%"],
        //                     ['brands.is_active', true],
        //                     ['products.is_active', true]
        //                 ])
        //                 ->offset($start)
        //                 ->limit($limit)
        //                 ->orderBy($order, $dir)->get();

        //     $totalFiltered = Product::
        //                     join('categories', 'products.category_id', '=', 'categories.id')
        //                     ->leftjoin('brands', 'products.brand_id', '=', 'brands.id')
        //                     ->where([
        //                         ['products.name','LIKE',"%{$search}%"],
        //                         ['products.is_active', true]
        //                     ])
        //                     ->orWhere([
        //                         ['products.code', 'LIKE', "%{$search}%"],
        //                         ['products.is_active', true]
        //                     ])
        //                     ->orWhere([
        //                         ['categories.name', 'LIKE', "%{$search}%"],
        //                         ['categories.is_active', true],
        //                         ['products.is_active', true]
        //                     ])
        //                     ->orWhere([
        //                         ['brands.title', 'LIKE', "%{$search}%"],
        //                         ['brands.is_active', true],
        //                         ['products.is_active', true]
        //                     ])
        //                     ->count();
        // }
        $products = Service::all();
        $data = array();
        if (!empty($products)) {
            foreach ($products as $key=>$product) {
                $nestedData['id'] = $product->id;
                $nestedData['key'] = $key;
                $product_image = explode(",", $product->image);
                $product_image = htmlspecialchars($product_image[0]);
                $nestedData['image'] = '<img src="'.url('public/images/service', $product_image).'" height="80" width="80">';
                $nestedData['name'] = $product->name;
                $nestedData['code'] = $product->code;

                $nestedData['category'] = $product->category->name;

                if ($product->unit_id) {
                    $nestedData['unit'] = $product->unit->unit_name;
                } else {
                    $nestedData['unit'] = 'N/A';
                }
                
                $nestedData['price'] = $product->price;
                $nestedData['options'] = '<div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trans("file.action").'
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                            <li>
                                <button="type" class="btn btn-link view"><i class="fa fa-eye"></i> '.trans('file.View').'</button>
                            </li>';
                if (in_array("service-edit", $request['all_permission'])) {
                    $nestedData['options'] .= '<li>
                            <a href="'.route('products.edit', ['id' => $product->id]).'" class="btn btn-link"><i class="fa fa-edit"></i> '.trans('file.edit').'</a>
                        </li>';
                }
                if (in_array("service-delete", $request['all_permission'])) {
                    $nestedData['options'] .= \Form::open(["route" => ["products.destroy", $product->id], "method" => "DELETE"]).'
                            <li>
                              <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="fa fa-trash"></i> '.trans("file.delete").'</button> 
                            </li>'.\Form::close().'
                        </ul>
                    </div>';
                }
                // data for product details by one click
                if ($product->tax_id) {
                    $tax = Tax::find($product->tax_id)->name;
                } else {
                    $tax = "N/A";
                }

                if ($product->tax_method == 1) {
                    $tax_method = trans('file.Exclusive');
                } else {
                    $tax_method = trans('file.Inclusive');
                }

                $nestedData['product'] = array( '["'.$product->name.'"', ' "'.$product->code.'"', ' "'.$nestedData['category'].'"', ' "'.$nestedData['unit'].'"', ' "'.$product->cost.'"', ' "'.$product->price.'"', ' "'.$tax.'"', ' "'.$tax_method.'"', ' "'.preg_replace('/\s+/S', " ", $product->service_details).'"', ' "'.$product->id.'"', ' "'.$product->image.'"]'
                );
                //$nestedData['imagedata'] = DNS1D::getBarcodePNG($product->code, $product->barcode_symbology);
                $data[] = $nestedData;
            }
        }

        
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
            
        echo json_encode($json_data);
    }
    
    // Index ( table ) work on it Later

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $role = Role::find(Auth::user()->role_id());
        if ($role->hasPermissionTo('products-add')) {
            $lims_product_list = Service::where('is_active', true)->get();
            $lims_category_list = ServiceCategory::where('is_active', true)->get();
            $lims_unit_list = Unit::where([['is_active',true],['unit_code','hr']])->get();
            $lims_brand_list = Brand::all(); // remove later
            $lims_tax_list = Tax::where('is_active', true)->get();
            return view('service.create', compact('lims_product_list', 'lims_brand_list', 'lims_category_list', 'lims_unit_list', 'lims_tax_list'));
        } else {
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => [
                'max:255',
                    Rule::unique('products')->where(function ($query) {
                        return $query->where('is_active', 1);
                    }),
            ],
            'name' => [
                'max:255',
                    Rule::unique('products')->where(function ($query) {
                        return $query->where('is_active', 1);
                    }),
            ]
        ]);
        $data = $request->except('image', 'file');

        $data['service_details'] = str_replace('"', '@', $data['service_details']);

        if ($data['starting_date']) {
            $data['starting_date'] = date('Y-m-d', strtotime($data['starting_date']));
        }
        if ($data['last_date']) {
            $data['last_date'] = date('Y-m-d', strtotime($data['last_date']));
        }
        $data['is_active'] = true;
        $images = $request->image;
        $image_names = [];
        if ($images) {
            foreach ($images as $key => $image) {
                $imageName = $image->getClientOriginalName();
                $image->move('public/images/service', $imageName);
                $image_names[] = $imageName;
            }
            $data['image'] = implode(",", $image_names);
        } else {
            $data['image'] = 'zummXD2dvAtI.png';
        }
        $file = $request->file;
        if ($file) {
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fileName = strtotime(date('Y-m-d H:i:s'));
            $fileName = $fileName . '.' . $ext;
            $file->move('public/service/files', $fileName);
            $data['file'] = $fileName;
        }
        $lims_product_data = Service::create($data);
        
        \Session::flash('create_message', 'Product created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    //

    public function generateCode()
    {
        $id = Keygen::numeric(8)->generate();
        return $id;
    }

    public function saleUnit($id)
    {
        $unit = Unit::where("base_unit", $id)->orWhere('id', $id)->pluck('unit_name', 'id');
        return json_encode($unit);
    }
}
