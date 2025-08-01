{{-- resources/views/auth/register.blade.php --}}
<x-guest-layout>
    @push('title')
        REGISTRARSE -
    @endpush

    <div class="bg-white rounded-2xl shadow-2xl border border-orange-100 p-8 my-9" style="width: 40%">


                <div class="text-center mb-8">
                    <a href="{{ route('home') }}" class="inline-block group">
                        <div class="mx-auto h-20 w-20 rounded-2xl bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center shadow-lg shadow-orange-500/25 mb-6 group-hover:shadow-orange-500/40 group-hover:scale-105 transition-all duration-300">
                            <svg class="h-11 w-11 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                    </a>

                    <h2 class="text-3xl font-bold text-gray-900 mb-2">
                        Únete a <a href="{{ route('home') }}" class="text-orange-600 hover:text-orange-700 transition-colors duration-300">MerCarq</a>
                    </h2>

                    <p class="text-orange-600 font-medium text-base mb-1">¿Nuevo en el equipo?</p>
                    <p class="text-gray-500 text-sm">Crea tu cuenta para acceder a la plataforma</p>
                </div>


                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf


                    <div class="space-y-2">
                        <x-input-label for="name" :value="__('Nombre Completo')" class="text-gray-700 font-semibold text-sm" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <x-text-input
                                id="name"
                                class="block w-full pl-12 pr-4 py-3.5 border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm text-gray-900 placeholder-gray-400 transition-all duration-200"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Tu nombre completo"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                    </div>


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
                                autocomplete="new-password"
                                placeholder="Mínimo 8 caracteres"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>


                    <div class="space-y-2">
                        <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-gray-700 font-semibold text-sm" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <x-text-input
                                id="password_confirmation"
                                class="block w-full pl-12 pr-4 py-3.5 border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm text-gray-900 placeholder-gray-400 transition-all duration-200"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Repite tu contraseña"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    {{-- Botones --}}
                    <div class="space-y-4 pt-2">
                        <x-primary-button class="w-full justify-center py-3.5 px-4 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-orange-500/25 transform hover:-translate-y-0.5 transition-all duration-200 focus:ring-4 focus:ring-orange-500/25">
                            {{ __('Crear Cuenta') }}
                        </x-primary-button>

                        <div class="text-center">
                            <a class="text-sm font-medium text-orange-600 hover:text-orange-500 transition-colors duration-200" href="{{ route('login') }}">
                                {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
                            </a>
                        </div>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="text-center text-sm text-gray-500">
                        Al registrarte, aceptas nuestros
                        <span class="font-medium text-orange-600">términos y condiciones</span>
                    </p>
                </div>
            </div>
</x-guest-layout>
