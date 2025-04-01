<x-app-layout>
    <!-- Contenedor con imagen de fondo y alineación CENTRADA -->
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('storage/003.jpg') }}')">
        <!-- Tarjeta CENTRADA (mismo estilo pero con bordes redondeados completos) -->
        <div class="w-full max-w-md bg-white/70 dark:bg-gray-800/70 rounded-2xl shadow-xl overflow-hidden transition-all duration-500 hover:shadow-2xl backdrop-blur-md mx-4">
            <!-- Header naranja translúcido -->
            <div class="bg-orange-500/80 dark:bg-orange-600/80 p-6 text-center">
                <h2 class="text-2xl font-bold text-white">
                    ¡Bienvenid@, {{ $name }}!
                </h2>
                <p class="mt-1 text-orange-100 dark:text-orange-200">
                    {{ __("Tu portal de entrenamiento personalizado") }}
                </p>
            </div>

            <!-- Contenido interactivo -->
            <div class="p-6 space-y-4">
                <!-- Notificación de login -->
                <div class="flex items-center bg-green-50/80 dark:bg-green-900/40 rounded-lg p-3 border-l-4 border-green-500">
                    <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <p class="text-green-700 dark:text-green-300 text-sm font-medium">
                        {{ __("¡Sesión iniciada!") }}
                    </p>
                </div>

                <!-- Acciones principales -->
                <div class="grid grid-cols-1 gap-4">
                    <!-- Crear programa -->
                    <a href="{{ route('program.create') }}" 
                       class="group flex items-center justify-start p-4 bg-white/80 dark:bg-gray-700/80 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border border-blue-100 dark:border-gray-600 hover:border-blue-300">
                        <div class="bg-blue-100/80 dark:bg-blue-900/30 p-3 rounded-full mr-3 group-hover:rotate-6 transition-transform">
                            <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-800 dark:text-white">Crear programa</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-xs">Diseña tu plan de entrenamiento</p>
                        </div>
                    </a>

                    <!-- Ver programas -->
                    <a href="{{ route('programs.index') }}" 
                       class="group flex items-center justify-start p-4 bg-white/80 dark:bg-gray-700/80 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border border-green-100 dark:border-gray-600 hover:border-green-300">
                        <div class="bg-green-100/80 dark:bg-green-900/30 p-3 rounded-full mr-3 group-hover:-rotate-6 transition-transform">
                            <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-800 dark:text-white">Mis programas</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-xs">Gestiona tus rutinas</p>
                        </div>
                    </a>
                </div>

                <!-- Logout -->
                <div class="pt-3 border-t border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:text-white hover:bg-red-600 dark:hover:bg-red-700 rounded-lg transition-all duration-300 border border-red-200 dark:border-red-800 hover:border-red-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>