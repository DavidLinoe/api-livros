<?php
namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::all();
    }

    public function store(Request $request)
    {
        // Validação simples da nota (0-5)
        $request->validate(['rating' => 'required|integer|between:0,5']);
        return Review::create($request->all());
    }

    public function show(Review $review)
    {
        return $review;
    }

    public function update(Request $request, Review $review)
    {
        $request->validate(['rating' => 'integer|between:0,5']);
        $review->update($request->all());
        return $review;
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->noContent();
    }

    // Rota adicional: Reviews de um usuário
    public function userReviews($userId)
    {
        return Review::where('user_id', $userId)->get();
    }
}