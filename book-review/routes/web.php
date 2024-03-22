<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
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

Route::resource('books', BookController::class)
    ->only(['index', 'show']);
//
Route::resource('books.reviews', ReviewController::class);
//    ->scoped(['review' => 'book'])
//    ->only(['create', 'store']);
