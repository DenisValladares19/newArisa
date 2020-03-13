<script src="<?php echo base_url("resources/src/js/proveedor/proveedor.js")?>"></script>
<script src="<?php echo base_url("resources/js/jquery.mask.js")?>"></script>

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
        margin-left: 130px;
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
        margin-left: 320px;
        padding: 6px;
        position: absolute;
    }

</style>
<body>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Proveedores
    </h3>

</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a id="agregarProveedor"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Proveedor</a>
        </li>
        <li>
            <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Proveedores</a>
        </li>
    </ul>
</div>

<!-- Content here-->
<div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0" id="dataProveedor">
        <thead style="background-color: rgba(11, 23, 41 , 0.6);">
        <th>Nombre</th>
        <th>Empresa</th>
        <th>Direccion</th>
        <th>E-Mail</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>NIT</th>
        <th>N° Registro Fiscal</th>
        <th>Acciones</th>
        </thead>
        <tfoot>
        <th>Nombre</th>
        <th>Empresa</th>
        <th>Direccion</th>
        <th>E-Mail</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>NIT</th>
        <th>N° Registro Fiscal</th>
        <th>Acciones</th>
        </tfoot>
        <tbody>
        </tbody>
    </table>
</div>


<!-- modal Insertar -->

<!-- Modal -->
<div class="modal fade" id="frmAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmAgregarDatos" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre del Proveedor</label>
                                <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre..." class="form-control soloLetra" autocomplete='off' required>
                                <div id="msjNombre" class="errores1"> Nombre... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre de la Empresa</label>
                                <input type="tel" name="txtEmpresa" id="txtEmpresa" class="form-control soloLetra" placeholder="Empresa..." autocomplete='off' required>
                                <div id="msjEmpresa" class="errores1"> Empresa... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" name="txtCorreo" id="txtCorreo" placeholder="E-mail" class="form-control" autocomplete='off'>
                                <div id="msjEmail" class="errores2"> E-Mail... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="textar" name="txtDireccion" id="txtDireccion" placeholder="Direccion..." class="form-control" autocomplete='off'>
                                <div id="msjDireccion" class="errores2"> Dirección... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control" placeholder="Telefono..." autocomplete='off' required>
                                <div id="msjTelefono" class="errores1"> Telefono... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="tel" name="txtCelular" id="txtCelular" class="form-control" placeholder="Celular..." autocomplete='off' required>
                                <div id="msjCelular" class="errores1"> Celular... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIT</label>
                                <input type="tel" name="txtNit" id="txtNit" class="form-control" placeholder="NIT..." autocomplete='off' required>
                                <div id="msjNit" class="errores1"> NIT... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>N° Registro Fiscal</label>
                                <input type="tel"  name="txtRegistro" id="txtRegistro" class="form-control" placeholder="Registro Fiscal..." autocomplete='off' required>
                                <div id="msjFiscal" class="errores1"> Registro Fiscal... </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success btnGuardar" id="btnGuardar">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- modal Modificar -->

<!-- Modal -->
<div class="modal fade" id="frmModicicar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEdit" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="hidden" name="txtIdProveedor" id="idProveedor" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre del Proveedor</label>
                                <input type="text" name="txtNombreE" id="txtNombreE" placeholder="Nombre..." class="form-control soloLetra" autocomplete='off' required>
                                <div id="msjNombreE" class="errores1"> Nombre... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre de la Empresa</label>
                                <input type="tel" name="txtEmpresaE" id="txtEmpresaE" class="form-control soloLetra" placeholder="Empresa..." autocomplete='off' required>
                                <div id="msjEmpresaE" class="errores1"> Empresa... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" name="txtCorreoE"  id="txtCorreoE" placeholder="E-mail" class="form-control" autocomplete='off'>
                                <div id="msjEmailE" class="errores2"> E-Mail... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="textar" name="txtDireccionE"  id="txtDireccionE" placeholder="Direccion..." class="form-control" autocomplete='off'>
                                <div id="msjDireccionE" class="errores2"> Dirección... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="tel" name="txtTelefonoE"  id="txtTelefonoE" class="form-control" placeholder="Telefono..." autocomplete='off' required>
                                <div id="msjTelefonoE" class="errores1"> Telefono... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="tel" name="txtCelularE"  id="txtCelularE" class="form-control" placeholder="Celular..." autocomplete='off' required>
                                <div id="msjCelularE" class="errores1"> Celular... </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIT</label>
                                <input type="tel" name="txtNitE" id="txtNitE" class="form-control" placeholder="NIT..." aria-required="true"  autocomplete='off' required>
                                <div id="msjNitE" class="errores1"> NIT... </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>N° Registro Fiscal</label>
                                <input type="tel" name="txtRegistroE" id="txtRegistroE" class="form-control" placeholder="Registro Fiscal..." autocomplete='off' required>
                                <div id="msjFiscalE" class="errores1"> Registro Fiscal... </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" id="btnGuardarEdit">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalRecu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Recuperación Info. Proveedores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive-lg width="100%" cellspacing="0" id="dataProveedorRest">
                <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Direccion</th>
                <th>E-Mail</th>
                <th>N° Registro Fiscal</th>
                <th>Acciones</th>
                </thead>
                <tfoot>
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Direccion</th>
                <th>E-Mail</th>
                <th>N° Registro Fiscal</th>
                <th>Acciones</th>
                </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="column">
    <button class="btn btn-outline-secondary" id="rest">Restaurar Info. Proveedor</button>
</div>
<div class="md-overlay"></div><!-- the overlay element -->

</section>
</body>
