<x-app-layout>
    <!-- Contenedor principal con imagen de fondo y panel a la derecha -->
    <div class="min-h-screen bg-cover bg-center flex" style="background-image: url('{{ asset('storage/005.jpg') }}')">
        <!-- Panel derecho (ahora con h-full para altura completa) -->
        <div class="w-full max-w-lg bg-white/70 dark:bg-gray-800/70 shadow-xl backdrop-blur-md p-6 h-screen" style="border-radius: 0; margin-left: auto;">
            <!-- Header naranja (bordes rectos) -->
            <div class="bg-orange-500/80 dark:bg-orange-600/80 p-4 text-center -mx-6 -mt-6 mb-6" style="border-radius: 0;">
                <h2 class="text-2xl font-bold text-white">
                    Completa con tus preferencias!
                </h2>
            </div>

            <!-- Contenedor del formulario con scroll si es necesario -->
            <div class="h-[calc(100vh-180px)] overflow-y-auto pr-2">
                <form action="{{ route('programs.store') }}" method="POST">
                    @csrf

                    <!-- Frecuencia de Entrenamiento -->
                    <div class="mb-4">
                        <label for="training_frequency" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Frecuencia de Entrenamiento (días por semana)
                        </label>
                        <select name="training_frequency" id="training_frequency" 
                                class="w-full p-3 border border-gray-300 dark:border-gray-600 bg-white/80 dark:bg-gray-700/80 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-white dark:text-white" required style="border-radius: 0;">
                            <option value="" disabled selected class="text-gray-500">Seleccionar frecuencia</option>
                            <option value="2">2 días por semana</option>
                            <option value="3">3 días por semana</option>
                            <option value="4">4 días por semana</option>
                            <option value="5">5 días por semana</option>
                        </select>
                    </div>

                    <!-- Duración del Ciclo -->
                    <div class="mb-4">
                        <label for="training_duration" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Duración del Ciclo (meses)
                        </label>
                        <select name="training_duration" id="training_duration" 
                                class="w-full p-3 border border-gray-300 dark:border-gray-600 bg-white/80 dark:bg-gray-700/80 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-white dark:text-white" required style="border-radius: 0;">
                            <option value="" disabled selected class="text-gray-500">Seleccionar duración</option>
                            <option value="2">2 meses</option>
                            <option value="3">3 meses</option>
                            <option value="4">4 meses</option>
                            <option value="5">5 meses</option>
                            <option value="6">6 meses</option>
                        </select>
                    </div>

                    <!-- Fecha de Inicio -->
                    <div class="mb-4">
                        <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Fecha de Inicio
                        </label>
                        <input type="date" name="start_date" id="start_date" 
                               class="w-full p-3 border border-gray-300 dark:border-gray-600 bg-white/80 dark:bg-gray-700/80 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-white dark:text-white" 
                               value="{{ old('start_date') }}" required style="border-radius: 0;">
                    </div>

                    <!-- Fecha Estimada de Finalización -->
                    <div class="mb-6">
                        <label for="estimated_end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Fecha Estimada de Finalización
                        </label>
                        <input type="date" name="estimated_end_date" id="estimated_end_date" 
                               class="w-full p-3 border border-gray-300 dark:border-gray-600 bg-gray-100/80 dark:bg-gray-700/80 focus:ring-2 focus:ring-orange-500 cursor-not-allowed text-white dark:text-white" 
                               value="{{ old('estimated_end_date') }}" readonly style="border-radius: 0;">
                    </div>

                    <!-- Botón de Enviar -->
                    <button type="submit" 
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-4 shadow-md transition duration-300 ease-in-out transform hover:scale-105 mb-4" style="border-radius: 0;">
                        Crear nuevo programa
                    </button>

                    <!-- Botón Volver -->
                    <a href="{{ route('dashboard') }}" 
                       class="block text-center bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 shadow-md transition duration-300 ease-in-out" style="border-radius: 0;">
                        ← Volver al Dashboard
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- Script (se mantiene igual) -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const startDateInput = document.getElementById("start_date");
        const trainingDurationInput = document.getElementById("training_duration");
        const estimatedEndDateInput = document.getElementById("estimated_end_date");

        function calculateEndDate() {
            const startDateValue = startDateInput.value;
            const trainingDurationValue = trainingDurationInput.value;

            if (startDateValue && trainingDurationValue) {
                let startDate = new Date(startDateValue);
                startDate.setMonth(startDate.getMonth() + parseInt(trainingDurationValue));

                let year = startDate.getFullYear();
                let month = String(startDate.getMonth() + 1).padStart(2, "0");
                let day = String(startDate.getDate()).padStart(2, "0");

                estimatedEndDateInput.value = `${year}-${month}-${day}`;
            }
        }

        startDateInput.addEventListener("change", calculateEndDate);
        trainingDurationInput.addEventListener("change", calculateEndDate);
    });
    </script>
</x-app-layout>