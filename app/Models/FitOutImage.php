<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FitOutImage extends Model
{
	use HasFactory;

	protected $fillable = [
		'fit_out_id', 'image_path', 'sort_order'
	];

	protected $casts = [
		'sort_order' => 'integer',
	];

	public function fitOut(): BelongsTo
	{
		return $this->belongsTo(FitOut::class);
	}
}

