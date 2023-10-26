<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Author;
use App\Models\Student;
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
        'published_year',
        'author_id',
        'publisher_id',
        'genre_id',

    ];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'book_student');
    }

}