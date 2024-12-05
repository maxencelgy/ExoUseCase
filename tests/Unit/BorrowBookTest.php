<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Domain\UseCases\BorrowBook;
use Tests\TestCase;

class BorrowBookTest extends TestCase
{
    public function testCanBorrowAvailableBook()
    {
        $book = new Book(['title' => 'Livre', 'is_borrowed' => false]);
        $useCase = new BorrowBook();

        $result = $useCase->execute($book);

        $this->assertTrue($result['success']);
        $this->assertEquals('Livre', $result['bookTitle']);
    }

    public function testCannotBorrowAlreadyBorrowedBook()
    {
        $book = new Book(['title' => 'Livre', 'is_borrowed' => true]);
        $useCase = new BorrowBook();

        $result = $useCase->execute($book);

        $this->assertFalse($result['success']);
        $this->assertEquals('Clean Architecture', $result['bookTitle']);
    }
}
