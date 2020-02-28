<?php 
    ob_start();
    require_once('application/views/orden/reporte_view.php');
    $html = ob_get_clean();
    ob_end_clean();
    require_once('vendor/autoload.php');
    
    use Spipu\Html2Pdf\Html2Pdf;
    
    $html2pdf = new Html2Pdf("P","A4","es",true,"UTF-8");
    $html2pdf->writeHTML($html);
    $html2pdf->output("orden.pdf","I");


?>