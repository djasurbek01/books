<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $books = [
            ['title' => '1984', 'status' => 'published'],
            ['title' => 'Убить пересмешника', 'status' => 'chernovik'],
            ['title' => 'Гарри Поттер', 'status' => 'published'],
            ['title' => 'Властелин колец', 'status' => 'chernovik'],
            ['title' => 'Мастер и Маргарита', 'status' => 'chernovik'],
            ['title' => 'Дюна', 'status' => 'chernovik'],
            ['title' => 'Маленькие женщины', 'status' => 'published'],
            ['title' => 'Американский психопат', 'status' => 'published'],
            ['title' => 'Сто лет одиночества', 'status' => 'chernovik'],
            ['title' => 'Марсианин', 'status' => 'published'],
        ];

        foreach ($books as $bookData) {
            $book = Book::create($bookData);

            $book->genres()->attach(Genre::inRandomOrder()->limit(rand(1, 3))->pluck('id'));
        }
    }
}
