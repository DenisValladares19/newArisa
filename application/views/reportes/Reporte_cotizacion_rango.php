<?php
require('./fpdf/fpdf.php');
require('./application/models/Conexion.php');

class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Select Arial bold 15
        $this->SetFont('Arial','B',15);
        $this->Cell(280,20,utf8_decode('Reporte de Cotizaciones'),1,0,'C');
        // Line break
        $this->Ln(20);
        // Move to the right
        $this->SetFillColor(54,150,129);
        $this->SetDrawColor(36,99,85);
        $this->Cell(50,10,utf8_decode('Codigo'),1,0,'C',true);
        $this->Cell(120,10,'Empresa',1,0,'C',true);
        $this->Cell(30,10,'Fecha',1,0,'C',true);
        $this->Cell(40,10,'Estado',1,0,'C',true);
        $this->Cell(40,10,'Total',1,0,'C',true);
        
        $this->Ln();

    }

    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$con = conectar();
$query = mysqli_query($con, "SELECT d.idDetalle, d.idCotizacion, d.idDescripcion, c.fecha, c.codigo, c.descripcion,cl.idCliente, e.idEstado1, cl.empresa, e.nombre AS estado, de.subtotal, de.iva, de.vTotal FROM detallecotizacion d JOIN cotizacion c ON d.idCotizacion = c.idCotizacion JOIN cliente cl ON c.idCliente=cl.idCliente JOIN estado1 e ON c.idEstado1=e.idEstado1 JOIN descripcion de ON de.idDescripcion=d.idDescripcion WHERE c.borradoLogico=1 AND c.fecha BETWEEN '$inicial' AND '$final'  GROUP BY d.idCotizacion, d.idDescripcion, c.fecha, c.descripcion, cl.nombre, cl.apellido, e.nombre, de.subtotal, de.iva, de.vTotal HAVING COUNT(*)>0 ORDER BY d.idDetalle DESC" );



$pdf=new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$total=0;
while($data=mysqli_fetch_array($query)){

    $pdf->Cell(50,7,$data['codigo'],1,0,'C');
    $pdf->Cell(120,7,utf8_decode($data['empresa']),1,0,'C');
    $pdf->Cell(30,7,utf8_decode($data['fecha']),1,0,'C');
    $pdf->Cell(40,7,utf8_decode($data['estado']),1,0,'C');
    $pdf->Cell(40,7,$data['vTotal'],1,0,'C');
    $pdf->Ln();

    $total+=$data['vTotal'];

}
    
    $pdf->Cell(240,7,"TOTAL",1,0,'R');
    $pdf->Cell(40,7,utf8_decode(number_format($total,2)),1,0,'C');   

$pdf->Output();
?>