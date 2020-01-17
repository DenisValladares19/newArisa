<script src="<?php echo base_url("resources/src/js/orden/orden.js")?>"></script>

<div class="row">

    <div class="col-md-12">
        <h1>Gestión de órdenes de trabajo</h1>
    </div>

    <div class="col-md-1">
        <div class="btn btn-primary" id="agregarOrden">Agregar</div>
    </div>


</div>

<div class="table-responsive">

    <table class="table table-bordered" width="100%" cellspacing="0" id="data">
        <thead style="font-weight: bold;">
        <td>Núm. Orden</td>
        <td>Núm. Cotización</td>
        <td>Nombre</td>
        <td>Comentarios</td>
        <td>Tamaño</td>
        <td>Archivo</td>
        <td>Muestra</td>
        <td>Estado</td>
        <td>Acciones</td>

        </thead>

        <tbody id="table">



        </tbody>

        <tfoot>
        <th>Núm. Orden</th>
        <th>Nombre</th>
        <th>Nombre</th>
        <th>Comentarios</th>
        <th>Tamaño</th>
        <th>Archivo</th>
        <th>Muestra</th>
        <th>Estado</th>
        <th>Acciones</th>

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
                <form method="post" id="frmOrden">

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Cotización</label>
                            <select name="cot" id="cotId" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Nombre de orden</label>
                            <input type="text" name="orden" id="ordenId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Descripción de orden</label>
                            <input type="text" name="desc" id="descId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Tamaño</label>
                            <input type="text" name="tamaño" id="tamañoId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="archivo" id="archivoId" class="form-control"></input>
                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Muestra</label>
                            <select name="muestra" id="muestraId" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Estado</label>
                            <select name="estado" id="estadoId" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>


                    <button type="submit" id="btnSaveOrdenId" name="btnSave" class="btn btn-primary">Guardar Orden</button>
                </form>
            </div>

        </div>
    </div>
</div>


<!--Modal Edit-->

<div class="modal fade" id="frmEditarOrden" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="editFormOrden">

                    <div class="form-column col-md-12">


                        <input type="text" name="txtId" value="0">
                        <div class="form-group">
                            <label>Cotización</label>
                            <select name="cotE" id="cotIdE" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Nombre de orden</label>
                            <input type="text" name="ordenE" id="ordenIdE" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Descripción de orden</label>
                            <input type="text" name="descE" id="descIdE" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Tamaño</label>
                            <input type="text" name="tamañoE" id="tamañoIdE" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="archivoE" id="archivoIdE" class="form-control"></input>
                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Muestra</label>
                            <select name="muestraE" id="muestraIdE" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Estado</label>
                            <select name="estadoE" id="estadoIdE" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>

                    <button type="submit" id="btnEditOrdenId" name="btnEdit" class="btn btn-primary">Editar Orden</button>
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




<input type="hidden" name="txtIdname" id="txtIdText"></input>


