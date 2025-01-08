if (typeof currentUser !== 'undefined') {
    function verificarAsociaciones() {

        $.ajax({
            url: '/tercerAnio/aquaReadPro/codeigniter/index.php/membresia/verificarAsociacionesMembresia/' + idMembresia,
            method: 'GET',
            success: function(response) {
                try {
                    var data = JSON.parse(response);
                    console.log('Respuesta de verificar asociaciones:', data); // Log para verificar la respuesta

                    // Habilitar o deshabilitar botones según las asociaciones
                    if (data.tieneDatalogger) {
                        console.log('Datalogger ya existe, deshabilitando botón de agregar datalogger');
                        document.getElementById('addDataloggerBtn').disabled = true;
                    } else {
                        console.log('No hay datalogger, habilitando botón de agregar datalogger');
                        document.getElementById('addDataloggerBtn').disabled = false;
                    }

                    if (data.tieneMedidor) {
                        console.log('Medidor ya existe, deshabilitando botón de agregar medidor');
                        document.getElementById('addMedidorBtn').disabled = true;
                    } else {
                        //console.log('No hay medidor, habilitando botón de agregar medidor');
                        //document.getElementById('addMedidorBtn').disabled = false;
                    }
                } catch (e) {
                    console.error('Error al procesar la respuesta:', e);
                }
            },
            error: function() {
                console.error('Error al verificar las asociaciones de la membresía.');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        console.log('Inicializando página, deshabilitando botón de agregar medidor'); // Log para depurar la inicialización
        // Inicialmente, el botón de medidor debe estar deshabilitado
        document.getElementById('addDataloggerBtn').disabled = false;
        document.getElementById('addMedidorBtn').disabled = true; // Deshabilitar medidor inicialmente

        verificarAsociaciones(); // Llama a la función para verificar las asociaciones
    });
} else {
    console.error('Las variables globales currentUser o idMembresia no están definidas.');
}

var mapDefault;  // Declarar mapDefault a nivel global
var addingDataloggerMarker = false;  // Controla si se puede agregar un marcador
var addingMedidorMarker = false;  // Controla si se puede agregar un marcador de medidor
var dataloggerMarkers = [];  // Array para almacenar los marcadores de Dataloggers
var medidorMarkers = [];  // Array para almacenar los marcadores de Medidores
var infoWindow;  // Declarar infoWindow a nivel global
var altPressed = false;  // Controla si la tecla "Alt" está presionada

// Detectar cuándo se presiona la tecla "Alt"
document.addEventListener('keydown', function(event) {
    if (event.key === 'Alt' || event.key === 'AltGraph') {
        altPressed = true;
    }
});

// Detectar cuándo se suelta la tecla "Alt"
document.addEventListener('keyup', function(event) {
    if (event.key === 'Alt' || event.key === 'AltGraph') {
        altPressed = false;
    }
});

function initMap() {
    mapDefault = new google.maps.Map(document.getElementById('google-map-default'), {
        zoom: 17,
        center: new google.maps.LatLng(-17.4105450836976, -66.12594068258299),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true,
        minZoom: 16,
        restriction: {
            latLngBounds: {
                north: -17.404592,
                south: -17.41772613612582,
                east: -66.12145818889127,
                west: -66.12823287518866
            },
            strictBounds: false
        },
        gestureHandling: "greedy"
    });

    // Crear un infoWindow
    infoWindow = new google.maps.InfoWindow();

    // Polígono de área
    var areaCoords = [
        { lat: -17.408245180718332, lng: -66.12707638331297 },
        { lat: -17.40684055845479, lng: -66.12465000539221 },
        { lat: -17.409884426845334, lng: -66.12394582690727 },
        { lat: -17.41110434666331, lng: -66.12399193373078 },
        { lat: -17.41537732580422, lng: -66.12540074076435 },
        { lat: -17.415421965664258, lng: -66.12607972919076 }
    ];

    new google.maps.Polygon({
        paths: areaCoords,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#B0E0E6',
        fillOpacity: 0.1,
        clickable: false,
        map: mapDefault
    });

    // Marcadores desde la base de datos (Dataloggers)
    var dataloggerCoordinates = window.coordenadas;
    dataloggerCoordinates.forEach(function(datalogger) {
        var dataloggerMarker = createDataloggerMarker({
            lat: parseFloat(datalogger.latitud),
            lng: parseFloat(datalogger.longitud)
        }, mapDefault, datalogger.idDatalogger, datalogger.codigoDatalogger);
        dataloggerMarkers.push(dataloggerMarker);
    });

    // Marcadores desde la base de datos (Medidores)
    var medidorCoordinates = window.medidorCoordenadas;
    medidorCoordinates.forEach(function(medidor) {
        var medidorMarker = createMedidorMarker({
            lat: parseFloat(medidor.latitud),
            lng: parseFloat(medidor.longitud)
        }, mapDefault, medidor.idMedidor, medidor.idMembresia, medidor.codigoMedidor);
        medidorMarkers.push(medidorMarker);
    });

    // Evento para agregar un marcador de datalogger
    document.getElementById('addDataloggerBtn').addEventListener('click', function () {
        addingDataloggerMarker = true;
        mapDefault.setOptions({ draggableCursor: 'crosshair' });
    });

    // Evento para agregar un marcador de medidor
    // document.getElementById('addMedidorBtn').addEventListener('click', function () {
    //     addingMedidorMarker = true;
    //     mapDefault.setOptions({ draggableCursor: 'crosshair' });
    // });

    // Evento de clic para agregar un nuevo marcador de datalogger o medidor
    mapDefault.addListener('click', function (event) {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();

        if (addingDataloggerMarker) {
            var newDataloggerMarker = createDataloggerMarker({ lat: lat, lng: lng }, mapDefault);
            dataloggerMarkers.push(newDataloggerMarker);

            // Deshabilitar el botón inmediatamente después de agregar un datalogger
            document.getElementById('addDataloggerBtn').disabled = true;
            
            // Restaurar el cursor y deshabilitar la adición de nuevos dataloggers
            mapDefault.setOptions({ draggableCursor: null });
            addingDataloggerMarker = false;

            // Guardar el marcador en la base de datos
            saveDataloggerMarker(lat, lng, newDataloggerMarker);
        } else if (addingMedidorMarker) {
            var newMedidorMarker = createMedidorMarker({ lat: lat, lng: lng }, mapDefault);
            medidorMarkers.push(newMedidorMarker);

            // Deshabilitar el botón inmediatamente después de agregar un medidor
            // document.getElementById('addMedidorBtn').disabled = true;

            // Restaurar el cursor y deshabilitar la adición de nuevos medidores
            mapDefault.setOptions({ draggableCursor: null });
            addingMedidorMarker = false;

            // Guardar el marcador en la base de datos
            // saveMedidorMarker(lat, lng, newMedidorMarker);
        }
    });
}

window.addEventListener('resize', function() {
    if (mapDefault) {
        google.maps.event.trigger(mapDefault, 'resize');
    }
});

function createDataloggerMarker(position, map, idDatalogger, codigoDatalogger) {
    var dataloggerMarker = new google.maps.Marker({
        position: position,
        map: map,
        draggable: true
    });

    if (idDatalogger) {
        dataloggerMarker.idDatalogger = idDatalogger;
    }
    if (codigoDatalogger) {
        dataloggerMarker.codigoDatalogger = codigoDatalogger;
    }

    infoWindow = new google.maps.InfoWindow({
        disableAutoPan: true
    });

    google.maps.event.addListener(dataloggerMarker, 'mouseover', function () {
        var contentString = '<div>' +
            '<p style="color: black;">Cod: '+(dataloggerMarker.codigoDatalogger || 'cargando...') + '</p>' +
            '</div>';
        infoWindow.setContent(contentString);
        infoWindow.open(map, dataloggerMarker);
    
        setTimeout(function() {
            var iwOuter = document.querySelector('.gm-style-iw');
            if (iwOuter) {
                var closeButton = iwOuter.querySelector('.gm-style-iw-c');
                if (closeButton) {
                    closeButton.style.display = 'none'; // Oculta el botón de cerrar
                }
            }
        }, 100);
    });

    google.maps.event.addListener(dataloggerMarker, 'mouseout', function () {
        infoWindow.close();
    });

    google.maps.event.addListener(dataloggerMarker, 'rightclick', function () {
        deleteDataloggerMarker(dataloggerMarker);
    });

    google.maps.event.addListener(dataloggerMarker, 'dragend', function () {
        if (altPressed) {
            updateDataloggerMarkerPosition(dataloggerMarker);
        }
    });

    return dataloggerMarker;
}

function saveDataloggerMarker(lat, lng, dataloggerMarker) {
    console.log("Guardando datalogger..."); // Log para verificar que la función está siendo llamada
    $.ajax({
        url: '/tercerAnio/aquaReadPro/codeigniter/index.php/geodatalogger/agregardatalogger',
        method: 'POST',
        data: {
            latitud: lat,
            longitud: lng,
            idAutor: window.idUsuario,
            idMembresia: window.idMembresia
        },
        success: function (response) {
            var jsonResponse = JSON.parse(response);
            if (jsonResponse.status === 'success') {
                window.idDatalogger = jsonResponse.idDatalogger; // Actualiza la variable global
                console.log("Datalogger agregado con éxito:", jsonResponse.idDatalogger);

                // Aquí habilitas el botón de agregar medidor
                console.log("Habilitando botón de agregar medidor...");
                document.getElementById('addMedidorBtn').disabled = false;

            } else {
                alert("Error al agregar el datalogger: " + jsonResponse.message);
            }
        },
        error: function () {
            alert("Error al agregar el datalogger.");
        }
    });
}

function deleteDataloggerMarker(dataloggerMarker) 
{
    var idDatalogger = dataloggerMarker.idDatalogger;
    var estado = 0;

    document.body.style.cursor = 'progress';

    $.ajax({
        url: '/tercerAnio/aquaReadPro/codeigniter/index.php/geodatalogger/eliminardatalogger',
        method: 'POST',
        data: {
            idDatalogger: idDatalogger,
            estado: estado
        },
        success: function (response) {
            try {
                console.log(response);  // Verificar la respuesta
                var jsonResponse = JSON.parse(response);

                if (jsonResponse.status === 'success') {
                    dataloggerMarker.setMap(null);
                    dataloggerMarkers = dataloggerMarkers.filter(m => m !== dataloggerMarker);

                    document.body.style.cursor = 'default';
                } else {
                    document.body.style.cursor = 'default';
                    console.error("Error al eliminar el datalogger: " + jsonResponse.message);
                }
            } catch (e) {
                console.error("Error procesando la respuesta: ", e);
                document.body.style.cursor = 'default';
            }
        },
        error: function () {
            console.error("Error al eliminar el datalogger.");
            document.body.style.cursor = 'default';
        }
    });
}
function updateDataloggerMarkerPosition(dataloggerMarker) 
{
    var newLat = dataloggerMarker.getPosition().lat();
    var newLng = dataloggerMarker.getPosition().lng();
    var idDatalogger = dataloggerMarker.idDatalogger;

    $.ajax({
        url: '/tercerAnio/aquaReadPro/codeigniter/index.php/geodatalogger/modificardatalogger',
        method: 'POST',
        data: {
            idDatalogger: idDatalogger,
            latitud: newLat,
            longitud: newLng
        },
        success: function (response) {
            try {
                console.log(response);  // Verificar la respuesta
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.status === 'success') {
                    console.log("Coordenadas actualizadas correctamente.");
                } else {
                    console.error("Error al actualizar las coordenadas: " + jsonResponse.message);
                }
            } catch (e) {
                console.error("Error procesando la respuesta: ", e);
            }
        },
        error: function () {
            console.error("Error al actualizar las coordenadas.");
        }
    });
}


//MEDIDORES
function createMedidorMarker(position, map, idMedidor, idMembresia,codigoMedidor) 
{
    var medidorMarker = new google.maps.Marker({
        position: position,
        map: map,
        draggable: true,
        icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png'
    });

    if (idMedidor) {
        medidorMarker.idMedidor = idMedidor;
    }

    if (idMembresia) {
        medidorMarker.idMembresia = idMembresia;
    }
    if (codigoMedidor) {
        medidorMarker.codigoMedidor = codigoMedidor;
    }

    infoWindow = new google.maps.InfoWindow({
        disableAutoPan: true
    });

    google.maps.event.addListener(medidorMarker, 'mouseover', function () {
        var contentString = '<div>' +
            '<p style="color: black;">Cod: ' + (medidorMarker.codigoMedidor || 'cargando...') + '</p>' +
            '</div>';
        infoWindow.setContent(contentString);
        infoWindow.open(map, medidorMarker);
    });

    google.maps.event.addListener(medidorMarker, 'mouseout', function () {
        infoWindow.close();
    });

    google.maps.event.addListener(medidorMarker, 'rightclick', function () {
        deleteMedidorMarker(medidorMarker);
    });

    // Actualizar la posición al terminar el arrastre
    google.maps.event.addListener(medidorMarker, 'dragend', function () {
        if (altPressed) {
            updateMedidorMarkerPosition(medidorMarker);
        }
    });
    
    return medidorMarker;
}
// function saveMedidorMarker(lat, lng, medidorMarker) {
//     // Verificar si las variables necesarias están definidas y no son nulas
//     if (!lat || !lng || !window.idUsuario || !window.idMembresia || !window.idDatalogger) {
//         console.error('Uno o más valores son nulos o no están definidos:');
//         console.error('Latitud:', lat);
//         console.error('Longitud:', lng);
//         console.error('ID Usuario:', window.idUsuario);
//         console.error('ID Datalogger:', window.idDatalogger);
//         console.error('ID Membresia:', window.idMembresia);
//         return; // Detener la ejecución si hay valores nulos
//     }

//     console.log("Latitud:", lat);
//     console.log("Longitud:", lng);
//     console.log("ID Autor:", window.idUsuario);

//     $.ajax({
//         url: '/tercerAnio/aquaReadPro/codeigniter/index.php/geodatalogger/agregarmedidor',
//         method: 'POST',
//         data: {
//             latitud: lat,
//             longitud: lng,
//             idDatalogger: window.idDatalogger,
//             idMembresia: window.idMembresia,
//             idAutor: window.idUsuario
//         },
//         success: function (response) {
//             try {
//                 console.log(response);
//                 var jsonResponse = JSON.parse(response);
//                 if (jsonResponse.status === 'success') {
//                     medidorMarker.idMedidor = jsonResponse.idMedidor;
//                     medidorMarker.idMembresia = window.idMembresia;
//                 } else {
//                     alert("Error al agregar el medidor: " + jsonResponse.message);
//                 }
//             } catch (e) {
//                 console.error('Error al procesar la respuesta JSON:', e);
//             }
//         },
//         error: function () {
//             alert("Error al agregar el medidor.");
//         }
//     });
// }

function deleteMedidorMarker(medidorMarker) 
{
    var idMedidor = medidorMarker.idMedidor;
    var estado = 0; // Utilizamos 0 para marcar como eliminado

    document.body.style.cursor = 'progress';

    $.ajax({
        url: '/tercerAnio/aquaReadPro/codeigniter/index.php/geodatalogger/eliminarmedidor', // Asegúrate de cambiar a la ruta correcta
        method: 'POST',
        data: {
            idMedidor: idMedidor,
            estado: estado
        },
        success: function (response) {
            try {
                console.log(response); // Verificar la respuesta
                var jsonResponse = JSON.parse(response);

                if (jsonResponse.status === 'success') {
                    // Ocultar el marcador del mapa
                    medidorMarker.setMap(null);
                    medidorMarkers = medidorMarkers.filter(m => m !== medidorMarker);

                    document.body.style.cursor = 'default';
                } else {
                    document.body.style.cursor = 'default';
                    console.error("Error al eliminar el medidor: " + jsonResponse.message);
                }
            } catch (e) {
                console.error("Error procesando la respuesta: ", e);
                document.body.style.cursor = 'default';
            }
        },
        error: function () {
            console.error("Error al eliminar el medidor.");
            document.body.style.cursor = 'default';
        }
    });
}

function updateMedidorMarkerPosition(medidorMarker) 
{
    var newLat = medidorMarker.getPosition().lat();
    var newLng = medidorMarker.getPosition().lng();
    var idMedidor = medidorMarker.idMedidor;

    $.ajax({
        url: '/tercerAnio/aquaReadPro/codeigniter/index.php/geodatalogger/modificarmedidor',  // Ajusta la ruta según tu controlador y método
        method: 'POST',
        data: {
            idMedidor: idMedidor,
            latitud: newLat,
            longitud: newLng
        },
        success: function (response) {
            try {
                console.log(response);  // Verificar la respuesta
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.status === 'success') {
                    console.log("Coordenadas del medidor actualizadas correctamente.");
                } else {
                    console.error("Error al actualizar las coordenadas del medidor: " + jsonResponse.message);
                }
            } catch (e) {
                console.error("Error procesando la respuesta: ", e);
            }
        },
        error: function () {
            console.error("Error al actualizar las coordenadas del medidor.");
        }
    });
}

