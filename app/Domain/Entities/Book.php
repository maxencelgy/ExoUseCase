<?php

namespace App\Domain\Entities;

class Book
{
    private int $id;
    private string $title;
    private bool $isBorrowed;

    public function __construct(int $id, string $title, bool $isBorrowed = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->isBorrowed = $isBorrowed;
    }

    public function borrow(): bool
    {
        if ($this->isBorrowed) {
            return false;
        }
        $this->isBorrowed = true;
        return true;
    }

    public function return(): bool
    {
        if (!$this->isBorrowed) {
            return false;
        }
        $this->isBorrowed = false;
        return true;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'isBorrowed' => $this->isBorrowed,
        ];
    }
}
