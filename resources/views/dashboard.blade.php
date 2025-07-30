{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
   @push('title')
DASHBOARD - 
@endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    {{-- Breadcrumb --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <x-breadcrumb :pages="[['name' => 'Panel de Control']]" />
    </div>

    <div class="py-6"> {{-- Cambié py-12 a py-6 para reducir espacio --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">¡Bienvenido, {{ Auth::user()->name }}!</h1>
                        <p class="text-gray-600">Gestiona tu experiencia en MERCARQ desde aquí.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 border border-gray-200 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="p-5">
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-orange-100 text-orange-600 mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-800 mb-2">Mis Planos</h3>
                                <p class="text-gray-600 text-sm mb-4">Explora, gestiona y sube tus propios planos.</p>
                                <a href="{{ route('blueprints.index') }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium inline-flex items-center">
                                    Ver Mis Planos
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('blueprints.create') }}" class="mt-2 block text-orange-600 hover:text-orange-800 text-sm font-medium inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Subir Nuevo Plano
                                </a>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 border border-gray-200 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="p-5">
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-orange-100 text-orange-600 mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-800 mb-2">Mi Perfil</h3>
                                <p class="text-gray-600 text-sm mb-4">Gestiona tu información personal y avatar.</p>
                                <a href="{{ route('profile.edit') }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium inline-flex items-center">
                                    Editar Perfil
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 border border-gray-200 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="p-5">
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-orange-100 text-orange-600 mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-800 mb-2">Historial de Compras</h3>
                                <p class="text-gray-600 text-sm mb-4">Revisa el numero de personas que han estado interesadas en tus planos</p>
                                <a href="{{ route('purchases.index') }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium inline-flex items-center">
                                    Ver Historial
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 border border-gray-200 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="p-5">
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-orange-100 text-orange-600 mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-800 mb-2">Invitar Usuario</h3>
                                <p class="text-gray-600 text-sm mb-4">Registra a un nuevo miembro en el equipo.</p>
                                <a href="{{ route('invite.user.form') }}" class="text-orange-600 hover:text-orange-800 text-sm font-medium inline-flex items-center">
                                    Invitar Ahora
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 text-center">
                        <p class="text-gray-500 text-sm">
                    ¿Necesitas ayuda? <a href="{{ route('manuals.index') }}" class="text-orange-600 hover:underline" target="_blank">Visualiza los manuales</a>.                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://website-widgets.pages.dev/dist/sienna.min.js" defer></script>

    </div>
</x-app-layout>
