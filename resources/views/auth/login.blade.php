<x-app-layout>
    <!-- Contenedor con imagen de fondo -->
    <div class="min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('storage/001.jpg') }}')">
        <!-- Tarjeta alineada a la izquierda CON BORDES RECTOS -->
        <div class="w-full max-w-md bg-white/70 dark:bg-gray-800/70 shadow-xl backdrop-blur-md h-screen flex flex-col">
            <!-- Header naranja translúcido -->
            <div class="bg-orange-500/80 dark:bg-orange-600/80 p-6 text-center">
                <h2 class="text-2xl font-bold text-white">
                    ¡Bienvenid@!
                </h2>
                <p class="mt-1 text-orange-100 dark:text-orange-200">
                    Tu plataforma de entrenamiento personal
                </p>
            </div>

            <!-- Contenido interactivo SIN SCROLL (overflow-hidden) -->
            <div class="p-6 space-y-6 overflow-hidden flex-1">
                <!-- Mensaje central -->
                <div class="text-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        Inicia sesión
                    </h3>
                </div>

                <!-- Formulario de login -->
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email CON TEXTO BLANCO -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Correo electrónico
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
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contraseña CON TEXTO BLANCO -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Contraseña
                        </label>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white/90 dark:bg-gray-700/90 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-300"
                               placeholder="••••••••">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Recordar sesión -->
                    <div class="flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               name="remember" 
                               class="rounded border-gray-300 dark:border-gray-700 text-orange-500 focus:ring-orange-500 dark:focus:ring-orange-600">
                        <label for="remember_me" class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                            Recordar sesión
                        </label>
                    </div>

                    <!-- Botón de Login -->
                    <button type="submit" 
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-[1.02]">
                        Iniciar sesión
                    </button>

                    <!-- Enlace de registro -->
                    <div class="text-center pt-4 border-t border-gray-200 dark:border-gray-700">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            ¿No tienes cuenta? 
                            <a href="{{ route('users.create') }}" class="text-orange-500 hover:underline font-medium">
                                Regístrate aquí
                            </a>
                        </p>
                    </div>

                    <!-- Opcional: Recuperar contraseña -->
                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a href="{{ route('password.request') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:underline">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                    @endif
                </form>

                @push('scripts')
<script>
document.getElementById('login-form').addEventListener('submit', function() {
    // Forzar el envío del token CSRF
    let token = document.querySelector('meta[name="csrf-token"]').content;
    fetch('/sanctum/csrf-cookie').then(() => {
        this.submit();
    });
});
</script>
@endpush
            </div>
        </div>
    </div>
</x-app-layout>