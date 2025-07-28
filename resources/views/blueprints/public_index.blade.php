{{-- resources/views/blueprints/public_index.blade.php --}}
<x-guest-layout>
 <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <x-breadcrumb :pages="[
            ['name' => 'Inicio', 'url' => route('home')],
            ['name' => 'Catálogo de Planos']
        ]" />
    </div>   
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Catálogo de Planos Públicos</h1>

        @if($blueprints->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($blueprints as $blueprint)
                    <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-300">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            @if (Str::endsWith($blueprint->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                <img src="{{ Storage::url($blueprint->file_path) }}" alt="{{ $blueprint->title }}" class="h-full w-full object-cover">
                            @else
                                 <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            @endif
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $blueprint->title }}</h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $blueprint->description ?? 'Sin descripción.' }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-orange-600">${{ number_format($blueprint->price, 2) }}</span>
                                <a href="{{ route('blueprints.public.show', $blueprint) }}" class="px-4 py-2 bg-orange-600 text-white text-sm font-medium rounded hover:bg-orange-700 transition duration-150">
                                    Ver Detalle
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-8">
                {{ $blueprints->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-semibold text-gray-900">No hay planos disponibles</h3>
                <p class="mt-1 text-sm text-gray-500">Aún no se han publicado planos.</p>
            </div>
        @endif
    </div>
</x-guest-layout>
