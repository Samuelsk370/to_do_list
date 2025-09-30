
        <!-- place navbar here -->
        <?php
        include("views/header.php");
        
        ?>
<?php include("./resources/php/index_controller.php"); ?>

    </header>
    <main>
  <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-2">
          <h5 class="mb-0">Lista de pendientes</h5>
          <span class="badge bg-primary fs-6">
              <?php echo count($listaPendientes); ?> Tareas
          </span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover "  id="tablaPendientes_index" class="table table-striped table-bordered" style="width:100%">
            <thead  class="table-primary">
                    <tr>
                            <th scope="col">#</th>
                            <th scope="col">localidad</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Fecha</th>
                            <!-- <th scope="col">Referencia</th> -->
                            <!-- <th scope="col">Descripción</th> -->
                            <th scope="col">Estado</th>
                            <!-- <th scope="col">Creado</th> -->
                            <!-- <th scope="col">Acción</th> -->
                    </tr>
            </thead>
            <tbody>
                    <?php  
                    $cont = 1;
                    foreach($listaPendientes as $pendientes){ ?>
                    <tr class="fila-pendiente" data-idtarea="<?php echo $pendientes['id_pend'] ?>"
                    data-titulo_pend="<?php echo $pendientes['titulo_pend'] ?>"
                    data-nombre_client="<?php echo $pendientes['name_client'] ?>"
                    data-number_phone="<?php echo $pendientes['numero_tel'] ?>"
                    data-address="<?php echo $pendientes['calle_refer'] ?>"
                    data-description="<?php echo $pendientes['descrip_pend'] ?>"
                    data-estado_pend="<?php echo $pendientes['estado_pend'] ?>"
                    data-fecha_creacted="<?php echo $pendientes['fecha_creacion'] ?>"
                    data-name_locality="<?php foreach($pendientes['locality'] as $town) {
                                    echo $town['name_locality'];
                            }?>"
                    >
                            <td style="cursor: pointer;" class="fw-bold" scope="row"><?php echo $cont ?></td>
                            <td style="cursor: pointer;"><?php
                            foreach($pendientes['locality'] as $town) {
                                    echo $town['name_locality'];
                            }
                            ?></td>
                            <td style="cursor: pointer;"><?php echo $pendientes['titulo_pend'] ?></td>
                            <td style="cursor: pointer;"><?php echo $pendientes['name_client'] ?></td>
                            <td style="cursor: pointer;"><?php echo $pendientes['fecha_creacion'] ?></td>
                            <td style="cursor: pointer;">
                                    <?php
                                    $estado = $pendientes['estado_pend'];

                                    // Definir clase según el estado
                                    switch ($estado) {
                                            case 'Urgente':
                                            $clase = 'bg-danger'; // Rojo
                                            break;
                                            case 'Pendiente':
                                            $clase = 'bg-warning'; // amarillo
                                            break;
                                            case 'En proceso':
                                            $clase = 'bg-primary'; // Azul
                                            break;
                                            case 'Finalizado':
                                            $clase = 'bg-success'; // Verde
                                            break;
                                            default:
                                            $clase = 'bg-secondary'; // Gris por defecto
                                            break;
                                    }
                                    ?>
                                    <span class="badge fw-bold text-white <?= $clase; ?>">
                                            <?php echo $pendientes['estado_pend'] ?>
                                    </span>
                            </td>
                    </tr>
                    <?php $cont++; } ?>
                    
            </tbody>
        </table>
    </div>



  </div>
</main>


<!-- Estructura del Modal -->
                        <div class="modal fade" id="modal_descrip_pendent_index" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <form action="" method="post">
                                <!-- Encabezado -->
                                <div class="modal-header">
                                        <h5 class="modal-title" id="miModalLabel">Detalle del pendiente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                
                                <!-- Cuerpo -->
                                <div class="modal-body px-4">
                                        
                                        <!-- Título del pendiente -->
                                        <div class="mb-3">
                                                <h4 class="fw-bold text-primary" id="name_locality_index"> </h4>
                                                <p class="fw-bold text-primary" id="titulo_pendiente_index"></p>
                                        
                                        </div>
                                        
                                        <!-- Cliente -->
                                        <div class="row mb-3">
                                                <div class="col-md-6">
                                                        <p class="fw-bold mb-1">Cliente:</p>
                                                        <p id="nombre_cliente_index" class="text-muted"></p>
                                                </div>
                                                <div class="col-md-6">
                                                        <p class="fw-bold mb-1">Teléfono:</p>
                                                        <p id="numero_telefono_index" class="text-muted"></p>
                                                </div>
                                        </div>
                                        
                                        <!-- Dirección -->
                                        <div class="mb-3">
                                        <p class="fw-bold mb-1">Calle / Referencia:</p>
                                        <p id="address_index" class="text-muted"></p>
                                        </div>
                                        
                                        <!-- Descripción -->
                                        <div class="mb-3">
                                        <p class="fw-bold mb-1">Descripción:</p>
                                        <p id="description_index" class="text-muted"></p>
                                        </div>
                                        
                                        <!-- Estado y Fecha -->
                                        <div class="row mb-3">
                                        <div class="col-md-6">
                                        <p class="fw-bold mb-1">Estado:</p>
                                        <span id="estado_pend_detalles_index" class="badge text-white"></span>
                                        </div>

                                        <div class="col-md-6 text-md-end">
                                        <p class="fw-bold mb-1">Fecha:</p>
                                        <p id="fecha_creacted_index" class="text-muted"></p>
                                        </div>
                                        </div>
                                        
                                </div>
                                
                                <!-- Footer -->
                                <div class="modal-footer">
                                        <!-- <button type="submit" name="accion" value="Finalizar" class="btn btn-success">Finalizar</button> -->
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        
                                </div>
                        </form>

                        </div>
                        </div>
                        </div>



<script>
    
$('#tablaPendientes_index').DataTable({
        language: {
            url: "./resources/js/es-MX.json"
        },
        pageLength: 5,  // número de registros por página
        lengthMenu: [5, 10, 25, 50],
    });

    $(".fila-pendiente").on("click", function() {
        let id = $(this).data("idtarea");
        let titulo = $(this).data("titulo_pend");
        let cliente = $(this).data("nombre_client");
        let telefono = $(this).data("number_phone");
        let address = $(this).data("address");
        let description = $(this).data("description");
        let estado_pend = $(this).data("estado_pend");
        let fecha_creacted = $(this).data("fecha_creacted");
        let name_locality = $(this).data("name_locality");


        // llenar modal automáticamente
        $("#titulo_pendiente_index").text(titulo);
        $("#nombre_cliente_index").text(cliente);
        $("#numero_telefono_index").text(telefono);
        $("#address_index").text(address);
        $("#description_index").text(description);
        $("#estado_pend_detalles_index").text(estado_pend);
// __________________________________________________________________
    let $badge = $("#estado_pend_detalles_index");
    let estado = $badge.text().trim();

    // Limpiamos clases previas (para que no se acumulen)
    $badge.removeClass("bg-danger bg-warning bg-primary bg-success bg-secondary");

    // Dependiendo del estado, aplicamos clase Bootstrap
    switch (estado) {
        case "Urgente":
            $badge.addClass("bg-danger text-white");
            break;
        case "Pendiente":
            $badge.addClass("bg-warning text-white");
            break;
        case "En proceso":
            $badge.addClass("bg-primary text-white");
            break;
        case "Finalizado":
            $badge.addClass("bg-success text-white");
            break;
        default:
            $badge.addClass("bg-secondary text-white");
            break;
    }

        $("#fecha_creacted_index").text(fecha_creacted);
        $("#name_locality_index").text(name_locality);

        // Abrir modal
        $("#modal_descrip_pendent_index").modal("show");
    });
</script>

    <?php
        include("views/footer.php");
    ?>
    