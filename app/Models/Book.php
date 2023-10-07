<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'ISBN',
        'pages',
        'rating',
        'quantity',
        'author_id',
        'published_id',
        'genre_id',

    ];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

}