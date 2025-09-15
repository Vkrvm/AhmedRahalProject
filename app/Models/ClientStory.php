<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientStory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'photo_path',
        'project_link',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
