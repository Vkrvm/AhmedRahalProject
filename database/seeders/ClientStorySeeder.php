<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClientStory;

class ClientStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientStories = [
            [
                'name' => 'Ahmed Rahal',
                'description' => 'Working with this design team was an incredible experience. They transformed our vision into reality with exceptional attention to detail and creativity. The final result exceeded all our expectations.',
                'photo_path' => 'images/client-stories/ahmed-rahal.jpg',
                'project_link' => 'https://example.com/project1',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Sarah Johnson',
                'description' => 'The team\'s professionalism and innovative approach made our project a huge success. They understood our needs perfectly and delivered beyond what we imagined possible.',
                'photo_path' => 'images/client-stories/sarah-johnson.jpg',
                'project_link' => 'https://example.com/project2',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Michael Chen',
                'description' => 'Outstanding work! The design team brought fresh ideas and executed them flawlessly. Our project received numerous compliments and we couldn\'t be happier with the results.',
                'photo_path' => 'images/client-stories/michael-chen.jpg',
                'project_link' => 'https://example.com/project3',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Emma Williams',
                'description' => 'From concept to completion, the entire process was smooth and professional. The team\'s expertise and dedication made our dream project come to life beautifully.',
                'photo_path' => 'images/client-stories/emma-williams.jpg',
                'project_link' => null,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'David Rodriguez',
                'description' => 'Exceptional service and remarkable results. The team\'s creative solutions and attention to detail made our project stand out. Highly recommended for anyone looking for quality design work.',
                'photo_path' => 'images/client-stories/david-rodriguez.jpg',
                'project_link' => 'https://example.com/project5',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Lisa Thompson',
                'description' => 'The design team exceeded our expectations in every way. Their innovative approach and professional execution made our project a complete success. We couldn\'t be happier with the results.',
                'photo_path' => 'images/client-stories/lisa-thompson.jpg',
                'project_link' => 'https://example.com/project6',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'James Wilson',
                'description' => 'Outstanding work from start to finish. The team\'s expertise and dedication were evident throughout the entire process. Our project turned out better than we ever imagined.',
                'photo_path' => 'images/client-stories/james-wilson.jpg',
                'project_link' => null,
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Maria Garcia',
                'description' => 'Professional, creative, and reliable. The design team delivered exactly what we needed and more. Their attention to detail and customer service is unmatched.',
                'photo_path' => 'images/client-stories/maria-garcia.jpg',
                'project_link' => 'https://example.com/project8',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'name' => 'Robert Brown',
                'description' => 'Working with this team was a pleasure. They understood our vision and brought it to life with exceptional skill and creativity. Highly recommend their services.',
                'photo_path' => 'images/client-stories/robert-brown.jpg',
                'project_link' => 'https://example.com/project9',
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'name' => 'Jennifer Davis',
                'description' => 'The team\'s professionalism and creative solutions made our project a huge success. They delivered on time and exceeded our expectations in every aspect.',
                'photo_path' => 'images/client-stories/jennifer-davis.jpg',
                'project_link' => 'https://example.com/project10',
                'is_active' => true,
                'sort_order' => 10,
            ],
            [
                'name' => 'Christopher Miller',
                'description' => 'Exceptional quality and service. The design team transformed our ideas into reality with remarkable skill and attention to detail. We\'re thrilled with the final result.',
                'photo_path' => 'images/client-stories/christopher-miller.jpg',
                'project_link' => null,
                'is_active' => true,
                'sort_order' => 11,
            ],
            [
                'name' => 'Amanda Taylor',
                'description' => 'Outstanding work and excellent communication throughout the project. The team\'s expertise and dedication made our vision come to life beautifully.',
                'photo_path' => 'images/client-stories/amanda-taylor.jpg',
                'project_link' => 'https://example.com/project12',
                'is_active' => true,
                'sort_order' => 12,
            ],
        ];

        foreach ($clientStories as $story) {
            ClientStory::create($story);
        }
    }
}
