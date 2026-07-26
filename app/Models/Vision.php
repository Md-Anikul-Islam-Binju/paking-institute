<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    protected $fillable = [
        'title',
        'details',
        'cover_image',
        'support_image',
        'staff_creating_change_no',
        'making_an_impact_no',
        'bold_partners_no',
        'video_file',
    ];
}
