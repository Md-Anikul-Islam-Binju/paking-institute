<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
        'explore_vision_id',
        'conference_category_id',
        'conference_sub_category_id',
        'title',
        'tag',
        'details',
        'start_time',
        'end_time',
        'date',
        'cover_image',
        'videos_file',
        'videos_link',
    ];

    public function exploreVision()
    {
        return $this->belongsTo(
            ExploreVision::class,
            'explore_vision_id'
        );
    }

    public function category()
    {
        return $this->belongsTo(
            ConferenceCategory::class,
            'conference_category_id'
        );
    }

    public function subCategory()
    {
        return $this->belongsTo(
            ConferenceSubCategory::class,
            'conference_sub_category_id'
        );
    }
}
