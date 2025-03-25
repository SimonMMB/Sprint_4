<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('¡Bienvenid@ ' . $name . '!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg">{{ __("¡Estás logueado!") }}</p>
                </div>

                <div class="p-6">
                    @if(isset($program_id))
                        <a href="{{ route('program.show', $program_id) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                            Ver tu plan de entrenamiento
                        </a>
                    @else
                        <p class="text-gray-600 dark:text-gray-300 mt-4">No tienes un programa de entrenamiento aún.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
