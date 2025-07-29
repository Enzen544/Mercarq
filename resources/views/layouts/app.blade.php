<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @stack('title')
            {{ config('app.name', 'MERQARK') }}
        </title>
        
            <link rel="icon" type="image/x-icon" href="{{ asset('imagenProbatoria.ico') }}">
            <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('imagenProbatoria.ico-32x32.png') }}">
            <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('imagenProbatoria.ico-16x16.png') }}">
            <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('imagenProbatoria.ico') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
            <script src="https://cdn.jsdelivr.net/gh/bennyluk/Sienna-Accessibility-Widget@main/widget.min.js"></script>

    </body>
</html>
