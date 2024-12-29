<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

// Rota principal redirecionando para a lista de livros
Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para todos os usuários autenticados
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

    // Rotas apenas para administradores
    Route::middleware(['admin'])->group(function () {
        Route::resource('books', BookController::class)->except(['index', 'show']);
        Route::resource('authors', AuthorController::class);
    });
});

require __DIR__.'/auth.php';





