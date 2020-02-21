<script src="<?php echo base_url("resources/src/js/orden/orden.js")?>"></script>

<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Orden de Trabajo
    </h3>

</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a id="agregarOrden"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Orden de Trabajo</a>
        </li>
        <li>
            <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Ordenes de Trabajo</a>
        </li>
    </ul>
</div>

<div class="table-responsive">

    <table class="table table-bordered" width="100%" cellspacing="0" id="data">
        <thead style="background-color: rgba(11, 23, 41 , 0.6); color: #f0f0f0">
        <td>Núm. Orden</td>
        <td>Núm. Cotización</td>
        <td>Comentarios</td>
        <td>Muestra</td>
        <td>Estado</td>
        <td>Acciones</td>

        </thead>

        <tbody id="table">



        </tbody>

        <tfoot>
        <th>Núm. Orden</th>
        <th>Núm. Cotización</th>
        <th>Comentarios</th>
        <th>Muestra</th>
        <th>Estado</th>
        <th>Acciones</th>

        </tfoot>



    </table>

</div>



<!-- Modal -->
<div class="modal fade" id="frmInsertarOrden" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button name="cotShow" id="cotShowId" class="form-control">
                                Agregar Cotización

                            </button>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Cotización</label>
                            <select name="cot" id="cotId" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>

                    <!--

                 <div class="form-column col-md-12">



                     <div class="form-group">
                         <label>Nombre de orden</label>
                         <input type="text" name="orden" id="ordenId" class="form-control"></input>
                     </div>
                 </div>

                 -->

                 <div class="form-column col-md-12">



                     <div class="form-group">
                         <label>Descripción de orden</label>
                         <input type="text" name="desc" id="descId" class="form-control"></input>
                     </div>
                 </div>


                    <!--

                 <div class="form-column col-md-12">



                     <div class="form-group">
                         <label>Tamaño</label>
                         <input type="text" name="tamaño" id="tamañoId" class="form-control"></input>
                     </div>
                 </div>

                 -->

                    <!--

                 <div class="form-column col-md-12">



                     <div class="form-group">
                         <label>Archivo</label>
                         <input type="file" name="archivo" id="archivoId" class="form-control"></input>
                     </div>
                 </div>

                    -->

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

                    <input type="hidden" name="txtId" value="0">
                    <input type="hidden" name="txtIdEst" id="txtIdEstI">

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Cotización</label>
                            <button name="cotShow" id="cotShowId" class="form-control">
                                Agregar Cotización

                            </button>
                        </div>
                    </div>

                    <div class="form-column col-md-12">





                        <div class="form-group">
                            <label>Cotización</label>
                            <select name="cotE" id="cotIdE" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>

                    <!--
                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Nombre de orden</label>
                            <input type="text" name="ordenE" id="ordenIdE" class="form-control"></input>
                        </div>
                    </div>

                    -->

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Descripción de orden</label>
                            <input type="text" name="descE" id="descIdE" class="form-control"></input>
                        </div>
                    </div>

                    <!--

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Tamaño</label>
                            <input type="text" name="tamañoE" id="tamañoIdE" class="form-control"></input>
                        </div>
                    </div>

                    -->

                        <!--

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="archivoE" id="archivoIdE" class="form-control"></input>
                        </div>
                    </div>

                    -->


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




<input type="hidden" name="txtIdname" id="txtIdText">


<!--Parte de cotización-->

<div class="modal fade" id="modalCot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                    <div class="table-responsive">

                        <table class="table table-bordered" width="100%" cellspacing="0" id="data1">
                            <thead style="font-weight: bold;">

                            <td>Núm. Cotización</td>
                            <td>Cliente</td>
                            <td>Apellido</td>
                            <td>Opciones</td>

                            </thead>

                            <tbody id="table1">



                            </tbody>

                            <tfoot>
                            <th>Núm. Cotización</th>
                            <th>Cliente</th>
                            <th>Apellido</th>
                            <th>Opciones</th>

                            </tfoot>



                        </table>

                    </div>


            </div>

        </div>
    </div>
</div>



