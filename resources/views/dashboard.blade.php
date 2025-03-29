
 
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('¡Bienvenid@ ' . $name . '!') }}
        </h2>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg">{{ __("¡Estás logueado!") }}</p>
                </div>

                <div class="p-6">
                        <a href="{{ route('program.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                            Crea un programa de entrenamiento
                        </a>
                </div>

                <div class="p-6">
                    <a href="{{ route('programs.index') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                        Ver mis programas
                    </a>
                </div>

                <div class="p-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                            Cerrar sesión
                        </button>
                    </form>
                </div>

                
            </div>
        </div>
    </div>

