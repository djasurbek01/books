<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GenreApiController;
use App\Http\Controllers\Api\BookApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/genres', [GenreApiController::class, 'index']);
Route::get('/genres/{id}', [GenreApiController::class, 'show']);
Route::get('/books', [BookApiController::class, 'index']);
Route::get('/books/{id}', [BookApiController::class, 'show']);