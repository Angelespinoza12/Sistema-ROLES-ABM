<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Administrador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>
            Panel Administrador
        </h2>

     
<form action="{{ route('logout') }}" method="POST">
    @csrf

    <button type="submit" class="btn btn-danger">
        Cerrar Sesión
    </button>
</form>



    </div>

    {{-- MENSAJE --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    {{-- ERRORES --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- REGISTRAR --}}
    <div class="card mb-4">

        <div class="card-header bg-primary text-white">
            Registrar Usuario
        </div>

        <div class="card-body">

            <form action="/usuarios" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Nombre</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Email</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Usuario</label>

                        <input type="text"
                               name="username"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Contraseña</label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Teléfono</label>

                        <input type="text"
                               name="telefono"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Cargo</label>

                        <input type="text"
                               name="cargo"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Universidad</label>

                        <input type="text"
                               name="universidad"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Aula</label>

                        <input type="text"
                               name="aula"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Semestre</label>

                        <input type="text"
                               name="semestre"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Rol</label>

                        <select name="role" class="form-select">

                            <option value="usuario">
                                Usuario
                            </option>

                            <option value="admin">
                                Administrador
                            </option>

                        </select>

                    </div>

                </div>

                <button class="btn btn-success">
                    Guardar
                </button>

            </form>

        </div>

    </div>


    {{-- TABLA --}}
    <div class="card">

        <div class="card-header bg-dark text-white">
            Usuarios
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-light">

                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Editar</th>
                        <th>Eliminar</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($usuarios as $u)

                    <tr>

                        {{-- FORM EDITAR --}}
                        <form action="/usuarios/{{ $u->id }}" method="POST">

                            @csrf
                            @method('PUT')

                            <td>

                                {{ $u->id }}

                            </td>

                            <td>

                                <input type="text"
                                       name="name"
                                       value="{{ $u->name }}"
                                       class="form-control">

                            </td>

                            <td>

                                <input type="email"
                                       name="email"
                                       value="{{ $u->email }}"
                                       class="form-control">

                            </td>

                            <td>

                                <input type="text"
                                       name="username"
                                       value="{{ $u->username }}"
                                       class="form-control">

                            </td>

                            <td>

                                <select name="role"
                                        class="form-select">

                                    <option value="usuario"
                                        {{ $u->role == 'usuario' ? 'selected' : '' }}>

                                        Usuario

                                    </option>

                                    <option value="admin"
                                        {{ $u->role == 'admin' ? 'selected' : '' }}>

                                        Administrador

                                    </option>

                                </select>

                            </td>

                            <td>

                                <button type="submit"
                                        class="btn btn-warning btn-sm">

                                    Editar

                                </button>

                            </td>

                        </form>

                        {{-- ELIMINAR --}}
                        <td>

                            <form action="/usuarios/{{ $u->id }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    Eliminar

                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>