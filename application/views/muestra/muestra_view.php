<script src="<?php echo base_url("resources/src/js/muestra/muestra.js")?>"></script>

<div class="row">

    <div class="col-md-12">
        <h1>Gestión de Muestras</h1>
    </div>

    <div class="col-md-1">
        <div class="btn btn-primary" id="agregarCliente">Agregar</div>
    </div>


</div>

<div class="table-responsive">

    <table class="table table-bordered" width="100%" cellspacing="0" id="data">
        <thead style="font-weight: bold;">
        <td>ID</td>
        <td>Estado</td>
        <td>URL</td>
        <td>Comentarios</td>
        <td>Opciones</td>
        </thead>

        <tbody id="table">

        </tbody>

        <tfoot>
        <td>ID</td>
        <th>Estado</th>
        <th>URL</th>
        <th>Comentarios</th>
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
                <form method="post" id="frmSampleId">

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Estado</label>
                            <label>Rol</label>
                            <select name="estado" id="estadoId" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>

                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>URL de Archivo</label>
                            <input type="file" name="muestra" id="muestraId" class="form-control"></input>
                        </div>
                    </div>



                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Comentarios</label>
                            <input type="text" name="coment" id="comentId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Fecha de Expedición</label>
                            <input type="date" name="fecha" id="fechaId" class="form-control"></input>
                        </div>
                    </div>

                    <button type="submit" name="btnSave" id="btnSaveSampleId" class="btn btn-primary">Guardar Muestra</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal editar -->

<div class="modal fade" id="frmEditarMuestra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmSampleIdEdit">

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Estado</label>
                            <input type="hidden" name="txtId" value="0">
                            <input type="text" name="estadoE" id="estadoIdE" class="form-control"></input>
                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>URL de Archivo</label>
                            <input type="file" name="muestraE" id="muestraIdE" class="form-control"></input>
                        </div>
                    </div>



                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Comentarios</label>
                            <input type="text" name="comentE" id="comentIdE" class="form-control"></input>
                        </div>
                    </div>
                    <button type="submit" name="btnEdit" id="btnEditSampleId" class="btn btn-primary">Modificar Muestra</button>
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
                <form method="post" id="formMuestra">


                    <div class="form-column col-md-12">

                        ¿Eliminar este registro?
                    </div>

                    <button type="submit" id="btnDeleteId" name="btnDelete" class="btn btn-danger">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>


<input type="hidden" name="txtIdname" id="txtIdText"></input>