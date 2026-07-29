<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExploreVision extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'tag',
        'cover_image',
    ];

    public function conferences()
    {
        return $this->hasMany(Conference::class, 'explore_vision_id');
    }
}
