<?php

use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\followController;
use App\Http\Controllers\likeController;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/myposts/{user}', [App\Http\Controllers\HomeController::class, 'show'])->name('home');
Route::get('/profile',[App\Http\Controllers\HomeController::class, 'show_user'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/posts/add',[postController::class, 'add']);
    Route::post('/posts/store',[postController::class, 'store']);
    Route::get('/posts/delete/{post}',[postController::class, 'delete']);
    Route::get('/posts/comments/{post}',[commentController::class, 'index']);
    Route::post('/comments/store/{post}',[commentController::class, 'store']);
    Route::get('/follow/store/{user}',[followController::class, 'store']);
    Route::get('/follow/show/{user}',[followController::class, 'show']);
    Route::get('/follow/accept/{user}',[followController::class, 'accept']);
    Route::get('/follow/un_follow/{user}',[followController::class, 'un_follow']);
    Route::get('/follow/un_following/{user}',[followController::class, 'un_following']);

    Route::post('/like_check/{post}',[likeController::class, 'index']);







});
