<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aviso de Cobranza</title>
    <link href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/avisospdf.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <!-- SECCIÓN PROBLEMÁTICA -->
        <div class="header">
            <img src="<?php echo $logo; ?>" alt="Logo de la Empresa">
            <div class="title">
                <h1>AVISO DE COBRANZA</h1><br>
            </div>
        </div>
        <!-- FIN SECCIÓN PROBLEMÁTICA -->
        <div class="info">
            <table>
                <tr>
                    <td><strong>Socio:</strong> <?= $aviso['nombreSocio'] ;?></td>
                    <td><strong>Lectura Actual:</strong> <?= $aviso['lecturaActual'] ;?></td>
                    <td><strong>Fecha Lect. Act.:</strong> <?= $aviso['fechaLectura'] ;?></td>
                </tr>
                <tr>
                    <td><strong>Código Socio:</strong> <?= $aviso['codigoSocio'] ;?></td>
                    <td><strong>Lectura Anterior:</strong> <?= $aviso['lecturaAnterior'] ;?></td>
                    <td><strong>Fecha Lect Ant.:</strong> <?= $aviso['fechaAnterior'] ;?></td>
                </tr>
                <tr>
                    <td><strong>Fecha de Vencimiento:</strong> <?= $aviso['fechaVencimiento'] ;?></td>
                    <td><strong>Tarifa Vigente:</strong> <?= $aviso['tarifaVigente'] ;?> Bs.</td>
                    <td><strong>Tarifa Mínima:</strong> <?= $aviso['tarifaMinima'] ;?> Bs.</td>
                </tr>
            </table>
        </div>
        <table class="table-section">
            <thead>
                <tr>
                    <th>Evolución del Consumo</th>
                    <th>Consumo m3</th>
                    <th>TarifaAplicada Bs/m3</th>
                    <th>Total Bs.</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($evolucionConsumo) && is_array($evolucionConsumo)): ?>
                    <?php foreach ($evolucionConsumo as $consumo): ?>
                        <?php
                            // Calcular la diferencia de lecturas
                            $diferenciaLecturas = round(($consumo['lecturaActual'] - $consumo['lecturaAnterior']) / 100, 2);
                            // Determinar qué tarifa usar
                            $tarifaAplicada = ($diferenciaLecturas > 10) ? $consumo['tarifaVigente'] : $consumo['tarifaMinima'];
                        ?>
                        <tr>
                            <td><?= $consumo['fechaLectura']; ?></td>
                            <td><?= $diferenciaLecturas; ?></td>
                            <td><?= $tarifaAplicada ?></td>
                            <td class="numeric"><?= round(($diferenciaLecturas*$tarifaAplicada),2) ;?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Sin datos historicos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <!-- <tfoot>
                <tr>
                    <td>..</td>
                    <td>..</td>
                    <td>Total Factura Actual</td>
                    <td class="numeric"><strong>.</strong></td>
                </tr>
            </tfoot> -->
        </table>
        
        <div class="footer">
            <div class="facturaActual">
                <p><b>Periodo: <?= $aviso['fechaLectura'];?></b></p>
                <p><b>Consumo: <?= $consumo = round(($aviso['lecturaActual'] - $aviso['lecturaAnterior'])/100,1);?> m3</b></p>
                <p>
                    <b>
                        Total factura Actual: 
                        <?php 
                        // Lógica para calcular el total de la factura
                        if ($consumo < 10) {
                            $totalFactura = $consumo * $aviso['tarifaMinima'];
                        } else {
                            $totalFactura = $consumo * $aviso['tarifaVigente'];
                        }
                        echo number_format($totalFactura, 2) . " Bs.";
                        ?>
                    </b>
                </p>
            </div>
            <p>Gracias por su pago puntual.</p>
        </div>
    </div>


</body>
</html>
