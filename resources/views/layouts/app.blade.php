<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyKuliah - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        body {
            background-color: #f5f7fa;
        }

        .nav-link {
            transition: all 0.2s;
        }

        .nav-link:hover {
            background-color: #e5e7eb;
        }

        .nav-link.active {
            background-color: #3b82f6;
            color: white;
        }

        .card {
            transition: all 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="min-h-screen">
    <!-- Sidebar -->
    <div class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg z-10">
        <div class="p-6 border-b">
            <h1 class="text-2xl font-bold text-gray-800">MyKuliah</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola kuliahmu dengan mudah</p>
        </div>

        <nav class="p-4">
            <a href="{{ url('/') }}"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg mb-2 {{ request()->is('/') ? 'active' : 'text-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ url('/courses') }}"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg mb-2 {{ request()->is('courses') ? 'active' : 'text-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                <span class="font-medium">Mata Kuliah</span>
            </a>

            <a href="{{ url('/schedule') }}"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg mb-2 {{ request()->is('schedule') ? 'active' : 'text-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <span class="font-medium">Jadwal</span>
            </a>

            <a href="{{ url('/tasks') }}"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg mb-2 {{ request()->is('tasks') ? 'active' : 'text-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                    </path>
                </svg>
                <span class="font-medium">Tugas</span>
            </a>

            <a href="{{ url('/exams') }}"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg mb-2 {{ request()->is('exams') ? 'active' : 'text-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <span class="font-medium">Ujian</span>
            </a>
        </nav>

        <div class="absolute bottom-0 w-full p-4 border-t bg-gray-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                    M
                </div>
                <div>
                    <p class="font-medium text-gray-800">Mahasiswa</p>
                    <p class="text-xs text-gray-500">mahasiswa@email.com</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <div class="p-8">
            @yield('content')
        </div>
    </div>
</body>

</html>
