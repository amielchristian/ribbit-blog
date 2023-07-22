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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('create-post', function () {
    return view('create-post');
});
Route::get('post/{postID}', [PostController::class, 'specificPost']);
Route::get('post/{postID}', [PostController::class, 'specificPost']);