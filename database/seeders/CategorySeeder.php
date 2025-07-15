<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fiction',
                'description' => 'Books based on imaginative storytelling.',
                'icon' => 'mdi:book-open-variant',
                'color' => 'bg-purple-100 text-purple-600',
            ],
            [
                'name' => 'Non-Fiction',
                'description' => 'Books based on facts and real events.',
                'icon' => 'mdi:book-check',
                'color' => 'bg-green-100 text-green-600',
            ],
            [
                'name' => 'Young Adult (YA)',
                'description' => 'Books geared toward teens and young adults.',
                'icon' => 'mdi:account-voice',
                'color' => 'bg-yellow-100 text-yellow-600',
            ],
            [
                'name' => 'Children\'s Books',
                'description' => 'Books for young children, often with illustrations.',
                'icon' => 'mdi:baby-face-outline',
                'color' => 'bg-pink-100 text-pink-600',
            ],
            [
                'name' => 'Self-Help',
                'description' => 'Books focused on personal development and life improvement.',
                'icon' => 'mdi:meditation',
                'color' => 'bg-orange-100 text-orange-600',
            ],
            [
                'name' => 'Educational',
                'description' => 'Books used for academic or learning purposes.',
                'icon' => 'mdi:school-outline',
                'color' => 'bg-blue-100 text-blue-600',
            ],
            [
                'name' => 'Comics & Graphic Novels',
                'description' => 'Books presented in comic strip format or visual storytelling.',
                'icon' => 'mdi:emoticon-outline',
                'color' => 'bg-red-100 text-red-600',
            ],
            [
                'name' => 'Biographies & Memoirs',
                'description' => 'Books about the lives of real people.',
                'icon' => 'mdi:account-box-outline',
                'color' => 'bg-gray-100 text-gray-600',
            ],
            [
                'name' => 'Religion & Spirituality',
                'description' => 'Books focused on religious beliefs and practices.',
                'icon' => 'mdi:cross-outline',
                'color' => 'bg-indigo-100 text-indigo-600',
            ],
            [
                'name' => 'Science & Technology',
                'description' => 'Books on scientific concepts and technological advancements.',
                'icon' => 'mdi:atom',
                'color' => 'bg-cyan-100 text-cyan-600',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'description' => $category['description'],
                'slug' => Str::slug($category['name']),
                'icon' => $category['icon'],
                'color' => $category['color'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
