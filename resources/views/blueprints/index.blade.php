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

                    <!-- Botón para subir nuevo plano -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-semibold text-gray-800">Lista de Tus Planos</h3>
                        <a href="{{ route('blueprints.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-[#D76040] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#C69A7D] active:bg-[#D76040] focus:outline-none focus:ring-2 focus:ring-[#D76040] focus:ring-offset-2 transition ease-in-out duration-150">
                            Subir Nuevo Plano
                        </a>
                    </div>

                    <!-- Si hay planos -->
                    @if ($blueprints->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($blueprints as $blueprint)
                                <div class="border border-[#E4E4E5] rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                                    <!-- Miniatura -->
                                    <div class="bg-[#F0E2D5] h-48 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-[#D76040]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <!-- Contenido -->
                                    <div class="p-4">
                                        <h4 class="font-bold text-lg mb-1 text-gray-800">{{ $blueprint->title }}</h4>
                                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($blueprint->description, 100) }}</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-[#D76040] font-bold">{{ number_format($blueprint->price, 0, ',', '.') }} COP</span>
                                            <span class="text-xs px-2 py-1 rounded
                                                @if($blueprint->is_public) bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ $blueprint->is_public ? 'Público' : 'Privado' }}
                                            </span>
                                        </div>
                                        <!-- Acciones -->
                                        <div class="mt-3 flex space-x-2 text-sm">
                                            <a href="{{ asset('storage/' . $blueprint->file_path) }}"
                                               target="_blank"
                                               class="font-medium text-blue-600 hover:text-blue-800">
                                               Ver
                                            </a>
                                            <a href="{{ route('blueprints.edit', $blueprint) }}"
                                               class="font-medium text-[#D76040] hover:text-[#C69A7D]">
                                               Editar
                                            </a>
                                            <form action="{{ route('blueprints.destroy', $blueprint) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este plano?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 hover:text-red-800">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Paginación -->
                        <div class="mt-6">
                            {{ $blueprints->links() }}
                        </div>

                    @else
                        <!-- No hay planos -->
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-semibold text-gray-900">No tienes planos aún</h3>
                            <p class="mt-1 text-sm text-gray-500">Aún no has subido ningún plano.</p>
                            <div class="mt-6">
                                <a href="{{ route('blueprints.create') }}"
                                   class="inline-flex items-center px-4 py-2 bg-[#D76040] text-white rounded-md hover:bg-[#C69A7D] transition">
                                    Sube tu primer plano
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>