

<?php
header('Content-Type: application/json; charset=utf-8');
// Evitar que errores rompan el JSON
// error_reporting(E_ERROR | E_PARSE); 
include_once(__DIR__ . "/../../database/bd.php");
$conexionBD = BD::crearInstancia();

// CONSULTAR LOCALIDADES___________________________________________________________________
if (isset($_GET['id_pueblo'])) {
    $idPueblo = $_GET['id_pueblo'];
    $consulta = $conexionBD->prepare("SELECT * FROM `cliente_puntoventa` WHERE name_locality_fk_pv=:idPueblo");
    $consulta->bindParam(':idPueblo', $idPueblo);
    $consulta->execute();
    $listaPV = $consulta->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($listaPV);
}
// INSERTAR Y CONSULTAR CLIENTES (by ID de la Localidad)___________________________________________________________________
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
// INSERTAR Y CONSULTAR PLANES DEL CLIENTE (BY ID)_______________________________________________________________________________
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
// CONSULTAR PLANES DEL CLIENTE (BY ID)_________________________________________________________________________________________
elseif (isset($_GET['id_cliente_consul_planes'])) {

    $id_cliente_consul_planes = $_GET['id_cliente_consul_planes'];

    // 🔹 Consulta los planes
    $consulta_PlanesPV = $conexionBD->prepare("
    SELECT * FROM plan_fichas WHERE id_cliente_pv_fk = :id_cliente_pv_fk");
    $consulta_PlanesPV->bindParam(':id_cliente_pv_fk', $id_cliente_consul_planes);
    $consulta_PlanesPV->execute();
    $planestPV_List = $consulta_PlanesPV->fetchAll(PDO::FETCH_ASSOC);
    
// 🔹 Consulta los historial de fichas addes del cliente
//     $consulta_history_fichs = $conexionBD->prepare("SELECT * FROM historial_fichas_agregadas WHERE id_cliente_pv_fk = :id_cliente_pv_fk
// ");
//     $consulta_history_fichs->bindParam(':id_cliente_pv_fk', $id_cliente_consul_planes);
//     $consulta_history_fichs->execute();
//     $hist_client_fichs = $consulta_history_fichs->fetchAll(PDO::FETCH_ASSOC);

// ______________________________________________________________________________________________
    // 🔹 Combina ambos arrays en una sola respuesta
    $respuesta = [
        "planes" => $planestPV_List
    ];
// print_r($espuesta);
    // 🔹 Enviar JSON al navegador
    header('Content-Type: application/json');
    echo json_encode($respuesta);

}
// INSERTAR Y CONSULTAR FICHAS AGREGADAS Y TOTAL DE FICHAS__________________________________________________________________
elseif (isset($_GET['id_plan_select_to_add'])) {
//     ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$id_cliente_history = $_GET['id_cliente_history'];//var 0
$id_plan_select_to_add = $_GET['id_plan_select_to_add'];//var 1
$cantidad_fichas_add   = $_GET['cantidad_fichas_add'];//var 2

// CONSULTAR FICHAS DISPONIBLES ACTUALES
$consulta = $conexionBD->prepare("
    SELECT ult_cantidad_add, cantidad_total, fecha_regis_cantidad 
    FROM fichas_disponibles 
    WHERE id_plan_fk = :idDelPlan
");
$consulta->bindParam(':idDelPlan', $id_plan_select_to_add);
$consulta->execute();
$ficha = $consulta->fetch(PDO::FETCH_ASSOC);

// CALCULAR VALORES
if ($ficha) {
    // Si ya existe el registro, sumamos las fichas
    $cantidad_total = $ficha['cantidad_total'];//var 3
    $sumaTotalFichas = $cantidad_total + $cantidad_fichas_add;//var 4
} else {
    // Si no existe, será un nuevo registro
    $sumaTotalFichas = $cantidad_fichas_add;//var 4
}

$fecha_actual = (new DateTime("now", new DateTimeZone("America/Mexico_City")))//var 5
                ->format("Y-m-d h:i:s a");

if ($ficha) {
    // 🔹 ACTUALIZA registro existente
    $sql = "UPDATE fichas_disponibles 
            SET ult_cantidad_add = :ult_cantidad_add, 
                cantidad_total = :cantidad_total, 
                fecha_regis_cantidad = :fecha_regis_cantidad 
            WHERE id_plan_fk = :id_plan_fk";
    $query = $conexionBD->prepare($sql);
} else {
    // 🔹 INSERTA nuevo registro
    $sql = "INSERT INTO fichas_disponibles 
            (id_ficha_disponible, ult_cantidad_add, cantidad_total, fecha_regis_cantidad, id_plan_fk)
            VALUES (NULL, :ult_cantidad_add, :cantidad_total, :fecha_regis_cantidad, :id_plan_fk)";
    $query = $conexionBD->prepare($sql);
}

// BIND PARAMETERS (ambos casos)
$query->bindParam(':id_plan_fk', $id_plan_select_to_add, PDO::PARAM_INT);
$query->bindParam(':ult_cantidad_add', $cantidad_fichas_add, PDO::PARAM_INT);
$query->bindParam(':cantidad_total', $sumaTotalFichas, PDO::PARAM_INT);
$query->bindParam(':fecha_regis_cantidad', $fecha_actual, PDO::PARAM_STR);
$query->execute();


// INSERTAR EN EL HISTORIAL DE FICHAS AGREGADAS
$sql = "INSERT INTO historial_fichas_agregadas (id_fichs_add, last_quantity_added, register_date, id_plan_fk_history, id_client_history) VALUES(NULL, :last_quantity_added, :register_date, :id_plan_fk_history, :id_client_history)";
    $save_history_fichs_added = $conexionBD->prepare($sql);
    $save_history_fichs_added->bindParam(':last_quantity_added', $cantidad_fichas_add);
    $save_history_fichs_added->bindParam(':register_date', $fecha_actual);
    $save_history_fichs_added->bindParam(':id_plan_fk_history', $id_plan_select_to_add);
    $save_history_fichs_added->bindParam(':id_client_history', $id_cliente_history);
    $save_history_fichs_added->execute();

// CONSULTAR DATOS ACTUALIZADOS / INSERTADOS
$consulta = $conexionBD->prepare("
    SELECT cantidad_total, id_plan_fk, ult_cantidad_add, fecha_regis_cantidad
    FROM fichas_disponibles 
    WHERE id_plan_fk = :idDelPlan
");
$consulta->bindParam(':idDelPlan', $id_plan_select_to_add);
$consulta->execute();
$totalFichsdisponibles = $consulta->fetchAll(PDO::FETCH_ASSOC);

// RESPUESTA JSON
header('Content-Type: application/json');
echo json_encode(["fich_disp" => $totalFichsdisponibles]);
exit;
// $id_plan_select_to_add = $_GET['id_plan_select_to_add'];
// $cantidad_fichas_add = $_GET['cantidad_fichas_add'];

// // CONSULTAR FICHAS DISPONIBLES ACTUALES
// $consulta = $conexionBD->prepare("
//     SELECT ult_cantidad_add,cantidad_total,fecha_regis_cantidad 
//     FROM fichas_disponibles 
//     WHERE id_plan_fk = :idDelPlan
// ");
// $consulta->bindParam(':idDelPlan', $id_plan_select_to_add);
// $consulta->execute();
// $ficha = $consulta->fetch(PDO::FETCH_ASSOC);

// if ($ficha) {
//     $cantidad_total = $ficha['cantidad_total'];
//     $ult_cantidad_add = $ficha['ult_cantidad_add'];
//     $fecha_regis_cantidad = $ficha['fecha_regis_cantidad'];
// } else {
//     $cantidad_total = 0;
//     $ult_cantidad_add = 0;
//     $fecha_regis_cantidad = null;
// }

// $sumaTotalFichas = $cantidad_total + $cantidad_fichas_add;
// $fecha_actual = (new DateTime("now", new DateTimeZone("America/Mexico_City")))->format("Y-m-d h:i:s a");

// // UPDATE
// $sql = "UPDATE fichas_disponibles 
//         SET ult_cantidad_add = :ult_cantidad_add, 
//             cantidad_total = :cantidad_total, 
//             fecha_regis_cantidad = :fecha_regis_cantidad 
//         WHERE id_plan_fk = :id_plan_fk";
// $updateRow = $conexionBD->prepare($sql);
// $updateRow->bindParam(':ult_cantidad_add', $cantidad_fichas_add, PDO::PARAM_INT);
// $updateRow->bindParam(':cantidad_total', $sumaTotalFichas, PDO::PARAM_INT);
// $updateRow->bindParam(':fecha_regis_cantidad', $fecha_actual, PDO::PARAM_STR);
// $updateRow->bindParam(':id_plan_fk', $id_plan_select_to_add, PDO::PARAM_INT);
// $updateRow->execute();

// // CONSULTAR DATOS ACTUALIZADOS
// $consulta = $conexionBD->prepare("
//     SELECT cantidad_total, id_plan_fk 
//     FROM fichas_disponibles 
//     WHERE id_plan_fk = :idDelPlan
// ");
// $consulta->bindParam(':idDelPlan', $id_plan_select_to_add);
// $consulta->execute();
// $totalFichsdisponibles = $consulta->fetchAll(PDO::FETCH_ASSOC);

// // RESPUESTA JSON
// header('Content-Type: application/json');
// echo json_encode(["fich_disp" => $totalFichsdisponibles]);

}
// CONSULTAR TOTAL DE FICHAS DE CADA PLAN_______________________________________________________________________________
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
        $respuesta = $lista_ficha_disponibles[0];
    }

    // Enviar JSON
    header('Content-Type: application/json');
    echo json_encode($respuesta);


} 
elseif (isset($_GET['id_client_to_history'])) {
    $id_client_to_history = $_GET['id_client_to_history'];
    
    $consulta = $conexionBD->prepare("SELECT * FROM historial_fichas_agregadas WHERE id_client_history = :id_client_history
    ");
    $consulta->bindParam(':id_client_history', $id_client_to_history);
    $consulta->execute();

    // Obtener los resultados
    $fichsHistory = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $respuesta = [
            "hitory_fichs" => $fichsHistory
        ];

    // Enviar JSON
    header('Content-Type: application/json');
    echo json_encode($respuesta);


} else {
    $consulta = $conexionBD->prepare("SELECT * FROM `localidad`");
    $consulta->execute();
    $listaLocalidades = $consulta->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($listaLocalidades);
}



?>

