<?php
require_once APPPATH . 'third_party/fpdf/fpdf.php';

class FPDF_Extended extends FPDF
{
    // Método para dibujar un polígono
    public function Polygon($points, $style = 'D')
    {
        // Array para almacenar comandos
        $op = $style === 'F' ? 'f' : ($style === 'DF' || $style === 'FD' ? 'B' : 'S');

        // Dibujar el polígono
        $this->_out(sprintf('%.2F %.2F m', $points[0], $points[1])); // Primer punto
        for ($i = 2; $i < count($points); $i += 2) {
            $this->_out(sprintf('%.2F %.2F l', $points[$i], $points[$i + 1]));
        }
        $this->_out('h ' . $op); // Cierra la figura y aplica estilo
    }
}
