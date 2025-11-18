
<?php
session_start();
$urlBase = "http://localhost/to_do_list/"; //AQUÍ EN LUGAR DE "localhost" SE DEBE COLOCAR EL SERVIDOR DONDE SE SUBIRA EL PROYECT

include_once("../database/bd.php");
$conexionBD = BD::crearInstancia();
// __DIR__
if ($_POST) {
     $mensaje = "Usuario o contraseña incorrecto";

     $nickName = (isset($_POST['user_login'])?$_POST['user_login']:"");
     $passWord = (isset($_POST['Passw_login'])?$_POST['Passw_login']:"");

    $consultaLogin = $conexionBD->prepare("SELECT * FROM empleados WHERE name_user = :name_user && passw_user = :passw_user");
    $consultaLogin->bindParam(':name_user', $nickName);
    $consultaLogin->bindParam(':passw_user', $passWord);
    $consultaLogin->execute();
    $rowlogin = $consultaLogin->fetch(PDO::FETCH_ASSOC);
    

    if ($rowlogin) {
        $id_empleado = $rowlogin['id_empleado'];
        $name_empleado = $rowlogin['name_empleado'];
        $apellidos = $rowlogin['apellidos_empleado'];
        $tipo_puesto = $rowlogin['tipo_puesto'];

        $_SESSION["id_empleado_logued"]=$id_empleado;
        $_SESSION["user_login"]=$_POST["user_login"];
        $_SESSION["fullNameEmpleado"]=$name_empleado.' '.$apellidos;
        $_SESSION["tipoPuestoEmpleado"]=$tipo_puesto;
        echo"<script type='text/javascript'>
            window.location.href = '{$urlBase}index.php';
        </script>";
        die();
        // header('Location:../index.php');
    }
}
?>
<!doctype html>
<html lang="es">

<head>
    <title>Iniciar Sesión</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="../storage/img/ico_starnet.ico">
    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />


</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <di class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                </div>
                <div class="col-12 col-md-4 mx-4">
                    <form action="#" method="post">

                        <div class="card">
                            <div class="card-header">Iniciar sesión</div>
                                <div class="card-body">
                                    <?php 
                                        if(isset($mensaje)){?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong><?php echo $mensaje; ?></strong>
                                        </div>
                                    <?php } ?>
                                    
                                    
                                <div class="mb-3">
                                    <label for="" class="form-label">Usuario</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="user_login"
                                        id="user_login"
                                        aria-describedby="helpId"
                                        placeholder="Usuario"
                                    />
                                    <small id="helpId" class="form-text text-muted">Ingresar usuario</small>
                                
                                
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Contraseña</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="Passw_login"
                                        id="Passw_login"
                                        aria-describedby="helpId"
                                        placeholder="Contraseña"
                                    />
                                    <small id="helpId" class="form-text text-muted">Ingresar contraseña</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </di>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>