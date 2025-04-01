<x-app-layout>
    <!-- Contenedor con imagen de fondo -->
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center p-4" style="background-image: url('{{ asset('storage/012.jpg') }}')">
        <!-- Tarjeta central - ahora con ancho fijo y centrado -->
        <div class="w-full max-w-4xl bg-white/70 dark:bg-gray-800/70 rounded-lg shadow-xl transition-all duration-500 hover:shadow-2xl backdrop-blur-md overflow-y-auto max-h-[90vh]">
            <!-- Header naranja translúcido -->
            <div class="bg-orange-500/80 dark:bg-orange-600/80 p-4 text-center sticky top-0 z-10">
                <h1 class="text-2xl font-bold text-white">Detalles de la Sesión</h1>
            </div>

            <!-- Contenido - ahora sin overflow-x -->
            <div class="p-6 space-y-6">
                <!-- Información básica en grid responsive -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-white/80 dark:bg-gray-700/80 p-4 rounded-lg shadow-sm backdrop-blur-sm">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Sesión</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $session->number_of_session }}</p>
                    </div>
                    <div class="bg-white/80 dark:bg-gray-700/80 p-4 rounded-lg shadow-sm backdrop-blur-sm">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Fecha Estimada</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $session->estimated_date }}</p>
                    </div>
                    <div class="bg-white/80 dark:bg-gray-700/80 p-4 rounded-lg shadow-sm backdrop-blur-sm">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Estado</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $session->status }}</p>
                    </div>
                    <div class="bg-white/80 dark:bg-gray-700/80 p-4 rounded-lg shadow-sm backdrop-blur-sm">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Programa</p>
                        <a href="{{ route('program.show', $session->program_id) }}" class="text-lg font-semibold text-blue-600 hover:text-blue-800 dark:text-blue-400">Ver Programa</a>
                    </div>
                </div>

                <!-- Tabla de ejercicios - ahora responsive sin scroll horizontal -->
                <div class="bg-white/80 dark:bg-gray-700/80 shadow-lg rounded-xl backdrop-blur-sm">
                    <div class="px-6 py-4 border-b border-gray-200/30">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Ejercicios</h3>
                    </div>
                    
                    <!-- Tabla responsive -->
                    <div class="overflow-y-auto">
                        <table class="w-full table-auto">
                            <thead class="bg-orange-500/20 dark:bg-orange-600/20">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Estado</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Ejercicio</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Grupo</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Series</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Reps</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Peso</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white/50 dark:bg-gray-800/50 divide-y divide-gray-200/20">
                                @foreach ($session->sessionExercises as $sessionExercise)
                                <tr class="hover:bg-orange-50/30 dark:hover:bg-orange-900/20 transition-colors duration-200">
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sessionExercise->status}}
                                    </td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $sessionExercise->exercise->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sessionExercise->exercise->muscle_group }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sessionExercise->exercise->series }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sessionExercise->exercise->repetitions }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                        @if($sessionExercise->status == 'completed')
                                            {{ $sessionExercise->lifted_weight }} kg
                                        @else
                                            <form action="{{ route('session-exercise.complete', [$session->id, $sessionExercise->id]) }}" method="POST" class="flex items-center space-x-2">
                                                @csrf
                                                @method('PATCH')
                                                <input type="number" name="lifted_weight" min="1" required 
                                                       class="w-16 px-2 py-1 border border-gray-300 dark:border-gray-600 rounded bg-white/80 dark:bg-gray-700/80 text-gray-900 dark:text-white focus:ring-2 focus:ring-orange-500">
                                                <button type="submit" 
                                                        class="bg-green-500 hover:bg-green-600 text-white py-1 px-3 rounded-lg shadow-md transition duration-150">
                                                    ✓
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm font-medium">
                                        @if($sessionExercise->lifted_weight)
                                            <a href="{{ route('exercises.progress', $sessionExercise->exercise_id) }}" 
                                               class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-lg shadow-md transition duration-150 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                                Progreso
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Botón Volver -->
                <div class="flex justify-center">
                    <a href="{{ route('program.show', $session->program_id) }}" 
                       class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                        ← Volver al Programa
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>