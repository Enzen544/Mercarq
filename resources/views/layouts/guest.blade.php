<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex flex-col font-sans text-gray-900 antialiased" style="min-width: 405px">
        <header x-data="themeSwitcher"
                class="bg-white/95 backdrop-blur-sm border-b border-[#C69A7D] sticky top-0 z-50 transition-colors duration-300">
            <div class="container mx-auto px-4 py-3 flex flex-wrap justify-between items-center gap-4">
                <a href="{{ route('home') }}" class="text-2xl font-bold bg-gradient-to-r from-[#D76040] to-[#C69A7D] bg-clip-text text-transparent">
                    MERCARQ
                </a>
                <nav class="hidden md:flex space-x-6">
                    <a href="{{ route('home') }}#features"
                       class="text-[#5C4033] hover:text-[#D76040] transition duration-200 font-medium relative group">
                        Características
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#D76040] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('home') }}#plans"
                       class="text-[#5C4033] hover:text-[#D76040] transition duration-200 font-medium relative group">
                        Destacados
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#D76040] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('blueprints.public.index') }}"
                       class="text-[#5C4033] hover:text-[#D76040] transition duration-200 font-medium relative group">
                        Catálogo
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#D76040] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="https://wa.me/573133097353" target="_blank"
                       class="text-[#5C4033] hover:text-[#D76040] transition duration-200 font-medium relative group">
                        Contacto
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#D76040] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </nav>
                <div class="flex items-center space-x-2 md:space-x-3">
                    <button @click="toggleTheme" id="theme-toggle" type="button"
                            class="text-[#C69A7D] hover:bg-[#EEC6BA] focus:outline-none focus:ring-2 focus:ring-[#D76040]/30 rounded-lg text-sm p-2">
                    </button>

                    <a href="{{ asset('downloads/MANUAL DEL CLIENTE.pdf') }}" download="Manual_Cliente_Mercarq.pdf"
                       class="flex items-center px-3 py-2 text-sm rounded-md border border-[#C69A7D] text-[#C69A7D] hover:bg-[#C69A7D] hover:text-white hover:border-[#C69A7D] transition duration-150 font-medium"
                       title="Descargar Manual del Cliente">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path>
                            <path d="M8 12a1 1 0 102 0V8a1 1 0 10-2 0v4z"></path>
                            <path d="M8 16a1 1 0 102 0 1 1 0 00-2 0z"></path>
                        </svg>
                        Manual
                    </a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="px-3 py-2 text-sm rounded-md border border-[#D76040] text-[#D76040] hover:bg-[#D76040] hover:text-white transition duration-150 font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                               class="px-3 py-2 text-sm rounded-md border border-[#D76040] text-[#D76040] hover:bg-[#D76040] hover:text-white transition duration-150 font-medium">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="px-3 py-2 text-sm rounded-md bg-[#D76040] text-white hover:bg-[#C69A7D] transition duration-150 font-medium">Registrarse</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <div class="flex-grow w-full flex flex-col sm:justify-center items-center">
                {{ $slot }}
        </div>

        <footer class="py-8 bg-[#E4E4E5] border-t border-[#C69A7D]/30">
            <div class="container mx-auto px-4 text-center text-[#5C4033]/80 text-sm">
                <p>&copy; 2025 MERCARQ. Todos los derechos reservados. | Planos Arquitectónicos Premium</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/gh/bennyluk/Sienna-Accessibility-Widget@main/widget.min.js"></script>
        <script src="https://website-widgets.pages.dev/dist/sienna.min.js" defer></script>
    </body>
</html>
