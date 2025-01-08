
/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 5
Version: 5.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/
*/
var handleDataTableCombinationSetting = function() {
    "use strict";

    var initDataTable = function(tableId) {
        if ($(tableId).length !== 0) {
            var options = {
                dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
                buttons:[],
                responsive: true,
                colReorder: true,
                scrollX: false,
                autoWidth: false, 
                keys: true,
                rowReorder: false,
                select: true,
                language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "columnDefs": [
                    { 
                        "targets": 0, // Aplica solo a la primera columna (numeración)
                        "orderable": false // Evitar que la columna sea ordenable
                    }
                ]
            };

            if ($(window).width() <= 1500) {
                options.rowReorder = false;
                options.colReorder = false;
            }

            // Inicializa la tabla con las opciones
            var table = $(tableId).DataTable(options);

            // Recalcular la numeración al dibujar la tabla
            table.on('order.dt search.dt draw.dt', function() {
                table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1; // Recalcula la numeración
                });
            }).draw();

            return table;
        }
        return null;
    };

    // Inicializa las tablas según el ID correspondiente
    window.tablaPendientes = initDataTable('#pendientes');  
    window.tablaPagados = initDataTable('#pagados');    
    window.tablaVencidos = initDataTable('#vencidos');   
};

var TableManageCombine = function () {
    "use strict";
    return {
        init: function () {
            handleDataTableCombinationSetting();
        }
    };
}();

$(document).ready(function () {
    // Inicializa las tablas cuando el documento esté listo
    TableManageCombine.init();
});
