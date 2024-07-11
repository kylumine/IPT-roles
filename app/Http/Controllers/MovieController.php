<?php

namespace App\Http\Controllers;

use App\Exports\MoviesDataExport;
use App\Models\Movie;
use App\Events\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', ['movies' => $movies]);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('create movie'), 403);
        $validatedData = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'rate_per_day' => 'required',
            'imageUrl' => 'required',
        ]);
        $movie = Movie::create($validatedData);

        $log_entry = 'Added a new movie "' . $movie->title . '" with the ID# of ' . $movie->id;
        event(new UserLog($log_entry));

        return redirect()->route('movie.index')->with('success', 'Product created successfully.');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required',
    //         'genre' => 'required',
    //         'rate_per_day' => 'required',
    //         'imageUrl' => 'required',
    //     ]);

    //     Movie::create($validatedData);

    //     return redirect()->route('movie.index')->with('success', 'Movie created successfully.');
    // }

    public function update(Request $request, Movie $movie)
    {
        abort_if(Gate::denies('edit movie'), 403);
        $validatedData = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'rate_per_day' => 'required',
            'imageUrl' => 'required',
        ]);
        $movie->update($validatedData);

        $log_entry = 'Updated the movie "' . $movie->title . '" with the ID# of ' . $movie->id;
        event(new UserLog($log_entry));

        return redirect()->route('movie.index')->with('success', 'Movie updated successfully.');
    }

    // public function update(Request $request, Movie $movie)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required',
    //         'genre' => 'required',
    //         'rate_per_day' => 'required',
    //         'imageUrl' => 'required',
    //     ]);

    //     $movie->update($validatedData);

    //     return redirect()->route('movie.index')->with('success', 'Movie updated successfully.');
    // }

    public function destroy(Movie $movie)
    {
        abort_if(Gate::denies('delete movie'), 403);
        $movie->delete();

        $log_entry = 'Deleted the movie "' . $movie->title . '" with the ID# of ' . $movie->id;
        event(new UserLog($log_entry));

        return redirect()->route('movie.index')->with('success', 'Product deleted successfully.');
    }

    // public function destroy(Movie $movie)
    // {
    //     $movie->delete();

    //     return redirect()->route('movie.index')->with('success', 'Movie deleted successfully.');
    // }

    // public function forexcel()
    // {
    //     $mov = Movie::orderBy('id')->get();
    //     return view('excel',['movies' => $mov]);
    // }
    public function exportExcel()
    {
        abort_if(Gate::denies('export movie'), 403);
        return Excel::download(new MoviesDataExport, 'movies-data.xlsx');
    }

    public function logs()
    {
        abort_if(Gate::denies('visit logs'), 403);
        $logs = auth()->user()->logs;
        return view('logs', compact('logs'));
    }
}
