<?php
/* Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$id=$_GET['idventa'];
// Introducimos HTML de prueba
function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
 $html=file_get_contents("http://localhost/ventas/vistas/ventas/rerpoteVentaPdf.php?idventa=".$id);
 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("letter", "portrait");
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('reporteVenta.pdf');

*/


require_once dirname(__DIR__).'/../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

//recoge el contenido del otro fichero
try{
	ob_start();
require_once '../../vistas/ventas/reporteVentaPdf.php';
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