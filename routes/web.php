<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin.index');


// Route::post('/movie/export', [MovieController::class, 'exportExcel'])->name('movie.excel');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'role:admin'])->name('admin.index');

Route::middleware('auth')->group(function () {
    Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');
    Route::get('/logs', [MovieController::class, 'logs'])->name('movie.logs');
    Route::post('/movie', [MovieController::class, 'store'])->name('movie.store');
    Route::post('/movie/export', [MovieController::class, 'exportExcel'])->name('movie.excel');
    Route::post('/movie/{movie}', [MovieController::class, 'update'])->name('movie.update');
    Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Route::middleware('auth', 'role:admin')->group(function () {
//     Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');
//     Route::post('/movie', [MovieController::class, 'store'])->name('movie.store');
//     Route::post('/movie/{movie}', [MovieController::class, 'update'])->name('movie.update');
//     Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');
//     // Route::post('/movie/export', [MovieController::class, 'exportExcel'])->name('movie.excel');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/user/movie', [UserController::class, 'index'])->middleware(['auth', 'role:user'])->name('user.movie.index');

// Route::middleware('auth', 'role:editor')->group(function () {
//     Route::get('/editor/movie', [EditorController::class, 'index'])->name('editor.movie.index');
//     Route::post('/editor/movie/{movie}', [EditorController::class, 'update'])->name('editor.movie.update');
// });

require __DIR__.'/auth.php';
