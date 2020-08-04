<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\CompanyHasPermissions;

class Role extends Model
{
    protected $fillable = [
        "name", "description", "guard_name", "is_active"
    ];

    protected $connection = "mysql_base";

    public static function findUserPermissions()
    {
        $user_id =  Auth::user()->id;
        $company_name = Auth::user()->company_name();
        try {
            return  CompanyHasPermissions::where([["user_id", $user_id],['company_name',$company_name]])->get();
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function hasPermissionTo($permission)
    {
        $user_id =  Auth::user()->id;
        $company_name = Auth::user()->company_name();
        
        try {
            CompanyHasPermissions::where([["user_id", $user_id],['permission_name',$permission],['company_name',$company_name]])->get()[0];
        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }
}
