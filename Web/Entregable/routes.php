<?php
// Incluir controladores
require_once 'controllers/UsuarioController.php';
require_once 'controllers/TareaController.php';

// Instanciar controladores
$usuarioController = new UsuarioController($pdo);
$tareaController = new TareaController($pdo);

// Iniciar sesión
session_start();

function verificarSesion()
{
    return isset($_SESSION['usuario_id']);
}

$accion = $_GET['action'] ?? '';

// Manejar las rutas
switch ($accion) {

        // Mostrar la vista de registro
    case 'registro':
        require 'views/registro.php';
        break;

        // Mostrar la vista de login
    case 'login':
        require 'views/login.php';
        break;

        // Autenticar usuario
    case 'autenticar_usuario':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo'] ?? '';
            $contraseña = $_POST['contraseña'] ?? '';
            $usuarioController->autenticarUsuario($correo, $contraseña);
        }
        break;


        // Registrar un nuevo usuario
    case 'registrar_usuario':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $contraseña = $_POST['contraseña'] ?? '';

            if (empty($nombre) || empty($correo) || empty($contraseña)) {
                echo "Todos los campos son obligatorios.";
                exit();
            }

            // Verificar si el correo ya está registrado
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = :correo");
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            if ($stmt->fetchColumn() > 0) {
                echo "El correo ya está registrado.";
                exit();
            }

            // Registrar el usuario
            $registrado = $usuarioController->registrarUsuario($nombre, $correo, $contraseña);

            if ($registrado) {
                header('Location: /entregable/?action=login');
                exit();
            } else {
                echo "Hubo un error al registrar el usuario.";
            }
        }
        break;
        //Cerrar Sesión    
    case 'logout':
        session_destroy();
        header('Location: /Entregable/?action=login');
        break;

        /*Rutas para las Tareas*/

        //Tareas    
    case 'tareas':
        if (!verificarSesion()) {
            header('Location: /Entregable/?action=login');
            exit();
        }

        $id_usuario = $_SESSION['usuario_id'];

        $tareaController = new TareaController($pdo);
        $tareas = $tareaController->obtenerTareasPorUsuario($id_usuario);

        require 'views/tareas.php';
        break;

        // Nueva tarea
    case 'nueva_tarea':
        if (!verificarSesion()) {
            header('Location: /Entregable/?action=login');
            exit();
        }
        require 'views/nueva_tarea.php';
        break;

        // Crear tareas
    case 'guardar_tarea':
        if (!verificarSesion()) {
            header('Location: /Entregable/?action=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fecha_limite = $_POST['fecha_limite'];
            $id_usuario = $_SESSION['usuario_id'];

            if (empty($titulo) || empty($descripcion) || empty($fecha_limite)) {
                echo "Todos los campos son obligatorios.";
                exit();
            }
            $tareaController->crearTarea($id_usuario, $titulo, $descripcion, 'pendiente', $fecha_limite);
        }

        header('Location: /Entregable');
        exit();
        break;

        //Eliminar tareas    
    case 'eliminar_tarea':
        if (!verificarSesion()) {
            header('Location: /Entregable/?action=login');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_tarea'])) {
            $id_tarea = $_POST['id_tarea'];

            // Llamar al controlador para eliminar la tarea
            $tareaController = new TareaController($pdo);
            $tareaController->eliminarTarea($id_tarea);
        } else {
            echo "ID de tarea no válido o método incorrecto.";
        }
        break;
        //Poner en finalizado la Tareas 
    case 'completar_tarea':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_tarea = $_POST['id_tarea'];
            $tareaController->completarTarea($id_tarea);
        }
        header('Location: /Entregable/?action=tareas'); // Redirige a la lista de tareas
        exit();
        break;

        //Editar tareas
    case 'editar_tarea':
        if (!verificarSesion()) {
            header('Location: /Entregable/?action=login');
            exit();
        }
        $tareaController->editar_tarea();
        break;

        //Actulizar tareas
    case 'actualizar_tarea':
        if (!verificarSesion()) {
            header('Location: /Entregable/?action=login');
            exit();
        }
        $tareaController->actualizar_tarea();
        break;
    case 'obtener_tarea_por_id':
        if (!verificarSesion()) {
            header('Location: /Entregable/?action=login');
            exit();
        }
        $id_tarea = $_POST['id_tarea'];
        $tareaController->obtener_tarea_por_id($id_tarea);
        break;
    case 'pdf':
        if (!verificarSesion()) {
            header('Location: /Entregable/?action=login');
            exit();
        }
        if (isset($_GET['id_tarea'])) {
            $id_tarea = $_GET['id_tarea'];
            $tareaController->generarPDF($id_tarea);
        } else {
            echo "ID de tarea no proporcionado.";
        }
        break;
    default:
        // Redirigir a la página de login por defecto si no se ha solicitado ninguna acción
        if (verificarSesion()) {
            header('Location: /Entregable/?action=tareas');
        } else {
            header('Location: /Entregable/?action=login');
        }
        break;
}
