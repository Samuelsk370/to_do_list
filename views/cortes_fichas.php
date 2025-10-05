<style>
    .timeline {
        position: relative;
        margin: 0 auto;
        padding: 20px 0;
        width: 90%;
        max-width: 700px;
    }

    /* Línea vertical */
    .timeline::before {
        content: "";
        position: absolute;
        left: 30px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #ccc;
    }

    .timeline-item {
        position: relative;
        padding-left: 70px;
    }

    /* El circulito */
    .timeline-item::before {
        content: "";
        position: absolute;
        left: 26px;
        background: white;
        border: 2px solid #007bff;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        top: 5px;
    }

    .timeline-item h6 {
        margin: 0;
        font-size: 0.8rem;
        font-weight: bold;
        color: #007bff;
        cursor: pointer;
        /* transition: 0.1s; */
    }

    .timeline-item h6:hover {
        color: #005fc4ff;
    }

    .timeline-item small {
        display: block;
        margin-bottom: 10px;
        color: #777;
        font-size: 0.7rem;
    }

    .timeline-item ul {
        margin: 0;
        padding-left: 20px;
    }

    .timeline-item ul li {
        margin-bottom: 6px;
    }

    .folder-icon {
        font-size: 2rem;
        /* tamaño del icono */
        color: #f4b400;
        /* color estilo carpeta */
    }

    .folder-container {
        text-align: center;
        width: 120px;
    }
</style>
<?php include("header.php"); ?>


<a href="./test.php">ir___</a>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            Corte de la localidad:
                        </div>
                        <div class="card-body">
                            <div hidden class="mb-3">
                                <label for="" class="form-label">ID</label>
                                <input

                                    type="text"
                                    class="form-control"
                                    name="id_empleado"
                                    id="id_empleado"
                                    value="<?php echo $id_empleado; ?>"
                                    aria-describedby="helpId"
                                    placeholder="" />

                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Localidad</label>
                                <select
                                    class="form-select form-select-lg "
                                    name="id_locality_corte"
                                    id="id_locality_corte" required> <!--rellenado con jquery -->
                                </select>
                            </div>


                            <div hidden class="row mb-3" id="conatiner_formClientPV">
                                <label for="" class="form-label">Cliente/Punto v.</label>
                                <div class="col-9">

                                    <select
                                        class="form-select form-select-lg id_client_corte_clss"
                                        name="id_client_corte"
                                        id="id_client_corte" required>
                                    </select>
                                </div>
                                <div class="col-3 d-flex justify-content-center align-items-center">
                                    <button id="btn_add_client_pv" class="btn btn-outline-secondary" type="button" id="">
                                        <i class="bi bi-plus-square"></i>
                                    </button>
                                </div>
                            </div>


                            <div hidden class="row mb-3 border mx-2 rounded" id="conatiner_formPlanesPV">
                                <label for="passw_user" class="form-label">Planes de fichas</label>
                                <div class="col-8" id="container_planesPV"></div>
                                <div class="col-4 d-flex justify-content-center align-items-center">
                                    <button class="btn btn-outline-secondary m-auto d-block " type="button" id="btn_add_plan_pv">
                                        <i class="bi bi-plus-square"></i>
                                    </button>

                                </div>
                            </div>
                            <div hidden class="row mb-3 border mx-2 rounded" id="conatiner_formTotalFichasPV">
                                <label for="passw_user" class="form-label">Total de fichas (actualmente)</label>
                                <div class="col-12" id="container_fichasTotalesPV">

                                    <p class="mb-1"><b>200</b> fichas de <b>$5.00</b></p>
                                    <p class="mb-1"><b>200</b> fichas de <b>$10</b></p>
                                    <p class="mb-1"><b>100</b> fichas de <b>$20.00</b></p>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="row border m-2 rounded">
                        <!-- <div class="text-center">
                                                <h4>Historial</h4>
                                            </div> -->
                        <span>zempazulco</span>


                        <div class="col-md-6">
                            <button
                                type="button"
                                class="btn btn-primary btn-sm m-2">
                                Nuevo Corte
                            </button>
                            <div class="border container rounded mb-3">
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <h6 class="historial_list">UNEMECAPA (Residente Profesional)</h6>
                                        <small>04 sep, 2025</small>

                                    </div>

                                    <div class="timeline-item">

                                        <h6 class="historial_list">JoobsMx (Colaborador)</h6>
                                        <small>09 sep, 2025</small>
                                    </div>

                                    <div class="timeline-item">
                                        <h6 class="historial_list">Starnet (Técnico)</h6>
                                        <small>20 sep, 2025</small>
                                    </div>
                                    <div class="timeline-item">
                                        <h6 class="historial_list">Starnet (Técnico)</h6>
                                        <small>20 sep, 2025</small>
                                    </div>
                                    <div class="timeline-item">
                                        <h6 class="historial_list">Starnet (Técnico)</h6>
                                        <small>20 sep, 2025</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <button id="btn_add_fichas" type="button" class="btn btn-primary btn-sm m-2"> Agregar Fichas </button>
                            <div class="border container rounded">
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <h6 class="historial_list">UNEMECAPA (Residente Profesional)</h6>
                                        <small>04 sep, 2025</small>

                                    </div>

                                    <div class="timeline-item">
                                        <h6 class="historial_list">JoobsMx (Colaborador)</h6>
                                        <small>09 sep, 2025</small>
                                    </div>

                                    <div class="timeline-item">
                                        <h6 class="historial_list">Starnet (Técnico)</h6>
                                        <small>20 sep, 2025</small>
                                    </div>
                                    <div class="timeline-item">
                                        <h6 class="historial_list">Starnet (Técnico)</h6>
                                        <small>20 sep, 2025</small>
                                    </div>
                                    <div class="timeline-item">
                                        <h6 class="historial_list">Starnet (Técnico)</h6>
                                        <small>20 sep, 2025</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Contenido a convertir -->
<div id="toPdf" style="width:600px; padding:20px; background:#f9f9f9; border:1px solid #ccc;">
    <h2>Reporte de prueba</h2>
    <p>Este es el contenido que se convertirá en PDF y se mostrará aquí mismo.</p>
</div>


<!-- ____________________________________________________MODAL 1______________________________________________________________________ -->
<!-- Estructura del Modal DETALLES DEL CORTE -->
<div class="modal fade" id="modal_detalles_corte" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado -->
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Detalles del corte</h5>
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
                <button type="button" id="btn_show_ticket" class="btn btn-success" data-bs-dismiss="modal">Ver ticket</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>


            </div>
        </div>
    </div>
</div>

<!-- __________________________________________________________MODAL2________________________________________________________________ -->

<!-- Estructura del Modal CONTAINER --PDF-- TICKET -->
<div class="modal fade" id="modal_show_ticket" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado -->
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Detalles del corte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Cuerpo -->
            <div class="modal-body px-4">
                <!-- Contenedor para visualizar el PDF -->
                <div id="pdfPreview" style="margin-top:20px; border:1px solid #ccc; height:600px;">
                    <!-- Aquí insertaremos el iframe con el PDF -->
                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <!-- <button type="submit" name="accion" value="Finalizar" class="btn btn-success">Finalizar</button> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>


            </div>
        </div>
    </div>
</div>
<!-- _______________________________________________________________MODAL3___________________________________________________________ -->

<!-- Estructura del Modal FORM ADD CLIENTE PVD H DH DHJj-->
<div class="modal fade" id="modal_show_addClientPV" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado -->
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Registrar Punto de venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Cuerpo -->
            <div class="modal-body px-4">
                <div class="mb-3">
                    <input type="text" name="id_localidad_pv" id="id_localidad_pv">
                    <label for="" class="form-label">Nombre punto de venta</label>
                    <input
                        type="text"
                        class="form-control"
                        name="nombre_pv"
                        id="nombre_pv"
                        aria-describedby="helpId"
                        placeholder="Punto venta" required />
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" id="save_pv_cliente" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- __________________________________________________________________________________________________________________________ -->


<!-- _______________________________________________________________MODAL4___________________________________________________________ -->

<!-- Estructura del Modal FORM ADD PLANES_FICHAS-->
<div class="modal fade" id="modal_addPlanesPV" tabindex="-1" aria-labelledby="_miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado -->
            <div class="modal-header">
                <h5 class="modal-title" id="_miModalLabel">Registrar Plan de fichas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Cuerpo -->
            <div class="modal-body px-4">
                <div class="mb-3">
                    <input type="text" name="id_planes_pv_client" id="id_planes_pv_client">
                    <label for="" class="form-label">Nombre del plan</label>
                    <input
                        type="text"
                        class="form-control"
                        name="nombrePlan_pv"
                        id="nombrePlan_pv"
                        aria-describedby="helpId"
                        placeholder="" required />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Precio</label>
                    <input
                        type="number"
                        class="form-control"
                        name="precioPlan_pv"
                        id="precioPlan_pv"
                        aria-describedby="helpId"
                        placeholder="" required />
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" id="save_plancliente" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- _______________________________________________________________MODAL5___________________________________________________________ -->

<!-- Estructura del Modal FORM ADD FICHAS_TOTAL  -->
<div class="modal fade" id="modal_addFichasOfTotal" tabindex="-1" aria-labelledby="_miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado -->
            <div class="modal-header">
                <h5 class="modal-title" id="_miModalLabel">Agregar fichas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Cuerpo -->
            <div class="modal-body px-4">
                <div class="mb-3">
                    <label for="" class="form-label">¿A que plan deseas agregar?</label>
                    <select
                        class="form-select form-select-lg "
                        name="plan_select_to_add_fichas"
                        id="plan_select_to_add_fichas" required> <!--rellenado con jquery -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Cantidad a agregar: </label>
                    <input
                        type="number"
                        class="form-control"
                        name="cantidad_fichas_add"
                        id="cantidad_fichas_add"
                        aria-describedby="helpId"
                        placeholder="" required />
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" id="save_add_fichas" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function suma(a, b) {
            return a + b;
        }
        // Tu código aquí
        $(function() {
            $.ajax({
                url: "../resources/php/cortes_fichas_controller.php", // archivo PHP que consulta MySQL
                type: "GET", // o POST
                dataType: "json", // esperamos JSON
                success: function(localidades) {
                    // Llenamos el select
                    // $("#id_locality_corte").empty();
                    $("#id_locality_corte").append('<option disabled selected> localidad</option>');

                    $.each(localidades, function(index, loc) {
                        $("#id_locality_corte").append(
                            `<option value="${loc.id_localidad}">${loc.name_locality}</option>`
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error en la petición:", error);
                }
            });

        });


        // Click HISTORIAL
        $(".historial_list").on("click", function() {
            $("#modal_detalles_corte").modal("show");
        });
        //Click AGREGAR CLIENTE
        $("#btn_add_client_pv").on("click", function() {
            var idLocalidad = $("#id_locality_corte").val();
            $("#id_localidad_pv").val(idLocalidad);
            $("#modal_show_addClientPV").modal("show");
        });

        //Click AGREGAR PLANES P//
        $("#btn_add_plan_pv").on("click", function() {
            var idClientPV = $("#id_client_corte").val();
            $("#id_planes_pv_client").val(idClientPV);
            $("#modal_addPlanesPV").modal("show");
        });
        //Click "AGREGAR FICHAS"
        $("#btn_add_fichas").on("click", function() {
            $("#modal_addFichasOfTotal").modal("show");
        });




        $(function() {
            $('#btn_show_ticket').click(async function() {
                const {
                    jsPDF
                } = window.jspdf;

                const elem = document.getElementById('toPdf');
                const canvas = await html2canvas(elem, {
                    scale: 4
                });
                const imgData = canvas.toDataURL('image/png');

                const pdf = new jsPDF('p', 'mm', 'a4');
                const pageWidth = 210;
                const pageHeight = 297;

                const imgWidth = pageWidth;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;

                pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);

                // generar blob
                const pdfBlob = pdf.output('blob');

                // crear URL temporal
                const pdfUrl = URL.createObjectURL(pdfBlob);

                // insertar iframe en el contenedor
                $('#pdfPreview').html(
                    `<iframe src="${pdfUrl}" width="100%" height="100%" style="border:none;"></iframe>`
                );
                $("#modal_show_ticket").modal("show");
            });
        });

        // AL CAMBIAR OPCIÓN DE LOCALIDAD _ PV:
        $("#id_locality_corte").change(function() {
            // obtener el valor seleccionado
            let valor = $(this).val();
            // alert(valor);
            $.ajax({
                url: "../resources/php/cortes_fichas_controller.php?id_pueblo=" + valor, // archivo PHP que consulta MySQL
                type: "POST", // o POST
                dataType: "json", // esperamos JSON
                success: function(pv) {
                    // Llenamos el select
                    $("#id_client_corte").empty();
                    $("#id_client_corte").append('<option disabled selected>Cliente</option>');

                    $.each(pv, function(index, c_pv) {
                        $("#id_client_corte").append(
                            `<option value="${c_pv.id_client_pv}">${c_pv.nombre_pv}</option>`
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error en la petición:", error);
                }
            });
            $('#conatiner_formClientPV').removeAttr("hidden");
        });

    });

    //Client GUARDAR CLIENTE _ PV
    $("#save_pv_cliente").on("click", function() {
        var idLocalidad_input_locality = $("#id_locality_corte").val();
        var nombrePV = $("#nombre_pv").val();
        $.ajax({
            url: "../resources/php/cortes_fichas_controller.php?idLocalidad_input_locality=" + idLocalidad_input_locality + "&nombrePV=" + nombrePV, // archivo PHP que consulta MySQL
            type: "POST", // o POST
            dataType: "json", // esperamos JSON
            success: function(pv) {
                // alert("clientPV Saved");
                // Llenamos el select
                $(".id_client_corte_clss").empty();
                $(".id_client_corte_clss").append('<option disabled selected>Cliente</option>');

                $.each(pv, function(index, c_pv) {
                    $(".id_client_corte_clss").append(
                        `<option value="${c_pv.id_client_pv}">${c_pv.nombre_pv}</option>`
                    );
                });
                $("#modal_show_addClientPV").modal("hide");
            },
            error: function(xhr, status, error) {
                console.error("Error en la petición:", error);
            }
        });
    });

    // AL CAMBIAR OPCIÓN DE CLIENTE PUNTO de VENTA:
    $("#id_client_corte").change(function() {
        // obtener el valor seleccionado
        let id_cliente_consul_planes = $(this).val();
        $.ajax({
            url: "../resources/php/cortes_fichas_controller.php?id_cliente_consul_planes=" + id_cliente_consul_planes, // archivo PHP que consulta MySQL
            type: "POST", // o POST
            dataType: "json", // esperamos JSON
            success: function(respuesta) {
                    // Limpiar contenedores
                    $("#container_planesPV").empty();
                    $("#plan_select_to_add_fichas").empty();
                    $("#container_fichasTotalesPV").empty();
                    console.log(respuesta);
                    console.log(respuesta.planes);
                    console.log(respuesta.fichas);
                    // 🔹 Acceder a los planes
                    $.each(respuesta.planes, function(fichas, plan) {
                        $("#container_planesPV").append(
                            `<p class="fw-semibold bg-opacity-25 bg-primary text-dark px-1 rounded mb-2">
                            ${plan.nombre_plan} - $${plan.precio_plan}
                        </p>`
                        );
                        $("#plan_select_to_add_fichas").append(
                            `<option value="${plan.id_plan_ficha}">
                            ${plan.nombre_plan} - $${plan.precio_plan}
                        </option>`
                        );
                        console.log(plan.id_plan_ficha);
                            var idDelPlan = plan.id_plan_ficha;
                        // UN AJAX POR CADA PLAN
                        $.ajax({
                            url: "../resources/php/cortes_fichas_controller.php?idDelPlan=" + idDelPlan, // archivo PHP que consulta MySQL
                            type: "POST", // o POST
                            dataType: "json", // esperamos JSON
                            success: function(total_fichs) {

                                // Si el valor existe y es mayor que 0
                                if (total_fichs && total_fichs.cantidad_total > 0) {
                                    $("#container_fichasTotalesPV").append(
                                        `<p class="mb-1">
                                            <b>${total_fichs.cantidad_total}</b> fichas de <b>$${plan.nombre_plan}</b>
                                        </p>`
                                    );
                                } else {
                                    // Si no hay registros, muestra 0
                                    $("#container_fichasTotalesPV").append(
                                        `<p class="mb-1">
                                            <b>0</b> fichas de <b>$${plan.nombre_plan}</b>
                                        </p>`
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error en la petición:", error);
                               
                            }
                            
                            
                        });
                          // 🔹 Acceder a las fichas
                        // $.each(respuesta.fichas, function(fich) {
                        //     $("#container_fichasTotalesPV").append(
                        //         `<p class="mb-1"><b>${fich.cantidad_total}</b> fichas de <b>$${plan.precio_plan}</b></p>
                        //         `
                        //     );
                        // });
                        
                    });

                   

                    
                }

                ,
            error: function(xhr, status, error) {
                console.error("Error en la petición:", error);
            }
        });
        // $('#conatiner_formClientPV').removeAttr("hidden");
        $("#conatiner_formPlanesPV").removeAttr("hidden");
        $("#conatiner_formTotalFichasPV").removeAttr("hidden");

    });


    // GUARDAR PLAN PUNTO DE VENTA
    $("#save_plancliente").on("click", function() {
        var idClientCorte = $("#id_planes_pv_client").val();
        var nombrePlan_pv = $("#nombrePlan_pv").val();
        var precioPlan_pv = $("#precioPlan_pv").val();
        $.ajax({
            url: "../resources/php/cortes_fichas_controller.php?idClientCorte=" + idClientCorte + "&nombrePlan_pv=" + nombrePlan_pv + "&precioPlan_pv=" + precioPlan_pv, // archivo PHP que consulta MySQL
            type: "POST",
            dataType: "json",
            success: function(planes) {
                $("#container_planesPV").empty();
                $("#plan_select_to_add_fichas").empty();
                $("#container_fichasTotalesPV").empty();
                $.each(planes, function(index, plan) {
                    // MOSTRAR TOTAL DE PLANES
                    $("#container_planesPV").append(
                        `<p class="fw-semibold bg-opacity-25 bg-primary text-dark px-1 rounded mb-2">${plan.nombre_plan} -$${plan.precio_plan}</p>`
                    );
                    // MOSTRAR PLANES EN EL SELECT
                    $("#plan_select_to_add_fichas").append(
                        `<option value="${plan.id_plan_ficha}">${plan.nombre_plan} - $${plan.precio_plan}</option>`
                    );
                    // MOSTRAR TOTAL DE FICHAS
                    $("#container_fichasTotalesPV").append(
                        `<p class="mb-1"><b>0</b> fichas de <b>$${plan.precio_plan}</b></p>`
                    );
                });
                $("#modal_addPlanesPV").modal("hide");
            },
            error: function(xhr, status, error) {
                console.error("Error en la petición:", error);
            }
        });
    });

    // GUARDAR CANTIDAD DE FICHAS A AGREGAR
    $("#save_add_fichas").on("click", function() {
        var id_plan_select_to_add = $("#plan_select_to_add_fichas").val();
        var cantidad_fichas_add = $("#cantidad_fichas_add").val();
        $.ajax({
            url: "../resources/php/cortes_fichas_controller.php?id_plan_select_to_add=" + id_plan_select_to_add + "&cantidad_fichas_add=" + cantidad_fichas_add,
            type: "POST", // o POST
            dataType: "json", // esperamos JSON
            success: function(planes) {

                // $("#container_planesPV").empty();
                // $.each(planes, function(index, plan) {
                //     $("#container_planesPV").append(
                //         `<p class="fw-semibold bg-opacity-25 bg-primary text-dark px-1 rounded mb-2">${plan.nombre_plan} - ${plan.precio_plan}</p>
                //         `
                //     );
                // });   
                $("#modal_addFichasOfTotal").modal("hide");
            },
            error: function(xhr, status, error) {
                console.error("Error en la petición:", error);
            }
        });
    });
</script>
<?php include("footer.php"); ?>