var mapDefault;  // Declarar mapDefault a nivel global
var dataloggerMarkers = [];  // Array para almacenar los marcadores de Dataloggers
var medidorMarkers = [];  // Array para almacenar los marcadores de Medidores

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
    var infoWindow = new google.maps.InfoWindow();

    // Polígono de área (Opcional, puedes removerlo si no lo necesitas)
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

    // Mostrar marcadores de dataloggers
    var dataloggerCoordinates = window.coordenadas;  // Debes pasar las coordenadas desde el HTML como una variable global
    dataloggerCoordinates.forEach(function(datalogger) {
        var dataloggerMarker = createDataloggerMarker({
            lat: parseFloat(datalogger.latitud),
            lng: parseFloat(datalogger.longitud)
        }, mapDefault, datalogger.idDatalogger);
        dataloggerMarkers.push(dataloggerMarker);
    });

    // Mostrar marcadores de medidores
    var medidorCoordinates = window.medidorCoordenadas;  // Coordenadas de los medidores desde la variable global
    medidorCoordinates.forEach(function(medidor) {
        var medidorMarker = createMedidorMarker({
            lat: parseFloat(medidor.latitud),
            lng: parseFloat(medidor.longitud)
        }, mapDefault, medidor.idMedidor);
        medidorMarkers.push(medidorMarker);
    });
}
window.addEventListener('resize', function() {
    if (mapDefault) {
        google.maps.event.trigger(mapDefault, 'resize');
    }
});

// Función para crear un marcador de datalogger
function createDataloggerMarker(position, map, idDatalogger) {
    var dataloggerMarker = new google.maps.Marker({
        position: position,
        map: map,
        draggable: false  // Desactivar arrastre si solo deseas mostrar los marcadores
    });

    if (idDatalogger) {
        dataloggerMarker.idDatalogger = idDatalogger;
    }

    var infoWindow = new google.maps.InfoWindow({
        disableAutoPan: true
    });
    
    google.maps.event.addListener(dataloggerMarker, 'mouseover', function () {
        var contentString = '<div>' +
            '<p style="color: black;">Datalogger ID: ' + dataloggerMarker.idDatalogger + '</p>' +
            '</div>';
    
        infoWindow.setContent(contentString);
        infoWindow.open(map, dataloggerMarker);
    });

    google.maps.event.addListener(dataloggerMarker, 'mouseout', function () {
        infoWindow.close();
    });

    return dataloggerMarker;
}

// Función para crear un marcador de medidor
function createMedidorMarker(position, map, idMedidor) {
    var medidorMarker = new google.maps.Marker({
        position: position,
        map: map,
        draggable: false,  // Desactivar arrastre si solo deseas mostrar los marcadores
        icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png'  // Diferenciar los medidores con un ícono amarillo
    });

    if (idMedidor) {
        medidorMarker.idMedidor = idMedidor;
    }

    var infoWindow = new google.maps.InfoWindow({
        disableAutoPan: true
    });
    
    google.maps.event.addListener(medidorMarker, 'mouseover', function () {
        var contentString = '<div>' +
            '<p style="color: black;">Medidor ID: ' + medidorMarker.idMedidor + '</p>' +
            '</div>';
        infoWindow.setContent(contentString);
        infoWindow.open(map, medidorMarker);
    });

    google.maps.event.addListener(medidorMarker, 'mouseout', function () {
        infoWindow.close();
    });

    return medidorMarker;
}
