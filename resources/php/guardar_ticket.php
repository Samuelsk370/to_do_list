

<?php
header('Content-Type: application/json');
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD = BD::crearInstancia();

// Desactivar errores visibles para no romper el JSON
ini_set('display_errors', 0);
error_reporting(0);

$response = ['success' => false, 'message' => 'No se recibió ningún archivo'];

if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === 0) {
    // Capturar variables del formulario
    $total_bruto = $_POST['total_bruto'] ?? 0;
    $total_descuento = $_POST['total_descuento'] ?? 0;
    $total_cobrar = $_POST['total_cobrar'] ?? 0;
    $porcentaje = $_POST['porcentaje'] ?? 0;
    $id_cliente = $_POST['id_cliente'] ?? null;
    $nombre_cliente = $_POST['nombre_cliente'] ?? '';
    $fecha_actual = $_POST['fecha_actual'] ?? '';
    $id_empleado_cobro = 1; // ejemplo (puedes reemplazar por sesión o valor real)

    // Subir el PDF
    $uploadDir = '../../storage/pdf/tickets_cortes/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = 'ticket_' . time() . '.pdf';
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $filePath)) {

        // 🔹 Insertar en la base de datos
        try {
            $sql = "INSERT INTO cortes_fichas (
                        id_client_pv, 
                        total_bruto, 
                        porcentaje, 
                        descuento_total, 
                        total_cobrado, 
                        fecha_corte, 
                        ticket_pdf, 
                        id_empleado_cobro
                    ) 
                    VALUES (
                        :id_client_pv, 
                        :total_bruto, 
                        :porcentaje, 
                        :descuento_total, 
                        :total_cobrado, 
                        :fecha_corte, 
                        :ticket_pdf, 
                        :id_empleado_cobro
                    )";
            
            $save_datasOfCorte = $conexionBD->prepare($sql);
            $save_datasOfCorte->bindParam(':id_client_pv', $id_cliente);
            $save_datasOfCorte->bindParam(':total_bruto', $total_bruto);
            $save_datasOfCorte->bindParam(':porcentaje', $porcentaje);
            $save_datasOfCorte->bindParam(':descuento_total', $total_descuento);
            $save_datasOfCorte->bindParam(':total_cobrado', $total_cobrar);
            $save_datasOfCorte->bindParam(':fecha_corte', $fecha_actual);
            $save_datasOfCorte->bindParam(':ticket_pdf', $filePath);
            $save_datasOfCorte->bindParam(':id_empleado_cobro', $id_empleado_cobro);
            $save_datasOfCorte->execute();

            $response = [
                'success' => true,
                'path' => $filePath,
                'fecha_actual' => $fecha_actual,
                'by_empleado' => 'Samuel CM',
                'message' => 'Datos guardados correctamente'
            ];

        } catch (PDOException $e) {
            $response = [
                'success' => false,
                'message' => 'Error al guardar en la base de datos: ' . $e->getMessage()
            ];
        }

    } else {
        $response = ['success' => false, 'message' => 'No se pudo mover el archivo'];
    }
}

echo json_encode($response);

?>