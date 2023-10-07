<?php

use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authors_books', function (Blueprint $table) {
            $table->foreignIdFor(Book::class);
            $table->foreignIdFor(Author::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors_books');
    }
};