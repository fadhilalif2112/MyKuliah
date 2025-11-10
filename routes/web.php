<?php

use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', function () {
    $today = [
        'date' => 'Minggu, 9 November 2025',
        'classes' => [
            ['name' => 'Pemrograman Web', 'time' => '08:00 - 10:00', 'room' => 'Lab A', 'color' => '#3b82f6'],
            ['name' => 'Basis Data', 'time' => '10:30 - 12:30', 'room' => 'R301', 'color' => '#10b981'],
        ],
        'tasks' => [
            ['title' => 'Tugas UML Diagram', 'course' => 'Rekayasa Perangkat Lunak', 'due' => 'Besok', 'color' => '#f59e0b'],
            ['title' => 'Essay Database Normalization', 'course' => 'Basis Data', 'due' => 'Hari ini', 'color' => '#10b981'],
        ],
        'exams' => [
            ['name' => 'UTS Algoritma', 'date' => '15 Nov 2025', 'time' => '08:00', 'color' => '#ef4444'],
        ],
    ];

    $thisWeek = [
        'classes_count' => 18,
        'tasks_count' => 5,
        'exams_count' => 2,
    ];

    return view('dashboard.index', compact('today', 'thisWeek'));
});

// Courses
Route::get('/courses', function () {
    $courses = [
        ['name' => 'Pemrograman Web', 'lecturer' => 'Dr. Budi Santoso', 'code' => 'IF301', 'color' => '#3b82f6', 'credits' => 3],
        ['name' => 'Basis Data', 'lecturer' => 'Prof. Ani Wijaya', 'code' => 'IF302', 'color' => '#10b981', 'credits' => 3],
        ['name' => 'Rekayasa Perangkat Lunak', 'lecturer' => 'Dr. Candra Putra', 'code' => 'IF303', 'color' => '#f59e0b', 'credits' => 4],
        ['name' => 'Algoritma Lanjut', 'lecturer' => 'Drs. Eko Prasetyo', 'code' => 'IF304', 'color' => '#ef4444', 'credits' => 3],
        ['name' => 'Jaringan Komputer', 'lecturer' => 'Dr. Fitri Handayani', 'code' => 'IF305', 'color' => '#8b5cf6', 'credits' => 3],
        ['name' => 'Kecerdasan Buatan', 'lecturer' => 'Prof. Gunawan', 'code' => 'IF306', 'color' => '#ec4899', 'credits' => 3],
    ];

    return view('courses.index', compact('courses'));
});

// Schedule
Route::get('/schedule', function () {
    $schedule = [
        'Senin' => [
            ['name' => 'Pemrograman Web', 'start' => '08:00', 'end' => '10:00', 'room' => 'Lab A', 'color' => '#3b82f6'],
            ['name' => 'Algoritma Lanjut', 'start' => '13:00', 'end' => '15:00', 'room' => 'R202', 'color' => '#ef4444'],
        ],
        'Selasa' => [
            ['name' => 'Basis Data', 'start' => '10:00', 'end' => '12:00', 'room' => 'R301', 'color' => '#10b981'],
            ['name' => 'Jaringan Komputer', 'start' => '15:00', 'end' => '17:00', 'room' => 'Lab B', 'color' => '#8b5cf6'],
        ],
        'Rabu' => [
            ['name' => 'Rekayasa Perangkat Lunak', 'start' => '08:00', 'end' => '11:00', 'room' => 'R401', 'color' => '#f59e0b'],
        ],
        'Kamis' => [
            ['name' => 'Kecerdasan Buatan', 'start' => '09:00', 'end' => '11:00', 'room' => 'Lab C', 'color' => '#ec4899'],
            ['name' => 'Pemrograman Web', 'start' => '13:00', 'end' => '15:00', 'room' => 'Lab A', 'color' => '#3b82f6'],
        ],
        'Jumat' => [
            ['name' => 'Basis Data', 'start' => '08:00', 'end' => '10:00', 'room' => 'R301', 'color' => '#10b981'],
        ],
        'Sabtu' => [],
        'Minggu' => [],
    ];

    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    $hours = range(6, 21);

    return view('schedules.week', compact('schedule', 'days', 'hours'));
});

// Tasks
Route::get('/tasks', function () {
    $tasks = [
        [
            'title' => 'Tugas UML Diagram',
            'course' => 'Rekayasa Perangkat Lunak',
            'due' => '2025-11-10',
            'status' => 'pending',
            'progress' => 60,
            'color' => '#f59e0b',
            'priority' => 'high'
        ],
        [
            'title' => 'Essay Database Normalization',
            'course' => 'Basis Data',
            'due' => '2025-11-09',
            'status' => 'pending',
            'progress' => 80,
            'color' => '#10b981',
            'priority' => 'high'
        ],
        [
            'title' => 'Implementasi Web CRUD',
            'course' => 'Pemrograman Web',
            'due' => '2025-11-12',
            'status' => 'pending',
            'progress' => 30,
            'color' => '#3b82f6',
            'priority' => 'medium'
        ],
        [
            'title' => 'Analisis Algoritma Sorting',
            'course' => 'Algoritma Lanjut',
            'due' => '2025-11-15',
            'status' => 'pending',
            'progress' => 10,
            'color' => '#ef4444',
            'priority' => 'medium'
        ],
        [
            'title' => 'Laporan Praktikum Jaringan',
            'course' => 'Jaringan Komputer',
            'due' => '2025-11-05',
            'status' => 'completed',
            'progress' => 100,
            'color' => '#8b5cf6',
            'priority' => 'low'
        ],
    ];

    return view('tasks.index', compact('tasks'));
});

// Exams
Route::get('/exams', function () {
    $exams = [
        [
            'name' => 'UTS Algoritma Lanjut',
            'course' => 'Algoritma Lanjut',
            'date' => '2025-11-15',
            'time' => '08:00 - 10:00',
            'room' => 'R202',
            'color' => '#ef4444',
            'type' => 'UTS'
        ],
        [
            'name' => 'UTS Basis Data',
            'course' => 'Basis Data',
            'date' => '2025-11-16',
            'time' => '10:00 - 12:00',
            'room' => 'R301',
            'color' => '#10b981',
            'type' => 'UTS'
        ],
        [
            'name' => 'Quiz Pemrograman Web',
            'course' => 'Pemrograman Web',
            'date' => '2025-11-11',
            'time' => '08:00 - 09:00',
            'room' => 'Lab A',
            'color' => '#3b82f6',
            'type' => 'Quiz'
        ],
        [
            'name' => 'UTS Rekayasa Perangkat Lunak',
            'course' => 'Rekayasa Perangkat Lunak',
            'date' => '2025-11-18',
            'time' => '08:00 - 10:00',
            'room' => 'R401',
            'color' => '#f59e0b',
            'type' => 'UTS'
        ],
        [
            'name' => 'Presentasi Project AI',
            'course' => 'Kecerdasan Buatan',
            'date' => '2025-11-20',
            'time' => '09:00 - 12:00',
            'room' => 'Lab C',
            'color' => '#ec4899',
            'type' => 'Presentasi'
        ],
    ];

    return view('exams.index', compact('exams'));
});
