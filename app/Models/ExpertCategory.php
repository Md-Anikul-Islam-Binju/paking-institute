<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function managementBoards()
    {
        return $this->hasMany(ManagementBoard::class, 'expert_category_id');
    }
}
