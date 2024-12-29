@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>
    <p><strong>Autor:</strong> {{ $book->author->first_name }} {{ $book->author->last_name }}</p>
    <p><strong>Gênero:</strong> {{ $book->genre }}</p>
    <p><strong>Idioma:</strong> {{ $book->language }}</p>
    <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
    <p><strong>Ano de Publicação:</strong> {{ $book->publication_year }}</p>
    <p><strong>Observações:</strong> {{ $book->observations }}</p>

    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
