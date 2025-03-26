<div class="container">
    <h1>Detalles de la Sesión</h1>

    <p><strong>Sesión:</strong> {{ $session->number_of_session }}</p>
    <p><strong>Fecha Estimada:</strong> {{ $session->estimated_date }}</p>

    <h3 class="mt-4 mb-2 text-lg font-semibold">Ejercicios</h3>
    
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300 text-left">Ejercicio</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Grupo Muscular</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Series</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Repeticiones</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($session->trainingSessions as $index => $trainingSession)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2">{{ $trainingSession->exercise->name }}</td>
                    <td class="px-4 py-2">{{ $trainingSession->exercise->muscle_group }}</td>
                    <td class="px-4 py-2">{{ $trainingSession->exercise->series }}</td>
                    <td class="px-4 py-2">{{ $trainingSession->exercise->repetitions }}</td>
                    <td class="px-4 py-2">
                    @php
                        $statusField = 'status_exercise_' . ($index + 1);
                    @endphp
                    {{ $session->$statusField }}
                    </td>
                    <td class="px-4 py-2">
                        <form action="{{ route('exercise-session.complete', [$session->id, $index]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-green-500 text-white py-1 px-4 rounded hover:bg-green-600">
                                Marcar ejercicio como completado
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="mt-4"><strong>Estado:</strong> {{ $session->status }}</p>

    <a href="{{ route('program.show', $session->program_id) }}" class="text-blue-500 hover:underline">Volver al Programa</a>
</div>