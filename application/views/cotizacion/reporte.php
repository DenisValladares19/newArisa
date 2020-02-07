<?php
ob_start();
require_once('application/views/cotizacion/reporte_view.php');
$html = ob_get_clean();
ob_end_clean();
require_once('vendor/autoload.php');

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf("P","A4","es",true,"UTF-8",array(7,5,5,5));
$html2pdf->writeHTML($html);
$html2pdf->output("cotizacion.pdf","I");

?>