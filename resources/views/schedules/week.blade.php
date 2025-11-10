@extends('layouts.app')

@section('title', 'Jadwal Mingguan')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Jadwal Mingguan</h1>
                <p class="text-gray-600">Lihat jadwal kuliah minggu ini</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium flex items-center gap-2 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Minggu Lalu
                </button>
                <button
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium flex items-center gap-2 transition">
                    Minggu Depan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-x-auto">
            <div class="inline-block min-w-full">
                <div class="grid" style="grid-template-columns: 80px repeat(7, minmax(150px, 1fr));">
                    <!-- Header Row -->
                    <div class="border-b border-r bg-gray-50 p-3 sticky left-0 z-10"></div>
                    @foreach ($days as $day)
                        <div class="border-b border-r bg-gray-50 p-3 text-center">
                            <p class="font-bold text-gray-800">{{ $day }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ date('d/m', strtotime('monday this week +' . array_search($day, $days) . ' days')) }}</p>
                        </div>
                    @endforeach

                    <!-- Time Slots -->
                    @foreach ($hours as $hour)
                        <!-- Time Column -->
                        <div class="border-r bg-gray-50 p-3 text-center sticky left-0 z-10" style="height: 80px;">
                            <span class="text-sm font-medium text-gray-600">{{ sprintf('%02d:00', $hour) }}</span>
                        </div>

                        <!-- Day Columns -->
                        @foreach ($days as $day)
                            @php
                                $hasClass = false;
                                $classInfo = null;
                                $rowSpan = 1;

                                // Check if there's a class at this time
if (isset($schedule[$day])) {
    foreach ($schedule[$day] as $class) {
        $startHour = (int) substr($class['start'], 0, 2);
        $endHour = (int) substr($class['end'], 0, 2);

                                        if ($startHour == $hour) {
                                            $hasClass = true;
                                            $classInfo = $class;
                                            $rowSpan = $endHour - $startHour;
                                            break;
                                        }
                                    }
                                }
                            @endphp

                            <div class="border-r border-b relative" style="height: 80px;">
                                @if ($hasClass)
                                    <div class="absolute inset-1 rounded-lg p-3 text-white shadow-md hover:shadow-lg transition cursor-pointer"
                                        style="background-color: {{ $classInfo['color'] }}; height: {{ $rowSpan * 80 - 8 }}px;">
                                        <p class="font-bold text-sm mb-1">{{ $classInfo['name'] }}</p>
                                        <p class="text-xs opacity-90">{{ $classInfo['room'] }}</p>
                                        <p class="text-xs opacity-90 mt-1">{{ $classInfo['start'] }} -
                                            {{ $classInfo['end'] }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Legend -->
        <div class="bg-white rounded-xl shadow-md p-6 mt-6">
            <h3 class="font-bold text-gray-800 mb-4">Keterangan Warna</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @php
                    $uniqueCourses = [];
                    foreach ($schedule as $daySchedule) {
                        foreach ($daySchedule as $class) {
                            if (!isset($uniqueCourses[$class['name']])) {
                                $uniqueCourses[$class['name']] = $class;
                            }
                        }
                    }
                @endphp

                @foreach ($uniqueCourses as $course)
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 rounded" style="background-color: {{ $course['color'] }}"></div>
                        <span class="text-sm text-gray-700">{{ $course['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Weekly Summary -->
        <div class="bg-white rounded-xl shadow-md p-6 mt-6">
            <h3 class="font-bold text-gray-800 mb-4">Ringkasan Minggu Ini</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @php
                    $totalClasses = 0;
                    $totalHours = 0;
                    foreach ($schedule as $daySchedule) {
                        $totalClasses += count($daySchedule);
                        foreach ($daySchedule as $class) {
                            $start = (int) substr($class['start'], 0, 2);
                            $end = (int) substr($class['end'], 0, 2);
                            $totalHours += $end - $start;
                        }
                    }
                @endphp

                <div>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalClasses }}</p>
                    <p class="text-gray-600 text-sm mt-1">Total Kelas</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-green-600">{{ $totalHours }}</p>
                    <p class="text-gray-600 text-sm mt-1">Jam Kuliah</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-purple-600">{{ count($uniqueCourses) }}</p>
                    <p class="text-gray-600 text-sm mt-1">Mata Kuliah</p>
                </div>
                <div>
                    @php
                        $busiestDay = '';
                        $maxClasses = 0;
                        foreach ($schedule as $day => $classes) {
                            if (count($classes) > $maxClasses) {
                                $maxClasses = count($classes);
                                $busiestDay = $day;
                            }
                        }
                    @endphp
                    <p class="text-3xl font-bold text-orange-600">{{ $busiestDay }}</p>
                    <p class="text-gray-600 text-sm mt-1">Hari Tersibuk</p>
                </div>
            </div>
        </div>
    </div>
@endsection
