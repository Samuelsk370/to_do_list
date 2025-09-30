

<?php
header('Content-Type: application/json; charset=utf-8');
// Evitar que errores rompan el JSON
error_reporting(E_ERROR | E_PARSE); 
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD=BD::crearInstancia();

if (isset($_GET['id_pueblo'])) {
    $idPueblo=$_GET['id_pueblo'];
    $consulta=$conexionBD->prepare("SELECT * FROM `cliente_puntoventa` WHERE name_locality_fk_pv=:idPueblo");
    $consulta->bindParam(':idPueblo', $idPueblo);
    $consulta->execute();
    $listaPV=$consulta->fetchAll();
    // Retornar JSON
    header('Content-Type: application/json');
    echo json_encode($listaPV);

} 

// if (isset($_POST['id_localidad'])) {
//     $id_localidad = $_POST['id_localidad'];
//     $consulta=$conexionBD->prepare("SELECT * FROM `cliente_puntoventa` WHERE name_locality_fk_pv=:id_localidad");
//     $consulta->bindParam(':id_localidad', $id_localidad);
//     $consulta->execute();
//     $listaClientesPV=$consulta->fetchAll();
//     // Retornar JSON
//     header('Content-Type: application/json');
//     echo json_encode($listaClientesPV);
// } 


// $consulta=$conexionBD->prepare("SELECT * FROM `localidad`");
// $consulta->execute();
// $listaLocalidades=$consulta->fetchAll();
// // Retornar JSON
// header('Content-Type: application/json');
// echo json_encode($listaLocalidades);





// Recuperar valor del POST
// $id_localidad = $_POST['id_localidad'] ?? null;

// if ($id_localidad) {
//     $consulta = $conexionBD->prepare("SELECT * FROM cliente_puntoventa WHERE name_locality_fk_pv = :id_localidad");
//     $consulta->bindParam(":id_localidad", $id_localidad);
//     $consulta->execute();
//     $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

// foreach ($resultado as $clave => $clientPV) {
//     $sql = "SELECT * FROM localidad
//     WHERE id_localidad IN (SELECT name_locality_fk_pv FROM cliente_puntoventa WHERE name_locality_fk_pv = :name_locality_fk_pv)";
    
//     $consulta=$conexionBD->prepare($sql);
//     $consulta->bindParam(':name_locality_fk_pv', $clientPV['name_locality_fk_pv']);
//     $consulta->execute();
//     $localityPuntoVenta = $consulta->fetchAll();
//     $resultado[$clave]['locality'] = $localityPuntoVenta;
// }
//     header('Content-Type: application/json');
//     echo json_encode($resultado);
// } else {
//     echo json_encode(["error" => "Falta id_localidad"]);
// }

?>

