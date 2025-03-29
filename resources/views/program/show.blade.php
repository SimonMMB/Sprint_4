<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa de Entrenamiento</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header con gradiente -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-xl shadow-lg overflow-hidden mb-8">
            <div class="p-6 md:p-8 text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-white">Programa de Entrenamiento</h1>
            </div>
        </div>

        <!-- Estadísticas en cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Sesiones Totales -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                <h3 class="text-lg font-medium text-gray-500">Sesiones totales</h3>
                <p class="mt-2 text-3xl font-bold text-gray-900">{{ $program->total_sessions }}</p>
            </div>
            <!-- Sesiones Restantes -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500">
                <h3 class="text-lg font-medium text-gray-500">Restantes</h3>
                <p class="mt-2 text-3xl font-bold text-orange-600">{{ $program->remaining_sessions }}</p>
            </div>
             <!-- Sesiones Completadas -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <h3 class="text-lg font-medium text-gray-500">Completadas</h3>
                <p class="mt-2 text-3xl font-bold text-green-600">{{ $program->completed_sessions }}</p>
            </div>
        </div>

        <!-- Tabla de sesiones -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800">Listado de Sesiones</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"># Sesión</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($sessions as $session)
                        <tr class="hover:bg-gray-50 transition duration-150 @if($session->status == 'completed') bg-green-200 @endif">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $session->number_of_session }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($session->status == 'Completada')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $session->status }}
                                    </span>
                                @elseif($session->status == 'Pendiente')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        {{ $session->status }}
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        {{ $session->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $session->estimated_date }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                <a href="{{ route('session.show', $session->id) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <form action="{{ route('program.destroy', $program->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este programa? ¡Esta acción no se puede deshacer!')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar Programa</button>
        </form>
        
        @if($sessions->hasPages())
        <div class="mt-6 bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 flex justify-center">
                <nav class="flex items-center space-x-4">
                    {{ $sessions->links() }}
                </nav>
            </div>
        </div>
        @endif
    </div>
</body>
</html>