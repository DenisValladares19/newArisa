<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        img{
            width:650px;
            text-align:right;
        }
        .contenedor{
            width:500px;
            margin-top:40px;
            margin-left: 40px;
            margin-right: 80px; 
            padding-right:50px;
            font-family: 'arial';
            font-size: 12pt;
        }
        h1{
            color:blue;
        }
        .parrafo{
            text-align: justify;
        }
        .fecha{
            float:right;
        }
        table{
            width: 700px;
            caption-side:bottom;
        }
        .cabecera td{
            border: 2px;
            border-collapse: collapse;
            
            text-align:center;
            font: bold;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .cabecera{
            border:5px;
            background-color: cadetblue;
        }
    </style>
</head>
<body>
    <?php 
        function fechaToSpanish($fecha){
            setlocale(LC_TIME, "spanish");
            $fecha = str_replace("/", "-", $fecha);
            $nueva = date("d-m-Y", strtotime($fecha));
            $nuevaFecha = strftime("%A, %d de %B de %Y", strtotime($nueva));
            return $nuevaFecha;
        }
    ?>
    <div class="contenedor">
    <img src="<?php echo base_url('resources/images/reporte/helloPrint.jpg');?>">
    <br>
    <p>Señor(a): <br>
    <?php echo $cot[0]->clNombre?> <?php echo $cot[0]->clApellido?> &nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
    Fecha: <?php echo fechaToSpanish($cot[0]->fecha);?><br>
    </p>
    <p class="parrafo">Presente <br>
        Estimado cliente reciba un cordial saludo y los mejores deseos de éxito en sus labores
        diarias. Tenemos el agrado de presentar nuestra cotización de servicios para su
        consideración:
    </p>
    <table>
        <tr class="cabecera">
            <td style="width:7%;">ITEM</td>
            <td style="width:40%;">DESCRIPCIÓN</td>
            <td style="width:10%; font-size: 9pt;">CANTIDAD</td>
            <td style="width:10%; font-size: 9pt;">UNIDAD</td>
            <td style="width:12%; font-size: 9pt;">PRECIO UNIT</td>
            <td style="width:10%; ">TOTAL</td>
        </tr>
    </table>
    
    <h1>Hello Word!</h1>
    <h2>Cotización</h2>
    <?php echo var_dump($cot);?>
    <h2>Detalle</h2>
    <?php echo var_dump($desc);?>
    <h2>Decripcion</h2>
    <?php echo var_dump($desc2);?>
    </div>
</body>
</html>