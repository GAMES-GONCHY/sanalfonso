    <div id="footer" class="app-footer mx-0 px-0">
      <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
    </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>
  <!-- END APP HEADER -->

<!-- modal para notificar saldo de avisos rechazados -->
<div class="modal modal-pos-booking fade" id="modalPosBooking">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <form id="form-notificar-saldo" action="<?php echo base_url(); ?>index.php/avisocobranza/notificarsaldo" method="post" data-parsley-validate>
                <div class="modal-body">
                    <div class="d-flex align-items-center mb-3">
                        <h4 class="modal-title d-flex align-items-center" style="font-size: 1.5rem; font-weight: bold;">
                            <img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" />
                            Notificar Saldo
                        </h4>
                        <a href="#" data-bs-dismiss="modal" class="ms-auto btn-close"></a>
                    </div>
                    <div class="row p-4 rounded" style="background-color: #f8f9fa;">
                        <div class="col-lg-12">
                            <table class="table table-borderless mb-0" style="font-size: 1.1rem;">
                                <tbody>
                                    <tr>
                                        <td><strong style="font-weight: 600; color: #343a40;">Código del Socio:</strong> 
                                            <span class="text-secondary" style="color: #343a40;" id="modal-codigo-socio"></span>
                                        </td>
                                        <td><strong style="font-weight: 600; color: #343a40;">Nombre del Socio:</strong> 
                                            <span class="text-secondary" style="color: #343a40;" id="modal-nombre-socio"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 600; color: #343a40;">Total (Bs.):</strong>
                                            <span class="text-secondary" style="color: #343a40;" id="modal-total"></span>
                                        </td>
                                        <td><strong style="font-weight: 600; color: #343a40;">Estado:</strong> 
                                            <span class="badge bg-danger text-uppercase" id="modal-estado"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 600; color: #343a40;">Notificar Saldo (Bs.):</strong> 
                                            <input type="text" name="saldoPendiente" id="modal-notificar-saldo" class="form-control" value=""
                                            data-parsley-required="true" 
                                            data-parsley-type="number" 
                                            data-parsley-min="0.1" 
                                            data-parsley-trigger="input">
                                        </td>
                                        <td><strong style="font-weight: 600; color: #343a40;">Fecha de Pago:</strong> 
                                            <span class="text-secondary" style="color: #343a40;" id="modal-fecha-pago"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 15px;">
                    <a href="#" class="btn btn-secondary w-100px" data-bs-dismiss="modal" style="font-size: 0.9rem; padding: 5px 10px;">Cancelar</a>
                    <button type="submit" class="btn btn-success w-100px" style="font-size: 0.9rem; padding: 5px 10px;">Notificar</button>
                    <!-- Campo oculto para enviar el idAviso -->
                    <input type="hidden" name="idAviso" id="input-id-aviso">
                    <input type="hidden" name="tab" value="rechazados">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal para renderizar el comprobante en tamaño real -->
<div class="modal fade" id="comprobanteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ver Comprobante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0">
                <img id="modalComprobanteImage" src="" alt="Comprobante" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

  <!-- modal para mostrar el detalle de avisos -->
  <div class="modal modal-pos-booking fade" id="modalPosBooking1">
      <div class="modal-dialog modal-lg">
          <div class="modal-content border-0">
              <div class="modal-body">
                  <div class="d-flex align-items-center mb-3">
                      <h4 class="modal-title d-flex align-items-center" style="font-size: 1.5rem; font-weight: bold; color: black;">
                          <img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" />
                          Detalle del Aviso
                      </h4>
                      <a href="#" data-bs-dismiss="modal" class="ms-auto btn-close"></a>
                  </div>
                  <div class="row p-4 rounded" style="background-color: #f8f9fa;">
                      <div class="col-lg-12">
                          <table class="table table-borderless mb-0" style="font-size: 1.1rem; color: black;">
                              <tbody>
                                  <tr>
                                      <td><strong style="font-weight: 600; color: black;">Código del Socio:</strong> <span class="text-secondary" style="color: black;" id="codigo-socio"></span></td>
                                      <td><strong style="font-weight: 600; color: black;">Nombre del Socio:</strong> <span class="text-secondary" style="color: black;" id="nombre-socio"></span></td>
                                  </tr>
                                  <tr>
                                      <td><strong style="font-weight: 600; color: black;">Periodo:</strong> <span class="text-secondary" style="color: black;" id="periodo"></span></td>
                                      <td><strong style="font-weight: 600; color: black;">Consumo:</strong> <span class="text-secondary" style="color: black;" id="consumo"></span></td>
                                  </tr>
                                  <tr>
                                      <td><strong style="font-weight: 600; color: black;">Lectura Actual:</strong> <span class="text-secondary" style="color: black;" id="lectura-actual"></span></td>
                                      <td><strong style="font-weight: 600; color: black;">Lectura Anterior:</strong> <span class="text-secondary" style="color: black;" id="lectura-anterior"></span></td>
                                  </tr>
                                  <tr>
                                      <td><strong style="font-weight: 600; color: black;">Fecha Lectura Actual:</strong> <span class="text-secondary" style="color: black;" id="fecha-lectura"></span></td>
                                      <td><strong style="font-weight: 600; color: black;">Fecha Lectura Anterior:</strong> <span class="text-secondary" style="color: black;" id="fecha-lectura-anterior"></span></td>
                                  </tr>
                                  <tr>
                                      <td><strong style="font-weight: 600; color: black;">Tarifa Vigente:</strong> <span class="text-secondary" style="color: black;" id="tarifa-vigente"></span></td>
                                      <td><strong style="font-weight: 600; color: black;">Tarifa Mínima:</strong> <span class="text-secondary" style="color: black;" id="tarifa-minima"></span></td>
                                  </tr>
                                  <tr>
                                      <td><strong style="font-weight: 700; color: black;">Total:</strong> <span class="fw-bold text-dark" style="color: black;" id="total"></span></td>
                                      <td><strong id="titulo-fecha" style="font-weight: 600; color: black;">Fecha de Vencimiento:</strong> <span class="text-danger" style="color: black;" id="fecha-vencimiento"></span></td>
                                  </tr>
                                  <tr>
                                      <td><strong style="font-weight: 600; color: black;">Estado:</strong> <span class="badge bg-success text-uppercase" style="color: black;" id="estado"></span></td>
                                      <td><strong id="saldoLabel" style="font-weight: 700; color: black;">Saldo: </strong><span class="fw-bold text-dark" style="color: black;" id="saldoAvisos"></span></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="modal-footer" style="padding: 15px;">
                  <a href="#" class="btn btn-success w-100px" data-bs-dismiss="modal" style="font-size: 0.9rem; padding: 5px 10px;">Ok!</a>
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
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo1.js"></script>
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

  <!-- modal qr -->
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var previewOutput = document.getElementById('qrPreview');
        var expandedOutput = document.getElementById('qrExpanded');
        previewOutput.src = reader.result; // Cambia la imagen del contenedor principal
        expandedOutput.src = reader.result; // Cambia la imagen del modal de expansión
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>


  <!-- modal para notificacion de saldos de avisos rechazados-->
  <script>
    function cargarDatos(codigoSocio, nombreSocio, idAviso, total, estado, fechaPago, saldo) {
        // Resetear el formulario y Parsley antes de cargar nuevos datos
        var form = $('#form-notificar-saldo').parsley();
        form.reset(); // Resetea el estado de validación de Parsley
        document.getElementById('modal-notificar-saldo').classList.remove('parsley-error'); // Elimina la clase de error si quedó activa
        
        document.getElementById('modal-codigo-socio').textContent = codigoSocio;
        document.getElementById('modal-nombre-socio').textContent = nombreSocio;
        document.getElementById('modal-total').textContent = total;
        document.getElementById('modal-estado').textContent = estado;
        document.getElementById('modal-fecha-pago').textContent = fechaPago;

        
        // Revisar el estado y el saldo pendiente
        var estadoElement = document.getElementById('modal-estado');
        estadoElement.textContent = estado.toUpperCase();  // Mostrar el estado original

        // Limpiar las clases de estado para evitar conflictos
        estadoElement.classList.remove('bg-success', 'bg-danger', 'bg-warning');

        if (estado == 'rechazado') {
            // Si hay saldo pendiente, mostrar el estado como "Notificado"
            if (saldo !== null && saldo != 0) {
                estadoElement.textContent += " - NOTIFICADO";
                estadoElement.classList.add('bg-warning');  // Fondo amarillo
                estadoElement.style.color = 'black';  // Letra negra
            } else {
                estadoElement.classList.add('bg-danger');  // Estado rechazado por defecto
            }
        } else {
            estadoElement.classList.add('bg-success');  // Otros estados como aprobado, etc.
        }

        // Solo saldo pendiente y idAviso se envían
        document.getElementById('input-id-aviso').value = idAviso;

        // Verificar si el valor de saldo es null o vacío y asignar el valor correspondiente
        if (saldo == null || saldo == 0) {
          document.getElementById('modal-notificar-saldo').value = '';  // Campo vacío por defecto
        }
        else
        {
          document.getElementById('modal-notificar-saldo').value = saldo;
        }
    }
  </script>



<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>


<script>
  $("#advance-daterange").daterangepicker({
    opens: "right",
    locale: {
      format: "DD/MM/YYYY", // Mantiene el formato original
      separator: " a ", // Traducción del separador
      applyLabel: "Aplicar",
      cancelLabel: "Cancelar",
      fromLabel: "Desde",
      toLabel: "Hasta",
      customRangeLabel: "Personalizado",
      daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
      monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
      firstDay: 1 // Comienza la semana el lunes
    },
    startDate: moment().subtract(29, "days"),
    endDate: moment(),
    minDate: "01/01/2024",
    maxDate: "31/12/2024",
    ranges: { // Agrega la funcionalidad de rangos predefinidos
      'Hoy': [moment(), moment()],
      'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes': [moment().startOf('month'), moment().endOf('month')],
      'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
  }, function (start, end) {
    $("#default-daterange input").val(start.format("D MMMM, YYYY") + " - " + end.format("D MMMM, YYYY"));
  });
</script>

<!-- script para eliminar el error generado por el aria-hidden -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Elimina aria-hidden de todos los modales al cargar la página
        document.querySelectorAll('.modal').forEach(modal => {
            modal.removeAttribute('aria-hidden'); // Eliminar si está presente
        });

        // Controlar la visibilidad y accesibilidad de los modales
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('show.bs.modal', function () {
                // Asegurar que aria-hidden se elimine al mostrar el modal
                this.removeAttribute('aria-hidden');
            });

            modal.addEventListener('hidden.bs.modal', function () {
                // Eliminar también aria-hidden al ocultar para evitar conflictos
                this.removeAttribute('aria-hidden');
            });
        });

        // Detectar si algún script externo intenta añadir aria-hidden
        const observer = new MutationObserver(mutations => {
            mutations.forEach(mutation => {
                if (mutation.attributeName === 'aria-hidden') {
                    console.warn('aria-hidden modificado en:', mutation.target);
                    mutation.target.removeAttribute('aria-hidden');
                }
            });
        });

        // Observa los cambios en los atributos de los modales
        document.querySelectorAll('.modal').forEach(modal => {
            observer.observe(modal, { attributes: true });
        });
    });
</script>

    <!-- script para mostrar el comprobante -->
    <script>
        function cargarImagenModal(src)
        {
            document.getElementById('modalComprobanteImage').src = src;
        }
    </script>



<!--  -->
<script>
  function cargarDetalle(codigoSocio, nombreSocio, mes, consumo, clasificacion, lecturaActual, lecturaAnterior, fechaLectura,
                      fechaLecturaAnterior, tarifaVigente, tarifaMinima, total, fechaVencimiento, estado, fechaPago, saldo) {
    // Asignar los valores recibidos
    document.getElementById('codigo-socio').textContent = codigoSocio;
    document.getElementById('nombre-socio').textContent = nombreSocio;
    document.getElementById('periodo').textContent = mes;
    document.getElementById('consumo').textContent = consumo + " m³ " + "("+clasificacion+")";
    document.getElementById('lectura-actual').textContent = lecturaActual;
    document.getElementById('lectura-anterior').textContent = lecturaAnterior;
    document.getElementById('fecha-lectura').textContent = fechaLectura;
    document.getElementById('fecha-lectura-anterior').textContent = fechaLecturaAnterior;
    document.getElementById('tarifa-vigente').textContent = tarifaVigente;
    document.getElementById('tarifa-minima').textContent = tarifaMinima;
    document.getElementById('total').textContent = "Bs. " + total;
    document.getElementById('fecha-vencimiento').textContent = fechaVencimiento;

    // Cambiar el color del estado dependiendo de su valor
    var estadoElement = document.getElementById('estado'); // Correcto ID en HTML
    if (estadoElement) {
        estadoElement.textContent = estado;
        if (estado === 'vencido' || estado === 'rechazado') {
            estadoElement.classList.remove('bg-success');
            estadoElement.classList.add('bg-danger');
        } else {
            estadoElement.classList.remove('bg-danger');
            estadoElement.classList.add('bg-success');
        }
    }

    // Verificar si el estado es 'pagado' para mostrar solo la fechaPago y cambiar el título
    if (estado == 'pagado')
    {
        document.getElementById('fecha-vencimiento').textContent = fechaPago;
        document.getElementById('titulo-fecha').textContent = "Fecha de Pago:";
    }
    else
    {
        document.getElementById('fecha-vencimiento').textContent = fechaVencimiento;
        document.getElementById('titulo-fecha').textContent = "Fecha de Vencimiento:";
    }

    // Cambiar título del modal según el estado
    var modalTitle = document.querySelector('.modal-title');
    if (modalTitle) {
        modalTitle.innerHTML = estado === 'pagado'
            ? '<img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" /> Recibo'
            : "Aviso de cobranza";
    }

    // Mostrar el saldo solo si el estado es 'rechazado' y el saldo no es null o 0
    var saldoElement = document.getElementById('saldoAvisos');
    var saldoLabel = document.getElementById('saldoLabel'); // Cambiar selector a ID para mayor precisión

        if (estado === 'rechazado' && saldo !== null && saldo != 0) {
            saldoElement.textContent = saldo + ' Bs.'; // Mostrar saldo
            saldoElement.parentElement.style.display = ''; // Mostrar la celda del saldo
            saldoLabel.style.display = ''; // Mostrar la etiqueta del saldo
        } else {
            saldoElement.textContent = ''; // Limpiar contenido del saldo
            saldoElement.parentElement.style.display = 'none'; // Ocultar la celda del saldo
            saldoLabel.style.display = 'none'; // Ocultar la etiqueta del saldo
        }
  
}

</script>

  </body>

  </html>