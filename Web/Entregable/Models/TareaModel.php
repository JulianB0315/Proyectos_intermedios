<?php
class TareaModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function obtenerTareasPorUsuario($id_usuario)
    {
        try {
            $sql = "SELECT * FROM tareas WHERE id_usuario = :id_usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener tareas: " . $e->getMessage();
            return [];
        }
    }

    public function borrarTarea($id_tarea)
    {
        try {
            $sql = "DELETE FROM tareas WHERE id_tarea = :id_tarea";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_tarea', $id_tarea);
            $stmt->execute();


            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                echo "No se encontró la tarea con el ID especificado.";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al borrar tarea: " . $e->getMessage();
            return false;
        }
    }

    public function crearTarea($id_usuario, $titulo, $descripcion, $estado, $fecha_limite)
    {
        try {
            $id_tarea = uniqid();

            $sql = "INSERT INTO tareas (id_tarea, id_usuario, titulo, descripcion, estado, fecha_limite) 
                VALUES (:id_tarea, :id_usuario, :titulo, :descripcion, :estado, :fecha_limite)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':id_tarea', $id_tarea);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':fecha_limite', $fecha_limite);

            $resultado = $stmt->execute();

            if ($resultado) {
                echo "Tarea creada correctamente.";
            } else {
                echo "No se pudo crear la tarea.";
            }

            return $resultado;
        } catch (PDOException $e) {
            echo "Error al crear tarea: " . $e->getMessage();
            return false;
        }
    }

    public function obtener_tarea_por_id($id_tarea)
    {
        try {
            $sql = "SELECT * FROM tareas WHERE id_tarea = :id_tarea";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_tarea', $id_tarea);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener tarea: " . $e->getMessage();
            return null;
        }
    }

    public function actualizar_tarea($id_tarea, $titulo, $descripcion, $fecha_limite)
    {
        try {
            $query = $this->pdo->prepare("
                UPDATE tareas 
                SET titulo = :titulo, descripcion = :descripcion, fecha_limite = :fecha_limite 
                WHERE id_tarea = :id_tarea
            ");
            $query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $query->bindParam(':fecha_limite', $fecha_limite, PDO::PARAM_STR);
            $query->bindParam(':id_tarea', $id_tarea, PDO::PARAM_STR);

            return $query->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar tarea: " . $e->getMessage();
            return false;
        }
    }
    public function completarTarea($id_tarea)
    {
        try {
            // Actualizar la tarea a 'completada'
            $sql = "UPDATE tareas SET estado = 'completada' WHERE id_tarea = :id_tarea";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_tarea', $id_tarea);

            // Ejecutar la actualización
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al completar la tarea: " . $e->getMessage();
            return false;
        }
    }
    function obtenerTareaPorId($id_tarea) {
        try {
            $sql = "SELECT * FROM tareas WHERE id_tarea = :id_tarea";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_tarea', $id_tarea);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la tarea: " . $e->getMessage();
            return null;
        }
    }
}
