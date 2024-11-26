<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="icon" href="./img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7fa; 
        }

        .register-card {
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            animation: fadeIn 0.8s ease-in-out;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            color: #00796b;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="register-card">
            <h1>Registro de Usuario</h1>
            <form action="/Entregable/?action=registrar_usuario" method="POST">
                <div class="mb-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu nombre" required>
                </div>
                <div class="mb-4">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" class="form-control" placeholder="tucorreo@ejemplo.com" required>
                </div>
                <div class="mb-4">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" id="contraseña" name="contraseña" class="form-control" placeholder="********" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
