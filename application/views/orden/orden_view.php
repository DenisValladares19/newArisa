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
        <td>Cotización</td>
        <td>Comentarios</td>
        <td>Muestra</td>
        <td>Estado</td>
        <td>Acciones</td>

        </thead>

        <tbody id="table">



        </tbody>

        <tfoot>
        <th>Cotización</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Insertar Orden</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmOrden">

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="idCliente" id="idCliente" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Cotización</label>
                            <select name="idCotiz" id="idCotiz" class="form-control">
                            </select>
                        </div>
                    </div>


                 <div class="form-column col-md-12">
                     <div class="form-group">
                         <label>Muestra</label>
                         <select name="idMuestra" id="idMuestra" class="form-control">
                         </select>
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
                         <label>Estado</label>
                         <select name="estado" id="estadoId" class="form-control">
                             <option disabled="true">Seleccione</option>

                         </select>
                     </div>
                 </div>



         </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelar">Cancelar</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Modificar Orden</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="editFormOrden">

                    <input type="hidden" name="txtId" value="0">
                    <input type="hidden" name="txtIdEst" id="txtIdEstI">

                    <input type="hidden" name="idC" value="0">
                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Cotización</label>
                            <input name="idCotizE" id="idCotizE" class="form-control" disabled="true">
                        </div>
                    </div>

                    <input type="hidden" name="idM" value="0">
                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Muestra</label>
                            <input name="idMuestraE" id="idMuestraE" class="form-control" disabled="true">
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
                            <label>Estado</label>
                            <select name="estadoE" id="estadoIdE" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>


                </form>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelar">Cancelar</button>
            <button type="submit" id="btnEditOrdenId" name="btnEdit" class="btn btn-primary">Editar Orden</button>
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


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="prodUtilizados">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Utilizado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <center>
                        <a class="btn btn-outline-success add1"><i class="fa fa-plus-circle"></i> Agregar</a>
                    </center>

                    <!-- Content here-->
                    <div class="container-fluid">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="tablaUtilizados">
                            <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                            <th>Nombres del Producto</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                            </thead>
                            <tfoot>
                            <th>Nombres del Producto</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="next">Siguiente</button>
            </div>
        </div>
    </div>
</div>



<!-- Productos Utilizados -->
<div class="modal fade" id="prodUt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Utilizados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmUtilizados" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <select id="selectProd"  name="selectProd" class="form-control"></select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Cantidad..." name="cantidad" id="cantidad">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelarAddEx">Cancelar</button>
                <button type="button" class="btn btn-primary" id="addUtilizados">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Editar Productos Utilizados -->
<div class="modal fade" id="EditarUtilizados" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Utilizados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmUtilizadosEdit" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="hidden" name="txtIdExit" id="txtIdExit" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <select id="selectProdE"  name="selectProdE" class="form-control"></select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Cantidad..." name="cantidadE" id="cantidadE">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelarEditEx">Cancelar</button>
                <button type="button" class="btn btn-primary" id="editarUtilizados">Editar</button>
            </div>
        </div>
    </div>
</div>









<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="prodDesp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Desperdiciado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <center>
                        <a class="btn btn-outline-success add2"><i class="fa fa-plus-circle"></i> Agregar</a>
                    </center>

                    <!-- Content here-->
                    <div class="container-fluid">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="tablaDesp">
                            <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                            <th>Nombres del Producto</th>
                            <th>Cantidad</th>
                            <th>Explicacion</th>
                            <th>Acciones</th>
                            </thead>
                            <tfoot>
                            <th>Nombres del Producto</th>
                            <th>Cantidad</th>
                            <th>Explicacion</th>
                            <th>Acciones</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
    <div class="modal-footer">
    <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelarAddEx">Cancelar</button>
                <button type="button" class="btn btn-primary" id="endDesp">Guardar</button>
    
    </div>
        </div>
    </div>
</div>



<!-- Productos Desperdiciado -->
<div class="modal fade" id="insertarDesp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Utilizados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmDesp" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <select id="selectProdD"  name="selectProdD" class="form-control"></select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Cantidad..." name="cantidadD" id="cantidadD">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="¿Porque?..." name="comentarioD" id="comentarioD">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelarAddEx">Cancelar</button>
                <button type="button" class="btn btn-primary" id="addDesp">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Editar Productos Desperdiciado -->
<div class="modal fade" id="EditarDesp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Utilizados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmDespEdit" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="hidden" name="txtIdExit" id="txtIdExitD" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <select id="selectProdDE"  name="selectProdDE" class="form-control"></select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Cantidad..." name="cantidadDE" id="cantidadDE">
                        </div>
                    </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="¿Porque?..." name="comentarioDE" id="comentarioDE">
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelarEditEx">Cancelar</button>
                <button type="button" class="btn btn-primary" id="editarDesp">Editar</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalHistorial">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Historial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive-lg" width="100%" cellspacing="0" id="tablaHistorial">
                    <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                    <th>Descripción</th>
                    </thead>
                    <tfoot>
                    <th>Descripción</th>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
