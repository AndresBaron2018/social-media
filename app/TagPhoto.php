<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class TagPhoto extends Model
{
    protected $fillable = [
        'id_photo',
    ];
}
