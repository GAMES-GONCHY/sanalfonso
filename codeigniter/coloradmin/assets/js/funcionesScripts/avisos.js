function cargarAvisos(pagina, busqueda = '', filtro = '') {
    $.ajax({
        url: CARGAR_AVISOS_URL,
        type: 'GET',
        data: { pagina: pagina, busqueda: busqueda, filtro: filtro },
        dataType: 'json',
        success: function (response) {
            let resultList = $('#result-list');
            let pagination = $('#pagination');

            resultList.empty();
            pagination.empty();

            if (response.avisos.length > 0) {
                response.avisos.forEach(function (aviso) {
                    let fechaLecturaObj = new Date(aviso.fechaLectura);
                    let meses = [
                        'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
                        'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'
                    ];
                    let mes = meses[fechaLecturaObj.getMonth()];
                    let anio = fechaLecturaObj.getFullYear();
                    let fechaFormateada = `${mes}-${anio}`;

                    let fechaVencimientoObj = new Date(aviso.fechaVencimiento);
                    let dia = fechaVencimientoObj.getDate().toString().padStart(2, '0');
                    let mesVenc = (fechaVencimientoObj.getMonth() + 1).toString().padStart(2, '0');
                    let anioVenc = fechaVencimientoObj.getFullYear();
                    let fechaFormateadaVenc = `${dia}-${mesVenc}-${anioVenc}`;

                    let total = (aviso.lecturaActual - aviso.lecturaAnterior) / 100;
                    total = total < 10 ? aviso.tarifaMinima : (total * aviso.tarifaVigente).toFixed(2);

                    resultList.append(`
                        <div class="result-item">
                            <a href="#moverAvisos" class="result-link" data-bs-toggle="modal"
                                onclick="cargarDetalle('${aviso.codigoSocio}', 
                                                        '${aviso.nombreSocio}', 
                                                        '${fechaFormateada}', 
                                                        '${total}',
                                                        '${aviso.idAviso}',
                                                        '${aviso.estado}')">
                                <div class="result-image"
                                    style="background-image: url('${BASE_URL}uploads/img/${aviso.estado.toLowerCase()}.png');">
                                </div>
                            </a>

                            <div class="result-info">
                                <h4 class="text-white">${aviso.nombreSocio}</h4>
                                <div class="group">
                                    <p><strong>Código:</strong> ${aviso.codigoSocio}</p>
                                    <p><strong>Lectura Actual:</strong> ${aviso.lecturaActual}</p>
                                    <p><strong>Lectura Anterior:</strong> ${aviso.lecturaAnterior}</p>
                                </div>
                                <div class="group">
                                    <p><strong>Periodo:</strong> ${fechaFormateada}</p>
                                    <p><strong>Tarifa Vigente:</strong> ${aviso.tarifaVigente} Bs.</p>
                                    <p><strong>Tarifa Mínima:</strong> ${aviso.tarifaMinima} Bs.</p>
                                </div>
                                <div class="group">
                                    <h4 class="vencimiento"><strong>Vencimiento:</strong> ${fechaFormateadaVenc}</h4>
                                </div>
                            </div>

                            <div class="result-price text-end">
                                Bs ${total}
                                <a href="${BASE_URL}index.php/avisocobranza/generarPDFAviso/${aviso.idAviso}/${aviso.idMembresia}" target="_blank" class="btn btn-yellow d-block w-100">Ver Detalles</a>
                            </div>
                        </div>
                    `);
                });

                // Generar botones de paginación dinámicos
                for (let i = 1; i <= response.total_paginas; i++) {
                    pagination.append(`
                        <button class="btn page-btn ${i === pagina ? 'btn-primary' : 'btn-outline-primary'}"
                            data-page="${i}" data-busqueda="${busqueda}" data-filtro="${filtro}">
                            ${i}
                        </button>
                    `);
                }
            } else {
                resultList.append('<p>No hay avisos disponibles.</p>');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al cargar los datos:', error);
        }
    });
}
