<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH."/third_party/fpdf/fpdf.php";
    class Pdf extends FPDF
	{		
		
		public function Header()
		{
			
			if ($this->PageNo() == 1) {
				// Mostrar el logotipo en la primera página
				$rutaimg = base_url() . "coloradmin/assets/img/logo/logomenu.png";
				$this->Image($rutaimg, 10, 6, 30); // Ajuste de posición (x = 10, y = 6, ancho = 30)

			}
		
		}

		public function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I',7);
			$fechahora=date('d-m-Y H:i:s');
			$this->Cell(0,10,"AquaReadPro ".' - Pag. '.$this->PageNo().'/{nb}',0,0,'R');
		}
	}
?>
