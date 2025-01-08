// Función para realizar la lectura al recargar la página
// function actualizarLecturas() {
//     $.ajax({
//         url: '/tercerAnio/aquaReadPro/codeigniter/index.php/lecturadl/mostrarlectura',
//         method: 'GET',
//         dataType: 'json',
//         cache: false,  // Evitar cacheo
//         success: function(response) {
//             if (response.status === 'success') {
//                 console.log("Lectura realizada correctamente.");
//             } else {
//                 console.log("No se encontraron lecturas.");
//             }
//         },
//         error: function() {
//             console.log("Error en la llamada AJAX.");
//         }
//     });
// }

// $(document).ready(function() {
//     actualizarLecturas(); // Ejecutar al cargar la página
// });

// function realizarLectura() {
//     $.ajax({
//         url: '/tercerAnio/aquaReadPro/codeigniter/index.php/lecturadl/realizarlectura',
//         method: 'GET',
//         dataType: 'json',
//         cache: false,  // Evitar cacheo
//         success: function(response) {
//             if (response.status === 'success') {
//                 console.log("Lectura realizada correctamente.");
//                 // Aquí puedes agregar lógica para actualizar la tabla si es necesario
//             } else {
//                 console.log("No se encontraron lecturas.");
//             }
//         },
//         error: function() {
//             console.log("Error en la llamada AJAX.");
//         }
//     });
// }

// $(document).ready(function() {
//     // Asignar la función al botón
//     $('#realizarLecturaBtn').on('click', function() {
//         realizarLectura(); // Ejecutar la función al hacer clic en el botón
//     });
// });