<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceSubCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'conference_category_id',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(
            ConferenceCategory::class,
            'conference_category_id'
        );
    }

    public function conferences()
    {
        return $this->hasMany(
            Conference::class,
            'conference_sub_category_id'
        );
    }

}
