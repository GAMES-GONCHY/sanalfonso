<?php
use Dompdf\Dompdf;
use Dompdf\Options;

class Dompdf_lib {
    protected $dompdf;

    public function __construct() {
        // Cargar Dompdf desde Composer
        require_once FCPATH . 'vendor/autoload.php';

        // Configurar opciones
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Permitir imágenes remotas
        $options->set('defaultFont', 'Arial');

        // Inicializar Dompdf con las opciones configuradas
        $this->dompdf = new Dompdf($options);
    }

	public function generar_pdf($html, $archivo_nombre = 'documento.pdf', $descargar = true, $paper_size = 'A4', $orientation = 'portrait')
	{
		$this->dompdf->loadHtml($html);
	
		if (is_array($paper_size)) {
			$this->dompdf->setPaper($paper_size, $orientation);
		} else {
			$this->dompdf->setPaper($paper_size, $orientation);
		}
	
		$this->dompdf->render();
	
		// Habilitar el uso de scripts en Dompdf (para la paginación con separación)
		$canvas = $this->dompdf->getCanvas();
		$canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
			$lineY = 750; // Posición de la línea separadora
			$textY = 765; // Posición del número de página
			$text = "Página $pageNumber de $pageCount";
			$font = $fontMetrics->getFont('Arial', 'normal');
	
			// Dibujar una línea horizontal
			$canvas->line(40, $lineY, 560, $lineY, array(0, 0, 0), 0.5);
	
			// Agregar número de página con margen adecuado
			$canvas->text(500, $textY, $text, $font, 10);
		});
	
		if ($descargar) {
			$this->dompdf->stream($archivo_nombre, ['Attachment' => 1]);
		} else {
			header('Content-Type: application/pdf');
			header('Content-Disposition: inline; filename="' . $archivo_nombre . '"');
			echo $this->dompdf->output();
		}
	}
	
	
	
	
}
