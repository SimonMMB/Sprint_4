<div class="container">
    <h2 class="mb-4">Completa tu Perfil</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update-profile') }}" method="POST">
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
            <label for="training_frequency" class="form-label">Frecuencia de Entrenamiento (días por semana)</label>
            <select name="training_frequency" id="training_frequency" class="form-control" required>
                <option value="" disabled selected>Seleccionar frecuencia</option>
                <option value="2">2 días por semana</option>
                <option value="3">3 días por semana</option>
                <option value="4">4 días por semana</option>
                <option value="5">5 días por semana</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="training_duration" class="form-label">Duración del Ciclo (meses)</label>
            <select name="training_duration" id="training_duration" class="form-control" required>
                <option value="" disabled selected>Seleccionar duración</option>
                <option value="2">2 meses</option>
                <option value="3">3 meses</option>
                <option value="4">4 meses</option>
                <option value="5">5 meses</option>
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