<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Arts & Photography',
                'icon' => 'mdi:palette',
            ],
            [
                'name' => 'Boxed Sets',
                'icon' => 'mdi:package-variant',
            ],
            [
                'name' => 'Business and Investing',
                'icon' => 'mdi:briefcase',
            ],
            [
                'name' => 'Fiction and Literature',
                'icon' => 'mdi:shield-outline',
            ],
            [
                'name' => 'Foreign Languages',
                'icon' => 'mdi:translate',
            ],
            [
                'name' => 'History, Biography, and Politics',
                'icon' => 'mdi:message-text',
            ],
            [
                'name' => 'Kids and Teens',
                'icon' => 'mdi:emoticon-happy',
            ],
            [
                'name' => 'Learning and Reference',
                'icon' => 'mdi:feather',
            ],
            [
                'name' => 'Lifestyle and Wellness',
                'icon' => 'mdi:account-star',
            ],
            [
                'name' => 'Manga and Graphic Novels',
                'icon' => 'mdi:lightning-bolt',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
