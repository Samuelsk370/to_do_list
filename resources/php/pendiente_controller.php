 

<?php
// echo"jvdjvwjdvejdvjehd";
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD=BD::crearInstancia();


// print_r($_POST); descrip_pend
$id_pend = isset($_POST['id_pend'])?$_POST['id_pend']:'';
// $titulo_pend = isset($_POST['otro_tipo'])?$_POST['otro_tipo']:$_POST['titulo_pend'];
$titulo_pend ="";
if (isset($_POST['otro_tipo']) && !empty($_POST['otro_tipo'])) {
    $titulo_pend = $_POST['otro_tipo']; // Valor escrito en el input
} else if(isset($_POST['titulo_pend']) && !empty($_POST['titulo_pend'])) {
    $titulo_pend = $_POST['titulo_pend']; // Valor del select
}
$name_client = isset($_POST['name_client'])?$_POST['name_client']:'';
$numero_tel = isset($_POST['numero_tel'])?$_POST['numero_tel']:'';
$calle_refer = isset($_POST['calle_refer'])?$_POST['calle_refer']:'';
$descrip_pend = isset($_POST['descrip_pend'])?$_POST['descrip_pend']:'';
$estado_pend = isset($_POST['estado_pendiente'])?$_POST['estado_pendiente']:'';
$zona_horaria = new DateTimeZone("America/Mexico_City");
$fecha_actual = (new DateTime("now", new DateTimeZone("America/Mexico_City")))->format("Y-m-d h:i:s a");
$id_locality_fk = isset($_POST['id_locality_fk'])?$_POST['id_locality_fk']:'';
$modo="";

$action = isset($_POST['accion'])?$_POST['accion']:'';

if ($action != '') {
        switch ($action) {
                case 'Guardar':
                        $sql = "INSERT INTO tareas_pendientes (id_pend, titulo_pend, name_client, numero_tel, calle_refer, descrip_pend, estado_pend, fecha_creacion, id_locality_fk) VALUES(NULL, :titulo_pend, :name_client, :numero_tel, :calle_refer, :descrip_pend, :estado_pend, :fecha_creacion, :id_locality_fk)";
                        $consulta=$conexionBD -> prepare($sql);
                        $consulta->bindParam(':titulo_pend', $titulo_pend);
                        $consulta->bindParam(':name_client', $name_client);
                        $consulta->bindParam(':numero_tel', $numero_tel);
                        $consulta->bindParam(':calle_refer', $calle_refer);
                        $consulta->bindParam(':descrip_pend', $descrip_pend);
                        $consulta->bindParam(':estado_pend', $estado_pend);
                        $consulta->bindParam(':fecha_creacion', $fecha_actual);
                        $consulta->bindParam(':id_locality_fk', $id_locality_fk);
                        $consulta->execute();
                        // $idTareaPendiente=$conexionBD->lastInsert();
                         
                break;
                case 'Actualizar':
                        $sql = "UPDATE tareas_pendientes SET titulo_pend=:titulo_pend, name_client=:name_client, numero_tel=:numero_tel, calle_refer=:calle_refer, descrip_pend=:descrip_pend, estado_pend=:estado_pend, fecha_creacion=:fecha_creacion, id_locality_fk=:id_locality_fk WHERE id_pend=:id_pend";
                        $consulta=$conexionBD->prepare($sql);
                        $consulta->bindParam(':id_pend', $id_pend);
                        $consulta->bindParam(':titulo_pend', $titulo_pend, PDO::PARAM_STR);
                        $consulta->bindParam(':name_client', $name_client, PDO::PARAM_STR);
                        $consulta->bindParam(':numero_tel', $numero_tel, PDO::PARAM_INT);
                        $consulta->bindParam(':calle_refer', $calle_refer, PDO::PARAM_STR);
                        $consulta->bindParam(':descrip_pend', $descrip_pend, PDO::PARAM_STR);
                        $consulta->bindParam(':estado_pend', $estado_pend, PDO::PARAM_STR);
                        $consulta->bindParam(':fecha_creacion', $fecha_actual, PDO::PARAM_STR);
                        $consulta->bindParam(':id_locality_fk', $id_locality_fk, PDO::PARAM_INT);
                        $consulta->execute();
                        break;
                case 'Finalizar':
                        $sql = "UPDATE tareas_pendientes SET estado_pend=:estado_pend WHERE id_pend=:id_pend";
                        $consulta=$conexionBD->prepare($sql);
                        $consulta->bindParam(':id_pend', $id_pend);
                        $consulta->bindParam(':estado_pend', $estado_pend, PDO::PARAM_STR);
                        $consulta->execute();
                        break;
                case 'Eliminar':
                        $sql = "DELETE FROM `tareas_pendientes` WHERE `tareas_pendientes`.`id_pend` = :id_pend";
                        $consulta=$conexionBD -> prepare($sql);
                        $consulta->bindParam(':id_pend', $id_pend);
                        $consulta->execute();
                break;
                case 'Seleccionar':
                        $sql = "SELECT * FROM tareas_pendientes WHERE id_pend=:id_pend";
                        $consulta=$conexionBD -> prepare($sql);
                        $consulta->bindParam(':id_pend', $id_pend);
                        $consulta->execute();
                        $pendiente=$consulta->fetch(PDO::FETCH_ASSOC);
                        $id_pend = $pendiente['id_pend'] ;
                        $titulo_pend = $pendiente['titulo_pend'] ;
                        $name_client = $pendiente['name_client'] ;
                        $numero_tel = $pendiente['numero_tel'] ;
                        $calle_refer = $pendiente['calle_refer'] ;
                        $descrip_pend = $pendiente['descrip_pend'] ;
                        $estado_pend = $pendiente['estado_pend'] ;
                        $id_locality_fk = $pendiente['id_locality_fk'] ;
                        $modo="seleccionado";
                        
                
                        break;
                
                default:
                        # code...
                        break;
                
        }
}


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



// foreach ($listaPendientes as $clave=> $pendiente){
//         $sql = "SELECT * FROM tareas_pendientes WHERE id_pend IN (SELECT name_locality FROM localidad WHERE id_localidad=:id_locality_fk)";
//         $consulta->bindParam(':id_locality_fk', $listaPendientes['id_locality_fk']);
//         $consulta->execute();
//         $localityPendiente = $consulta->fetchAll();
//         $pendiente[$clave]['locality']=$localityPendiente;
// }

$consulta=$conexionBD->prepare("SELECT * FROM `localidad`");
$consulta->execute();
$listaLocalidades=$consulta->fetchAll();

// print_r($listaLocalidades);
// SEgun ya funciona todo e crud de LOCALIDADES Y de PENDIENTES v.5 y finall..... punto fiiiin 14-09-25
// mas fin 15-09-25      9:50

?> 