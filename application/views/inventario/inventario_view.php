<head>
    <script src="<?php echo base_url("resources/src/js/inventario/inventario.js")?>"></script>
</head>
<body>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Inventario
    </h3>

</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a id="addInv"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Inventario</a>
        </li>
        <li>
            <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Inventario</a>
        </li>
        <li>
            <a id="rest"><i class="fas fa-shopping-cart"></i>&nbsp; Lista de Compras</a>
        </li>
    </ul>
</div>


<!-- Content here-->
<div class="container-fluid">
    <table class="table table-bordered" width="100%" cellspacing="0" id="tablaProd">
        <thead style="background-color: rgba(11, 23, 41 , 0.6);">
        <th>Nombres del Producto</th>
        <th>Precio Venta</th>
        <th>Stock</th>
        <th>Descrpcion</th>
        <th>Acciones</th>
        </thead>
        <tfoot>
        <th>Nombres del Producto</th>
        <th>Precio Venta</th>
        <th>Stock</th>
        <th>Descrpcion</th>
        <th>Acciones</th>
        </tfoot>
    </table>
</div>

</div>


<!-- modal Insertar -->

<!-- Modal -->
<div class="modal fade" id="agregarInventario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingresar Inventario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
            </div>
            <div class="modal-body">
                    <div class="row" id="paso1">
                            <div class="col-md-12">
                                <form id="frmCompra" method="post">
                                <br>
                                <h3 style="text-align: center;font-family: serif;"> Informacion de la Compra</h3>
                                <br>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <input type="text" name="fecha" id="fecha" placeholder="Fecha..." class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <select id="selectProv" class="form-control" name="selectProv">
                                            <option>Seleccione el Proveedor...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="subtotal" class="form-control" placeholder="Subtotal..." id="subTotal" required="true">
                                    </div>
                                </div>
                                </form>
                            </div>
                    </div>

                    <div class="row" id="paso2">
                        <div class="col-md-12">
                            <form id="frmExistentes">
                            <br>
                            <h3 style="text-align: center;font-family: serif;"> Informacion del Producto</h3>
                            <center><h6> Productos Existentes</h6></center>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                <center>
                                    <a class="btn btn-outline-success add1"><i class="fa fa-plus-circle"></i> Agregar</a>
                                </center>


                                    <!-- Content here-->
                                    <div class="container-fluid">
                                        <table class="table table-bordered" width="100%" cellspacing="0" id="tablaEx">
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
                            </form>
                        </div>
                    </div>

                    <div class="row" id="paso3">
                        <div class="col-md-12">
                            <form id="frmExistentes">
                                <br>
                                <h3 style="text-align: center;font-family: serif;"> Informacion del Producto</h3>
                                <center><h6> Productos Nuevos</h6></center>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                            <a class="btn btn-outline-success add2"><i class="fa fa-plus-circle"></i> Agregar</a>
                                        </center>

                                        <!-- Content here-->
                                        <div class="container-fluid">
                                            <table class="table table-bordered" width="100%" cellspacing="0" id="tablaNew">
                                                <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                                                <th>Nombres del Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                                </thead>
                                                <tfoot>
                                                <th>Nombres del Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelar">Cancelar</button>
                <button type="submit" class="btn btn-success" id="next1">Siguiente</button>
                <button type="submit" class="btn btn-success" id="next2">Siguiente</button>
                <button type="submit" class="btn btn-success" id="end">Finalizar Compra</button>
            </div>
        </div>
    </div>
</div>



<!-- Productos Existentes -->
<div class="modal fade" id="addEx" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Existente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEx" method="post">
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
                <button type="button" class="btn btn-primary" id="addExistentes">Guardar</button>
            </div>
        </div>
    </div>
</div>



<!-- Editar Productos Existentes -->
<div class="modal fade" id="EditarEx" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Existente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmExEdit" method="post">
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
                <button type="button" class="btn btn-primary" id="editarExistentes">Editar</button>
            </div>
        </div>
    </div>
</div>


<!-- Productos Nuevos -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Nuevo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmNew" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nombre..." name="nombreNuevo" id="nombreNuevo">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Precio..." name="precioNuevo" id="precioNuevo">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Cantidad..." name="cantNuevo" id="cantNuevo">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Descripcion..." name="descNuevo" id="descNuevo">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelarAddNew">Cancelar</button>
                <button type="button" class="btn btn-primary" id="addNuevos">Guardar</button>
            </div>
        </div>
    </div>
</div>



<!-- Editar Productos Nuevos -->
<div class="modal fade" id="editarNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Nuevo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmNewEdit" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="hidden" name="txtIdNew" id="txtIdNew" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nombre..." name="nombreNuevoE" id="nombreNuevoE">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Precio..." name="precioNuevoE" id="precioNuevoE">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Cantidad..." name="cantNuevoE" id="cantNuevoE">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Descripcion..." name="descNuevoE" id="descNuevoE">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelarAddNew">Cancelar</button>
                <button type="button" class="btn btn-primary" id="editNuevos">Guardar</button>
            </div>
        </div>
    </div>
</div>































<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="frmCompras">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Compras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive-lg" width="100%" cellspacing="0" id="tablaCompras">
                    <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                    <th>Producto</th>
                    <th>Fecha</th>
                    <th>Subtotal</th>
                    <th>Proveedor</th>
                    </thead>
                    <tfoot>
                    <th>Producto</th>
                    <th>Fecha</th>
                    <th>Subtotal</th>
                    <th>Proveedor</th>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
</section>
</body>
</html>
