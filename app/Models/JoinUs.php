<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinUs extends Model
{
    protected $fillable = [
        'title',
        'details',
        'multiple_image'
    ];

    protected $casts = [
        'multiple_image' => 'array',
    ];
}
