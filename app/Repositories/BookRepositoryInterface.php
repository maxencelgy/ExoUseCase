<?php

namespace App\Repositories;

use App\Domain\Entities\Book;

interface BookRepositoryInterface
{
    public function findById(int $id): ?Book;
    public function save(Book $book): void;
}
