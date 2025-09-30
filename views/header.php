
<?php
$urlBase = "http://localhost/to_do_list/"; //AQUÍ EN LUGAR DE "localhost" SE DEBE COLOCAR EL SERVIDOR DONDE SE SUBIRA EL PROYECT
?>
<!doctype html>
<html lang="es">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo $urlBase;?>resources/css/style_hoverListPend.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap Icons (CDN) -->  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



<!-- Librerías para PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<!-- ______________________________________________________________________________________________________________________________ -->

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS con Bootstrap 5 -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- DataTables con Bootstrap 5 -->
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- ______________________________________________________________________________________________________________________________ -->


    <!-- Bootstrap 5 CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- DataTables CSS con Bootstrap 5 -->
<link href="../resources/css/dataTables.bootstrap5.min.css" rel="stylesheet">



<!-- DataTables JS -->
<script src="../resources/js/jquery.dataTables.min.js"></script>

<!-- DataTables con Bootstrap 5 -->
<script src="../resources/js/dataTables.bootstrap5.min.js"></script>


</head>

<body>
    <header>
        <?php 
    $current_page = basename($_SERVER['PHP_SELF']); 
?>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img width="65" height="50" src="http://localhost/to_do_list/storage/img/logoStarnet.png">
        </a>

        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" 
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" 
                aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" 
                       href="<?php echo $urlBase;?>index.php">INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'pendientes.php') ? 'active' : ''; ?>" 
                       href="<?php echo $urlBase;?>views/pendientes.php">Pendientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'localidades.php') ? 'active' : ''; ?>" 
                       href="<?php echo $urlBase;?>views/localidades.php">Localidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'empleados.php') ? 'active' : ''; ?>" 
                       href="<?php echo $urlBase;?>views/empleados.php">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'cortes_fichas.php') ? 'active' : ''; ?>" 
                       href="<?php echo $urlBase;?>views/cortes_fichas.php">Cortes_fichas</a>
                </li>
                
                <li>
                    <a class="nav-link" href="<?php echo $urlBase;?>resources/php/logout.php">Salir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $('.navbar .navbar-toggler').on('click', function(){
    $('#collapsibleNavId').removeClass('show'); 
    // alert("jejej")
  });
</script>

<br>