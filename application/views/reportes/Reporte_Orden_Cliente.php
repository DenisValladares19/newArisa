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
        $this->Cell(280,20,utf8_decode('Reporte de órdenes'),1,0,'C');
        // Line break
        $this->Ln(20);
        // Move to the right
        $this->SetFillColor(54,150,129);
        $this->SetDrawColor(36,99,85);
        $this->Cell(60,10,utf8_decode('Cotización '),1,0,'C',true);
        $this->Cell(50,10,'Nombre',1,0,'C',true);
        $this->Cell(50,10,'Apellido',1,0,'C',true);
        $this->Cell(80,10,'Empresa',1,0,'C',true);
        $this->Cell(40,10,'Estado',1,0,'C',true);
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
$idCliente = $id;
$query = mysqli_query($con, "select o.*, c.codigo, cl.nombre, cl.empresa, cl.apellido,e.nombre as ne from orden o inner join cotizacion c on o.idCotizacion = c.idCotizacion inner join cliente cl on c.idCliente = cl.idCliente inner join estado2 e on o.idEstado2 = e.idEstado2  where o.borradoLogico!=0 and cl.idCliente = $idCliente;" );



$pdf=new PDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',14);

while($data=mysqli_fetch_array($query)){

    $pdf->Cell(60,7,$data['codigo'],1,0,'C');
    $pdf->Cell(50,7,utf8_decode($data['nombre']),1,0,'C');
    $pdf->Cell(50,7,utf8_decode($data['apellido']),1,0,'C');
    $pdf->Cell(80,7,$data['empresa'],1,0,'C');
    $pdf->Cell(40,7,utf8_decode($data['ne']),1,0,'C');
    $pdf->Ln();



}

$pdf->Output();
?>