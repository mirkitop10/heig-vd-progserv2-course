<?php

class Book {
    private string $title;
    private string $author;
    private string $isbn;
    private bool $isAvailable = true;


    public function __construct(string $title, string $author, string $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
    }

    public function getTitle(): string {
        return $this->title;
    }
    public function getAuthor(): string {
        return $this->author;
    }
    public function getIsbn(): string {
        return $this->isbn;
    }
    public function getIsAvailable(): bool {
        return $this->isAvailable;
    }

    public function borrow(): bool {

        if ($this->isAvailable) {
            $this->isAvailable = false;
            return true;
        } else {
            return false;
        }
    }

    public function return(): void {
        $this->isAvailable = true;
    }

    public function getInfo(): string {
        $status = $this->isAvailable ? "Disponible" : "Emprunté";
        return $this->title . ", " . $this->author . ", " . $this->isbn . " (" . $status . ")";
    }
}
