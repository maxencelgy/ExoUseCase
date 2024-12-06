<?php

namespace App\Domain\UseCases;

use App\Domain\Entities\Book;

class ReturnBook
{
    public function execute(Book $book): array
    {
        if ($book->return()) {
            return [
                'success' => true,
                'message' => 'Book returned successfully.',
                'book' => $book->toArray(),
            ];
        }

        return [
            'success' => false,
            'message' => 'Book was not borrowed.',
            'book' => $book->toArray(),
        ];
    }
}
