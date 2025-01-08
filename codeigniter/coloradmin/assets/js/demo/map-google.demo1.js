function initMap() 
{
    var mapOptions = {
        zoom: 17,
        center: new google.maps.LatLng(-17.4105450836976, -66.12594068258299),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true,
        minZoom: 16,
        restriction: {
            latLngBounds: {
                north: -17.40602049319584,  // Latitud máxima permitida
                south: -17.41772613612582,  // Latitud mínima permitida
                east: -66.12145818889127,   // Longitud máxima permitida
                west: -66.12823287518866    // Longitud mínima permitida
            },
            strictBounds: false // Permite algo de margen fuera de los límites, si se establece en true, el mapa no se moverá fuera de los límites especificados
        },
        gestureHandling: "greedy" // Permite hacer zoom solo con el scroll del ratón
    };

    var mapDefault = new google.maps.Map(document.getElementById('google-map-default'), mapOptions);


    // Añadir el polígono para delimitar visualmente el área de trabajo
    var areaCoords = [
        { lat: -17.408245180718332, lng: -66.12707638331297 }, // Punto 1 
        { lat: -17.40684055845479, lng: -66.12465000539221 }, // Punto 2 
        { lat: -17.409884426845334, lng: -66.12394582690727 }, // Punto 3
        { lat: -17.41110434666331, lng: -66.12399193373078 }, // Punto 4
        { lat: -17.41537732580422, lng: -66.12540074076435 }, // Punto 5
        { lat: -17.415421965664258, lng: -66.12607972919076 }  // Punto 6  
    ];

    var areaPolygon = new google.maps.Polygon({
        paths: areaCoords,
        strokeColor: '#FF0000', // Color del borde
        strokeOpacity: 0.8,     // Opacidad del borde
        strokeWeight: 2,        // Grosor del borde
        fillColor: '#B0E0E6',   // Color del relleno
        fillOpacity: 0.1,       // Opacidad del relleno
		clickable: false
    });

    



    // Agregar el polígono al mapa
    areaPolygon.setMap(mapDefault);


	// Función para verificar si una coordenada está dentro del polígono
    function isPointInPolygon(point, polygon) {
        return google.maps.geometry.poly.containsLocation(point, polygon);
    }
    
    // Recorrer el array de coordenadas y añadir marcadores
    coordenadas.forEach(function(coord) {
        new google.maps.Marker({
            position: { lat: parseFloat(coord.latitud), lng: parseFloat(coord.longitud) },
            map: mapDefault,
            title: `ID: ${coord.idDatalogger}`,
        });
    });
    // Array de marcadores con coordenadas y títulos
    // var markers = [
    //     { position: { lat: -17.4105450836976, lng: -66.12594068258299 }, title: "Marcador 1" },
    //     { position: { lat: -17.408845, lng: -66.123540 }, title: "Marcador 2" },
    //     { position: { lat: -17.412345, lng: -66.126740 }, title: "Marcador 3" }
    // ];

    // Iterar sobre el array de marcadores y agregarlos al mapa
    // markers.forEach(function(markerData) {
    //     new google.maps.Marker({
    //         position: markerData.position,
    //         map: mapDefault,
    //         title: markerData.title
    //     });
    // });

     // Añadir nuevos marcadores al hacer clic en el mapa si están dentro del polígono
	 google.maps.event.addListener(mapDefault, 'click', function(event) {
		if (isPointInPolygon(event.latLng, areaPolygon)) {
			new google.maps.Marker({
				position: event.latLng,
				map: mapDefault,
				title: 'Nuevo Marcador'
			});
		} else {
			alert('El marcador debe estar dentro del área del polígono.');
		}
	});

    $(window).resize(function() {
        google.maps.event.trigger(mapDefault, "resize");
    });

    // Define styles
    var defaultMapStyles = [];
    var flatMapStyles = [
        {"stylers":[{"visibility":"off"}]},
        {"featureType":"road","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},
        {"featureType":"road.arterial","stylers":[{"visibility":"on"},{"color":"#fee379"}]},
        {"featureType":"road.highway","stylers":[{"visibility":"on"},{"color":"#fee379"}]},
        {"featureType":"landscape","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},
        {"featureType":"water","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]},
        {"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},
        {"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},
        {"elementType":"labels","stylers":[{"visibility":"off"}]},
        {"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]}
    ]; 
    var turquoiseWaterStyles = [
        {"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},
        {"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},
        {"featureType":"landscape.man_made","elementType":"geometry.fill"},
        {"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},
        {"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},
        {"featureType":"water","stylers":[{"color":"#7dcdcd"}]},
        {"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]}
    ];
    var icyBlueStyles = [
        {"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},
        {"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},
        {"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}
    ];
    var oldDryMudStyles = [
        {"featureType":"landscape","stylers":[{"hue":"#FFAD00"},{"saturation":50.2},{"lightness":-34.8},{"gamma":1}]},
        {"featureType":"road.highway","stylers":[{"hue":"#FFAD00"},{"saturation":-19.8},{"lightness":-1.8},{"gamma":1}]},
        {"featureType":"road.arterial","stylers":[{"hue":"#FFAD00"},{"saturation":72.4},{"lightness":-32.6},{"gamma":1}]},
        {"featureType":"road.local","stylers":[{"hue":"#FFAD00"},{"saturation":74.4},{"lightness":-18},{"gamma":1}]},
        {"featureType":"water","stylers":[{"hue":"#00FFA6"},{"saturation":-63.2},{"lightness":38},{"gamma":1}]},
        {"featureType":"poi","stylers":[{"hue":"#FFC300"},{"saturation":54.2},{"lightness":-14.4},{"gamma":1}]}
    ];
    var cobaltStyles  = [
        {"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#293036"}]},
        {"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}
    ];
    var darkRedStyles   = [
        {"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#000000"}]},
        {"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}
    ];

    $('[data-map-theme]').click(function() {
        var targetTheme = $(this).attr('data-map-theme');
        var targetLi = $(this).closest('li');
        var targetText = $(this).text();
        var inverseContentMode = false;
        $('#map-theme-selection li').not(targetLi).removeClass('active');
        $('#map-theme-text').text(targetText);
        $(targetLi).addClass('active');

        switch(targetTheme) 
        {
            case 'flat':
                mapDefault.setOptions({styles: flatMapStyles});
            break;
            case 'turquoise':
                mapDefault.setOptions({styles: turquoiseWaterStyles});
            break;
            case 'icy-blue':
                mapDefault.setOptions({styles: icyBlueStyles});
            break;
            case 'old-dry-mud':
                mapDefault.setOptions({styles: oldDryMudStyles});
            break;
            case 'cobalt':
                mapDefault.setOptions({styles: cobaltStyles});
            break;
            case 'dark-red':
                mapDefault.setOptions({styles: darkRedStyles});
            break;
            default:
                mapDefault.setOptions({styles: defaultMapStyles});
        }
    });
}


