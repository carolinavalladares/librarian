<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Student;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // CREATE FAKE DATA FOR DEVELOPMENT AND TESTING PURPOSES

        // create other librarians
        User::factory(5)->create();
        // create admin
        User::create(['name' => 'admin', 'email' => 'admin@email.com', 'password' => bcrypt('password')]);

        // create students
        Student::factory(25)->create();

        // create authors
        Author::create(['name' => 'J. K. ROWLING']);
        Author::create(['name' => 'C. S. LEWIS']);
        Author::create(['name' => 'RICK RIORDAN']);
        Author::create(['name' => 'GEORGE R. R. MARTIN']);

        // create categories
        Genre::create(['name' => 'INFANTOJUVENIL']);
        Genre::create(['name' => 'FANTASIA']);
        Genre::create(['name' => 'MEDIEVAL']);
        Genre::create(['name' => 'MITOLOGIA']);

        // create publishers
        Publisher::create(['name' => 'EDITORA ROCCO LTDA.']);
        Publisher::create(['name' => 'EDITORA INTRÍNSECA LTDA.']);
        Publisher::create(['name' => 'EDITORA WMF MARTINS FONTES LTDA.']);
        Publisher::create(['name' => 'TEXTO EDITORES LTDA.']);

        // create books
        $book1 = Book::create([
            'title' => 'HARRY POTTER E A PEDRA FILOSOFAL',
            'ISBN' => fake()->unique()->isbn13(),
            'description' => fake()->paragraph(),
            'image' => 'factory/philosophers_stone.jpg',
            'quantity' => fake()->numberBetween(1, 21),
            'rating' => fake()->randomFloat(1, 1, 5),
            'pages' => fake()->numberBetween(50, 500),
            'published_date' => fake()->date('d-m-Y'),
            'author_id' => 1,

            'publisher_id' => 1
        ]);
        $book1->genres()->attach(1);
        $book1->genres()->attach(2);

        $book2 = Book::create([
            'title' => 'HARRY POTTER E O PRISIONEIRO DE AZKABAN',
            'ISBN' => fake()->unique()->isbn13(),
            'description' => fake()->paragraph(),
            'image' => 'factory/prisioner_of_azkaban.jpg',
            'quantity' => fake()->numberBetween(1, 21),
            'rating' => fake()->randomFloat(1, 1, 5),
            'pages' => fake()->numberBetween(50, 500),
            'published_date' => fake()->date('d-m-Y'),
            'author_id' => 1,

            'publisher_id' => 1
        ]);
        $book2->genres()->attach(1);
        $book2->genres()->attach(2);


        $book3 = Book::create([
            'title' => 'AS CRÔNICAS DE NÁRNIA - VOLUME ÚNICO',
            'ISBN' => fake()->unique()->isbn13(),
            'description' => fake()->paragraph(),
            'image' => 'factory/narnia.webp',
            'quantity' => fake()->numberBetween(1, 21),
            'rating' => fake()->randomFloat(1, 1, 5),
            'pages' => fake()->numberBetween(50, 500),
            'published_date' => fake()->date('d-m-Y'),
            'author_id' => 2,

            'publisher_id' => 3
        ]);

        $book3->genres()->attach(1);
        $book3->genres()->attach(2);


        $book4 = Book::create([
            'title' => 'O LADRÃO DE RAIOS',
            'ISBN' => fake()->unique()->isbn13(),
            'description' => fake()->paragraph(),
            'image' => 'factory/lightning_thief.jpg',
            'quantity' => fake()->numberBetween(1, 21),
            'rating' => fake()->randomFloat(1, 1, 5),
            'pages' => fake()->numberBetween(50, 500),
            'published_date' => fake()->date('d-m-Y'),
            'author_id' => 3,

            'publisher_id' => 2
        ]);
        $book4->genres()->attach(1);
        $book4->genres()->attach(2);
        $book4->genres()->attach(4);


        $book5 = Book::create([
            'title' => 'O HERÓI PERDIDO',
            'ISBN' => fake()->unique()->isbn13(),
            'description' => fake()->paragraph(),
            'image' => 'factory/the_lost_hero.jpg',
            'quantity' => fake()->numberBetween(1, 21),
            'rating' => fake()->randomFloat(1, 1, 5),
            'pages' => fake()->numberBetween(50, 500),
            'published_date' => fake()->date('d-m-Y'),
            'author_id' => 3,

            'publisher_id' => 2
        ]);
        $book5->genres()->attach(1);
        $book5->genres()->attach(2);
        $book5->genres()->attach(4);

        $book6 = Book::create([
            'title' => 'A GUERRA DOS TRONOS',
            'ISBN' => fake()->unique()->isbn13(),
            'description' => fake()->paragraph(),
            'image' => 'factory/game_of_thrones.jpg',
            'quantity' => fake()->numberBetween(1, 21),
            'rating' => fake()->randomFloat(1, 1, 5),
            'pages' => fake()->numberBetween(50, 500),
            'published_date' => fake()->date('d-m-Y'),
            'author_id' => 4,

            'publisher_id' => 4
        ]);
        $book6->genres()->attach(2);
        $book6->genres()->attach(3);

        $book7 = Book::create([
            'title' => 'A FÚRIA DOS REIS',
            'ISBN' => fake()->unique()->isbn13(),
            'description' => fake()->paragraph(),
            'image' => 'factory/clash_of_kings.jpg',
            'quantity' => fake()->numberBetween(1, 21),
            'rating' => fake()->randomFloat(1, 1, 5),
            'pages' => fake()->numberBetween(50, 500),
            'published_date' => fake()->date('d-m-Y'),
            'author_id' => 4,

            'publisher_id' => 4
        ]);
        $book7->genres()->attach(2);
        $book7->genres()->attach(3);
    }
}