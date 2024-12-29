@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Livro</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required />
        </div>

        <div class="form-group">
            <label for="author_id">Autor</label><br />
            <select name='author_id' id='author_id' required class='form-control'>
                @foreach ($authors as $author)
                    <option value='{{ $author->id }}' {{ $author->id == $book->author_id ? 'selected' : '' }}>
                        {{ $author->first_name }} {{ $author->last_name }}
                    </option>
                @endforeach
            </select><br />
        </div>

        <div class='form-group'>
            <label for='genre'>Gênero</label><br />
            <input type='text' name='genre' id='genre' value="{{ $book->genre }}" required placeholder='Ex: Ficção Científica' class='form-control' />
        </div>

        <!-- Campos adicionais para idioma, ISBN, ano de publicação e observações -->
        
        <!-- Campo para idioma -->
        <div class='form-group'>
            <label for='language'>Idioma</label><br />
            <input type='text' name='language' id='language' value="{{ $book->language }}" required class='form-control' />
        </div>

        <!-- Campo para ISBN -->
        <div class='form-group'>
            <label for='isbn'>ISBN</label><br />
            <input type='text' name='isbn' id='isbn' value="{{ $book->isbn }}" required class='form-control' />
        </div>

        <!-- Campo para ano de publicação -->
        <div class='form-group'>
            <label for='publication_year'>Ano de Publicação</label><br />
            <input type='number' name='publication_year' id='publication_year' value="{{ $book->publication_year }}" required class='form-control' min="1000" max="{{ date('Y') }}" />
        </div>

        <!-- Campo para observações -->
        <div class='form-group'>
            <label for='observations'>Observações</label><br />
            <textarea name='observations' id='observations' class='form-control'>{{ $book->observations }}</textarea>
        </div>

        <!-- Botão de salvar -->
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
