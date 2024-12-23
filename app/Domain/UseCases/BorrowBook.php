<?php

namespace App\Domain\UseCases;

use App\Domain\Entities\Book;

class BorrowBook
{
    public function execute(Book $book): array
    {
        if ($book->borrow()) {
            return [
                'success' => true,
                'message' => 'Book borrowed successfully.',
                'book' => $book->toArray(),
            ];
        }

        return [
            'success' => false,
            'message' => 'Book is already borrowed.',
            'book' => $book->toArray(),
        ];
    }
}
