<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #000;
            width: 100%;
            padding: 10px 0;
        }

        .header img {
            width: 200px;
            margin-right: 60px;
        }

        .header .title {
            display: inline-block;
        }

        .header .title h1 {
            margin: 0;
            font-size: 25px;
        }

        .info-container {
            width: 100%;
            max-width: 700px;
            margin: 10px auto;
            padding: 10px;
            font-size: 14px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 5px 15px;
            vertical-align: top;
            width: 50%;
        }

        .info-label {
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 14px;
        }

        .table th {
            background-color: #f2f2f2;
            color: black;
            font-weight: bold;
            padding: 10px;
        }

        .table td {
            padding: 7px;
            text-align: center;
        }

        .total-row {
            font-weight: bold;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="header">
        <?php if (!empty($logo)): ?>
            <img src="<?= $logo ?>" alt="Logo">
        <?php endif; ?>
        <div class="title">
            <h1>Historial de Avisos Vencidos</h1>
        </div>
    </div>

    <div class="info-container">
        <table class="info-table">
            <tr>
                <?php if (!empty($codigoSocio)): ?>
                    <td><span class="info-label">Código Socio:</span> <?= $codigoSocio ?></td>
                <?php endif; ?>
                <?php if (!empty($socio)): ?>
                    <td><span class="info-label">Socio:</span> <?= $socio ?></td>
                <?php endif; ?>
            </tr>
            <tr>
                <td><span class="info-label">Periodo:</span> <?= $fechaInicioFormateada ?> a <?= $fechaFinFormateada ?></td>
                <td><span class="info-label">Fecha de emisión:</span> <?= date('d/m/Y') ?></td>
            </tr>
        </table>
    </div>

    <table class="table">
        <tr>
            <th>No.</th>
            <th>Socio</th>
            <th>Código</th>
            <th>Mes - Año</th>
            <th>Total [Bs.]</th>
            <th>Estado</th>
        </tr>
        <?php $contador = 1; $totalAvisos = 0; ?>
        <?php foreach ($avisos as $aviso): ?>
            <tr>
                <td><?= $contador++ ?></td>
                <td><?= utf8_decode($aviso['socio']) ?></td>
                <td><?= $aviso['codigoSocio'] ?></td>
                <td><?= fechaSoloMesAnio($aviso['fechaLectura']) ?></td>
                <td><?= number_format($aviso['total'], 2) ?></td>
                <td><?= ucfirst(utf8_decode($aviso['estado'])) ?></td>
            </tr>
            <?php $totalAvisos += $aviso['total']; ?>
        <?php endforeach; ?>
        <tr class="total-row">
            <td colspan="4"><strong>Total</strong></td>
            <td><?= number_format($totalAvisos, 2) ?></td>
            <td></td>
        </tr>
    </table>

    <?php if (!empty($footer_script)): ?>
        <?= $footer_script ?>
    <?php endif; ?>

</body>
</html>
