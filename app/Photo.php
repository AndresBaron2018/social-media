<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;
use App\Comment;
use App\Tag;


class Photo extends Model
{
    protected $fillable = [
        'title', 'description', 'privacy', 'date', 'view', 'image_path', 'user_id',
    ];

    // protected $primaryKey = 'id_comment';

    public function album()
    {
        return $this->hasOne(Album::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_photo');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'photo_tag', 'photo_id');
    }

    public function getGetImageAttribute()
    {
        if ($this->image_path) {
            return url("storage/$this->image_path");
        }
    }
}
