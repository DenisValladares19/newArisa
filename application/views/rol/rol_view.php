<script src="<?php echo base_url("resources/src/js/rol/rol.js")?>"></script>

<div class="row">

    <div class="col-md-12">
        <h1>Gestión de Roles</h1>
    </div>

    <div class="col-md-1">
        <div class="btn btn-primary" id="agregarRol">Agregar</div>
    </div>


</div>

<div class="table-responsive">

    <table class="table table-bordered" width="100%" cellspacing="0" id="data">
        <thead style="font-weight: bold;">
        <td>Identificador</td>
        <td>Nombre</td>
        <td>Opciones</td>
        </thead>

        <tbody id="table">



        </tbody>

        <tfoot>
        <th>Identificador</th>
        <th>Nombre</th>
        <th>Opciones</th>
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







