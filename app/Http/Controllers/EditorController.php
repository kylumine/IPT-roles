<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('editor.index', ['movies' => $movies]);
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

        return redirect()->route('editor.movie.index')->with('success', 'Movie updated successfully.');
    }
}
