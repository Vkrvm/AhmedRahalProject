<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample projects
        $projects = [
            [
                'title' => 'Modern Living Room Design',
                'description' => 'A contemporary living room featuring clean lines, neutral colors, and modern furniture pieces that create a sophisticated and comfortable space.',
                'thumbnail_path' => 'images/projects/Hk8geT6oES8ohdaMFuq3EE0MuxjFG3AJSALrp4GZ.jpg',
            ],
            [
                'title' => 'Luxury Kitchen Renovation',
                'description' => 'Complete kitchen transformation with premium materials, custom cabinetry, and state-of-the-art appliances for the ultimate cooking experience.',
                'thumbnail_path' => 'images/projects/m7sO3M5gfTlMFYoDAzTFRgk8Ayb8X6P2OF7vK0YW.jpg',
            ],
            [
                'title' => 'Minimalist Bedroom Suite',
                'description' => 'A serene bedroom design focusing on simplicity, natural light, and calming colors to create the perfect retreat.',
                'thumbnail_path' => 'images/projects/Hk8geT6oES8ohdaMFuq3EE0MuxjFG3AJSALrp4GZ.jpg',
            ],
        ];

        foreach ($projects as $projectData) {
            $slug = Str::slug($projectData['title']);
            $counter = 1;
            while (Project::where('slug', $slug)->exists()) {
                $slug = Str::slug($projectData['title']) . '-' . $counter++;
            }

            $project = Project::create([
                'slug' => $slug,
                'title' => $projectData['title'],
                'description' => $projectData['description'],
                'thumbnail_path' => $projectData['thumbnail_path'],
            ]);

            // Create 9 gallery images for each project using existing images
            $galleryImages = [
                '72oEAeT00KUOabaqP3CfT4y73uENho3HeXfbV7Oj.jpg',
                'dEVwtHMlzk7msGM517aBKj6KOBo8LIvgC0nd6NJr.jpg',
                'gwjD1VcqH1N3ij1eLbwmF1SuMtXyBzE7KMpdmP0o.jpg',
                'IgWUN0TRPCA6NDBelzwOvtmaxZw47r3O5N5SJVIg.jpg',
                'lQ8tfKDUGZL4M1nzdbSvJGWoWMOgKXDBUO7IaaW7.jpg',
                'nYkpTH5f6Z7f9Nj6h6ejsCMQpo0n7YbyPZ6eAiHi.jpg',
                'tU89w9sDTi9V2Gi3u2fgMwbWlEOX157d44rO94FE.jpg',
                'uiKLItNy82MKVl3eDzhQDHkSiXrkcMN5m3f1OMpc.jpg',
                'H84b5vVtbTBcrqcansMWBp1948cyrIWpBeO3nHYo.jpg'
            ];

            foreach ($galleryImages as $index => $imageName) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => "images/projects/gallery/{$imageName}",
                    'sort_order' => $index + 1,
                ]);
            }
        }
    }
}
