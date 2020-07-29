<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $connection = "mysql_base";
    protected $table = "companies";

    
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_companies', 'company_id', 'user_id');
    }
}
