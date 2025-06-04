<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BookController,
    AuthorController,
    GenreController,
    ReviewController
};

Route::prefix('api')->middleware('api')->group(function () {
    
    Route::apiResource('books', BookController::class);
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('genres', GenreController::class);
    Route::apiResource('reviews', ReviewController::class);
    
    Route::get('books/{book}/reviews', [BookController::class, 'showReviews']);
    Route::get('authors/{author}/books', [AuthorController::class, 'showBooks']);
    Route::get('genres/{genre}/books', [GenreController::class, 'showBooks']);
});

Route::get('/', function () {
    return view('welcome');
});