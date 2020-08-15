<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\BillerAccordingToCompany;

class Biller extends Model
{
    protected $connection = "mysql_base";
 
    protected $fillable =[
        "name", "image", "company_name", "vat_number",
        "email", "phone_number", "address", "city",
        "state", "postal_code", "country", "is_active"
    ];

    public function sale()
    {
        return $this->hasMany('App\Sale');
    }

    protected static function boot()
    {
        parent::boot();
  
        return static::addGlobalScope(new BillerAccordingToCompany);
    }
}
