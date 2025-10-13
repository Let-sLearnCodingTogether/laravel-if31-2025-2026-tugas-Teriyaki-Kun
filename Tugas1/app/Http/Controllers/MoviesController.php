<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movies;

class MoviesController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'status' => 'required|string|max:50'

        ]);

        $validatedData['user_id'] = Auth::id();
        dd(Auth::id());
        $movie = Movies::create($validatedData);

        return response()->json([
            'message' => 'Movie created successfully',
            'data' => $movie
        ], 201);
    }

    public function index()
    {
        $movies = Movies::all();
        return response()->json($movies);
    }
    public function update(Request $request, $id)
    {
        $movie = Movies::find($id);

        if (!$movie) {
            return response()->json([
                'message' => 'Movie not found'
            ], 404);
        }

        if ($movie->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $validatedData = $request->validate([

            'title' => 'sometimes|required|string|max:255',
            'director' => 'sometimes|required|string|max:255',
            'genre' => 'sometimes|required|string|max:100',
            'release_year' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
            'status' => 'sometimes|required|string|max:50'
        ]);

        $movie->update($validatedData);

        return response()->json([
            'message' => 'Movie updated successfully',
            'data' => $movie
        ], 200);
    }

    public function destroy($id)
    {
        $movie = Movies::find($id);

        if (!$movie) {
            return response()->json([
                'message' => 'Movie not found'
            ], 404);
        }

        if ($movie->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $movie->delete();

        return response()->json([
            'message' => 'Movie deleted successfully'
        ], 200);
    }

}
