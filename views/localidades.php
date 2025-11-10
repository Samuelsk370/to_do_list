 
<?php include("header.php"); ?>
<?php include("../resources/php/locality_controller.php"); ?>
 
 <!-- lista de localidades... -->
<div class="container">
        <div class="row">
                <div class="col-12">
                        <div class="row">
                                <div class="col-md-3">
                                        <form action="" method="post" id="form_localidad">
                                                <div class="card">
                                                        <div class="card-header">
                                                                Formulario de Registro
                                                        </div>
                                                        <div class="card-body">
                                                                <div hidden class="mb-3">
                                                                        <label for="" class="form-label">ID</label>
                                                                        <input
                                                                        
                                                                        type="text"
                                                                        class="form-control"
                                                                        name="id_localidad"
                                                                        id="id_localidad"
                                                                        value="<?php echo $id_localidad;?>"
                                                                        aria-describedby="helpId"
                                                                        placeholder=""
                                                                        />
                                                                        
                                                                </div>

                                                                <div class="mb-3">
                                                                        <label for="" class="form-label">Nombre</label>
                                                                        <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        name="name_locality"
                                                                        id="name_locality"
                                                                        value="<?php echo $name_locality; ?>"
                                                                        aria-describedby="helpId"
                                                                        required
                                                                        placeholder="Nombre de la localidad"/>
                                                                </div>
                                                        
                                                                <?php if ($modo === 'seleccionado'): ?>
                                                                        <button type="submit" style="display:none;" id="btn_save_town" name="accion" value="Guardar" class="btn btn-success mb-1">Guardar</button>
                                                                        <button type="button" style="display:inline;" id="btn_cancelar" onclick="formClean()" class="btn btn-secondary mb-1">Cancelar</button>
                                                                        <button type="button" style="display:inline;" id="bt_add_town" name="accion" value="add_pendiente" class="btn btn-success btn_activo mb-1" data-bs-toggle="modal" data-bs-target="#modal_localidad">Agregar tarea</button>
                                                                        <button type="submit" style="display:inline;" id="bt_update_town" name="accion" value="Actualizar" class="btn btn-primary btn_activo mb-1">Actualizar</button>
                                                                        <button type="submit" style="display:inline;" id="bt_delete_town" name="accion" value="Eliminar" class="btn btn-danger btn_activo mb-1">Eliminar</button>
                                                                        
                                                                <?php else: ?>
                                                                <button type="submit" id="btn_save_town" name="accion" value="Guardar" class="btn btn-success">Guardar</button>
                                                                        
                                                                <?php endif; ?>
                                                                
                                                        </div>
                                                </div>
                                        </form>
                                </div>

                                <div class="col-md-9">
                                        <div class="table-responsive">
                                                <table class="table" id="locality_table">
                                                        <thead>
                                                                <tr>
                                                                        <th scope="col">ID</th>
                                                                        <th scope="col">Nombre</th>
                                                                        <th scope="col">Acción</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <?php
                                                                $contadorLocalidad=1;
                                                                foreach($listaLocalidades as $locality){ ?>
                                                                <tr class="fila_localidades">
                                                                        <td scope="row"><?php echo $contadorLocalidad; ?></td>
                                                                        <td><?php echo $locality['name_locality'] ?></td>
                                                                        <td>
                                                                                <form action="" method="post">
                                                                                        <input type="hidden" name="id_localidad" id="id_localidad" value="<?php echo $locality['id_localidad'] ?>">
                                                                                        <input type="submit" class="btn btn-info" value="Seleccionar" name="accion">
                                                                                </form>
                                                                        </td>
                                                                </tr>
                                                                <?php $contadorLocalidad++; } ?>
                                                                
                                                        </tbody>
                                                </table>
                                        </div>
                                        
                                </div>
                        </div>

                        <!-- MODAL -->
                         <!-- Estructura del Modal -->
                        <div class="modal fade" id="modal_localidad" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <form action="../resources/php/pendiente_controller.php" method="post">
                                <!-- Encabezado -->
                                <div class="modal-header">
                                        <h5 class="modal-title" id="miModalLabel">Registrar tarea - "<?php echo $name_locality; ?>"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                
                                <!-- Cuerpo -->
                                <div class="modal-body px-4">
                                        
                                                <div class="mb-3">
                                                        <label for="" class="form-label">Tipo</label>
                                                        <select
                                                                class="form-select form-select-lg"
                                                                name="titulo_pend"
                                                                id="titulo_pend"
                                                        >
                                                                <option diabled selected>Seleccionar tipo</option>
                                                                <option value="Reporte Falla">Reporte Falla</option>
                                                                <option value="Instalación">Instalación</option>
                                                                <option value="Cobrar">Cobrar</option>
                                                                <option value="Otro">Otro</option>
                                                        </select>
                                                </div>
                                                

                                                
                                                <div class="mb-3">
                                                        <label for="" class="form-label">Cliente</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        name="name_client"
                                                        id="name_client"
                                                        aria-describedby="helpId"
                                                        placeholder="Nombre cliente"/>
                                                </div>
                                                <div class="mb-3">
                                                        <label for="" class="form-label">Número teléfono</label>
                                                        <input
                                                        type="number"
                                                        class="form-control"
                                                        name="numero_tel"
                                                        id="numero_tel"
                                                        aria-describedby="helpId"
                                                        placeholder="Número teléfono"/>
                                                </div>
                                                <div class="mb-3">
                                                        <label for="" class="form-label">Calle o Referencia</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        name="calle_refer"
                                                        id="calle_refer"
                                                        aria-describedby="helpId"
                                                        placeholder="Calle o referencia"/>
                                                </div>
                                                <div class="mb-3">
                                                        <label for="" class="form-label">Decripción</label>
                                                        <textarea class="form-control" name="descrip_pend" id="descrip_pend" rows="3"></textarea>
                                                </div>
                                                <div hidden class="mb-3">
                                                        <label for="" class="form-label">Localidad</label>
                                                        <input
                                                        type="input"
                                                        class="form-control"
                                                        name="id_locality_fk"
                                                        id="id_locality_fk"
                                                        aria-describedby="helpId"
                                                        value="<?php echo $id_localidad; ?>"
                                                        placeholder=""/>
                                                </div>

                                                
                                        
                                        
                                </div>
                                
                                <!-- Footer -->
                                <div class="modal-footer"><button type="submit" name="accion" value="Guardar" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        
                                </div>
                        </form>

                        </div>
                        </div>
                        </div>
                </div>
                
        </div>
</div>

<script>

  $('#locality_table').DataTable({
        language: {
            url: "../resources/js/es-MX.json"
        },
        pageLength: 5,  // número de registros por página
        lengthMenu: [5, 10, 25, 50],
    });

    $(".fila_localidades").on("click", function() {
        // alert("heywhatswrong");
});
function formClean() {
        // alert("Hola, este es un mensaje de alerta!");
  document.getElementById("btn_save_town").style.display="inline";
  document.getElementById("btn_cancelar").style.display="none";
  document.getElementById("bt_add_town").style.display="none";
  document.getElementById("bt_update_town").style.display="none";
  document.getElementById("bt_delete_town").style.display="none";
  document.getElementById("id_localidad").value="";
  document.getElementById("name_locality").value="";

}

</script>
<?php include("footer.php"); ?>