<div class="container">
    <h1>Detalles de la Sesión</h1>

    <p><strong>Sesión:</strong> {{ $session->number_of_session }}</p>
    <p><strong>Fecha Estimada:</strong> {{ $session->estimated_date }}</p>

    <h3 class="mt-4 mb-2 text-lg font-semibold">Ejercicios</h3>
    
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300 text-left">Estado</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Ejercicio</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Grupo Muscular</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Series</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Repeticiones</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Peso Levantado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($session->sessionExercises as $sessionExercise)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2">{{ $sessionExercise->status}}</td>
                    <td class="px-4 py-2">{{ $sessionExercise->exercise->name }}</td>
                    <td class="px-4 py-2">{{ $sessionExercise->exercise->muscle_group }}</td>
                    <td class="px-4 py-2">{{ $sessionExercise->exercise->series }}</td>
                    <td class="px-4 py-2">{{ $sessionExercise->exercise->repetitions }}</td>
                    <td class="px-4 py-2">
                        @if($sessionExercise->status == 'completed')
                            {{ $sessionExercise->lifted_weight }} kg
                        @else
                            <form action="{{ route('session-exercise.complete', [$session->id, $sessionExercise->id]) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="lifted_weight" min="1" required class="w-20 px-2 py-1 border rounded" placeholder="kg">
                                <button type="submit" class="bg-green-500 text-white py-1 px-4 rounded hover:bg-green-600">
                                    Completar
                                </button>
                            </form>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if($sessionExercise->lifted_weight)
                            <a href="{{ route('exercises.progress', $sessionExercise->exercise_id) }}" 
                            class="bg-blue-500 text-white py-1 px-4 rounded hover:bg-blue-600 inline-flex items-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Ver Progreso
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="mt-4"><strong>Estado:</strong> {{ $session->status }}</p>

    <a href="{{ route('program.show', $session->program_id) }}" class="text-blue-500 hover:underline">Volver al Programa</a>
</div>