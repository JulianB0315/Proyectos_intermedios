<?php
require_once 'config/Conection.php';
require_once 'models/TareaModel.php';
require_once 'lib/fpdf186/fpdf.php';


class TareaController
{
    private $pdo;
    private $model;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        // Crear la instancia del modelo y pasarle la conexión PDO
        $this->model = new TareaModel($pdo);
    }

    public function obtenerTareasPorUsuario($id_usuario)
    {
        return $this->model->obtenerTareasPorUsuario($id_usuario);
    }

    // Crear una nueva tarea
    public function crearTarea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_usuario = $_SESSION['usuario_id'] ?? null;
            $titulo = $_POST['titulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $estado = $_POST['estado'] ?? 'pendiente';
            $fecha_limite = $_POST['fecha_limite'] ?? '';
            $resultado = $this->model->crearTarea($id_usuario, $titulo, $descripcion, $estado, $fecha_limite);

            if ($resultado) {
                header('Location: /Entregable');
                exit;
            } else {
                echo "Error al crear la tarea";
            }
        }
    }

    public function eliminarTarea($id_tarea)
    {

        $resultado = $this->model->borrarTarea($id_tarea);
        if ($resultado) {
            header('Location: /Entregable/?action=tareas');
            exit;
        } else {
            echo "Error al eliminar la tarea.";
        }
    }

    public function editar_tarea()
    {
        $id_tarea = $_GET['id_tarea'] ?? null;
        if (!$id_tarea) {
            header('Location: /Entregable/');
            exit;
        }
        $tarea = $this->model->obtener_tarea_por_id($id_tarea);
        if (!$tarea) {
            header('Location: /Entregable/');
            exit;
        }
        require_once 'views/editar_tarea.php';
    }


    public function actualizar_tarea()
    {
        $id_tarea = $_POST['id_tarea'] ?? null;
        $titulo = $_POST['titulo'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $fecha_limite = $_POST['fecha_limite'] ?? '';

        if (!$id_tarea || !$titulo || !$descripcion || !$fecha_limite) {
            header('Location: /Entregable/?action=editar_tarea&id_tarea=' . $id_tarea);
            exit;
        }
        $resultado = $this->model->actualizar_tarea($id_tarea, $titulo, $descripcion, $fecha_limite);

        if ($resultado) {
            header('Location: /Entregable/');
        } else {
            echo "Error al actualizar la tarea.";
        }
    }
    public function completarTarea($id_tarea)
    {
        // Actualizar la tarea en la base de datos
        $resultado = $this->model->completarTarea($id_tarea);

        if ($resultado) {
            // Redirigir o mostrar un mensaje de éxito
            echo "Tarea completada con éxito.";
        } else {
            // Mostrar un mensaje de error si no se pudo completar
            echo "Hubo un problema al completar la tarea.";
        }
    }
    public function obtener_tarea_por_id($id_tarea)
    {
        $tarea = $this->model->obtenerTareaPorId($id_tarea);

        if (!$tarea) {
            echo "La tarea con ID $id_tarea no existe.";
            exit();
        }

        // Muestra o procesa la tarea según sea necesario
        echo "<pre>";
        print_r($tarea);
        echo "</pre>";
    }
    public function generarPDF($id_tarea)
    {
        $tarea = $this->model->obtenerTareaPorId($id_tarea);

        if (!$tarea) {
            echo "No se encontró la tarea con el ID especificado.";
            exit();
        }

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetMargins(15, 15, 15);

        // Título del documento
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(33, 150, 243); // Azul
        $pdf->Cell(0, 10, 'Detalle de la Tarea', 0, 1, 'C');
        $pdf->Ln(10); // Espaciado

        // Agregar una línea divisoria decorativa
        $pdf->SetDrawColor(33, 150, 243);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, 25, 200, 25);
        $pdf->Ln(5);

        // Datos de la tarea
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0); // Negro

        // Título
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Titulo: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode($tarea['titulo']), 0, 1);

        // Descripción
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Descripcion: ', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, utf8_decode($tarea['descripcion']), 0, 1);
        $pdf->Ln(5);

        // Estado
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Estado: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);

        // Color según el estado
        switch ($tarea['estado']) {
            case 'completada':
                $pdf->SetTextColor(56, 142, 60); // Verde
                break;
            case 'pendiente':
                $pdf->SetTextColor(255, 193, 7); // Amarillo
                break;
            default:
                $pdf->SetTextColor(211, 47, 47); // Rojo
                break;
        }
        $pdf->Cell(0, 10, utf8_decode($tarea['estado']), 0, 1);
        $pdf->SetTextColor(0, 0, 0); // Volver a negro

        // Fecha límite
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Fecha Limite: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, $tarea['fecha_limite'], 0, 1);

        // Decoración al final
        $pdf->Ln(10);
        $pdf->SetDrawColor(33, 150, 243);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

        // Mostrar el PDF
        $pdf->Output('I', 'Detalle_Tarea.pdf');
    }
}
