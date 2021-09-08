<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Comment extends Model
{
    protected $fillable = [
        'date', 'content', 'id_photo',
    ];
    public function photo()
    {
        return $this->belongsTo(Photo::class, 'id');
    }
}
