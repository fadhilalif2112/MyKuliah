<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\XtraController;

// Public Routes (Auth)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Protected Routes (Require Authentication)
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Tasks Management
    Route::resource('tasks', TaskController::class);

    // Exams Management
    Route::resource('exams', ExamController::class);

    // Subjects Management
    Route::resource('subjects', SubjectController::class);

    // Timetable Management
    Route::resource('timetable', TimetableController::class);

    // Settings
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');

    // Extra Activities
    Route::get('xtra', [XtraController::class, 'index'])->name('xtra');
});
