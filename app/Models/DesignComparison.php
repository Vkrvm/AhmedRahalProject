<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignComparison extends Model
{
    protected $fillable = [
        'title', 'before_path', 'after_path', 'is_active', 'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($q) { return $q->where('is_active', true); }
    public function scopeOrdered($q) { return $q->orderBy('sort_order')->orderBy('created_at', 'desc'); }
}
