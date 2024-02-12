<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

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
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('posts');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('posts', PostController::class);
    Route::resource('comments',CommentController::class)->only(['store','destory']);
    Route::delete('/comments/{id}', [CommentController::class,'destory'])->name('comments.destory');
});

Route::get('posts/{id}','App\Http\Controllers\PostController@show');

// Route::prefix('posts')->group(function(){
//     Route::get('/',[PostController::class,'index'])->name('posts.index');
//     Route::get('/create',[PostController::class,'create'])->name('posts.create');
//     Route::get('/store',[PostController::class,'store'])->name('posts.store');
//     Route::get('/edit',[PostController::class,'edit'])->name('posts.edit');
//     Route::get('/update',[PostController::class,'update'])->name('posts.update');
//     Route::get('/show',[PostController::class,'show'])->name('posts.show');
//     Route::get('/destory',[PostController::class,'destory'])->name('posts.destory');
// });
    

// Route::resource('posts', PostController::class);
// Route::resource('comments',CommentController::class)->only(['store','destory']);
// Route::delete('/comments/{id}', [CommentController::class,'destory'])->name('comments.destory');
require __DIR__.'/auth.php';
