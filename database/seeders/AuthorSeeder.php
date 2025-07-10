<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'J.K. Rowling',
                'birthday' => '1965-07-31',
                'bio' => 'British author, best known for the Harry Potter series.',
            ],
            [
                'name' => 'George R.R. Martin',
                'birthday' => '1948-09-20',
                'bio' => 'American novelist and short story writer, author of A Song of Ice and Fire.',
            ],
            [
                'name' => 'Agatha Christie',
                'birthday' => '1890-09-15',
                'bio' => 'Prolific English writer known for her detective novels.',
            ],
            [
                'name' => 'Haruki Murakami',
                'birthday' => '1949-01-12',
                'bio' => 'Japanese writer famous for his surreal and melancholic fiction.',
            ],
            [
                'name' => 'Chinua Achebe',
                'birthday' => '1930-11-16',
                'bio' => 'Nigerian novelist, poet, and critic, author of "Things Fall Apart".',
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
