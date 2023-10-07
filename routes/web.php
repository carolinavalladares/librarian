<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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


});