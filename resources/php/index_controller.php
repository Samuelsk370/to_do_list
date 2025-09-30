

<?php
// echo"jvdjvwjdvejdvjehd";
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD=BD::crearInstancia();



$consulta=$conexionBD->prepare("SELECT * FROM `tareas_pendientes`");
$consulta->execute();
$listaPendientes=$consulta->fetchAll(); 

foreach ($listaPendientes as $clave => $pendiente) {
    $sql = "SELECT * FROM localidad
    WHERE id_localidad IN (SELECT id_locality_fk FROM tareas_pendientes WHERE id_locality_fk = :id_locality_fk)";
    
    $consulta=$conexionBD->prepare($sql);
    $consulta->bindParam(':id_locality_fk', $pendiente['id_locality_fk']);
    $consulta->execute();
    $localityPendiente = $consulta->fetchAll();
    $listaPendientes[$clave]['locality'] = $localityPendiente;
}


// $consulta=$conexionBD->prepare("SELECT * FROM `localidad`");
// $consulta->execute();
// $listaLocalidades=$consulta->fetchAll();



?> 