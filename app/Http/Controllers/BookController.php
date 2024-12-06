<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\BorrowBook;
use App\Domain\UseCases\ReturnBook;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function borrow(Request $request, BorrowBook $borrowBook)
    {
        $validated = $request->validate(['bookId' => 'required|integer']);
        $book = $this->bookRepository->findById($validated['bookId']);

        if (!$book) {
            return response()->json(['success' => false, 'message' => 'Book not found.'], 404);
        }

        $result = $borrowBook->execute($book);
        $this->bookRepository->save($book);

        return response()->json($result);
    }

    public function return(Request $request, ReturnBook $returnBook)
    {
        $validated = $request->validate(['bookId' => 'required|integer']);
        $book = $this->bookRepository->findById($validated['bookId']);

        if (!$book) {
            return response()->json(['success' => false, 'message' => 'Book not found.'], 404);
        }

        $result = $returnBook->execute($book);
        $this->bookRepository->save($book);

        return response()->json($result);
    }
}
