@extends('layouts.app')

@section('title', 'Exams - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Header -->
                <div class="sm:flex sm:items-center sm:justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Exams</h1>
                        <p class="mt-2 text-sm text-gray-700">Track your upcoming exams and revisions</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <a href="{{ route('exams.create') }}"
                            class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Exam
                        </a>
                    </div>
                </div>

                <!-- Exams List -->
                <div class="space-y-4">
                    @forelse($exams as $exam)
                        @php
                            $daysLeft = \Carbon\Carbon::parse($exam->due_date)->diffInDays(\Carbon\Carbon::now());
                            $isPast = \Carbon\Carbon::parse($exam->due_date)->isPast();
                        @endphp
                        <div
                            class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                            <div class="flex items-start gap-4">
                                <div class="bg-blue-500 h-full w-1 rounded-full"></div>

                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-3 mb-2">
                                                <h3 class="text-lg font-semibold text-gray-900">{{ $exam->title }}</h3>
                                                <span
                                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-blue-500 bg-opacity-10 text-gray-900">
                                                    {{ $exam->category->name ?? 'Exam' }}
                                                </span>
                                            </div>
                                            @if ($exam->description)
                                                <p class="text-sm text-gray-600 mb-4">{{ $exam->description }}</p>
                                            @endif

                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="flex items-center gap-2 text-sm text-gray-700">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($exam->due_date)->format('d M Y') }}
                                                </div>
                                            </div>

                                            @if ($exam->priority === 'high')
                                                <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                                                    <p class="text-sm text-red-900">
                                                        <svg class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        High Priority - {{ $exam->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex flex-col items-end gap-3">
                                            <div class="text-right">
                                                @if (!$isPast)
                                                    <div class="text-2xl font-bold text-blue-600">H-{{ $daysLeft }}
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-1">{{ $daysLeft }} days left
                                                    </div>
                                                @else
                                                    <div class="text-2xl font-bold text-red-600">Passed</div>
                                                @endif
                                            </div>
                                            <div class="flex gap-2">
                                                <a href="{{ route('exams.edit', $exam->id) }}"
                                                    class="p-2 text-gray-400 hover:text-primary-600 rounded-lg hover:bg-gray-50">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('exams.destroy', $exam->id) }}"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="p-2 text-gray-400 hover:text-red-600 rounded-lg hover:bg-gray-50">
                                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-12 text-center">
                            <p class="text-gray-500 mb-4">No exams scheduled yet</p>
                            <a href="{{ route('exams.create') }}"
                                class="text-primary-600 hover:text-primary-700 font-medium">Add your first exam</a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Sidebar - Stats -->
            <div class="mt-8 lg:mt-0">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Exam Statistics</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Total Exams</span>
                            <span class="text-lg font-bold text-gray-900">{{ $stats['total'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">This Month</span>
                            <span class="text-lg font-bold text-blue-600">{{ $stats['this_month'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Next 7 Days</span>
                            <span class="text-lg font-bold text-amber-600">{{ $stats['next_7_days'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
