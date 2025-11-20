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
                        <button onclick="openModal('add-exam-modal')"
                            class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Exam
                        </button>
                    </div>
                </div>

                <!-- Single Exam Card (hardcoded) -->
                <div class="space-y-4">
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-4">
                            <!-- color bar (subject color) -->
                            <div class="bg-blue-500 h-full w-1 rounded-full"></div>

                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <h3 class="text-lg font-semibold text-gray-900">Algoritma & Pemrograman</h3>
                                            <span
                                                class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-blue-500 bg-opacity-10 text-gray-900">
                                                UTS
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-4">CS101</p>

                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                20 Nov 2025
                                            </div>
                                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                08:00
                                            </div>
                                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Lab 301
                                            </div>
                                        </div>

                                        <div class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                                            <p class="text-sm text-amber-900">
                                                <svg class="inline h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                UTS - Bawa kalkulator
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex flex-col items-end gap-3">
                                        <!-- countdown (hardcoded H-10 since current date is 10 Nov 2025) -->
                                        <div class="text-right">
                                            <div class="text-2xl font-bold text-blue-600">H-10</div>
                                            <div class="text-xs text-gray-500 mt-1">10 days left</div>
                                        </div>
                                        <div class="flex gap-2">
                                            <button
                                                class="p-2 text-gray-400 hover:text-primary-600 rounded-lg hover:bg-gray-50">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button
                                                class="p-2 text-gray-400 hover:text-red-600 rounded-lg hover:bg-gray-50">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Mini Calendar & Stats (hardcoded) -->
            <div class="mt-8 lg:mt-0">
                <!-- Mini Calendar -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">November 2025</h3>

                    <!-- simple static calendar grid (rows) -->
                    <div class="grid grid-cols-7 gap-1 text-center text-xs">
                        <!-- week header -->
                        <div class="font-semibold text-gray-600 py-2">S</div>
                        <div class="font-semibold text-gray-600 py-2">M</div>
                        <div class="font-semibold text-gray-600 py-2">T</div>
                        <div class="font-semibold text-gray-600 py-2">W</div>
                        <div class="font-semibold text-gray-600 py-2">T</div>
                        <div class="font-semibold text-gray-600 py-2">F</div>
                        <div class="font-semibold text-gray-600 py-2">S</div>

                        <!-- first blank cells to align (hardcoded) -->
                        <div class="py-2 text-gray-400"></div>
                        <div class="py-2 text-gray-400"></div>
                        <div class="py-2 text-gray-400"></div>
                        <div class="py-2 text-gray-400"></div>
                        <div class="py-2 text-gray-400"></div>
                        <div class="py-2 text-gray-400">1</div>
                        <div class="py-2 text-gray-700">2</div>

                        <!-- remaining days (a simplified static representation) -->
                        <div class="py-2 text-gray-700">3</div>
                        <div class="py-2 text-gray-700">4</div>
                        <div class="py-2 text-gray-700">5</div>
                        <div class="py-2 text-gray-700">6</div>
                        <div class="py-2 text-gray-700">7</div>
                        <div class="py-2 text-gray-700">8</div>
                        <div class="py-2 text-gray-700">9</div>

                        <!-- day 10 = Today -->
                        <div class="py-2 bg-primary-600 text-white rounded-full font-bold">10</div>
                        <div class="py-2 text-gray-700">11</div>
                        <div class="py-2 text-gray-700">12</div>
                        <div class="py-2 text-gray-700">13</div>
                        <div class="py-2 text-gray-700">14</div>
                        <div class="py-2 text-gray-700">15</div>
                        <div class="py-2 text-gray-700">16</div>

                        <div class="py-2 text-gray-700">17</div>
                        <div class="py-2 text-gray-700">18</div>
                        <div class="py-2 text-gray-700">19</div>

                        <!-- day 20 = has exam -->
                        <div class="py-2 bg-red-100 text-red-700 rounded-full font-semibold">20</div>
                        <div class="py-2 text-gray-700">21</div>
                        <div class="py-2 text-gray-700">22</div>
                        <div class="py-2 text-gray-700">23</div>

                        <div class="py-2 text-gray-700">24</div>
                        <div class="py-2 text-gray-700">25</div>
                        <div class="py-2 text-gray-700">26</div>

                        <div class="py-2 text-gray-700">27</div>
                        <div class="py-2 text-gray-700">28</div>
                        <div class="py-2 text-gray-700">29</div>
                        <div class="py-2 text-gray-700">30</div>
                        <div class="py-2 text-gray-400"></div>
                        <div class="py-2 text-gray-400"></div>
                    </div>
                </div>

                <!-- Stats (hardcoded for 1 exam) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Exam Statistics</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Total Exams</span>
                            <span class="text-lg font-bold text-gray-900">1</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">This Month</span>
                            <span class="text-lg font-bold text-blue-600">1</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Next 7 Days</span>
                            <span class="text-lg font-bold text-amber-600">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
