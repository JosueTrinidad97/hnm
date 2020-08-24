<?php
require_once '../../../modelo/asistente.modelo.php';
require_once('tcpdf_include.php');

class Reportes
{
	public $idAsistente;
	public function generarFichaPago()
	{
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


		$datos = AsistenteModelo::mdlHojaDePago($this->idAsistente);


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

		$bardcode = $pdf->serializeTCPDFtagParameters(
            array($this->idAsistente, 'C128', '', '', 0, 0, 0.5, array(
                'position' => 'S',
                'border' => false, 'padding' => 0,
                'fgcolor' => array(0, 0, 0),
                'bgcolor' => array(255, 255, 255),
                'text' => true, 'font' => 'helvetica',
                'fontsize' => 10, 'stretchtext' => 6
            ), 'N')
        );


		// Set some content to print
		$html = <<<EOD
	<table>
		<tr>
			<td>
				<img src="images/logo_hospital.png" width="90" >
				
			</td>
			<td  style="text-align: right;">
				<img src="images/citibanamex-logo.png" width="200" >
			</td>
		</tr>
		<tr>
			<td>
				<h3><center>Ficha de pago CitiBanamex</center></h3>
				<br/>
				<br/>
				<pre><small>Institucion <strong>  Hospital del Niño Morelense </strong></small></pre> 
				<br/>
				<pre><small>Dirección: <strong> Av. de la Salud #1 Col.Benito Juárez, Municipio de Emiliano Zapata </strong></small></pre>   
				<br/>
				<pre><small>Teléfono: <strong> 01 (777) 3621170 </strong></small></pre>
				<br/>
				<pre><small>Referencia: <strong> 40748525093246 </strong></small></pre>
				<HR width="20%">
				<pre><small>Número de Id: <strong> $datos[idAsistente] </strong> </small></pre>
				<br/>
				<br/>
				<pre><small>Nombre del Asistente: <strong> $datos[nombre]</strong> </small></pre>
				<br/>
				<br/>
				<pre><small>Monto a pagar: <strong> $datos[precio] </strong> </small></pre>
				<br/>
				<br/>
				<pre><small>Concepto </small></pre>
				<br/>
				<br/>
				<pre><small>Evento: <strong> $datos[tema] </strong> </small></pre>
				
				
			</td>
		</tr>
		
	</table>
	<table>
		
		<tr>

			<td></td>
			<td>
			<br>
			<br>
			
			<tcpdf style="width:10px; text-align:center;" method="write1DBarcode" params="$bardcode" />
			</td>
			<td></td>
		
		</tr>
	
	</table>
	<div style="text-align: center">
		
	</div>
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

if (isset($_GET['idAsistente'])) {

	$reporte = new Reportes();
	$reporte->idAsistente = $_GET['idAsistente'];
	$reporte->generarFichaPago();
}
