<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

// login route
Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::post('/handle_login', [AuthController::class, 'handle_login'])->name('handle_login');

Route::middleware('auth:sanctum')->group(function () {
    // protected routes go here

    // dashboard
    Route::get("/dashboard", [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard/authors', [AuthorController::class, 'index'])->name('authors');
    Route::post('/authors/create', [AuthorController::class, 'create'])->name('author_create');

    Route::get("/dashboard/publishers", [PublisherController::class, 'index'])->name('publishers');
    Route::post("/publishers/create", [PublisherController::class, 'create'])->name('publisher_create');

    Route::get("/dashboard/genres", [GenreController::class, 'index'])->name('genres');
    Route::post("/genres/create", [GenreController::class, 'create'])->name('genre_create');

    Route::get("/dashboard/books", [BookController::class, 'index'])->name('books');
    Route::post("/books/create", [BookController::class, 'create'])->name('book_create');

    // Log out of admin dashboard
    Route::get("/logout", [AuthController::class, 'logout'])->name('logout');
});