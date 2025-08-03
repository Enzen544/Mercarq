{{-- resources/views/blueprints/public_index.blade.php --}}
<x-guest-layout>

    @push('title')
CATALOGO -
@endpush
{{--        @push('styles')--}}
            <link href="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.css" rel="stylesheet">
{{--        @endpush--}}

{{--        @push('scripts')--}}
            <script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.js"></script>
{{--        @endpush--}}
        <style>
            .noUi-tooltip {
                visibility: hidden;
            }
            input[type='number'] {
                border-color: transparent !important;
                border-width: 0 !important;
            }


        </style>

        <div class="mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12" style="width: 85%">
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6 sm:mb-8 text-center">Catálogo de Planos Públicos</h1>


        <div class="w-full mb-6 bg-white p-3 sm:p-4 rounded-xl shadow-md border border-[#C69A7D]/30 transition-all duration-300 hover:shadow-lg" style="min-width: 340px">
            <form action="{{ route('blueprints.public.index') }}" method="GET" class="flex flex-col gap-3 sm:gap-3 text-sm">
                <div class="md:flex-row md:items-end md:justify-between gap-4">
                    <div class="w-full">
                        {{-- Campo de búsqueda --}}
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Buscar planos:</label>
                        <div class="relative flex gap-2 items-center">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                   class="w-full pl-10 pr-8 py-2 border border-gray-300 rounded-lg focus:ring-[#D76040] focus:border-[#D76040] shadow-sm transition duration-200 text-sm"
                                   placeholder="Buscar por nombre o descripción...">
                            {{-- Filtros --}}
                            <select name="user_id"
                                    class="w-full md:w-44 px-3 py-2 border border-gray-300 rounded-lg focus:ring-[#D76040] focus:border-[#D76040] shadow-sm transition duration-200 text-sm"
                            >
                                <option value="">Todos los autores</option>
                                @foreach(\App\Models\User::has('blueprints')->get() as $user)
                                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Botones --}}
                            <div class="flex gap-2 w-full md:w-auto">
                                <button type="submit"
                                        class="flex-1 md:flex-none px-5 py-2 bg-gradient-to-r from-[#D76040] to-[#C69A7D] text-white font-medium rounded-lg hover:from-[#C69A7D] hover:to-[#D76040] transition duration-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D76040] flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-1.5 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    Buscar
                                </button>
                                @if(request()->anyFilled(['search', 'min_price', 'max_price', 'user_id']))
                                    <a href="{{ route('blueprints.public.index') }}"
                                       class="flex-1 md:flex-none px-4 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition duration-200 shadow-sm flex items-center justify-center text-sm">
                                        Limpiar
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Rango de precio --}}
                    <div class="w-full mt-3">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Rango de precio</label>
                        <div class="flex items-center gap-2">
                            <div id="price-slider" class="w-full mb-2 px-4 mt-2"></div>

                            <div class="flex gap-2">
                                <!-- Precio Mínimo -->
                                <div class="flex items-center border border-gray-300 rounded-lg px-2 shadow-sm justify-end">
                                    <span class="text-gray-500">$</span>
                                    <input type="number" id="min_price" name="min_price" placeholder="Mín"
                                           class="w-20 px-1 py-1.5 outline-none transition duration-200"
                                           value="{{ request('min_price', 0) }}">
                                </div>

                                <!-- Precio Máximo -->
                                <div class="flex items-center border border-gray-300 rounded-lg px-2 shadow-sm justify-end">
                                    <span class="text-gray-500">$</span>
                                    <input type="number" id="max_price" name="max_price" placeholder="Máx"
                                           class="w-24 py-1.5 outline-none transition duration-200"
                                           value="{{ request('max_price', $maxPrice ?? 10000) }}">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>


        {{-- Mostrar palabra clave buscada --}}
        @if(request('search'))
        <div class="mb-5 text-center">
            <p class="text-gray-600 text-sm sm:text-base">
                Resultados para: <span class="font-semibold text-[#D76040]">{{ request('search') }}</span>
                <span class="text-xs sm:text-sm text-gray-500">({{ $blueprints->total() }} resultados)</span>
            </p>
        </div>
        @endif

        @if($blueprints->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">

                @foreach ($blueprints as $blueprint)
                    <div class="bg-white/95 rounded-xl overflow-hidden shadow-lg border border-[#C69A7D]/50 hover:border-[#D76040] transition-all duration-300 h-full flex flex-col transform hover:-translate-y-1 hover:shadow-xl hover:shadow-[#D76040]/10">
                        {{-- Imagen/Preview --}}
                        <div class="relative h-44 sm:h-48 overflow-hidden bg-gradient-to-br from-[#EEC6BA] to-[#C69A7D]">
                            @if (Str::endsWith($blueprint->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                <img src="{{ Storage::url($blueprint->file_path) }}" alt="{{ $blueprint->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                            @elseif(Str::endsWith($blueprint->file_path, ['.pdf']))
                                {{-- Vista previa simulada del PDF --}}
                                <div class="w-full h-full flex items-center justify-center">
                                    <div class="w-20 h-28 sm:w-24 sm:h-32 bg-white shadow-lg rounded border-2 border-gray-200 flex flex-col relative transform group-hover:scale-105 transition-transform duration-300">
                                        <div class="h-1.5 sm:h-2 bg-red-500 rounded-t"></div>
                                        <div class="flex-1 p-1 sm:p-1.5 space-y-1">
                                            <div class="h-1 bg-gray-300 rounded w-full"></div>
                                            <div class="h-1 bg-gray-300 rounded w-4/5"></div>
                                            <div class="h-1 bg-gray-300 rounded w-full"></div>
                                            <div class="h-1 bg-gray-300 rounded w-3/5"></div>
                                            <div class="h-4 sm:h-6 bg-gray-200 rounded mt-1"></div>
                                        </div>
                                    </div>
                                    <svg class="absolute bottom-1 right-1 w-4 h-4 sm:w-5 sm:h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                             @elseif(Str::endsWith($blueprint->file_path, ['.dwg', '.dxf']))
                                {{-- Vista previa simulada de CAD --}}
                                <div class="w-full h-full flex items-center justify-center">
                                    <div class="w-28 h-20 sm:w-32 sm:h-24 bg-white shadow-lg rounded border-2 border-blue-200 flex items-center justify-center relative transform group-hover:scale-105 transition-transform duration-300">
                                        <svg class="w-12 h-12 sm:w-16 sm:h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        <div class="absolute inset-0 border-2 border-dashed border-blue-300 m-1 sm:m-2 rounded"></div>
                                    </div>
                                    <svg class="absolute bottom-1 right-1 w-4 h-4 sm:w-5 sm:h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                            @endif
                             <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                             <div class="absolute bottom-2 left-2 right-2">
                                <h3 class="text-sm sm:text-base font-bold text-white drop-shadow-sm line-clamp-1">{{ $blueprint->title }}</h3>
                            </div>
                        </div>


                        <div class="p-3.5 sm:p-4 flex-grow flex flex-col">
                            <p class="text-gray-600 text-xs sm:text-sm mb-2.5 sm:mb-3 line-clamp-2 flex-grow">{{ $blueprint->description ?? 'Sin descripción disponible.' }}</p>

                            <div class="flex justify-between items-center mt-auto pt-2 border-t border-gray-100">
                                @if($blueprint->price > 0)
                                    <span class="text-base sm:text-lg font-bold text-[#D76040]">${{ number_format($blueprint->price, 0, ',', '.') }} COP</span>
                                @else
                                    <span class="text-xs sm:text-sm font-bold text-green-600 bg-green-100 px-2 py-1 rounded">GRATIS</span>
                                @endif
                                <a href="{{ route('blueprints.public.show', $blueprint) }}"
                                   class="text-xs sm:text-sm px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded bg-gradient-to-r from-[#D76040] to-[#C69A7D] text-white hover:from-[#C69A7D] hover:to-[#D76040] transition duration-200 font-medium shadow-sm whitespace-nowrap">
                                    Ver Detalle
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 flex justify-center">
                <div class="inline-flex items-center rounded-md shadow-sm">

                {{ $blueprints->appends(['search' => request('search')])->links() }}
             </div>
            </div>
        @else
            <div class="text-center py-12 sm:py-16">
                <svg class="mx-auto h-16 w-16 sm:h-20 sm:w-20 text-[#D76040]/50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                 @if(request('search'))
                    <h3 class="mt-4 text-lg sm:text-xl font-medium text-gray-900">No se encontraron planos</h3>
                    <p class="mt-2 text-base text-gray-500">No hay planos públicos que coincidan con "<span class="font-semibold">{{ request('search') }}</span>".</p>
                    <div class="mt-6">
                        <a href="{{ route('blueprints.public.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#C69A7D] transition duration-200">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Ver todos los planos
                        </a>
                    </div>
                @else
                    <h3 class="mt-4 text-lg sm:text-xl font-medium text-gray-900">No hay planos disponibles</h3>
                    <p class="mt-2 text-base text-gray-500">Aún no se han publicado planos en este catálogo.</p>
                @endif
            </div>
        @endif
    </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const slider = document.getElementById('price-slider');
                const minInput = document.getElementById('min_price');
                const maxInput = document.getElementById('max_price');

                const minStart = parseInt(minInput.value) || 0;
                const maxStart = parseInt(maxInput.value) || {{ $maxPrice ?? 10000 }};

                noUiSlider.create(slider, {
                    start: [minStart, maxStart],
                    connect: true,
                    range: {
                        'min': 0,
                        'max': {{ $maxPrice ?? 10000 }}
                    },
                    step: 100,
                    tooltips: [true, true],
                    format: {
                        to: value => Math.round(value),
                        from: value => parseInt(value)
                    }
                });

                // Actualizar inputs cuando se mueve el slider
                slider.noUiSlider.on('update', function (values, handle) {
                    if (handle === 0) {
                        minInput.value = values[0];
                    } else {
                        maxInput.value = values[1];
                    }
                });

                // Actualizar slider cuando cambian inputs
                minInput.addEventListener('change', function () {
                    slider.noUiSlider.set([this.value, null]);
                });

                maxInput.addEventListener('change', function () {
                    slider.noUiSlider.set([null, this.value]);
                });
            });
        </script>



</x-guest-layout>
