<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyKuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="h-full">
    <div class="min-h-full flex">
        <!-- Left Side - Form -->
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <div class="flex items-center gap-3">
                        <svg class="h-10 w-10 text-primary-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <h1 class="text-2xl font-bold text-gray-900">MyKuliah</h1>
                    </div>
                    <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Or
                        <a href="{{ route('register') }}"
                            class="font-medium text-primary-600 hover:text-primary-500">create a new account</a>
                    </p>
                </div>

                <div class="mt-8">
                    <form class="space-y-6" action="#" method="POST">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm"
                                    placeholder="you@university.edu">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password"
                                    required
                                    class="block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm"
                                    placeholder="••••••••">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-medium text-primary-600 hover:text-primary-500">Forgot
                                    your password?</a>
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-lg bg-primary-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2">
                                Sign in
                            </button>
                        </div>
                    </form>

                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="bg-gray-50 px-2 text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <button
                                class="inline-flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2">GitHub</span>
                            </button>

                            <button
                                class="inline-flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0C4.477 0 0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.879V12.89h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.989C16.343 19.129 20 14.99 20 10c0-5.523-4.477-10-10-10z" />
                                </svg>
                                <span class="ml-2">Facebook</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Illustration/Info -->
        <div class="relative hidden w-0 flex-1 lg:block bg-gradient-to-br from-primary-600 to-primary-800">
            <div class="absolute inset-0 flex items-center justify-center p-12">
                <div class="text-center text-white">
                    <svg class="mx-auto h-32 w-32 mb-8 opacity-90" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <h2 class="text-4xl font-bold mb-4">Welcome to MyKuliah</h2>
                    <p class="text-xl text-primary-100 mb-8">Your personal study planner and academic companion</p>
                    <div class="grid grid-cols-1 gap-4 max-w-md mx-auto text-left">
                        <div class="flex items-start gap-3 bg-white bg-opacity-10 rounded-lg p-4">
                            <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold">Organize Your Schedule</h3>
                                <p class="text-sm text-primary-100">Manage classes, tasks, and exams in one place</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 bg-white bg-opacity-10 rounded-lg p-4">
                            <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold">Never Miss a Deadline</h3>
                                <p class="text-sm text-primary-100">Get reminders for important dates and tasks</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 bg-white bg-opacity-10 rounded-lg p-4">
                            <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold">Track Your Progress</h3>
                                <p class="text-sm text-primary-100">Monitor your academic achievements</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
