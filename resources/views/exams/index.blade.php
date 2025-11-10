@extends('layouts.app')

@section('title', 'Ujian')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Ujian & Penilaian</h1>
                <p class="text-gray-600">Jadwal ujian dan penilaian semester ini</p>
            </div>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium flex items-center gap-2 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Ujian
            </button>
        </div>

        <!-- Filter by Type -->
        <div class="bg-white rounded-xl shadow-md mb-6 p-2 flex gap-2">
            <button class="flex-1 px-4 py-3 rounded-lg font-medium bg-blue-600 text-white">
                Semua
            </button>
            <button class="flex-1 px-4 py-3 rounded-lg font-medium text-gray-600 hover:bg-gray-100 transition">
                UTS
            </button>
            <button class="flex-1 px-4 py-3 rounded-lg font-medium text-gray-600 hover:bg-gray-100 transition">
                UAS
            </button>
            <button class="flex-1 px-4 py-3 rounded-lg font-medium text-gray-600 hover:bg-gray-100 transition">
                Quiz
            </button>
        </div>

        <!-- Timeline View -->
        <div class="space-y-6">
            @php
                $examsByMonth = [];
                foreach ($exams as $exam) {
                    $month = \Carbon\Carbon::parse($exam['date'])->format('F Y');
                    $examsByMonth[$month][] = $exam;
                }
            @endphp

            @foreach ($examsByMonth as $month => $monthExams)
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <h2 class="text-xl font-bold text-gray-800">{{ $month }}</h2>
                        <div class="flex-1 h-px bg-gray-300"></div>
                    </div>

                    <div class="space-y-4">
                        @foreach ($monthExams as $exam)
                            @php
                                $examDate = \Carbon\Carbon::parse($exam['date']);
                                $now = \Carbon\Carbon::now();
                                $daysUntil = $now->diffInDays($examDate, false);
                                $isPast = $daysUntil < 0;
                                $isToday = $daysUntil == 0;
                                $isUpcoming = $daysUntil > 0 && $daysUntil <= 7;
                            @endphp

                            <div
                                class="bg-white rounded-xl shadow-md hover:shadow-lg transition card {{ $isPast ? 'opacity-60' : '' }}">
                                <div class="flex">
                                    <!-- Date Column -->
                                    <div class="w-24 flex-shrink-0 p-6 text-center border-r"
                                        style="background-color: {{ $exam['color'] }}20;">
                                        <p class="text-3xl font-bold" style="color: {{ $exam['color'] }}">
                                            {{ $examDate->format('d') }}
                                        </p>
                                        <p class="text-sm font-medium text-gray-600 mt-1">
                                            {{ $examDate->format('M') }}
                                        </p>
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-1 p-6">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <span class="inline-block px-3 py-1 text-xs font-bold rounded-full"
                                                        style="background-color: {{ $exam['color'] }}; color: white;">
                                                        {{ $exam['type'] }}
                                                    </span>

                                                    @if ($isToday)
                                                        <span
                                                            class="inline-flex items-center gap-1 px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-700 animate-pulse">
                                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            HARI INI
                                                        </span>
                                                    @elseif($isUpcoming)
                                                        <span
                                                            class="inline-flex items-center gap-1 px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-700">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                                                </path>
                                                            </svg>
                                                            {{ $daysUntil }} hari lagi
                                                        </span>
                                                    @elseif($isPast)
                                                        <span
                                                            class="inline-flex items-center gap-1 px-3 py-1 text-xs font-bold rounded-full bg-gray-100 text-gray-600">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                            Selesai
                                                        </span>
                                                    @endif
                                                </div>

                                                <h3 class="text-xl font-bold text-gray-800 mb-2">
                                                    {{ $exam['name'] }}
                                                </h3>

                                                <div class="space-y-2">
                                                    <div class="flex items-center gap-3 text-gray-600">
                                                        <svg class="w-5 h-5 text-gray-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                            </path>
                                                        </svg>
                                                        <span class="font-medium">{{ $exam['course'] }}</span>
                                                    </div>

                                                    <div class="flex items-center gap-3 text-gray-600">
                                                        <svg class="w-5 h-5 text-gray-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span>{{ $exam['time'] }}</span>
                                                    </div>

                                                    <div class="flex items-center gap-3 text-gray-600">
                                                        <svg class="w-5 h-5 text-gray-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                            </path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>
                                                        </svg>
                                                        <span>{{ $exam['room'] }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="text-gray-400 hover:text-gray-600">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>

                                        @if ($isUpcoming || $isToday)
                                            <div class="mt-4 pt-4 border-t flex gap-3">
                                                <button
                                                    class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg text-sm font-medium transition">
                                                    Lihat Materi
                                                </button>
                                                <button
                                                    class="flex-1 py-2 px-4 rounded-lg text-sm font-medium transition text-white"
                                                    style="background-color: {{ $exam['color'] }}">
                                                    Set Pengingat
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Summary Stats -->
        <div class="bg-white rounded-xl shadow-md p-6 mt-8">
            <h3 class="font-bold text-gray-800 mb-4">Ringkasan Ujian</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @php
                    $totalExams = count($exams);
                    $upcomingExams = count(
                        array_filter($exams, function ($e) {
                            return \Carbon\Carbon::parse($e['date'])->isFuture();
                        }),
                    );
                    $completedExams = $totalExams - $upcomingExams;
                    $thisWeekExams = count(
                        array_filter($exams, function ($e) {
                            $date = \Carbon\Carbon::parse($e['date']);
                            return $date->isCurrentWeek();
                        }),
                    );
                @endphp

                <div>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalExams }}</p>
                    <p class="text-gray-600 text-sm mt-1">Total Ujian</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-orange-600">{{ $upcomingExams }}</p>
                    <p class="text-gray-600 text-sm mt-1">Akan Datang</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-green-600">{{ $completedExams }}</p>
                    <p class="text-gray-600 text-sm mt-1">Selesai</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-red-600">{{ $thisWeekExams }}</p>
                    <p class="text-gray-600 text-sm mt-1">Minggu Ini</p>
                </div>
            </div>
        </div>
    </div>
@endsection
