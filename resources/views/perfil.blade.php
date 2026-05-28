<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .contenedor{
            width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        h1{
            text-align: center;
            color: #333;
        }

        .dato{
            margin-bottom: 15px;
            font-size: 18px;
        }

        .titulo{
            font-weight: bold;
            color: #444;
        }

        .btn{
            margin-top: 20px;
            width: 100%;
            background: red;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover{
            background: darkred;
        }
    </style>
</head>
<body>

    <div class="contenedor">

        <h1>Perfil del Usuario</h1>

        <div class="dato">
            <span class="titulo">Nombre:</span>
            {{ Auth::user()->name }}
        </div>

        <div class="dato">
            <span class="titulo">Usuario:</span>
            {{ Auth::user()->usuario }}
        </div>

        <div class="dato">
            <span class="titulo">Correo:</span>
            {{ Auth::user()->email }}
        </div>

        <div class="dato">
            <span class="titulo">Rol:</span>
            {{ Auth::user()->rol }}
        </div>

        <div class="dato">
            <span class="titulo">Teléfono:</span>
            {{ Auth::user()->telefono ?? 'No registrado' }}
        </div>

        <div class="dato">
            <span class="titulo">Cargo:</span>
            {{ Auth::user()->cargo ?? 'No registrado' }}
        </div>

        <div class="dato">
            <span class="titulo">Universidad:</span>
            {{ Auth::user()->universidad ?? 'No registrado' }}
        </div>

        <div class="dato">
            <span class="titulo">Aula:</span>
            {{ Auth::user()->aula ?? 'No registrado' }}
        </div>

        <div class="dato">
            <span class="titulo">Semestre:</span>
            {{ Auth::user()->semestre ?? 'No registrado' }}
        </div>

        <!-- BOTON CERRAR SESION -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="btn">
                Cerrar Sesión
            </button>
        </form>

    </div>

</body>
</html>

