<x-app-layout>
    <!-- Contenedor con imagen de fondo -->
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('') }}')">
        <!-- Tarjeta central con estilo consistente -->
        <div class="w-full max-w-md mx-4 bg-white/70 dark:bg-gray-800/70 rounded-lg shadow-xl overflow-hidden transition-all duration-500 hover:shadow-2xl backdrop-blur-md p-6">
            <!-- Header naranja translúcido (igual que vista 1) -->
            <div class="bg-orange-500/80 dark:bg-orange-600/80 p-4 text-center rounded-t-lg -mx-6 -mt-6 mb-6">
                <h2 class="text-2xl font-bold text-white">
                    {{ __('Recuperar Contraseña') }}
                </h2>
                <p class="mt-1 text-orange-100 dark:text-orange-200 text-sm">
                    {{ __('Ingresa tu email para recibir el enlace de recuperación') }}
                </p>
            </div>

            <!-- Mensaje informativo -->
            <div class="mb-6 text-sm text-gray-700 dark:text-gray-300">
                {{ __('¿Olvidaste tu contraseña? No hay problema. Solo dinos tu dirección de email y te enviaremos un enlace para que puedas elegir una nueva.') }}
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 flex items-center bg-green-50/80 dark:bg-green-900/40 rounded-lg p-3 border-l-4 border-green-500">
                    <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-green-700 dark:text-green-300 text-sm">{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('Email') }}
                    </label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus
                           class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white/90 dark:bg-gray-700/90 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-300"
                           placeholder="tu@email.com">
                    @error('email')
                        <div class="mt-1 flex items-center text-sm text-red-600 dark:text-red-400">
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Botón de Enviar -->
                <button type="submit" 
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-[1.02]">
                    {{ __('Enviar Enlace de Recuperación') }}
                </button>

                <!-- Enlace de regreso al login -->
                <div class="text-center pt-4 border-t border-gray-200 dark:border-gray-700 mt-4">
                    <a href="{{ route('welcome') }}" 
                       class="text-orange-500 hover:underline font-medium text-sm inline-flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        {{ __('Volver al Login') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>