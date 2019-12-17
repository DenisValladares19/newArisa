<html>
<head>
    <title>Inventario</title>

</head>
<body>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Orden de Trabajo
    </h3>

</div>


<!-- Content here-->
<div class="container-fluid">
    <table class="table table-bordered" id="tablaUser" width="100%">
        <thead style="background-color: #85A1CD">
        <th>ID</th>
        <th>Nombres</th>
        <th>Comentario</th>
        <th>Tamaño</th>
        <th>Cantidad Material</th>
        <th>Muestra</th>
        </thead>
        <tfoot>
        <th>ID</th>
        <th>Nombres</th>
        <th>Comentario</th>
        <th>Tamaño</th>
        <th>Cantidad Material</th>
        <th>Muestra</th>
        </tfoot>
        <tbody>
        <tr>
            <td>1</td>
            <td>Orden</td>
            <td>Esta Orden de Trabajo esta muy dificil Amiguito :)</td>
            <td>25cm x 76 cm</td>
            <td>25cm de Material , 48Y de Material , 88cm de Material</td>
            <td>
                <a class="btn btn-outline-primary" >Ver</a>
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>


<!-- modal Insertar -->

<!-- Modal -->
<div class="modal fade" id="estado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Que Cambio Realizarás?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <select class="form-control">
                        <option>En Espera</option>
                        <option>Terminado</option>
                    </select>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

    <br><br><br>
    <div class="col-md-6" style="float: right">
        <input type="button" class="btn-outline-info" value="Guardar Cambios" data-toggle="modal" data-target="#estado">
    </div>


</section>
</body>
</html>