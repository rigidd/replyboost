<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'place_id',
        'author_name',
        'rating',
        'content',
        'review_date',
        'response'
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
