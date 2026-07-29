<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceCategory extends Model
{
    protected $fillable = [
        'explore_vision_id',
        'name',
        'slug',
        'status',
    ];

    public function exploreVision()
    {
        return $this->belongsTo(ExploreVision::class, 'explore_vision_id');
    }
    public function subCategories()
    {
        return $this->hasMany(ConferenceSubCategory::class, 'conference_category_id');
    }

    public function conferences()
    {
        return $this->hasMany(Conference::class, 'conference_category_id');
    }
}
