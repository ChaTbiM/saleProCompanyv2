<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Role;
use App\Role;
use App\Warehouse;
use App\Biller;
use App\Employee;
use App\User;
use App\Department;
use App\EmployeeFile;
use Auth;
use DB;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $role = Role::find(Auth::user()->role_id());
        if ($role->hasPermissionTo('employees-index')) {
            $permissions = Role::findUserPermissions(); // findByName
            foreach ($permissions as $permission) {
                $all_permission[] = $permission->permission_name;
            }
            if (empty($all_permission)) {
                $all_permission[] = 'dummy text';
            }

            $lims_employee_all = Employee::where('is_active', true)->get();
            $lims_department_list = Department::where('is_active', true)->get();
            return view('employee.index', compact('lims_employee_all', 'lims_department_list', 'all_permission'));
        } else {
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
        }
    }

    public function create()
    {
        $role = Role::find(Auth::user()->role_id());
        if ($role->hasPermissionTo('employees-add')) {
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_warehouse_list = Warehouse::where('is_active', true)->get();
            $lims_biller_list = Biller::where('is_active', true)->get();
            $lims_department_list = Department::where('is_active', true)->get();

            return view('employee.create', compact('lims_role_list', 'lims_warehouse_list', 'lims_biller_list', 'lims_department_list'));
        } else {
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
        }
    }

    public function store(Request $request)
    {
        $files  = $request->files;

        $data = $request->except('image');
        $message = 'Employee created successfully';
        
        //validation in employee table
        $this->validate($request, [
            'email' => [
                'max:255',
                    Rule::unique('employees')->where(function ($query) {
                        return $query->where('is_active', true);
                    }),
            ],
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:100000',
        ]);
        
        if (isset($request->is_salesman) && $data['is_salesman'] == "on") {
            $data['is_salesman'] = 1;
        } else {
            $data['is_salesman'] = 0;
        }


        $image = $request->image;
        if ($image) {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $request['email']);
            $imageName = $imageName . '.' . $ext;
            $image->move('public/images/employee', $imageName);
            $data['image'] = $imageName;
        }




        $data['name'] = $data['employee_name'];
        $data['is_active'] = true;

        DB::transaction(function () use ($data, $files) {
            $employee = Employee::create($data);
            $employee_id = $employee->id;
            
            if (isset($files)) {
                $this->storeFiles($files, $employee_id);
            }
        });

        return redirect('employees')->with('message', $message);
    }
    
    public function update(Request $request, $id)
    {
        $files = $request->files;
        $lims_employee_data = Employee::find($request['employee_id']);
        if ($lims_employee_data->user_id) {
            $this->validate($request, [
                'name' => [
                    'max:255',
                    Rule::unique('users')->ignore($lims_employee_data->user_id)->where(function ($query) {
                        return $query->where('is_deleted', false);
                    }),
                ],
                'email' => [
                    'email',
                    'max:255',
                        Rule::unique('users')->ignore($lims_employee_data->user_id)->where(function ($query) {
                            return $query->where('is_deleted', false);
                        }),
                ],
            ]);
        }
        //validation in employee table
        $this->validate($request, [
            'email' => [
                'email',
                'max:255',
                    Rule::unique('employees')->ignore($lims_employee_data->id)->where(function ($query) {
                        return $query->where('is_active', true);
                    }),
            ],
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:100000',
        ]);
        
        $data = $request->except('image');

        if (isset($request->is_salesman) && $data['is_salesman'] == "on") {
            $data['is_salesman'] = 1;
        } else {
            $data['is_salesman'] = 0;
        }

        $image = $request->image;
        if ($image) {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $request['email']);
            $imageName = $imageName . '.' . $ext;
            $image->move('public/images/employee', $imageName);
            $data['image'] = $imageName;
        }
        
        DB::transaction(function () use ($data,$lims_employee_data, $files) {
            $lims_employee_data->update($data);
            
            if (isset($files)) {
                $this->storeFiles($files, $data['employee_id']);
            }
        });
        return redirect('employees')->with('message', 'Employee updated successfully');
    }

    public function deleteBySelection(Request $request)
    {
        $employee_id = $request['employeeIdArray'];
        foreach ($employee_id as $id) {
            $lims_employee_data = Employee::find($id);
            if ($lims_employee_data->user_id) {
                $lims_user_data = User::find($lims_employee_data->user_id);
                $lims_user_data->is_deleted = true;
                $lims_user_data->save();
            }
            $lims_employee_data->is_active = false;
            $lims_employee_data->save();
        }
        return 'Employee deleted successfully!';
    }
    public function destroy($id)
    {
        $lims_employee_data = Employee::find($id);
        if ($lims_employee_data->user_id) {
            $lims_user_data = User::find($lims_employee_data->user_id);
            $lims_user_data->is_deleted = true;
            $lims_user_data->save();
        }
        $lims_employee_data->is_active = false;
        $lims_employee_data->save();
        return redirect('employees')->with('not_permitted', 'Employee deleted successfully');
    }

    public function storeFiles($files, $employee_id)
    {
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            $file->move('public/files/employee', $fileName);
            EmployeeFile::create(['employee_id'=>$employee_id,'file_link'=>$fileName]);
        }
    }

    public function files($id)
    {
        $employee = Employee::find($id);
        $files = $employee->files;
        $employee_id = $employee->id;
        return view('employee.files', compact('files', 'employee_id'));
    }

    public function deleteFile($file_id)
    {
        $message = "files was deleted successfully";
        try {
            EmployeeFile::find($file_id)->delete();
        } catch (\Throwable $th) {
            $message= "files was not deleted";
            return redirect('employees')->with('not_permitted', $message);
        }
        return redirect('employees')->with('message', $message);
    }

    public function addFiles($id, Request $request)
    {
        $files = $request->files;
        $message = "files was uploaded successfully";
        try {
            $this->storeFiles($files, $id);
        } catch (\Throwable $th) {
            $message = 'files was not uploaded';
            return redirect('employees')->with('not_permitted', $message);
        }

        return redirect('employees')->with('message', $message);
    }
}
