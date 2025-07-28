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
                    
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                            </svg>
                            <h3 class="font-semibold text-green-800">Ventas por WhatsApp</h3>
                        </div>
                        <p class="text-sm text-green-700">
                            Tu número de WhatsApp será usado para coordinar las ventas directamente con los compradores. 
                            Ellos verán tu plano, podrán comprarlo, y tú recibirás un correo con sus datos para contactarlos.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('blueprints.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Título del Plano')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Descripción')" />
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm" placeholder="Describe los detalles técnicos, medidas, y características del plano...">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="price" :value="__('Precio (COP)')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="old('price', 0)" min="0" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500">Deja en 0 si el plano es gratuito</p>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="whatsapp_number" :value="__('Número de WhatsApp')" />
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    +57
                                </span>
                                <x-text-input id="whatsapp_number" class="flex-1 rounded-none rounded-r-md" type="text" name="whatsapp_number" :value="old('whatsapp_number')" placeholder="3001234567" required />
                            </div>
                            <x-input-error :messages="$errors->get('whatsapp_number')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500">
                                <span class="font-medium">Importante:</span> Los compradores te contactarán por este número para coordinar la compra
                            </p>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="is_public" :value="__('Visibilidad')" />
                            <div class="mt-2 space-y-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" name="is_public" value="1" {{ old('is_public', '1') == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-600">
                                        <span class="font-medium">Público</span> - Visible para todos, pueden comprarlo por WhatsApp
                                    </span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" name="is_public" value="0" {{ old('is_public', '1') == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-600">
                                        <span class="font-medium">Privado</span> - Solo tú puedes verlo
                                    </span>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('is_public')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="file" :value="__('Archivo del Plano')" />
                            <input type="file" id="file" name="file" class="block mt-1 w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-orange-50 file:text-orange-700
                                hover:file:bg-orange-100
                            " required accept=".pdf,.dwg,.dxf,.jpg,.jpeg,.png">
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500">
                                <span class="font-medium">Formatos:</span> PDF, DWG, DXF, JPG, PNG | 
                                <span class="font-medium">Tamaño máximo:</span> 10MB
                            </p>
                        </div>

                        <div class="mb-6">
                            <label class="inline-flex items-start">
                                <input type="checkbox" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500 mt-1" name="terms" required>
                                <span class="ml-2 text-sm text-gray-600">
                                    Acepto que los compradores me contactarán por WhatsApp y me comprometo a responder 
                                    las consultas de manera profesional y entregar el plano una vez confirmado el pago.
                                </span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('blueprints.index') }}" class="mr-4 text-sm text-gray-600 hover:text-gray-800">
                                {{ __('Cancelar') }}
                            </a>
                            <x-primary-button class="ml-4 bg-orange-600 hover:bg-orange-700">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                {{ __('Publicar Plano') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>