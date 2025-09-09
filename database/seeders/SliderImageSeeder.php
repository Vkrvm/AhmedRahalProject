<?php

namespace Database\Seeders;

use App\Models\SliderImage;
use Illuminate\Database\Seeder;

class SliderImageSeeder extends Seeder
{
	public function run(): void
	{
		SliderImage::query()->upsert([
			['title' => 'Sample 1', 'image_path' => 'images/sample1.jpg', 'is_active' => true, 'sort_order' => 1],
			['title' => 'Sample 2', 'image_path' => 'images/sample2.jpg', 'is_active' => true, 'sort_order' => 2],
			['title' => 'Sample 3', 'image_path' => 'images/sample3.jpg', 'is_active' => true, 'sort_order' => 3],
		], ['image_path'], ['title','is_active','sort_order']);
	}
}


