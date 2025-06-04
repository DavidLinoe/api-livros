<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthorController,
    BookController,
    GenreController,
    ReviewController
};


Route::get('/', function () {
    return response()->json(['message' => 'API funcionando!']);
});

Route::prefix('v1')->group(function () {
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('books', BookController::class);
    Route::apiResource('genres', GenreController::class);
    Route::apiResource('reviews', ReviewController::class);

    Route::get('authors/{author}/books', [AuthorController::class, 'books']);
    Route::get('books/{book}/reviews', [BookController::class, 'reviews']);
    Route::get('genres/{genre}/books', [GenreController::class, 'books']);
    Route::get('users/{user}/reviews', [ReviewController::class, 'userReviews']);
});