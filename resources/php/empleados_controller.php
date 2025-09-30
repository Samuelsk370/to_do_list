


<?php
// echo"jvdjvwjdvejdvjehd";
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD=BD::crearInstancia();


// print_r($_POST); 
$id_empleado = isset($_POST['id_empleado'])?$_POST['id_empleado']:'';
$name_empleado = isset($_POST['name_empleado'])?$_POST['name_empleado']:'';

$apellidos_empleado = isset($_POST['apellidos_empleado'])?$_POST['apellidos_empleado']:'';
$tipo_puesto = isset($_POST['tipo_puesto'])?$_POST['tipo_puesto']:'';
$name_user = isset($_POST['name_user'])?$_POST['name_user']:'';
$passw_user = isset($_POST['passw_user'])?$_POST['passw_user']:'';

$action = isset($_POST['accion'])?$_POST['accion']:'';
$modo ="";

if ($action != '') {
        switch ($action) {
                case 'Guardar':
                        $sql = "INSERT INTO empleados (id_empleado, name_empleado, apellidos_empleado, tipo_puesto, name_user, passw_user) VALUES(NULL, :name_empleado, :apellidos_empleado, :tipo_puesto, :name_user, :passw_user)";
                        $consulta=$conexionBD -> prepare($sql);
                        $consulta->bindParam(':name_empleado', $name_empleado);
                        $consulta->bindParam(':apellidos_empleado', $apellidos_empleado);
                        $consulta->bindParam(':tipo_puesto', $tipo_puesto);
                        $consulta->bindParam(':name_user', $name_user);
                        $consulta->bindParam(':passw_user', $passw_user);
                        $consulta->execute();
                        
                break;
                case 'Actualizar':
                        $sql = "UPDATE empleados SET name_empleado=:name_empleado, apellidos_empleado=:apellidos_empleado, tipo_puesto=:tipo_puesto, name_user=:name_user, passw_user=:passw_user WHERE id_empleado=:id_empleado";
                        $consulta=$conexionBD->prepare($sql);
                        $consulta->bindParam(':id_empleado',$id_empleado);
                        $consulta->bindParam(':name_empleado',$name_empleado);
                        $consulta->bindParam(':apellidos_empleado', $apellidos_empleado);
                        $consulta->bindParam(':tipo_puesto', $tipo_puesto);
                        $consulta->bindParam(':name_user', $name_user);
                        $consulta->bindParam(':passw_user', $passw_user);
                        $consulta->execute();
                        break;
                case 'Eliminar':
                        $sql = "DELETE FROM `empleados` WHERE `empleados`.`id_empleado` = :id_empleado";
                        $consulta=$conexionBD -> prepare($sql);
                        $consulta->bindParam(':id_empleado', $id_empleado);
                        $consulta->execute();
                break;
                case 'Seleccionar':
                        $sql = "SELECT * FROM empleados WHERE id_empleado=:id_empleado";
                        $consulta=$conexionBD -> prepare($sql);
                        $consulta->bindParam(':id_empleado', $id_empleado);
                        $consulta->execute();
                        $empleado=$consulta->fetch(PDO::FETCH_ASSOC);
                        if ($empleado) {
                            $id_empleado       = $empleado['id_empleado'];
                            $name_empleado     = $empleado['name_empleado'];
                            $apellidos_empleado= $empleado['apellidos_empleado'];
                            $tipo_puesto       = $empleado['tipo_puesto'];
                            $name_user         = $empleado['name_user'];
                            $passw_user        = $empleado['passw_user'];
                        } else {
                            // Manejo del caso cuando no se encuentra el empleado
                            echo "Empleado no encontrado.";
                            // incluso puedes inicializar variables vacías si lo necesitas
                            $id_empleado = $name_empleado = $apellidos_empleado = $tipo_puesto = $name_user = $passw_user = null;
                        }
                        // $id_empleado=$empleado['id_empleado'];
                        // $name_empleado=$empleado['name_empleado'];
                        // $apellidos_empleado=$empleado['apellidos_empleado'];
                        // $tipo_puesto=$empleado['tipo_puesto'];
                        // $name_user=$empleado['name_user'];
                        // $passw_user=$empleado['passw_user'];
                        $modo="seleccionado";
                        
                        break;
                
                default:
                        # code...
                        break;
                
        }
}


$consulta=$conexionBD->prepare("SELECT * FROM `empleados`");
$consulta->execute();
$listaEmpleados=$consulta->fetchAll();

// print_r($listaLocalidades);

?>