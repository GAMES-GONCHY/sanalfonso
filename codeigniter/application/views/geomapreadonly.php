<div id="content" class="app-content p-0 position-relative">
    <!-- Contenedor para el mapa con un z-index bajo -->
    <div class="position-absolute w-100 h-100 top-0 start-0 bottom-0 end-0" style="z-index: 1;">
        <div id="google-map-default" class="w-100 h-100"></div>
    </div>
    <button id="addDataloggerBtn" class="btn btn-primary position-absolute" style="top: 20px; left: 20px; z-index: 3;" hidden>
        Agregar Datalogger
    </button>
    
    <button id="addMedidorBtn" class="btn btn-yellow position-absolute" style="top: 60px; left: 20px; z-index: 3;" hidden>
        Agregar Medidor
    </button>
    <!-- Contenedor para la interfaz, colocada por encima del mapa -->
    <!-- <div class="app-content-padding position-relative" style="z-index: 2;">
        <ol class="breadcrumb float-xl-end">
            <li class="breadcrumb-item"><a href="javascript:;" class="text-black">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;" class="text-black">Map</a></li>
            <li class="breadcrumb-item active text-gray-500">Google Map</li>
        </ol>
    </div> -->
</div>


