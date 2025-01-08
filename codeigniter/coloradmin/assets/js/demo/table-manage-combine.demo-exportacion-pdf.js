$(document).ready(function () {
    // Asegúrate de que las tablas ya están inicializadas antes de aplicar las personalizaciones
    if (window.tablaPagados) {
        // Modificar el botón de exportación a PDF para excluir la última columna
        window.tablaPagados.button('0').config.exportOptions = {
            columns: [0, 1, 2, 3, 4, 5, 6] // Excluir la última columna
        };
    }

    if (window.tablaPendientes) {
        // Excluir la última columna en la tabla Pendientes también
        window.tablaPendientes.button('0').config.exportOptions = {
            columns: [0, 1, 2, 3, 4, 5, 6]
        };
    }

    if (window.tablaVencidos) {
        // Excluir la última columna en la tabla Vencidos también
        window.tablaVencidos.button('0').config.exportOptions = {
            columns: [0, 1, 2, 3, 4, 5, 6]
        };
    }
});
