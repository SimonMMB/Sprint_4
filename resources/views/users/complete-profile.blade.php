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

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>