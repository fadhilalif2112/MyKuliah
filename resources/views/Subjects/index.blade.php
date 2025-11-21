@extends('layouts.app')

@section('title', 'Subjects - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Subjects</h1>
                <p class="mt-2 text-sm text-gray-700">Manage your subjects and courses</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('subjects.create') }}"
                    class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Subject
                </a>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Subjects</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total'] }}</p>
                    </div>
                    <div class="h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Credits</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_credits'] }}</p>
                    </div>
                    <div class="h-12 w-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Average Credits</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($stats['average_credits'], 1) }}
                        </p>
                    </div>
                    <div class="h-12 w-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subjects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($subjects as $subject)
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow overflow-hidden">
                    <div class="bg-blue-500 h-3"></div>
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold bg-blue-500 bg-opacity-10 text-gray-900">
                                        {{ $subject->semester > 1 ? 'Semester ' . $subject->semester : 'Core' }}
                                    </span>
                                    <span class="text-xs text-gray-500">{{ $subject->credits }} SKS</span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $subject->subject_name }}</h3>
                            </div>
                            <div class="bg-blue-500 h-10 w-10 rounded-lg bg-opacity-10 flex items-center justify-center">
                                <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        </div>

                        <div class="space-y-3 mb-4">
                            @if ($subject->lecture)
                                <div class="flex items-start gap-3">
                                    <svg class="h-5 w-5 text-gray-400 mt-0.5" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">{{ $subject->lecture->name }}</p>
                                        <p class="text-xs text-gray-500">Lecturer</p>
                                    </div>
                                </div>
                            @endif
                            @if ($subject->description)
                                <div class="flex items-start gap-3">
                                    <svg class="h-5 w-5 text-gray-400 mt-0.5" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-700">{{ Str::limit($subject->description, 100) }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="pt-4 border-t border-gray-200 flex items-center justify-between">
                            <a href="{{ route('subjects.show', $subject->id) }}"
                                class="text-sm font-medium text-primary-600 hover:text-primary-700">View Details</a>
                            <div class="flex gap-2">
                                <a href="{{ route('subjects.edit', $subject->id) }}"
                                    class="p-1.5 text-gray-400 hover:text-primary-600 rounded hover:bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('subjects.destroy', $subject->id) }}"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="p-1.5 text-gray-400 hover:text-red-600 rounded hover:bg-gray-50">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 bg-white rounded-2xl shadow-sm border border-gray-200 p-12 text-center">
                    <p class="text-gray-500 mb-4">No subjects created yet</p>
                    <a href="{{ route('subjects.create') }}"
                        class="text-primary-600 hover:text-primary-700 font-medium">Add your first subject</a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
