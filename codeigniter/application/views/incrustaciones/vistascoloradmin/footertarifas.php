<div id="footer" class="app-footer mx-0 px-0">
    <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
  </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- END APP HEADER -->
   
   
<!-- Modal para insertar nueva tarifa -->
<div class="modal fade" id="modalNuevaTarifa" tabindex="-1" role="dialog" aria-labelledby="modalNuevaTarifaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light border-bottom-0">
                <h5 class="modal-title text-primary fw-bold" id="modalNuevaTarifaLabel">Nueva Tarifa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" 
                aria-label="Cerrar"></button>
            </div>
            <div class="alert alert-warning text-center mx-3 mt-3" role="alert">
                Al crear una nueva tarifa, la tarifa vigente actual será dada de baja automáticamente.
            </div>
            <div class="modal-body">
                <form id="formNuevaTarifa" data-parsley-validate>
                    <div class="form-group mb-3">
                        <label for="tarifaMinima1" class="form-label">Tarifa Mínima (Bs.)</label>
                        <input type="text" id="tarifaMinima1" class="form-control"
                               required
                               data-parsley-required="true"
                               data-parsley-pattern="^\d{1,3}(\.\d{1})?$"
                               data-parsley-error-message="Debe ser un número con hasta 3 dígitos enteros y 1 decimal."
                               placeholder="999.9" maxlength="5">
                        <div class="error-message text-danger" id="errorTarifaMinima"></div> 
                    </div>

                    <div class="form-group mb-3">
                        <label for="tarifaVigente1" class="form-label">Tarifa Vigente (Bs.)</label>
                        <input type="text" id="tarifaVigente1" class="form-control"
                               required
                               data-parsley-required="true"
                               data-parsley-pattern="^\d{1,3}(\.\d{1})?$"
                               data-parsley-error-message="Debe ser un número con hasta 3 dígitos enteros y 1 decimal."
                               placeholder="999.9" maxlength="5">
                        <div class="error-message text-danger" id="errorTarifaVigente"></div>
                    </div>

                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success" id="btnRegistrarTarifa">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






 <!-- Modal para modificar tarifa -->
<div class="modal fade" id="modalModificarTarifa" tabindex="-1" role="dialog" aria-labelledby="modalModificarTarifaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light border-bottom-0">
                <h5 class="modal-title text-primary fw-bold" id="modalModificarTarifaLabel">Modificar Tarifa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="alert alert-warning text-center mx-3 mt-3" role="alert">
                Modifique los valores de la tarifa y guarde los cambios.
            </div>
            <div class="modal-body">
                <form id="formModificarTarifa" data-parsley-validate>
                    <input type="hidden" id="idTarifa" name="idTarifa">

                    <div class="form-group mb-3">
                        <label for="tarifaMinimaEdit" class="form-label">Tarifa Mínima (Bs.)</label>
                        <input type="text" id="tarifaMinimaEdit" class="form-control"
                               required
                               data-parsley-required="true"
                               data-parsley-pattern="^\d{1,3}(\.\d{1})?$"
                               data-parsley-error-message="Debe ser un número con hasta 3 dígitos enteros y 1 decimal."
                               placeholder="999.9" maxlength="5">
                        <div class="error-message text-danger" id="errorTarifaMinimaEdit"></div> 
                    </div>

                    <div class="form-group mb-3">
                        <label for="tarifaVigenteEdit" class="form-label">Tarifa Vigente (Bs.)</label>
                        <input type="text" id="tarifaVigenteEdit" class="form-control"
                               required
                               data-parsley-required="true"
                               data-parsley-pattern="^\d{1,3}(\.\d{1})?$"
                               data-parsley-error-message="Debe ser un número con hasta 3 dígitos enteros y 1 decimal."
                               placeholder="999.9" maxlength="5">
                        <div class="error-message text-danger" id="errorTarifaVigenteEdit"></div>
                    </div>

                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-success" id="btnModificarTarifa">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




  <!-- jQuery primero -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/jquery.min.js"></script>


  <!-- Scripts de ColorAdmin -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/vendor.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/theme/transparent.min.js"></script>

  

  <!-- Solo Modal JS de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/modal.min.js"></script>

  <!-- Plugins de DataTables -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-colreorder-bs4/js/colReorder.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-keytable-bs4/js/keyTable.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-rowreorder/js/dataTables.rowReorder.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-rowreorder-bs4/js/rowReorder.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>



  <!-- Otros scripts de DataTables -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/jszip/dist/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>

  <!-- toast -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/toastr.min.js"></script>

  <!-- Sweets alerts/Modals scripts -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/ui-modal-notification.demo.js"></script>

  

  <!-- forms validations -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
  <script>
    // Configura Parsley para usar el idioma español
    Parsley.addMessages('es', {
        defaultMessage: "Este valor parece ser inválido.",
        type: {
            email:        "Este valor debe ser una dirección de correo electrónico válida.",
            url:          "Este valor debe ser una URL válida.",
            number:       "Este valor debe ser un número válido.",
            integer:      "Este valor debe ser un número entero válido.",
            digits:       "Este valor debe ser un número entero.",
            alphanum:     "Este valor debe ser alfanumérico."
        },
        notblank:       "Este valor no debe estar en blanco.",
        required:       "Este campo es obligatorio.",
        pattern:        "Este valor es incorrecto.",
        min:            "Este valor debe ser mayor o igual a %s.",
        max:            "Este valor debe ser menor o igual a %s.",
        range:          "Este valor debe estar entre %s y %s.",
        minlength:      "Este valor es demasiado corto. Debe contener al menos %s caracteres.",
        maxlength:      "Este valor es demasiado largo. Debe contener %s caracteres o menos.",
        length:         "Este valor debe tener entre %s y %s caracteres.",
        mincheck:       "Debes seleccionar al menos %s opción.",
        maxcheck:       "No puedes seleccionar más de %s opciones.",
        check:          "Debes seleccionar entre %s y %s opciones.",
        equalto:        "Este valor debe ser idéntico."
    });

    // Establecer el idioma español como predeterminado
    Parsley.setLocale('es');

    // Agregar una validación personalizada para validar un DECIMAL(4,1)
    window.Parsley.addValidator('decimal41', {
        validateString: function(value) {
            // Validar que tenga hasta 3 dígitos enteros y hasta 1 decimal
            return /^\d{1,3}(\.\d{1})?$/.test(value);
        },
        messages: {
            es: "Debe ser un número con hasta 3 dígitos enteros y 1 decimal."  // Mensaje en español
        }
    });
    </script>


  <!-- Botones de exportacion dataTable -->
  <script>
    var options = {
      dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
      buttons: [{
          extend: 'copy',
          className: 'btn-sm'
        },
        {
          extend: 'csv',
          className: 'btn-sm'
        },
        {
          extend: 'excel',
          className: 'btn-sm'
        },
        {
          extend: 'pdf',
          className: 'btn-sm'
        },
        {
          extend: 'print',
          className: 'btn-sm'
        }
      ],
      responsive: true,
      colReorder: true,
      keys: true,
      rowReorder: true,
      select: true
    };

    if ($(window).width() <= 1200) {
      options.rowReorder = false;
      options.colReorder = false;
    }

    $('#data-table-combine').DataTable(options);
  </script>

  <!-- Sweet alart cierre de sesión -->
  <script>
    $(document).ready(function() {
      $('#showAlert').on('click', function() {
        swal({
          title: '¿Está seguro de salir?',
          icon: 'success',
          buttons: {
            cancel: {
              text: 'Cancelar',
              value: null,
              visible: true,
              className: 'btn btn-success',
              closeModal: true,
            },
            confirm: {
              text: 'Confirmar',
              value: true,
              visible: true,
              className: 'btn btn-danger',
              closeModal: true
            }
          }
        }).then((result) => {
          if (result) {
            // Acción a realizar cuando el usuario confirma
            swal({
              title: 'Has confirmado salir',
              icon: 'success',
              buttons: false, // Oculta el botón de confirmación
              timer: 2000 // Duración en milisegundos
            });
            window.location.href = '<?php echo base_url(); ?>index.php/usuario/logout';
          }
        });
      });
    });
  </script>


<!-- modificar tarifa -->
<script>
  $(document).ready(function() {
    var tablaTarifas = $('#datatable').DataTable(); // Inicializa DataTable

    // Inicializa Parsley en el formulario de modificación
    $('#formModificarTarifa').parsley();

    function cargarDatos(idTarifa, tarifaVigente, tarifaMinima) {
        $('#idTarifa').val(idTarifa);
        $('#tarifaVigenteEdit').val(tarifaVigente);
        $('#tarifaMinimaEdit').val(tarifaMinima);

        $('#modalModificarTarifa').modal('show');
    }

    $('#datatable').on('click', '.editar', function() {
        var fila = $(this).closest("tr");
        var datos = tablaTarifas.row(fila).data();

        if (!datos) {
            toastr.error('Error al obtener los datos de la tarifa.');
            return;
        }

        var idTarifa = datos[0];
        var tarifaVigente = datos[1];
        var tarifaMinima = datos[2];

        cargarDatos(idTarifa, tarifaVigente, tarifaMinima);
    });

    $('#formModificarTarifa').on('submit', function(event) {
        event.preventDefault(); // Evita el envío tradicional

        // Verifica si el formulario es válido con Parsley
        if (!$(this).parsley().isValid()) {
            return; // No se envía si hay errores de validación
        }

        var idTarifa = $('#idTarifa').val();
        var tarifaMinima = $('#tarifaMinimaEdit').val().trim();
        var tarifaVigente = $('#tarifaVigenteEdit').val().trim();

        $.ajax({
            url: '<?php echo base_url("index.php/tarifa/modificar"); ?>',
            type: 'POST',
            data: {
                idTarifa: idTarifa,
                tarifaMinima: tarifaMinima,
                tarifaVigente: tarifaVigente
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(response.message);

                    tablaTarifas.clear().draw();
                    tablaTarifas.row.add([
                        idTarifa,
                        tarifaVigente,
                        tarifaMinima,
                        `<button type="button" class="btn btn-info btn-sm editar"
                            data-id="${idTarifa}"
                            onclick="cargarDatos(${idTarifa}, '${tarifaVigente}', '${tarifaMinima}')">
                            <i class="fas fa-edit"></i>
                        </button>`
                    ]).draw(false);

                    $('#modalModificarTarifa').modal('hide');
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('Error en la solicitud.');
            }
        });
    });

    // Eliminar errores cuando el usuario escriba nuevamente
    $('#tarifaMinimaEdit, #tarifaVigenteEdit').on('input', function() {
        $(this).next('.error-message').text('');
    });

    // 🛑 Nueva función: Limpiar el modal de modificación al cerrarlo
    $('#modalModificarTarifa').on('hidden.bs.modal', function () {
        $('#tarifaMinimaEdit, #tarifaVigenteEdit').val(''); // Limpiar inputs
        $('#formModificarTarifa').parsley().reset(); // Resetear validaciones de Parsley
        $('#errorTarifaMinimaEdit, #errorTarifaVigenteEdit').text(''); // Limpiar mensajes de error
    });

    window.cargarDatos = cargarDatos;
});

</script>




<!-- tarifas/insertar -->
<script>
   $(document).ready(function() {
    var tablaTarifas = $('#datatable').DataTable(); // Inicializa DataTable

    // Inicializa Parsley en el formulario
    $('#formNuevaTarifa').parsley();

    $('#formNuevaTarifa').on('submit', function(event) {
        event.preventDefault(); // Evita el envío tradicional del formulario

        // Limpiar mensajes de error previos
        $('#errorTarifaMinima, #errorTarifaVigente').text('');

        var tarifaMinima = $('#tarifaMinima1').val().trim();
        var tarifaVigente = $('#tarifaVigente1').val().trim();
        var errores = false;

        // Validación con expresiones regulares
        var formatoTarifa = /^\d{1,3}(\.\d{1})?$/;

        if (!formatoTarifa.test(tarifaMinima)) {
            $('#errorTarifaMinima').text('Debe ser un número con hasta 3 dígitos enteros y 1 decimal.');
            errores = true;
        }
        if (!formatoTarifa.test(tarifaVigente)) {
            $('#errorTarifaVigente').text('Debe ser un número con hasta 3 dígitos enteros y 1 decimal.');
            errores = true;
        }

        // Si hay errores, detener el envío
        if (errores) return;

        // Enviar datos con AJAX
        $.ajax({
            url: '<?php echo base_url("index.php/tarifa/agregar"); ?>',
            type: 'POST',
            data: {
                tarifaMinima: tarifaMinima,
                tarifaVigente: tarifaVigente
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(response.message);
                    tablaTarifas.clear().draw();
                    tablaTarifas.row.add([
                        response.id,
                        tarifaVigente,
                        tarifaMinima,
                        `<button type="button" class="btn btn-info btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalModificarTarifa"
                            onclick="cargarDatos(${response.id}, '${tarifaVigente}', '${tarifaMinima}')">
                            <i class="fas fa-edit"></i>
                        </button>`
                    ]).draw(false);

                    $('#modalNuevaTarifa').modal('hide');
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('Error en la solicitud.');
            }
        });
    });

    // Eliminar errores cuando el usuario escriba nuevamente
    $('#tarifaMinima1, #tarifaVigente1').on('input', function() {
        $(this).next('.error-message').text('');
    });

    // 🛑 Nueva función: Limpiar el modal al cerrarlo
    $('#modalNuevaTarifa').on('hidden.bs.modal', function () {
        // Limpiar los inputs
        $('#tarifaMinima1, #tarifaVigente1').val('');

        // Resetear validaciones de Parsley
        $('#formNuevaTarifa').parsley().reset();

        // Limpiar los mensajes de error
        $('#errorTarifaMinima, #errorTarifaVigente').text('');
    });
});


</script>


<!-- tarifas / mostrar lista eliminados con botón volver -->

<script>
     
    $(document).ready(function() {
        var tablaTarifas = $('#datatable').DataTable(); // Inicializar DataTable

        var btnVolver = $('#btnVolver'); // Botón "Volver"
        var tituloTarifas = $('#tituloTarifas'); // Título de la tabla
        var contenedorAgregar = $('#btnAgregarTarifa').closest('.card'); // Contenedor del botón "+"
        var contenedorEliminar = $('#btnVerEliminadas').closest('.card'); // Contenedor del botón "🗑️"

        // 🔹 Evento para mostrar las tarifas eliminadas
        $('#btnVerEliminadas').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: '<?php echo base_url("index.php/tarifa/getTarifasEliminadas"); ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        tablaTarifas.clear().draw();

                        // ✅ Cambiar encabezado y mostrar botón "Volver"
                        tituloTarifas.text("Tarifas Eliminadas");
                        btnVolver.show();

                        // ✅ Ocultar completamente los contenedores de los botones
                        contenedorAgregar.css('display', 'none');
                        contenedorEliminar.css('display', 'none');

                        // ✅ Agregar tarifas eliminadas a la tabla
                        $.each(response.data, function(index, tarifa) {
                            tablaTarifas.row.add([
                                tarifa.idTarifa,
                                tarifa.tarifaVigente,
                                tarifa.tarifaMinima,
                                tarifa.fechaActualizacion
                            ]).draw(false);
                        });

                        console.log("Tarifas eliminadas mostradas.");
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function() {
                    toastr.error('Error al cargar tarifas eliminadas.');
                }
            });
        });

        // 🔹 Evento para volver a la lista de tarifas habilitadas
        $('#btnVolver').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: '<?php echo base_url("index.php/tarifa/getTarifasHabilitadas"); ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        tablaTarifas.clear().draw();

                        // ✅ Restaurar encabezado y ocultar botón "Volver"
                        tituloTarifas.text("Gestionar Tarifas");
                        btnVolver.hide();

                        // ✅ Mostrar los contenedores de los botones nuevamente
                        contenedorAgregar.css('display', 'block');
                        contenedorEliminar.css('display', 'block');

                        // ✅ Agregar tarifas habilitadas a la tabla
                        $.each(response.data, function(index, tarifa) {
                            tablaTarifas.row.add([
                                tarifa.idTarifa,
                                tarifa.tarifaVigente,
                                tarifa.tarifaMinima,
                                `<button type="button" class="btn btn-info btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalModificarTarifa"
                                    onclick="cargarDatos(${tarifa.idTarifa}, '${tarifa.tarifaVigente}', '${tarifa.tarifaMinima}')">
                                    <i class="fas fa-edit"></i>
                                </button>`
                            ]).draw(false);
                        });

                        console.log("Tarifas habilitadas mostradas.");
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function() {
                    toastr.error('Error al cargar tarifas habilitadas.');
                }
            });
        });

        // 🔹 Ocultar el botón "volver" cuando se carga la página
        btnVolver.hide();
    });


</script>



  </body>

  </html>