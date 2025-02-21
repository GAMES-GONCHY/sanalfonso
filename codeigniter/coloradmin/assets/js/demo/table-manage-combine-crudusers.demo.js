var handleDataTableCombinationSetting = function() {
	"use strict";
    
	if ($('#datatable').length !== 0) {
		var options = {
			dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
			buttons: [],
			responsive: true,
			colReorder: true,
			autoWidth: false,
			keys: true,
			rowReorder: true,
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
			}
		};

		if ($(window).width() <= 1500) {
			options.rowReorder = false;
			options.colReorder = false;
		}

		var tablaLecturas = $('#datatable').DataTable(options);

        // Añadir evento de clic para el botón eliminar
        $('#datatable tbody').on('click', 'button.delete', function() {
            var data = tablaLecturas.row($(this).parents('tr')).data();
            var userId = data[0];  // Asumiendo que el ID del usuario está en la primera columna

            if (confirm('¿Estás seguro de que deseas eliminar este administrador?')) {
                $.ajax({
                    url: baseUrl + 'eliminarbd',
                    type: 'POST',
                    data: {id: userId},
                    success: function(response) {
                        tablaLecturas.row($(this).parents('tr')).remove().draw();
                        alert('Administrador eliminado correctamente');
                    },
                    error: function() {
                        alert('Error al eliminar el administrador');
                    }
                });
            }
        });
	}
};

var TableManageCombine = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleDataTableCombinationSetting();
		}
	};
}();

$(document).ready(function() {
	TableManageCombine.init();
});
