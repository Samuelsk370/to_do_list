

<?php include("header.php"); ?>
<?php include("../resources/php/empleados_controller.php"); ?>
 
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
                                                                        name="id_empleado"
                                                                        id="id_empleado"
                                                                        value="<?php echo $id_empleado;?>"
                                                                        aria-describedby="helpId"
                                                                        placeholder=""
                                                                        />
                                                                        
                                                                </div>

                                                                <div class="mb-3">
                                                                        <label for="" class="form-label">Nombre</label>
                                                                        <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        name="name_empleado"
                                                                        id="name_empleado"
                                                                        value="<?php echo $name_empleado; ?>"
                                                                        aria-describedby="helpId"
                                                                        required
                                                                        placeholder="Nombre del empleado"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="" class="form-label">Apellidos</label>
                                                                        <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        name="apellidos_empleado"
                                                                        id="apellidos_empleado"
                                                                        value="<?php echo $apellidos_empleado; ?>"
                                                                        aria-describedby="helpId"
                                                                        required
                                                                        placeholder="Apellido completo"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Puesto</label>
                                                                    <select
                                                                            class="form-select form-select-lg"
                                                                            name="tipo_puesto"
                                                                            id="tipo_puesto" required
                                                                    >

                                                                            <option disabled selected>Seleccionar puesto</option>
                                                                            <option <?php echo($tipo_puesto == 'Lider')?"selected":""; ?> value="Lider">Lider</option>
                                                                            <option <?php echo($tipo_puesto == 'Gerente de Cobranza')?"selected":""; ?> value="Gerente de Cobranza">Gerente de Cobranza</option>
                                                                            <option <?php echo($tipo_puesto == 'Técnico')?"selected":""; ?> value="Técnico">Técnico</option>
                                                                            <option <?php echo($tipo_puesto == 'Administración')?"selected":""; ?> value="Administración">Administración</option>
                                                                            <option <?php echo($tipo_puesto == 'Otro')?"selected":""; ?> value="Otro">Otro</option>
                                                                    </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                        <label for="" class="form-label">Nombre de usuario</label>
                                                                        <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        name="name_user"
                                                                        id="name_user"
                                                                        value="<?php echo $name_user; ?>"
                                                                        aria-describedby="helpId"
                                                                        required
                                                                        placeholder="Para iniciar sesión"/>
                                                                </div>
                                                        
                                                                <div class="mb-3">
                                                                    <label for="passw_user" class="form-label">Contraseña</label>
                                                                    <div class="input-group">
                                                                        <input
                                                                        type="password"
                                                                        class="form-control"
                                                                        name="passw_user"
                                                                        id="passw_user"
                                                                        value="<?php echo $passw_user; ?>"
                                                                        required
                                                                        placeholder="Para iniciar sesión"
                                                                        />
                                                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                                        <i class="bi bi-eye"></i> <!-- Bootstrap Icons -->
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <?php if ($modo === 'seleccionado'): ?>
                                                                        <button type="submit" style="display:none;" id="btn_save_town_empl" name="accion" value="Guardar" class="btn btn-success m-1">Guardar</button>
                                                                        <button type="button" style="display:inline;" id="btnCancelarEmpleados" onclick="btnCancelarEmpleadoss()" class="btn btn-secondary m-1">Cancelar</button>
                                                                        <button type="submit" style="display:inline;" id="bt_update_town_empl" name="accion" value="Actualizar" class="btn btn-primary btn_activo m-1">Actualizar</button>
                                                                        <button type="submit" style="display:inline;" id="bt_delete_town_empl" name="accion" value="Eliminar" class="btn btn-danger btn_activo m-1">Eliminar</button>
                                                                        
                                                                <?php else: ?>
                                                                <button type="submit" id="btn_save_town_empl" name="accion" value="Guardar" class="btn btn-success">Guardar</button>
                                                                        
                                                                <?php endif; ?>
                                                                
                                                        </div>
                                                </div>
                                        </form>
                                </div>

                                <div class="col-md-9">
                                        <div class="table-responsive">
                                                <table class="table" id="table_employs">
                                                        <thead>
                                                                <tr>
                                                                        <th scope="col">No.</th>
                                                                        <th scope="col">Nombre</th>
                                                                        <th scope="col">Apellidos</th>
                                                                        <th scope="col">Puesto</th>
                                                                        <th scope="col">Usuario</th>
                                                                        <th scope="col">Contraseña</th>
                                                                        <th scope="col">Acción</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <?php 
                                                                $container=1;
                                                                foreach($listaEmpleados as $empleado){ ?>
                                                                <tr class="">
                                                                        <td scope="row"><?php echo $container; ?></td>
                                                                        <td><?php echo $empleado['name_empleado'] ?></td>
                                                                        <td><?php echo $empleado['apellidos_empleado'] ?></td>
                                                                        <td><?php echo $empleado['tipo_puesto'] ?></td>
                                                                        <td><?php echo $empleado['name_user'] ?></td>
                                                                        <td><?php echo $empleado['passw_user'] ?></td>
                                                                        <td>
                                                                                <form action="" method="post">
                                                                                        <input type="hidden" name="id_empleado" id="id_empleado" value="<?php echo $empleado['id_empleado'] ?>">
                                                                                        <input type="submit" class="btn btn-info" value="Seleccionar" name="accion">
                                                                                </form>
                                                                        </td>
                                                                </tr>
                                                                <?php $container++; } ?>
                                                                
                                                        </tbody>
                                                </table>
                                        </div>
                                        
                                </div>
                        </div>

                        <!-- MODAL -->
                         <!-- Estructura del Modal -->
                        
                </div>
                
        </div>
</div>

<script>
        $('#table_employs').DataTable({
        language: {
            url: "../resources/js/es-MX.json"
        },
        pageLength: 5,  // número de registros por página
        lengthMenu: [5, 10, 25, 50],
    });

    $(".btnAbrirModal").click(function(){
        $("#modal_descrip_pendent").modal("show");  // abrir modal
    });
function btnCancelarEmpleadoss() {
        // alert("Hola, este es un mensaje de alerta!");
  document.getElementById("btn_save_town_empl").style.display="inline";
  document.getElementById("btnCancelarEmpleados").style.display="none";
  document.getElementById("bt_update_town_empl").style.display="none";
  document.getElementById("bt_delete_town_empl").style.display="none";
  document.getElementById("id_empleado").value="";
  document.getElementById("name_empleado").value="";
  document.getElementById("apellidos_empleado").value="";
  document.getElementById("tipo_puesto").value="";
  document.getElementById("name_user").value="";
  document.getElementById("passw_user").value="";

}
const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("passw_user");

  togglePassword.addEventListener("click", function () {
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);

    // Cambiar el ícono
    this.innerHTML = type === "password" ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
  });
</script>
<?php include("footer.php"); ?>