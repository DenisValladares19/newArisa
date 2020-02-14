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
        $this->Image('./fpdf/Print.png',10,10,-300);
        $this->Ln(10);
        $this->Cell(180,10,utf8_decode('ORDEN DE TRABAJO'),0,0,'C');
        $this->SetLineWidth(4);
        $this->Line(75,10,3000, 0);



    }

    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','B',13);
        // Page number

        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$con = conectar();

$idOrden = $id;
$query = mysqli_query($con, "select * from detallecotizacion where idCotizacion='$idOrden' and borradoLogico!=0");
$resultado = mysqli_query($con,"select o.*,c.idCotizacion, cl.idCliente,cl.nombre,cl.apellido from orden o inner join cotizacion c on o.idCotizacion = c.idCotizacion inner join cliente cl on c.idCliente = cl.idCliente where o.borradoLogico !=0 and o.idCotizacion = '$idOrden'");


$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',13);
$pdf->Ln(20);
$fila = mysqli_fetch_row($resultado);
date_default_timezone_set('America/El_Salvador');
$newDate = date("d-m-Y");
$pdf->SetMargins(3,1,1);
$pdf->Cell(33,3,utf8_decode('       NÚMERO'),0);
$pdf->Cell(40,10,utf8_decode($fila[8]),1,'','C');
$pdf->Cell(30,3,utf8_decode('         FECHA'),0);
$pdf->Cell(40,10,utf8_decode($newDate),1,'','C');
$pdf->Cell(20,3,utf8_decode('         N°:'),0);
$pdf->Cell(25,10,utf8_decode($fila[0]),1,'','C');
$pdf->Ln(5);
$pdf->Cell(40,3,utf8_decode('      COTIZACIÓN:'),0);
$pdf->Cell(40,3,utf8_decode('      '),0);
$pdf->Cell(40,3,utf8_decode('      EMISIÓN:'),0);
$pdf->Ln(11);

$pdf->Cell(40,3,utf8_decode('             CLIENTE:'),0);

$pdf->Cell(155,9,utf8_decode(   $fila[10]." ".$fila[11]),1);

//Parte de detalle
$pdf->Ln(13);
$pdf->Cell(40,3,utf8_decode('       DETALLE DE'),0);
$pdf->Cell(26,10,utf8_decode('CANTIDAD'),1);
$pdf->Cell(129,10,utf8_decode('DESCRIPCIÓN'),1,'','C');
$pdf->Ln(5);
$pdf->Cell(40,3,utf8_decode('                ORDEN:'),0);

//Listar cantidad
$pdf->Ln(5);
$pdf->Cell(40,10,utf8_decode('             '),0);


while($data=mysqli_fetch_array($query)) {


        $pdf->Cell(26, 10, utf8_decode($data['cantidad']), 1, '', 'C');
        $pdf->Cell(129, 10, utf8_decode($data['descripcion']), 1, '', 'C');
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('             '), 0);

}

$pdf->Ln(10);
$pdf->Cell(40,3,utf8_decode('           FECHA DE'),0);
$pdf->Cell(50,10,utf8_decode('            '),1);

$pdf->Cell(40,3,utf8_decode('              '),0,'','C');
$pdf->Cell(65,10,utf8_decode('                      '),1);
$pdf->Ln(5);
$pdf->Cell(40,3,utf8_decode('           ENTREGA:'),0);
$pdf->Cell(50,3,utf8_decode('               '),0,'','C');
$pdf->Cell(40,3,utf8_decode('           AUTORIZA:    '),0,'','C');
$pdf->Output();
?>