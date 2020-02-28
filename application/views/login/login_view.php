<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Inicio de Sesion</title>

    <link rel="icon" type="image/png" href="<?php echo base_url("resources/images/icon/Arisa.ico")?>" />
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


    <link rel="stylesheet" href="<?php echo base_url("resources/src/css/login/main.css")?>">
    <link rel="stylesheet" href="<?php echo base_url("resources/src/css/login/util.css")?>">
</head>
<body>




<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo base_url("resources/images/uploads/Arisa.png")?>">
            </div>

            <form class="login100-form validate-form" action="Login/login" method="post">
					<span class="login100-form-title">
						Inicio de Sesion
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" id="UserName" name="user" placeholder="Nombre de Usuario">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" id="UserPassword" name="pass" placeholder="Contraseña...">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                       Iniciar Sesion
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">

						</span>
                    <a class="txt2" href="#">

                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
                        Arisa Consulting S.A de C.V
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--=============================================
=            Include JavaScript files           =
==============================================-->
<!-- jQuery V3.4.1 -->
<script src="<?php echo base_url("resources/js/jquery-3.4.1.min.js")?>" ></script>

<script src="<?php echo base_url("resources/js/external/jquery/tilt.jquery.min.js")?>" ></script>

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