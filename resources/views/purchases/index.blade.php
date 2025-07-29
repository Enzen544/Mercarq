{{-- resources/views/purchases/index.blade.php --}}
<x-app-layout>
    @push('title')
COMPRAS - 
@endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitudes de Mis Planos') }}
        </h2>
    </x-slot>

   
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 sm:py-3"> 
        <x-breadcrumb :pages="[
            ['name' => 'Inicio', 'url' => route('home')],
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Solicitudes de Mis Planos']
        ]" />
    </div>

    
    <div class="py-8 sm:py-12"> 
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl border border-[#C69A7D]/30">
                <div class="p-5 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Solicitudes de Mis Planos</h2>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-5 h-5 mr-1.5 text-[#D76040]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            <span>{{ $solicitudes->total() }} solicitudes</span>
                        </div>
                    </div>

                    @if ($solicitudes->count() > 0)
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-[#F0E2D5]">
                                    <tr>
                                        <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-bold text-[#5C4033] uppercase tracking-wider">Fecha</th>
                                        <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-bold text-[#5C4033] uppercase tracking-wider">Plano</th>
                                        <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-bold text-[#5C4033] uppercase tracking-wider hidden md:table-cell">Tipo de Solicitud</th>
                                        <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-bold text-[#5C4033] uppercase tracking-wider hidden lg:table-cell">Solicitante</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($solicitudes as $solicitud)
                                        <tr class="hover:bg-[#F9F5F2] transition-colors duration-150">
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-600 font-medium">{{ $solicitud->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="px-4 sm:px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10 bg-[#EEC6BA] rounded-lg flex items-center justify-center">
                                                        @if($solicitud->blueprint)
                                                            @if(Str::endsWith($solicitud->blueprint->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                                                <svg class="w-5 h-5 text-[#5C4033]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                                </svg>
                                                            @elseif(Str::endsWith($solicitud->blueprint->file_path, ['.pdf']))
                                                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                                                </svg>
                                                            @else
                                                                <svg class="w-5 h-5 text-[#5C4033]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                                </svg>
                                                            @endif
                                                        @else
                                                             <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        @endif
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900 line-clamp-1">
                                                            {{ $solicitud->blueprint->title ?? 'Plano Eliminado' }}
                                                        </div>
                                                        @if($solicitud->blueprint)
                                                            <div class="text-xs text-gray-500">
                                                                ${{ number_format($solicitud->blueprint->price, 0, ',', '.') }} COP
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-600 hidden md:table-cell">
                                                @if($solicitud->tipo_solicitud === 'whatsapp')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        WhatsApp
                                                    </span>
                                                @elseif($solicitud->tipo_solicitud === 'descarga_gratuita')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                        Descarga Gratuita
                                                    </span>
                                                @else
                                                    <span class="text-gray-400">N/A</span>
                                                @endif
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 text-xs sm:text-sm text-gray-600 hidden lg:table-cell">
                                                {{ $solicitud->nombre_solicitante }}
                                                @if($solicitud->email_solicitante)
                                                    <div class="text-xs text-gray-500">{{ $solicitud->email_solicitante }}</div>
                                                @endif
                                                @if($solicitud->telefono_solicitante)
                                                    <div class="text-xs text-gray-500">{{ $solicitud->telefono_solicitante }}</div>
                                                @endif
                                            </td>
                                           
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="text-sm text-gray-700">
                                Mostrando
                                <span class="font-medium">{{ $solicitudes->firstItem() }}</span>
                                a
                                <span class="font-medium">{{ $solicitudes->lastItem() }}</span>
                                de
                                <span class="font-medium">{{ $solicitudes->total() }}</span>
                                resultados
                            </div>
                            <div>
                                {{ $solicitudes->links() }} {{-- Paginación --}}
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-[#F0E2D5]">
                                <svg class="w-8 h-8 text-[#D76040]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">No hay solicitudes aún</h3>
                            <p class="mt-2 text-base text-gray-500">Las solicitudes de compra o descarga de tus planos aparecerán aquí.</p>
                            <div class="mt-6">
                                <a href="{{ route('blueprints.index') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#D76040] to-[#C69A7D] border border-transparent rounded-md font-semibold text-white text-sm uppercase tracking-widest hover:from-[#C69A7D] hover:to-[#D76040] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D76040] transition duration-200 shadow-sm">
                                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ver Mis Planos
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

   
    @foreach ($solicitudes as $solicitud)
        <x-modal name="ver-solicitud-{{ $solicitud->id }}" :show="false" focusable>
            <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Detalle de la Solicitud</h3>

                <div class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Fecha</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $solicitud->created_at->format('d/m/Y H:i:s') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Plano</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $solicitud->blueprint->title ?? 'Plano Eliminado (ID: ' . $solicitud->blueprint_id . ')' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Tipo de Solicitud</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            @if($solicitud->tipo_solicitud === 'whatsapp')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    WhatsApp
                                </span>
                            @elseif($solicitud->tipo_solicitud === 'descarga_gratuita')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Descarga Gratuita
                                </span>
                            @endif
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Solicitante</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $solicitud->nombre_solicitante }}</dd>
                    </div>
                     @if($solicitud->email_solicitante)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $solicitud->email_solicitante }}</dd>
                        </div>
                    @endif
                     @if($solicitud->telefono_solicitante)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $solicitud->telefono_solicitante }}</dd>
                        </div>
                    @endif
                     @if($solicitud->mensaje)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Mensaje del Solicitante</dt>
                            <dd class="mt-1 text-sm text-gray-900 bg-gray-50 p-3 rounded-lg border border-gray-200">
                                {!! nl2br(e($solicitud->mensaje)) !!} {{-- nl2br para saltos de línea, e() para escapar HTML --}}
                            </dd>
                        </div>
                    @endif
                     @if($solicitud->ip_address)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">IP del Solicitante</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-mono">{{ $solicitud->ip_address }}</dd>
                        </div>
                    @endif
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        Cerrar
                    </x-secondary-button>
                </div>
            </div>
        </x-modal>
    @endforeach
</x-app-layout>