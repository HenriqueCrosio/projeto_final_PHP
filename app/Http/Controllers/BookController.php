<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre' => 'required|max:255',
            'language' => 'required|max:255',
            'isbn' => 'required|unique:books,isbn',
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'),
            'observations' => 'nullable'
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index')
            ->with('success', 'Livro criado com sucesso.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre' => 'required|max:255',
            'language' => 'required|max:255',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'),
            'observations' => 'nullable'
        ]);

        $book->update($validatedData);

        return redirect()->route('books.index')
            ->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Livro removido com sucesso.');
    }

    public function search(Request $request)
    {
        $query = Book::with('author');

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('author')) {
            $query->whereHas('author', function($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->author . '%')
                   ->orWhere('last_name', 'like', '%' . $request->author . '%');
            });
        }

        if ($request->filled('genre')) {
            $query->where('genre', 'like', '%' . $request->genre . '%');
        }

        $books = $query->get();

        return view('books.index', compact('books'));
    }
}

