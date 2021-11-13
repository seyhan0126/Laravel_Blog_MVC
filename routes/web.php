<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\Authenticate;

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


//   route path(name)        controller: method        name to the view

//home routes
Route::get('/', [PostController::class, 'index'])->name('post.index');

//post routes
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->middleware('auth')->name('post.create');
Route::get('/post/{post}/edit',[PostController::class, 'edit'])->name('post.edit');
Route::put('/post/{post}',[PostController::class, 'update'])->name('post.update');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::delete('/post/{post}',[PostController::class, 'destroy'])->name('post.destroy');
Route::get('post/{post}/show', [PostController::class, 'show'])->name('post.show');

//contact route
// Route::get('/contact/index', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

//route group check
Route::get('/auth/login',[AuthController::class,'login'])->name('auth.login');
Route::get('/auth/register',[AuthController::class,'register'])->name('auth.register');
    

//auth route
Route::post('/auth/save', [AuthController::class, 'handleRegister'])->name('auth.handleRegister');
//login post route
Route::post('/auth/check',[AuthController::class, 'check'])->name('auth.check');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

//edit auth user password route
Route::get('/user/{user}/edit-password',[UserController::class, 'editPassword'])->name('edit.password');
Route::put('/user/update-password',[UserController::class, 'updatePassword'])->name('update.password');

//edit auth user mail and username route
Route::get('/user/{user}/edit-profil',[UserController::class, 'editProfil'])->name('edit.profil');
Route::put('/user/update-profil',[UserController::class, 'updateProfil'])->name('update.profil');

//comment routes
Route::post('/post/{post}/comments',[CommentController::class,'store'])->middleware('auth')->name('comment.add');
Route::put('/comment/{id}',[CommentController::class,'update'])->middleware('auth')->name('comment.update');
Route::delete('/comment/{id}',[CommentController::class,'destroy'])->name('comment.delete');

//image update
Route::put('image/{id}', [UserController::class, 'imageUpdate'])->name('image.update');