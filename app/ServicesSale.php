<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesSale extends Model
{
    protected $table = 'services_sales';
    protected $fillable =[
        "sale_id", "service_id", "qty", "net_unit_price", "discount", "tax_rate", "tax", "total"
    ];
}
