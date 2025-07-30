<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERCARQ - Planos Arquitectónicos</title>
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
    class="bg-white/95 backdrop-blur-sm border-b border-[#C69A7D] sticky top-0 z-50 transition-colors duration-300">
    <div class="container mx-auto px-4 py-3 flex flex-wrap justify-between items-center gap-4">
        <div class="text-2xl font-bold bg-gradient-to-r from-[#D76040] to-[#C69A7D] bg-clip-text text-transparent">
            MERCARQ
        </div>
       <nav class="hidden md:flex space-x-6">
    <a href="#features"
        class="text-[#5C4033] hover:text-[#D76040] transition duration-200 font-medium relative group">
        Características
        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#D76040] transition-all duration-300 group-hover:w-full"></span>
    </a>
    <a href="#plans"
        class="text-[#5C4033] hover:text-[#D76040] transition duration-200 font-medium relative group">
        Planos
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

   <section
  
    class="min-h-screen flex items-center justify-center text-center px-4 bg-gradient-to-br from-[#F0E2D5] via-[#EEC6BA] to-[#E4E4E5] relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-20">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#D76040]/20 via-transparent to-transparent">
        </div>
    </div>
    <div class="relative z-10 max-w-3xl">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
            <span class="block">Diseña tu</span>
            <span
                class="block bg-gradient-to-r from-[#D76040] to-[#C69A7D] bg-clip-text text-transparent">Futuro
                con MERCARQ</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-700 mb-10 max-w-2xl mx-auto">
            Explora nuestra colección de planos arquitectónicos innovadores y da vida a tus ideas con diseños
            futuristas y sostenibles.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#plans"
                class="px-8 py-3 bg-gradient-to-r from-[#D76040] to-[#C69A7D] text-white font-bold rounded-full shadow-lg hover:shadow-xl hover:shadow-[#D76040]/20 hover:from-[#C69A7D] hover:to-[#D76040] transition duration-300 transform hover:-translate-y-1 text-center">
                Explorar Planos
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="px-8 py-3 border-2 border-[#D76040] text-[#D76040] font-bold rounded-full hover:bg-[#D76040] hover:text-white transition duration-300 text-center">
                    Únete Ahora
                </a>
            @endif
        </div>
         <div class="absolute top-10 right-10 w-2 h-2 bg-[#D76040] rounded-full animate-pulse opacity-60"></div>
    <div class="absolute bottom-20 left-10 w-1.5 h-1.5 bg-[#C69A7D] rounded-full animate-bounce delay-1000"></div>
    </div>
</section>

   <section id="features" class="py-20 bg-[#F0E2D5]">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 relative inline-block">
            <h2 class="text-3xl md:text-4xl font-bold text-[#D76040] relative z-10">
                ¿Por qué elegir MERCARQ?
            </h2>
            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-[#D76040] to-[#C69A7D] rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="bg-white/90 p-6 rounded-xl border border-[#C69A7D]/60 hover:border-[#D76040] transition-all duration-300 hover:shadow-xl hover:shadow-[#D76040]/15 transform hover:-translate-y-1 flex flex-col items-center text-center group">
                <div class="text-5xl mb-5 transform group-hover:scale-110 transition duration-300">📐</div>
                <h3 class="text-xl font-bold mb-3 text-[#5C4033]">Diseños Futuristas</h3>
                <p class="text-gray-600 group-hover:text-[#5C4033] transition duration-300">
                    Planos que combinan funcionalidad con estética vanguardista, pensados para el mañana.
                </p>
            </div>

            <div
                class="bg-white/90 p-6 rounded-xl border border-[#C69A7D]/60 hover:border-[#D76040] transition-all duration-300 hover:shadow-xl hover:shadow-[#D76040]/15 transform hover:-translate-y-1 flex flex-col items-center text-center group">
                <div class="text-5xl mb-5 transform group-hover:scale-110 transition duration-300">🔒</div>
                <h3 class="text-xl font-bold mb-3 text-[#5C4033]">Compra Segura</h3>
                <p class="text-gray-600 group-hover:text-[#5C4033] transition duration-300">
                    Sistema de pagos integrado y certificado para una experiencia de compra 100% segura.
                </p>
            </div>

            <div
                class="bg-white/90 p-6 rounded-xl border border-[#C69A7D]/60 hover:border-[#D76040] transition-all duration-300 hover:shadow-xl hover:shadow-[#D76040]/15 transform hover:-translate-y-1 flex flex-col items-center text-center group">
                <div class="text-5xl mb-5 transform group-hover:scale-110 transition duration-300">📥</div>
                <h3 class="text-xl font-bold mb-3 text-[#5C4033]">Descarga Inmediata</h3>
                <p class="text-gray-600 group-hover:text-[#5C4033] transition duration-300">
                    Obtén tus planos en formato digital (.dwg, .pdf) al instante después de tu compra.
                </p>
            </div>
        </div>
    </div>
</section>
<section id="plans" class="py-20 bg-gradient-to-b from-[#F0E2D5] to-[#EEC6BA]">
    <div class="container mx-auto px-4">
        <div class="text-center mb-4 relative inline-block">
            <h2 class="text-3xl md:text-4xl font-bold text-[#D76040] relative z-10">
                Últimos Planos Agregados
            </h2>
            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-32 h-1 bg-gradient-to-r from-[#D76040] to-[#C69A7D] rounded-full"></div>
        </div>
        <p class="text-center text-[#5C4033] mb-12 text-lg">Descubre las últimas creaciones de nuestra comunidad.</p>

        <div x-data="{
            plans: @js($latestBlueprints ?? []),
            currentIndex: 0,
            previewModal: false,
            previewFile: null,
            showPurchaseModal: false,
            countdown: 10,
            countdownInterval: null,
            get visiblePlans() {
                if (!this.plans || this.plans.length === 0) return [];
                return this.plans.slice(this.currentIndex, this.currentIndex + 3);
            },
            next() { if (this.plans && this.currentIndex + 3 < this.plans.length) this.currentIndex += 3; else this.currentIndex = 0; },
            prev() { if (this.plans && this.currentIndex - 3 >= 0) this.currentIndex -= 3; else this.currentIndex = Math.max(0, this.plans.length - 3); },
            openPreview(plan) {
                this.previewFile = plan;
                this.previewModal = true;
                this.startCountdown();
            },
            closePreview() {
                this.previewModal = false;
                this.previewFile = null;
                this.stopCountdown();
            },
            startCountdown() {
                this.countdown = 10;
                this.countdownInterval = setInterval(() => {
                    this.countdown--;
                    if (this.countdown <= 0) {
                        this.stopCountdown();
                        this.showPurchasePrompt();
                    }
                }, 1000);
            },
            stopCountdown() {
                if (this.countdownInterval) {
                    clearInterval(this.countdownInterval);
                    this.countdownInterval = null;
                }
            },
            showPurchasePrompt() {
                this.previewModal = false;
                this.showPurchaseModal = true;
            },
            closePurchaseModal() {
                this.showPurchaseModal = false;
                this.previewFile = null;
            },
            handlePurchase() {
                if (this.previewFile && parseFloat(this.previewFile.price || 0) === 0) {
                    // Plano gratis - descargar directamente
                    this.downloadFile();
                } else {
                    // Plano pago - ir a ver detalle
                    window.location.href = `/planos/${this.previewFile.id}`;
                }
            },
   downloadFile() {
    if (this.previewFile && this.previewFile.id) {
        // Verificar si es gratuito
        if (parseFloat(this.previewFile.price || 0) === 0) {
            // Para planos gratuitos, usar la ruta pública sin login
            // Construimos la URL manualmente según la ruta definida
            window.location.href = `/planos/${this.previewFile.id}/descargar`;
        } else {
            // Para planos pagos, redirigir al detalle (requerirá login)
            window.location.href = `/planos/${this.previewFile.id}`;
        }
        this.closePurchaseModal();
    }
},
            getFileType(filename) {
                if (!filename) return 'Archivo';
                const ext = filename.split('.').pop().toLowerCase();
                switch(ext) {
                    case 'pdf': return 'PDF';
                    case 'jpg': case 'jpeg': return 'JPG';
                    case 'png': return 'PNG';
                    case 'gif': return 'GIF';
                    case 'dwg': return 'DWG';
                    case 'dxf': return 'DXF';
                    case 'rvt': return 'RVT';
                    case 'skp': return 'SKP';
                    default: return ext.toUpperCase();
                }
            },
            getFileIcon(filename) {
                if (!filename) return 'document';
                const ext = filename.split('.').pop().toLowerCase();
                if (['jpg', 'jpeg', 'png', 'gif'].includes(ext)) return 'image';
                if (ext === 'pdf') return 'pdf';
                return 'document';
            }
        }" class="relative px-10 md:px-16">
            
            <template x-if="!plans || plans.length === 0">
                <div class="text-center py-10 text-gray-500">
                    <svg class="w-16 h-16 mx-auto text-[#D76040]/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="mt-4 text-lg text-[#5C4033]">No hay planos disponibles aún. ¡Vuelve pronto!</p>
                </div>
            </template>
            
            <template x-if="plans && plans.length > 0">
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" :style="`transform: translateX(-${currentIndex * 33.333}%)`">
                        <template x-for="plan in plans" :key="plan.id || plan.title">
                            <div class="flex-shrink-0 w-full md:w-1/3 px-3">
                                <div class="bg-white/95 rounded-xl overflow-hidden shadow-lg border border-[#C69A7D]/50 hover:border-[#D76040] transition-all duration-300 h-full flex flex-col transform hover:-translate-y-2 hover:shadow-2xl hover:shadow-[#D76040]/20">
                                    
                                    <div class="relative h-52 overflow-hidden bg-gradient-to-br from-[#EEC6BA] to-[#C69A7D] cursor-pointer group" @click="openPreview(plan)">
                                        <template x-if="plan.file_path && ['jpg', 'jpeg', 'png', 'gif'].includes((plan.file_path.split('.').pop() || '').toLowerCase())">
                                            <img :src="`/storage/${plan.file_path}`" :alt="plan.title" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                        </template>
                                        
                                        <template x-if="plan.file_path && (plan.file_path.split('.').pop() || '').toLowerCase() === 'pdf'">
                                            <div class="w-full h-full flex items-center justify-center relative">
                                                <div class="w-32 h-40 bg-white shadow-lg rounded border-2 border-gray-200 flex flex-col relative transform rotate-3 group-hover:rotate-0 transition-transform duration-300">
                                                    <div class="h-3 bg-red-500 rounded-t"></div>
                                                    <div class="flex-1 p-2 space-y-1">
                                                        <div class="h-1 bg-gray-300 rounded w-full"></div>
                                                        <div class="h-1 bg-gray-300 rounded w-4/5"></div>
                                                        <div class="h-1 bg-gray-300 rounded w-full"></div>
                                                        <div class="h-1 bg-gray-300 rounded w-3/5"></div>
                                                        <div class="h-8 bg-gray-200 rounded mt-2"></div>
                                                        <div class="space-y-1">
                                                            <div class="h-1 bg-gray-300 rounded w-full"></div>
                                                            <div class="h-1 bg-gray-300 rounded w-4/5"></div>
                                                            <div class="h-1 bg-gray-300 rounded w-full"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <svg class="absolute bottom-2 right-2 w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </template>
                                        
                                        <template x-if="plan.file_path && ['dwg', 'dxf'].includes((plan.file_path.split('.').pop() || '').toLowerCase())">
                                            <div class="w-full h-full flex items-center justify-center relative">
                                                <div class="w-40 h-32 bg-white shadow-lg rounded border-2 border-blue-200 flex items-center justify-center relative group-hover:scale-105 transition-transform duration-300">
                                                    <svg class="w-24 h-24 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                                    </svg>
                                                    <div class="absolute inset-0 border-2 border-dashed border-blue-300 m-2 rounded"></div>
                                                </div>
                                                <svg class="absolute bottom-2 right-2 w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                                                </svg>
                                            </div>
                                        </template>
                                        
                                        <template x-if="!plan.file_path || !['jpg', 'jpeg', 'png', 'gif', 'pdf', 'dwg', 'dxf'].includes((plan.file_path.split('.').pop() || '').toLowerCase())">
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-16 h-16 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                        </template>
                                        
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-all duration-300 flex items-center justify-center">
                                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white text-center">
                                                <svg class="w-8 h-8 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                <p class="text-xs font-medium">Vista Previa</p>
                                            </div>
                                        </div>
                                        
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                                        <div class="absolute bottom-3 left-3 right-3">
                                            <h3 class="text-lg font-bold text-white drop-shadow-sm" x-text="plan.title || 'Sin título'"></h3>
                                            <p class="text-[#EEC6BA] font-semibold text-sm drop-shadow" x-text="`$${(parseFloat(plan.price) || 0).toLocaleString('es-CO', {minimumFractionDigits: 0, maximumFractionDigits: 0})} COP`"></p>
                                        </div>
                                    </div>
                                    
                                    <div class="p-5 flex-grow flex flex-col">
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-grow" x-text="plan.description || 'Sin descripción disponible.'"></p>
                                        <div class="flex justify-between items-center mt-auto">
                                            <div class="flex items-center space-x-2">
                                                <span class="text-xs px-2.5 py-1 rounded bg-[#EEC6BA]/60 text-[#5C4033] font-medium flex items-center space-x-1">
                                                    <template x-if="getFileIcon(plan.file_path) === 'pdf'">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </template>
                                                    <template x-if="getFileIcon(plan.file_path) === 'image'">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </template>
                                                    <template x-if="getFileIcon(plan.file_path) === 'document'">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </template>
                                                    <span x-text="getFileType(plan.file_path)"></span>
                                                </span>
                                                
                                                <button @click.stop="openPreview(plan)" 
                                                        class="text-xs px-2.5 py-1 rounded bg-blue-100 text-blue-700 hover:bg-blue-200 transition duration-200 font-medium flex items-center space-x-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    <span>Previsualizar</span>
                                                </button>
                                            </div>
                                            
                                            <a :href="'/planos/' + (plan.id || '#')"
                                                class="text-xs px-3 py-1.5 rounded bg-gradient-to-r from-[#D76040] to-[#C69A7D] text-white hover:from-[#C69A7D] hover:to-[#D76040] transition duration-200 font-medium">
                                                Ver Detalle
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    
                    <button @click="prev()" :disabled="currentIndex === 0"
                        class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-6 bg-white text-[#D76040] p-3 rounded-full hover:bg-[#D76040] hover:text-white border border-[#C69A7D] shadow-lg transition duration-200 z-10 disabled:opacity-40">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button @click="next()" :disabled="!plans || currentIndex + 3 >= plans.length"
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-6 bg-white text-[#D76040] p-3 rounded-full hover:bg-[#D76040] hover:text-white border border-[#C69A7D] shadow-lg transition duration-200 z-10 disabled:opacity-40">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </template>
            
            <div x-show="previewModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity" @click="closePreview()"></div>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                        <div class="bg-gradient-to-r from-[#D76040] to-[#C69A7D] px-4 py-3 text-white text-center relative">
                            <div class="flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="font-medium">Vista previa disponible por: </span>
                                <span class="bg-white/20 px-3 py-1 rounded-full font-bold text-lg" x-text="countdown + 's'"></span>
                            </div>
                            <div class="absolute top-0 left-0 h-full bg-white/10 transition-all duration-1000 ease-linear" :style="`width: ${((10 - countdown) / 10) * 100}%`"></div>
                        </div>
                        
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900" x-text="previewFile?.title || 'Vista previa'"></h3>
                                <button @click="closePreview()" class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="w-full h-96 bg-gray-100 rounded-lg flex items-center justify-center relative">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent z-10 rounded-lg"></div>
                                <div class="absolute bottom-4 left-4 right-4 z-20 text-white text-center">
                                    <p class="text-sm bg-black/50 rounded px-3 py-2 backdrop-blur-sm">
                                        ⏱️ Vista previa limitada - Para acceso completo, adquiere el plano
                                    </p>
                                </div>
                                
                                <template x-if="previewFile && previewFile.file_path && ['jpg', 'jpeg', 'png', 'gif'].includes((previewFile.file_path.split('.').pop() || '').toLowerCase())">
                                    <img :src="`/storage/${previewFile.file_path}`" :alt="previewFile.title" class="max-w-full max-h-full object-contain opacity-75">
                                </template>
                                <template x-if="previewFile && previewFile.file_path && (previewFile.file_path.split('.').pop() || '').toLowerCase() === 'pdf'">
                                    <div class="w-full h-full border-0 relative">
                                        <iframe :src="`/storage/${previewFile.file_path}#toolbar=0&navpanes=0&scrollbar=0`" class="w-full h-full border-0 opacity-75 pointer-events-none"></iframe>
                                    </div>
                                </template>
                                <template x-if="!previewFile || !previewFile.file_path || !['jpg', 'jpeg', 'png', 'gif', 'pdf'].includes((previewFile.file_path.split('.').pop() || '').toLowerCase())">
                                    <div class="text-center text-gray-500">
                                        <svg class="w-16 h-16 mx-auto mb-4 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p>Vista previa limitada disponible</p>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button @click="closePreview()" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cerrar Vista Previa
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div x-show="showPurchaseModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
                    <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-6 pt-6 pb-4">
                            <div class="text-center mb-6">
                                <template x-if="previewFile && parseFloat(previewFile.price || 0) === 0">
                                    <div class="mx-auto flex items-center justify-center h-16 w-16 bg-green-100 rounded-full mb-4">
                                        <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                    </div>
                                </template>
                                <template x-if="previewFile && parseFloat(previewFile.price || 0) > 0">
                                    <div class="mx-auto flex items-center justify-center h-16 w-16 bg-[#D76040]/10 rounded-full mb-4">
                                        <svg class="h-8 w-8 text-[#D76040]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                </template>
                                
                                <template x-if="previewFile && parseFloat(previewFile.price || 0) === 0">
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">¡Plano Gratuito! 🎉</h3>
                                        <p class="text-gray-600">Este plano es completamente gratis. ¿Deseas descargarlo ahora?</p>
                                    </div>
                                </template>
                                <template x-if="previewFile && parseFloat(previewFile.price || 0) > 0">
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">¡Tiempo de Vista Previa Terminado!</h3>
                                        <p class="text-gray-600 mb-4">Para acceder al contenido completo de este plano, necesitas adquirirlo.</p>
                                        <div class="bg-gradient-to-r from-[#F0E2D5] to-[#EEC6BA] rounded-lg p-4">
                                            <div class="text-center">
                                                <p class="text-[#5C4033] font-medium" x-text="previewFile?.title || 'Plano'"></p>
                                                <p class="text-2xl font-bold text-[#D76040] mt-1" x-text="`${(parseFloat(previewFile?.price || 0)).toLocaleString('es-CO', {minimumFractionDigits: 0, maximumFractionDigits: 0})} COP`"></p>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 px-6 py-4 sm:flex sm:flex-row-reverse sm:space-x-reverse sm:space-x-3">
                            <template x-if="previewFile && parseFloat(previewFile.price || 0) === 0">
                                <div class="sm:flex sm:flex-row-reverse sm:space-x-reverse sm:space-x-3 w-full">
                                    <button @click="handlePurchase()" 
                                            class="w-full inline-flex justify-center items-center rounded-md border border-transparent shadow-sm px-6 py-3 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors sm:w-auto sm:text-sm">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Descargar Gratis
                                    </button>
                                    <button @click="closePurchaseModal()" 
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                                        Ahora No
                                    </button>
                                </div>
                            </template>
                            <template x-if="previewFile && parseFloat(previewFile.price || 0) > 0">
                                <div class="sm:flex sm:flex-row-reverse sm:space-x-reverse sm:space-x-3 w-full">
                                    <button @click="handlePurchase()" 
                                            class="w-full inline-flex justify-center items-center rounded-md border border-transparent shadow-sm px-6 py-3 bg-gradient-to-r from-[#D76040] to-[#C69A7D] text-base font-medium text-white hover:from-[#C69A7D] hover:to-[#D76040] focus:outline-none focus:ring-2 focus:ring-[#D76040] focus:ring-offset-2 transition-all sm:w-auto sm:text-sm">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                        Comprar Plano
                                    </button>
                                    <button @click="closePurchaseModal()" 
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                                        Cerrar
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="/planos"
                class="inline-block px-6 py-3 border-2 border-[#D76040] text-[#D76040] font-bold rounded-md hover:bg-[#D76040] hover:text-white transition duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                Ver Todos los Planos
            </a>
        </div>
    </div>
</section>
  

   <section class="py-20 bg-[#F0E2D5] border-y border-[#C69A7D]/30">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[#D76040]">¿Listo para comenzar?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-[#5C4033]">
            Únete hoy y accede a nuestra biblioteca de planos exclusivos.
        </p>
        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="px-8 py-4 bg-gradient-to-r from-[#D76040] via-[#C69A7D] to-[#D76040] text-white font-bold text-lg rounded-md hover:from-[#C69A7D] hover:to-[#D76040] transition-all duration-300 shadow-xl hover:shadow-2xl hover:shadow-[#D76040]/40 transform hover:-translate-y-1 inline-block">
                Crear Cuenta Gratis
            </a>
        @endif
    </div>
</section>

 <footer class="py-8 bg-[#E4E4E5] border-t border-[#C69A7D]/30">
    <div class="container mx-auto px-4 text-center text-[#5C4033]/80 text-sm">
        <p>&copy; 2025 MERCARQ. Todos los derechos reservados. | Planos Arquitectónicos Premium</p>
    </div>
</footer>
<script src="https://website-widgets.pages.dev/dist/sienna.min.js" defer></script>
</body>
</html>