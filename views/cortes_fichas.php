

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
    z-index: 0;
}

/* Cada item */
.timeline-item {
    position: relative;
    padding-left: 70px;
    z-index: 1; /* asegura que quede sobre la línea */
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
    z-index: 2;
}

/* Estilos de texto */
.timeline-item h6 {
    margin: 0;
    font-size: 0.8rem;
    font-weight: bold;
    color: #007bff;
    cursor: pointer;
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

/* Scrollbar estético opcional */
.border.container.rounded::-webkit-scrollbar {
    width: 6px;
}

.border.container.rounded::-webkit-scrollbar-thumb {
    background-color: #bbb;
    border-radius: 3px;
}

.border.container.rounded::-webkit-scrollbar-thumb:hover {
    background-color: #888;
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
                                <label for="" class="form-label">Punto de Venta</label>
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
                                <label class="form-label">Total de fichas (actualmente)</label>
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
                                id="btn_add_corte_modal"
                                type="button"
                                class="btn btn-primary btn-sm m-2">
                                Nuevo Corte
                            </button>
                            <div class="border container rounded" style="margin-bottom:1rem; max-height: 300px; overflow-y: auto; overflow-x: hidden; position: relative;">
                                <div class="timeline" id="container_historial_corte">

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <button id="btn_add_fichas" type="button" class="btn btn-primary btn-sm m-2"> Agregar Fichas </button>
                            <div class="border container rounded" style="margin-bottom:1rem; max-height: 300px; overflow-y: auto; overflow-x: hidden; position: relative;">
                                <div class="timeline" id="container_historial_fichs">
                                    
                                
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalLabel">Vista previa del PDF</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0" style="height: 80vh;">
        <!-- Aquí se mostrará el PDF -->
        <iframe id="pdfViewer" width="100%" height="100%" style="border:none;"></iframe>
      </div>
    </div>
  </div>
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

            <div class="modal-body px-4">


                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Cliente:</p>
                        <p id="name_client_modal_history" class="text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Total Bruto:</p>
                        <p id="total_bruto_history" class="text-muted"></p>
                    </div>
                </div>

                <div class="mb-3">
                    <p class="fw-bold mb-1">Porcentaje aplicado:</p>
                    <p id="porcent_aplicado_history" class="text-muted"></p>
                </div>

                <div class="mb-3">
                    <p class="fw-bold mb-1">Descuento:</p>
                    <p id="descuento_history" class="text-muted"></p>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="fw-bold mb-1">Total cobrado:</p>
                        <span id="total_cobrado_history" class="badge text-muted"></span>
                    </div>

                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold mb-1">Fecha del corte:</p>
                        <p id="fecha_corte_history" class="text-muted"></p>
                    </div>
                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <!-- <button type="submit" name="accion" value="Finalizar" class="btn btn-success">Finalizar</button> -->
                <button type="button" id="verPdfBtn" class="btn btn-success" data-bs-dismiss="modal">Ver ticket</button>
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
                <input id="input_id_client" value="..." type="text">
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
<!-- _______________________________________________________________MODAL6___________________________________________________________ -->

<!-- Estructura del Modal FORM ADD CORTE  -->
<div class="modal fade" id="modal_addCorte" tabindex="-1" aria-labelledby="_miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado -->
            <div class="modal-header">
                <h5 class="modal-title" id="_miModalLabel">Nuevo corte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Cuerpo -->
            <div class="modal-body px-4">
                <!-- <input id="" value="..." type="text"> -->
                 <div id="containerListPlanesModal">
                        No hay planes <br>
                 </div>
                
                <div class="rounded pb-2 row align-items-center rounded border py-3 mt-4 shadow-sm bg-light" id="container_totales_corte">
                   
                

                </div>

                
                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" id="save_new_corte" class="btn btn-primary">Finalizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>
</div>
    <script>
         // Cuando cambie el valor de cualquiera de los inputs con clase .miInput
         function getPorcenatjes(valorPorcentaje, totalBruto){

            // Calcular cuánto es el porcentaje del total bruto
            let descuento = totalBruto * (valorPorcentaje / 100); // 20% de 1000 = 200
            let totalFinal = totalBruto - descuento;               // 1000 - 200 = 800

            // Mostrar resultados
            console.log("Porcentaje ingresado:", valorPorcentaje + "%");
            console.log("Total bruto:", totalBruto);
            console.log("Descuento:", descuento);
            console.log("Total final:", totalFinal);

            // Si quieres mostrarlos en pantalla:
            $("#total_descuento").text(`${descuento.toFixed(2)}`);
            $("#total_cobrar").text(`${totalFinal.toFixed(2)}`);

         }


$(document).on("input change", "#porcent_of_corte", function() {

    var valorPorcentaje = parseFloat($(this).val()) || 0;  // Ejemplo: 20
    let totalBruto = parseFloat($("#total_bruto").text()) || 0; // Ejemplo: 1000
    getPorcenatjes(valorPorcentaje, totalBruto);
// Obtener valores
    
});

  $(document).on("input change", ".miInput", function() {
   let totalEnVentas = 0;

    // Recorre todos los inputs con clase .miInput
    $(".miInput").each(function() {
        let valorPorcentaje = parseFloat($(this).val()) || 0;             // valor del input
        let precio = parseFloat($(this).data("precio_plan")) || 0; // valor del atributo data-precio_plan
        let max = parseInt($(this).data("cantidad_max_add"));
        totalEnVentas += valorPorcentaje * precio; // sumar subtotal de cada input
        // AQUI QUEDE. VIENDO La forma de obtener el resto entre valor de fichas vendidas y total de fichas disponibles
        if (valorPorcentaje > max) {
            $(this).val(max); // fuerza el valorPorcentaje máximo
        } else if (valorPorcentaje < 0) {
            $(this).val(0); // evita números negativos
        }
    });
// YA NO FUNCIONA LA FUNCION DE AGREGAR VALOR AL INPU .minput..................
    // Mostrar en consola el total general
    console.log("💰 Total en ventas:", totalEnVentas.toFixed(2));

    // Si tienes un span o div donde mostrarlo:
    $("#total_bruto").text(`${totalEnVentas.toFixed(2)}`);

    var valorPorcentaje = parseFloat($("#porcent_of_corte").val()) || 0;  // Ejemplo: 20
    let totalBruto = parseFloat($("#total_bruto").text()) || 0; // Ejemplo: 1000
    getPorcenatjes(valorPorcentaje, totalBruto);
  });


    $(document).ready(function() {
        function abrirModalHistoryFichs(){
            alert("jvdjvdjj");
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
        //Click "AGREGAR CORTE - MODAL SHOW"
        $("#btn_add_corte_modal").on("click", function() {
            $("#modal_addCorte").modal("show");
        });

        function subirPdfAlServidor(blob) {
            const formData = new FormData();
            formData.append('pdf_ticket', blob, 'ticket.pdf');

            fetch('guardar_ticket.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(resp => console.log(resp))
            .catch(err => console.error(err));
        }

        $(function() {
  $('#btn_show_ticket').click(function() {
    
  });
});



        // $(function() {
        //     $('#btn_show_ticket').click(async function() {
        //         const {
        //             jsPDF
        //         } = window.jspdf;

        //         const elem = document.getElementById('toPdf');
        //         const canvas = await html2canvas(elem, {
        //             scale: 4
        //         });
        //         const imgData = canvas.toDataURL('image/png');

        //         const pdf = new jsPDF('p', 'mm', 'a4');
        //         const pageWidth = 210;
        //         const pageHeight = 297;

        //         const imgWidth = pageWidth;
        //         const imgHeight = (canvas.height * imgWidth) / canvas.width;

        //         pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);

        //         // generar blob
        //         const pdfBlob = pdf.output('blob');

        //         // crear URL temporal
        //         const pdfUrl = URL.createObjectURL(pdfBlob);

        //         // insertar iframe en el contenedor
        //         $('#pdfPreview').html(
        //             `<iframe src="${pdfUrl}" width="100%" height="100%" style="border:none;"></iframe>`
        //         );
        //         $("#modal_show_ticket").modal("show");
        //     });
        // });

        // AL CAMBIAR OPCIÓN DE LOCALIDAD _ PV:
        $("#id_locality_corte").change(function() {
            // obtener el valor seleccionado
            let valor = $(this).val();
            // alert(valor);
            $.ajax({                url: "../resources/php/cortes_fichas_controller.php?id_pueblo=" + valor, // archivo PHP que consulta MySQL
                type: "POST", // o POST
                dataType: "json", // esperamos JSON
                success: function(pv, textStatus, xhr) {
                    console.log("RAW response:", xhr.responseText); // ✅ ver exactamente qué llega
                    console.log("Parsed JSON:", pv);
                    // Llenamos el select
                    $("#id_client_corte").empty();
                    $("#id_client_corte").append('<option disabled selected>Cliente</option>');

                    $.each(pv, function(index, c_pv) {
                        $("#id_client_corte").append(
                            `<option value="${c_pv.id_client_pv}">${c_pv.nombre_pv}</option>`
                        );
                    });
                    $("#conatiner_formTotalFichasPV").attr("hidden", "");
                    $("#conatiner_formPlanesPV").attr("hidden", "");
                    $("#container_historial_fichs").empty();
                    $(".timeline").empty();
                },
                error: function(xhr, status, error) {
                    console.error("Error en la petición:", error);
                }
            });
            $('#conatiner_formClientPV').removeAttr("hidden");
        
            
        });

    });
    // Click HISTORIAL
        $(".historial_list").on("click", function() {
            var path_ticket = String($(this).data("ticket_pdf"));
                console.log("pathhhh:: "+path_ticket);

            $("#pdfViewer").attr("src", path_ticket);
            $("#modal_detalles_corte").modal("show");
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

                               
                $("#modal_show_addClientPV").modal("hide");
            },
            error: function(xhr, status, error) {
                console.error("Error en la petición:", error);
            }
        });
    });

    // AL CAMBIAR OPCIÓN DE CLIENTE PUNTO de VENTA:
    $("#id_client_corte").change(function() { 
        // Crear un arreglo para almacenar todos los planes
        let planes = [];
        // Recorremos todos los inputs del modal
        $(".input_total_fichs_sold").each(function() {
            const idPlan = $(this).data("id_plan_ficha");
            const cantidadVendida = parseInt($(this).val()) || 0;
            const cantidadMax = parseInt($(this).data("cantidad_max_add")) || 0;
            const precio = parseFloat($(this).data("precio_plan")) || 0;

            // Solo agregar si se vendió algo (evitar enviar ceros)
            if (cantidadVendida > 0) {
                planes.push({
                    id_plan_fk: idPlan,
                    cantidad_vendida: cantidadVendida,
                    cantidad_maxima: cantidadMax,
                    precio: precio
                });
            }
        });
         // Si no hay planes con ventas, detener el proceso
    // if (planes.length === 0) {
    //     alert("No hay fichas vendidas registradas.");
    //     return;
    // } 

    // console.log("Planes recopilados:", planes);

    // $.ajax({
    //     url: "../resources/php/cortes_fichas_controller.php",
    //     type: "POST",
    //     dataType: "json",
    //     data: { planes: JSON.stringify(planes) },
    //     success: function(respuesta) {
    //         console.log("Respuesta del servidor:", respuesta);
    //         alert("Fichas actualizadas correctamente.");
    //     },
    //     error: function() {
    //         alert("Error al actualizar las fichas.");
    //     }
    // });








        // ______________________________________________________________________________________________________________-
        // obtener el valor seleccionado
        let id_cliente_consul_planes = $(this).val();
        let nombre_clientPv = $("#id_client_corte option:selected").text();
        $.ajax({
            url: "../resources/php/cortes_fichas_controller.php?id_cliente_consul_planes=" + id_cliente_consul_planes, // archivo PHP que consulta MySQL
            type: "POST", // o POST
            dataType: "json", // esperamos JSON
            success: function(respuesta) {
                    // Limpiar contenedores
                    $("#container_planesPV").empty();
                    $("#container_fichasTotalesPV").empty();
                    $("#plan_select_to_add_fichas").empty();//select del modal ( Lado de Agregar fichas)
                    $("#containerListPlanesModal").empty();//Contenedor Lista Planes en el Modal (Lado de Nuevo corte) 
                    console.log(respuesta);
                    console.log(respuesta.planes);
                    console.log(respuesta.fichas);
                    // 🔹 Acceder a los planes
                    $counterPlanes =1;
                    $.each(respuesta.planes, function(fichas, plan) { 
                        $("#container_planesPV").append(
                            `<p class="fw-semibold bg-opacity-25 bg-primary text-dark px-1 rounded mb-2">
                            ${plan.nombre_plan} - ${plan.precio_plan}
                        </p>`
                        );
                        $("#plan_select_to_add_fichas").append(
                            `<option value="${plan.id_plan_ficha}">
                            ${plan.nombre_plan} - ${plan.precio_plan}
                        </option>`
                        );
                        $("#containerListPlanesModal").append(
                            `
                            <div class="mb-2 p-1 row align-items-center border rounded shadow-sm bg-primary bg-opacity-10">
                            <!-- Encabezado del plan -->
                            <div class="col-8">
                                <label class="fw-bold text-primary mb-0">
                                Plan `+$counterPlanes+`- 
                                <b class="text-dark">$${plan.precio_plan}</b>
                                </label>
                            </div>
                            <div class="col-4 text-end">
                                <small class="badge bg-light text-dark border fw-semibold px-3 py-2">
                                ${plan.nombre_plan}
                                </small>
                            </div>

                            <hr class=" mb-1">

                            <!-- Campo de fichas -->
                            <div class="col-12">
                                <label for="" class="form-label mb-0 text-secondary fw-semibold">
                                Total fichas: <b id="">${plan.cantidad_total}</b>
                                </label>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label mb-0 text-secondary fw-semibold">
                                Fichas vendidas:
                                </label>
                            </div>
                            <div class="col-6 text-end">
                                <input 
                                class="input_total_fichs_sold miInput form-control form-control-sm d-inline-block text-center fw-bold border-primary" 
                                value="0" 
                                type="number" 
                                style="width: 100px;"
                                data-id_plan_ficha="${plan.id_plan_ficha}"
                                data-precio_plan="${plan.precio_plan}"
                                data-cantidad_max_add="${plan.cantidad_total}"
                                max="${plan.cantidad_total}"
                                >
                            </div>
                            </div>

                            `
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
                                            <b id="id_plan_${plan.id_plan_ficha}">${total_fichs.cantidad_total}</b> fichas de <b>${plan.nombre_plan}</b>
                                        </p>`
                                    );
                                    // AQUI QUEDE. COLOCARLE EL ID AL PLAN DE (TOTALFICHASDISPONIBLES.), PARA CUANDO
                                    // HAGA LA ACTUAIZACION, OBTENGA EL TOTAL ACTUAL Y LO MUESTRE EN LA ETIQUETA <B> DEL PLAN.
                                } else {
                                    // Si no hay registros, muestra 0
                                    $("#container_fichasTotalesPV").append(
                                        `<p class="mb-1">
                                            <b id="id_plan_${plan.id_plan_ficha}">${total_fichs.cantidad_total}</b> fichas de <b>${plan.nombre_plan}</b>
                                            
                                        </p>`
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error en la petición:", error);
                            }
                        });
                        $counterPlanes++;
                    });
                    $("#container_totales_corte").empty();
                    $("#container_totales_corte").append(
                    `
                    <input id="id_client_form_corte" type=text value="${id_cliente_consul_planes}">
                    <input id="nombre_client_form_corte" type=text value="${nombre_clientPv}">
                    <div class="row  py-3 mt-4">
                        <div class="col-6 d-flex align-items-center">
                            <label class="fw-bold text-primary mb-0">
                            Porcentaje de corte:
                            </label>
                        </div>
                        <div class="col-6 text-end">
                            <div class="input-group input-group-sm justify-content-end" style="width: 120px; margin-left: auto;">
                            <input 
                                id="porcent_of_corte" 
                                class="form-control text-center fw-semibold border-primary" 
                                type="number" 
                                min="0" max="100"
                                value="0"
                            >
                            <span class="input-group-text bg-primary text-white fw-bold">%</span>
                            </div>
                        </div>
                    </div>
                   <!-- Totales -->
                <div class="card shadow-sm border-0 mt-4">
                <div class="card-body text-center">
                    <h6 class="text-uppercase text-muted mb-3">Resumen de Totales</h6>

                    <div class="row justify-content-center mb-3">
                    <div class="col-md-4 col-12 mb-2">
                        <div class="p-3 bg-light rounded">
                        <small class="text-muted d-block">Total Bruto</small>
                        <h5 class="fw-bold text-primary mb-0">$<span id="total_bruto">0.00</span></h5>
                        </div>
                    </div>

                    <div class="col-md-4 col-12 mb-2">
                        <div class="p-3 bg-light rounded">
                        <small class="text-muted d-block">Descuento</small>
                        <h5 class="fw-bold text-danger mb-0">$<span id="total_descuento">0.00</span></h5>
                        </div>
                    </div>

                    <div class="col-md-4 col-12 mb-2">
                        <div class="p-3 bg-light rounded">
                        <small class="text-muted d-block">Total a Cobrar</small>
                        <h5 class="fw-bold text-success mb-0">$<span id="total_cobrar">0.00</span></h5>
                        </div>
                    </div>
                    </div>

                    <small class="text-muted fst-italic">Verifica los montos antes de continuar</small>
                </div>
                </div>

                            `
                        );
                    
                }
                ,
            error: function(xhr, status, error) {
                console.error("Error en la petición:", error);
            }
        });
        $('#input_id_client').val(id_cliente_consul_planes);
        $("#conatiner_formPlanesPV").removeAttr("hidden");
        $("#conatiner_formTotalFichasPV").removeAttr("hidden");

        // CONSULTAR TODO EL HISTORIAL DE FICHAS DEL CLIENTE.
        $.ajax({
            url: "../resources/php/cortes_fichas_controller.php?id_client_to_history=" + id_cliente_consul_planes,
            type: "POST", // o POST
            dataType: "json", // esperamos JSON
            success: function(respuesta) {
                console.log("Respuesta completa:", respuesta); // Verás el HTML o el mensaje real del error
                console.log("Respuesta del servidor:", respuesta);
                
                    $("#container_historial_fichs").empty();
                    $("#container_historial_corte").empty();
                $.each(respuesta.hitory_fichs, function(index, historial) {
                    $("#container_historial_fichs").append(
                        `
                        <div class="timeline-item">
                            <h6 class="historial_list lista_corte">${historial.last_quantity_added} Fichas agregadas.</h6>
                            <small>${historial.register_date}</small>
                        </div>
                        `
                    );
                });
                $.each(respuesta.list_cortes, function(index, historial_corte) {
                    $("#container_historial_corte").append(
                        `
                        <div class="timeline-item ">
                            <h6
                            data-id_corte_ficha="${historial_corte.id_corte_ficha}"
                            data-id_client_pv="${historial_corte.id_client_pv}"
                            data-total_bruto="${historial_corte.total_bruto}"
                            data-porcentaje="${historial_corte.porcentaje}"
                            data-descuento_total="${historial_corte.descuento_total}"
                            data-total_cobrado="${historial_corte.total_cobrado}"
                            data-fecha_corte="${historial_corte.fecha_corte}"
                            data-ticket_pdf="${historial_corte.ticket_pdf}"
                            data-id_empleado_cobro ="${historial_corte.id_empleado_cobro }"
                            data-name_empleado="${historial_corte.name_empleado}"
                            data-apellidos_empleado="${historial_corte.apellidos_empleado}"
                            class="historial_list lista_corte">By: ${historial_corte.name_empleado} ${historial_corte.apellidos_empleado}.</h6>
                            <small>${historial_corte.fecha_corte}</small>
                        </div>
                        `
                    );
                });
                // Click HISTORIAL
                $(".lista_corte").on("click", function() {
                    let idRegisCorte = $(this).data("id_corte_ficha");
                    let id_client_pv = $(this).data("id_client_pv");
                    let total_bruto = $(this).data("total_bruto");
                    let porcentaje = $(this).data("porcentaje");
                    let descuento_total = $(this).data("descuento_total");
                    let total_cobrado = $(this).data("total_cobrado");
                    let fecha_corte = $(this).data("fecha_corte");
                    let ticket_pdf = $(this).data("ticket_pdf");
                    let id_empleado_cobro = $(this).data("id_empleado_cobro");
                    let name_empleado = $(this).data("name_empleado");
                    let apellidos_empleado = $(this).data("apellidos_empleado");

                    $("#name_client_modal_history").text(name_empleado+" "+apellidos_empleado);
                    $("#total_bruto_history").text("$"+total_bruto);
                    $("#porcent_aplicado_history").text(porcentaje+"%");
                    $("#descuento_history").text("$"+descuento_total);
                    $("#total_cobrado_history").text("$"+total_cobrado);
                    $("#fecha_corte_history").text(fecha_corte);
                    $("#pdfViewer").attr("src", ticket_pdf);//Agregar el path del PDF, en el modal visualizador
                    $("#modal_detalles_corte").modal("show");
                });
            },error: function(xhr, status, error) {
                console.error("Error en la petición weeee:", error);
                console.log("Respuesta del servidor:", xhr.responseText);
            }

        });

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
                                            <b id="id_plan_${plan.id_plan_ficha}">${total_fichs.cantidad_total}</b> fichas de <b>${plan.nombre_plan}</b>
                                        </p>`
                                    );
                                } else {
                                    // Si no hay registros, muestra 0
                                    $("#container_fichasTotalesPV").append(
                                        `<p class="mb-1">
                                            <b id="id_plan_${plan.id_plan_ficha}">${total_fichs.cantidad_total}</b> fichas de <b>${plan.nombre_plan}</b>
                                            
                                        </p>`
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error en la petición:", error);
                            }
                        });
                    // $("#container_fichasTotalesPV").append(
                    //     `<p class="mb-1"><b>0</b> fichas de <b>$${plan.nombre_plan}</b></p>`
                    // );
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
        var id_cliente_history = $("#input_id_client").val();
        var id_plan_select_to_add = $("#plan_select_to_add_fichas").val();
        var cantidad_fichas_add = $("#cantidad_fichas_add").val();
        $.ajax({
            url: "../resources/php/cortes_fichas_controller.php?id_plan_select_to_add=" + id_plan_select_to_add + "&cantidad_fichas_add=" + cantidad_fichas_add+"&id_cliente_history="+id_cliente_history,
            type: "POST", // o POST
            dataType: "json", // esperamos JSON
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta);

                $.each(respuesta.fich_disp, function(index, total) {
                    $(`#id_plan_${total.id_plan_fk}`).text(`${total.cantidad_total}`);
                    $("#container_historial_fichs").append(
                        `
                        <div class="timeline-item">
                            <h6 class="historial_list">${total.ult_cantidad_add} fichas agregadas.</h6>
                            <small>${total.fecha_regis_cantidad}</small>
                        </div>
                        `
                    );
                });

                $("#modal_addFichasOfTotal").modal("hide");
                
            },
            error: function(xhr, status, error) {
                console.error("Error en la petición weeee:", error);
                console.log("Respuesta del servidor:", xhr.responseText);
            }

        });
    });


    // GUARDAR NUEVO CORTE 
    $("#save_new_corte").on("click", function() {
    
    // --- Datos generales para crear pdf---
    const totalBruto = $('#total_bruto').text();
    const totalDescuento = $('#total_descuento').text();
    const totalCobrar = $('#total_cobrar').text();
    const porcentaje = $('#porcent_of_corte').val();
    const idCliente = $('#id_client_form_corte').val();
    const nameClientePV = $('#nombre_client_form_corte').val();
    var FechaActualFormateda = "";
    // OBTENER FECHA ACTUAL FORMATO 12 Oct, 2925
    // Obtener fecha actual en CDMX
    const fechaCDMX = new Date().toLocaleString("es-MX", { timeZone: "America/Mexico_City" });
    const fechaObj = new Date(fechaCDMX); // Esto ya no falla en la mayoría de navegadores

    // Mejor alternativa usando Intl.DateTimeFormat
    const formatter = new Intl.DateTimeFormat('es-MX', { timeZone: 'America/Mexico_City', day: '2-digit', month: 'short', year: 'numeric' });
    const parts = formatter.formatToParts(new Date());

    let dia, mes, anio;
    parts.forEach(part => {
    if (part.type === 'day') dia = part.value;
    if (part.type === 'month') mes = part.value;
    if (part.type === 'year') anio = part.value;
    });

    FechaActualFormateda = `${dia} ${mes}, ${anio}`;

    console.log(FechaActualFormateda); // Ej: "12 Oct, 2025"

    
    const planes = [];
    $('#containerListPlanesModal .mb-2.p-1.row.align-items-center').each(function() {
      const nombrePlan = $(this).find('.badge.bg-light.text-dark.border.fw-semibold').text().trim();
    //   const nombrePlan = $(this).find('label.fw-bold.text-primary').text().trim();
      const precio = parseFloat($(this).find('input.input_total_fichs_sold').data('precio_plan')) || 0;
      const cantidad = parseInt($(this).find('input.input_total_fichs_sold').val()) || 0;
      const total = precio * cantidad;

      if (cantidad > 0) {
        planes.push({
          nombre: nombrePlan+' - $'+precio,
          precio: precio,
          cantidad: cantidad,
          total: total
        });
      }
    });

    // --- Crear tabla de planes ---
    let tablaPlanes = [];
    if (planes.length > 0) {
      tablaPlanes.push([
        { text: 'Plan', bold: true },
        // { text: 'Precio', bold: true },
        { text: 'Cant.', bold: true, alignment: 'center' },
        { text: 'Total', bold: true, alignment: 'right' }
      ]);

      planes.forEach(plan => {
        tablaPlanes.push([
          { text: plan.nombre, alignment: 'left' },
          { text: plan.cantidad.toString(), alignment: 'center' },
          { text: `$${plan.total.toFixed(2)}`, alignment: 'right' }
        ]);
      });

      // (opcional) subtotal de todos los planes vendidos
      const subtotalPlanes = planes.reduce((acc, p) => acc + p.total, 0);
      tablaPlanes.push([
        { text: 'Subtotal', bold: true, colSpan: 2, alignment: 'right' }, {},
        { text: `$${subtotalPlanes.toFixed(2)}`, bold: true, alignment: 'right' }
      ]);
    }

    // --- Definir documento PDF ---
    const docDefinition = {
      pageSize: { width: 220, height: 'auto' }, // formato tipo ticket
      pageMargins: [10, 10, 10, 10],
      content: [
        { 
            text: `STARNET
            Soluciones Integrales`, style: 'header', alignment: 'center' 
        },
        { text: `Cruz Grande Gro. Mex. CP. 41800.`, style: 'subheader', alignment: 'center' },
        { text: `Punto de venta: ${nameClientePV}`, style: 'subheader', alignment: 'center' },
        { text: `
            Fecha: ${FechaActualFormateda}`, style: 'subheader', alignment: 'right', margin: [10,0,0,0] },

        ...(planes.length > 0
          ? [
              { text: '----------------------------------------------------------', alignment: 'center', margin: [0, 5, 0, 5] },
              {
                style: 'tablePlanes',
                table: {
                  widths: ['*', 'auto', 'auto'],
                  body: tablaPlanes
                },
                layout: 'noBorders'
              }
            ]
          : []),

        { text: '----------------------------------------------------------', alignment: 'center', margin: [0, 5, 0, 5] },

        {
          style: 'tableTotales',
          table: {
            widths: ['*', 'auto'],
            body: [
              ['Total Bruto', `$${totalBruto}`],
              ['Descuento (' + porcentaje + '%)', `$${totalDescuento}`],
              ['Total cobrado', `$${totalCobrar}`]
            ]
          },
          layout: 'noBorders'
        },

        { text: '----------------------------------------------------------', alignment: 'center', margin: [0, 5, 0, 5] },
        { text: 'Aclaraciones al: 018009202', style: 'footer', alignment: 'center', margin: [0, 0, 0, 0] },
        { text: '********* Gracias por su preferencia *********', style: 'footer', alignment: 'center', margin: [0, 10, 0, 0] }
      ],
      styles: {
        header: { fontSize: 14, bold: true },
        subheader: { fontSize: 10, italics: true },
        footer: { fontSize: 9 },
        tableTotales: { fontSize: 10 },
        tablePlanes: { fontSize: 9 }
      }
    };

    // --- Mostrar PDF en nueva ventana ---
    // pdfMake.createPdf(docDefinition).open();




    pdfMake.createPdf(docDefinition).getBlob(function(blob) {
    // Crear FormData para enviar
    let formData = new FormData();
    formData.append('pdf', blob, 'ticket.pdf'); // 'ticket.pdf' es el nombre inicial
        // Agregar las demás variables
    formData.append('total_bruto', totalBruto);
    formData.append('total_descuento', totalDescuento);
    formData.append('total_cobrar', totalCobrar);
    formData.append('porcentaje', porcentaje);
    formData.append('id_cliente', idCliente);
    formData.append('nombre_cliente', nameClientePV);
    formData.append('fecha_actual', FechaActualFormateda);
    // Enviar al servidor con fetch
    fetch('../resources/php/guardar_ticket.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            console.log('PDF guardado en servidor:', data.path);
            // Aquí puedes guardar data.path en tu DB
            $("#container_historial_corte").append(
                `
                <div class="timeline-item">
                    <h6 class="historial_list">Corte By ${data.by_empleado}.</h6>
                    <small>${data.fecha_actual}</small>
                </div>
                `
            );
            $(".historial_list").on("click", function() {
                var path_ticket = String($(this).data("ticket_pdf"));
                console.log("pathhhh:: "+path_ticket);
                $("#pdfViewer").attr("src", path_ticket);
                $("#modal_detalles_corte").modal("show");
            });
        } else {
            console.error('Error al guardar PDF:', data.message);
        }
    })//_________________________________________________________________________________________________________________________
    .catch(err => console.error(err));
    $("#modal_addCorte").modal("hide");
    });

    // Crear un arreglo para almacenar todos los planes
    var planes2 = []; 
    // Recorremos todos los inputs del modal
    $(".input_total_fichs_sold").each(function() {
        const idPlan_ = $(this).data("id_plan_ficha");
        const cantidadVendida_ = parseInt($(this).val()) || 0;
        const cantidadMax_ = parseInt($(this).data("cantidad_max_add")) || 0;
        const _precio_ = parseFloat($(this).data("precio_plan")) || 0;

        // Solo agregar si se vendió algo (evitar enviar ceros)
        if (cantidadVendida_ > 0) {
            planes2.push({
                id_plan_fk: idPlan_,
                cantidad_vendida: cantidadVendida_,
                cantidad_maxima: cantidadMax_,
                precio: _precio_
            });
        }
    });
    // Si no hay planes con ventas, detener el proceso
    if (planes2.length === 0) {
        alert("No hay fichas vendidas registradas.");
        return;
    }
    console.log("Planes recopilados:", planes2);
    // Enviar al servidor para actualizar
    $.ajax({
        url: "../resources/php/cortes_fichas_controller.php",
        type: "POST",
        dataType: "json",
        data: { planes2: JSON.stringify(planes2) },
        success: function(respuesta2) {
            console.log("Respuesta del servidor:", respuesta2);
            alert("Fichas actualizadas correctamente.");
        },
        error: function() {
            alert("Error al actualizar las fichas.");
        }
    });

  });// llave de cierre de $("#save_new_corte")

// Abrir pdf de la ruta relativa
$("#verPdfBtn").on("click", function() {
    // Ruta o URL del PDF
    // let rutaPDF = "../storage/pdf/tickets_cortes/ticket_1760840521.pdf";

    // Asignamos el PDF al iframe
    

    // Mostramos el modal
    $("#pdfModal").modal("show");
});






</script>


<?php include("footer.php"); ?>