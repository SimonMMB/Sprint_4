<div class="container">
        <h1>Programa de Entrenamiento</h1>

        <h3>Datos del Programa</h3>
        <p><strong>Sesiones totales:</strong> {{ $program->total_sessions }}</p>
        <p><strong>Sesiones completadas:</strong> {{ $program->completed_sessions }}</p>
        <p><strong>Sesiones restantes:</strong> {{ $program->remaining_sessions }}</p>

        <h3>Sesiones</h3>
        @if($sessions->isEmpty())
            <p>No hay sesiones disponibles aún.</p>
        @else
            <ul>
                @foreach($sessions as $session)
                    <li>
                        <a href="{{ route('session.show', $session->id) }}">
                            Sesión {{ $session->id }} - 
                            Estado: {{ $session->status }} - 
                            Fecha estimada: {{ $session->estimated_date }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
</div>