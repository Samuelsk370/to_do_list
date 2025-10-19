

<?php
header('Content-Type: application/json');
// include_once(__DIR__ . "/../../database/bd.php");
// $conexionBD = BD::crearInstancia();

if(isset($_FILES['pdf']) && $_FILES['pdf']['error'] === 0){
    $uploadDir = '../storage/pdf/tickets_cortes/'; // Carpeta dentro del proyecto
    if(!file_exists($uploadDir)){
        mkdir($uploadDir, 0777, true);
    }

    $fileName = 'ticket_'.time().'.pdf'; // Nombre único
    $filePath = $uploadDir . $fileName;

    if(move_uploaded_file($_FILES['pdf']['tmp_name'], $filePath)){
        echo json_encode(['success' => true, 'path' => $filePath]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se pudo mover el archivo']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No se recibió ningún archivo']);
}
