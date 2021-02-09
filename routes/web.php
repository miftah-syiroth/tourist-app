<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecreationController;
use App\Models\Article;
use App\Models\Recreation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');

    /** ini route untuk kelola artikel */
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::get('/articles/{article:slug}/edit', [ArticleController::class, 'edit']);
    Route::patch('/articles/{article:slug}', [ArticleController::class, 'update']);
    Route::delete('/articles/{article:slug}', [ArticleController::class, 'destroy']);

    /**route untuk kategori artikel */
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

    /**route untuk rekreasi */
    Route::get('/recreations', [RecreationController::class, 'index'])->name('recreations.index');
    Route::get('/recreations/create', [RecreationController::class, 'create'])->name('recreations.create');
    Route::post('/recreations', [RecreationController::class, 'store'])->name('recreations.store');
    Route::get('/recreations/{recreation:slug}/edit', [RecreationController::class, 'edit'])->name('recreations.edit');
    Route::patch('/recreations/{recreation:slug}', [RecreationController::class, 'update'])->name('recreations.update');
    Route::delete('/recreations/{recreation:slug}', [RecreationController::class, 'destroy'])->name('recreations.destroy');
});



require __DIR__ . '/auth.php';
