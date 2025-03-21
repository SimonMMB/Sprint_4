<div class="container">
    <h1>Detalles de la Sesión</h1>

    <p><strong>Sesión:</strong> {{ $session->id }}</p>
    <p><strong>Fecha Estimada:</strong> {{ $session->estimated_date }}</p>

    <h3 class="mt-4 mb-2 text-lg font-semibold">Ejercicios</h3>
    
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300 text-left">Ejercicio</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Grupo Muscular</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Series</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Repeticiones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($session->trainingSessions as $trainingSession)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2">{{ $trainingSession->exercise->name }}</td>
                    <td class="px-4 py-2">{{ $trainingSession->exercise->muscle_group }}</td>
                    <td class="px-4 py-2">{{ $trainingSession->exercise->series }}</td>
                    <td class="px-4 py-2">{{ $trainingSession->exercise->repetitions }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="mt-4"><strong>Estado:</strong> {{ $session->status }}</p>

    <a href="{{ route('program.show', $session->program_id) }}" class="text-blue-500 hover:underline">Volver al Programa</a>
</div>