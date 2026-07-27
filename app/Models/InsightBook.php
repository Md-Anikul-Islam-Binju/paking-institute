<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsightBook extends Model
{
    protected $fillable = [
        'insight_id',
        'chapter_no',
        'title',
        'slug',
        'details',
    ];

    public function insight()
    {
        return $this->belongsTo(Insight::class, 'insight_id');
    }
}
