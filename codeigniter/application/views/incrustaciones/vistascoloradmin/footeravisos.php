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

    <!-- Modal para mover de estados a los avisos de cobranza -->
    <div class="modal fade" id="moverAvisos" tabindex="-1" aria-labelledby="modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-label">Desea ejecutar el pago?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyContent">
                    <div class="row">
                        <div class="col-6">
                            <h5><b>Socio:</b><span id="socioModal"></span></h5>
                            <h5><b>Periodo:</b><span id="periodoModal"></span></h5>
                        </div>
                        <div class="col-6">
                            <h5><b>Código:</b> <span id="codigoModal"></span></h5>
                            <h5><b>Total a pagar:</b> <span id="totalModal"></span></h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-info btn-lg mx-2" id="confirmar-pago-btn">Confirmar</button>
                    <button type="button" class="btn btn-danger btn-lg mx-2" data-bs-dismiss="modal">Cancelar</button>
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

    <!-- toast -->
    <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/toastr.min.js"></script>

    <script>
        const BASE_URL = '<?php echo base_url(); ?>';
        const CARGAR_AVISOS_URL = '<?php echo base_url("index.php/avisocobranza/cargaravisos"); ?>';
    </script>
    <script src="<?php echo base_url('coloradmin/assets/js/funcionesScripts/avisos.js'); ?>"></script>

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

<!-- script para mostrar los registros de avisos de cobranza -->
<script>
    $(document).ready(function () {
    let debounceTimer;

    $(document).on('click', '#dropdown-avisos .dropdown-item', function () {
        let estado = $(this).data('estado'); // Capturar el estado seleccionado
        console.log('Estado seleccionado:', estado); // Confirmar captura del estado

        // Cambiar la etiqueta del dropdown específico
        $('#dropdown-avisos').siblings('.btn.dropdown-toggle').html(`${$(this).text()} <b class="caret"></b>`).addClass('btn-primary');
        cargarAvisos(1, '', estado); // Llamar a cargarAvisos con el estado como filtro
    });

    // Eventos existentes para búsqueda, paginación, etc.
    $('#search-button').on('click', function () {
        let busqueda = $('#search-query').val();
        cargarAvisos(1, busqueda);
    });

    $('#search-query').on('keypress', function (e) {
        if (e.which === 13) {
            let busqueda = $(this).val();
            cargarAvisos(1, busqueda);
        }
    });

    $('#search-query').on('input', function () {
        clearTimeout(debounceTimer);
        let busqueda = $(this).val();
        debounceTimer = setTimeout(() => {
            cargarAvisos(1, busqueda);
        }, 300);
    });

    $(document).on('click', '.page-btn', function () {
        let pagina = $(this).data('page');
        let busqueda = $(this).data('busqueda') || '';
        let filtro = $(this).data('filtro') || '';
        cargarAvisos(pagina, busqueda, filtro);
    });

    //funcionalidad del boton ver detalle
    $(document).on('click', '.ver-detalle', function () {
        let idAviso = $(this).data('id'); // Obtener el id del aviso del atributo data-id
        console.log('ID del aviso seleccionado:', idAviso); // Confirmar que el id se está capturando
    });
    // Cargar la primera página al iniciar
    cargarAvisos(1);
});
</script>

<!-- script para confirmar pagos de avisos de cobranza -->
<script>
    let idAvisoParam;

    // Función para cargar detalles en el modal
    function cargarDetalle(codigoSocio, nombreSocio, periodo, total, idAviso, estado){
        // document.getElementById("socioModal").textContent = nombreSocio;
        // document.getElementById("periodoModal").textContent = periodo;
        // document.getElementById("codigoModal").textContent = codigoSocio;
        // document.getElementById("totalModal").textContent = total + " Bs";
        actualizarContenidoModal(codigoSocio, nombreSocio, periodo, total, estado);
        idAvisoParam = idAviso; 
    }

    function actualizarContenidoModal(codigoSocio, nombreSocio, periodo, total, estado) {
        const modalBody = document.getElementById("modalBodyContent");
        let contenido = "";

        // Generar el contenido dinámico según el estado del aviso
        if (estado === "ENVIADO") {
            contenido = `
                <div class="row">
                    <div class="col-6">
                        <p><b>Código:</b> ${codigoSocio}</p>
                        <p><b>Socio:</b> ${nombreSocio}</p>
                    </div>
                    <div class="col-6">
                        <p><b>Periodo:</b> ${periodo}</p>
                        <p><b>Total a pagar:</b> ${total} Bs</p>
                    </div>
                </div>
            `;
        } else if (estado === "PAGADO") {
            contenido = `
                <div class="row">
                    <div class="col-6">
                        <p><b>Código:</b> ${codigoSocio}</p>
                        <p><b>Socio:</b> ${nombreSocio}</p>
                    </div>
                    <div class="col-6">
                        <p><b>Periodo:</b> ${periodo}</p>
                        <p><b>Total pagado:</b> ${total} Bs</p>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="text-success"><b>Este aviso ya fue pagado.</b></h5>
                </div>
            `;
        } else if (estado === "VENCIDO") {
            contenido = `
                <div class="row">
                    <div class="col-6">
                        <p><b>Código:</b> ${codigoSocio}</p>
                        <p><b>Socio:</b> ${nombreSocio}</p>
                    </div>
                    <div class="col-6">
                        <p><b>Periodo:</b> ${periodo}</p>
                        <p><b>Deuda total:</b> ${total} Bs</p>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="text-danger"><b>Este aviso está vencido.</b></h5>
                    <p><i>Contacte con la administración para regularizar su deuda.</i></p>
                </div>
            `;
        } else {
            contenido = `
                <div class="text-center">
                    <h5><b>Estado desconocido.</b></h5>
                </div>
            `;
        }

        // Actualizar el contenido del modal
        modalBody.innerHTML = contenido;
    }


    // Manejar el evento del botón Confirmar
    document.getElementById("confirmar-pago-btn").addEventListener("click", function () {
        if (idAvisoParam) {
            console.log("Confirmar clic detectado. ID Aviso:", idAvisoParam);

            fetch('<?php echo base_url("index.php/avisocobranza/cambiarEstadoAviso"); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ idAviso: idAvisoParam, nuevoEstado: "PAGADO" }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Mostrar mensaje de éxito con toastr
                    toastr.success(data.message);

                    // Cerrar el modal
                    $('#moverAvisos').modal('hide');

                    // Recargar dinámicamente la lista de avisos
                    const busqueda = $('#search-query').val(); // Obtener el término de búsqueda actual
                    const filtro = $('#dropdown-avisos .dropdown-item.active').data('estado') || ''; // Obtener el filtro actual
                    const pagina = $('.page-btn.active').data('page') || 1; // Obtener la página actual
                    cargarAvisos(pagina, busqueda, filtro); // Llamar a cargarAvisos con los filtros actuales
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud:", error);
                toastr.error("Ocurrió un error al procesar la solicitud.");
            });
        } else {
            console.error("No se encontró el ID Aviso.");
            toastr.error("ID Aviso no válido.");
        }
    });
</script>

</body>

</html>