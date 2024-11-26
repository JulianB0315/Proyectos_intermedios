<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tareas</title>
    <link rel="icon" href="/Views/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7fa;
            color: #212121;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .page-title {
            text-align: center;
            font-size: 2.5rem;
            color: #00796b;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
            position: relative;
        }

        .page-title::after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background-color: #26a69a;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        .container {
            margin: 40px auto;
            max-width: 800px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .task-item {
            border: 1px solid #ddd;
            margin-bottom: 15px;
            border-radius: 5px;
            overflow: hidden;
            background-color: #f7f7f7;
        }

        .task-header {
            padding: 15px;
            cursor: pointer;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #00796b;
            color: #ffffff;
        }

        .task-header:hover {
            background-color: #26a69a;
        }

        .task-body {
            display: none;
            padding: 15px;
            background-color: #ffffff;
            color: #212121;
        }

        .task-body.show {
            display: block;
        }

        /* Estilos para los botones de Cerrar sesión y Nueva tarea */
        .btn {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            border-radius: 4px;
            color: #ffffff;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #00796b;
            border: none;
        }

        .btn-primary:hover {
            background-color: #26a69a;
        }

        .btn-danger {
            background-color: #e53935;
            border: none;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        .btn-success {
            background-color: #388e3c;
            border: none;
        }

        .btn-success:hover {
            background-color: #4caf50;
        }

        .btn-warning {
            background-color: #fbc02d;
            border: none;
            color: #212121;
        }

        .btn-warning:hover {
            background-color: #ff0000;
        }

        .completada {
            background-color: #d4edda;
            color: #155724;
        }

        .pendiente {
            background-color: #fff3cd;
            color: #856404;
        }

        .pasada {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <h1 class="page-title">Gestión de Tareas</h1>
    <div class="container">
        <?php
        $fecha_actual = date('Y-m-d');
        foreach ($tareas as $tarea):
            $estado_clase = '';
            if ($tarea['estado'] == 'completada') {
                $estado_clase = 'completada';
            } elseif ($tarea['estado'] == 'pendiente' && strtotime($tarea['fecha_limite']) < strtotime($fecha_actual)) {
                $estado_clase = 'pasada';
            } elseif ($tarea['estado'] == 'pendiente') {
                $estado_clase = 'pendiente';
            }
        ?>
            <div class="task-item">
                <div class="task-header <?= $estado_clase ?>" onclick="toggleTask(this)">
                    <?= htmlspecialchars($tarea['titulo']) ?>
                    <span>+</span>
                </div>
                <div class="task-body ">
                    <p><strong>Descripción:</strong> <?= htmlspecialchars($tarea['descripcion']) ?></p>
                    <p><strong>Estado:</strong> <?= htmlspecialchars($tarea['estado']) ?></p>
                    <p><strong>Fecha Límite:</strong> <?= htmlspecialchars($tarea['fecha_limite']) ?></p>
                    <div>
                        <form action="/Entregable/?action=eliminar_tarea" method="POST" style="display:inline;">
                            <input type="hidden" name="id_tarea" value="<?= htmlspecialchars($tarea['id_tarea']) ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        <form action="/Entregable/?action=completar_tarea" method="POST" style="display:inline;">
                            <input type="hidden" name="id_tarea" value="<?= htmlspecialchars($tarea['id_tarea']) ?>">
                            <button type="submit" class="btn btn-success btn-sm">Completada</button>
                        </form>
                        <a href="/Entregable/?action=editar_tarea&id_tarea=<?= htmlspecialchars($tarea['id_tarea']) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/Entregable/?action=pdf&id_tarea=<?= htmlspecialchars($tarea['id_tarea']) ?>" class="btn btn-primary btn-sm">Descargar PDF</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-center mb-4">
        <a href="/Entregable/?action=nueva_tarea" class="btn btn-primary me-2">Crear Nueva Tarea</a>
        <a href="/Entregable/?action=logout" class="btn btn-danger">Cerrar sesión</a>
    </div>

    <script>
        function toggleTask(header) {
            const body = header.nextElementSibling;
            body.classList.toggle('show');
            const symbol = header.querySelector('span');
            symbol.textContent = body.classList.contains('show') ? '-' : '+';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>