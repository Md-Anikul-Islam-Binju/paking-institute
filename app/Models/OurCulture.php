<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurCulture extends Model
{
    protected $fillable = [
        'title',
        'details',
        'videos_file',
    ];
}
