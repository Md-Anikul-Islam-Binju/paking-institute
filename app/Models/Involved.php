<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Involved extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'details',
        'image',
    ];
}
