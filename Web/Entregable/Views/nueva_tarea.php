<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Tarea</title>
    <link rel="icon" href="./img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7fa;
            color: #212121;
        }

        .task-card {
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
        <div class="task-card">
            <h1>Crear Nueva Tarea</h1>
            <form action="/Entregable/?action=guardar_tarea" method="POST">
                <div class="mb-4">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Escribe el título de la tarea" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Describe los detalles de la tarea" rows="4" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="fecha_limite" class="form-label">Fecha Límite</label>
                    <input type="date" id="fecha_limite" name="fecha_limite" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Crear Tarea</button>
            </form>

        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>