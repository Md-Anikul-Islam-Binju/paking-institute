<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'color_logo',
        'site_url',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'linkedin',
        'description',
    ];
}
