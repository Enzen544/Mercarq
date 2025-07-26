{{-- resources/views/auth/login.blade.php --}}
<x-guest-layout>
    <div class="w-full"> {{-- Contenedor para ancho completo dentro del slot --}}
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600 bg-green-50 p-3 rounded-md">
                {{ session('status') }}
            </div>
        @endif

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4"> {{-- Reducido space-y --}}
            @csrf

            <div class="text-center mb-6">
                 <div class="mx-auto h-16 w-16 rounded-full bg-gradient-to-r from-orange-500 to-orange-700 flex items-center justify-center shadow-lg shadow-orange-500/30 mb-4">
                    <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Inicia Sesión en Merqark</h2> {{-- Cambiado a gris para mejor contraste en fondo blanco --}}
                <p class="text-sm text-orange-600 mt-1">¿Eres parte del equipo?</p>
                <p class="text-xs text-gray-500 italic">Accede para gestionar proyectos y planos.</p>
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-orange-700 font-medium" /> {{-- Ajustado color --}}
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <x-text-input id="email" class="block mt-1 w-full pl-10 border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="tu@email.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-orange-600" /> {{-- Ajustado color --}}
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="text-orange-700 font-medium" /> {{-- Ajustado color --}}
                <div class="mt-1 relative rounded-md shadow-sm">
                     <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <x-text-input id="password" class="block mt-1 w-full pl-10 border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"
                                    placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-orange-600" /> {{-- Ajustado color --}}
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" name="remember">
                <label for="remember_me" class="ml-2 block text-sm text-gray-700"> {{-- Ajustado color --}}
                    {{ __('Recordarme') }}
                </label>
            </div>

            <div class="flex items-center justify-between pt-2"> {{-- Añadido padding top --}}
                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a class="font-medium text-orange-600 hover:text-orange-500 transition duration-150 ease-in-out" href="{{ route('password.request') }}"> {{-- Ajustado color --}}
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    </div>
                @endif

                <div>
                    <x-primary-button class="ml-3 py-2 px-4 bg-gradient-to-r from-orange-500 to-orange-700 hover:from-orange-600 hover:to-orange-800 text-white font-bold rounded-md shadow hover:shadow-orange-500/30 transform hover:-translate-y-0.5 transition duration-150 ease-in-out"> {{-- Botón más pequeño --}}
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>
                </div>
            </div>
        </form>

        <div class="mt-6 text-center text-xs text-gray-500">
            <p>¿No tienes acceso? Contacta con un administrador.</p>
        </div>
    </div>
</x-guest-layout>
