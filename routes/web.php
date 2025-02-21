<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Главная страница
Route::get('/', function () {
    return redirect()->route('books.index');
});
// CRUD для жанров
Route::resource('genres', GenreController::class)->except(['show']);

// CRUD для книг
Route::resource('books', BookController::class);

// Отдельный маршрут для публикации книги
Route::post('books/{book}/publish', [BookController::class, 'publish'])->name('books.publish');

Route::resource('genres', GenreController::class);
Route::resource('books', BookController::class);
Route::patch('/books/{book}/publish', [BookController::class, 'publish'])->name('books.publish');
