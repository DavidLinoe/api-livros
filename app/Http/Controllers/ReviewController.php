<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::with(['book', 'user'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:0,5',
            'comment' => 'nullable|string',
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
        ]);

        return Review::create($validated);
    }

    public function show(Review $review)
    {
        return $review->load(['book', 'user']);
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'rating' => 'sometimes|integer|between:0,5',
            'comment' => 'sometimes|nullable|string',
        ]);

        $review->update($validated);
        return $review;
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->noContent();
    }

    public function userReviews($userId)
    {
        return Review::with('book')->where('user_id', $userId)->get();
    }
}
