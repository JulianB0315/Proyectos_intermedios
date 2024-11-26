<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7fa; /* Fondo cyan claro */
        }

        .login-card {
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            animation: scaleIn 0.8s ease-in-out;
        }

        .form-control:focus {
            border-color: #00796b;
            box-shadow: 0 0 10px rgba(0, 121, 107, 0.5);
        }

        .btn-primary {
            background-color: #00796b;
            border: none;
            font-size: 18px;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #26a69a;
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 121, 107, 0.4);
        }

        .text-secondary {
            color: #004d40 !important;
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-card">
            <h2 class="text-center text-primary mb-4" style="color: #00796b;">Inicia Sesión</h2>
            <form action="/Entregable/?action=autenticar_usuario" method="POST">
                <div class="mb-4">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="correo" id="correo" placeholder="tucorreo@ejemplo.com" required>
                </div>
                <div class="mb-4">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="********" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
            <div class="text-center mt-4">
                <p class="mb-0">¿Aún no tienes cuenta? 
                    <a href="/Entregable/?action=registro" class="text-secondary fw-bold">Regístrate aquí</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
