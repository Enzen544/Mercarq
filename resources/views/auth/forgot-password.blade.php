{{-- resources/views/auth/forgot-password.blade.php --}}
<x-guest-layout>
    @push('title')
        Recuperar Contraseña - MERQARK
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
            <h2 class="text-3xl font-bold text-gray-800 mb-3">Recuperar Contraseña</h2>
            <p class="text-sm text-gray-600 leading-relaxed px-4">
                ¿Olvidaste tu contraseña? No hay problema. Simplemente ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
            </p>
        </div>

        @if (session('status'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm text-green-800 font-medium">
                        {{ session('status') }}
                    </p>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="email" class="block text-sm font-semibold text-[#5C4033]">
                    Correo Electrónico
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#D76040]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Ingresa tu correo electrónico"
                        class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:border-[#D76040] focus:ring-2 focus:ring-[#D76040]/20 transition-all duration-200 text-gray-800 placeholder-gray-400 @error('email') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    />
                </div>
                @error('email')
                    <div class="flex items-center mt-2 text-sm text-red-600">
                        <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4">
                <a href="{{ route('login') }}" class="inline-flex items-center text-sm font-medium text-[#D76040] hover:text-[#C69A7D] transition-colors duration-150">
                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver al inicio de sesión
                </a>

                <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-[#D76040] to-[#C69A7D] hover:from-[#C69A7D] hover:to-[#D76040] text-white font-bold rounded-lg shadow-lg hover:shadow-xl hover:shadow-[#D76040]/30 transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#D76040]/50 focus:ring-offset-2">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    Cambiar Contraseña
                </button>
            </div>
        </form>

        <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <div class="flex items-start">
                <svg class="h-5 w-5 text-blue-400 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                <div class="text-sm text-blue-800">
                    <p class="font-medium mb-1">¿No recibes el correo?</p>
                    <p>Revisa tu carpeta de spam o correo no deseado. El enlace de recuperación expira en 60 minutos.</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>