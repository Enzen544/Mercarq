{{-- resources/views/blueprints/public_show.blade.php --}}
<x-guest-layout>
    <div class="w-full">
        <div class="bg-white border border-gray-200 shadow-lg rounded-xl overflow-hidden">
            
            <div class="border-b border-gray-100 px-6 py-3 bg-gray-50">
                <nav class="text-sm text-gray-600">
                    <a href="{{ route('home') }}" class="hover:text-orange-600">Inicio</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('blueprints.public.index') }}" class="hover:text-orange-600">Planos</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800">{{ $blueprint->title }}</span>
                </nav>
            </div>

            <div class="p-6">
                <div class="flex flex-col lg:flex-row gap-6">
                    
                    <div class="lg:w-2/5 w-full">
                        <div class="h-80 lg:h-96 bg-gray-50 border-2 border-dashed border-gray-200 rounded-lg flex items-center justify-center overflow-hidden relative group">
                            @if (Str::endsWith($blueprint->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                <img 
                                    class="max-h-full max-w-full object-contain transition-transform group-hover:scale-105" 
                                    src="{{ Storage::url($blueprint->file_path) }}" 
                                    alt="{{ $blueprint->title }}"
                                >
                                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">
                                    IMAGEN
                                </div>
                            @else
                                <div class="text-center">
                                    <svg class="w-24 h-24 text-red-500 mx-auto mb-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                    </svg>
                                    <p class="text-gray-600 font-medium">{{ strtoupper(pathinfo($blueprint->file_path, PATHINFO_EXTENSION)) }}</p>
                                    <p class="text-gray-400 text-sm">Documento</p>
                                </div>
                                <div class="absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded">
                                    {{ strtoupper(pathinfo($blueprint->file_path, PATHINFO_EXTENSION)) }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="lg:w-3/5 w-full flex flex-col justify-between">
                        
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-orange-700 font-medium">
                                    Por: {{ $blueprint->user->name ?? 'Diseñador' }}
                                </span>
                                @if($blueprint->price > 0)
                                    <span class="text-2xl font-bold text-orange-600">
                                        ${{ number_format($blueprint->price, 2, ',', '.') }} COP
                                    </span>
                                @else
                                    <span class="text-lg font-bold text-green-600 bg-green-100 px-3 py-1 rounded-lg">
                                        GRATUITO
                                    </span>
                                @endif
                            </div>

                            <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3 leading-tight">
                                {{ $blueprint->title }}
                            </h1>

                            <p class="text-gray-700 mb-4 leading-relaxed">
                                {{ $blueprint->description ?? 'Este plano incluye todos los detalles técnicos y arquitectónicos necesarios para su construcción.' }}
                            </p>

                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                <h3 class="font-semibold text-gray-800 mb-2">Especificaciones:</h3>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <span class="text-gray-600">Formato:</span>
                                        <span class="ml-2 font-medium">{{ strtoupper(pathinfo($blueprint->file_path, PATHINFO_EXTENSION)) }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Tamaño:</span>
                                        <span class="ml-2 font-medium">
                                            {{ $blueprint->file_size ? number_format($blueprint->file_size / 1024, 2).' KB' : 'Desconocido' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <div class="space-y-4">
                            @if($blueprint->price > 0)
                                <!-- Botón de compra por WhatsApp (solo para planos de pago) -->
                                @php
                                    $whatsappNumber = $blueprint->whatsapp_number;
                                    $cleanNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
                                    if (!str_starts_with($cleanNumber, '57') || strlen($cleanNumber) < 12) {
                                        $cleanNumber = '57' . $cleanNumber;
                                    }
                                    $message = "¡Hola! 👋\nEstoy interesado en comprar el plano:\n📋 *{$blueprint->title}*\n💰 Precio: $" . number_format($blueprint->price, 0, ',', '.') . " COP\n¿Cómo puedo proceder?\nGracias! 🏠";
                                    $whatsappUrl = "https://wa.me/{$cleanNumber}?text=" . urlencode($message);
                                @endphp
                                <a href="{{ $whatsappUrl }}" 
                                target="_blank"
                                class="w-full flex items-center justify-center px-6 py-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                    </svg>
                                    Comprar por WhatsApp - ${{ number_format($blueprint->price, 0, ',', '.') }} COP
                                </a>
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div class="text-sm text-blue-800">
                                            <p class="font-medium mb-1">¿Cómo comprar?</p>
                                            <ol class="list-decimal list-inside space-y-1 text-blue-700">
                                                <li>Haz clic en el botón de WhatsApp</li>
                                                <li>Se abrirá una conversación con el vendedor</li>
                                                <li>Coordina el método de pago directamente</li>
                                                <li>Una vez confirmado el pago, recibes el plano</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Botón de descarga directa para planos gratuitos -->
                                <a href="{{ route('blueprints.download-free', $blueprint) }}"
                                    class="w-full flex items-center justify-center px-6 py-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors shadow-lg">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Descargar Plano Gratis
                                </a>
                                <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                                    <p class="text-sm text-green-800">
                                        ✅ El archivo se descargará automáticamente. No se requiere registro.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="free-download" :show="false" focusable>
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Obtener Plano Gratuito</h2>
            
            <form action="{{ route('blueprints.free-download', $blueprint) }}" method="POST">
                @csrf
                
                <div class="space-y-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tu nombre</label>
                        <input type="text" name="downloader_name" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tu correo electrónico</label>
                        <input type="email" name="downloader_email" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" required>
                        <p class="text-xs text-gray-500 mt-1">El plano será enviado a este correo</p>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <x-secondary-button x-on:click="$dispatch('close')">Cancelar</x-secondary-button>
                    <x-primary-button class="bg-green-600 hover:bg-green-700">
                        Obtener Plano
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>
</x-guest-layout>