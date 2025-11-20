<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Container\Attributes\Auth;

Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('store_register');

Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('store_login');



Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);



Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('store_logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'dashboard')->name('dashboard');
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/Timetable', 'timetable.index')->name('timetable');
Route::view('/Tasks', 'tasks.index')->name('tasks');
Route::view('/Exams', 'exams.index')->name('exams');
Route::view('/Xtra', 'xtra.index')->name('xtra');
Route::view('/Subjects', 'subjects.index')->name('subjects');
Route::view('/Settings', 'settings.index')->name('settings');
Route::view('/Auth/login', 'auth.login')->name('login');
Route::view('/Auth/register', 'auth.register')->name('register');
