<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowWork extends Model
{
    protected $fillable = [
        'title',
        'details',
        'strategy_details',
        'strategy_logo',
        'policy_details',
        'policy_logo',
        'delivery_details',
        'delivery_logo',
    ];
}
