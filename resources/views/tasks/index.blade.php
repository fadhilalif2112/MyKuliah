@extends('layouts.app')

@section('title', 'Tugas')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Tugas</h1>
                <p class="text-gray-600">Kelola dan pantau semua tugas kuliah</p>
            </div>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium flex items-center gap-2 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Tugas
            </button>
        </div>

        <!-- Filter Tabs -->
        <div class="bg-white rounded-xl shadow-md mb-6 p-2 flex gap-2">
            <button class="flex-1 px-4 py-3 rounded-lg font-medium bg-blue-600 text-white">
                Semua Tugas
            </button>
            <button class="flex-1 px-4 py-3 rounded-lg font-medium text-gray-600 hover:bg-gray-100 transition">
                Aktif
            </button>
            <button class="flex-1 px-4 py-3 rounded-lg font-medium text-gray-600 hover:bg-gray-100 transition">
                Selesai
            </button>
            <button class="flex-1 px-4 py-3 rounded-lg font-medium text-gray-600 hover:bg-gray-100 transition">
                Terlambat
            </button>
        </div>

        <!-- Tasks List -->
        <div class="space-y-4">
            @foreach ($tasks as $task)
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition card">
                    <div class="flex items-start gap-4">
                        <!-- Checkbox -->
                        <div class="flex-shrink-0 mt-1">
                            <input type="checkbox" {{ $task['status'] == 'completed' ? 'checked' : '' }}
                                class="w-5 h-5 rounded border-gray-300 focus:ring-2 focus:ring-blue-500 cursor-pointer"
                                style="accent-color: {{ $task['color'] }}">
                        </div>

                        <!-- Content -->
                        <div class="flex-1">
                            <div class="flex items-start justify-between mb-3">
                                <div>
                                    <h3
                                        class="text-lg font-bold text-gray-800 {{ $task['status'] == 'completed' ? 'line-through text-gray-500' : '' }}">
                                        {{ $task['title'] }}
                                    </h3>
                                    <div class="flex items-center gap-3 mt-2">
                                        <span
                                            class="inline-flex items-center gap-1 text-sm font-medium px-3 py-1 rounded-full"
                                            style="background-color: {{ $task['color'] }}20; color: {{ $task['color'] }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                </path>
                                            </svg>
                                            {{ $task['course'] }}
                                        </span>

                                        @php
                                            $dueDate = \Carbon\Carbon::parse($task['due']);
                                            $now = \Carbon\Carbon::now();
                                            $diff = $now->diffInDays($dueDate, false);

                                            if ($diff < 0) {
                                                $badgeClass = 'bg-red-100 text-red-700';
                                                $dueText = 'Terlambat';
                                            } elseif ($diff == 0) {
                                                $badgeClass = 'bg-orange-100 text-orange-700';
                                                $dueText = 'Hari ini';
                                            } elseif ($diff == 1) {
                                                $badgeClass = 'bg-yellow-100 text-yellow-700';
                                                $dueText = 'Besok';
                                            } else {
                                                $badgeClass = 'bg-gray-100 text-gray-700';
                                                $dueText = $diff . ' hari lagi';
                                            }
                                        @endphp

                                        <span
                                            class="inline-flex items-center gap-1 text-sm font-medium px-3 py-1 rounded-full {{ $badgeClass }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            {{ $dueText }}
                                        </span>

                                        @if ($task['priority'] == 'high')
                                            <span
                                                class="inline-flex items-center gap-1 text-sm font-medium px-3 py-1 rounded-full bg-red-100 text-red-700">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                                    </path>
                                                </svg>
                                                Prioritas Tinggi
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <button class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                        </path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Progress Bar -->
                            @if ($task['status'] != 'completed')
                                <div class="mt-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm font-medium text-gray-600">Progress</span>
                                        <span class="text-sm font-bold"
                                            style="color: {{ $task['color'] }}">{{ $task['progress'] }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="h-2.5 rounded-full transition-all duration-300"
                                            style="width: {{ $task['progress'] }}%; background-color: {{ $task['color'] }}">
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="mt-4 flex items-center gap-2 text-green-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="font-medium">Tugas selesai</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Summary Stats -->
        <div class="bg-white rounded-xl shadow-md p-6 mt-8">
            <h3 class="font-bold text-gray-800 mb-4">Ringkasan Tugas</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @php
                    $totalTasks = count($tasks);
                    $completedTasks = count(array_filter($tasks, fn($t) => $t['status'] == 'completed'));
                    $pendingTasks = $totalTasks - $completedTasks;
                    $avgProgress =
                        $totalTasks > 0 ? round(array_sum(array_column($tasks, 'progress')) / $totalTasks) : 0;
                @endphp

                <div>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalTasks }}</p>
                    <p class="text-gray-600 text-sm mt-1">Total Tugas</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-green-600">{{ $completedTasks }}</p>
                    <p class="text-gray-600 text-sm mt-1">Selesai</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-orange-600">{{ $pendingTasks }}</p>
                    <p class="text-gray-600 text-sm mt-1">Dalam Progress</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-purple-600">{{ $avgProgress }}%</p>
                    <p class="text-gray-600 text-sm mt-1">Rata-rata Progress</p>
                </div>
            </div>
        </div>
    </div>
@endsection
