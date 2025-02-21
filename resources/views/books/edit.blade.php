@extends('books.layouts.app')

@section('title', 'Редактировать книгу')

@section('content')
<h1>Редактировать книгу</h1>

<form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
    </div>

    <div class="mb-3">
        <label for="cover" class="form-label">Обложка</label>
        <input type="file" name="cover" class="form-control">
        @if($book->cover_url)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $book->cover_url) }}" width="100">
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="genres" class="form-label">Жанры</label>
        <select name="genres[]" class="form-control" multiple required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" 
                    {{ in_array($genre->id, $book->genres->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Сохранить</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary"><i class="fas fa-reply"></i> Назад</a>
</form>
@endsection
