<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable = [
        'movie_id',
        'title',
        'director',
        'genre',
        'release_year'
    ];

    
}
