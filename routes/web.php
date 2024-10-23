<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//============================ authentication routes =========================================================
Auth::routes();
//================================== guest routes ============================================================
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
//======================================== auth routes =======================================================
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/posts', PostController::class)->except('show');
    Route::post('post/{post}/add-comment', [PostController::class,'addComment'])->name('post.comment'); 
});
//=============================================================================================================