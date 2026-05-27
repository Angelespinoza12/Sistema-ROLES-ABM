<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Universidad Salesiana</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{
            background:#0d3b66;
            font-family: Arial;
        }
        .login-box{
            width: 420px;
            margin: 60px auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.3);

        }

        .header{

            background: #f1f1f1;
            padding: 20px;
            border-bottom: 1px solid #ddd;

        }

        .header h3{

            font-size: 28px;
            font-weight: bold;

        }

        .header p{

            margin: 0;
            color: #555;

        }

        .form-control{

            height: 55px;
            font-size: 20px;

        }

        .btn-login{

            height: 55px;
            font-size: 24px;
            background: #1976d2;
            color: white;
            border: none;

        }

        .btn-login:hover{

            background: #125aa0;

        }

        .footer{

            text-align: center;
            padding: 15px;
            color: #666;
            font-size: 14px;

        }

    </style>

</head>

<body>

<div class="login-box">

    <div class="header text-center">
        <h3 class="mt-2">
        
        </h3>

        <p>
            Angel Fernando Espinoza Condori 
        </p>

    </div>

    <div class="p-4">
        @if(session('error'))

            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

        @endif

        @if($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="mb-3">

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>

                    <input type="text"
                        name="username"
                        class="form-control"
                        placeholder="Usuario"
                        required>

                </div>
            </div>
            <div class="mb-4">

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </span>

                    <input type="password"
    name="password"
    class="form-control"
    placeholder="Contraseña"
    maxlength="8"
    required>
                </div>

            </div>

            <button class="btn btn-login w-100">

                <i class="bi bi-box-arrow-in-right"></i>

            </button>

        </form>

    </div>

    <div class="footer">

    </div>

</div>

</body>
</html>