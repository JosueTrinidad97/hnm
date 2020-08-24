<?php
require_once '../../../modelo/asistente.modelo.php';
require_once '../../../modelo/documento.modelo.php';
require_once('tcpdf_include.php');

class Reportes
{
	//public $idAsistente;
	public function generarFichaPago()
	{
		// create new PDF document
		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


		$documento = DocumentoModelo::mdlObtnerTipoDocumento('CONSTANCIA');

		$firmas = json_decode($documento['firmas'], true);




		$firma1 = $firmas['firma1'] == "" ? "" : '<img src="../../../' . $firmas["firma1"] . '" width="100" >';
		$firma2 = $firmas['firma2'] == "" ? "" : '<img src="../../../' . $firmas["firma2"] . '" width="100" >';
		$firma3 = $firmas['firma3'] == "" ? "" : '<img src="../../../' . $firmas["firma3"] . '" width="100" >';







		//var_dump($documento);

		//$datos = AsistenteModelo::mdlHojaDePago($this->idAsistente);


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
        <table>
		<tr>
			<td style="text-align: left;">
				<img src="images/logo_morelos.jpeg" width="150" >

				
			</td>
			<td style="text-align: center;">
				<img src="images/hnm-logo.png" width="95" >
			</td>
			<td style="text-align: right;">
				<img src="images/anfitrion.jpg" width="95" >
			</td>
		</tr>
		<tr>
		<td style="text-align: center;  width:100%">
		<p style = "font-size:14px">$documento[titulo]</p>
		<h1 style = "font-size:24px: font-style:bold;">CONSTANCIA</h1>
		<p style = "font-size:14px">$documento[sujeto]</p>
		<h2 style = "font-size:15px: font-style:bold;">Nombre del Asistente</h2>
		<p style = "font-size:14px">$documento[descripcion]</p>
		<h3 style = "font-size:15px: font-style:bold;">Nombre del Evento</h3>
		<p style = "font-size:14px">$documento[frase]</p>
		</td>
		
		</tr>
		</table>

		<br>
		<br>
		<table>
		<tr>
			<td style="text-align: center; width:33%">
				<br>
				<br>
				$firma1
				<hr style="text-align: center;  width:120px">
				<br>
				<strong style = "font-size:9px">$firmas[nombref1]</strong>
				
				<p style = "font-size:9px">$firmas[puestof1]</p>
				<br>
				<p style = "font-size:9px">$firmas[institucionf1]</p>
			
			</td>

			<td style="text-align: center; width:33%">	
				$firma2
				<hr style="text-align: center;  width:120px">
				
				<br>
				<strong style = "font-size:9px">$firmas[nombref2]</strong>
				
				<p style = "font-size:9px">$firmas[puestof2]</p>
				<br>
				<p style = "font-size:9px">$firmas[institucionf2]</p>
		 
			</td>
			<td style="text-align: center; width:33%">
			<br>
				<br>
				$firma3
				
				<hr style="text-align: right;  width:120px">
				<br>
				<strong style = "font-size:9px">$firmas[nombref3]</strong>
				
				<p style = "font-size:9px">$firmas[puestof3]</p>
				<br>
				<p style = "font-size:9px">$firmas[institucionf3]</p>
			
		
			</td>

				
		</tr>
			
			
		
	</table>
	
    <br>	
	

	<img src="../../../vista/img/plantilla/margenhnm.png" width="1500px" >
	
EOD;

		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('ficha_pago.pdf', 'I');

		header("Content-type: application/pdf");

		//============================================================+
		// END OF FILE
		//============================================================+

	}
}



$reporte = new Reportes();

$reporte->generarFichaPago();
