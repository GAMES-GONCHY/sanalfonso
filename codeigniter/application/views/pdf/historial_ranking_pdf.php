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
            <h1>Top 5 Consumidores</h1>
        </div>
    </div>

    <div class="info-container">
        <table class="info-table">
            <tr>
                <td><span class="info-label">Periodo:</span> <?= $periodo ?></td>
                <td><span class="info-label">Fecha de emisión:</span> <?= date('d/m/Y') ?></td>
            </tr>
        </table>
    </div>

    <table class="table">
        <tr>
            <th>Top</th>
            <th>Código</th>
            <th>Socio</th>
            <th>Consumo [m³]</th>
            <th>Total [Bs.]</th>
        </tr>
        <?php $contador = 1; $totalConsumo = 0; $totalBs = 0; ?>
        <?php foreach ($ranking as $consumidor): ?>
            <tr>
                <td><?= $contador++ ?></td>
                <td><?= $consumidor['codigo'] ?></td>
                <td><?= utf8_decode($consumidor['socio']) ?></td>
                <td><?= number_format($consumidor['consumo'], 2) ?></td>
                <td><?= number_format($consumidor['total'], 2) ?></td>
            </tr>
            <?php 
                $totalConsumo += $consumidor['consumo']; 
                $totalBs += $consumidor['total']; 
            ?>
        <?php endforeach; ?>
        <tr class="total-row">
            <td colspan="3"><strong>Total</strong></td>
            <td><?= number_format($totalConsumo, 2) ?></td>
            <td><?= number_format($totalBs, 2) ?></td>
        </tr>
    </table>

    <?php if (!empty($footer_script)): ?>
        <?= $footer_script ?>
    <?php endif; ?>

</body>
</html>
