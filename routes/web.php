<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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
require __DIR__.'/auth.php';


//Non Controller Pages
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/over', function () {
    return view('pages.about');
})->name('over');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth'])->name('dashboard');

//Articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('article_create');
Route::post('/articles', [ArticleController::class, 'store']);
Route::get('/article/{slug}', [ArticleController::class, 'show']);
Route::get('/article/{slug}/edit', [ArticleController::class, 'edit']);
Route::put('/article/{post}', [ArticleController::class, 'update']);
Route::delete('/articles/{post}', [ArticleController::class, 'destroy']);
