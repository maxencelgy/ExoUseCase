<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create(['title' => 'Livre 1']);
        Book::create(['title' => 'Livre 2']);
        Book::create(['title' => 'Livre 3']);
    }
}
