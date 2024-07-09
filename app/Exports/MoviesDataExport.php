<?php

namespace App\Exports;

use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MoviesDataExport implements FromView, ShouldAutoSize
{

    use Exportable;

    private $movies;

    public function __construct(){
        $this->movies = Movie::orderBy('id')->get();
    }

    public function view(): View
    {
        return view('excel', ['movie' => $this->movies]);
    }
}
