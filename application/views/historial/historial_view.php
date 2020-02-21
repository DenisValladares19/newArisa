<script src="<?php echo base_url("resources/src/js/historial/historial.js")?>"></script>

<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Registro de Actividades
    </h3>

</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Actividades</a>
        </li>
    </ul>
</div>

<div class="table-responsive">

    <table class="table table-bordered" width="100%" cellspacing="0" id="data">
        <thead style="background-color: rgba(11, 23, 41 , 0.6); color: #f0f0f0">
        <td>Historial</td>
        </thead>

        <tbody id="table">



        </tbody>

        <tfoot>
        <th>Historial</th>
        </tfoot>



    </table>

</div>



<!-- Modal -->
<div class="modal fade" id="frmInsertarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insertar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formRol">


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Nombre de Rol</label>
                            <input type="text" name="nombre" id="nombreI" class="form-control"></input>
                        </div>
                    </div>
                    <button type="submit" id="btnSaveId" name="btnSave" class="btn btn-primary">Guardar Rol</button>
                </form>
            </div>

        </div>
    </div>
</div>


<!--Modal Edit-->

<div class="modal fade" id="frmEditarRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="editFormRol">


                    <div class="form-column col-md-12">

                        <input type="hidden" name="txtId" value="0">

                        <div class="form-group">
                            <label>Nombre de Rol</label>
                            <input type="text" name="nombreE" id="nombreIE" class="form-control"></input>
                        </div>
                    </div>
                    <button type="submit" id="btnEditId" name="btnEdit" class="btn btn-primary">Editar Rol</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!--Modal Delete-->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formRol">


                    <div class="form-column col-md-12">

                        ¿Eliminar este registro?
                    </div>

                    <button type="submit" id="btnDeleteId" name="btnDelete" class="btn btn-danger">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>







