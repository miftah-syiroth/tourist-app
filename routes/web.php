<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HeadlineController;
use App\Http\Controllers\HeroImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RecreationController;
use Barryvdh\Debugbar\DataCollector\EventCollector;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('frontpage.index');
// });

Route::get('/', [PageController::class, 'index']);
Route::get('/recreations', [PageController::class, 'recreation']);
Route::get('/events', [PageController::class, 'event']);
Route::get('/facilities', [PageController::class, 'facility']);

Route::view('/ujidashboard', 'temp');
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
    Route::put('/articles/{article:slug}', [ArticleController::class, 'update']);
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
    Route::put('/recreations/{recreation:slug}', [RecreationController::class, 'update'])->name('recreations.update');
    Route::delete('/recreations/{recreation:slug}', [RecreationController::class, 'destroy'])->name('recreations.destroy');
    Route::patch('/recreations/{recreation:slug}', [RecreationController::class, 'setStatus']);

    /**route untuk acara */
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store']);
    Route::get('/events/{event:slug}/edit', [EventController::class, 'edit']);
    Route::put('/events/{event:slug}', [EventController::class, 'update']);
    Route::delete('/events/{event:slug}', [EventController::class, 'destroy']);
    Route::patch('/events/{event:slug}', [EventController::class, 'setStatus']);

    /**route untuk hero image */
    Route::get('/hero-images', [HeroImageController::class, 'index']);
    Route::post('/hero-images', [HeroImageController::class, 'store']);
    Route::delete('/hero-images/{heroImage}', [HeroImageController::class, 'destroy']);
    Route::patch('/hero-images/{heroImage}', [HeroImageController::class, 'setStatus']);

    /**route untuk view dashboard */
    Route::get('/component-view', [DashboardController::class, 'componentView']);

    /**route untuk headline */
    Route::put('/headlines/{headline}', [HeadlineController::class, 'update']);
});



require __DIR__ . '/auth.php';
