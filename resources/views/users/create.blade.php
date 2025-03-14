<div class="container">
    <h2 class="mb-4">Crear Usuario</h2>

    {{-- Muestra errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="objective" class="form-label">Objetivo</label>
            <input type="text" name="objective" id="objective" class="form-control" value="{{ old('objective') }}" required>
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Experiencia</label>
            <input type="text" name="experience" id="experience" class="form-control" value="{{ old('experience') }}" required>
        </div>

        <div class="mb-3">
            <label for="training_frequency" class="form-label">Frecuencia de Entrenamiento (días por semana)</label>
            <input type="number" name="training_frequency" id="training_frequency" class="form-control" min="1" max="7" value="{{ old('training_frequency') }}" required>
        </div>

        <div class="mb-3">
            <label for="cycle_duration" class="form-label">Duración del Ciclo (meses)</label>
            <select name="cycle_duration" id="cycle_duration" class="form-control" required>
                <option value="" disabled selected>Seleccionar duración</option>
                <option value="3">3 meses</option>
                <option value="6">6 meses</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Fecha de Inicio</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
        </div>

        <div class="mb-3">
            <label for="estimated_end_date" class="form-label">Fecha Estimada de Finalización</label>
            <input type="date" name="estimated_end_date" id="estimated_end_date" class="form-control" value="{{ old('estimated_end_date') }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const startDateInput = document.getElementById("start_date");
    const cycleDurationInput = document.getElementById("cycle_duration");
    const estimatedEndDateInput = document.getElementById("estimated_end_date");

    function calculateEndDate() {
        const startDateValue = startDateInput.value;
        const cycleDurationValue = cycleDurationInput.value;

        if (startDateValue && cycleDurationValue) {
            let startDate = new Date(startDateValue);
            startDate.setMonth(startDate.getMonth() + parseInt(cycleDurationValue));

            let year = startDate.getFullYear();
            let month = String(startDate.getMonth() + 1).padStart(2, "0"); // Mes en formato MM
            let day = String(startDate.getDate()).padStart(2, "0"); // Día en formato DD

            estimatedEndDateInput.value = `${year}-${month}-${day}`;
        }
    }

    startDateInput.addEventListener("change", calculateEndDate);
    cycleDurationInput.addEventListener("change", calculateEndDate);
});
</script>
