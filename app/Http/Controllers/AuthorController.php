<?php  

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:255',
        ]);

        return Author::create($validated);
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $author->update($validated);
        return $author;
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->noContent();
    }

    public function books(Author $author)
    {
        return $author->books()->with(['genre', 'reviews'])->get();
    }
}
