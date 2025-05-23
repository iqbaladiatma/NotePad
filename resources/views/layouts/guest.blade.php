<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Monospace ala Notepad -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4f4f4] dark:bg-[#1e1e1e] font-mono text-gray-900 dark:text-gray-100 antialiased">
    <div class="min-h-screen flex items-center justify-center pt-10">

        <!-- Slot Container (Form / Page Content) -->
        <div class="w-[400px] bg-white dark:bg-[#2d2d2d] text-sm p-6 shadow-md rounded-none">
            {{ $slot }}
        </div>
        
    </div>
</body>
</html>
