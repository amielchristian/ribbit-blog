<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('posts', [PostController::class, 'index'])->name('index');
Route::get('posts/{post_id}', [PostController::class, 'showPost'])->name('showPost');
Route::get('posts/{post_id}/download', [PostController::class, 'downloadPost'])->name('downloadPost');

Route::get('create-post', function () {
    return view('create-post');
})->name('create-post');
Route::post('create', [PostController::class, 'store'])->name('store');

Route::post('comment', [PostController::class, 'comment'])->name('comment');

Route::get('posts/{post_id}/update', [PostController::class, 'updatePost'])->name('updatePost');
Route::post('update', [PostController::class, 'update'])->name('update');

Route::delete('posts/{post_id}/destroy', [PostController::class, 'destroy'])->name('deletePost');