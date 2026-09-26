<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaCenter extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'date',
        'remark',
        'tag',
        'management_board_id',
        'cover_image',
    ];

    public function managementBoard()
    {
        return $this->belongsTo(
            ManagementBoard::class,
            'management_board_id'
        );
    }
}
