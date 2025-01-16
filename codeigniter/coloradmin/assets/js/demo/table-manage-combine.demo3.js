/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 5
Version: 5.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/
*/

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
			ajax: {
				url: rutaObtenerLecturas,
				type: 'POST', // Cambiado a POST
				data: function(d) {
					// Si necesitas enviar parámetros adicionales, puedes añadirlos aquí
					return d;
				},
				dataSrc: '' // Ajusta esto según el formato del JSON de respuesta
			},
			columns: [
				{ data: 'numero' },
				{ data: 'lecturaActual' },
				{ data: 'lecturaAnterior' },
				{ data: 'codigoSocio' },
				{ data: 'nombreSocio' },
				{ data: 'ci' },
				{ data: 'fechaLectura' },
				{
					data: null,
					render: function (data, type, row) {
						return `
							<button 
								class="btn btn-success btn-sm mx-1" 
								data-bs-toggle="modal" 
								data-bs-target="#modalNuevaLectura"
								onclick="cargarLectura('${row.fechaLectura}', '${row.lecturaActual}', '${row.codigoSocio}', '${row.nombreSocio}', '${row.ci}', '${row.idMembresia}', '${row.numero}')">
								<i class="fas fa-pencil-alt"></i>
							</button>`;
					}
				}
			],
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
		// Guarda la instancia globalmente
		window.tablaLecturas = $('#datatable').DataTable(options);
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
