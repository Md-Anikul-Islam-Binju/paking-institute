<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsightType extends Model
{
    protected $fillable = [
        'type',
        'slug',
        'status',
    ];

    public function insights()
    {
        return $this->hasMany(Insight::class, 'type_id');
    }
}
