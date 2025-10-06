<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Movies extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'movie_id' => 'required|unique:movies,movie_id',
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'release_year' => 'required|integer' . date('Y')
        ]);

        $movie = Movies::create($validatedData);

        return response()->json([
            'message' => 'Movie created successfully',
            'data' => $movie
        ], 201);
    }

    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }
}
