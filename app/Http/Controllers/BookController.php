<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::with(['author', 'genre'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'published_year' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        return Book::create($validated);
    }

    public function show(Book $book)
    {
        return $book->load(['author', 'genre']);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author_id' => 'sometimes|required|exists:authors,id',
            'genre_id' => 'sometimes|required|exists:genres,id',
            'published_year' => 'nullable|integer',
        ]);

        $book->update($validated);
        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->noContent();
    }

    public function reviews(Book $book)
    {
        return $book->reviews()->with('user')->get();
    }
}
