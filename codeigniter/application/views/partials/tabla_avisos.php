<?php foreach ($avisos as $aviso): ?>
<tr class="text-center">
    <td><?php echo $aviso['idAviso']; ?></td>
    <td><?php echo $aviso['codigoSocio']; ?></td>
    <td><?php echo $aviso['nombreSocio']; ?></td>
    <td><?php echo $aviso['lecturaActual'] - $aviso['lecturaAnterior']; ?> m³</td>
    <td><?php echo $aviso['lecturaAnterior']; ?></td>
    <td><?php echo date('Y-m-d', strtotime($aviso['fechaLecturaAnterior'])); ?></td>
    <td><?php echo $aviso['tarifaVigente']; ?></td>
    <td><?php echo number_format(($aviso['lecturaActual'] - $aviso['lecturaAnterior']) * $aviso['tarifaVigente'], 2); ?></td>
    <td><?php echo $aviso['fechaVencimiento']; ?></td>
    <td>
        <input type="hidden" class="idAviso" value="<?php echo $aviso['idAviso']; ?>">
        <input type="checkbox" class="form-check-input toggle-checkbox" <?php echo ($aviso['estado'] === 'pagado') ? 'checked' : ''; ?>>
    </td>
</tr>
<?php endforeach; ?>
