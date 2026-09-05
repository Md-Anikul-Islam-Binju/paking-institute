<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowWorkMenu extends Model
{
    protected $fillable = [
        'how_we_work_title',
        'how_we_work_details',
        'insight_title',
        'insight_logo',
        'partnership_title',
        'partnership_logo',
        'approach_title',
        'partnership_logo',
    ];
}
