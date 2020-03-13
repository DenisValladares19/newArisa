<head>
    <script src="<?php echo base_url("resources/src/js/inventario/inventario.js")?>"></script>
    <script src="<?php echo base_url("resources/js/jquery.numeric.js")?>"></script>

</head>

<style>
    .errores1{
        -webkit-boxshadow: 0 0 10px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        background: red;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        color: #fff;
        display: none;
        font-size: 10px;
        margin-top: -40px;
        margin-left: 700px;
        padding: 6px;
        position: absolute;
    }

    .errores2{
        -webkit-boxshadow: 0 0 10px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        background: red;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        color: #fff;
        display: none;
        font-size: 10px;
        margin-top: -40px;
        margin-left: 290px;
        padding: 6px;
        position: absolute;
    }

    .errores3{
        -webkit-boxshadow: 0 0 10px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        background: red;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        color: #fff;
        display: none;
        font-size: 10px;
        margin-top: -40px;
        margin-left: 110px;
        padding: 6px;
        position: absolute;
    }
</style>
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
            <a id="compras"><i class="fas fa-shopping-cart"></i>&nbsp; Lista de Compras</a>
        </li>
    </ul>
</div>


<!-- Content here-->
<div class="container-fluid">
    <table class="table table-bordered" width="100%" cellspacing="0" id="tablaProd">
        <thead style="background-color: rgba(11, 23, 41 , 0.6);">
        <th>Nombres del Producto</th>
        <th>Nombres del Proveedor</th>
        <th>Stock</th>
        <th>Precio Unitario</th>
        <th>Total</th>
        <th>Descrpcion</th>
        <th>Acciones</th>
        </thead>
        <tfoot>
        <th>Nombres del Producto</th>
        <th>Nombres del Proveedor</th>
        <th>Stock</th>
        <th>Precio Unitario</th>
        <th>Total</th>
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
                                        <div class="form-group">
                                            <label>Fecha</label>
                                        <input type="text" name="fecha" id="fecha" placeholder="Fecha..." class="form-control" required="true">
                                            <div id="msjFecha" class="errores1"> Fecha... </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre del Proveedor</label>
                                        <select id="selectProv" class="form-control" name="selectProv">
                                            <option>Seleccione el Proveedor...</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub-Total</label>
                                        <input type="text" name="subtotal" class="form-control positive" placeholder="Subtotal..." id="subTotal" required="true">
                                            <div id="msjSub" class="errores2"> Subtotal... </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                    </div>

                    <div class="row" id="paso2">
                        <div class="col-md-12">
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
                                    <div class="container-fluid" id="tabla2">
                                        <table class="table table-borderede" width="100%" cellspacing="0" id="tablaEx">
                                            <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                                            <th>Nombres del Producto</th>
                                            <th>Cantidad</th>
                                            <th>Nuevo Precio</th>
                                            <th>Acciones</th>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                            <th>Nombres del Producto</th>
                                            <th>Cantidad</th>
                                            <th>Acciones</th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="paso3">
                        <div class="col-md-12">
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
                                        <div class="container-fluid" id="tabla1">
                                            <table class="table table-borderede" width="100%" cellspacing="0" id="tablaNew">
                                                <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                                                <th>Nombres del Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                <th>Nombres del Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
                        <div class="form-group">
                            <label>Nombre del Producto</label>
                        <select id="selectProd"  name="selectProd" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cantidad</label>
                        <input type="number" value="1" min="1" max="50" step="1" class="form-control integer" placeholder="Cantidad..." name="cantidad" id="cantidad">
                            <div id="msjCantd" class="errores3"> Cantidad... </div>
                        </div>
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


<!-- Productos Existentes cambiar precio -->
<div class="modal fade" id="modalCambiarPrecio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">¿Desea cambiar Precio?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="cambiPrecio">
                    <center>
                    <div class="row mt-2">
                        <div class="col-md-12">
                                ¿Cambiar el Precio a este Producto?
                        </div>
                        <br><br>
                        <div class="col-md-6">
                            <input type="submit" name="siCambiar" id="siCambiar" class="btn btn-outline-success" value="Si,quiero Cambiarlo">
                        </div>
                        <div class="col-md-6">
                            <input type="submit" name="noCambiar" id="noCambiar" class="btn btn-outline-danger" value="No">
                        </div>
                    </div>
                    </center>
                </div>

                <div id="siCamb">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Escribe el Nuevo Precio</label>
                            <input type="text" name="precioNew" id="precioNew" placeholder="Nuevo Precio..." class="form-control positive" required="true">
                                <div id="msjCambiarPrecio" class="errores2"> Nuevo Precio... </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSiCambiar">Guardar</button>
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
                            <div class="form-group">
                            <label>Seleccione el Producto</label>
                            <select id="selectProdE"  name="selectProdE" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" value="1" min="1" max="50" step="1" class="form-control integer" placeholder="Cantidad..." name="cantidadE" id="cantidadE">
                                <div id="msjCantdE" class="errores3"> Cantidad... </div>
                            </div>
                        </div>

                        <div id="inputNewPrecio">
                        <div class="col-md-12">
                            <br>
                            <br>
                            <div class="form-group">
                            <label>Nuevo Precio</label>
                            <input type="text" class="form-control positive" placeholder="Nuevo Precio..." name="newPrecioE" id="newPrecioE">
                                <div id="msjCambiarPrecioE" class="errores3"> Cantidad... </div>
                            </div>
                        </div>
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
                            <div class="form-group">
                                <label>Nombre del Producto</label>
                            <input type="text" class="form-control soloLetra" placeholder="Nombre..." name="nombreNuevo" id="nombreNuevo">
                                <div id="msjNombreNuevo" class="errores3"> Nombre... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Precio Unitario</label>
                            <input type="text" class="form-control positive" placeholder="Precio Unitario..." name="precioNuevo" id="precioNuevo">
                                <div id="msjPrecioNuevo" class="errores3"> Precio Unitario... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cantidad</label>
                            <input type="number" value="1" min="1" max="50" step="1" class="form-control integer" placeholder="Cantidad..." name="cantNuevo" id="cantNuevo">
                                <div id="msjCantNuevo" class="errores3"> Cantidad... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descripcion</label>
                            <input type="text" class="form-control" placeholder="Descripcion..." name="descNuevo" id="descNuevo">
                                <div id="msjDescNuevo" class="errores3"> Descripcion... </div>
                            </div>
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
                            <div class="form-group">
                                <label>Nombre del Producto</label>
                            <input type="text" class="form-control soloLetra" placeholder="Nombre..." name="nombreNuevoE" id="nombreNuevoE">
                                <div id="msjNombreNuevoE" class="errores3"> Nombre... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Precio Unitario</label>
                            <input type="text" class="form-control positive" placeholder="Precio Unitario..." name="precioNuevoE" id="precioNuevoE">
                                <div id="msjPrecioNuevoE" class="errores3"> Precio Unitario... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cantidad</label>
                            <input type="number" value="1" min="1" max="50" step="1" class="form-control integer" placeholder="Cantidad..." name="cantNuevoE" id="cantNuevoE">
                                <div id="msjCantNuevoE" class="errores3"> Cantidad... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descripcion</label>
                            <input type="text" class="form-control" placeholder="Descripcion..." name="descNuevoE" id="descNuevoE">
                                <div id="msjDescNuevoE" class="errores3"> Descripcion... </div>
                            </div>
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


<!-- frn Compas -->

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
                    <th>Fecha</th>
                    <th>Subtotal</th>
                    <th>Proveedor</th>
                    <th>Accion</th>
                    </thead>
                    <tfoot>
                    <th>Fecha</th>
                    <th>Subtotal</th>
                    <th>Proveedor</th>
                    <th>Accion</th>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>



<!-- Editar Inventario -->
<div class="modal fade" id="editarInv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto Nuevo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEditInv" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="hidden" name="txtIdInv" id="txtIdInv" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Nombre del Producto</label>
                            <input type="text" class="form-control" placeholder="Nombre..." name="nombreInvE" id="nombreInvE">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Precio Unitario</label>
                            <input type="text" class="form-control" placeholder="Precio Unitario..." name="precioInvE" id="precioInvE">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Cantidad</label>
                            <input type="text" class="form-control" placeholder="Cantidad..." name="cantInvE" id="cantInvE" disabled="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" class="form-control" placeholder="Descripcion..." name="descInvE" id="descInvE">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelarAddInv">Cancelar</button>
                <button type="button" class="btn btn-primary" id="editInv">Guardar</button>
            </div>
        </div>
    </div>
</div>



<!-- Ver Detalle Compra -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="frmDetalleCompra">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detalle de Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div id="compra1">
                   <center><h3>Productos Existentes</h3></center>
                   <table class="table table-bordered table-responsive-lg" width="100%" cellspacing="0" id="tablaDetalle1">
                       <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                       <th>Nombres del Producto</th>
                       <th>Cantidad</th>
                       <th>Nuevo Precio</th>
                       </thead>
                       <tfoot>
                       <th>Nombres del Producto</th>
                       <th>Cantidad</th>
                       <th>Nuevo Precio</th>
                       </tfoot>
                   </table>
                   <br>
               </div>
                <div id="compra2">
                    <center><h3>Productos Nuevos</h3></center>
                    <table class="table table-bordered table-responsive-lg" width="100%" cellspacing="0" id="tablaDetalle2">
                        <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                        <th>Nombres del Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Descripcion</th>
                        </thead>
                        <tfoot>
                        <th>Nombres del Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Descripcion</th>
                        </tfoot>
                    </table>
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelarDetalleCompra">Cancelar</button>
            </div>
        </div>
    </div>
</div>

</section>
</body>
</html>
