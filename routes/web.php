<?php

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
    return view('pages.home');
})->name('home');

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/artikelen', function () {
    return view('pages.artikelen');
})->name('artikelen');

Route::get('/over', function () {
    return view('pages.over');
})->name('over');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
