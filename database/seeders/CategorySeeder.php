<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Arts & Photography',
                'icon' => 'mdi:palette',
                'color' => 'bg-pink-100 text-pink-600',
                'description' => 'Visual arts and photography',
            ],
            [
                'name' => 'Boxed Sets',
                'icon' => 'mdi:package-variant',
                'color' => 'bg-orange-100 text-orange-600',
                'description' => 'Complete book collections',
            ],
            [
                'name' => 'Business and Investing',
                'icon' => 'mdi:briefcase',
                'color' => 'bg-amber-100 text-amber-600',
                'description' => 'Business and finance guides',
            ],
            [
                'name' => 'Fiction and Literature',
                'icon' => 'mdi:shield-outline',
                'color' => 'bg-red-100 text-red-600',
                'description' => 'Stories and classic literature',
            ],
            [
                'name' => 'Foreign Languages',
                'icon' => 'mdi:translate',
                'color' => 'bg-blue-100 text-blue-600',
                'description' => 'Books in different languages',
            ],
            [
                'name' => 'History, Biography, and Politics',
                'icon' => 'mdi:message-text',
                'color' => 'bg-cyan-100 text-cyan-600',
                'description' => 'Historical and biographical works',
            ],
            [
                'name' => 'Kids and Teens',
                'icon' => 'mdi:emoticon-happy',
                'color' => 'bg-pink-100 text-pink-600',
                'description' => 'Books for young readers',
            ],
            [
                'name' => 'Learning and Reference',
                'icon' => 'mdi:feather',
                'color' => 'bg-gray-100 text-gray-600',
                'description' => 'Educational and reference materials',
            ],
            [
                'name' => 'Lifestyle and Wellness',
                'icon' => 'mdi:account-star',
                'color' => 'bg-green-100 text-green-600',
                'description' => 'Health and lifestyle guides',
            ],
            [
                'name' => 'Manga and Graphic Novels',
                'icon' => 'mdi:lightning-bolt',
                'color' => 'bg-blue-100 text-blue-600',
                'description' => 'Comics and graphic stories',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'icon' => $category['icon'],
                'color' => $category['color'],
                'description' => $category['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
