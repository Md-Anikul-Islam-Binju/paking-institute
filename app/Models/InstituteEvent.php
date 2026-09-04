<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstituteEvent extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'remark',
        'details',
        'image',
        'sub_title',
        'sub_details',
        'sub_image',
        'sub_remark',
        'sub_remark_details',
    ];
}
