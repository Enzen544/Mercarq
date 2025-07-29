{{-- resources/views/purchases/show.blade.php --}}
<x-app-layout>
    @push('title')
MOSTRAR PLANOS - 
@endpush
    <x-slot name="header">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <x-breadcrumb :pages="[
                ['name' => 'Inicio', 'url' => route('home')],
                ['name' => 'Dashboard', 'url' => route('dashboard')],
                ['name' => 'Historial de Compras', 'url' => route('purchases.index')],
                ['name' => 'Detalle de Compra']
            ]" />
        </div>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl border border-[#C69A7D]/30">
                <div class="p-5 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Detalle de Compra</h2>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            @if($purchase->status === 'completed') bg-green-100 text-green-800
                            @elseif($purchase->status === 'pending') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($purchase->status) }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="md:col-span-1">
                            <div class="bg-gray-50 rounded-xl overflow-hidden border border-gray-200 h-full flex flex-col">
                                @if($purchase->blueprint)
                                    @if(Str::endsWith($purchase->blueprint->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                        <img src="{{ Storage::url($purchase->blueprint->file_path) }}" alt="{{ $purchase->blueprint->title }}" class="w-full h-48 object-cover">
                                    @else
                                        <div class="w-full h-48 bg-gradient-to-br from-[#EEC6BA] to-[#C69A7D] flex items-center justify-center">
                                            @if(Str::endsWith($purchase->blueprint->file_path, ['.pdf']))
                                                <svg class="w-16 h-16 text-red-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                                </svg>
                                            @else
                                                <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="p-4 flex-grow">
                                        <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $purchase->blueprint->title }}</h3>
                                        <p class="text-xs text-gray-500 mb-2">Por: {{ $purchase->blueprint->user->name ?? 'Diseñador' }}</p>
                                        <p class="text-sm text-gray-600 line-clamp-2">{{ $purchase->blueprint->description ?? 'Sin descripción.' }}</p>
                                         @if(isset($purchase->blueprint->interest_count))
                                            <div class="mt-3 flex items-center text-xs text-gray-500">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                <span>{{ $purchase->blueprint->interest_count }} usuarios interesados</span>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-bold text-gray-900">Plano no disponible</h3>
                                        <p class="text-sm text-gray-500">Este plano ha sido eliminado.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="bg-[#F9F5F2] rounded-xl p-5 sm:p-6 border border-[#C69A7D]/20">
                                <h3 class="text-lg font-bold text-gray-900 mb-4">Información de la Transacción</h3>
                                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-3">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">ID de Compra</dt>
                                        <dd class="mt-1 text-sm text-gray-900 font-mono">{{ $purchase->id }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Fecha</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $purchase->created_at->format('d/m/Y H:i:s') }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Método de Pago</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($purchase->payment_method)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    {{ ucfirst($purchase->payment_method) }}
                                                </span>
                                            @else
                                                <span class="text-gray-400">N/A</span>
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Referencia</dt>
                                        <dd class="mt-1 text-sm text-gray-900 font-mono break-all">
                                            @if($purchase->payment_reference)
                                                {{ $purchase->payment_reference }}
                                            @else
                                                <span class="text-gray-400">N/A</span>
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Monto Pagado</dt>
                                        <dd class="mt-1 text-2xl font-bold text-[#D76040]">
                                            ${{ number_format($purchase->amount, 0, ',', '.') }} COP
                                        </dd>
                                    </div>
                                     @if($purchase->blueprint)
                                        <div class="sm:col-span-2 pt-2">
                                            <dt class="text-sm font-medium text-gray-500">Acciones</dt>
                                            <dd class="mt-2">
                                                @if($purchase->status === 'completed')
                                                    <a href="{{ route('blueprints.download', $purchase->blueprint) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 border border-transparent rounded-md font-semibold text-white text-sm uppercase tracking-widest hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200 shadow-sm">
                                                        <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                        </svg>
                                                        Descargar Plano
                                                    </a>
                                                @else
                                                    <p class="text-sm text-gray-500">El plano estará disponible para descarga una vez se confirme el pago.</p>
                                                @endif
                                            </dd>
                                        </div>
                                    @endif
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('purchases.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-gray-700 text-sm uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-200">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Volver al Historial
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>