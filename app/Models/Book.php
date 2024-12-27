<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author_id', 'genre', 
        'language', 'isbn', 
        'publication_year', 'observations'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}

