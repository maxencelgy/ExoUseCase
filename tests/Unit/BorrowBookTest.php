<?php

namespace Tests\Unit;

use App\Domain\Entities\Book;
use App\Domain\UseCases\BorrowBook;
use PHPUnit\Framework\TestCase;

class BorrowBookTest extends TestCase
{
    public function testCanBorrowAvailableBook()
    {
        $book = new Book(1, 'Clean Architecture', false);
        $useCase = new BorrowBook();

        $result = $useCase->execute($book);

        $this->assertTrue($result['success']);
        $this->assertEquals('Clean Architecture', $result['book']['title']);
    }

    public function testCannotBorrowAlreadyBorrowedBook()
    {
        $book = new Book(1, 'Clean Architecture', true);
        $useCase = new BorrowBook();

        $result = $useCase->execute($book);

        $this->assertFalse($result['success']);
        $this->assertEquals('Clean Architecture', $result['book']['title']);
    }
}
