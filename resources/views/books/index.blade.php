@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Livros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Adicionar Livro</a>

    <!-- Adicione aqui um formulário de busca, se desejar -->

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Gênero</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->first_name }} {{ $book->author->last_name }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Editar</a>

                        <!-- Formulário para excluir o livro -->
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>

                        <!-- Link para visualizar detalhes do livro -->
                        <a href="{{ route('books.show', $book) }}" class="btn btn-info">Ver Detalhes</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
