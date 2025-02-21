<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreApiController extends Controller
{
    public function index()
    {
        return response()->json(Genre::all());
    }

    public function show($id)
    {
        $genre = Genre::with('books')->findOrFail($id);
        return response()->json($genre);
    }
}
