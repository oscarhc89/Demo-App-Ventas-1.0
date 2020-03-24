<?php
/* Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba


$html=file_get_contents_curl("http://localhost/ventas/vistas/ventas/ticketVentaPdf.php");


 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("letter", "portrait");
$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('ticketVenta.pdf');

function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}

*/

require_once dirname(__DIR__).'/../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

//recoge el contenido del otro fichero
try{
	ob_start();
require_once '../../vistas/ventas/ticketVentaPdf.php';
$html = ob_get_clean();

$html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'utf-8');
$html2pdf->writeHTML($html);
$html2pdf->Output('ticket.pdf', 'I');
}catch(Html2PdfException $e) {
	$html2pdf->clean();
	$formatter = new ExceptionFormatter($e);
	echo $formatter->getHtmlMessage();

}

?>