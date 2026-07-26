<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagementBoard extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'details',
        'designation',
        'image',
    ];
}
