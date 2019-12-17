<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Login</title>

    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="<?php echo base_url("resources/css/normalize.css")?>">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="<?php echo base_url("resources/css/bootstrap.min.css")?>">

    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="<?php echo base_url("resources/css/bootstrap-material-design.min.css")?>">

    <!-- Font Awesome V5.9.0 -->
    <link rel="stylesheet" href="<?php echo base_url("resources/css/all.css")?>">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="<?php echo base_url("resources/css/sweetalert2.min.css")?>">

    <!-- Sweet Alert V8.13.0 JS file -->
    <script src="<?php echo base_url("resources/js/sweetalert2.min.js")?>" ></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="<?php echo base_url("resources/css/jquery.mCustomScrollbar.css")?>">

    <!-- General Styles -->
    <link rel="stylesheet" href="<?php echo base_url("resources/css/style.css")?>">
</head>
<body>

<div class="login-container">
    <div class="login-content">
        <p class="text-center">
            <i class="fas fa-user-circle fa-5x"></i>
        </p>
        <p class="text-center">
            Inicia sesión con tu cuenta
        </p>
        <form action="Login/login" method="post">
            <div class="form-group">
                <label for="UserName" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp; Usuario</label>
                <input type="text" class="form-control" id="UserName" name="user" maxlength="35">
            </div>
            <div class="form-group">
                <label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
                <input type="password" class="form-control" id="UserPassword" name="pass" maxlength="200">
            </div>
            <input type="submit" value="Login" name="btnLogin" class="btn btn-primary">
        </form>
    </div>
</div>


<!--=============================================
=            Include JavaScript files           =
==============================================-->
<!-- jQuery V3.4.1 -->
<script src="<?php echo base_url("resources/js/jquery-3.4.1.min.js")?>" ></script>

<!-- popper -->
<script src="<?php echo base_url("resources/js/popper.min.js")?>" ></script>

<!-- Bootstrap V4.3 -->
<script src="<?php echo base_url("resources/js/bootstrap.min.js")?>" ></script>

<!-- jQuery Custom Content Scroller V3.1.5 -->
<script src="<?php echo base_url("resources/js/jquery.mCustomScrollbar.concat.min.js")?>" ></script>

<!-- Bootstrap Material Design V4.0 -->
<script src="<?php echo base_url("resources/js/bootstrap-material-design.min.js")?>" ></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<script src="<?php echo base_url("resources/js/main.js")?>" ></script>
</body>
</html>