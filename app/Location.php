<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;

class Location extends Model
{
    protected $fillable = [
        'name', 'short_name',
    ];

    public function album()
    {
        return $this->hasMany(Album::class);
    }
}
