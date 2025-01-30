<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aviso de Cobranza</title>
    
    <link href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/avisospdf.css" rel="stylesheet" />
</head>
<body>
    <?php if ($aviso['estado'] === 'PAGADO' || $aviso['estado'] === 'VENCIDO'): ?>
        <div class="watermark <?= strtolower($aviso['estado']); ?>">
            <?= strtoupper($aviso['estado']); ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="header">
            <img src="<?php echo $logo; ?>" alt="Logo de la Empresa">
            <div class="title">
                <h1>
                    <?= ($aviso['estado'] === 'PAGADO') ? 'RECIBO DE PAGO' : 'AVISO DE COBRANZA'; ?>
                </h1>
                
            </div>
        </div>

        <div class="info">
            <table>
                <tr>
                    <td><strong>Socio:</strong> <?= $aviso['nombreSocio']; ?></td>
                    <td><strong>Lectura Actual:</strong> <?= $aviso['lecturaActual']; ?></td>
                    <td><strong>Fecha Lect. Act.:</strong> <?= $aviso['fechaLectura']; ?></td>
                </tr>
                <tr>
                    <td><strong>Código Socio:</strong> <?= $aviso['codigoSocio']; ?></td>
                    <td><strong>Lectura Anterior:</strong> <?= $aviso['lecturaAnterior']; ?></td>
                    <td><strong>Fecha Lect Ant.:</strong> <?= $aviso['fechaAnterior']; ?></td>
                </tr>
                <tr>
                    <td><strong>Fecha de Vencimiento:</strong> <?= $aviso['fechaVencimiento']; ?></td>
                    <td><strong>Tarifa Vigente:</strong> <?= $aviso['tarifaVigente']; ?> Bs.</td>
                    <td><strong>Tarifa Mínima:</strong> <?= $aviso['tarifaMinima']; ?> Bs.</td>
                </tr>
            </table>
        </div>

        <table class="table-section">
            <thead>
                <tr>
                    <th>Evolución del Consumo</th>
                    <th>Consumo m³</th>
                    <th>Tarifa Aplicada Bs/m³</th>
                    <th>Observación</th>
                    <th>Sub total Bs.</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($evolucionConsumo) && is_array($evolucionConsumo)): ?>
                    <?php foreach ($evolucionConsumo as $consumo): ?>
                        <?php
                            $diferenciaLecturas = round(($consumo['lecturaActual'] - $consumo['lecturaAnterior']) / 100, 1);
                            $tarifaAplicada = ($diferenciaLecturas > 10) ? $consumo['tarifaVigente'] : $consumo['tarifaMinima'];
                            // Determinar la observación en función de $diferenciaLecturas
                            if ($diferenciaLecturas < 10) {
                                $observacion = "Consumo Mínimo";
                            } elseif ($diferenciaLecturas < 20) {
                                $observacion = "Consumo Moderado";
                            } elseif ($diferenciaLecturas < 30) {
                                $observacion = "Consumo Estándar";
                            } elseif ($diferenciaLecturas < 40) {
                                $observacion = "Consumo Elevado";
                            } else {
                                $observacion = "Consumo Muy Elevado";
                            }
                        ?>
                        <tr>
                            <td><?= $consumo['fechaLectura']; ?></td>
                            <td><?= $diferenciaLecturas; ?></td>
                            <td><?= $tarifaAplicada; ?></td>
                            <td><?= $observacion; ?></td>
                            <td class="numeric"><?= round(($diferenciaLecturas * $tarifaAplicada), 1); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Sin datos históricos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="footer">
            <?php if ($aviso['estado'] === 'PAGADO' || $aviso['estado'] === 'VENCIDO'): ?>
                <div class="facturaActual">
                    <p><b>Periodo: <?= $aviso['fechaLectura']; ?></b></p>
                    <p><b>Consumo: <?= $consumo = round(($aviso['lecturaActual'] - $aviso['lecturaAnterior']) / 100, 1); ?> m3</b></p>
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
                            echo number_format($totalFactura, 1) . " Bs.";
                            ?>
                        </b>
                    </p>
                </div>
            <?php else: ?>
                <div class="facturaAdeudada">
                    <table class="table-adeudados">
                        <thead>
                            <tr>
                                <th>Meses Adeudados</th>
                                <th>Sub total Bs.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $totalAdeudado = 0;
                                if (!empty($evolucionConsumo) && is_array($evolucionConsumo)): 
                                    foreach ($evolucionConsumo as $consumoMes): 
                                        if ($consumoMes['estado'] !== 'PAGADO'): 
                                            $diferenciaLecturas = round(($consumoMes['lecturaActual'] - $consumoMes['lecturaAnterior']) / 100, 1);
                                            $tarifaAplicada = ($diferenciaLecturas < 10) ? $consumoMes['tarifaMinima'] : $consumoMes['tarifaVigente'];
                                            $subTotal = round($diferenciaLecturas * $tarifaAplicada, 1);
                                            $totalAdeudado += $subTotal;
                            ?>
                                <tr>
                                    <td><?= $consumoMes['fechaLectura']; ?></td>
                                    <td class="numeric"><?= number_format($subTotal, 1); ?></td>
                                </tr>
                            <?php 
                                        endif;
                                    endforeach; 
                                else: 
                            ?>
                                <tr>
                                    <td colspan="2" class="text-center">No hay deudas pendientes.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        <?php if ($totalAdeudado > 0): ?>
                        <tfoot>
                            <tr class="total-row">
                                <td><b>Total a pagar</b></td>
                                <td class="numeric"><b><?= number_format($totalAdeudado, 1); ?> Bs.</b></td>
                            </tr>
                        </tfoot>
                        <?php endif; ?>
                    </table>
                </div>
            <?php endif; ?>

            <div class="facturaInfo">
                <br><br>
                <ul>
                    <li><strong>Consumo Mínimo:</strong> Menor a 10 m³ → Tarifa mínima</li>
                    <li><strong>Consumo Moderado:</strong> Menor a 20 m³ → Tarifa vigente</li>
                    <li><strong>Consumo Estándar:</strong> Menor a 30 m³ → Tarifa vigente</li>
                    <li><strong>Consumo Elevado:</strong> Menor a 40 m³ → Tarifa vigente</li>
                    <li><strong>Consumo Muy Elevado:</strong> Mayor o igual a 40 m³ → Tarifa vigente</li>
                </ul>
            </div>
        </div>

    </div>
    <p style="text-align: center;">Gracias por su pago puntual.</p>
</body>
</html>
