

<?php
// echo"jvdjvwjdvejdvjehd";
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD=BD::crearInstancia();

$tipo_pendiente ="";
if (isset($_POST['input_otro_pend']) && !empty($_POST['input_otro_pend'])) {
    $tipo_pendiente = $_POST['input_otro_pend']; // Valor escrito en el input
} else if(isset($_POST['titulo_pend']) && !empty($_POST['titulo_pend'])) {
    $tipo_pendiente = $_POST['titulo_pend']; // Valor del select
}

// print_r($_POST); 
$id_localidad = isset($_POST['id_localidad'])?$_POST['id_localidad']:'';
$name_locality = isset($_POST['name_locality'])?$_POST['name_locality']:'';
$action = isset($_POST['accion'])?$_POST['accion']:'';
$modo ="";

if ($action != '') {
        switch ($action) {
                case 'Guardar':
                        $sql = "INSERT INTO localidad (id_localidad, name_locality) VALUES(NULL, :name_locality)";
                        $consulta=$conexionBD -> prepare($sql);
                        $consulta->bindParam(':name_locality', $name_locality);
                        $consulta->execute();
                        
                break;
                case 'Actualizar':
                        $sql = "UPDATE localidad SET name_locality=:name_locality WHERE id_localidad=:id_localidad";
                        $consulta=$conexionBD->prepare($sql);
                        $consulta->bindParam(':id_localidad',$id_localidad);
                        $consulta->bindParam(':name_locality',$name_locality);
                        $consulta->execute();
                        break;
                case 'Eliminar':
                        $sql = "DELETE FROM `localidad` WHERE `localidad`.`id_localidad` = :id_localidad";
                        $consulta=$conexionBD -> prepare($sql);
                        $consulta->bindParam(':id_localidad', $id_localidad);
                        $consulta->execute();
                break;
                case 'Seleccionar':
                        $sql = "SELECT * FROM localidad WHERE id_localidad=:id_localidad";
                        $consulta=$conexionBD -> prepare($sql);
                        $consulta->bindParam(':id_localidad', $id_localidad);
                        $consulta->execute();
                        $localidad=$consulta->fetch(PDO::FETCH_ASSOC);
                        $name_locality=$localidad['name_locality'];
                        $modo="seleccionado";
                        
                        break;
                
                default:
                        # code...
                        break;
                
        }
}


$consulta=$conexionBD->prepare("SELECT * FROM `localidad`");
$consulta->execute();
$listaLocalidades=$consulta->fetchAll();

// print_r($listaLocalidades);

?>