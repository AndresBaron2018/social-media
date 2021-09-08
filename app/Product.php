<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;

class Product extends Model
{
    protected $fillable = [
        'id', 'brand_id', 'name', 'size', 'product_brand', 'shipment_date'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
