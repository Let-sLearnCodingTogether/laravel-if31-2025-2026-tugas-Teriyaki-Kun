<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable = [
        'title',
        'director',
        'genre',
        'release_year',
        'status'
    ];

}
