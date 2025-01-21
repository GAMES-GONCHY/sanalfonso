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
            email: "Este valor debe ser una dirección de correo electrónico válida.",
            url: "Este valor debe ser una URL válida.",
            number: "Este valor debe ser un número válido.",
            integer: "Este valor debe ser un número entero válido.",
            digits: "Este valor debe ser un número entero.",
            alphanum: "Este valor debe ser alfanumérico."
        },
        notblank: "Este valor no debe estar en blanco.",
        required: "Este campo es obligatorio.",
        pattern: "Este valor es incorrecto.",
        min: "Este valor debe ser mayor o igual a %s.",
        max: "Este valor debe ser menor o igual a %s.",
        range: "Este valor debe estar entre %s y %s.",
        minlength: "Este valor es demasiado corto. Debe contener al menos %s caracteres.",
        maxlength: "Este valor es demasiado largo. Debe contener %s caracteres o menos.",
        length: "Este valor debe tener entre %s y %s caracteres.",
        mincheck: "Debes seleccionar al menos %s opción.",
        maxcheck: "No puedes seleccionar más de %s opciones.",
        check: "Debes seleccionar entre %s y %s opciones.",
        equalto: "Este valor debe ser idéntico."
    });

    // Establecer el idioma español como predeterminado
    Parsley.setLocale('es');

    // Agregar una validación personalizada para validar un DECIMAL(4,1)
    window.Parsley.addValidator('decimal41', {
        validateString: function(value) {
            return /^\d{1,3}(\.\d{1})?$/.test(value);
        },
        messages: {
            es: "Debe ser un número con hasta 3 dígitos enteros y 1 decimal."
        }
    });

    // Validación personalizada para asegurar que el valor sea mayor o igual
    window.Parsley.addValidator('gte', {
        validateString: function(value, requirement) {
            const targetValue = document.querySelector(requirement).value;
            return parseFloat(value) >= parseFloat(targetValue || 0);
        },
        messages: {
            en: 'This value should be greater than or equal to the reference value.',
            es: 'La lectura actual debe ser mayor o igual a la lectura anterior.'
        },
        priority: 1 // Alta prioridad
    });

    // Agregar una validación personalizada para máximo 6 dígitos (incluyendo negativos)
    window.Parsley.addValidator('maxdigits', {
        validateString: function(value) {
            // Validar hasta 6 dígitos ignorando el signo negativo
            return /^-?\d{1,6}$/.test(value);
        },
        messages: {
            en: 'This value must have at most 6 digits.',
            es: 'Este valor debe tener como máximo 6 dígitos.'
        },
        priority: 32 // Baja prioridad
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









<!-- script para funcionalidad drop down del selector de avisos de cobranza socios -->



<!-- script para mostrar los registros de avisos de cobranza -->
<script>
$(document).ready(function () {
    let debounceTimer; // Variable para gestionar el debounce (evitar múltiples llamadas rápidas)

    function cargarAvisos(pagina, busqueda = '') {
        $.ajax({
            url: '<?php echo base_url("index.php/avisocobranza/cargaravisos"); ?>',
            type: 'GET',
            data: { pagina: pagina, busqueda: busqueda },
            dataType: 'json',
            success: function (response) {
                let resultList = $('#result-list');
                let pagination = $('#pagination');

                // Limpiar contenedores
                resultList.empty();
                pagination.empty();

                // Renderizar avisos
                if (response.avisos.length > 0) {
                    response.avisos.forEach(function (aviso) {
                        // Formatear la fecha al estilo ENERO-2025
                        let fechaLecturaObj = new Date(aviso.fechaLectura);
                        let meses = [
                            'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
                            'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'
                        ];
                        let mes = meses[fechaLecturaObj.getMonth()]; // Obtiene el nombre del mes
                        let anio = fechaLecturaObj.getFullYear(); // Obtiene el año
                        let fechaFormateada = `${mes}-${anio}`; // Combina mes y año

                        // Formatear fechaVencimiento al estilo 20-01-2025
                        let fechaVencimientoObj = new Date(aviso.fechaVencimiento);
                        let dia = fechaVencimientoObj.getDate().toString().padStart(2, '0'); // Formatea el día con 2 dígitos
                        let mesVenc = (fechaVencimientoObj.getMonth() + 1).toString().padStart(2, '0'); // Mes (1-12) con 2 dígitos
                        let anioVenc = fechaVencimientoObj.getFullYear(); // Año
                        let fechaFormateadaVenc = `${dia}-${mesVenc}-${anioVenc}`; // Combina día, mes y año
                        
                        let total = (aviso.lecturaActual - aviso.lecturaAnterior)/100;
                        if(total<10)
                        {
                            total=aviso.tarifaMinima;
                        }
                        else
                        {
                            total=total*tarifaVigente;
                        }

                        resultList.append(`
                            <div class="result-item">
                                <!-- Imagen -->
                                <div class="result-image"></div>

                                <!-- Informacion -->
                                <div class="result-info">
                                    <h4 class="text-white">${aviso.nombreSocio}</h4>

                                    <!-- Primera fila -->
                                    <div class="group">
                                        <p><strong>Código:</strong> ${aviso.codigoSocio}</p>
                                        <p><strong>Lectura Actual:</strong> ${aviso.lecturaActual}</p>
                                        <p><strong>Lectura Anterior:</strong> ${aviso.lecturaAnterior}</p>
                                        
                                    </div>
                                    <div class="group">
                                        <p><strong>Periodo:</strong> ${fechaFormateada}</p>
                                        <p><strong>Tarifa Vigente:</strong> ${aviso.tarifaVigente} Bs.</p>
                                        <p><strong>Tarifa Mínima:</strong> ${aviso.tarifaMinima} Bs.</p>
                                    </div>

                                    <!-- Segunda fila -->
                                    <div class="group">
                                        <p class="text-white"><strong>Vencimiento:</strong> ${fechaFormateadaVenc}</p>
                                    </div>
                                </div>


                                
                                <!-- Precio y Botón -->
                                <div class="result-price text-end">
                                    Bs ${total}
                                    <a href="javascript:;" class="btn btn-yellow d-block w-100">Ver Detalles</a>
                                </div>
                            </div>
                        `);
                    });

                    // Generar botones de paginación dinámicos
                    for (let i = 1; i <= response.total_paginas; i++) {
                        pagination.append(`
                            <button class="btn btn-primary page-btn" data-page="${i}" data-busqueda="${busqueda}">
                                ${i}
                            </button>
                        `);
                    }
                } else {
                    resultList.append('<p>No hay avisos disponibles.</p>');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error al cargar los datos:', error);
            }
        });
    }


    // Evento al hacer clic en el botón de búsqueda
    $('#search-button').on('click', function () {
        let busqueda = $('#search-query').val(); // Obtener el texto del input
        cargarAvisos(1, busqueda); // Cargar avisos con la búsqueda
    });

    // Evento al presionar Enter en el input
    $('#search-query').on('keypress', function (e) {
        if (e.which === 13) { // Verificar si la tecla presionada es Enter (código 13)
            let busqueda = $(this).val(); // Obtener el texto del input
            cargarAvisos(1, busqueda); // Cargar avisos con la búsqueda
        }
    });

    // Evento al escribir en el input (filtrado dinámico)
    $('#search-query').on('input', function () {
        clearTimeout(debounceTimer); // Reiniciar el temporizador de debounce
        let busqueda = $(this).val(); // Obtener el texto del input
        debounceTimer = setTimeout(() => {
            cargarAvisos(1, busqueda); // Cargar avisos con la búsqueda después del debounce
        }, 300); // Esperar 300ms antes de ejecutar la búsqueda
    });

    // Manejar clic en los botones de paginación
    $(document).on('click', '.page-btn', function () {
        let pagina = $(this).data('page');
        let busqueda = $(this).data('busqueda') || '';
        cargarAvisos(pagina, busqueda);
    });

    // Cargar la primera página al iniciar
    cargarAvisos(1);
});

</script>











</body>

</html>