<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <div class="min-h-screen flex flex-col items-center justify-center py-6 sm:py-12 lg:py-24">
        <div class="max-w-lg text-center">
            <h1 class="text-3xl font-bold mb-4">Bienvenido a nuestra aplicación</h1>
            <p class="text-lg mb-8">Si ya tienes una cuenta, por favor inicia sesión. Si no, regístrate para comenzar.</p>
            <div class="flex justify-center gap-4">
                <!-- Enlace para Login -->
                <a href="{{ route('login') }}" class="bg-blue-500 text-white py-2 px-6 rounded-md">Iniciar sesión</a>

                <!-- Enlace para Registro -->
                <a href="{{ route('users.create') }}" class="bg-green-500 text-white py-2 px-6 rounded-md">Registrarse</a>
            </div>
        </div>
    </div>
</body>
</html>
