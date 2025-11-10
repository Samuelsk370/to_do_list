

 
<?php include("header.php"); ?>
<?php include("../resources/php/pendiente_controller.php"); ?>

 <!-- lista de pendientes... -->
<div class="container">
        <div class="row">
                <div class="col-12">
                        <div class="row">
                                <div class="col-md-3">
                                        <form action="" method="post">
                                                <div class="card">
                                                        <div class="card-header"> Formulario de Registro </div>
                                                        <div class="card-body">
                                                                <div hidden class="mb-3">
                                                                        <label for="" class="form-label">ID</label>
                                                                        <input
                                                                        
                                                                        type="text"
                                                                        class="form-control"
                                                                        name="id_pend"
                                                                        id="id_pend"
                                                                        value="<?php echo $id_pend;?>"
                                                                        aria-describedby="helpId"
                                                                        placeholder=""
                                                                        />
                                                                        
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="" class="form-label">Localidad</label>
                                                                        <select class="form-select form-select-lg"
                                                                                name="id_locality_fk"
                                                                                id="id_locality_fk" required>
                                                                                <option disabled selected>Seleciona localidad</option>
                                                                                <?php foreach($listaLocalidades as $locality){ ?>
                                                                                <option <?php echo($id_locality_fk == $locality['id_localidad'])?"selected":""; ?> value="<?php echo $locality['id_localidad']; ?>"><?php echo $locality['name_locality']; ?></option>
                                                                                <?php } ?>
                                                                        </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                        <label for="" class="form-label">Tipo</label>
                                                                        <select
                                                                                class="form-select form-select-lg"
                                                                                name="titulo_pend"
                                                                                id="titulo_pend" required
                                                                        >
                                                                                <option disabled selected>Seleccionar tipo</option>
                                                                                <option <?php echo($titulo_pend == 'Reporte Falla')?"selected":""; ?> value="Reporte Falla">Reporte Falla</option>
                                                                                <option <?php echo($titulo_pend == 'Instalación')?"selected":""; ?> value="Instalación">Instalación</option>
                                                                                <option <?php echo($titulo_pend == 'Cobrar')?"selected":""; ?> value="Cobrar">Cobrar</option>
                                                                                <option <?php echo($titulo_pend == 'Otro')?"selected":""; ?> value="Otro">Otro</option>
                                                                        </select>
                                                                </div>
                                                                <!-- Campo oculto por defecto -->
                                                                <div class="mb-3" id="otro_input" style="display: none;">
                                                                        <input type="text" class="form-control" name="otro_tipo" id="otro_tipo" placeholder="Espicificar tipo">
                                                                </div>

                                                                
                                                                <div class="mb-3">
                                                                        <label for="" class="form-label">Cliente</label>
                                                                        <input
                                                                        type="text"
                                                                       class="form-control"
                                                                        name="name_client"
                                                                        id="name_client"
                                                                        value="<?php echo $name_client; ?>"
                                                                        aria-describedby="helpId"
                                                                        placeholder="Nombre cliente" required/>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="" class="form-label">Número teléfono</label>
                                                                        <input
                                                                        type="number"
                                                                        class="form-control"
                                                                        name="numero_tel"
                                                                        id="numero_tel"
                                                                        value="<?php echo $numero_tel; ?>"
                                                                        aria-describedby="helpId"
                                                                        placeholder="Número teléfono" required/>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="" class="form-label">Calle o Referencia</label>
                                                                        <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        name="calle_refer"
                                                                        id="calle_refer"
                                                                        value="<?php echo $calle_refer; ?>"
                                                                        aria-describedby="helpId"
                                                                        placeholder="Calle o referencia" required/>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="" class="form-label">Decripción</label>
                                                                        <textarea class="form-control" name="descrip_pend" id="descrip_pend" value="" rows="3"><?php echo $descrip_pend; ?></textarea>
                                                                </div>
                                                                <div class="mb-5 px-1 py-1 rounded">
                                                                        <label for="" class="form-label">Estado:</label>
                                                                        <div class="mb-3">
                                                                                <input <?php echo($estado_pend == 'Urgente')?"checked":""; ?> class="form-check-input" type="radio" name="estado_pendiente" id="estado_urgente" value="Urgente">
                                                                                <label class="form-check-label" for="estado_urgente"><span class="badge bg-danger text-white">Urgente</span></label>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                                <input <?php echo($estado_pend == 'Pendiente')?"checked":""; ?> class="form-check-input" type="radio" name="estado_pendiente" id="estado_pend" value="Pendiente">
                                                                                <label class="form-check-label" for="estado_pend"><span class="badge bg-warning text-white">Pendiente</span></label>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                                <input <?php echo($estado_pend == 'En proceso')?"checked":""; ?> class=" form-check-input" type="radio" name="estado_pendiente" id="estado_proceso" value="En proceso">
                                                                                <label class=" form-check-label" for="estado_proceso"><span class="badge bg-primary text-white">En proceso</span></label>

                                                                        </div>
                                                                        <div class="">
                                                                                <input <?php echo($estado_pend == 'Finalizado')?"checked":""; ?> class=" form-check-input" type="radio" name="estado_pendiente" id="estado_finalizado" value="Finalizado">
                                                                                <label class=" form-check-label" for="estado_finalizado"><span class="badge bg-success text-white">Finalizado</span></label> <br>
                                                                        
                                                                        </div>
                                                                      
                                                                </div>

                                                        </div>
                                                        <!-- Footer -->
                                                        <div class="card-footer">
                                                                
                                                                <?php if ($modo === 'seleccionado'): ?>
                                                                        <button type="submit" style="display:none;" id="btn_save_town_" name="accion" value="Guardar" class="btn btn-success m-1">Guardar</button>
                                                                        <button type="button" style="display:inline;" id="btn_cancelar_" onclick="formCleaned()" class="btn btn-secondary mb-1">Cancelar</button>
                                                                        <button type="submit" style="display:inline;" id="bt_update_town_" name="accion" value="Actualizar" class="btn btn-primary btn_activo mb-1">Guardar cambios</button>
                                                                        <button type="submit" style="display:inline;" id="bt_delete_town_" name="accion" value="Eliminar" class="btn btn-danger btn_activo mb-1">Eliminar</button>
                                                                        
                                                                 <?php else: ?>
                                                                <button type="submit" id="btn_save_town_" name="accion" value="Guardar" class="btn btn-primary">Guardar</button>
                                                                        
                                                                <?php endif; ?> 
                                                                
                                                        </div>
                                                 </div>
                                        </form>
                                </div>

                                <div class="col-md-9">
                                        <div class="table-responsive">
                                                <table class="table table-hover "  id="tablaPendientes" class="table table-striped table-bordered" style="width:100%">
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
                                                                        <th scope="col">Acción</th>
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
                                                                        <td>
                                                                                <form action="" method="post">
                                                                                        <input type="hidden" name="id_pend" id="id_pend" value="<?php echo $pendientes['id_pend'] ?>">
                                                                                        <input type="submit" class="btn btn-info" value="Seleccionar" name="accion">
                                                                                </form>
                                                                        </td>
                                                                </tr>
                                                                <?php $cont++; } ?>
                                                                
                                                        </tbody>
                                                </table>
                                        </div>
                                        
                                </div>
                        </div>
                </div>
                
        </div>
</div>


<!-- MODAL -->
                         <!-- Estructura del Modal -->
                        <div class="modal fade" id="modal_descrip_pendent" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
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
                                                <h4 class="fw-bold text-primary" id="name_locality"> </h4>
                                                <p class="fw-bold text-primary" id="titulo_pendiente"></p>
                                        
                                        </div>
                                        
                                        <!-- Cliente -->
                                        <div class="row mb-3">
                                                <div class="col-md-6">
                                                        <p class="fw-bold mb-1">Cliente:</p>
                                                        <p id="nombre_cliente" class="text-muted"></p>
                                                </div>
                                                <div class="col-md-6">
                                                        <p class="fw-bold mb-1">Teléfono:</p>
                                                        <p id="numero_telefono" class="text-muted"></p>
                                                </div>
                                        </div>
                                        
                                        <!-- Dirección -->
                                        <div class="mb-3">
                                        <p class="fw-bold mb-1">Calle / Referencia:</p>
                                        <p id="address" class="text-muted"></p>
                                        </div>
                                        
                                        <!-- Descripción -->
                                        <div class="mb-3">
                                        <p class="fw-bold mb-1">Descripción:</p>
                                        <p id="description" class="text-muted"></p>
                                        </div>
                                        
                                        <!-- Estado y Fecha -->
                                        <div class="row mb-3">
                                        <div class="col-md-6">
                                        <p class="fw-bold mb-1">Estado:</p>
                                        <span id="estado_pend_detalles" class="badge text-white"></span>
                                        </div>

                                        <div class="col-md-6 text-md-end">
                                        <p class="fw-bold mb-1">Fecha:</p>
                                        <p id="fecha_creacted" class="text-muted"></p>
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
function formCleaned() {
        // alert("Hola, redicetionando!");
        // window.location.href = "pendientes.php";
        //      alert("Hola, este es un mensaje de alerta!");
//      OCULTAR BOTONES
  document.getElementById("btn_save_town_").style.display="inline";
  document.getElementById("btn_cancelar_").style.display="none";
  document.getElementById("bt_update_town_").style.display="none";
  document.getElementById("bt_delete_town_").style.display="none";
//      LIMPIAR CAMPOS
  document.getElementById("id_pend").value="";
  
  document.getElementById("id_locality_fk").value="";
  document.getElementById("titulo_pend").value="";
  document.getElementById("otro_input").value="";
  document.getElementById("name_client").value="";
  document.getElementById("numero_tel").value="";
  document.getElementById("calle_refer").value="";
  document.getElementById("descrip_pend").value="";
  document.getElementById("estado_urgente").checked=false;
  document.getElementById("estado_pend").checked=false;
  document.getElementById("estado_proceso").checked=false;
  document.getElementById("estado_finalizado").checked=false;

}

$('#tablaPendientes').DataTable({
        language: {
            url: "../resources/js/es-MX.json"
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
        $("#titulo_pendiente").text(titulo);
        $("#nombre_cliente").text(cliente);
        $("#numero_telefono").text(telefono);
        $("#address").text(address);
        $("#description").text(description);
        $("#estado_pend_detalles").text(estado_pend);
// __________________________________________________________________
    let $badge = $("#estado_pend_detalles");
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

        $("#fecha_creacted").text(fecha_creacted);
        $("#name_locality").text(name_locality);

        // Abrir modal
        $("#modal_descrip_pendent").modal("show");
    });

    // MOSTRAR INPUT AL SELECCIONAR OPCION "OTRO"
    $("#titulo_pend").on("change", function () {
    let otroInput = $("#otro_input");
    if ($(this).val() === "Otro") {
        otroInput.show();   // equivalente a style.display = "block"
    } else {
        otroInput.hide();   // equivalente a style.display = "none"
    }
});

</script>
<?php include("footer.php"); ?>