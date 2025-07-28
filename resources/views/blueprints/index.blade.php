{{-- resources/views/blueprints/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Planos') }}
        </h2>
    </x-slot>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <x-breadcrumb :pages="[
            ['name' => 'Panel de Control', 'url' => route('dashboard')],
            ['name' => 'Mis Planos']
        ]" />
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-semibold">Lista de Tus Planos</h3>
                        <a href="{{ route('blueprints.create') }}" class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Subir Nuevo Plano
                        </a>
                    </div>

                    @if ($blueprints->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($blueprints as $blueprint)
                                <div class="border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                                    <div class="bg-gray-100 h-48 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="p-4">
                                        <h4 class="font-bold text-lg mb-1">{{ $blueprint->title }}</h4>
                                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($blueprint->description, 100) }}</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-orange-600 font-bold">${{ number_format($blueprint->price, 2) }}</span>
                                            <span class="text-xs px-2 py-1 rounded
                                                @if($blueprint->is_public) bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                                                @if($blueprint->is_public) Público @else Privado @endif
                                            </span>
                                        </div>
                                        <div class="mt-3 flex space-x-2">
                                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Ver</a>
                                            <a href="{{ route('blueprints.edit', $blueprint) }}" class="text-sm text-orange-600 hover:text-orange-800">Editar</a>
                                            <form action="{{ route('blueprints.destroy', $blueprint) }}" method="POST" onsubmit="return confirm('¿Estás seguro?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm text-red-600 hover:text-red-800">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            {{ $blueprints->links() }} {{-- Paginación --}}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-semibold text-gray-900">No hay planos</h3>
                            <p class="mt-1 text-sm text-gray-500">Aún no has subido ningún plano.</p>
                            <div class="mt-6">
                                <a href="{{ route('blueprints.create') }}" class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Subir tu primer plano
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
