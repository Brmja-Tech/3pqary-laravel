<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ClaintRateController;
use App\Http\Controllers\Front\frontController;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Courses\CourseController;
use App\Http\Controllers\Dashboardd\RoleController;
use App\Http\Controllers\subject\SubjectController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboardd\{HomeController, AuthController};

require __DIR__ . '/auth.php';

/////////////////////////////////// dashboard routes ////////////////////////////////////
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware(['auth'])->group(function () {
        Route::resource('contact-us', ContactUsController::class)->names('contact-us');
        Route::resource('settings', SettingController::class)->names('settings');
        Route::resource('gallery', GalleryController::class)->names('gallery');
        Route::resource('grade', GradeController::class)->names('grade');
        Route::resource('claint_rates', ClaintRateController::class)->names('claint_rates');
        Route::resource('blog', BlogController::class)->names('blog');
        Route::resource('subject', SubjectController::class)->names('subject');
        Route::resource('roles', RoleController::class);
        Route::resource('courses', CourseController::class)->names('courses');
        Route::resource('teachers', TeacherController::class)->names('teachers');
        Route::resource('admins', AdminUserController::class)->names('admins');
        Route::get('/admin', function () {
            return view('dashboard.pages.index');
        })->name('admin');
        Route::get('/dashboard', function () {
            return view('dashboard.pages.index');
        })->name('dashboard');
    });
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

