<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurGoalMember extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'details',
        'image',
    ];
}
