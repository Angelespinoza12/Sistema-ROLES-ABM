<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Perfil Usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>
            Perfil del Usuario
        </h2>

        <a href="/logout" class="btn btn-danger">
            Cerrar Sesión
        </a>

    </div>
    <div class="card">

        <div class="card-header bg-primary text-white">

            Información del Usuario

        </div>

        <div class="card-body">

            <h4>
                {{ Auth::user()->name }}
            </h4>

            <hr>

            <p>
                <strong>Usuario:</strong>
                {{ Auth::user()->username }}
            </p>

            <p>
                <strong>Correo:</strong>
                {{ Auth::user()->email }}
            </p>

            <p>
                <strong>Rol:</strong>
                {{ Auth::user()->role }}
            </p>

            <p>
                <strong>Teléfono:</strong>
                {{ Auth::user()->telefono }}
            </p>

            <p>
                <strong>Cargo:</strong>
                {{ Auth::user()->cargo }}
            </p>

            <p>
                <strong>Universidad:</strong>
                {{ Auth::user()->universidad }}
            </p>

            <p>
                <strong>Aula:</strong>
                {{ Auth::user()->aula }}
            </p>

            <p>
                <strong>Semestre:</strong>
                {{ Auth::user()->semestre }}
            </p>

        </div>

    </div>

</div>

</body>
</html>