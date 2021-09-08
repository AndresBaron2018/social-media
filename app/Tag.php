<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Tag extends Model
{
    protected $fillable = [
        'title', 'tag_photo_id',
    ];
    // public function photo()
    // {
    //     return $this->BelongsToMany(Photo::class, 'tag_photos', 'id_photo', 'id_tag');
    // }
    public function photo()
    {
        return $this->belongsToMany(Photo::class, 'photo_tag', 'photo_id');
    }
}
