<?php

use App\Http\Controllers\HomeController;
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

//Admin Routes

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

//Public Routes

Route::get('post-index',[\App\Http\Controllers\PostController::class,'index'])->name('post.index');
Route::get('post-create',[\App\Http\Controllers\PostController::class,'create'])->name('post.create');
Route::post('post-store',[\App\Http\Controllers\PostController::class,'store'])->name('post.store');

Route::get('delete-post/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');
Route::get('edit-post/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::put('update-post/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
