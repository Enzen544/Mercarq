{{-- resources/views/blueprints/public_show.blade.php --}}
<x-guest-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <x-breadcrumb :pages="[
            ['name' => 'Inicio', 'url' => route('home')],
            ['name' => 'Catálogo de Planos', 'url' => route('blueprints.public.index')],
            ['name' => $blueprint->title] // Último elemento, sin URL
        ]" />
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-orange-600 hover:text-orange-800">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('blueprints.public.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-orange-600 md:ms-2">Planos</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ $blueprint->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="md:flex">
                <div class="md:flex-shrink-0 md:w-1/2 h-96">
                    @if (Str::endsWith($blueprint->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img class="h-full w-full object-contain" src="{{ Storage::url($blueprint->file_path) }}" alt="{{ $blueprint->title }}">
                    @else
                        <div class="h-full w-full bg-gray-100 flex items-center justify-center">
                             <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-orange-600 font-semibold">{{ $blueprint->user->name ?? 'Usuario' }}</div>
                    <h1 class="block mt-1 text-2xl leading-tight font-medium text-black">{{ $blueprint->title }}</h1>
                    <p class="mt-2 text-gray-600">{{ $blueprint->description ?? 'Sin descripción disponible.' }}</p>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-orange-600">${{ number_format($blueprint->price, 2) }}</span>
                    </div>
                    <div class="mt-6">
                        <p class="text-sm text-gray-500">Formato: <span class="font-medium">{{ pathinfo($blueprint->file_path, PATHINFO_EXTENSION) }}</span></p>
                        <p class="text-sm text-gray-500">Tamaño: <span class="font-medium">Desconocido</span></p>
                    </div>
                    <div class="mt-6">
                        @auth
                            @php
                                $hasPurchased = Auth::user()->purchases()->where('blueprint_id', $blueprint->id)->where('status', 'completed')->exists();
                            @endphp
                            @if ($hasPurchased)
                                <a href="{{ Storage::url($blueprint->file_path) }}" download class="px-6 py-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition duration-150 inline-flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Descargar Plano
                                </a>
                                <p class="mt-2 text-sm text-green-600">¡Ya has comprado este plano!</p>
                            @else
                                <button @click="$dispatch('open-modal', 'purchase-confirmation')" class="px-6 py-3 bg-orange-600 text-white font-medium rounded-md hover:bg-orange-700 transition duration-150">
                                    Comprar Plano
                                </button>
                                 <!-- Modal de Confirmación de Compra (Simplificado) -->
                                <x-modal name="purchase-confirmation" :show="false" focusable>
                                    <div class="p-6">
                                        <h2 class="text-lg font-medium text-gray-900">Confirmar Compra</h2>
                                        <p class="mt-2 text-sm text-gray-600">
                                            Estás a punto de comprar el plano <strong>"{{ $blueprint->title }}"</strong> por <strong>${{ number_format($blueprint->price, 2) }}</strong>.
                                        </p>
                                        <p class="mt-2 text-sm text-gray-600">
                                            Al hacer clic en "Confirmar y Pagar", serás redirigido al sistema de pago.
                                        </p>

                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancelar') }}
                                            </x-secondary-button>

                                            <x-primary-button class="ml-3 bg-orange-600 hover:bg-orange-700" disabled>
                                                <!-- Aquí iría la lógica de redirección al pago -->
                                                Confirmar y Pagar (Próximamente)
                                            </x-primary-button>
                                        </div>
                                    </div>
                                </x-modal>
                            @endif
                        @else
                             <a href="{{ route('login') }}" class="px-6 py-3 bg-orange-600 text-white font-medium rounded-md hover:bg-orange-700 transition duration-150">
                                Inicia Sesión para Comprar
                            </a>
                            <p class="mt-2 text-sm text-gray-600">Debes tener una cuenta para adquirir planos.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
