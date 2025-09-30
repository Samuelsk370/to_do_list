

<?php
header('Content-Type: application/json; charset=utf-8');
// Evitar que errores rompan el JSON
// error_reporting(E_ERROR | E_PARSE); 
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD=BD::crearInstancia();

// CONSULTAR LOCALIDADES
if (isset($_GET['id_pueblo'])) {
    $idPueblo=$_GET['id_pueblo'];
    $consulta=$conexionBD->prepare("SELECT * FROM `cliente_puntoventa` WHERE name_locality_fk_pv=:idPueblo");
    $consulta->bindParam(':idPueblo', $idPueblo);
    $consulta->execute();
    $listaPV=$consulta->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($listaPV);

} 
// INSERTAR Y CONSULTAR CLIENTES (by ID de la Localidad)
elseif (isset($_GET['idLocalidad_input_locality'])) {
    $idPueblo=$_GET['idLocalidad_input_locality'];
    $nombrePV=$_GET['nombrePV'];
    $sql = "INSERT INTO cliente_puntoventa (id_client_pv, name_locality_fk_pv, nombre_pv ) VALUES(NULL, :name_locality_fk_pv, :nombre_pv)";
    $save_PV=$conexionBD -> prepare($sql);
    $save_PV->bindParam(':name_locality_fk_pv', $idPueblo);
    $save_PV->bindParam(':nombre_pv', $nombrePV);
    $save_PV->execute();
    
    $consulta_clientePV=$conexionBD->prepare("SELECT * FROM `cliente_puntoventa` WHERE name_locality_fk_pv=:idPueblo");
    $consulta_clientePV->bindParam(':idPueblo', $idPueblo);
    $consulta_clientePV->execute();
    $clientPV_List=$consulta_clientePV->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($clientPV_List);
} 
// INSERTAR Y CONSULTAR PLANES DEL CLIENTE (BY ID)
elseif (isset($_GET['idClientCorte'])) {
    $idClienteCorte=$_GET['idClientCorte'];
    $nombrePlan_pv=$_GET['nombrePlan_pv'];
    $precioPlan_pv=$_GET['precioPlan_pv'];
    
    $sql = "INSERT INTO plan_fichas (id_plan_ficha, nombre_plan, precio_plan, id_cliente_pv_fk ) VALUES(NULL, :nombre_plan, :precio_plan, :id_cliente_pv_fk)";
    $save_PV=$conexionBD -> prepare($sql);
    $save_PV->bindParam(':nombre_plan', $nombrePlan_pv);
    $save_PV->bindParam(':precio_plan', $precioPlan_pv);
    $save_PV->bindParam(':id_cliente_pv_fk', $idClienteCorte);
    $save_PV->execute();
    
    $consulta_PlanesPV=$conexionBD->prepare("SELECT * FROM `plan_fichas` WHERE id_cliente_pv_fk=:id_cliente_pv_fk");
    $consulta_PlanesPV->bindParam(':id_cliente_pv_fk', $idClienteCorte);
    $consulta_PlanesPV->execute();
    $planestPV_List=$consulta_PlanesPV->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($planestPV_List);
}
// CONSULTAR PLANES DEL CLIENTE (BY ID)
elseif (isset($_GET['id_cliente_consul_planes'])) {
    $id_cliente_consul_planes=$_GET['id_cliente_consul_planes'];
    $consulta_PlanesPV=$conexionBD->prepare("SELECT * FROM `plan_fichas` WHERE id_cliente_pv_fk=:id_cliente_pv_fk");
    $consulta_PlanesPV->bindParam(':id_cliente_pv_fk', $id_cliente_consul_planes);
    $consulta_PlanesPV->execute();
    $planestPV_List=$consulta_PlanesPV->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($planestPV_List);
}

else{
    $consulta=$conexionBD->prepare("SELECT * FROM `localidad`");
    $consulta->execute();
    $listaLocalidades=$consulta->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($listaLocalidades);

}



?>

