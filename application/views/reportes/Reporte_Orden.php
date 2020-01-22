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
        $this->Cell(180,10,utf8_decode('Reporte de órdenes'),1,0,'C');
        // Line break
        $this->Ln(10);
        // Move to the right
        $this->SetFillColor(54,150,129);
        $this->SetDrawColor(36,99,85);
        $this->Cell(25,5,utf8_decode('Código '),1,0,'C',true);
        $this->Cell(35,5,utf8_decode('Cotización '),1,0,'C',true);
        $this->Cell(40,5,'Nombre',1,0,'C',true);
        $this->Cell(40,5,'Apellido',1,0,'C',true);
        $this->Cell(40,5,'Estado',1,0,'C',true);
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

$query = mysqli_query($con, "select o.*, c.idCotizacion, cl.nombre, cl.apellido,e.nombre as ne from orden o inner join cotizacion c on o.idCotizacion = c.idCotizacion inner join cliente cl on c.idCliente = cl.idCliente inner join estado2 e on o.idEstado2 = e.idEstado2  where o.borradoLogico!=0" );



$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

while($data=mysqli_fetch_array($query)){

    $pdf->Cell(25,5,$data['idOrden'],1,0,'C');
    $pdf->Cell(35,5,$data['idCotizacion'],1,0,'C');
    $pdf->Cell(40,5,utf8_decode($data['nombre']),1,0,'C');
    $pdf->Cell(40,5,utf8_decode($data['apellido']),1,0,'C');
    $pdf->Cell(40,5,utf8_decode($data['ne']),1,0,'C');
    $pdf->Ln();



}

$pdf->Output();
?>