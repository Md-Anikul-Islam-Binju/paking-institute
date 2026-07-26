<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];
}
