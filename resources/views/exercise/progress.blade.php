<x-app-layout>
    <!-- Contenedor principal con fondo optimizado -->
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-900 relative overflow-hidden">
        <!-- Imagen de fondo con object-cover para mejor ajuste -->
        <img src="{{ asset('storage/015.jpg') }}" 
             alt="Background"
             class="absolute inset-0 w-full h-full object-cover object-center"
             style="z-index: 0;">
        
        <!-- Fondo semitransparente para mejorar legibilidad -->
        <div class="absolute inset-0 bg-black/30 dark:bg-black/50" style="z-index: 1;"></div>
        
        <!-- Contenedor del contenido (aumentado z-index) -->
        <div class="w-full max-w-2xl bg-white/90 dark:bg-gray-800/90 rounded-2xl shadow-lg overflow-hidden backdrop-blur-sm relative" style="z-index: 2;">
            <!-- Header más delgado -->
            <div class="bg-orange-500/90 dark:bg-orange-600/90 px-4 py-3 text-center">
                <h2 class="text-xl font-bold text-white">Progreso: {{ $exercise->name }}</h2>
            </div>

            <!-- Contenido compacto -->
            <div class="p-4 space-y-4">
                @livewire('exercise-progress-chart', ['exercise' => $exercise])
                
                <div class="pt-2">
                    <a href="{{ url()->previous() }}" class="text-sm text-orange-600 dark:text-orange-400 hover:underline flex items-center justify-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>