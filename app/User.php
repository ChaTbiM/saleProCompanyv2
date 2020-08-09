<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\GeneralSetting;
use DB;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    

    protected $connection = "mysql_base";

    protected $fillable = [
        'name', 'email', 'password',"phone","company_name", "role_id", "biller_id", "warehouse_id", "is_active", "is_deleted"
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function companies()
    {
        return $this->belongsToMany('App\Company', 'users_companies', 'user_id', 'company_id');
    }

    public function isActive()
    {
        return $this->is_active;
    }

    public function holiday()
    {
        return $this->hasMany('App\Holiday');
    }

    public function company_name()
    {
        try {
            return GeneralSetting::all()->first()->site_title;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function company_id()
    {
        $company_name = $this->company_name();
        try {
            return Company::where("name", $company_name)->get()[0]->id;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function role_id()
    {
        $user_id = $this->id;
        
        $company_name = $this->company_name();

        try {
            return DB::connection("mysql_base")->table('company_has_user_has_roles')->where([["company_name", $company_name],["user_id",$user_id]])->get()[0]->role_id;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
