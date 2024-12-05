<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\BorrowBook;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function borrow(Request $request, BorrowBook $borrowBook)
    {
        $validated = $request->validate([
            'bookId' => 'required|integer|exists:books,id',
        ]);

        $book = Book::findOrFail($validated['bookId']);
        $response = $borrowBook->execute($book);

        return response()->json($response);
    }
}
