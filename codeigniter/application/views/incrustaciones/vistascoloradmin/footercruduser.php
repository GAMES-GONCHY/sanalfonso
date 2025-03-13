  <div id="footer" class="app-footer mx-0 px-0">
  <h5 class="mb-0">© <?php echo date("Y"); ?> <b>Aqua</b>ReadPro • by <span class="arrow">::::</span> 𝓖𝒾𝓖𝒾 - G@〽️€💲 ✦ All Rights Reserved</h5>
  </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- END APP HEADER -->

<!-- MODAL PARA AGREGAR ADMINISTRADORES -->
  <div class="modal fade" id="modalAgregarAdmin">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0">
      <!-- Encabezado del modal -->
      <div class="modal-header">
        <h4 class="modal-title">Nuevo Administrador</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Cuerpo del modal -->
      <div class="modal-body">
        <form id="formAgregarAdmin" data-parsley-validate>
          <input type="hidden" name="rol" value="<?= $rol; ?>"> <!-- Rol oculto -->
          <div class="row">
            <!-- Columna izquierda -->
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Nickname *</label>
                <!-- <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" required data-parsley-trigger="keyup"> -->
                <input class="form-control" type="text" id="nickname" name="nickname"
                    placeholder="Nickname"
                    required
                    data-parsley-minlength="4"
                    data-parsley-minlength-message="El Nickname debe tener al menos 4 caracteres."
                    data-parsley-maxlength="15"
                    data-parsley-maxlength-message="El Nickname no puede superar los 15 caracteres."
                    data-parsley-trigger="keyup change">
              </div>
              <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                    required
                    data-parsley-minlength="4"
                    data-parsley-minlength-message="El Nombre debe tener al menos 4 caracteres."
                    data-parsley-maxlength="15"
                    data-parsley-maxlength-message="El Nombre no puede superar los 15 caracteres."
                    data-parsley-trigger="keyup change">
              </div>
              <div class="mb-3">
                <label class="form-label">Primer Apellido *</label>
                <input type="text" class="form-control" id="primerapellido" name="primerApellido" placeholder="Primer Apellido"
                    required
                    data-parsley-minlength="4"
                    data-parsley-minlength-message="El Primer Apellido debe tener al menos 4 caracteres."
                    data-parsley-maxlength="15"
                    data-parsley-maxlength-message="El Primer Apellido no puede superar los 15 caracteres."
                    data-parsley-trigger="keyup change">
              </div>
              <div class="mb-3">
                <label class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="segundoapellido" name="segundoApellido" placeholder="Segundo Apellido"
                    data-parsley-minlength="4"
                    data-parsley-minlength-message="El Segundo Apellido debe tener al menos 4 caracteres."
                    data-parsley-maxlength="15"
                    data-parsley-maxlength-message="El Segundo Apellido no puede superar los 15 caracteres."
                    data-parsley-trigger="keyup change">
              </div>
            </div>

            <!-- Columna derecha -->
            <div class="col-md-6">
                
                <div class="mb-3">
                    <label class="form-label">CI*</label>
                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Cédula de identidad"
                        required
                        data-parsley-pattern="^[a-zA-Z0-9]+(-[a-zA-Z0-9]+)*$"
                        data-parsley-pattern-message="Solo se permiten letras, números y un guion opcional seguido de alfanumérico, sin caracteres especiales ni espacios."
                        data-parsley-trigger="keyup change">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                        required
                        data-parsley-type="email" 
                        data-parsley-custom-email-validation 
                        data-parsley-custom-email-validation-message="El correo electrónico debe contener '@' y terminar en '.com'.">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Fono *</label>
                    <input type="text" class="form-control" id="fono" name="fono" placeholder="Teléfono"
                        required
                        data-parsley-type="digits" 
                        data-parsley-min="60000000" 
                        data-parsley-min-message="El número debe tener al menos 8 dígitos y debe empezar mínimamente con 6."
                        data-parsley-max="79999999" 
                        data-parsley-max-message="El número no puede exceder 8 dígitos.">
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label">Género *</label>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" value="M" required>
                        <label class="form-check-label">Masculino</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" value="F" required>
                        <label class="form-check-label">Femenino</label>
                    </div>
                </div> -->

                <div class="mb-3">
                    <label class="form-label">Género *</label>
                    <div class="radio-group">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="genero" value="M" required>
                            <label class="form-check-label">Masculino</label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="genero" value="F" required>
                            <label class="form-check-label">Femenino</label>
                        </div>
                </div>
                <!-- El mensaje de error solo se mostrará aquí -->
                <div id="genero-error-container"></div>
</div>






            </div>
          </div>
        </form>
      </div>

      <!-- Pie del modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success w-100" id="btnGuardarAdmin">AGREGAR</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Editar Administrador -->
<div class="modal fade" id="modalEditarAdmin">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Editar Administrador</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Cuerpo del modal -->
            <div class="modal-body">
                <form id="formEditarAdmin" data-parsley-validate="true">
                    <input type="hidden" name="id"> <!-- ID oculto del usuario -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nickname *</label>
                                <!-- <input type="text" class="form-control" name="nickname" required> -->

                                <input class="form-control" type="text" name="nickname" 
                                    placeholder="Nickname" 
                                    data-parsley-no-special-chars 
                                    data-parsley-no-special-chars-message="Este campo no debe contener caracteres especiales ni tener espacios al inicio o al final." 
                                    data-parsley-required="true" />
                            </div>
                            <div class="form-group">
                                <label>Nombre *</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label>Primer Apellido *</label>
                                <input type="text" class="form-control" name="primerApellido" required>
                            </div>
                            <div class="form-group">
                                <label>Segundo Apellido</label>
                                <input type="text" class="form-control" name="segundoApellido">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CI *</label>
                                <input type="text" class="form-control" name="ci" required>
                            </div>
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Fono *</label>
                                <input type="text" class="form-control" name="fono" required>
                            </div>
                            <div class="form-group">
                                <label>Género *</label>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" value="M">
                                    <label class="form-check-label">Masculino</label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" value="F">
                                    <label class="form-check-label">Femenino</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Pie del modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnGuardarCambios">Guardar Cambios</button>
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
  <script>
    var baseUrl = "<?php echo base_url('index.php/crudusers/'); ?>";
  </script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine-crudusers.demo.js"></script>
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
        // Aplicar la validación solo si NO es el input CI
        if (this.$element.is('input[type="text"]') && this.$element.attr('id') !== 'ci') {
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






<!-- SCRIPT PARA CRUD DE ADMINISTRADORES -->
<script>
    $(document).ready(function () {
        let mostrandoDeshabilitados = false;
        let urlHabilitados = '<?php echo base_url("index.php/crudusers/obtener_habilitados/".$rol); ?>';
        let urlDeshabilitados = '<?php echo base_url("index.php/crudusers/obtener_deshabilitados/".$rol); ?>';

        function cargarAdministradores(url) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log("Respuesta recibida:", response);
                    let tbody = '';

                    if (response.status === 'success' && response.data.length > 0) {
                        let count = 1;

                        response.data.forEach(admin => {
                            tbody += `
                                <tr>
                                    <td width="1%">${count++}</td>
                                    <td width="1%"><img src='${admin.foto ? "<?php echo base_url('uploads/usersphoto/'); ?>" + admin.foto : "<?php echo base_url('coloradmin/assets/img/logo/logomenu.png'); ?>"}' width='40' height='40'></td>
                                    ${<?php echo $rol; ?> == 0 ? `<td>${admin.codigo}</td>` : ''}
                                    <td>${admin.nombre}</td>
                                    <td>${admin.primerApellido}</td>
                                    <td>${admin.segundoApellido}</td>
                                    <td>${admin.ci}</td>
                                    <td>${admin.email}</td>
                                    <td>${admin.fono}</td>
                                    <td>${admin.fechaRegistro}</td>
                                    <td class="text-center">
                                        ${mostrandoDeshabilitados ? '' : `
                                            <button class="btn btn-warning btn-icon modificarAdmin" data-id="${admin.idUsuario}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        `}
                                        <button class="btn ${mostrandoDeshabilitados ? 'btn-success' : 'btn-danger'} btn-icon cambiarEstadoAdmin"
                                            data-id="${admin.idUsuario}" 
                                            data-estado="${mostrandoDeshabilitados ? 1 : 0}">
                                            <i class="fas ${mostrandoDeshabilitados ? 'fa-plus' : 'fa-trash'}"></i>
                                        </button>
                                    </td>
                                </tr>
                            `;
                        });

                    } else {
                        tbody = ''; // Mantener vacío para que DataTables maneje el mensaje correctamente
                    }

                    if ($.fn.DataTable.isDataTable("#datatable")) {
                        $('#datatable').DataTable().destroy();
                    }

                    let tableHeaderFooter = `
                        <tr>
                            <th width="1%">No.</th>
                            <th width="1%" data-orderable="false">Perfil</th>
                            ${<?php echo $rol; ?> == 0 ? `<th>Código</th>` : ''}
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>CI</th>
                            <th>E-mail</th>
                            <th>Fono</th>
                            <th>Creado</th>
                            <th class="text-center">${mostrandoDeshabilitados ? "Restaurar" : "Acción"}</th>
                        </tr>
                    `;

                    $("#datatable thead").html(tableHeaderFooter);
                    $("#datatable tfoot").html(tableHeaderFooter);
                    $("#datatable tbody").html(tbody);

                    TableManageCombine.init();
                },
                error: function (xhr, status, error) {
                    console.error("Error en AJAX:", error);
                    toastr.error("Error al cargar los administradores.");
                }
            });
        }


        $(document).on("click", "#btnVerDeshabilitados", function () {
            mostrandoDeshabilitados = !mostrandoDeshabilitados;
            
            let nuevaURL = mostrandoDeshabilitados ? urlDeshabilitados : urlHabilitados;
            let nuevoTexto = mostrandoDeshabilitados ? "VER HABILITADOS" : "VER DESHABILITADOS";

            $(this).text(nuevoTexto);
            cargarAdministradores(nuevaURL);

            // Ocultar o mostrar el botón AGREGAR
            if (mostrandoDeshabilitados) {
                $("#btnAbrirModalAgregar").hide();
            } else {
                $("#btnAbrirModalAgregar").show();
            }
        });

        cargarAdministradores(urlHabilitados);

        var form = $("#formAgregarAdmin").parsley(); // Inicializar Parsley en el formulario

        // Validar en tiempo real cada vez que el usuario escriba
        // Deshabilitar el auto-focus moviendo el cursor manualmente al final del input actual
        $('#formAgregarAdmin input, #formAgregarAdmin select').on('keyup change', function (event) {
            form.validate(); // Ejecuta la validación en cada cambio
            $(this).focus(); // Mantiene el foco en el input actual
        });
        // Evento para abrir el modal de agregar
        $(document).on("click", "#btnAbrirModalAgregar", function () {
            let modal = $("#modalAgregarAdmin");
            let rol = $(this).data("rol"); // Capturar el rol desde el botón
            let tituloModal = (rol == 2) ? "Nuevo Administrador" : "Nuevo Socio"; // Definir el título dinámico
            if (modal.length > 0) {
                $("#modalAgregarAdmin .modal-title").text(tituloModal); // Cambia el título del modal
                modal.modal('show');
                $("#formAgregarAdmin")[0].reset();
            } else {
                console.error("Error: No se encontró el modal en el DOM.");
                toastr.error("No se encontró el modal en el DOM.");
            }
        });

        // Evento para agregar administrador
        $("#btnGuardarAdmin").click(function () {


            if (!form.validate()) { // Validar formulario antes de enviarlo
                console.log("Formulario inválido, revisa los campos.");
                return; // Detener la ejecución si hay errores
            }

            let formData = $("#formAgregarAdmin").serialize();

            $("#btnGuardarAdmin").prop("disabled", true).text("Guardando...");

            $.ajax({
                url: '<?php echo base_url("index.php/crudusers/agregarbd"); ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);

                        setTimeout(function () { 
                            $("#modalAgregarAdmin").modal('hide'); 
                        }, 1000); // Cierra el modal después de 1 segundo

                        cargarAdministradores(urlHabilitados);
                        $("#formAgregarAdmin")[0].reset(); // Resetear formulario
                        $('#formAgregarAdmin').parsley().reset(); // Resetear validaciones de Parsley
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error("Error en la solicitud.");
                },
                complete: function () {
                    $("#btnGuardarAdmin").prop("disabled", false).text("AGREGAR");
                }
            });
        });

        // Evento para modificar administrador
        $(document).on("click", ".modificarAdmin", function () {
            let idUsuario = $(this).data("id");

            $.ajax({
                url: '<?php echo base_url("index.php/crudusers/recuperarUsuario"); ?>', 
                type: 'POST',
                data: { id: idUsuario },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        let usuario = response.data;

                        $("#formEditarAdmin input[name='id']").val(usuario.idUsuario);
                        $("#formEditarAdmin input[name='nickname']").val(usuario.nickName);
                        $("#formEditarAdmin input[name='nombre']").val(usuario.nombre);
                        $("#formEditarAdmin input[name='primerApellido']").val(usuario.primerApellido);
                        $("#formEditarAdmin input[name='segundoApellido']").val(usuario.segundoApellido);
                        $("#formEditarAdmin input[name='ci']").val(usuario.ci);
                        $("#formEditarAdmin input[name='email']").val(usuario.email);
                        $("#formEditarAdmin input[name='fono']").val(usuario.fono);
                        
                        if (usuario.sexo === 'M') {
                            $("#formEditarAdmin input[name='genero'][value='M']").prop("checked", true);
                        } else {
                            $("#formEditarAdmin input[name='genero'][value='F']").prop("checked", true);
                        }

                        $("#modalEditarAdmin").modal("show");
                    } else {
                        toastr.error("Error al recuperar los datos del administrador.");
                    }
                },
                error: function () {
                    toastr.error("Error en la solicitud al servidor.");
                }
            });
        });

        // Evento para guardar cambios en la edición de administradores (RESTAURADO)
        $(document).on("click", "#btnGuardarCambios", function () {
            console.log("Intentando modificar administrador...");

            var form = $("#formEditarAdmin").parsley(); // Obtener instancia de Parsley
    
                if (!form.validate()) { // Validar formulario antes de enviarlo
                    console.log("Formulario inválido, revisa los campos.");
                    return; // Detener la ejecución si hay errores
                }


            let formData = $("#formEditarAdmin").serialize();
            console.log("Datos enviados al servidor:", formData);

            $("#btnGuardarCambios").prop("disabled", true).text("Guardando...");

            $.ajax({
                url: '<?php echo base_url("index.php/crudusers/modificarbd"); ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    console.log("Respuesta recibida:", response);

                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $("#modalEditarAdmin").modal('hide');
                        cargarAdministradores(urlHabilitados);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error("Error en la solicitud.");
                },
                complete: function () {
                    $("#btnGuardarCambios").prop("disabled", false).text("Guardar Cambios");
                }
            });
        });

        // Evento para cambiar el estado del usuario sin mensajes ni confirmaciones
        $(document).on("click", ".cambiarEstadoAdmin", function () {
            let idUsuario = $(this).data("id");
            let nuevoEstado = $(this).data("estado"); // 1 para restaurar, 2 para eliminar

            console.log("📌 Enviando datos al servidor:", { idUsuario, nuevoEstado });

            $.ajax({
                url: '<?php echo base_url("index.php/crudusers/cambiarEstado"); ?>',
                type: 'POST',
                data: { id: idUsuario, estado: nuevoEstado },
                dataType: 'json',
                success: function (response) {
                    console.log("✅ Respuesta del servidor:", response);

                    if (response.status === 'success') {
                        // Recargar tabla con los datos correctos según el estado actual
                        cargarAdministradores(mostrandoDeshabilitados
                            ? '<?php echo base_url("index.php/crudusers/obtener_deshabilitados/".$rol); ?>'
                            : '<?php echo base_url("index.php/crudusers/obtener_habilitados/".$rol); ?>'
                        );
                        toastr.success(response.message);
                    }
                    else
                    {
                        toastr.error(response.message || "Ocurrió un error inesperado.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("❌ Error en AJAX:", error);
                    toastr.error(response.message || "Ocurrió un error inesperado.");
                }
            });
        });
        $(document).ready(function () {
            let rol = <?php echo $rol; ?>; // Obtiene el rol desde PHP

            // Modificar los títulos según el rol
            if (rol === 2) {
                $("#tituloPrincipal").text("Administradores");
                $("#subtituloPanel").text("Gestionar Administradores");
            } else if (rol === 0) {
                $("#tituloPrincipal").text("Socios");
                $("#subtituloPanel").text("Gestionar Socios");
            }
        });
    });
</script>

<!-- SCRIPT PARA SETEAR EL MENSAJE DE VALIDACION PARSLEY DE FORMA ORDENADA EN EL INPUT SEXO -->
<script>
$(document).ready(function() {
    $('#formAgregarAdmin').parsley().on('field:error', function() {
        if (this.$element.attr('name') === 'genero') {
            // Previene la inserción automática de Parsley
            this.$element.closest('.radio-group').find('.parsley-errors-list').remove();
            // Inserta el mensaje solo en el contenedor correcto
            $('#genero-error-container').html('<span class="text-danger">' + this.getErrorsMessages().join('<br>') + '</span>');
        }
    }).on('field:success', function() {
        if (this.$element.attr('name') === 'genero') {
            $('#genero-error-container').html(''); // Limpia el mensaje cuando se selecciona una opción
        }
    });
});

</script>






    </body>

    </html>