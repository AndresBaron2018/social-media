<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Brand extends Model
{
    protected $fillable = [
        'id', 'name'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
