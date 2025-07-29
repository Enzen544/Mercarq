<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Plano') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-10 px-6">
        <!-- Breadcrumb -->
        <x-breadcrumb :pages="[
            ['name' => 'Panel de Control', 'url' => route('dashboard')],
            ['name' => 'Mis Planos', 'url' => route('blueprints.index')],
            ['name' => 'Editar Plano']
        ]" />

      
    @if ($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
        <ul class="text-sm text-red-600 space-y-1">
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="bg-white shadow-xl sm:rounded-xl p-8 mt-6 border border-[#E4E4E5] hover:shadow-2xl transition-shadow duration-300">
            <form action="{{ route('blueprints.update', $blueprint) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Título -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título del Plano</label>
                    <input type="text" name="title" id="title"
                           value="{{ old('title', $blueprint->title) }}"
                           class="w-full px-4 py-3 border border-[#C69A7D] rounded-lg shadow-sm focus:ring-[#D76040] focus:border-[#D76040] bg-white text-gray-900 text-base placeholder-gray-500 transition duration-200"
                           placeholder="Ej: Casa Moderna 3 Habitaciones"
                           required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full px-4 py-3 border border-[#C69A7D] rounded-lg shadow-sm focus:ring-[#D76040] focus:border-[#D76040] bg-white text-gray-900 placeholder-gray-500 transition duration-200"
                              placeholder="Describe brevemente el diseño, estilo, área, habitaciones, etc.">{{ old('description', $blueprint->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                
            <div class="mb-4">
                <x-input-label for="price_display" :value="__('Precio (COP)')" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-gray-500 text-sm font-medium">$ COP</span>
                    </div>
                    <input type="text"
                        id="price_display"
                        class="block mt-1 w-full pl-16 pr-4 py-3 border-gray-300 focus:border-[#D76040] focus:ring-[#D76040] rounded-lg shadow-sm bg-white text-gray-900 placeholder-gray-500 font-mono"
                        placeholder="14.200"
                        oninput="formatAndSetPrice(this.value)">
                    <input type="hidden" name="price" id="price" value="0">
                </div>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                <p class="mt-1 text-sm text-gray-500">Deja en 0 si el plano es gratuito. Ej: 14.200</p>
            </div>

                <!-- WhatsApp -->
                <div class="mb-6">
                    <label for="whatsapp_number" class="block text-sm font-medium text-gray-700 mb-1">Número de WhatsApp (solo dígitos)</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number"
                           value="{{ old('whatsapp_number', $blueprint->whatsapp_number) }}"
                           class="w-full px-4 py-3 border border-[#C69A7D] rounded-lg shadow-sm focus:ring-[#D76040] focus:border-[#D76040] bg-white text-gray-900 placeholder-gray-500"
                           placeholder="3123456789"
                           required>
                    @error('whatsapp_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Archivo actual -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Archivo Actual</label>
                    <div class="flex items-center space-x-3 mb-2 bg-[#F0E2D5] p-3 rounded-lg border border-[#EEC6BA]">
                        <span class="text-sm text-gray-700 font-medium">
                            {{ basename($blueprint->file_path) }}
                        </span>
                        <span class="text-xs text-gray-500">
                            ({{ number_format($blueprint->file_size / 1024, 2) }} KB)
                        </span>
                        <a href="{{ asset('storage/' . $blueprint->file_path) }}"
                           target="_blank"
                           class="ml-auto text-sm font-medium text-[#D76040] hover:text-[#C69A7D] underline transition">
                           Ver
                        </a>
                    </div>
                </div>

                <!-- Subir nuevo archivo -->
                <div class="mb-6">
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-1">Cambiar Archivo (opcional)</label>
                    <input type="file" name="file" id="file"
                           class="w-full px-4 py-3 border border-[#C69A7D] rounded-lg shadow-sm bg-white text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-[#D76040] file:text-white hover:file:bg-[#C69A7D] transition duration-200"
                           accept=".pdf,.dwg,.dxf,.jpg,.jpeg,.png">
                    <p class="mt-1 text-sm text-gray-500">PDF, DWG, DXF, JPG, PNG hasta 10MB</p>
                    @error('file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Visibilidad -->
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Visibilidad del Plano</label>
                    <div class="flex items-center">
                        <input type="checkbox"
                            name="is_public"
                            id="is_public"
                            class="h-5 w-5 text-[#D76040] border-[#C69A7D] rounded focus:ring-[#D76040]"
                            {{ old('is_public', $blueprint->is_public) ? 'checked' : '' }}>
                        
                        <label for="is_public" class="ml-3 text-sm text-gray-700">
                            <span class="font-semibold text-[#D76040]">Hacer público</span> – Disponible en la tienda
                        </label>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('blueprints.index') }}"
                       class="px-6 py-3 border border-[#C69A7D] text-[#C69A7D] rounded-lg hover:bg-[#EEC6BA] hover:text-[#5C4033] transition duration-200 font-medium text-base shadow-sm">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-[#D76040] to-[#C69A7D] text-white font-bold rounded-lg hover:from-[#C69A7D] hover:to-[#D76040] transition duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-[#D76040]/50">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para formato de precio en pesos COP -->
<script>
function formatAndSetPrice(displayValue) {
    // Limpiar: solo números
    let clean = displayValue.replace(/\D/g, '');
    
    // Convertir a número entero
    let number = parseInt(clean || '0', 10);

    // Si es NaN o vacío, usar 0
    if (isNaN(number)) {
        number = 0;
    }

    // Actualizar campo oculto
    document.getElementById('price').value = number;

    // Formatear visual: 14200 → 14.200
    if (number === 0 && clean === '') {
        document.getElementById('price_display').value = '';
    } else {
        document.getElementById('price_display').value = number.toLocaleString('es-CO');
    }
}

// Aplicar formato al cargar
document.addEventListener('DOMContentLoaded', () => {
    const display = document.getElementById('price_display');
    const hidden = document.getElementById('price');
    
    if (hidden.value > 0) {
        display.value = parseInt(hidden.value).toLocaleString('es-CO');
    } else {
        display.value = '';
    }
});
</script>
</x-app-layout>