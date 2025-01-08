        <div id="footer" class="app-footer mx-0 px-0">
        <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
        </div>
    </div>
    <!-- END CONTENT PAGE -->


    <!-- BOTON VERDE SUSPENCION -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

    </div>
    <!-- END APP HEADER -->

    <!-- modal para mostrar avisos de cobranza -->
    <div class="modal modal-pos-booking fade" id="modalPosBooking">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <div class="d-flex align-items-center mb-3">
                        <h4 class="modal-title d-flex align-items-center" style="font-size: 1.5rem; font-weight: bold;">
                            <img src="<?php echo base_url(); ?>coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" />
                            Detalle del Aviso
                        </h4>
                        <a href="#" data-bs-dismiss="modal" class="ms-auto btn-close"></a>
                    </div>
                    <div class="row p-4 rounded" style="background-color: #f8f9fa;">
                        <div class="col-lg-12">
                            <table class="table table-borderless mb-0" style="font-size: 1.1rem;">
                                <tbody>
                                    <tr>
                                        <td><strong style="font-weight: 600;">Código del Socio:</strong> <span class="text-secondary" id="modal-codigo-socio"></span></td>
                                        <td><strong style="font-weight: 600;">Nombre del Socio:</strong> <span class="text-secondary" id="modal-nombre-socio"></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 600;">Periodo:</strong> <span class="text-secondary" id="modal-periodo"></span></td>
                                        <td><strong style="font-weight: 600;">Consumo:</strong> <span class="text-secondary" id="modal-consumo"></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 600;">Lectura Actual:</strong> <span class="text-secondary" id="modal-lectura-actual"></span></td>
                                        <td><strong style="font-weight: 600;">Lectura Anterior:</strong> <span class="text-secondary" id="modal-lectura-anterior"></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 600;">Fecha Lectura Actual:</strong> <span class="text-secondary" id="modal-fecha-lectura"></span></td>
                                        <td><strong style="font-weight: 600;">Fecha Lectura Anterior:</strong> <span class="text-secondary" id="modal-fecha-lectura-anterior"></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 600;">Tarifa Vigente:</strong> <span class="text-secondary" id="modal-tarifa-vigente"></span></td>
                                        <td><strong style="font-weight: 600;">Tarifa Mínima:</strong> <span class="text-secondary" id="modal-tarifa-minima"></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 700; color: #343a40;">Total:</strong> <span class="fw-bold text-dark" id="modal-total"></span></td>
                                        <td><strong id="modal-titulo-fecha" style="font-weight: 600;">Fecha de Vencimiento:</strong> <span class="text-danger" id="modal-fecha-vencimiento"></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong style="font-weight: 600;">Estado:</strong> <span class="badge bg-success text-uppercase" id="modal-estado"></span></td>
                                        
                                        <td><strong id="modal-label-saldo" style="font-weight: 700; color: #343a40;">Saldo: </strong><span class="fw-bold text-dark" id="modal-saldo"></span></td>
                                        
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


    <!-- Modal para mostrar la imagen QR y subir comprobante de pago -->
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">Paga tus cuentas pendientes aquí</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Mostrar imagen QR -->
                    <img id="modalQrImage" src="" alt="Código QR" class="img-fluid mb-3" />

                    <div class="mb-3 d-flex align-items-center" id="saldo-container" style="display: none;">
                        <label id="label-saldo" for="saldo" class="form-label" style="font-size: 1.2rem; margin-right: 10px;">Saldo: </label>
                        <h4 id="saldo" class="form-control" style="border: none; font-size: 1.2rem; font-weight: bold; color: black; display: inline-block; width: auto;"></h4>
                    </div>

                    <!-- Formulario para subir comprobante de pago -->
                    <form action="<?php echo base_url('index.php/socio/subir'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="mes" name="mes" value="">
                        <input type="hidden" id="anio" name="anio" value="">
                        <input type="hidden" id="codigoSocio" name="codigoSocio" value="">
                        <input type="hidden" id="idAviso" name="idAviso" value="">
                        <div class="mb-3">
                            <label for="comprobantePago" class="form-label">Subir Comprobante de Pago</label>
                            <input class="form-control" type="file" id="comprobantePago" name="comprobantePago" required style="color: #4CAF50; border: 2px solid #4CAF50;">
                        </div>
                        <button type="submit" class="btn btn-success">Subir Comprobante</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal para visualizar el PDF -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Aviso de Cobranza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí cargaremos el PDF -->
                    <iframe id="pdfFrame" src="" style="width: 100%; height: 500px;" frameborder="0"></iframe>
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
    <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/table-manage-combine.demo2.js"></script>
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


<!-- modal pagar renderizacion de qr en tamaño real -->
<script>
    function cargarImagenModal(imagenUrl, codigoSocio, fechaLectura, idAviso, saldo, estado) 
    {
        document.getElementById('modalQrImage').src = imagenUrl;  // Actualizar imagen QR en el modal

        // Extraer mes y año de la fechaLectura
        let date = new Date(fechaLectura);
        let mes = ('0' + (date.getMonth() + 1)).slice(-2);  // Obtener el mes en formato 2 dígitos
        let anio = date.getFullYear();  // Obtener el año

        // Guardar mes y año en campos ocultos para pasarlos al backend
        document.getElementById('mes').value = mes;
        document.getElementById('anio').value = anio;
        document.getElementById('codigoSocio').value = codigoSocio;
        document.getElementById('idAviso').value = idAviso;

        // Mostrar u ocultar el saldo y su etiqueta "Saldo:" dependiendo del estado y si el saldo es válido
        let saldoContainer = document.getElementById('saldo-container');
        let labelSaldo = document.getElementById('label-saldo'); // Obtener el label

        // Si el estado es 'rechazado' y el saldo es válido (mayor a 0)
        if (estado === 'rechazado' && saldo !== null && saldo > 0) {
            saldoContainer.style.display = 'flex';  // Mostrar el contenedor del saldo
            labelSaldo.style.display = 'block';  // Mostrar el label del saldo
            document.getElementById('saldo').innerText = saldo + ' Bs.';  // Actualizar el valor del saldo
        } else {
            saldoContainer.style.display = 'none';  // Ocultar el contenedor del saldo
            labelSaldo.style.display = 'none';  // Ocultar el label del saldo
            document.getElementById('saldo').innerText = '';  // Limpiar el saldo anterior
        }
    }
</script>






<!-- script para funcionalidad drop down del selector de avisos de cobranza socios -->
<!-- <script>
    $(document).ready(function() {
        // Detectar el click en los elementos del dropdown de la sección de avisos
        $('#dropdown-avisos .dropdown-item').on('click', function() {
            var estado = $(this).data('status'); // Obtener el valor del estado (enviado, revision, pagado, rechazado, vencido)
            var selectedText = $(this).text();  // Obtener el texto de la opción seleccionada

            // Actualizar el texto del botón "Filtrar por" con la opción seleccionada
            //$('#filterButton').text(selectedText);
            $('#filterButton').html(selectedText + ' <b class="caret"></b>');

            // Realizar la solicitud AJAX para obtener los avisos filtrados por estado
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/socio/get_avisos', // Ruta hacia el controlador que manejará la solicitud
                type: 'POST', // Tipo de solicitud
                data: { estado: estado }, // Enviar el estado como parámetro
                success: function(response) {
                    $('#avisos-container').html(response);  // Actualizar la vista parcial dentro del contenedor
                },
                error: function(xhr, status, error) {
                    $('#avisos-container').html('<p>Ocurrió un error al cargar los avisos. Inténtalo nuevamente.</p>');
                }
            });
        });
    });

</script> -->
<!-- script para funcionalidad drop down del selector de avisos de cobranza socios -->
<script>
$(document).ready(function() {
    // Lógica para seleccionar la primera opción por defecto
    var firstOption = $('#dropdown-avisos .dropdown-item').first(); // Obtener la primera opción del dropdown
    var estadoInicial = firstOption.data('status'); // Obtener el valor 'data-status' de la primera opción
    var selectedTextInicial = firstOption.text(); // Obtener el texto de la primera opción

    // Actualizar el botón "Filtrar por" con la primera opción por defecto
    $('#filterButton').html(selectedTextInicial + ' <b class="caret"></b>');

    // Realizar la solicitud AJAX para obtener los avisos filtrados por el estado inicial
    $.ajax({
        url: '<?php echo base_url(); ?>index.php/socio/get_avisos', // Ruta hacia el controlador que manejará la solicitud
        type: 'POST', // Tipo de solicitud
        data: { estado: estadoInicial }, // Enviar el estado inicial como parámetro
        success: function(response) {
            $('#avisos-container').html(response);  // Actualizar la vista parcial dentro del contenedor
        },
        error: function(xhr, status, error) {
            $('#avisos-container').html('<p>Ocurrió un error al cargar los avisos. Inténtalo nuevamente.</p>');
        }
    });

    // Detectar el click en los elementos del dropdown de la sección de avisos
    $('#dropdown-avisos .dropdown-item').on('click', function() {
        var estado = $(this).data('status'); // Obtener el valor del estado (enviado, revision, pagado, rechazado, vencido)
        var selectedText = $(this).text();  // Obtener el texto de la opción seleccionada

        // Actualizar el texto del botón "Filtrar por" con la opción seleccionada
        $('#filterButton').html(selectedText + ' <b class="caret"></b>');

        // Realizar la solicitud AJAX para obtener los avisos filtrados por estado
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/socio/get_avisos', // Ruta hacia el controlador que manejará la solicitud
            type: 'POST', // Tipo de solicitud
            data: { estado: estado }, // Enviar el estado como parámetro
            success: function(response) {
                $('#avisos-container').html(response);  // Actualizar la vista parcial dentro del contenedor
            },
            error: function(xhr, status, error) {
                $('#avisos-container').html('<p>Ocurrió un error al cargar los avisos. Inténtalo nuevamente.</p>');
            }
        });
    });
});
</script>


<!-- para buscador de avisos por mes -->
<!-- <script>
    document.getElementById('searchButton').addEventListener('click', function() {
        var input = document.getElementById('searchInput').value.toLowerCase();
        var avisos = document.querySelectorAll('.result-item');

        console.log('Valor ingresado en el campo de búsqueda:', input);

        avisos.forEach(function(aviso) {
            var periodo = aviso.getAttribute('data-periodo');
            console.log('Periodo del aviso:', periodo); // Verifica el valor de periodo
            
            if (periodo) 
            {
                periodo = periodo.toLowerCase();
                if (periodo.includes(input)) 
                {
                    aviso.style.display = 'block';
                }
                else
                {
                    aviso.style.display = 'none';
                }
            }
            else
            {
                aviso.style.display = 'none';
            }
        });
    });
</script> -->

<!-- pagos -->
<script>
    function cargarDatos(codigoSocio, nombreSocio, mes, consumo, lecturaActual, lecturaAnterior, fechaLectura,
                        fechaLecturaAnterior, tarifaVigente, tarifaMinima, total, fechaVencimiento, estado, fechaPago, saldo)
    {
        // Asignar los valores recibidos al modal
        document.getElementById('modal-codigo-socio').textContent = codigoSocio;
        document.getElementById('modal-nombre-socio').textContent = nombreSocio;
        document.getElementById('modal-periodo').textContent = mes;
        document.getElementById('modal-consumo').textContent = consumo + " m³";
        document.getElementById('modal-lectura-actual').textContent = lecturaActual;
        document.getElementById('modal-lectura-anterior').textContent = lecturaAnterior;
        document.getElementById('modal-fecha-lectura').textContent = fechaLectura;
        document.getElementById('modal-fecha-lectura-anterior').textContent = fechaLecturaAnterior;
        document.getElementById('modal-tarifa-vigente').textContent = tarifaVigente;
        document.getElementById('modal-tarifa-minima').textContent = tarifaMinima;
        document.getElementById('modal-total').textContent = "Bs. " + total;
        document.getElementById('modal-fecha-vencimiento').textContent = fechaVencimiento;
        document.getElementById('modal-estado').textContent = estado;
        


        // Cambiar el color del estado dependiendo de si es 'vencido' o 'pendiente'
        var estadoElement = document.getElementById('modal-estado');
        if (estado == 'vencido' || estado == 'rechazado') {
            estadoElement.classList.remove('bg-success');
            estadoElement.classList.add('bg-danger');
        } else {
            estadoElement.classList.remove('bg-danger');
            estadoElement.classList.add('bg-success');
        }

        // Verificar si el estado es 'pagado' para mostrar solo la fechaPago y cambiar el título
        if (estado == 'pagado') {
            var fechaFormateada = new Date(fechaPago).toLocaleDateString();
            document.getElementById('modal-fecha-vencimiento').textContent = fechaFormateada;
            document.getElementById('modal-titulo-fecha').textContent = "Fecha de Pago:";
        } else {
            document.getElementById('modal-fecha-vencimiento').textContent = fechaVencimiento;
            document.getElementById('modal-titulo-fecha').textContent = "Fecha de Vencimiento:";
        }

        // Cambiar el título del modal según el estado
        var modalTitle = document.querySelector('.modal-title');
        modalTitle.innerHTML = ''; // Limpiar el contenido antes de agregar el nuevo título

        var baseUrl = '<?php echo base_url(); ?>';
        
            // if (estado == 'enviado') {
            //     modalTitle.innerHTML = '<img src="' + baseUrl + 'coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" /> Aviso de cobranza';
            // } else if (estado == 'pagado') {
            //     modalTitle.innerHTML = '<img src="' + baseUrl + 'coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" /> Detalle Recibo';
            // } else if (estado == 'vencido') {
            //     modalTitle.innerHTML = '<img src="' + baseUrl + 'coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" /> Aviso Vencido';
            // } else if (estado == 'revision') {
            //     modalTitle.innerHTML = '<img src="' + baseUrl + 'coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" /> Comprobante en Revisión';
            // } else if (estado == 'rechazado') {
            //     modalTitle.innerHTML = '<img src="' + baseUrl + 'coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" /> Comprobante Denegado';
            // } else {
            //     modalTitle.textContent = "Detalle de Aviso";
            // }

            if (estado == 'pagado') {
                modalTitle.innerHTML = '<img src="' + baseUrl + 'coloradmin/assets/img/logo/logomenu.png" height="40" class="me-2" /> Recibo';
            } else {
                modalTitle.textContent = "Aviso de cobranza";
            }

            // Lógica para mostrar el saldo solo si el estado es 'rechazado' y el saldo no es null o 0
            var saldoElement = document.getElementById('modal-saldo');
            var saldoLabel = document.querySelector('td strong[style*="Saldo"]'); // El elemento de la etiqueta de saldo

            if (estado == 'rechazado' && saldo !== null && saldo != 0) {
                saldoElement.textContent = saldo + ' Bs.'; // Mostrar el saldo
                saldoElement.parentElement.style.display = ''; // Mostrar el campo del saldo
                saldoLabel.style.display = ''; // Mostrar la etiqueta
            } else {
                saldoElement.parentElement.style.display = 'none'; // Ocultar el campo del saldo
                saldoLabel.style.display = 'none'; // Ocultar la etiqueta
            }
        
    }
</script>




<!-- script para generar detalle en pdf del aviso de cobranza en panel socio -->
<script>
    function generarPDF(codigoSocio, nombreSocio, codigoMedidor, codigoDatalogger, lecturaActual, lecturaAnterior, fechaLectura, fechaLecturaAnterior, tarifaVigente, tarifaMinima, fechaVencimiento, estado, fechaPago, saldo)
    {
        console.log("Generando PDF...");
        //console.log("Datos enviados: ", { idUsuario, estado });

        // Crear el cuerpo de la solicitud en formato x-www-form-urlencoded
        const body = new URLSearchParams({
            codigoSocio,
            nombreSocio,
            codigoMedidor,
            codigoDatalogger,
            lecturaActual,
            lecturaAnterior,
            fechaLectura,
            fechaLecturaAnterior,
            tarifaVigente,
            tarifaMinima,
            fechaVencimiento,
            estado,
            fechaPago,
            saldo
        }).toString();

        // Enviar datos al backend mediante fetch
        fetch('<?php echo base_url('index.php/socio/generarPdfAviso'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: body
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error al generar el PDF: ${response.status} ${response.statusText}`);
            }
            return response.blob(); // Recibir el PDF como blob
        })
        .then(blob => {
            // Crear una URL temporal para el PDF
            const pdfUrl = window.URL.createObjectURL(blob);

            // Abrir el PDF en una nueva pestaña
            window.open(pdfUrl, '_blank');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un problema al generar el PDF.');
        });
    }
</script>



</body>

</html>