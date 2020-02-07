<script src="<?php echo base_url("resources/src/js/proveedor/proveedor.js")?>"></script>
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
                                <input type="text" name="txtNombre" placeholder="Nombre..." class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre de la Empresa</label>
                                <input type="tel" name="txtEmpresa" class="form-control" placeholder="Empresa..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" name="txtCorreo" placeholder="E-mail" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="textar" name="txtDireccion" placeholder="Direccion..." class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="tel" name="txtTelefono" class="form-control" placeholder="Telefono..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="tel" name="txtCelular" class="form-control" placeholder="Celular..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIT</label>
                                <input type="tel" name="txtNit" class="form-control" placeholder="NIT..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>N° Registro Fiscal</label>
                                <input type="tel" name="txtRegistro" class="form-control" placeholder="Registro Fiscal..." required>
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
                                <input type="text" name="txtNombreE" id="txtNombreE" placeholder="Nombre..." class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre de la Empresa</label>
                                <input type="tel" name="txtEmpresaE" id="txtEmpresaE" class="form-control" placeholder="Empresa..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" name="txtCorreoE"  id="txtCorreoE" placeholder="E-mail" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="textar" name="txtDireccionE"  id="txtDireccionE" placeholder="Direccion..." class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="tel" name="txtTelefonoE"  id="txtTelefonoE" class="form-control" placeholder="Telefono..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="tel" name="txtCelularE"  id="txtCelularE" class="form-control" placeholder="Celular..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIT</label>
                                <input type="tel" name="txtNitE" id="txtNitE" class="form-control" placeholder="NIT..." aria-required="true"  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>N° Registro Fiscal</label>
                                <input type="tel" name="txtRegistroE" id="txtRegistroE" class="form-control" placeholder="Registro Fiscal..." required>
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
