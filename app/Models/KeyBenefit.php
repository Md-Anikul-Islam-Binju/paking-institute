<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyBenefit extends Model
{
    protected $fillable = [
        'involved_id',
        'title',
        'image',
        'videos',
        'details',
        'multiple_image'
    ];

    protected $casts = [
        'multiple_image' => 'array',
    ];

    public function involved()
    {
        return $this->belongsTo(Involved::class, 'involved_id');
    }
}
