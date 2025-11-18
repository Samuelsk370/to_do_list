

<?php
session_start();
header('Content-Type: application/json');
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD = BD::crearInstancia();

// Desactivar errores visibles para no romper el JSON
// ini_set('display_errors', 0);
// error_reporting(0);

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
    $id_empleado_cobro = $_SESSION["id_empleado_logued"] ?? ''; // ejemplo (puedes reemplazar por sesión o valor real)

    // Subir el PDF
    $uploadDir = '../../storage/pdf/tickets_cortes/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = 'ticket_' . time() . '.pdf';
    $filePath = $uploadDir . $fileName;//Ruta para guardar pdf en local
    $filePathToBD = '../storage/pdf/tickets_cortes/' . $fileName;//Ruta para guardar pdf en BD

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
            $save_datasOfCorte->bindParam(':ticket_pdf', $filePathToBD);
            $save_datasOfCorte->bindParam(':id_empleado_cobro', $id_empleado_cobro);
            $save_datasOfCorte->execute();


            // Consulta con INNER JOIN para obtener datos completos del corte, cliente y empleado
            $get_historial_cortes = $conexionBD->prepare("
                    SELECT
                    cf.*,
                    cp.nombre_pv,
                    e.id_empleado,
                    e.name_empleado,
                    e.apellidos_empleado
                FROM cortes_fichas AS cf
                INNER JOIN cliente_puntoventa AS cp ON cf.id_client_pv = cp.id_client_pv
                INNER JOIN empleados AS e ON cf.id_empleado_cobro = e.id_empleado
            WHERE cf.id_client_pv = :id_client_pv ");
            $get_historial_cortes->bindParam(':id_client_pv', $id_cliente);
            $get_historial_cortes->execute();

            // Guardar el historial completo
            $list_cortes = $get_historial_cortes->fetchAll(PDO::FETCH_ASSOC);
            foreach ($list_cortes as $corte) {
                $id_corte_ficha = $corte['id_corte_ficha'];
                $id_client_pv = $corte['id_client_pv'];
                $total_bruto = $corte['total_bruto'];
                $porcentaje = $corte['porcentaje'];
                $descuento_total = $corte['descuento_total'];
                $total_cobrado = $corte['total_cobrado'];
                $fecha_corte = $corte['fecha_corte'];
                $ticket_pdf = $corte['ticket_pdf'];
                $id_empleado_cobro = $corte['id_empleado_cobro'];
                $nombre_pv = $corte['nombre_pv'];
                $id_empleado = $corte['id_empleado'];
                $name_empleado = $corte['name_empleado'];
                $apellidos_empleado = $corte['apellidos_empleado'];
            }
            
            $response = [
                'success' => true,
                'id_corte_ficha' => $id_corte_ficha,
                'id_client_pv' => $id_client_pv,
                'total_bruto' => $total_bruto,
                'porcentaje' => $porcentaje,
                'descuento_total' => $descuento_total,
                'total_cobrado' => $total_cobrado,
                'fecha_corte' => $fecha_corte,
                'ticket_pdf' => $ticket_pdf,
                'id_empleado_cobro' => $id_empleado_cobro,
                'nombre_pv' => $nombre_pv,
                'id_empleado' => $id_empleado,
                'name_empleado' => $name_empleado,
                'apellidos_empleado' => $apellidos_empleado,
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