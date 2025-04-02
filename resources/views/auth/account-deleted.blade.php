<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900">
        <div class="max-w-md w-full p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md text-center">
            <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            
            <h2 class="mt-4 text-2xl font-bold text-gray-900 dark:text-white">
                Cuenta eliminada exitosamente
            </h2>
            
            <p class="mt-2 text-gray-600 dark:text-gray-300">
                Todos tus datos han sido eliminados permanentemente del sistema.
            </p>

            <div class="mt-6">
                <a href="{{ route('login') }}" 
                   class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                   Volver al inicio de sesión
                </a>
            </div>
        </div>
    </div>
</x-app-layout>