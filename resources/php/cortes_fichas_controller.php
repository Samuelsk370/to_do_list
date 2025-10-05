

<?php
header('Content-Type: application/json; charset=utf-8');
// Evitar que errores rompan el JSON
// error_reporting(E_ERROR | E_PARSE); 
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD = BD::crearInstancia();

// CONSULTAR LOCALIDADES
if (isset($_GET['id_pueblo'])) {
    $idPueblo = $_GET['id_pueblo'];
    $consulta = $conexionBD->prepare("SELECT * FROM `cliente_puntoventa` WHERE name_locality_fk_pv=:idPueblo");
    $consulta->bindParam(':idPueblo', $idPueblo);
    $consulta->execute();
    $listaPV = $consulta->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($listaPV);
}
// INSERTAR Y CONSULTAR CLIENTES (by ID de la Localidad)
elseif (isset($_GET['idLocalidad_input_locality'])) {
    $idPueblo = $_GET['idLocalidad_input_locality'];
    $nombrePV = $_GET['nombrePV'];
    $sql = "INSERT INTO cliente_puntoventa (id_client_pv, name_locality_fk_pv, nombre_pv ) VALUES(NULL, :name_locality_fk_pv, :nombre_pv)";
    $save_PV = $conexionBD->prepare($sql);
    $save_PV->bindParam(':name_locality_fk_pv', $idPueblo);
    $save_PV->bindParam(':nombre_pv', $nombrePV);
    $save_PV->execute();

    $consulta_clientePV = $conexionBD->prepare("SELECT * FROM `cliente_puntoventa` WHERE name_locality_fk_pv=:idPueblo");
    $consulta_clientePV->bindParam(':idPueblo', $idPueblo);
    $consulta_clientePV->execute();
    $clientPV_List = $consulta_clientePV->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($clientPV_List);
}
// INSERTAR Y CONSULTAR PLANES DEL CLIENTE (BY ID)
elseif (isset($_GET['idClientCorte'])) {
    $idClienteCorte = $_GET['idClientCorte'];
    $nombrePlan_pv = $_GET['nombrePlan_pv'];
    $precioPlan_pv = $_GET['precioPlan_pv'];

    $sql = "INSERT INTO plan_fichas (id_plan_ficha, nombre_plan, precio_plan, id_cliente_pv_fk ) VALUES(NULL, :nombre_plan, :precio_plan, :id_cliente_pv_fk)";
    $save_PV = $conexionBD->prepare($sql);
    $save_PV->bindParam(':nombre_plan', $nombrePlan_pv);
    $save_PV->bindParam(':precio_plan', $precioPlan_pv);
    $save_PV->bindParam(':id_cliente_pv_fk', $idClienteCorte);
    $save_PV->execute();

    $consulta_PlanesPV = $conexionBD->prepare("SELECT * FROM `plan_fichas` WHERE id_cliente_pv_fk=:id_cliente_pv_fk");
    $consulta_PlanesPV->bindParam(':id_cliente_pv_fk', $idClienteCorte);
    $consulta_PlanesPV->execute();
    $planestPV_List = $consulta_PlanesPV->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($planestPV_List);
}
// CONSULTAR PLANES DEL CLIENTE (BY ID)
elseif (isset($_GET['id_cliente_consul_planes'])) {

    $id_cliente_consul_planes = $_GET['id_cliente_consul_planes'];

    // 🔹 Consulta los planes
    $consulta_PlanesPV = $conexionBD->prepare("
    SELECT * FROM plan_fichas WHERE id_cliente_pv_fk = :id_cliente_pv_fk
");
    $consulta_PlanesPV->bindParam(':id_cliente_pv_fk', $id_cliente_consul_planes);
    $consulta_PlanesPV->execute();
    $planestPV_List = $consulta_PlanesPV->fetchAll(PDO::FETCH_ASSOC);

    // ⚠️ Ojo: fetchAll devuelve un array de arrays
    // Si quieres obtener fichas del primer plan:
//     // $id_del_plan = $planestPV_List['id_plan_ficha'];
// $ide=6;
//     // 🔹 Consulta las fichas disponibles
//     $consult_fichas_total = $conexionBD->prepare("
//     SELECT cantidad_total FROM fichas_disponibles WHERE id_plan_fk = :id_plan_fk
// ");
//     $consult_fichas_total->bindParam(':id_plan_fk',$ide);
//     $consult_fichas_total->execute();
//     $fichas_disponible = $consult_fichas_total->fetchAll(PDO::FETCH_ASSOC);

    // 🔹 Combina ambos arrays en una sola respuesta
    $respuesta = [
        "planes" => $planestPV_List
    ];
// print_r($espuesta);
    // 🔹 Enviar JSON al navegador
    header('Content-Type: application/json');
    echo json_encode($respuesta);



    //     $id_cliente_consul_planes=$_GET['id_cliente_consul_planes'];
    //     $consulta_PlanesPV=$conexionBD->prepare("SELECT * FROM `plan_fichas` WHERE id_cliente_pv_fk=:id_cliente_pv_fk");
    //     $consulta_PlanesPV->bindParam(':id_cliente_pv_fk', $id_cliente_consul_planes);
    //     $consulta_PlanesPV->execute();
    //     $planestPV_List=$consulta_PlanesPV->fetchAll(PDO::FETCH_ASSOC);
    //     // $id_del_plan = $planestPV_List['id_plan_ficha'];

    //     // $consult_fichas_total=$conexionBD->prepare("SELECT * FROM `fichas_disponibles` WHERE id_plan_fk=:id_plan_fk");
    //     // $consult_fichas_total->bindParam(':id_plan_fk', $id_del_plan);
    //     // $consult_fichas_total->execute();
    //     // $fichas_disponible =$consult_fichas_total->fetchAll(PDO::FETCH_ASSOC);
    //     // $totalFichasDisponible = $fichas_disponible['id_plan_ficha'];

    // // $planestPV_List['nuevo_valor'] = $totalFichasDisponible;



    //     header('Content-Type: application/json');
    //     echo json_encode($planestPV_List);
}
// INSERTAR Y CONSULTAR FICHAS AGREGADAS Y TOTAL DE FICHAS
elseif (isset($_GET['id_plan_select_to_add'])) {
    $id_plan_select_to_add = $_GET['id_plan_select_to_add'];
    $cantidad_fichas_add = $_GET['cantidad_fichas_add'];

    $consul_ult_total_fichas = "SELECT COALESCE(cantidad_total FROM fichas_disponibles ORDER BY id DESC LIMIT 1), '0') AS ultimo_valor";


    $sql = "INSERT INTO plan_fichas (id_plan_ficha, nombre_plan, precio_plan, id_cliente_pv_fk ) VALUES(NULL, :nombre_plan, :precio_plan, :id_cliente_pv_fk)";
    $save_PV = $conexionBD->prepare($sql);
    $save_PV->bindParam(':nombre_plan', $nombrePlan_pv);
    $save_PV->bindParam(':precio_plan', $precioPlan_pv);
    $save_PV->bindParam(':id_cliente_pv_fk', $idClienteCorte);
    $save_PV->execute();

    $consulta_PlanesPV = $conexionBD->prepare("SELECT * FROM `plan_fichas` WHERE id_cliente_pv_fk=:id_cliente_pv_fk");
    $consulta_PlanesPV->bindParam(':id_cliente_pv_fk', $idClienteCorte);
    $consulta_PlanesPV->execute();
    $planestPV_List = $consulta_PlanesPV->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($planestPV_List);
}
// CONSULTAR TOTAL DE FICHAS DE CADA PLAN
elseif (isset($_GET['idDelPlan'])) {
    $idDelPlan = $_GET['idDelPlan'];
    
    $consulta = $conexionBD->prepare("
        SELECT cantidad_total 
        FROM fichas_disponibles 
        WHERE id_plan_fk = :idDelPlan
    ");
    $consulta->bindParam(':idDelPlan', $idDelPlan);
    $consulta->execute();

    // Obtener los resultados
    $lista_ficha_disponibles = $consulta->fetchAll(PDO::FETCH_ASSOC);

    // 🔹 Si no se encontró nada, devolvemos un valor 0
    if (empty($lista_ficha_disponibles)) {
        $respuesta = [
            "cantidad_total" => 0
        ];
    } else {
        // Si sí hay resultados, devolvemos el valor encontrado
        // Si esperas un solo resultado:
        $respuesta = $lista_ficha_disponibles[0];
    }

    // Enviar JSON
    header('Content-Type: application/json');
    echo json_encode($respuesta);

    // $consulta = $conexionBD->prepare("SELECT cantidad_total FROM `fichas_disponibles` WHERE id_plan_fk=:idDelPlan");
    // $consulta->bindParam(':idDelPlan', $idDelPlan);
    // $consulta->execute();
    // $lista_ficha_disponibles = $consulta->fetchAll();
    // header('Content-Type: application/json');
    // echo json_encode($lista_ficha_disponibles);




}  else {
    $consulta = $conexionBD->prepare("SELECT * FROM `localidad`");
    $consulta->execute();
    $listaLocalidades = $consulta->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($listaLocalidades);
}



?>

