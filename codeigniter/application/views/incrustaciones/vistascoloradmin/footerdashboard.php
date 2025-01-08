  <div id="footer" class="app-footer mx-0 px-0">
    <h5 class="mb-0">&copy; 2024 <b>Aqua</b>ReadPro - by G@mes Rights Reserved</h5>
  </div>
  </div>
  <!-- END CONTENT PAGE -->


  <!-- BOTON VERDE SUSPENCION -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- END APP HEADER -->




  <!-- jQuery primero -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/jquery.min.js"></script>







  <!-- Scripts de ColorAdmin -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/vendor.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/theme/transparent.min.js"></script>

  <!-- Sweets alerts/Modals scripts -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/ui-modal-notification.demo.js"></script>

  <!-- Dashborad / Apecharts -->
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/d3/d3.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/nvd3/build/nv.d3.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

  <!-- variable para script dashboard-v31,js -->
  <!-- <script>
    var obtenerConsumoUrl = '<?php echo base_url("index.php/usuario/obtenerPagosMensual"); ?>';
  </script> -->

  <!-- <script src="<?php echo base_url(); ?>coloradmin/assets/js/demo/dashboard-v31.js"></script> -->


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
                  //window.location.href = '<?php echo base_url(); ?>index.php/crudusers/agregar';
              <?php endif; ?>
          });
      <?php endif; ?>
  });
</script>

<!-- para calendario de dashboard -->
<script>
$(document).ready(function() {
    // Verificar si el datepicker acepta el cambio manual de idioma
    $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        clear: "Limpiar"
    };

    // Inicializar el Datepicker en español con fecha actual por defecto
    $("#datepicker-inline").datepicker({
        inline: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true,
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
        language: 'es'  // Especifica que el idioma es 'es' para usar las traducciones arriba
    }).datepicker("setDate", new Date());  // Establecer la fecha actual
});
</script>

<!-- grafico conusmo vs tiempo -->
<script>
    document.addEventListener('DOMContentLoaded', async function () {
        try {
            // Obtener los datos del backend
            const response = await fetch('<?php echo base_url(); ?>index.php/usuario/obtenerConsumoMensual');
            const data = await response.json();

            // Función para formatear fechas a "MMM YYYY" en español
            const formatMonth = (dateString) => {
                const [year, month] = dateString.split('-'); // Separar año y mes
                const date = new Date(year, month - 1); // Crear una fecha válida
                return date.toLocaleString('es-ES', { month: 'short', year: 'numeric' }); // Ejemplo: "may. 2024"
            };

            // Procesar los datos para consumo
            const categories = data.map(item => formatMonth(item.mes)); // Convertir los meses al formato literal
            const seriesDataConsumo = data.map(item => parseFloat(item.total_consumido)); // Extraer los consumos

            // Configuración del gráfico de área
            var optionsConsumo = {
                chart: {
                    type: 'area', // Cambiar a área
                    height: 254,
                    toolbar: {
                        show: false // Deshabilitar el menú
                    }
                },
                series: [{
                    name: 'Consumo (m3)',
                    data: seriesDataConsumo // Usar los datos de consumo
                }],
                xaxis: {
                    categories: categories, // Usar los meses en formato literal
                    labels: {
                        style: {
                            colors: '#FFFFFF', // Color blanco para las etiquetas del eje X
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Mes',
                        style: {
                            color: '#FFFFFF', // Color blanco para el título del eje X
                            fontSize: '14px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#FFFFFF', // Color blanco para las etiquetas del eje Y
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Consumo [m3]',
                        style: {
                            color: '#FFFFFF', // Color blanco para el título del eje Y
                            fontSize: '14px'
                        }
                    }
                },
                colors: ['#ff6347'], // Color de la línea y el área
                stroke: {
                    curve: 'smooth', // Suavizar la línea
                    width: 2 // Grosor de la línea
                },
                fill: {
                    type: 'gradient', // Usar relleno con degradado
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7, // Opacidad en la parte superior
                        opacityTo: 0.2, // Opacidad en la parte inferior
                        stops: [0, 90, 100]
                    }
                },
                grid: {
                    borderColor: '#444', // Ajustar el color del grid
                },
                legend: {
                    labels: {
                        colors: '#FFFFFF', // Color blanco para las etiquetas de la leyenda
                    }
                }
            };

            // Renderizar el gráfico de área
            var chartConsumo = new ApexCharts(document.querySelector("#consumoBarChart"), optionsConsumo);
            chartConsumo.render();
        } catch (error) {
            console.error('Error al cargar los datos de consumo:', error);
        }
    });
</script>


<!-- grafico pagos vs tiempo -->
<script>
    document.addEventListener('DOMContentLoaded', async function () {
        try {
            // Obtener los datos del backend
            const response = await fetch('<?php echo base_url(); ?>index.php/usuario/obtenerPagosMensual');
            const data = await response.json();

            // Función para formatear fechas a "MMM YYYY"
            const formatMonth = (dateString) => {
                const [year, month] = dateString.split('-'); // Separar año y mes
                const date = new Date(year, month - 1); // Crear una fecha válida
                return date.toLocaleString('es-ES', { month: 'short', year: 'numeric' }); // Ejemplo: "may. 2024"
            };

            // Procesar los datos para pagos
            const categories = data.map(item => formatMonth(item.mes)); // Convertir los meses al formato literal
            const seriesDataPagos = data.map(item => parseFloat(item.total_pagado)); // Extraer los pagos

            // Configuración del gráfico de barras
            var optionsPagos = {
                chart: {
                    type: 'bar', // Cambiar a barras
                    height: 254,
                    toolbar: {
                        show: false // Deshabilitar el menú
                    }
                },
                series: [{
                    name: 'Pagos (Bs)',
                    data: seriesDataPagos // Usar los datos de pagos
                }],
                xaxis: {
                    categories: categories, // Usar los meses en formato literal
                    labels: {
                        style: {
                            colors: '#FFFFFF', // Color blanco para las etiquetas del eje X
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Mes',
                        style: {
                            color: '#FFFFFF', // Color blanco para el título del eje X
                            fontSize: '14px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#FFFFFF', // Color blanco para las etiquetas del eje Y
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Pagos [Bs]',
                        style: {
                            color: '#FFFFFF', // Color blanco para el título del eje Y
                            fontSize: '14px'
                        }
                    }
                },
                colors: ['#02bdbd'], // Color de las barras
                grid: {
                    borderColor: '#444', // Ajustar el color del grid
                },
                legend: {
                    labels: {
                        colors: '#FFFFFF', // Color blanco para las etiquetas de la leyenda
                    }
                }
            };

            // Renderizar el gráfico de barras
            var chartPagos = new ApexCharts(document.querySelector("#pagosBarChart"), optionsPagos);
            chartPagos.render();
        } catch (error) {
            console.error('Error al cargar los datos de pagos:', error);
        }
    });
</script>


</body>

</html>