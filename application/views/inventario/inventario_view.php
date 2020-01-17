<head xmlns="http://www.w3.org/1999/html">
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
                                <br>
                                <h3 style="text-align: center;font-family: serif;"> Informacion de la Compra</h3>
                                <br>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <input type="date" name="fecha" id="fecha" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <select id="selectProv" class="form-control">
                                            <option>Seleccione el Proveedor...</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="subtotal" class="form-control" placeholder="Subtotal..." id="subTotal" required="true">
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="row" id="paso2">
                        <form id="frm">
                        <div class="col-md-12">
                            <br>
                            <h3 style="text-align: center;font-family: serif;"> Informacion del Producto</h3>
                            <center><h6> Productos Existentes</h6></center>
                            <br>
                            <div class="row px-3">
                                <div class="col-sm-2">  </div>
                                <div class="col-sm-10 list1">
                                    <div class="mb-2 row justify-content-between px-3">
                                        <div class="mob"> <label class="text-grey mr-1">Producto</label> <select class="selectProd" name="selectProd[]"></select> </div>
                                        <div class="mob mb-2"> <label class="text-grey mr-4">Cantidad</label> <input type="number" min="1" name="cantidad[]"> </div>
                                        <div class="mt-1 cancel fa fa-times text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <center>
                                <a class="btn btn-outline-success add1"><i class="fa fa-plus-circle"></i> Agregar</a>
                            </center>
                        </div>
                            <input type="submit" id="btn1">
                        </form>
                        <br><br>
                        <p><b>Results:</b> <span id="results"></span></p>
                    </div>

                    <div class="row" id="paso3">
                        <div class="col-md-12">
                            <br>
                            <h3 style="text-align: center;font-family: serif;"> Informacion del Producto</h3>
                            <center><h6> Productos Nuevos</h6></center>
                            <br>
                            <div class="row px-3">
                                <div class="col-sm-2">  </div>
                                <div class="col-sm-10 list2">
                                    <div class="mb-2 row justify-content-between px-3">
                                        <div class="mob"> <label class="text-grey mr-2">Nombre</label><input type="text"></div>
                                        <div class="mob mb-2"> <label class="text-grey mr-2">Cantidad</label> <input type="number" min="1"> </div>
                                        <div class="mt-1 cancel fa fa-times text-danger"></div>
                                        <div class="mob"> <label class="text-grey mr-2">Precio</label> <input type="text"> </div>
                                        <div class="mb-0"> <label class="text-grey mr-2">Descripcion</label> <input type="text"> </div>
                                        <div class="mt-1"></div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <center>
                                <a class="btn btn-outline-success add2"><i class="fa fa-plus-circle"></i> Agregar</a>
                            </center>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelar">Cancelar</button>
                <button type="submit" class="btn btn-danger" id="back">Atras</button>
                <button type="submit" class="btn btn-success" id="next">Siguiente</button>
                <button type="submit" class="btn btn-success" id="end">Finalizar Compra</button>
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
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Proveedor</th>
                    </thead>
                    <tfoot>
                    <th>Producto</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
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


<!--
<div class="col-md-6">
    <div class="col-sm">
        <button style="color: #0c0c0c;font-family: times, serif; font-size:14pt; font-style:italic" class="btn btn-light" id="btn1">
            <img src="<?php echo base_url("resources/images/inventario/lista.png")?>" width="30%" height="30%">
            <br>
            <span style="font-size:12pt;">Producto Existente</span>
            <br>
            <br>
        </button>
    </div>
</div>
<div class="col-md-6">
    <div class="col-sm">
        <button style="color: #0c0c0c;font-family: times, serif; font-size:14pt; font-style:italic" class="btn btn-light" id="btn2">
            <img src="<?php echo base_url("resources/images/inventario/carrito.png")?>" width="30%" height="30%">
            <br>
            <span style="font-size:12pt;">Nuevo Producto</span>
            <br>
            <br>
        </button>
    </div>
</div>
-->