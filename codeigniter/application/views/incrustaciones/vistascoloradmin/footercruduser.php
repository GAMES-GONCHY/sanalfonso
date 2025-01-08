  <div id="footer" class="app-footer mx-0 px-0">
    <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
  </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- END APP HEADER -->

<!-- modal para configuraciones de datalogger -->
<div class="modal modal-pos-booking fade" id="modalPosBooking">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
            <div class="modal-header text-white" style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
                <h5 class="modal-title d-flex align-items-center" style="font-size: 1.4rem; font-weight: bold;">
                    <img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" height="30" class="me-2" />
                    Configuraciones
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #f4f6f9; padding: 30px;">
                <form id="form-config-datalogger">
                    <!-- Input oculto para idDatalogger -->
                    <input type="hidden" id="idDatalogger" name="idDatalogger" value="">

                    <!-- Input para IP -->
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control modern-input" id="IP" name="IP">
                        <label for="ipDatalogger" class="text-muted">Dirección IP</label>
                    </div>

                    <!-- Input para Puerto -->
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control modern-input" id="puerto" name="puerto">
                        <label for="puertoDatalogger" class="text-muted">Puerto</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light border-0 d-flex justify-content-end" style="padding: 20px;">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal" style="font-size: 1rem; padding: 10px 20px; border-radius: 8px;">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarConfiguracion" style="font-size: 1rem; padding: 10px 20px; border-radius: 8px;">Guardar</button>
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

  <!-- Upload -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-tmpl/js/tmpl.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-load-image/js/load-image.all.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-canvas-to-blob/js/canvas-to-blob.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-process.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-image.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-audio.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-video.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-validate.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/js/jquery.fileupload-ui.js"></script>

  <!-- inputMask -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/inputmask.min.js"></script>
  <script>
  $(document).ready(function() {

      Inputmask({
          alias: "ip",
          placeholder: "0.0.0.0"
      }).mask("#IP");
  });
  </script>

  <script>
    $('#fileupload').fileupload({
      autoUpload: false,
      disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
      maxFileSize: 5000000,
      acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
    });

    $('#fileupload').bind('fileuploadadd', function(e, data) {

    });

    $('#fileupload').bind('fileuploadfail', function(e, data) {

    });
  </script>
  <!-- FIN INCRUSTACIONES ADICIONALES UPLOAD -->




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

    Parsley.setLocale('es');

    // Agrega una regla personalizada para caracteres especiales y espacios en blanco al inicio o al final
    Parsley.addValidator('noSpecialChars', {
        requirementType: 'string',
        validateString: function(value) {
            const pattern = /^[a-zA-Z0-9\s]+$/; // Permite solo letras, números y espacios
            return pattern.test(value) && value.trim() === value; // Verifica también los espacios al inicio/final
        },
        messages: {
            es: "Este campo no debe contener caracteres especiales ni tener espacios al inicio o al final."
        }
    });

    // Agrega una regla personalizada para validar correos electrónicos que contengan "@" y terminen en ".com"
    Parsley.addValidator('customEmailValidation', {
        requirementType: 'string',
        validateString: function(value) {
            return value.includes('@') && value.endsWith('.com');
        },
        messages: {
            es: "El correo electrónico debe contener '@' y terminar en '.com'."
        }
    });

    // Configuración global de Parsley para aplicar estilos a los mensajes de error
    Parsley.on('field:error', function() {
        this.$element.nextAll('.parsley-errors-list').find('li').css('color', 'red');
    });

    Parsley.on('field:validate', function() {
        // Aplica a todos los campos de texto excepto algunos que puedas excluir, si es necesario
        if (this.$element.is('input[type="text"]')) {
            this.$element.attr('data-parsley-no-special-chars', '');
            this.$element.attr('data-parsley-no-special-chars-message', 'Este campo no debe contener caracteres especiales ni tener espacios al inicio o al final.');
        }
    });
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
           
            swal({
              title: 'Has confirmado salir',
              icon: 'success',
              buttons: false, 
              timer: 2000 
            });
            window.location.href = '<?php echo base_url(); ?>index.php/usuario/logout';
          }
        });
      });
    });
  </script>

<!-- sweet alert agragar usuario -->
<script>
  $(document).ready(function() {
      <?php if ($this->session->flashdata('mensaje')): ?>
          var alertType = '<?php echo $this->session->flashdata('alert_type'); ?>';
          var mensaje = '<?php echo $this->session->flashdata('mensaje'); ?>';
          
          swal({
              title: alertType === 'success' ? 'Éxito' : 'Error',
              icon: alertType === 'success' ? 'success': 'error',
              text: mensaje,
              type: alertType, // 'success', 'error', 'warning'
              buttons: false,
              timer: 2000,
              showConfirmButton: true
          }).then(function() {
              <?php if ($this->session->flashdata('alert_type') === 'success'): ?>
                  
              <?php endif; ?>
          });
      <?php endif; ?>
  });
</script>



    <script>
        function cargarDatos(idDatalogger)
        {
            var row = $('#datatable tbody').find('tr[data-id="' + idDatalogger + '"]');
            var IP = row.find('.ip').text();
            var puerto = row.find('.puerto').text();

            // Asignar los valores actualizados a los inputs del modal
            $('#idDatalogger').val(idDatalogger);
            $('#IP').val(IP);
            $('#puerto').val(puerto);
        }

        $('#btnGuardarConfiguracion').on('click', function() {
            // Obtener los valores de los inputs en el modal
            var idDatalogger = $('#idDatalogger').val();
            var IP = $('#IP').val();
            var puerto = $('#puerto').val();

            // Enviar los datos mediante AJAX
            $.ajax({
                url: '<?php echo base_url("index.php/datalogger/configurar_datalogger"); ?>',
                type: 'POST',
                data: {
                    idDatalogger: idDatalogger,
                    IP: IP,
                    puerto: puerto
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $('#modalPosBooking').modal('hide'); // Cerrar el modal

                        // Actualizar los valores en la fila correspondiente del DataTable
                        var row = $('#datatable tbody').find('tr[data-id="' + idDatalogger + '"]');

                        // Actualizar las celdas de IP y Puerto en esa fila
                        row.find('.ip').text(IP);
                        row.find('.puerto').text(puerto);

                        // Si estás utilizando DataTables, podrías necesitar redibujar la tabla
                        window.tablaDatalogger.draw(false); // Redibuja la tabla si es necesario
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function() {
                    toastr.error('Error al actualizar la configuración. Inténtalo de nuevo.');
                }
            });
        });

        // Detectar la tecla Enter en el modal
        $('#modalPosBooking').on('keypress', function(e) {
            // 13 es el código de la tecla Enter
            if (e.which === 13) {
                e.preventDefault(); // Evita el envío del formulario
                $('#btnGuardarConfiguracion').click(); // Simula el clic en el botón Guardar
            }
        });
    </script>

    <!-- dashabilitar datalogger -->
    <script>
        $(document).ready(function() {
            window.tablaDatalogger = $('#datatable').DataTable();
        });
        function eliminarDatalogger(idDatalogger)
        {
            // Confirmación de eliminación con SweetAlert 1
            swal({
                title: "¿Estás seguro?",
                text: "Es posible revertir esta acción",
                icon: "warning",
                buttons: ["Cancelar", "Sí, deshabilitar"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete)
                {
                    $.ajax({
                        url: '<?php echo base_url("index.php/datalogger/eliminar_datalogger"); ?>',
                        type: 'POST',
                        data: { idDatalogger: idDatalogger },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success')
                            {
                                toastr.success(response.message);
                                // Verificar si el DataTable está definido
                                if (window.tablaDatalogger) {
                                    // Encontrar y eliminar la fila correspondiente
                                    var row = $('#datatable tbody').find('tr[data-id="' + idDatalogger + '"]');
                                    window.tablaDatalogger.row(row).remove().draw(false); // Actualiza la tabla sin recargar
                                }
                                else
                                {
                                    console.error('DataTable no está inicializado o disponible.');
                                }
                            }
                            else
                            {
                                toastr.error(response.message);
                            }
                        },
                        error: function() {
                            toastr.error('Error al intentar eliminar. Inténtalo de nuevo.');
                        }
                    });
                }
                else
                {
                    toastr.info('Eliminación cancelada');
                }
            });
        }
    </script>

    <!-- restaurar datalogger -->
    <script>
        function restaurarDatalogger(idDatalogger)
        {
            $.ajax({
                url: "<?php echo base_url('index.php/datalogger/restaurar_datalogger'); ?>",
                type: "POST",
                data: { id: idDatalogger },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success("Datalogger restaurado con éxito");

                        // Verifica si el DataTable está definido
                        if (window.tablaDatalogger) {
                            // Encuentra y elimina la fila correspondiente si existe
                            var row = $('#datatable tbody').find('tr[data-id="' + idDatalogger + '"]');
                            if (row.length) {
                                window.tablaDatalogger.row(row).remove().draw(false); // Actualiza la tabla sin recargar
                            } else {
                                console.error('La fila con ID ' + idDatalogger + ' no se encontró en la tabla.');
                            }
                        } else {
                            console.error('DataTable no está inicializado o disponible.');
                        }
                    } else {
                        toastr.error("Error al restaurar el datalogger");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("Error: " + error);
                    console.log("Response Text: " + xhr.responseText);
                    toastr.error("Ocurrió un error al intentar restaurar. Inténtalo de nuevo.");
                }
            });
        }
    </script>

    <!-- deshabilitar medidor -->
    <script>
        $(document).ready(function() {
            window.tablaMedidor = $('#datatable').DataTable(); // Inicializa DataTable para los medidores
        });

        function deshabilitarMedidor(idMedidor) {
            // Confirmación de eliminación con SweetAlert 1
            swal({
                title: "¿Estás seguro?",
                text: "Es posible revertir esta acción",
                icon: "warning",
                buttons: ["Cancelar", "Sí, deshabilitar"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '<?php echo base_url("index.php/medidor/deshabilitar_medidor"); ?>', // URL del controlador para eliminar el medidor
                        type: 'POST',
                        data: { idMedidor: idMedidor },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                toastr.success(response.message);
                                // Verificar si el DataTable está definido
                                if (window.tablaMedidor) {
                                    // Encontrar y eliminar la fila correspondiente
                                    var row = $('#datatable tbody').find('tr[data-id="' + idMedidor + '"]');
                                    window.tablaMedidor.row(row).remove().draw(false); // Actualiza la tabla sin recargar
                                }
                                else
                                {
                                    console.error('DataTable no está inicializado o disponible.');
                                }
                            }
                            else
                            {
                                toastr.error(response.message);
                            }
                        },
                        error: function()
                        {
                            toastr.error('Error al intentar Deshabilitar. Inténtalo de nuevo.');
                        }
                    });
                }
                else
                {
                    toastr.info('Eliminación cancelada');
                }
            });
        }
    </script>

    <!-- habilitar medidores -->
    <script>
        function habilitarMedidor(idMedidor)
        {
            $.ajax({
                url: "<?php echo base_url('index.php/medidor/habilitar_medidor'); ?>",
                type: "POST",
                data: { id: idMedidor },
                dataType: 'json',
                success: function(response)
                {
                    if (response.status === 'success')
                    {
                        toastr.success("Medidor restaurado con éxito");
                        // Verifica si el DataTable está definido
                        if (window.tablaMedidor)
                        {
                            // Encuentra y elimina la fila correspondiente si existe
                            var row = $('#datatable tbody').find('tr[data-id="' + idMedidor + '"]');
                            if (row.length)
                            {
                                window.tablaMedidor.row(row).remove().draw(false); // Actualiza la tabla sin recargar
                            }
                            else
                            {
                                console.error('La fila con ID ' + idMedidor + ' no se encontró en la tabla.');
                            }
                        }
                        else
                        {
                            console.error('DataTable no está inicializado o disponible.');
                        }
                    }
                    else
                    {
                        toastr.error("Error al habilitar el medidor");
                    }
                },
                error: function(xhr, status, error)
                {
                    console.log("Status: " + status);
                    console.log("Error: " + error);
                    console.log("Response Text: " + xhr.responseText);
                    toastr.error("Ocurrió un error al intentar restaurar. Inténtalo de nuevo.");
                }
            });
        }
    </script>

    </body>

    </html>