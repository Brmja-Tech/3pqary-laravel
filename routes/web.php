<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\frontController;

/////////////////////////////////// front routes ////////////////////////////////////

Route::get('/', [frontController::class, 'home'])->name('/');
Route::get('/home', [frontController::class, 'home'])->name('home');
Route::get('/about-us', [frontController::class, 'aboutUs'])->name('about-us');
Route::get('/subjects', [frontController::class, 'subjects'])->name('subjects');
Route::get('/subject-details/{id}', [frontController::class, 'show'])->name('subject-details');
Route::get('/blog-details/{id}', [frontController::class, 'blog_details'])->name('blog-details');
Route::get('/blogs', [frontController::class, 'blogs'])->name('blogs');
Route::get('/gallary', [frontController::class, 'gallary'])->name('gallary');
Route::get('/contact-us', [frontController::class, 'contact'])->name('contact-us');
Route::get('/registration', [frontController::class, 'registration'])->name('registration');
Route::get('/user-login', [frontController::class, 'login'])->name('user-login');
Route::post('/user-login-data', [frontController::class, 'userLogin'])->name('user-login-data');
Route::post('/user-register', [frontController::class, 'register'])->name('user-register');

