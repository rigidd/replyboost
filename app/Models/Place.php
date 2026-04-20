<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'name',
        'google_url',
        'google_place_id',
        'photo_url'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
