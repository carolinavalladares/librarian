<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\StudentController;
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

// student registration
Route::get("/students/register", [StudentController::class, 'register'])->name('student_register');
Route::post("/students/handle_register", [StudentController::class, 'handle_register'])->name('handle_student_register');

// protected routes go here
Route::middleware('auth:sanctum')->group(function () {

    // dashboard
    Route::get("/dashboard", [UserController::class, 'dashboard'])->name('dashboard');

    // authors
    Route::get('/dashboard/authors', [AuthorController::class, 'index'])->name('authors');
    Route::post('/authors/create', [AuthorController::class, 'create'])->name('author_create');

    // publishers
    Route::get("/dashboard/publishers", [PublisherController::class, 'index'])->name('publishers');
    Route::post("/publishers/create", [PublisherController::class, 'create'])->name('publisher_create');

    // genres
    Route::get("/dashboard/genres", [GenreController::class, 'index'])->name('genres');
    Route::post("/genres/create", [GenreController::class, 'create'])->name('genre_create');

    // books
    Route::get("/dashboard/books", [BookController::class, 'index'])->name('books');
    Route::post("/books/create", [BookController::class, 'create'])->name('book_create');

    // students
    Route::get("/dashboard/students", [StudentController::class, 'index'])->name('students');
    Route::get("/students/approve/{student}", [StudentController::class, 'approve'])->name('approve_student');
    Route::get("/students/deny/{student}", [StudentController::class, 'deny'])->name('deny_student');

    // librarians
    Route::get('/librarians', [UserController::class, 'index'])->name('librarians');

    // Log out of admin dashboard
    Route::get("/logout", [AuthController::class, 'logout'])->name('logout');
});