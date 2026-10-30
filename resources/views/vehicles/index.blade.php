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
    <!-- SOLUCIÓN PASO 2: Usamos flex-grow-1 en el main para que empuje lo de abajo -->
    <main class="flex-grow-1">
        <div class="container mt-5">
            <div class="text-center mb-5">
                <h1>Vehiculos</h1>
                <p class="lead">Vehiculos Guardados en la Base de Datos.</p>
            </div>

            <div class="text-end mb-3">
            <a href="{{ route('vehicles.create') }}" class="btn btn-primary bg-blue">+ Nuevo Registro</a>
            </div>
            <div class="table-responsive" style="max-height: 300px; overflow-y: auto;"> 
              <table class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-light sticky-top"> 
                  <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placas</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                @forelse ($vehicles as $vehicle)
                  <tr class="table-primary">
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->mark }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->plate }}</td>
                    <td> 
                    <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                            <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="d-inline form-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                  </tr>
                @empty
                   <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Todavía no hay Datos registrados.
                        </td>
                    </tr>
                @endforelse
                </tbody>
              </table>
            </div> <!-- Aquí cierra correctamente el div de la tabla -->
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // 1. Confirmación antes de eliminar
    document.querySelectorAll('.form-eliminar').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // detenemos el envío normal

            Swal.fire({
                title: '¿Eliminar Datos?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit(); // ahora sí enviamos el formulario
                }
            });
        });
    });

    // 2. Mensaje de éxito que viene del controlador (->with('success', ...))
    @if (session('success'))
    Swal.fire({
        icon: 'success',
        title: @json(session('success')),
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
    @endif
</script>

</body>
</html>
