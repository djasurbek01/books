@extends('books.layouts.app')

@section('title', 'Добавить книгу')

@section('content')
<h1>Добавить книгу</h1>

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="cover" class="form-label">Обложка</label>
        <input type="file" name="cover" class="form-control">
    </div>

    <div class="mb-3">
        <label for="genres" class="form-label">Жанры</label>
        <select name="genres[]" class="form-control" multiple required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Сохранить</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary"><i class="fas fa-reply"></i> Назад</a>
</form>
@endsection
