<?php

namespace App\Http\Controllers;

use App\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Service;
use DB;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $lims_categories = ServiceCategory::where('is_active', true)->pluck('name', 'id');
        $lims_category_all = ServiceCategory::where('is_active', true)->get();
        return view('service_category.create', compact('lims_categories', 'lims_category_all'));
    }

    public function categoryData(Request $request)
    {
        $columns = array(
            0 =>'id',
            1 =>'name',
            2=> 'parent_id',
            3=> 'is_active',
        );
        
        $totalData = ServiceCategory::where('is_active', true)->count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $categories = ServiceCategory::offset($start)
                ->where('is_active', true)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $categories =  ServiceCategory::where([
                            ['name', 'LIKE', "%{$search}%"],
                            ['is_active', true]
                        ])->offset($start)
                        ->limit($limit)
                        ->orderBy($order, $dir)->get();

            $totalFiltered = ServiceCategory::where([
                            ['name','LIKE',"%{$search}%"],
                            ['is_active', true]
                        ])->count();
        }
        $data = array();
        if (!empty($categories)) {
            foreach ($categories as $key=>$category) {
                $nestedData['id'] = $category->id;
                $nestedData['key'] = $key;
                $nestedData['name'] = $category->name;

                if ($category->parent_id) {
                    $nestedData['parent_id'] = ServiceCategory::find($category->parent_id)->name;
                } else {
                    $nestedData['parent_id'] = "N/A";
                }

                $nestedData['number_of_product'] =0;
                $nestedData['stock_qty'] = 0;
                $total_price = 0;
                $total_cost = 0 ;
                
                if (config('currency_position') == 'prefix') {
                    $nestedData['stock_worth'] = 0;
                } else {
                    $nestedData['stock_worth'] = 0;
                }

                $nestedData['options'] = '<div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trans("file.action").'
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li>
                                    <button type="button" data-id="'.$category->id.'" class="open-EditCategoryDialog btn btn-link" data-toggle="modal" data-target="#editModal" ><i class="dripicons-document-edit"></i> '.trans("file.edit").'</button>
                                </li>
                                <li class="divider"></li>'.
                                \Form::open(["route" => ["category.destroy", $category->id], "method" => "DELETE"]).'
                                <li>
                                  <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> '.trans("file.delete").'</button> 
                                </li>'.\Form::close().'
                            </ul>
                        </div>';
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

    public function store(Request $request)
    {
        $request->name = preg_replace('/\s+/', ' ', $request->name);
        $this->validate($request, [
            'name' => [
                'max:255',
                    Rule::unique('categories')->where(function ($query) {
                        return $query->where('is_active', 1);
                    }),
            ],
        ]);
        $lims_category_data['name'] = $request->name;
        $lims_category_data['parent_id'] = $request->parent_id;
        $lims_category_data['is_active'] = true;
        ServiceCategory::create($lims_category_data);
        return redirect('category')->with('message', 'Data inserted successfully');
    }

    public function edit($id)
    {
        $lims_category_data = ServiceCategory::findOrFail($id);
        $lims_parent_data = ServiceCategory::where('id', $lims_category_data['parent_id'])->first();
        if ($lims_parent_data) {
            $lims_category_data['parent'] = $lims_parent_data['name'];
        }
        return $lims_category_data;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'max:255',
                Rule::unique('categories')->ignore($request->category_id)->where(function ($query) {
                    return $query->where('is_active', 1);
                }),
            ],
        ]);

        $input = $request->all();
        $lims_category_data = ServiceCategory::findOrFail($request->category_id);
        $lims_category_data->update($input);
        return redirect('category')->with('message', 'Data updated successfully');
    }

    public function import(Request $request)
    {
        //get file
        $upload=$request->file('file');
        $ext = pathinfo($upload->getClientOriginalName(), PATHINFO_EXTENSION);
        if ($ext != 'csv') {
            return redirect()->back()->with('not_permitted', 'Please upload a CSV file');
        }
        $filename =  $upload->getClientOriginalName();
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');
        $header= fgetcsv($file);
        $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }
        //looping through othe columns
        while ($columns=fgetcsv($file)) {
            if ($columns[0]=="") {
                continue;
            }
            foreach ($columns as $key => $value) {
                $value=preg_replace('/\D/', '', $value);
            }
            $data= array_combine($escapedHeader, $columns);
            $category = ServiceCategory::firstOrNew(['name' => $data['name'], 'is_active' => true ]);
            if ($data['parentcategory']) {
                $parent_category = ServiceCategory::firstOrNew(['name' => $data['parentcategory'], 'is_active' => true ]);
                $parent_id = $parent_category->id;
            } else {
                $parent_id = null;
            }

            $category->parent_id = $parent_id;
            $category->is_active = true;
            $category->save();
        }
        return redirect('category')->with('message', 'Category imported successfully');
    }

    public function deleteBySelection(Request $request)
    {
        $category_id = $request['categoryIdArray'];
        foreach ($category_id as $id) {
            $lims_product_data = Service::where('category_id', $id)->get();
            foreach ($lims_product_data as $product_data) {
                $product_data->is_active = false;
                $product_data->save();
            }
            $lims_category_data = ServiceCategory::findOrFail($id);
            $lims_category_data->is_active = false;
            $lims_category_data->save();
        }
        return 'Category deleted successfully!';
    }

    public function destroy($id)
    {
        $lims_category_data = ServiceCategory::findOrFail($id);
        $lims_category_data->is_active = false;
        $lims_product_data = Service::where('category_id', $id)->get();
        foreach ($lims_product_data as $product_data) {
            $product_data->is_active = false;
            $product_data->save();
        }
        $lims_category_data->save();
        return redirect('category')->with('not_permitted', 'Data deleted successfully');
    }
}
