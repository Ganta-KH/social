<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/social/create', [PostController::class,'index'])->name('social.create');
Route::post('/home', [PostController::class,'store'])->name('social.store');
Route::get('/home/{id}', [PostController::class,'show'])->name('social.show');
Route::get('/social/{id}', [PostController::class,'edit'])->name('social.edit');
Route::put('/social/update/{id}', [PostController::class,'update'])->name('social.update');
Route::delete('/social/delete/{id}', [PostController::class,'delete'])->name('social.delete');

Route::post('/comment/{id}', [CommentController::class,'store'])->name('comment.store');
