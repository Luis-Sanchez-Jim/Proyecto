<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureSys</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >
    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>


<!-- SOLUCIÓN PASO 1: Agregamos d-flex flex-column y min-vh-100 al body -->
<body class="d-flex flex-column min-vh-100">

    <nav id="navbar-example2" class="navbar navbar-dark bg-dark px-3 mb-3">
      <a class="navbar-brand text-white mb-0" href="{{ route('dashboard') }}"> SecureSys</a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('admins.index') }}">Administradores</a></li>
        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('clients.index') }}">Clientes</a></li>
        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('employes.index') }}">Empleados</a></li>
        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('vehicles.index') }}">Vehiculos</a></li>
        <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('cameras.index') }}">Camaras</a></li>
      </ul>
    </nav>
    <style>
        #navbar-example2 .nav-link:hover {
        color: #ffffff !important;
        background-color: #0d6efd !important;
      }
    </style>
    <main class="flex-grow-1">

    <div class="container mt-5" style="max-width: 720px;">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">{{ $client->name }}</h1>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Documento:</strong> {{ $client->document }}</li>
                    <li class="list-group-item"><strong>Edad:</strong> {{ $client->age }} Años</li>
                    <li class="list-group-item"><strong>Creado:</strong> {{ $client->created_at->format('d/m/Y H:i') }}</li>
                    <li class="list-group-item"><strong>Actualizado:</strong> {{ $client->updated_at->format('d/m/Y H:i') }}</li>
                </ul>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">Volver</a>
                <a href="{{ route('clients.edit', $client) }}" class="btn btn-outline-primary">Editar</a>
            </div>
        </div>
    </div>

</main>

    <!-- El footer -->
    <footer class="bg-light text-white bg-dark py-4 mt-auto border-top">
      <div class="container text-center">
        <p>&copy; SecureSys.</p>
        <p class="mb-0">{{ date('M Y') }} .Todos los derechos reservados.</p>
      </div>
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous">
    </script>
</body>
</html>