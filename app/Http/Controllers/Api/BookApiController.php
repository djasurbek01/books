<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
    public function index()
    {
        return response()->json(Book::where('status', 'published')->paginate(10));
    }

    public function show($id)
    {
        $book = Book::where('status', 'published')->with('genres')->findOrFail($id);
        return response()->json($book);
    }
}
