<?php

namespace App\Domain\UseCases;

use App\Models\Book;

class BorrowBook
{
    public function execute(Book $book): array
    {
        if ($book->is_borrowed) {
            return [
                'success' => false,
                'message' => 'Book déjà pris.',
                'bookTitle' => $book->title,
            ];
        }

        $book->is_borrowed = true;
        $book->save();

        return [
            'success' => true,
            'message' => 'Book emprunté avec succès.',
            'bookTitle' => $book->title,
        ];
    }
}
