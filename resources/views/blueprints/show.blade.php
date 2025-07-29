<x-app-layout>
    @push('title')
CATALOGO - 
@endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Plano') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 px-6">
        <x-breadcrumb :pages="[
            ['name' => 'Panel de Control', 'url' => route('dashboard')],
            ['name' => 'Mis Planos', 'url' => route('blueprints.index')],
            ['name' => $blueprint->title]
        ]" />

        <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg overflow-hidden mt-6">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-[#D76040] mb-2">{{ $blueprint->title }}</h1>
                <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $blueprint->description }}</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <strong class="text-gray-700 dark:text-gray-300">Precio:</strong>
                        <span class="ml-2 font-semibold">${{ number_format($blueprint->price, 2) }}</span>
                    </div>
                    <div>
                        <strong class="text-gray-700 dark:text-gray-300">Estado:</strong>
                        <span class="ml-2 px-2 py-1 text-xs rounded
                            @if($blueprint->is_public) bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $blueprint->is_public ? 'Público' : 'Privado' }}
                        </span>
                    </div>
                    <div>
                        <strong class="text-gray-700 dark:text-gray-300">Tamaño:</strong>
                        <span class="ml-2">{{ number_format($blueprint->file_size / 1024, 2) }} KB</span>
                    </div>
                    <div>
                        <strong class="text-gray-700 dark:text-gray-300">Extensión:</strong>
                        <span class="ml-2 font-mono text-sm">{{ pathinfo($blueprint->file_path, PATHINFO_EXTENSION) }}</span>
                    </div>
                </div>

                <div class="border-t pt-6 flex flex-wrap gap-3">
                    <a href="{{ asset('storage/' . $blueprint->file_path) }}"
                       target="_blank"
                       class="px-5 py-2 bg-[#D76040] text-white rounded-md hover:bg-[#C69A7D] transition font-medium">
                       Ver Archivo
                    </a>
                    <a href="{{ route('blueprints.edit', $blueprint) }}"
                       class="px-5 py-2 border border-[#D76040] text-[#D76040] rounded-md hover:bg-[#D76040] hover:text-white transition font-medium">
                       Editar
                    </a>
                    <form action="{{ route('blueprints.destroy', $blueprint) }}" method="POST" onsubmit="return confirm('¿Eliminar este plano?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-5 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition font-medium">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>