

<?php
// echo"jvdjvwjdvejdvjehd";
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD=BD::crearInstancia();



$consulta=$conexionBD->prepare("SELECT * FROM `tareas_pendientes`");
$consulta->execute();
$listaPendientes=$consulta->fetchAll(); 

foreach ($listaPendientes as $clave => $pendiente) {
    $sql = "
SELECT t.*, l.*
FROM tareas_pendientes t
INNER JOIN localidad l ON l.id_localidad = t.id_locality_fk
WHERE t.estado_pend != 'Finalizado'
";

$consulta = $conexionBD->prepare($sql);
$consulta->execute();
$listaPendientes = $consulta->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($listaPendientes);
//     exit;
    // $listaPendientes[$clave]['locality'] = $listaPendientes;
}


// $consulta=$conexionBD->prepare("SELECT * FROM `localidad`");
// $consulta->execute();
// $listaLocalidades=$consulta->fetchAll();


?> 