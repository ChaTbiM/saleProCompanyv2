<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable =[
        "name", "code", "service_category_id", "unit_id", "price", "promotion", "promotion_price", "starting_date", "last_date", "tax_id", "tax_method", "image", "file", "featured", "service_details", "is_active"
    ];

    // Relationships needed

    public function category()
    {
        return $this->belongsTo('App\ServiceCategory', "service_category_id", "id");
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
