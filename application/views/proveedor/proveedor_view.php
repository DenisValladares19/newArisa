
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
            <th>DUI</th>
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
            <th>DUI</th>
            <th>N° Registro Fiscal</th>
            <th>Acciones</th>
        </tfoot>
        <tbody>
        <?php
        foreach ($proveedor as $row){
            echo "
                    <tr>
                    <td>$row->nombreInv</td>
                    <td>$row->empresa</td>
                    <td>$row->direccion</td>
                    <td>$row->correo</td>
                    <td>$row->telefono</td>
                    <td>$row->celular</td>
                    <td>$row->nit</td>
                    <td>$row->dui</td>
                    <td>$row->registroFiscal</td>
                    <td> <a class=\"btn btn-outline-info btnEditar\" id='$row->idProveedor'><i class=\"fas fa-marker\"></i></a>
                     <a class=\"btn btn-outline-danger btnEliminar\" id='$row->idProveedor' ><i class=\"far fa-trash-alt\"></i></a>
                    </td>
                ";
        }
        ?>
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
                <form action="Proveedor/insertar" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="text" name="txtNombre" placeholder="Nombre..." class="form-control" required="true">
                        </div>
                        <div class="col-md-6">
                            <input type="tel" name="txtEmpresa" class="form-control" placeholder="Empresa..." required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <input type="email" name="txtCorreo" placeholder="E-mail" class="form-control" required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <input type="textar" name="txtDireccion" placeholder="Direccion..." class="form-control" required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="tel" name="txtTelefono" class="form-control" placeholder="Telefono..." required="true">
                        </div>
                        <div class="col-md-6">
                            <input type="tel" name="txtCelular" class="form-control" placeholder="Celular..." required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="tel" name="txtNit" class="form-control" placeholder="NIT..." required="true">
                        </div>
                        <div class="col-md-6">
                            <input type="tel" name="txtDui" class="form-control" placeholder="DUI..." required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="tel" name="txtRegistro" class="form-control" placeholder="Registro Fiscal..." required="true">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
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
                <form action="Proveedor/modificar" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                        <input type="hidden" name="txtIdProveedor" id="idProveedor">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="text" name="txtNombre" id="txtNombreE" placeholder="Nombre..." class="form-control" required="true">
                        </div>
                        <div class="col-md-6">
                            <input type="tel" name="txtEmpresa" id="txtEmpresaE" class="form-control" placeholder="Empresa..." required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <input type="email" name="txtCorreo" id="txtCorreoE" placeholder="E-mail" class="form-control" required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <input type="textar" name="txtDireccion" id="txtDireccionE" placeholder="Direccion..." class="form-control" required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="tel" name="txtTelefono" id="txtTelefonoE" class="form-control" placeholder="Telefono..." required="true">
                        </div>
                        <div class="col-md-6">
                            <input type="tel" name="txtCelular" id="txtCelularE" class="form-control" placeholder="Celular..." required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="tel" name="txtNit" id="txtNitE" class="form-control" placeholder="NIT..." required="true">
                        </div>
                        <div class="col-md-6">
                            <input type="tel" name="txtDui" id="txtDuiE" class="form-control" placeholder="DUI..." required="true">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="tel"  name="txtRegistro" id="txtRegistroE" class="form-control" placeholder="Registro Fiscal..." required="true">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

</section>
</body>