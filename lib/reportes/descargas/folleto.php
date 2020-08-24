<?php

require_once('tcpdf_include.php');

class Reportes
{

	public function generarFolleto()
	{
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


		


		//print_r($datos);

		
		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));



		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}


		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 18, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->AddPage();


		// Set some content to print
		$html = <<<EOD

		<div style="height:100%;background-image:url("https://png.pngtree.com/thumb_back/fw800/background/20190223/ourmid/pngtree-solid-color-matte-background-blue-gradient-wind-background-color-mattesolid-backgroundblue-image_84871.jpg")">
		hola mundo
		</div>
	
EOD;

		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('folleto.pdf', 'I');

		header("Content-type: application/pdf");

		//============================================================+
		// END OF FILE
		//============================================================+

	}
}



	$reporte = new Reportes();
	$reporte->generarFolleto();
