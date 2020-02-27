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
            margin-right: 100px; 
            padding-right:100px;
            font-family: 'arial';
            font-size: 12pt;
        }

        .parrafo{
            text-align: justify;
            width:500px;
        }
        .fecha{
            float:right;
        }
        table{
            width: 700px;
            caption-side:bottom;
            margin-left: 40px;
            margin-top:15px;
            
        }
        .cabecera td{
            border-top: 2px;
            border-bottom:2px;
            border-left:2px;
            border-collapse: collapse;
            text-align:center;
            font-weight: bold;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .cabecera{
            background-color: #65CEC6;
        }
        .b{
            text-align:right;
        }
        .cuerpo td{
            border-bottom:2px;
            border-left:2px; 
            padding-top: 5px;
            padding-bottom: 5px;
            font-size:11pt;
        }
        .pie td{
            padding-top: 5px;
            padding-bottom: 5px;
            font-size:11pt;
        }
    </style>
</head>
<body>
    <?php 
        function fechaToSpanish($fecha){
            setlocale(LC_TIME, "spanish");
            $fecha2 = str_replace("/", "-", $fecha);
            $nueva = date("d-m-Y", strtotime($fecha2));
            $nuevaFecha = strftime("%A, %d de %B de %Y", strtotime($nueva));
            return $nuevaFecha;
        }
    ?>
    <div class="contenedor">
        <img src="<?php echo base_url('resources/images/reporte/helloPrint.jpg');?>">
        <br>
        <p class="b">Fecha: <?php echo fechaToSpanish($cot[0]->fecha);?><br>
            </p>
        <p class="a">Señor(a): <br>
        <?php echo $cot[0]->clNombre?> <?php echo $cot[0]->clApellido?>
        </p>
        <p class="parrafo">Presente <br>
            Estimado cliente reciba un cordial saludo y los mejores deseos de éxito en sus labores
            diarias. Tenemos el agrado de presentar nuestra cotización de servicios para su
            consideración:
        </p>
    </div>
    <table cellspacing="0">
        <tr class="cabecera">
            <td style="width:7%;">ITEM</td>
            <td style="width:45%;">DESCRIPCIÓN</td>
            <td style="width:10%; font-size: 9pt;">CANTIDAD</td>
            <td style="width:10%; font-size: 9pt;">UNIDAD</td>
            <td style="width:12%; font-size: 9pt;">PRECIO UNIT</td>
            <td style="width:10%; border-right:2px;">TOTAL</td>
        </tr>
        <?php 
            for($i=0;$i<count($desc);$i++){
        ?>
        <tr class="cuerpo">
            <td style="width:7%; text-align:center;"><?= ($i+1)?></td>
            <td style="width:45%; padding-left:5px;"><?= $desc[$i]->descripcion?></td>
            <td style="width:10%; text-align:center;"><?= $desc[$i]->cantidad?></td>
            <td style="width:10%; text-align:center;">UNIDAD</td>
            <td style="width:12%; text-align:center;">$ <?= number_format($desc[$i]->precio,2)?></td>
            <td style="width:10%; border-right:2px; text-align:center;">$ <?= number_format($desc[$i]->total,2)?></td>
        </tr>
        <?php
            }
            $leng = (9-count($desc));

            for($i=0;$i<$leng;$i++){
        ?>
                <tr class="cuerpo">
                    <td style="width:7%; text-align:center;"><?= ($i+(count($desc)+1))?></td>
                    <td style="width:45%; padding-left:5px;"></td>
                    <td style="width:10%; text-align:center;"></td>
                    <td style="width:10%; text-align:center;"></td>
                    <td style="width:12%; text-align:center;"></td>
                    <td style="width:10%; border-right:2px; text-align:center;"></td>
                </tr>        
        <?php
            }
        ?>
        <tr class="pie">
            <td style="width:7%; text-align:center; border-left:2px;"></td>
            <td style="width:45%; padding-left:5px; font-size:10pt;"></td>
            <td style="width:10%; text-align:center;"></td>
            <td style="width:10%; text-align:center;"></td>
            <td style="width:12%; text-align:center; font-size:10pt; border-left:2px; border-bottom:2px;">GRAN TOTAL</td>
            <td style="width:10%; border-right:2px; text-align:center; font-size:11pt; border-left:2px; border-bottom:2px;">$</td>
        </tr>
        <tr  class="pie">
            <td style="width:7%; text-align:center; border-left:2px;"></td>
            <td style="width:45%; padding-left:5px; font-size:10pt;"><b>A CONSIDERAR: PRECIOS NO INCLUYEN IVA</b></td>
            <td style="width:10%; text-align:center;"></td>
            <td style="width:10%; text-align:center;"></td>
            <td style="width:12%; text-align:center; font-size:10pt; border-left:2px; border-bottom:2px;">SUBTOTAL</td>
            <td style="width:10%; border-right:2px; text-align:center; font-size:11pt; border-left:2px; border-bottom:2px;">$ <?= number_format($desc2[0]->subtotal,2)?></td>
        </tr>
        <tr class="pie">
            <td style="width:7%; text-align:center; border-left:2px;"></td>
            <td style="width:45%; padding-left:5px; font-size:10pt;"></td>
            <td style="width:10%; text-align:center;"></td>
            <td style="width:10%; text-align:center;"></td>
            <td style="width:12%; text-align:center; font-size:10pt; border-left:2px; border-bottom:2px;">IVA(13%)</td>
            <td style="width:10%; border-right:2px; text-align:center; font-size:11pt; border-left:2px; border-bottom:2px;">$ <?= number_format($desc2[0]->iva,2)?></td>
        </tr>
        <tr class="pie">
            <td style="width:7%; text-align:center; border-left:2px; border-bottom:2px;"></td>
            <td style="width:45%; padding-left:5px; border-bottom:2px;"></td>
            <td style="width:10%; text-align:center; border-bottom:2px;"></td>
            <td style="width:10%; text-align:center; border-bottom:2px;"></td>
            <td style="width:12%; text-align:center; font-size:10pt; border-left:2px; border-bottom:2px; background-color:#A3A8A8;">VALOR TOTAL</td>
            <td style="width:10%; border-right:2px; text-align:center; font-size:11pt; border-left:2px; border-bottom:2px;  background-color:#A3A8A8;">$ <?= number_format($desc2[0]->vTotal,2)?></td>
        </tr>
    </table>
    <div class="contenedor">
        <img src="<?php echo base_url('resources/images/reporte/contactPrint.png');?>">
    </div> 
</body>
</html>