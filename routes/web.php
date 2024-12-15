<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\frontController;
use App\Http\Controllers\Dashboardd\{HomeController,AuthController};

// Admin Panel
Route::get('/admin/login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/admin/login',[AuthController::class,'loginAction'])->name('loginAction')->middleware('guest');

Route::group(['middleware' => 'auth','prefix' => 'admin',  'as' => 'Admin.'], function () {
    // home
    Route::get('/home',[HomeController::class,'index'])->name('adminHome');

    // logout
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});

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

