<div id="footer" class="app-footer mx-0 px-0">
      <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
    </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>
  <!-- END APP HEADER -->


<!-- Modal para configuración de reportes -->
<div class="modal fade" id="modalPosBooking">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0">
      <!-- Encabezado del modal -->
      <div class="modal-header">
        <div class="d-flex align-items-center">
          <img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" />
          <h4 class="modal-title" style="font-size: 1.5rem; font-weight: bold;">Detalle del Aviso</h4>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Cuerpo del modal -->
      <div class="modal-body">
        <div class="panel-body p-0">
        <form id="formReporte" class="form-horizontal form-bordered">
            <div class="row">
              <div class="col-lg-6">
                

                  <!-- Selector de opciones (MENSUAL, ANUAL, GLOBAL) -->
                  <div class="form-group row" id="options-selector-container" style="display: none;">
                    <label class="form-label col-form-label col-lg-4" style="padding: 10px;">Opciones*</label>
                    <div class="col-lg-8" style="padding: 10px;">
                      <select id="opcionesRanking" name="opcionesRanking" class="form-select custom-select" style="width: 100%; padding: 10px; font-size: 16px; color: #333;">
                        <option value="MENSUAL">MENSUAL</option>
                        <option value="ANUAL">ANUAL</option>
                        <option value="GLOBAL">GLOBAL</option>
                      </select>
                    </div>
                  </div>
                  <!-- Selector de Mes y Año -->
                  <div class="form-group row" id="month-year-picker-container" style="display: none;">
                      <label id="monthYearLabel" class="form-label col-form-label col-lg-4" style="padding: 10px;">Mes / Año *</label>
                      <div class="col-lg-8" style="padding: 10px;">
                          <!-- Selector de Mes -->
                          <select id="monthPicker" class="form-select" style="width: 45%; display: inline-block;">
                              <option value="1">Enero</option>
                              <option value="2">Febrero</option>
                              <option value="3">Marzo</option>
                              <option value="4">Abril</option>
                              <option value="5">Mayo</option>
                              <option value="6">Junio</option>
                              <option value="7">Julio</option>
                              <option value="8">Agosto</option>
                              <option value="9">Septiembre</option>
                              <option value="10">Octubre</option>
                              <option value="11">Noviembre</option>
                              <option value="12">Diciembre</option>
                          </select>

                          <!-- Selector de Año -->
                          <select id="yearPicker" class="form-select" style="width: 45%; display: inline-block;">
                              <!-- Años generados dinámicamente -->
                          </select>
                      </div>
                  </div>


                <!-- Rango de Fechas -->
                <div class="form-group row" id="range-datepicker-container">
                  <label class="form-label col-form-label col-lg-4" style="padding: 10px;">Rango de Fechas*</label>
                  <div class="col-lg-8" style="padding: 10px;">
                    <div id="advance-daterange" class="btn btn-default d-flex text-start align-items-center" style="padding: 10px;">
                      <span class="flex-1">Seleccionar rango de fechas</span>
                      <i class="fa fa-caret-down"></i>
                    </div>
                    <input type="hidden" id="fechaInicio" name="fechaInicio">
                    <input type="hidden" id="fechaFin" name="fechaFin">
                  </div>
                </div>

                <!-- Código Usuario -->
                <div class="form-group row" id="criterio-container">
                  <label id="labelSocio" class="form-label col-form-label col-lg-4" style="padding: 10px;">Socio</label>
                  <div class="col-lg-8 position-relative" style="padding: 10px;">
                    <input type="text" class="form-control" id="criterio" name="criterio" placeholder="Ingrese apellido o código" 
                          style="border: 2px solid #343a40; color: #333333; padding: 10px;" 
                          oninput="this.value = this.value.toUpperCase();" required>
                  </div>
                </div>

                

                <!-- Contenedor de mensaje para cuando no se encuentran registros -->
                <div id="mensajeSinRegistros" style="display: none; color: #dc3545; font-weight: bold; text-align: center;">
                    No se encontraron registros para el rango de fechas seleccionado. Favor seleccione un rango de fechas diferente.
                </div>
              </div>

              <!-- Tabla de Resultados de la Búsqueda -->
              <div class="col-lg-6">
                <div id="resultadosBusqueda" style="display:none;">
                  <h5 style="color: #000;">Resultados de la Búsqueda</h5> 
                  <table class="table table-bordered table">
                    <thead>
                      <tr>
                        <th style="color: #000;">Nombre Completo</th>
                        <th style="color: #000;">Código Usuario</th>
                      </tr>
                    </thead>
                    <tbody id="tablaResultados" style="color: #000;">
                      <!-- Aquí se insertarán los resultados -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Campos ocultos para almacenar el socio seleccionado -->
            <input type="hidden" id="codigoSocioSeleccionado" name="codigoSocioSeleccionado">
            <input type="hidden" id="nombreSocioSeleccionado" name="nombreSocioSeleccionado">
            <input type="hidden" id="idMembresiaSeleccionado" name="idMembresiaSeleccionado">
            <!-- <input type="hidden" id="inputSocio" name="inputSocio"> -->
          </form>
        </div>
      </div>

      <!-- Pie del modal -->
      <div class="modal-footer" style="padding: 5px;">
        <button type="button" class="btn btn-success" id="previsualizar" style="font-size: 0.9rem; padding: 5px 10px; width: 150px;">Previsualizar</button>
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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  


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
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine-reportes.demo.js"></script>
  <!-- <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo-exportacion-pdf.js"></script> -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>




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


<!-- modal avisos -->
<script>
  $('#configModal').on('shown.bs.modal', function () {
    console.log('El modal se ha abierto.');
  });

  $('#configModal').on('hidden.bs.modal', function () {
    console.log('El modal se ha cerrado.');
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






<!-- datepicker range -->
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- TOAST NOTIFICACIONES -->
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/gritter/js/jquery.gritter.js"></script>
<!-- SCRIPT TOAST NOTIFICACIONES -->

<!-- selector de mes y año tipo reporte ranking -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>





<script>
  window.tipoReporte = '';
  window.flag=false;
</script>

<!-- script para datepicker range -->
<script>
$(document).ready(function() {
  // Inicializar daterangepicker
  $("#advance-daterange").daterangepicker({
        opens: "right",  // Asegura que se abra hacia la derecha
        // drops: "center",
        locale: {
          format: "DD/MM/YYYY",
          separator: " a ",
          applyLabel: "Aplicar",
          cancelLabel: "Cancelar",
          fromLabel: "Desde",
          toLabel: "Hasta",
          customRangeLabel: "Personalizado",
          daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
          monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          firstDay: 1
        },
        showDropdowns: true, // Habilita el selector de mes y año
        minDate: "01/01/2023", // Fecha mínima
        maxDate: "31/12/2025", // Fecha máxima (ajústala según tus necesidades)
        ranges: {
          'Hoy': [moment(), moment()],
          'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
          'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
          'Este mes': [moment().startOf('month'), moment().endOf('month')],
          'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, function(start, end) {
        // Actualizar las fechas en los inputs ocultos
        $('#fechaInicio').val(start.format('YYYY-MM-DD'));
        $('#fechaFin').val(end.format('YYYY-MM-DD'));
        
        // Mostrar el rango seleccionado en el botón de rango de fechas
        $("#advance-daterange span").html(start.format('DD/MM/YYYY') + " a " + end.format('DD/MM/YYYY'));
    });

    

    // NUEVAS FUNCIONES
    // 1. Configuración específica para el reporte "ranking"
    function configurarRanking() {
        $('#options-selector-container').show(); // Mostrar el selector inicial
        $('#criterio-container').hide();
        $('#range-datepicker-container').hide();

        manejarCambioSelector();
    }

    // 2. Generar rango de años dinámicamente
    function generarRangoAnios() {
        $('#yearPicker').empty(); // Limpiar años existentes para evitar duplicados
        const currentYear = new Date().getFullYear();
        const startYear = 2024;
        for (let year = startYear; year <= currentYear + 2; year++) {
            $('#yearPicker').append(`<option value="${year}">${year}</option>`);
        }
    }

    // 3. Manejo del cambio en el selector de opciones
    function manejarCambioSelector()
    {
      const selectedOption = $('#opcionesRanking').val();
      console.log('Opción seleccionada:', selectedOption);

      if (selectedOption === 'MENSUAL') {
          $('#monthYearLabel').text('Mes / Año*');
          $('#month-year-picker-container').show();
          $('#monthPicker').show();
      } else if (selectedOption === 'ANUAL') {
          $('#monthYearLabel').text('Año*');
          $('#month-year-picker-container').show();
          $('#monthPicker').hide();
      } else {
          $('#month-year-picker-container').hide();
      }
    }
    // Vincular evento `change` al selector de opciones
    $('#opcionesRanking').on('change', manejarCambioSelector);



  // Actualización del título del modal y configuración de `data-reporte` al hacer clic en las tarjetas
  $('.table-booking').on('click', function() {
      var tipoReporte = $(this).data('reporte'); 
      $('#modalPosBooking').data('reporte', tipoReporte);  // Establecer `data-reporte` en el modal
      var title = $(this).data('title');
      $('#modalPosBooking .modal-title').text(title);

      console.log('Tipo de reporte:', tipoReporte);
      configurarEncabezadosTabla(tipoReporte);
      
      // Ajustar la visibilidad del contenedor `criterio-container` según el tipo de reporte
      if (tipoReporte == "avisos")
      {
          $('#criterio').removeAttr('required').attr('type', 'text'); // Campo no obligatorio para "avisos vencidos"
          $('#criterio-container').show(); // Mostrar el contenedor
          console.log('Campo criterio no es obligatorio, pero visible');
          $('#options-selector-container').hide();
          $('#range-datepicker-container').show();
          $('#month-year-picker-container').hide();

          $('#labelSocio').text('Socio (opcional)');
          
      } else if (tipoReporte == "ranking") {
          configurarRanking(); // Llama la lógica específica para ranking
          console.log('Campo criterio y etiqueta ocultos para ranking');
      } else {
          $('#criterio').attr('required', 'required').attr('type', 'text'); // Campo obligatorio para otros reportes
          $('#criterio-container').show(); // Mostrar el contenedor
          $('#range-datepicker-container').show();
          $('#options-selector-container').hide();
          $('#month-year-picker-container').hide();
          // Restablecer el texto del label a "Socio"
          $('#labelSocio').text('Socio*');
      }

      

     // Cuando el modal se muestra, habilita el scroll en el body
    $('#modalPosBooking').on('shown.bs.modal', function () {
        $('body').addClass('modal-open-scroll');
    });

    // Cuando el modal se oculta, deshabilita el scroll en el body
    $('#modalPosBooking').on('hidden.bs.modal', function () {
        $('body').removeClass('modal-open-scroll');
    });

      // Abrir el modal después de la configuración
      $('#modalPosBooking').modal('show');
  });

  // Manejar selección de mes y año
  $('#monthPicker, #yearPicker').on('change', function () {
      const selectedMonth = $('#monthPicker').val();
      const selectedYear = $('#yearPicker').val();
      console.log(`Mes seleccionado: ${selectedMonth}, Año seleccionado: ${selectedYear}`);
  });


  // Inicializar el rango de años al cargar el DOM
  generarRangoAnios();

  // Actualizar el ID del formulario a 'formReporte' en el evento 'show.bs.modal'
  $('#modalPosBooking').on('show.bs.modal', function () {
    $('#formReporte')[0].reset();  // Restablecer el formulario
    $('#criterio').removeClass('is-valid is-invalid');  // Quitar clases de validación
    $('#criterio').val('');  // Limpiar campo de socio

    $('#socioValido').hide();  // Ocultar icono de validación
    $('#resultadosBusqueda').hide();  // Ocultar resultados

    // Ocultar el mensaje de "No se encontraron registros" al mostrar el modal
    $('#mensajeSinRegistros').hide();

    // Reiniciar opciones de ranking
    $('#opcionesRanking').val('MENSUAL').trigger('change');
  });

  // Buscar socio en tiempo real cuando el usuario escribe en el campo
  $('#criterio').on('input', function() {
      //window.flag = true;
      // Limpiar los valores de los inputs ocultos
      $('#codigoSocioSeleccionado').val('');
      $('#nombreSocioSeleccionado').val('');
      $('#idMembresiaSeleccionado').val('');

      // Llamar a la función para buscar al socio
      buscarSocio();
  });

  // // Buscar socio cuando se complete el campo del código de usuario (evento blur)
  // $('#criterio').on('blur', function() {
  // buscarSocio();  // Llamar a la función buscarSocio cuando pierda el foco
  // });
  // Escuchar el evento de la tecla Enter en el campo de código de socio
  $('#criterio').on('keydown', function(e) {
    if (e.key == 'Enter') {
      e.preventDefault();  // Evitar que el formulario se envíe
      buscarSocio();  // Llamar a la función buscarSocio cuando se presione Enter
    }
  });

  // Función para buscar socio
  function buscarSocio()
  {
      var criterio = $('#criterio').val();  // Obtener el valor del campo

      if (criterio) {  // Si hay un código de usuario
          $.ajax({
              url: '<?php echo base_url("index.php/reporte/buscar_socio"); ?>',  // URL del controlador
              type: 'POST',
              data: {criterio: criterio},  // Enviar el código de usuario
              success: function(response) {
                  if (response === 'false') {
                      // Si no se encuentra el código de socio
                      $('#criterio').addClass('is-invalid');
                      $('#socioValido').hide();
                      $('#resultadosBusqueda').hide();  // Esconder tabla si no hay resultados
                  } else {
                      // Si se encuentran socios
                      $('#criterio').removeClass('is-invalid').addClass('is-valid');
                      var socios = JSON.parse(response);

                      // Mostrar la palomita verde cuando el socio es encontrado
                      $('#socioValido').show();

                      // Mostrar la tabla de resultados
                      $('#resultadosBusqueda').show();

                      // Limpiar la tabla antes de agregar nuevos resultados
                      $('#tablaResultados').empty();

                      // Insertar cada resultado en la tabla y agregar evento de selección
                      socios.forEach(function(socio) {
                          var fila = '<tr class="fila-socio" data-codigo="' + socio.codigoSocio + '" data-nombre="' + socio.nombre + '" data-idmembresia="' + socio.idMembresia + '">' +
                              '<td>' + socio.nombre + '</td>' +
                              '<td>' + socio.codigoSocio + '</td>' +
                              '</tr>';
                          $('#tablaResultados').append(fila);
                      });

                      // Agregar evento de clic a cada fila para seleccionar el socio
                      $('.fila-socio').on('click', function() {
                          // Remover la selección de otras filas
                          $('.fila-socio').removeClass('seleccionado');
                          
                          // Agregar la clase de selección a la fila clicada
                          $(this).addClass('seleccionado');
                          
                          // Almacenar los datos del socio seleccionado
                          var codigoSocio = $(this).data('codigo');
                          var nombreSocio = $(this).data('nombre');
                          var idMembresia = $(this).data('idmembresia');
                          
                          // Guardar los datos seleccionados en campos ocultos o variables globales
                          $('#codigoSocioSeleccionado').val(codigoSocio);
                          $('#nombreSocioSeleccionado').val(nombreSocio);
                          $('#idMembresiaSeleccionado').val(idMembresia);

                          
                          // Verificación de idMembresia en la consola
                          console.log('Seleccionado idMembresia en clic:', idMembresia);

                          // Depuración: Verificar los valores de los campos ocultos
                          console.log('Código Socio seleccionado:', $('#codigoSocioSeleccionado').val());
                          console.log('ID Membresia seleccionado:', $('#idMembresiaSeleccionado').val());
                      });
                  }
              }
          });
      }
  }

  function configurarEncabezadosTabla(tipoReporte)
  {
      // Destruir la tabla actual
      $('#datatable').DataTable().clear().destroy();

      // Limpiar encabezados y pie de tabla
      $('#datatable thead').empty();
      $('#datatable tfoot').empty();

      // Crear encabezados dinámicamente según el tipo de reporte
      var encabezados = '';
      var pie = '';

      if (tipoReporte === 'avisos') {
          encabezados = `
              <tr>
                  <th>No.</th>
                  <th>Socio</th>
                  <th>Código</th>
                  <th>Mes</th>
                  <th>Total [Bs.]</th>
                  <th>Saldo [Bs.]</th>
                  <th>Estado</th>
              </tr>`;
      } else if (tipoReporte === 'pagos') {
          encabezados = `
              <tr>
                  <th>No.</th>
                  <th>Mes - Año</th>
                  <th>Total [Bs.]</th>
                  <th>Fecha pago</th>
              </tr>`;
      } else if (tipoReporte === 'consumos') {
          encabezados = `
              <tr>
                  <th>No.</th>
                  <th>Mes - Año</th>
                  <th>Consumo [m3]</th>
                  <th>Observación</th>
              </tr>`;
      } else{
        encabezados = `
              <tr>
                  <th>Top</th>
                  <th>Código</th>
                  <th>Socio</th>
                  <th>Consumo [m3]</th>
                  <th>Total [Bs.]</th>
              </tr>`;
      }

      // Añadir encabezados y pie de página a la tabla
      $('#datatable thead').html(encabezados);
      $('#datatable tfoot').html(encabezados);

      // Reinicializar la tabla utilizando las configuraciones del script externo
      TableManageCombine.init();
  }

  

  // Enviar el formulario cuando se haga clic en "Previsualizar"
  $('#previsualizar').on('click', function(e)
  {
    e.preventDefault();

    var tipoReporte = $('#modalPosBooking').data('reporte');
    console.log('Tipo de reporte antes de enviar el formulario:', tipoReporte);
    window.tipoReporte = tipoReporte;
    var criterio = $('#criterio').val();
    if(criterio)
    {
      var codigoSocio = $('#codigoSocioSeleccionado').val();
      var idMembresia = $('#idMembresiaSeleccionado').val();
    }
    else
    {
      $('#codigoSocioSeleccionado').val('');
      $('#idMembresiaSeleccionado').val('');
    }
    var fechaInicio = $('#fechaInicio').val();
    var fechaFin = $('#fechaFin').val();

    // Ocultar el mensaje de "No se encontraron registros" antes de cada nueva consulta
    $('#mensajeSinRegistros').hide();

    // Validación de selección: verificar campos vacíos según el tipo de reporte
    if (tipoReporte == "consumos" || tipoReporte == "pagos")
    {
        if (!fechaInicio || !fechaFin || !codigoSocio || !idMembresia)
        {
            $.gritter.add({
                title: 'Por favor, complete todos los campos obligatorios para este tipo de reporte.',
                sticky: false,
                time: 2000,
                class_name: 'my-sticky-class gritter-dark',
            });
            return;
        }
    }
    else if (tipoReporte == "avisos")
    {
        if (!fechaInicio || !fechaFin)
        {
            $.gritter.add({
                title: 'Por favor, complete las fechas para este tipo de reporte.',
                sticky: false,
                time: 2000,
                class_name: 'my-sticky-class gritter-dark',
            });
            return;
        }
    }
    else if (tipoReporte == "ranking")
    {
        var mes = $('#monthPicker').val();
        var anio = $('#yearPicker').val();
        const currentYear = new Date().getFullYear();
        const currentMonth = new Date().getMonth() +1;

        if ($('#opcionesRanking').val() == 'GLOBAL')
        {
          mes = null;
          anio = null;
        }
        else
        {
          if ($('#opcionesRanking').val() == 'MENSUAL')
          {
            // Validar el año este presente
            if (!anio || !mes)
            {
                $.gritter.add({
                    title: 'Por favor, seleccione un mes y año para el ranking mensual.',
                    sticky: false,
                    time: 2000,
                    class_name: 'my-sticky-class gritter-dark',
                });
                return;
            }
            // Validar que el año no sea mayor al año actual
            if (parseInt(anio) > currentYear || parseInt(mes) > currentMonth)
            {
                $.gritter.add({
                    title: 'Por favor, seleccione un mes y año válidos.',
                    sticky: false,
                    time: 2000,
                    class_name: 'my-sticky-class gritter-dark',
                });
                return;
            }
          }
          else
          {
            mes = null;
            // Validar que el año no sea mayor al año actual
            if (parseInt(anio) > currentYear)
            {
                $.gritter.add({
                    title: 'Por favor, seleccione un año válido.',
                    sticky: false,
                    time: 2000,
                    class_name: 'my-sticky-class gritter-dark',
                });
                return;
            }
          }
        } 
    }
    else
    {
        $.gritter.add({
            title: 'Tipo de reporte desconocido. Por favor, intente nuevamente.',
            sticky: false,
            time: 2000,
            class_name: 'my-sticky-class gritter-dark',
        });
        return;
    }

    // Depuración: Mostrar en la consola los datos que se enviarán
    console.log('Datos enviados:', { tipoReporte, codigoSocio, fechaInicio, fechaFin, idMembresia, mes, anio });

    // Enviar datos al backend para obtener el historial de pagos, consumos, avisos o ranking
    $.ajax({
        url: '<?php echo base_url("index.php/reporte/obtener_reporte"); ?>',  // Cambia esta URL según tu ruta
        type: 'POST',
        data: (tipoReporte == 'ranking') 
        ? { 
            tipoReporte: tipoReporte,
            mes: mes,
            anio: anio,
        }
        : {
            tipoReporte: tipoReporte,
            codigoSocio: codigoSocio,
            idMembresia: idMembresia,
            fechaInicio: fechaInicio,
            fechaFin: fechaFin,
        },
        success: function(response)
        {
            console.log('Respuesta recibida:', response);
            try
            {
                var datosReporte = JSON.parse(response);

                if (datosReporte.data && datosReporte.data.length > 0)
                {
                    $('#mensajeSinRegistros').hide();  // Ocultar el mensaje de "sin registros"
                    $('#datatable').DataTable().clear();
                    $('#datatable').DataTable().columns().header().to$().each(function(index, element) {
                        $(element).text(datosReporte.headers[index]);
                    });

                    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                    let contador = 1;

                        // Llenar la tabla con los datos para el tipo de reporte "ranking"
                        if (tipoReporte == 'ranking')
                        {
                            // Formato para el ranking de consumidores (Top 5)
                            datosReporte.data.slice(0, 10).forEach(function(fila, index) { // Limitado a los 10 primeros
                                var numeroRanking = index + 1;               // Número de ranking (1 a 10)
                                var codigo = fila[1];                        // Código del socio
                                var socio = fila[2];                         // Nombre del socio
                                var consumo = parseFloat(fila[3]); // Consumo total con 2 decimales
                                var total = parseFloat(fila[4]);   // Total con 2 decimales

                                $('#datatable').DataTable().row.add([
                                    numeroRanking,
                                    codigo,
                                    socio,
                                    consumo,
                                    total
                                ]).draw();
                            });
                        }
                        else
                        {
                          datosReporte.data.forEach(function(fila)
                          {
                            if (tipoReporte == 'pagos') {
                                // Formato para pagos
                                var fechaLectura = new Date(fila[1]);
                                var mesLiteralAno = meses[fechaLectura.getMonth()] + " " + fechaLectura.getFullYear();
                                var fechaPago = new Date(fila[3]).toLocaleDateString();

                                $('#datatable').DataTable().row.add([
                                    contador++,
                                    mesLiteralAno,
                                    fila[2],
                                    fechaPago
                                ]).draw();
                            } else if (tipoReporte == 'consumos') {
                                // Formato para consumos
                                var fechaLecturaConsumo = new Date(fila[1]);
                                var mesLiteralAnoConsumo = meses[fechaLecturaConsumo.getMonth()] + " " + fechaLecturaConsumo.getFullYear();

                                $('#datatable').DataTable().row.add([
                                    contador++,
                                    mesLiteralAnoConsumo,
                                    parseFloat(fila[2]).toFixed(1),  // Formatear a dos decimales
                                    fila[3]
                                ]).draw();
                            } 
                            else if (tipoReporte == 'avisos')
                            {
                                // Formato para avisos
                                var socio = fila[1];                        // Nombre completo del socio
                                var codigoSocio = fila[2];                  // Código del socio
                                var fechaLecturaAviso = new Date(fila[3]);
                                var mesLiteralAnoLectura = meses[fechaLecturaAviso.getMonth()];
                                var total = parseFloat(fila[4]).toFixed(2); // Total con 2 decimales
                                var saldo = parseFloat(fila[5]).toFixed(2); // Saldo con 2 decimales
                                var estado = fila[6];                       // Estado del aviso

                                // Añadir la fila al DataTable
                                $('#datatable').DataTable().row.add([
                                    contador++,
                                    socio,
                                    codigoSocio,
                                    mesLiteralAnoLectura,
                                    total,
                                    saldo,
                                    estado
                                ]).draw();
                            }
                          });
                        }

                    $('#modalPosBooking').modal('hide');
                }
                else
                {
                    // Mostrar mensaje en el modal cuando no hay registros y agregar animación
                    $('#mensajeSinRegistros').fadeIn(300).delay(200).fadeOut(200).fadeIn(300); // Breve animación para llamar la atención
                    $('#datatable').DataTable().clear().draw();
                }
            }
            catch (error)
            {
                console.error('Error al interpretar la respuesta:', error);
                alert('Ocurrió un error al interpretar los datos del servidor.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud AJAX:', error);
            console.error('Detalles del error:', xhr.responseText);
            alert('Ocurrió un error al obtener el reporte. Intente nuevamente.');
        }
    });

  });
});
</script>

<!-- script para generar pdf reportes -->
<script>
  // Función para habilitar o deshabilitar el botón según los datos en la tabla
  function toggleGenerarPDFButton() {
    const tableBody = document.querySelector('#datatable tbody'); // Selecciona el cuerpo de la tabla
    const rows = tableBody.querySelectorAll('tr'); // Obtén las filas de la tabla
    const generarPDFBtn = document.getElementById('generarPDFBtn'); // Botón Generar PDF

    // Verifica si hay filas en la tabla y si no incluye "Ningún dato disponible"
    if (rows.length > 0 && !tableBody.innerText.includes('Ningún dato disponible')) {
      generarPDFBtn.disabled = false; // Habilitar botón
    } else {
      generarPDFBtn.disabled = true; // Deshabilitar botón
    }
  }

  // Ejecutar la función al cargar la página
  document.addEventListener('DOMContentLoaded', function () {
    toggleGenerarPDFButton();

    // Si usas DataTables, actualiza el estado del botón cuando la tabla cambie
    $('#datatable').on('draw.dt', function () {
      toggleGenerarPDFButton();
    });
  });

  // Evento para el botón de generar PDF
  document.getElementById('generarPDFBtn').addEventListener('click', function (e) {
    // Verificar si el botón está deshabilitado (por seguridad adicional)
    if (this.disabled) {
      e.preventDefault(); // Bloquear la acción por completo
      $.gritter.add({
        title: 'Configure el reporte antes de generar el pdf',
        sticky: false,
        time: 2000,
        class_name: 'my-sticky-class gritter-light',
      });
      return;
    }

    // Obtener los valores de los parámetros
    const codigoSocio = document.getElementById('codigoSocioSeleccionado').value;
    const socio = document.getElementById('nombreSocioSeleccionado').value;
    const idMembresia = document.getElementById('idMembresiaSeleccionado').value;
    const nombreSocio = document.getElementById('nombreSocioSeleccionado').value;

    console.log('codigo Seleccionado:', codigoSocio);
    console.log('idMembresia Seleccionado:', idMembresia);

    const fechaInicio = document.getElementById('fechaInicio').value;
    const fechaFin = document.getElementById('fechaFin').value;
    const tipoReporte = window.tipoReporte;

    // Variable para almacenar la opción de "ranking" seleccionada
    let opcionRanking = document.getElementById('opcionesRanking').value;

    console.log('opcion ranking:', opcionRanking);

    let mes = null;
    let anio = null;

    // Determinar la función a usar para cada tipo de reporte
    let funcion;
    if (tipoReporte == 'pagos') {
      funcion = 'generar_pdf_pago';
    } else if (tipoReporte == 'consumos') {
      funcion = 'generar_pdf_consumo';
    } else if (tipoReporte == 'avisos') {
      funcion = 'generar_pdf_avisos';
    } else if (tipoReporte == 'ranking') {
      funcion = 'generar_pdf_ranking';

      if (opcionRanking === 'MENSUAL') {
        mes = document.getElementById('monthPicker').value;
        anio = document.getElementById('yearPicker').value;
      } else if (opcionRanking === 'ANUAL') {
        anio = document.getElementById('yearPicker').value;
      }
    } else {
      $.gritter.add({
        title: 'Configure el reporte antes de generar el pdf',
        sticky: false,
        time: 2000,
        class_name: 'my-sticky-class gritter-light',
      });
      return;
    }

    console.log('Tipo de reporte:', tipoReporte); // Log para depuración

    // Validación de datos según el tipo de reporte
    if (['pagos', 'consumos'].includes(tipoReporte) && (!codigoSocio || !fechaInicio || !fechaFin || !idMembresia || !tipoReporte)) {
      $.gritter.add({
        title: 'Por favor, complete los campos y seleccione un socio',
        sticky: false,
        time: 2000,
        class_name: 'my-sticky-class gritter-dark',
      });
      return;
    } else if (tipoReporte == 'avisos' && (!fechaInicio || !fechaFin)) {
      $.gritter.add({
        title: 'Por favor, seleccione el rango de fechas',
        sticky: false,
        time: 2000,
        class_name: 'my-sticky-class gritter-dark',
      });
      return;
    } else if (tipoReporte == 'ranking' && opcionRanking !== 'GLOBAL' && (!anio || (opcionRanking === 'MENSUAL' && !mes))) {
      $.gritter.add({
        title: 'Por favor, complete los datos necesarios para el reporte ranking.',
        sticky: false,
        time: 2000,
        class_name: 'my-sticky-class gritter-dark',
      });
      return;
    }

    // Crear un formulario en JavaScript
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '<?php echo base_url('index.php/reporte/'); ?>' + funcion;
    form.target = '_blank';

    // Crear inputs ocultos para enviar los datos
    const inputs = [
      { name: 'codigoSocio', value: (tipoReporte == 'ranking') ? '' : codigoSocio },
      { name: 'socio', value: (tipoReporte == 'ranking') ? '' : socio },
      { name: 'idMembresia', value: (tipoReporte == 'ranking') ? '' : idMembresia },
      { name: 'fechaInicio', value: (tipoReporte == 'ranking') ? '' : fechaInicio },
      { name: 'fechaFin', value: (tipoReporte == 'ranking') ? '' : fechaFin },
      { name: 'tipoReporte', value: tipoReporte },
      { name: 'mes', value: mes },
      { name: 'anio', value: anio },
      { name: 'opcionRanking', value: opcionRanking },
    ];
    inputs.forEach(inputData => {
      const input = document.createElement('input');
      input.type = 'hidden';
      input.name = inputData.name;
      input.value = inputData.value;
      form.appendChild(input);
    });

    // Agregar el formulario al documento y enviarlo
    document.body.appendChild(form);
    form.submit();

    // Eliminar el formulario después de enviarlo
    document.body.removeChild(form);
  });
</script>


<!-- para escribir sobre la tarjeta de avisos vencidos -->
<script>
  $(document).ready(function() {
    $.ajax({
        url: '<?php echo base_url("index.php/reporte/obtener_avisos_vencidos_rechazados"); ?>',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            // Mostrar el resultado en la tarjeta
            console.log("cantidad", response);
            $('#totalVencidosRechazados').text(response.cantidad);
        },
        error: function(xhr, status, error) {
            console.error('Error al obtener el total de vencidos y rechazados:', error);
        }
    });
});
</script>




  </body>

  </html>