<?php
require_once 'config/Conection.php';
require_once 'models/UsuarioModel.php';


class UsuarioController
{
    private $model;

    public function __construct($pdo)
    {
        $this->model = new UsuarioModel($pdo);
    }

    // Registrar un nuevo usuario
    public function registrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];

            $resultado = $this->model->registrarUsuario($nombre, $correo, $contraseña);

            if ($resultado) {
                header('Location: /Entregable/?action=login');
                exit();
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    }

    // Autenticar un usuario
    public function autenticarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];

            $usuario = $this->model->autenticarUsuario($correo, $contraseña);

            if ($usuario) {
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                header('Location: /Entregable/?action=tareas');
                exit();
            } else {
                echo "Correo o contraseña incorrectos.";
            }
        }
    }
}
