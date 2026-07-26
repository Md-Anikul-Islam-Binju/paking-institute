<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertMember extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'designation',
        'image',
        'status',
    ];
}
