<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about.html', [PageController::class, 'about'])->name('about');
Route::get('/contact.html', [PageController::class, 'contact'])->name('contact');

// Authentication routes

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::get('/sign_up', [RegisterController::class, 'create'])->name('sign_up');
Route::post('/sign_up', [RegisterController::class, 'store'])->name('sign_up.store');


Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
