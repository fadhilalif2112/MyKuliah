<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'dashboard')->name('dashboard');
Route::view('/timetable', 'timetable.index')->name('timetable');
Route::view('/tasks', 'tasks.index')->name('tasks');
Route::view('/exams', 'exams.index')->name('exams');
Route::view('/xtra', 'xtra.index')->name('xtra');
Route::view('/subjects', 'subjects.index')->name('subjects');
Route::view('/settings', 'settings.index')->name('settings');
Route::view('/auth/login', 'auth.login')->name('login');
Route::view('/auth/register', 'auth.register')->name('register');
