@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Livro</h1>

    <!-- Formulário para adicionar um novo livro -->
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <!-- Campo para título -->
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" required />
        </div>

        <!-- Campo para autor -->
        <div class="form-group">
            <label for="author_id">Autor</label><br />
            <!-- Dropdown com autores -->
            <select name='author_id' id='author_id' required class='form-control'>
                @foreach ($authors as $author)
                    <!-- Opção com o nome do autor -->
                    <option value='{{ $author->id }}'>{{ $author->first_name }} {{ $author->last_name }}</option> 
                @endforeach
            </select><br />
        </div>

        <!-- Campo para gênero -->
        <div class='form-group'>
            <!-- Campo para gênero -->
            <label for='genre'>Gênero</label><br />
            <!-- Campo de texto para gênero -->
            <input type='text' name='genre' id='genre' required placeholder='Ex: Ficção Científica' class='form-control' />
        </div>

         <!-- Campo para idioma -->
         <!-- Campo de texto para idioma -->
         <!-- Campo de texto para ano de publicação -->
         <!-- Campo de texto para observações -->

         ...

         <!-- Botão de salvar -->
         <!-- Botão que envia o formulário -->
         ...
         
    </form>

    
@endsection
