<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagementBoard extends Model
{
    protected $fillable = [
        'name',
        'expert_category_id',
        'slug',
        'details',
        'designation',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(ExpertCategory::class, 'expert_category_id');
    }

}
