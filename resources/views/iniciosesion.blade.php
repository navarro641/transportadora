<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hermes Transportadora</title>
    <style>
        /* Estilos generales */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #6D6D77; /* Fondo gris oscuro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-box {
            background-color: #4F4F5A;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            width: 350px;
        }

        .login-logo {
            width: 100px; /* Tamaño ajustado para el logo */
            margin-bottom: 20px;
        }

        h1 {
            font-size: 32px;
            color: white;
            margin: 0;
        }

        h3 {
            font-size: 18px;
            color: white;
            margin-bottom: 30px;
        }

        /* Grupo de inputs */
        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            background-color: #4F4F5A;
            border: 2px solid #00BCD4;
            border-radius: 5px;
            padding: 10px;
        }

        .input-group input {
            border: none;
            outline: none;
            background: none;
            color: white;
            width: 100%;
            padding-left: 10px;
            font-size: 16px;
        }

        .icon {
            color: #00BCD4;
            font-size: 20px;
        }

        /* Enlace de contraseña olvidada */
        .forgot-password {
            color: white;
            display: block;
            margin-bottom: 30px;
            text-decoration: none;
            font-size: 14px;
        }

        /* Botón de login */
        .login-btn {
            background-color: #00BCD4;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #00a0bb;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <img src="imagenes/logo.png" alt="Hermes Transportadora Logo" class="login-logo">
            <h1>Hermes</h1>
            <h3>Transportadora</h3>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <span class="icon">@</span>
                    <input type="email" name="email" placeholder="Correo electrónico" required>
                </div>
            
                <div class="input-group">
                    <span class="icon">***</span>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
            
                <a href="#" class="forgot-password">¿Olvidó su contraseña?</a>
            
                <button type="submit" class="login-btn">INGRESAR</button>
            </form>
        </div>
    </div>
</body>
</html>
