<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/home',[\App\Http\Controllers\PostController::class,'index']);
    Route::get('create-post',[\App\Http\Controllers\PostController::class,'create']);
    Route::get('edit/{id}',[\App\Http\Controllers\PostController::class,'edit']);
    Route::post('edit/{id}',[\App\Http\Controllers\PostController::class,'editPosts'])->name('edit.post');
    Route::post('/create',[\App\Http\Controllers\PostController::class,'createPosts']);
    Route::get('delete/{id}',[\App\Http\Controllers\PostController::class,'delete']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
