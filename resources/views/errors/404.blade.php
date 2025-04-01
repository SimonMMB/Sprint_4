<x-app-layout>
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('') }}')">
        <div class="w-full max-w-md mx-4 bg-white/70 dark:bg-gray-800/70 rounded-lg shadow-xl backdrop-blur-md p-6 text-center">
            <!-- Header -->
            <div class="bg-orange-500/80 dark:bg-orange-600/80 p-4 text-center rounded-t-lg -mx-6 -mt-6 mb-6">
                <h2 class="text-2xl font-bold text-white">¡Ups! Página no encontrada (404)</h2>
            </div>

            <!-- Icono y mensaje -->
            <div class="mb-6">
                <svg class="h-16 w-16 mx-auto text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="mt-4 text-gray-700 dark:text-gray-300">
                    La página que buscas no existe o ha sido movida.
                </p>
            </div>

            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">
                    Cerrar sesión
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                Iniciar sesión
            </a>
        @endauth
        </div>
    </div>
</x-app-layout>