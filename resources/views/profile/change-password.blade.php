{{-- resources/views/auth/set-new-password.blade.php --}}
<x-guest-layout>
    @push('title')
        Establecer Nueva Contraseña - MERQARK
    @endpush

    <div class="w-full max-w-md mx-auto">
        <div class="mb-8 text-center">
            <a href="{{ route('home') }}" class="inline-block">
                <div class="mx-auto h-20 w-20 rounded-full bg-gradient-to-r from-[#D76040] to-[#C69A7D] flex items-center justify-center shadow-lg shadow-[#D76040]/30 mb-6 hover:shadow-[#D76040]/50 transition-all duration-300 hover:scale-105">
                    <svg class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m0 0a2 2 0 012 2 2 2 0 00-2-2m-2-2v10m6 0a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h10a2 2 0 012 2v10z" />
                    </svg>
                </div>
            </a>
            <h2 class="text-3xl font-bold text-gray-800 mb-3">Establecer Nueva Contraseña</h2>
            <p class="text-sm text-gray-600 leading-relaxed px-4">
                Ingresa tu nueva contraseña para tu cuenta asociada a {{ session('reset_email_for_new_password') ?? 'tu correo' }}.
            </p>
        </div>

        <form method="POST" action="{{ route('password.set-new') }}" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="password" class="block text-sm font-semibold text-[#5C4033]">
                    Nueva Contraseña
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#D76040]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Ingresa tu nueva contraseña"
                        class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:border-[#D76040] focus:ring-2 focus:ring-[#D76040]/20 transition-all duration-200 text-gray-800 placeholder-gray-400 @error('password') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    />
                </div>
                @error('password')
                    <div class="flex items-center mt-2 text-sm text-red-600">
                        <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                         {{ $message }}
                    </div>
                @enderror
                <div class="text-xs text-gray-500 mt-1">
                    La contraseña debe tener al menos 8 caracteres.
                </div>
            </div>

            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-semibold text-[#5C4033]">
                    Confirmar Nueva Contraseña
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#D76040]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirma tu nueva contraseña"
                        class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:border-[#D76040] focus:ring-2 focus:ring-[#D76040]/20 transition-all duration-200 text-gray-800 placeholder-gray-400 @error('password_confirmation') border-red-300 focus:border-red-500 focus:ring-red-200 @enderror"
                    />
                </div>
                @error('password_confirmation')
                    <div class="flex items-center mt-2 text-sm text-red-600">
                        <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                         {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex items-center justify-center pt-4">
                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-[#D76040] to-[#C69A7D] hover:from-[#C69A7D] hover:to-[#D76040] text-white font-bold rounded-lg shadow-lg hover:shadow-xl hover:shadow-[#D76040]/30 transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#D76040]/50 focus:ring-offset-2">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Establecer Contraseña
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>