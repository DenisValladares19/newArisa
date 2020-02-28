<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .contenedor{
            width:90%;
            margin:5%;
            margin-top:25px;
        }
        td{
            font-size: 12pt;
        }
    </style>
</head>
<body>
<?php 
    date_default_timezone_set('America/El_Salvador');
?>
    <div class="contenedor">
        <img src="<?php echo base_url('resources/images/reporte/orden.jpg');?>" style="width:100%;"><br><br>
        <table borde="0" cellspacing="0">
            <tr>
                <td style="text-align:right; width:100px;"><strong>NUMERO DE <br>COTIZACION</strong></td>
                <td style="border:1px; width:140px;  text-align: center; padding-top: 10px;"><?php echo $orden[0]->codigo ?></td>
                <td style="text-align:right; width: 100px; "><strong>FECHA DE<br>EMISION</strong></td>
                <td style="border:1px; width:125px;  text-align: center; padding-top: 10px;"><?php echo date("d-m-Y");?></td>
                <td style="text-align:right; width: 60px; padding-top:10px;"><strong>N°</strong></td>
                <td style="border:1px; width: 100px; text-align: center; padding-top: 10px;"><?php echo $orden[0]->idOrden;?></td>
            </tr>
                <tr><td style="height:5px;"></td></tr>
            <tr>
                <td  style="text-align:right; height:18px; padding-top: 10px;"><strong>CLIENTE</strong></td>
                <td style="border:1px; width:500px; padding-top: 10px; padding-left:10px;" colspan="5"><?php echo $orden[0]->nomCliente;?> <?php echo $orden[0]->apeCliente;?></td>
            </tr>
                <tr><td style="height:5px;"></td></tr>
            <tr>
                <td style="text-align:right;"><strong>DETALLE DE<br>ORDEN</strong></td>
                <td style="border:1px; border-right:0px; text-align: center; padding-top: 10px;"><strong>CANTIDAD</strong></td>
                <td style="border:1px; text-align: center; padding-top: 10px; width: 400px;" colspan="4"> <strong>DESCRIPCION</strong></td>
            </tr>
            <?php
                for($i=0;$i<count($detalle);$i++){
            ?>
                <tr>
                    <td style="text-align:right; "></td>
                    <td style="border:1px; border-right:0px;  height:15px; border-top:0px; text-align: center; padding-top: 10px;"><?php echo $detalle[$i]->cantidad;?></td>
                    <td style="border:1px; border-top:0px; padding-left:10px; padding-top: 10px; width: 400px;" colspan="4"><?php echo $detalle[$i]->descripcion;?></td>
                </tr>

            <?php 
                }
            ?>
                <tr><td style="height:5px;"></td></tr>
            <tr>
                <td style="text-align:right;"> <strong> FECHA DE <br>ENTREGA</strong></td>
                <td style="border:1px; 100px;" colspan="2"></td>
                <td style="text-align:right; padding-top: 10px;"><strong>AUTORIZA</strong></td>
                <td style="border:1px; width:75px;" colspan="2"></td>
            </tr>
        </table>
    </div>
</body>
</html>