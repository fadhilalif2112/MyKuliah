@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard</h1>
        <p class="text-gray-600 mb-8">{{ $today['date'] }}</p>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Kelas Minggu Ini</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $thisWeek['classes_count'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Tugas Aktif</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $thisWeek['tasks_count'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Ujian Mendatang</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $thisWeek['exams_count'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Today's Classes -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Kelas Hari Ini
                </h2>

                @if (count($today['classes']) > 0)
                    <div class="space-y-3">
                        @foreach ($today['classes'] as $class)
                            <div class="border-l-4 p-4 rounded-r-lg hover:bg-gray-50 transition"
                                style="border-color: {{ $class['color'] }}">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-semibold text-gray-800" style="color: {{ $class['color'] }}">
                                            {{ $class['name'] }}
                                        </h3>
                                        <p class="text-sm text-gray-600 mt-1">{{ $class['room'] }}</p>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700 bg-gray-100 px-3 py-1 rounded-full">
                                        {{ $class['time'] }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">Tidak ada kelas hari ini</p>
                @endif
            </div>

            <!-- Upcoming Tasks -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                        </path>
                    </svg>
                    Tugas Mendatang
                </h2>

                <div class="space-y-3">
                    @foreach ($today['tasks'] as $task)
                        <div class="border-l-4 p-4 rounded-r-lg hover:bg-gray-50 transition"
                            style="border-color: {{ $task['color'] }}">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-800">{{ $task['title'] }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{ $task['course'] }}</p>
                                </div>
                                <span
                                    class="text-xs font-medium px-2 py-1 rounded-full {{ $task['due'] == 'Hari ini' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $task['due'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Upcoming Exams -->
        @if (count($today['exams']) > 0)
            <div class="bg-white rounded-xl shadow-md p-6 mt-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                    Ujian Mendatang
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($today['exams'] as $exam)
                        <div class="border-l-4 p-4 rounded-r-lg bg-red-50" style="border-color: {{ $exam['color'] }}">
                            <h3 class="font-semibold text-gray-800">{{ $exam['name'] }}</h3>
                            <p class="text-sm text-gray-600 mt-2">{{ $exam['date'] }}</p>
                            <p class="text-sm text-gray-500">{{ $exam['time'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
