<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;
use App\Location;

class Album extends Model
{
    protected $fillable = [
        'title', 'description', 'id_user', 'id_location', 'id_photo',
    ];
    // protected $primaryKey = "id";
    public function photo()
    {
        return $this->hasMany(Photo::class, 'id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
