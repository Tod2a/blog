<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto flex flex-col space-y-10">
            <nav class="flex justify-between items-center py-2">
                <div class="flex space-x-4">
                    <a href="/"
                        class="group font-bold text-3xl flex items-center space-x-4 hover:text-emerald-600 transition ">
                        <x-application-logo
                            class="w-10 h-10 fill-current text-gray-500 group-hover:text-emerald-500 transition" />
                        <span>Mon blog</span>
                    </a>
                    <div class="flex space-x-4">
                        <a class="font-bold hover:text-emerald-600 transition"
                            href="{{ route('articles.index') }}">Articles
                        </a>
                        <a class="font-bold hover:text-emerald-600 transition"
                            href="{{ route('about.index') }}">À Propos
                        </a>
                    </div>
                </div>
            </nav>

            <main>
                {{ $slot }}
            </main>
            <footer class="text-center">
                <a href="https://facebook.com" target="_blank">Nos réseaux sociaux</a>
            </footer>
        </div>
    </div>
</body>
</html>
