<html>
<head>
    <title>Inventario</title>

    <script type="text/javascript">

        function mostrar() {
            document.getElementById("buscarInventario").style.display="block";
        }
        function ocultar() {
            document.getElementById("buscarInventario").style.display="none";
        }

        function mO() {
            var buscar = document.getElementById("buscarInventario");

            if (buscar.style.display == "none") {
                mostrar();
            }
            else {
                ocultar();
            }
        }


    </script>
</head>
<body>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Crear Ordenes de Trabajo
    </h3>

</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Orden de Trabajo</a>
        </li>


    </ul>
</div>



<div class="container-fluid">
    <div class="full-box">

        <div class="row mt-2">
            <div class="col-md-6">
                <input type="text" name="nombre" placeholder="Nombre..." class="form-control" required="true">
            </div>
            <div class="col-md-6">
                <input type="text" name="tamaño" placeholder="Tamaño..." class="form-control" required="true">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
            <br><br<br>
                <h5>Selecciones los Materiales  Utilizar</h5><br>
            </div>
            <div class="col-md-6">
               <label>Material 1</label> <input type="checkbox" name="material" class="checkbox"  required="true"><br>
                <label>Material 2</label> <input type="checkbox" name="material" class="checkbox"  required="true"><br>
            </div>
            <div class="col-md-6">
                <label>Material 3</label> <input type="checkbox" name="material" class="checkbox"  required="true"><br>
                <label>Material 4</label> <input type="checkbox" name="material" class="checkbox"  required="true"><br>
                <br><br><br>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-8">
                <label>Deja tu Comentario</label>
                <textarea type="text" name="comentario" class="swal2-textarea" required="true" > </textarea>
            </div>
            <div class="col-md-4">
                <br><br><br>
                <input type="button" class="btn-outline-warning form-control" value="Seleccionar Muestra">
            </div>
        </div>

    </div>

</div>
</div>


<br><br><br>
<div class="col-md-12" style="text-align: center">
    <input type="button" class="btn-outline-secondary form-control" value="Guardar">
</div>

<!-- Comentarios -->

</section>
</body>
</html>