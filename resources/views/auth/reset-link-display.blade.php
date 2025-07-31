{{-- resources/views/auth/reset-link-display.blade.php --}}
<x-guest-layout>
    @push('title')
        Enlace de Restablecimiento - MERQARK
    @endpush

    <div class="w-full max-w-md mx-auto">
        <div class="mb-8 text-center">
            <a href="{{ route('home') }}" class="inline-block">
                <div class="mx-auto h-20 w-20 rounded-full bg-gradient-to-r from-[#D76040] to-[#C69A7D] flex items-center justify-center shadow-lg shadow-[#D76040]/30 mb-6 hover:shadow-[#D76040]/50 transition-all duration-300 hover:scale-105">
                    <svg class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </a>
            <h2 class="text-3xl font-bold text-gray-800 mb-3">Restablece tu Contraseña</h2>
            <p class="text-sm text-gray-600 leading-relaxed px-4">
                Hemos generado un enlace seguro para restablecer tu contraseña. Haz clic en el botón de abajo para continuar.
            </p>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
            <div class="flex items-start">
                <svg class="h-5 w-5 text-blue-400 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                <div class="text-sm text-blue-800">
                    <p class="font-medium mb-2">Enlace de Restablecimiento:</p>
                    <!-- Mostramos el enlace y también lo hacemos clickeable -->
                    <p class="break-all bg-white p-3 rounded border text-xs mb-2">{{ $resetUrl }}</p>
                    <p class="mt-2 text-xs">Este enlace expirará en 60 minutos.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('login') }}" class="inline-flex items-center text-sm font-medium text-[#D76040] hover:text-[#C69A7D] transition-colors duration-150">
                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al inicio de sesión
            </a>

            <a href="{{ $resetUrl }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-[#D76040] to-[#C69A7D] hover:from-[#C69A7D] hover:to-[#D76040] text-white font-bold rounded-lg shadow-lg hover:shadow-xl hover:shadow-[#D76040]/30 transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#D76040]/50 focus:ring-offset-2">
                <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Restablecer Contraseña
            </a>
        </div>
    </div>
</x-guest-layout>