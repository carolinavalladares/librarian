<?php

use App\Models\Genre;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Student;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ISBN');
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->integer('quantity');
            $table->integer('pages');
            $table->float('rating');
            $table->date('published_date');
            $table->foreignIdFor(Student::class)->nullable();
            $table->foreignIdFor(Author::class);
            $table->foreignIdFor(Publisher::class);
            $table->foreignIdFor(Genre::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};