<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'approved',
        'registration'
    ];


    public function borrowed_books()
    {
        return $this->belongsToMany(Book::class, 'book_student');
    }
}