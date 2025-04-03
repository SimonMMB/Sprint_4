<x-app-layout>
    <div class="relative min-h-screen w-full">
        <div class="fixed inset-0">
            <img 
                src="{{ asset('storage/008.jpg') }}" 
                class="w-full h-full object-cover object-center"
                alt="Fondo de progreso"
            >
        </div>
        
        <div class="relative min-h-screen flex items-center justify-center p-4 z-10">
            <div class="w-full max-w-md bg-white/90 dark:bg-gray-800/90 rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-orange-500/90 dark:bg-orange-600/90 px-4 py-3 text-center">
                    <h2 class="text-xl font-bold text-white">Progreso: {{ $exercise->name }}</h2>
                </div>

                <div class="p-4 space-y-4">
                    <div class="h-64 flex items-center justify-center"> <!-- Centrado horizontal y vertical -->
                        @livewire('exercise-progress-chart', [
                            'exercise' => $exercise,
                            'showTimeRangeFilter' => false
                        ])
                    </div>
                    
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
    </div>
</x-app-layout>