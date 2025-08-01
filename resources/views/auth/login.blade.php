{{-- resources/views/auth/login.blade.php --}}
<x-guest-layout>
    @push('title')
        INGRESAR -
    @endpush
            {{-- Card principal --}}
            <div class="rounded-2xl shadow-2xl border border-orange-100 p-8 my-9" style="width: 40%">

                @if (session('status'))
                    <div class="mb-6 text-sm font-medium text-green-600 bg-green-50 p-4 rounded-xl border border-green-200">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="text-center mb-8">
                    <a href="{{ route('home') }}" class="inline-block group">
                        <div class="mx-auto h-20 w-20 rounded-2xl bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center shadow-lg shadow-orange-500/25 mb-6 group-hover:shadow-orange-500/40 group-hover:scale-105 transition-all duration-300">
                            <svg class="h-11 w-11 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </a>

                    <h2 class="text-3xl font-bold text-gray-900 mb-2">
                        Bienvenido a <a href="{{ route('home') }}" class="text-orange-600 hover:text-orange-700 transition-colors duration-300">MerCarq</a>
                    </h2>

                    <p class="text-orange-600 font-medium text-base mb-1">¿Eres parte del equipo?</p>
                    <p class="text-gray-500 text-sm">Accede para gestionar proyectos y planos</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf


                    <div class="space-y-2">
                        <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700 font-semibold text-sm" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <x-text-input
                                id="email"
                                class="block w-full pl-12 pr-4 py-3.5 border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm text-gray-900 placeholder-gray-400 transition-all duration-200"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="correo@ejemplo.com"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    </div>


                    <div class="space-y-2">
                        <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 font-semibold text-sm" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <x-text-input
                                id="password"
                                class="block w-full pl-12 pr-4 py-3.5 border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm text-gray-900 placeholder-gray-400 transition-all duration-200"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••••"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>


                    <div class="flex items-center">
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500 focus:ring-2"
                            name="remember"
                        >
                        <label for="remember_me" class="ml-3 block text-sm font-medium text-gray-700">
                            {{ __('Mantener sesión iniciada') }}
                        </label>
                    </div>

                    {{-- Botones --}}
                    <div class="space-y-4">
                        <x-primary-button class="w-full justify-center py-3.5 px-4 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-orange-500/25 transform hover:-translate-y-0.5 transition-all duration-200 focus:ring-4 focus:ring-orange-500/25">
                            {{ __('Iniciar Sesión') }}
                        </x-primary-button>

                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="text-sm font-medium text-orange-600 hover:text-orange-500 transition-colors duration-200" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </form>


                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="text-center text-sm text-gray-500">
                        ¿No tienes acceso?
                        <span class="font-medium text-orange-600">Contacta con un administrador</span>
                    </p>
                </div>
            </div>
</x-guest-layout>
