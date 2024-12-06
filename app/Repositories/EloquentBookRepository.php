<?php

namespace App\Repositories;

use App\Models\Book as BookModel;
use App\Domain\Entities\Book;

class EloquentBookRepository implements BookRepositoryInterface
{
    public function findById(int $id): ?Book
    {
        $bookModel = BookModel::find($id);
        if (!$bookModel) {
            return null;
        }

        return new Book($bookModel->id, $bookModel->title, $bookModel->is_borrowed);
    }

    public function save(Book $book): void
    {
        // Recherche du modèle correspondant
        $bookModel = BookModel::find($book->toArray()['id']) ?? new BookModel();

        // Mise à jour des données
        $bookModel->id = $book->toArray()['id'];
        $bookModel->title = $book->toArray()['title'];
        $bookModel->is_borrowed = $book->toArray()['isBorrowed'];

        // Enregistrement dans la base de données
        $bookModel->save();
    }
}
