@extends('layouts.app')

@section('title', 'Mata Kuliah')

@section('content')
    <div>
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Mata Kuliah</h1>
                <p class="text-gray-600">Kelola semua mata kuliah semester ini</p>
            </div>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium flex items-center gap-2 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Mata Kuliah
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition card">
                    <div class="h-3" style="background-color: {{ $course['color'] }}"></div>

                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full mb-2"
                                    style="background-color: {{ $course['color'] }}20; color: {{ $course['color'] }}">
                                    {{ $course['code'] }}
                                </span>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $course['name'] }}</h3>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-sm">{{ $course['lecturer'] }}</span>
                            </div>

                            <div class="flex items-center gap-3 text-gray-600">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm">{{ $course['credits'] }} SKS</span>
                            </div>
                        </div>

                        <div class="border-t pt-4">
                            <div class="flex gap-2">
                                <button
                                    class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg text-sm font-medium transition">
                                    Detail
                                </button>
                                <button
                                    class="flex-1 text-gray-700 hover:bg-gray-100 py-2 px-4 rounded-lg text-sm font-medium transition"
                                    style="background-color: {{ $course['color'] }}20; color: {{ $course['color'] }}">
                                    Materi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Summary -->
        <div class="bg-white rounded-xl shadow-md p-6 mt-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                <div>
                    <p class="text-3xl font-bold text-blue-600">{{ count($courses) }}</p>
                    <p class="text-gray-600 text-sm mt-1">Total Mata Kuliah</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-green-600">{{ array_sum(array_column($courses, 'credits')) }}</p>
                    <p class="text-gray-600 text-sm mt-1">Total SKS</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-purple-600">
                        {{ count(array_unique(array_column($courses, 'lecturer'))) }}</p>
                    <p class="text-gray-600 text-sm mt-1">Dosen Pengampu</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-orange-600">18</p>
                    <p class="text-gray-600 text-sm mt-1">Pertemuan/Minggu</p>
                </div>
            </div>
        </div>
    </div>
@endsection
