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
    ];

    public function involved()
    {
        return $this->belongsTo(Involved::class, 'involved_id');
    }
}
