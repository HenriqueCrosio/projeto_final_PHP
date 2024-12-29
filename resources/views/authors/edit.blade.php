@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Autor</h1>
    <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">Nome</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $author->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Sobrenome</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $author->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="country">País</label>
            <input type="text" class="form-control" id="country" name="country" value="{{ $author->country }}">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
