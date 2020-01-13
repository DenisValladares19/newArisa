<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url("resources/css/bootstrap.min.css")?>">
    <title>Reporte</title>
</head>
<body>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </thead>
        </table>
        <pre>
        <?php 
            echo var_dump($desc);
        ?>
        </pre>
        
    </div>
</body>
</html>