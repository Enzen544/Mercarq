{{-- resources/views/blueprints/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir Nuevo Plano') }}
        </h2>
    </x-slot>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <x-breadcrumb :pages="[
            ['name' => 'Panel de Control', 'url' => route('dashboard')],
            ['name' => 'Mis Planos', 'url' => route('blueprints.index')],
            ['name' => 'Subir Nuevo Plano']
        ]" />
    </div>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('blueprints.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Título -->
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Título del Plano')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Descripción')" />
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Precio -->
                        <div class="mb-4">
                            <x-input-label for="price" :value="__('Precio (USD)')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="old('price', 0)" min="0" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Visibilidad -->
                        <div class="mb-4">
                            <x-input-label for="is_public" :value="__('Visibilidad')" />
                            <div class="mt-1">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" name="is_public" value="1" {{ old('is_public', '0') == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-600">Público (visible para todos los usuarios registrados)</span>
                                </label>
                            </div>
                            <div class="mt-1">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" name="is_public" value="0" {{ old('is_public', '0') == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-600">Privado (solo tú puedes verlo)</span>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('is_public')" class="mt-2" />
                        </div>

                        <!-- Archivo del Plano -->
                        <div class="mb-4">
                            <x-input-label for="file" :value="__('Archivo del Plano (PDF, DWG, etc.)')" />
                            <input type="file" id="file" name="file" class="block mt-1 w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-orange-50 file:text-orange-700
                                hover:file:bg-orange-100
                            " required>
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500">Formatos permitidos: PDF, DWG, DXF. Tamaño máximo: 10MB.</p>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('blueprints.index') }}" class="mr-4 text-sm text-gray-600 hover:text-gray-800">
                                {{ __('Cancelar') }}
                            </a>
                            <x-primary-button class="ml-4 bg-orange-600 hover:bg-orange-700">
                                {{ __('Subir Plano') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
