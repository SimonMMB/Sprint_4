<x-app-layout>
    <div class="min-h-screen bg-cover bg-center bg-no-repeat bg-fixed flex items-center justify-center p-4" style="background-image: url('{{ asset('storage/005.jpg') }}')">
        <div class="w-full max-w-4xl bg-white/70 dark:bg-gray-800/80 rounded-lg shadow-xl overflow-hidden transition-all duration-500 hover:shadow-2xl backdrop-blur-md">
            <div class="bg-orange-500/80 dark:bg-orange-600/80 p-4 text-center">
                <h2 class="text-2xl font-bold text-white">
                    {{ __('Mis Programas de Entrenamiento') }}
                </h2>
            </div>

            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200/50">
                        <thead class="bg-orange-500/20 dark:bg-orange-600/20">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Frecuencia</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Duración</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Sesiones</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/50 dark:bg-gray-800/50 divide-y divide-gray-200/30">
                            @foreach ($programs as $program)
                            <tr class="hover:bg-orange-50/30 dark:hover:bg-orange-900/20 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $program->training_frequency }} días/semana
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    {{ $program->training_duration }} meses
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    {{ $program->completed_sessions }} / {{ $program->total_sessions }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('program.show', $program->id) }}" 
                                       class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
                                        Ver
                                    </a>
                                    <span class="text-gray-400">|</span>
                                    <form action="{{ route('program.destroy', $program->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                                onclick="return confirm('¿Eliminar este programa? ¡Esta acción no se puede deshacer!')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    <a href="{{ route('programs.create') }}" 
                       class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                        + Crear Nuevo Programa
                    </a>
                    
                    <a href="{{ route('dashboard') }}" 
                       class="ml-4 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                        ← Volver al Dashboard
                    </a>
                </div>

                @if ($programs->hasPages())
                <div class="px-6 py-4 bg-orange-50/30 dark:bg-orange-900/20 mt-6 rounded-b-lg">
                    {{ $programs->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>