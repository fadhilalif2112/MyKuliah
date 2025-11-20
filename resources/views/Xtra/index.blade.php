@extends('layouts.app')

@section('title', 'Xtra Activities - MyKuliah')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Xtra Activities</h1>
                <p class="mt-2 text-sm text-gray-700">Track your extracurricular activities and commitments</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <button
                    class="inline-flex items-center gap-x-2 rounded-lg bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Activity
                </button>
            </div>
        </div>

        <!-- Category Filter (hardcoded) -->
        <div class="mb-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-2 inline-flex gap-2 flex-wrap">
                <button onclick="filterCategory('all')" id="cat-all"
                    class="px-4 py-2 text-sm font-medium rounded-lg bg-primary-600 text-white">
                    All
                </button>

                <button onclick="filterCategory('organization')" id="cat-organization"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                    Organization
                </button>

                <button onclick="filterCategory('sport')" id="cat-sport"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                    Sport
                </button>

                <button onclick="filterCategory('work')" id="cat-work"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                    Work
                </button>

                <button onclick="filterCategory('seminar')" id="cat-seminar"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                    Seminar
                </button>

                <button onclick="filterCategory('volunteer')" id="cat-volunteer"
                    class="px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50">
                    Volunteer
                </button>
            </div>
        </div>

        <!-- Activities Grid (2 hardcoded activities) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Activity 1: Rapat BEM (Organization) -->
            <div class="activity-card bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow overflow-hidden"
                data-category="organization">
                <div class="bg-blue-500 h-2"></div>
                <div class="p-6">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="bg-blue-500 bg-opacity-10 rounded-lg p-3">
                            <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900">Rapat BEM</h3>
                            <span
                                class="inline-flex items-center mt-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-500 bg-opacity-10 text-gray-900">
                                Organization
                            </span>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">Rapat koordinasi program kerja semester ini</p>

                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            11 Nov 2025 • 16:00
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Aula Utama
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">Today</span>
                            <div class="flex gap-2">
                                <button class="p-1.5 text-gray-400 hover:text-primary-600 rounded hover:bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="p-1.5 text-gray-400 hover:text-red-600 rounded hover:bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity 2: Latihan Basket (Sport) -->
            <div class="activity-card bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow overflow-hidden"
                data-category="sport">
                <div class="bg-green-500 h-2"></div>
                <div class="p-6">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="bg-green-500 bg-opacity-10 rounded-lg p-3">
                            <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900">Latihan Basket</h3>
                            <span
                                class="inline-flex items-center mt-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500 bg-opacity-10 text-gray-900">
                                Sport
                            </span>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">Latihan rutin tim basket kampus</p>

                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            12 Nov 2025 • 17:00
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            GOR Kampus
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">Tomorrow</span>
                            <div class="flex gap-2">
                                <button class="p-1.5 text-gray-400 hover:text-primary-600 rounded hover:bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="p-1.5 text-gray-400 hover:text-red-600 rounded hover:bg-gray-50">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

        <!-- Stats Summary (hardcoded counts for 2 activities) -->
        <div class="mt-8 grid grid-cols-2 md:grid-cols-5 gap-4">
            <!-- Organization -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-500 bg-opacity-10 rounded-lg p-2">
                        <svg class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Organization</p>
                        <p class="text-xl font-bold text-gray-900">1</p>
                    </div>
                </div>
            </div>

            <!-- Sport -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="bg-green-500 bg-opacity-10 rounded-lg p-2">
                        <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Sport</p>
                        <p class="text-xl font-bold text-gray-900">1</p>
                    </div>
                </div>
            </div>

            <!-- Work -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="bg-purple-500 bg-opacity-10 rounded-lg p-2">
                        <svg class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Work</p>
                        <p class="text-xl font-bold text-gray-900">0</p>
                    </div>
                </div>
            </div>

            <!-- Seminar -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="bg-yellow-500 bg-opacity-10 rounded-lg p-2">
                        <svg class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Seminar</p>
                        <p class="text-xl font-bold text-gray-900">0</p>
                    </div>
                </div>
            </div>

            <!-- Volunteer -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <div class="flex items-center gap-3">
                    <div class="bg-red-500 bg-opacity-10 rounded-lg p-2">
                        <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Volunteer</p>
                        <p class="text-xl font-bold text-gray-900">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function filterCategory(category) {
            const cards = document.querySelectorAll('.activity-card');
            const buttons = document.querySelectorAll('[id^="cat-"]');

            // Update button styles
            buttons.forEach(btn => {
                btn.classList.remove('bg-primary-600', 'text-white');
                btn.classList.add('text-gray-700', 'hover:bg-gray-50');
            });

            const activeBtn = document.getElementById('cat-' + category);
            if (activeBtn) {
                activeBtn.classList.remove('text-gray-700', 'hover:bg-gray-50');
                activeBtn.classList.add('bg-primary-600', 'text-white');
            }

            // Filter cards
            cards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
@endpush
