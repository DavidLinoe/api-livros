<?php
// app/Services/BookService.php
class BookService
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks()
    {
        return $this->bookRepository->getAll();
    }

    public function getBookById($id)
    {
        return $this->bookRepository->getById($id);
    }

    public function createBook(array $data)
    {
        return $this->bookRepository->create($data);
    }

    public function updateBook($id, array $data)
    {
        return $this->bookRepository->update($id, $data);
    }

    public function deleteBook($id)
    {
        return $this->bookRepository->delete($id);
    }

    public function getBookReviews($bookId)
    {
        return $this->bookRepository->getReviews($bookId);
    }

    public function getBooksWithDetails()
    {
        return $this->bookRepository->getWithDetails();
    }
}