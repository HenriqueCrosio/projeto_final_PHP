@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Autores</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary">Adicionar Autor</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>País</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->first_name }} {{ $author->last_name }}</td>
                    <td>{{ $author->country }}</td>
                    <td>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
