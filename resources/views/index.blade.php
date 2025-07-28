<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merqark - Planos Arquitectónicos</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=orbitron:400,700|roboto:400,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white antialiased">
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('themeSwitcher', () => ({
                darkMode: Alpine.$persist(false).as('merqark-darkMode'),
                init() {
                    this.applyTheme();
                    this.$watch('darkMode', () => this.applyTheme());
                },
                applyTheme() {
                    if (this.darkMode) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                },
                toggleTheme() {
                    this.darkMode = !this.darkMode;
                }
            }));
        });
    </script>

    <header x-data="themeSwitcher"
        class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm border-b border-gray-200 dark:border-gray-800 sticky top-0 z-50 transition-colors duration-300">
        <div class="container mx-auto px-4 py-3 flex flex-wrap justify-between items-center gap-4">
            <div class="text-2xl font-bold bg-gradient-to-r from-orange-500 to-orange-700 bg-clip-text text-transparent">
                MERQARK
            </div>
            <nav class="hidden md:flex space-x-6">
                <a href="#features"
                    class="hover:text-orange-500 dark:hover:text-orange-400 transition duration-150 font-medium">Características</a>
                <a href="#plans"
                    class="hover:text-orange-500 dark:hover:text-orange-400 transition duration-150 font-medium">Planos</a>
                <a href="#"
                    class="hover:text-orange-500 dark:hover:text-orange-400 transition duration-150 font-medium">Contacto</a>
            </nav>
            <div class="flex items-center space-x-2 md:space-x-3">
                <button @click="toggleTheme" id="theme-toggle" type="button"
                    class="text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600 rounded-lg text-sm p-2">
                    <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                    <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <span class="sr-only">Cambiar modo</span>
                </button>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-3 py-2 text-sm rounded-md border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition duration-150 font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-3 py-2 text-sm rounded-md border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white transition duration-150 font-medium">Iniciar
                            Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-3 py-2 text-sm rounded-md bg-orange-500 text-white hover:bg-orange-600 transition duration-150 font-medium">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <section
        class="min-h-screen flex items-center justify-center text-center px-4 bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 dark:from-gray-900 dark:via-gray-950 dark:to-black relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-20 dark:opacity-10">
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-orange-500/20 via-transparent to-transparent dark:from-orange-500/10">
            </div>
        </div>
        <div class="relative z-10 max-w-3xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                <span class="block">Diseña tu</span>
                <span
                    class="block bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 dark:from-orange-400 dark:via-orange-500 dark:to-orange-600 bg-clip-text text-transparent">Futuro
                    con Merqark</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-10 max-w-2xl mx-auto">
                Explora nuestra colección de planos arquitectónicos innovadores y da vida a tus ideas con diseños
                futuristas y sostenibles.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#plans"
                    class="px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-700 text-white font-bold rounded-full shadow-lg hover:shadow-xl hover:shadow-orange-500/20 hover:from-orange-600 hover:to-orange-800 transition duration-300 transform hover:-translate-y-1 text-center">
                    Explorar Planos
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="px-8 py-3 border-2 border-orange-500 text-orange-600 dark:text-orange-400 font-bold rounded-full hover:bg-orange-500 hover:text-white transition duration-300 text-center">
                        Únete Ahora
                    </a>
                @endif
            </div>
        </div>
    </section>

    <section id="features" class="py-20 bg-gray-100/50 dark:bg-gray-900/50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-orange-600 dark:text-orange-400">¿Por qué elegir Merqark?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-white dark:bg-gray-800/50 p-6 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-orange-500 dark:hover:border-orange-500 transition duration-300 hover:shadow-lg hover:shadow-orange-500/10 flex flex-col items-center text-center">
                    <div class="text-5xl text-orange-500 dark:text-orange-400 mb-5">📐</div>
                    <h3 class="text-xl font-bold mb-3">Diseños Futuristas</h3>
                    <p class="text-gray-600 dark:text-gray-400">Planos que combinan funcionalidad con estética vanguardista, pensados para el
                        mañana.</p>
                </div>
                <div
                    class="bg-white dark:bg-gray-800/50 p-6 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-orange-500 dark:hover:border-orange-500 transition duration-300 hover:shadow-lg hover:shadow-orange-500/10 flex flex-col items-center text-center">
                    <div class="text-5xl text-orange-500 dark:text-orange-400 mb-5">🔒</div>
                    <h3 class="text-xl font-bold mb-3">Compra Segura</h3>
                    <p class="text-gray-600 dark:text-gray-400">Sistema de pagos integrado y certificado para una experiencia de compra 100%
                        segura.</p>
                </div>
                <div
                    class="bg-white dark:bg-gray-800/50 p-6 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-orange-500 dark:hover:border-orange-500 transition duration-300 hover:shadow-lg hover:shadow-orange-500/10 flex flex-col items-center text-center">
                    <div class="text-5xl text-orange-500 dark:text-orange-400 mb-5">📥</div>
                    <h3 class="text-xl font-bold mb-3">Descarga Inmediata</h3>
                    <p class="text-gray-600 dark:text-gray-400">Obtén tus planos en formato digital (.dwg, .pdf) al instante después de tu
                        compra.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="plans" class="py-20 bg-gradient-to-b from-gray-100/50 dark:from-gray-900/50 to-gray-200/50 dark:to-black/50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 text-orange-600 dark:text-orange-400">Últimos Planos Agregados</h2>
            <p class="text-center text-gray-600 dark:text-gray-400 mb-12">Descubre las últimas creaciones de nuestra comunidad.</p>

            <div x-data="{
                plans: @js($latestBlueprints ?? []),
                currentIndex: 0,
                get visiblePlans() {
                    if (!this.plans || this.plans.length === 0) return [];
                    return this.plans.slice(this.currentIndex, this.currentIndex + 3);
                },
                next() {
                    if (this.plans && this.currentIndex + 3 < this.plans.length) {
                        this.currentIndex += 3;
                    } else {
                        this.currentIndex = 0;
                    }
                },
                prev() {
                    if (this.plans && this.currentIndex - 3 >= 0) {
                        this.currentIndex -= 3;
                    } else {
                        if (this.plans) {
                            this.currentIndex = Math.max(0, this.plans.length - 3);
                        }
                    }
                }
            }" class="relative px-10 md:px-16">
                <template x-if="!plans || plans.length === 0">
                    <div class="text-center py-10 text-gray-500 dark:text-gray-600">
                        <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <p class="mt-4 text-lg">No hay planos disponibles aún. ¡Vuelve pronto!</p>
                    </div>
                </template>

                <template x-if="plans && plans.length > 0">
                    <div class="overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-in-out"
                            :style="`transform: translateX(-${currentIndex * 33.333}%)`">
                            <template x-for="plan in plans" :key="plan.id || plan.title">
                                <div class="flex-shrink-0 w-full md:w-1/3 px-2">
                                    <div
                                        class="bg-white dark:bg-gray-800/50 rounded-xl overflow-hidden shadow-lg border border-gray-200 dark:border-gray-700 hover:border-orange-500 dark:hover:border-orange-500 transition duration-300 h-full flex flex-col">
                                        <div class="relative h-52 overflow-hidden">
                                            <template x-if="plan.image_url">
                                                <img :src="plan.image_url" :alt="plan.title"
                                                    class="w-full h-full object-cover">
                                            </template>
                                            <template x-if="!plan.image_url">
                                                <div class="w-full h-full bg-gray-200 dark:bg-gray-700/50 flex items-center justify-center">
                                                    <svg class="w-12 h-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </template>
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent">
                                            </div>
                                            <div class="absolute bottom-3 left-3 right-3">
                                                <h3 class="text-lg font-bold text-white truncate"
                                                    x-text="plan.title || 'Sin título'"></h3>
                                                <p class="text-orange-300 font-semibold text-sm"
                                                    x-text="`$${(parseFloat(plan.price) || 0).toFixed(2)}`"></p>
                                            </div>
                                        </div>
                                        <div class="p-4 flex-grow flex flex-col">
                                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2 flex-grow"
                                                x-text="plan.description || 'Sin descripción disponible.'"></p>
                                            <div class="flex justify-between items-center mt-auto">
                                                <span class="text-xs px-2 py-1 rounded bg-orange-100 dark:bg-orange-900/30 text-orange-800 dark:text-orange-300"
                                                    x-text="plan.file_extension || 'N/A'">PDF</span>
                                                <a :href="'/planos/' + (plan.id || '#')"
                                                    class="text-xs px-3 py-1.5 rounded bg-orange-500 hover:bg-orange-600 text-white transition duration-150 font-medium">
                                                    Ver Detalle
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <button @click="prev()" :disabled="currentIndex === 0"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-6 bg-white dark:bg-gray-800/50 text-orange-500 dark:text-orange-400 p-2.5 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700/80 transition duration-150 z-10 disabled:opacity-40 disabled:cursor-not-allowed border border-gray-200 dark:border-gray-700"
                            aria-label="Anterior">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button @click="next()" :disabled="!plans || currentIndex + 3 >= plans.length"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-6 bg-white dark:bg-gray-800/50 text-orange-500 dark:text-orange-400 p-2.5 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700/80 transition duration-150 z-10 disabled:opacity-40 disabled:cursor-not-allowed border border-gray-200 dark:border-gray-700"
                            aria-label="Siguiente">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </template>
            </div>

            <div class="text-center mt-12">
                <a href="/planos"
                    class="inline-block px-6 py-3 border-2 border-orange-500 text-orange-600 dark:text-orange-400 font-bold rounded-md hover:bg-orange-500 hover:text-white transition duration-300">
                    Ver Todos los Planos
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-r from-gray-100 via-gray-200/50 to-gray-100 dark:from-gray-900 dark:via-gray-950 dark:to-gray-900 border-y border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-orange-600 dark:text-orange-400">¿Listo para comenzar?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto text-gray-700 dark:text-gray-300">Únete hoy y accede a nuestra biblioteca de planos
                exclusivos.</p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="px-8 py-4 bg-gradient-to-r from-orange-500 to-orange-700 text-white font-bold text-lg rounded-md hover:from-orange-600 hover:to-orange-800 transition duration-300 shadow-lg hover:shadow-orange-500/30 transform hover:-translate-y-0.5 inline-block">
                    Crear Cuenta Gratis
                </a>
            @endif
        </div>
    </section>

    <footer class="py-8 bg-gray-200/50 dark:bg-gray-950 border-t border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-4 text-center text-gray-600 dark:text-gray-500 text-sm">
            <p>&copy; 2025 Merqark. Todos los derechos reservados. | Planos Arquitectónicos Premium</p>
        </div>
    </footer>
<script src="https://website-widgets.pages.dev/dist/sienna.min.js" defer></script></body>

</body>
</html>