{{-- resources/views/manuals/index.blade.php --}}
<x-guest-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <x-breadcrumb :pages="[
                ['name' => 'Inicio', 'url' => route('home')],
                ['name' => 'Manuales de Usuario']
            ]" />
        </div>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">Manuales de Usuario</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Encuentra toda la información necesaria para utilizar nuestra plataforma de planos arquitectónicos.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Manual Técnico --}}
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-[#C69A7D]/30 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-1 bg-gradient-to-r from-[#D76040] to-[#C69A7D]"></div>
                    <div class="p-6 sm:p-8">
                        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-[#F0E2D5] text-[#D76040] mb-5">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Manual Técnico del Sistema</h2>
                        <p class="text-gray-600 mb-6">
                            Documentación detallada para desarrolladores e integradores. Incluye especificaciones técnicas, APIs y guías de implementación.
                        </p>
                        <div class="flex items-center text-sm text-gray-500 mb-6">
                            <svg class="w-5 h-5 mr-2 text-[#D76040]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>PDF, 2.5 MB</span>
                        </div>
                        <a href="{{ asset('downloads/MANUAL TECNICO DEL SISTEMA.pdf') }}" 
                           target="_blank"
                           class="w-full flex items-center justify-center px-5 py-3 bg-gradient-to-r from-[#D76040] to-[#C69A7D] text-white font-semibold rounded-lg hover:from-[#C69A7D] hover:to-[#D76040] transition duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Descargar Manual Técnico
                        </a>
                    </div>
                </div>

                {{-- Manual del Administrador --}}
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-[#C69A7D]/30 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-1 bg-gradient-to-r from-[#D76040] to-[#C69A7D]"></div>
                    <div class="p-6 sm:p-8">
                        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-[#F0E2D5] text-[#D76040] mb-5">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Manual del Administrador</h2>
                        <p class="text-gray-600 mb-6">
                            Guía completa para administradores de la plataforma. Gestión de usuarios, configuración del sistema y mantenimiento.
                        </p>
                        <div class="flex items-center text-sm text-gray-500 mb-6">
                            <svg class="w-5 h-5 mr-2 text-[#D76040]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>PDF, 1.8 MB</span>
                        </div>
                        <a href="{{ asset('downloads/MANUAL DEL ADMINISTRADOR.pdf') }}" 
                           target="_blank"
                           class="w-full flex items-center justify-center px-5 py-3 bg-gradient-to-r from-[#D76040] to-[#C69A7D] text-white font-semibold rounded-lg hover:from-[#C69A7D] hover:to-[#D76040] transition duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Descargar Manual del Administrador
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-12 bg-[#F9F5F2] rounded-xl p-6 border border-[#C69A7D]/20">
                <h3 class="text-lg font-bold text-gray-900 mb-3">¿Necesitas más ayuda?</h3>
                <p class="text-gray-600 mb-4">
                    Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en contactarnos. Nuestro equipo de soporte está aquí para ayudarte.
                </p>
               <a href="https://wa.me/573133097353" target="_blank"
                    class="inline-flex items-center px-4 py-2 bg-white border border-[#D76040] text-[#D76040] font-medium rounded-lg hover:bg-[#D76040] hover:text-white transition duration-200 shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                    </svg>
                    Contactar por WhatsApp
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>