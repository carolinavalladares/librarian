<?php

use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;

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
    Route::post('/authors/create', [AuthorController::class, 'registerAuthor'])->name('author_create');

    Route::get("/dashboard/publishers", [PublisherController::class, 'index'])->name('publishers');

    // Log out of admin dashboard
    Route::get("/logout", [AuthController::class, 'logout'])->name('logout');
});