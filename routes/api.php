<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BookController,
    AuthorController,
    GenreController,
    ReviewController,
    UserController
};
use Illuminate\Http\Request;

Route::get('/status', function() {
    return response()->json([
        'status' => 'online',
        'message' => 'API de Livros funcionando'
    ]);
}); // faltava ponto e vírgula aqui

Route::group([], function () {
    // Rotas CRUD principais
    Route::apiResource('books', BookController::class);
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('genres', GenreController::class);
    Route::apiResource('reviews', ReviewController::class);
    Route::apiResource('users', UserController::class); // aqui era 'reviews' repetido

    // Rotas de relacionamento
    Route::get('/books/{book}/reviews', [BookController::class, 'reviews'])
        ->name('books.reviews');

    Route::get('/authors/{author}/books', [AuthorController::class, 'books'])
        ->name('authors.books');

    Route::get('/genres/{genre}/books', [GenreController::class, 'books'])
        ->name('genres.books');
});
