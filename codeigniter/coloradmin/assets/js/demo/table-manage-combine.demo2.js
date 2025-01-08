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
                buttons: [
                    { extend: 'copy', className: 'btn-sm' },
                    { extend: 'csv', className: 'btn-sm' },
                    { extend: 'excel', className: 'btn-sm' },
                    { extend: 'pdf', className: 'btn-sm' },
                    { extend: 'print', className: 'btn-sm' }
                ],
                responsive: true,
                colReorder: true,
                scrollX: false,
                autoWidth: false, 
                keys: true,
                rowReorder: false,
                select: true
            };

            if ($(window).width() <= 1500) {
                options.rowReorder = false;
                options.colReorder = false;
            }

            return $(tableId).DataTable(options);
        }
        return null;
    };  
    //initDataTable('#datatable');
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



