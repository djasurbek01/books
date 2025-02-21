@extends('books.layouts.app')

@section('title', 'Список книг')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Список книг</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary"><i class="fas fa-add"></i> Добавить книгу</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Обложка</th>
            <th>Название</th>
            <th>Статус</th>
            <th>Жанры</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                @if ($book->cover_url == 'covers/default_cover.jpg')
                    <td><img src="{{ asset('/images/' . $book->cover_url) }}" width="50"></td>
                @else
                    <td><img src="{{ asset('/storage/' . $book->cover_url) }}" width="50"></td>
                @endif
                <td>{{ $book->title }}</td>
                @if($book->status == 'published')
                    <td>Опубликована</td>
                @else
                    <td>Черновик</td>
                @endif
                <td>{{ $book->genres->pluck('name')->join(', ') }}</td>
                <td>
                    <a href="{{ route('books.edit', $book) }}" title="Редактировать" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" title="Удалить" class="btn btn-sm btn-danger"><sh class="fas fa-trash"></i></button>
                    </form>
                    @if($book->status == 'chernovik')
                        <form action="{{ route('books.publish', $book) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success" title="Опубликовать"><i class="fas fa-external-link"></i></button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $books->links() }}
@endsection
