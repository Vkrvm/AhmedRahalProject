<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
	use HasFactory;

	protected $fillable = [
		'slug', 'title', 'description', 'thumbnail_path',
	];

	public function images(): HasMany
	{
		return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
	}
}


