<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::with('genres')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('cover')) {
            $data['cover_url'] = $request->file('cover')->store('covers', 'public');
        } else {
            $data['cover_url'] = 'covers/default_cover.jpg';
        }
    
        $book = Book::create($data);
        $book->genres()->attach($request->genres);
    
        return redirect()->route('books.index')->with('success', 'Книга добавлена.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {  
        $genres = Genre::all();
        return view('books.edit', compact('book', 'genres'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);
    
        $data = $request->only(['title']);

        if ($request->hasFile('cover')) {
            $data['cover_url'] = $request->file('cover')->store('covers', 'public');
        }
    
        $book->update($data);
        $book->genres()->sync($request->genres);
    
        return redirect()->route('books.index')->with('success', 'Книга обновлена.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Книга удалена.');
    }

    public function publish(Book $book)
    {
        $book->update(['status' => 'published']);
        return redirect()->route('books.index')->with('success', 'Книга опубликована.');
    }
}
