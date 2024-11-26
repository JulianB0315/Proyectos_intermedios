<?php

class UsuarioModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Registrar un nuevo usuario
    public function registrarUsuario($nombre, $correo, $contraseña)
    {
        try {
            $id_usuario = $this->generarId();
            $contraseñaHasheada = password_hash($contraseña, PASSWORD_BCRYPT);

            $sql = "INSERT INTO usuarios (id_usuario, nombre, correo, contrasena) 
                    VALUES (:id_usuario, :nombre, :correo, :contrasena)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id_usuario' => $id_usuario,
                ':nombre' => $nombre,
                ':correo' => $correo,
                ':contrasena' => $contraseñaHasheada
            ]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error al registrar usuario: " . $e->getMessage();
            return false;
        }
    }

    // Autenticar usuario
    public function autenticarUsuario($correo, $contraseña)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE correo = :correo";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($contraseña, $usuario['contrasena'])) {
                return $usuario;
            } else {
                return null; // Autenticación fallida
            }
        } catch (PDOException $e) {
            echo "Error al autenticar usuario: " . $e->getMessage();
            return null;
        }
    }

    // Cerrar sesión
    public function cerrarSesion()
    {
        session_destroy();
    }

    // Generar un ID único para el usuario
    private function generarId()
    {
        $prefijo = "Usuario";
        $id = '';
        for ($i = 0; $i < 29; $i++) {
            $id .= rand(0, 9);
        }
        return $prefijo . $id;
    }
}
