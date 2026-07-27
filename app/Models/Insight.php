<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{
    protected $fillable = [
        'type_id',
        'title',
        'slug',
        'date',
        'remark',
        'tag',
        'multiple_management_board_id',
        'cover_image',
        'pdf_file',
    ];

    protected $casts = [
        'multiple_management_board_id' => 'array',
    ];

    public function type()
    {
        return $this->belongsTo(InsightType::class, 'type_id');
    }

    public function books()
    {
        return $this->hasMany(InsightBook::class, 'insight_id');
    }
}
