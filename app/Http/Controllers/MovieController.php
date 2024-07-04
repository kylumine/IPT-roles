<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', ['movies' => $movies]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'rate_per_day' => 'required',
            'imageUrl' => 'required',
        ]);

        Movie::create($validatedData);

        return redirect()->route('movie.index')->with('success', 'Movie created successfully.');
    }

    public function update(Request $request, Movie $movie)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'rate_per_day' => 'required',
            'imageUrl' => 'required',
        ]);

        $movie->update($validatedData);

        return redirect()->route('movie.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movie.index')->with('success', 'Movie deleted successfully.');
    }
}
