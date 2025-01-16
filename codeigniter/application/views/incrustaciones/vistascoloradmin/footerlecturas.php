  <div id="footer" class="app-footer mx-0 px-0">
    <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
  </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- END APP HEADER -->

  <!-- Modal para ingresar nueva lectura -->
  <div class="modal fade" id="modalNuevaLectura" role="dialog" data-parsley-validate="true" aria-labelledby="modalNuevaLecturaLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="border-radius: 10px; overflow: hidden; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
              <!-- Header con diseño mejorado -->
              <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 2px solid #007bff;">
                  <h5 class="modal-title" style="color: #007bff; font-weight: bold; font-size: 18px;" id="modalNuevaLecturaLabel">
                      Ingrese una nueva lectura
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body" style="padding: 20px; font-family: Arial, sans-serif; color: #333;">
                  <!-- Información del socio con diseño en dos filas -->
                  <div class="mb-3" style="background: #f5f5f5; padding: 15px; border-radius: 8px; box-shadow: inset 0px 1px 5px rgba(0, 0, 0, 0.1);">
                      <div class="row">
                          <div class="col-6">
                              <p style="margin: 0; padding: 5px 0; font-size: 14px;">
                                  <strong style="color: #0056b3;">Código Socio:</strong> 
                                  <span id="codigo-socio" style="color: #333;"></span>
                              </p>
                              <p style="margin: 0; padding: 5px 0; font-size: 14px;">
                                  <strong style="color: #0056b3;">Lectura Actual:</strong> 
                                  <span id="lectura-actual" style="color: #333;"></span>
                              </p>
                          </div>
                          <div class="col-6">
                              <p style="margin: 0; padding: 5px 0; font-size: 14px;">
                                  <strong style="color: #0056b3;">Socio:</strong> 
                                  <span id="nombre-socio" style="color: #333;"></span>
                              </p>
                              <p style="margin: 0; padding: 5px 0; font-size: 14px;">
                                  <strong style="color: #0056b3;">Periodo:</strong> 
                                  <span id="fecha-lectura" style="color: #333;"></span>
                              </p>
                          </div>
                      </div>
                  </div>

                  <form id="formNuevaLectura">
                      <div class="form-group mb-3">
                          <label for="nuevaLectura" class="form-label" style="font-weight: bold; color: #007bff;">Ingresar nueva lectura</label>
                          <input type="number" 
                              name="nuevaLectura" 
                              id="nuevaLectura" 
                              class="form-control" 
                              required
                              min="1" 
                              max="999999" 
                              step="1"
                              data-parsley-min="1" 
                              data-parsley-max="999999"
                              data-parsley-trigger="input" 
                              placeholder="Ejemplo: 123456" 
                              style="width: 100%; padding: 12px; font-size: 16px; border-radius: 8px; border: 1px solid #ccc; box-shadow: inset 0px 2px 5px rgba(0, 0, 0, 0.1);">  
                          <input type="text" id="idMembresia" name="idMembresia">
                          <input type="hidden" id="lecturaActual" name="lecturaActual">
                          <input type="hidden" id="ci" name="ci">
                          <input type="hidden" id="cont" name="cont">
                      </div>
                      
                  </form>
                  <div class="modal-footer" style="border-top: 2px solid #ddd; display: flex; justify-content: space-between;">
                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" style="padding: 10px 20px; font-size: 14px; border-radius: 5px; border: 1px solid #dc3545;">
                          Cerrar
                      </button>
                      <button type="button" id="btnRegistrarNuevaLectura" class="btn btn-outline-success" style="padding: 10px 20px; font-size: 14px; border-radius: 5px; border: 1px solid #28a745;">
                          Registrar
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- modal modificar lectura -->
  <div class="modal fade" id="modalModificarLectura" role="dialog" data-parsley-validate="true" aria-labelledby="modalModificarLecturaLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="border-radius: 10px; overflow: hidden; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
              <!-- Header con diseño mejorado -->
              <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 2px solid #b88d30;">
                  <h5 class="modal-title" style="color: #b88d30; font-weight: bold; font-size: 18px;" id="modalModificarLecturaLabel">
                      Modificar Lectura
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body" style="padding: 20px; font-family: Arial, sans-serif; color: #333;">
                  <!-- Información del socio con diseño en dos filas -->
                  <div class="mb-3" style="background: #f5f5f5; padding: 15px; border-radius: 8px; box-shadow: inset 0px 1px 5px rgba(0, 0, 0, 0.1);">
                      <div class="row">
                          <div class="col-6">
                              <p style="margin: 0; padding: 5px 0; font-size: 14px;">
                                  <strong style="color: #b88d30;">Socio:</strong> 
                                  <span id="nombre-socio-modificar" style="color: #333;"></span>
                              </p>
                              <p style="margin: 0; padding: 5px 0; font-size: 14px;">
                                <strong style="color: #b88d30;">Periodo:</strong> 
                                <span id="fecha-lectura-modificar" style="color: #333;"></span>
                              </p>
                          </div>
                          <div class="col-6">
                              <p style="margin: 0; padding: 5px 0; font-size: 14px;">
                                <strong style="color: #b88d30;">Código Socio:</strong> 
                                <span id="codigo-socio-modificar" style="color: #333;"></span>
                              </p>
                              
                          </div>
                      </div>
                  </div>

                  <form id="formModificarLectura">
                    <div class="row g-3 mb-4">
                      <!-- Input para Modificar Lectura Actual -->
                      <div class="col-md-6">
                          <div class="form-floating">
                              <input type="number" 
                                    class="form-control modern-input" 
                                    id="lecturaActualMod" 
                                    name="lecturaActualMod" 
                                    placeholder="Modificar Lectura"
                                    required
                                    min="1" 
                                    max="999999" 
                                    step="1">
                              <label for="nuevaLecturaModificar" class="text-muted">Modificar Lectura Actual</label>
                          </div>
                      </div>

                      <!-- Input para Lectura Anterior -->
                      <div class="col-md-6">
                          <div class="form-floating">
                              <input type="number" 
                                    class="form-control modern-input" 
                                    id="lecturaAnteriorMod" 
                                    name="lecturaAnteriorMod" 
                                    placeholder="Lectura Anterior"
                                    readonly
                                    style="
                                        background-color: #e9ecef; 
                                        border: 1px solid #ccc; 
                                        color: #6c757d; 
                                        pointer-events: none; 
                                        font-weight: bold; 
                                        box-shadow: none;">
                              <label for="lecturaAnteriorMod" class="text-muted" style="color: #adb5bd;">Lectura Anterior</label>
                          </div>
                      </div>

                    </div>
                    <input type="hidden" id="idLectura" name="idLectura">
                  </form>
                  <div class="modal-footer" style="border-top: 2px solid #ddd; display: flex; justify-content: space-between;">
                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" style="padding: 10px 20px; font-size: 14px; border-radius: 5px; border: 1px solid #dc3545;">
                          Cerrar
                      </button>
                      <button type="button" id="btnGuardarModificacionLectura" class="btn btn-outline-success" style="padding: 10px 20px; font-size: 14px; border-radius: 5px; border: 1px solid #28a745;">
                          Guardar Cambios
                      </button>
                  </div>
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
  <script>
    var rutaObtenerLecturas = '<?php echo base_url(); ?>index.php/lectura/obtenerLecturas';
  </script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo3.js"></script>
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

<!-- insertar nueva lectura -->
<script>
  function cargarLectura(fechaFormateada, lecturaActual, codigoSocio, nombreSocio, ci, idMembresia, cont)
  {

    console.log('Entrando a cargarLectura...');
    console.log('Datos recibidos:', { fechaFormateada, lecturaActual, codigoSocio, nombreSocio, ci });
    
    var form = $('#formNuevaLectura').parsley();
    form.reset(); // Resetea el estado de validación de Parsley
    document.getElementById('nuevaLectura').classList.remove('parsley-error'); // Elimina la clase de error si quedó activa

    // Asignar los valores a los campos del modal

    document.getElementById('fecha-lectura').textContent = fechaFormateada;
    document.getElementById('lectura-actual').textContent = lecturaActual;
    document.getElementById('codigo-socio').textContent = codigoSocio;
    document.getElementById('nombre-socio').textContent = nombreSocio;
    document.getElementById('ci').value = ci;
    document.getElementById('cont').value = cont;
    document.getElementById('idMembresia').value = idMembresia;
    document.getElementById('lecturaActual').value = lecturaActual;
    // Limpia el campo de nueva lectura
    document.getElementById('nuevaLectura').value = '';
  }


        $('#btnRegistrarNuevaLectura').on('click', function()
        {
              // Capturar los datos del formulario
              const formData = {
                  nuevaLectura: $('#nuevaLectura').val(),
                  idMembresia: $('#idMembresia').val(),
                  ci: $('#ci').val(),
                  lecturaAnterior: $('#lecturaActual').val(),
                  cont: $('#cont').val(),
              };
              // Verificar los datos capturados antes de enviarlos
              console.log('Datos capturados para el envío:', formData);

              // Enviar los datos mediante AJAX
              $.ajax({
                  url: '<?php echo base_url("index.php/lectura/insertarnuevalectura"); ?>',
                  type: 'POST',
                  data: formData,
                  dataType: 'json',
                  success: function (response) {
                      if (response.status === 'success') {
                          toastr.success(response.message);
                          $('#modalNuevaLectura').modal('hide');

                          // Recargar la tabla con los datos actualizados
                          window.tablaLecturas.ajax.reload(null, false); // false para mantener la posición actual
                      } else {
                          toastr.error(response.message || 'Error al registrar la lectura.');
                      }
                  },
                  error: function(xhr, status, error) {
                      toastr.error('Error al intentar registrar la lectura. Inténtelo nuevamente.');
                      console.error('Error AJAX:', {
                          status: status,
                          error: error,
                          response: xhr.responseText
                      });
                  }
              });
          });
</script>


<!-- editar lectura -->
<script>
  function modificarLectura(fechaLectura, lecturaActual, lecturaAnterior, codigoSocio, nombreSocio, idLectura)
  {
      // Carga los datos en los campos del modal
      document.getElementById('codigo-socio-modificar').textContent = codigoSocio;
      document.getElementById('nombre-socio-modificar').textContent = nombreSocio;
      document.getElementById('fecha-lectura-modificar').textContent = fechaLectura;
      $('#lecturaActualMod').val(lecturaActual);
      $('#lecturaAnteriorMod').val(lecturaAnterior);
      $('#idLectura').val(idLectura);


      // Mostrar el modal después de cargar los datos
    $('#modalModificarLectura').modal('show');
  }
  $('#btnGuardarModificacionLectura').on('click', function()
  {
    // Limpia el campo de nueva lectura
    document.getElementById('nuevaLectura').value = '';
    // Capturar los datos del formulario
    const formData = {
        lectuActual: $('#lecturaActualMod').val(),
        idLectura: $('#idLectura').val(),
    };
    
    
    // Verificar los datos capturados antes de enviarlos
    console.log('Datos capturados para el envío:', formData);
    
    $.ajax({
        url: '<?php echo base_url("index.php/lectura/modificarLectura"); ?>',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                toastr.success(response.message);
                $('#modalModificarLectura').modal('hide');

                // Recargar la tabla con los datos actualizados
                window.tablaLecturas.ajax.reload(null, false); // false para mantener la posición actual
            } else {
                toastr.error(response.message || 'Error al modificar la lectura.');
            }
        },
        error: function(xhr, status, error) {
            toastr.error('Error al intentar modificar la lectura. Inténtelo nuevamente.');
            console.error('Error AJAX:', {
                status: status,
                error: error,
                response: xhr.responseText
            });
        }
    });
  });
  
</script>










  </body>

  </html>