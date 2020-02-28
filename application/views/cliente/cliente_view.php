<script src="<?php echo base_url("resources/src/js/cliente/cliente.js")?>"></script>

  <?php $rol = $this->session->userdata('rol');
                        if($rol=='Vendedor'){

                            ?>

<link rel="stylesheet type="text/css" href="<?php echo base_url("resources/src/css/dashboard_hide1.css")?>">


<?php

                        }


?>


<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Clientes
    </h3>

</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a id="agregarCliente"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Cliente</a>
        </li>
        <li>
            <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Clientes</a>
        </li>
    </ul>
</div>


<div class="table-responsive">

    <table class="table table-bordered" width="100%" cellspacing="0" id="dataCliente">
        <thead style="background-color: rgba(11, 23, 41 , 0.6); color: #f0f0f0">
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Empresa</td>
            <td>Telefono</td>
            <td>Celular</td>
            <td>Correo</td>
            <td>Dirección</td>
            <td>NIT</td>
            <td>N° Registro Fiscal</td>
            <td>Opciones</td>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Empresa</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Correo</th>
        <th>Dirección</th>
        <th>NIT</th>
        <th>N° Registro Fiscal</th>
        <th>Opciones</th>
        </tfoot>

    </table>

</div>



<!-- Modal -->
<div class="modal fade" id="frmInsertarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insertar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmCliente">

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre del Cliente</label>
                                <input type="text" name="nombre" id="nombreId" class="form-control" placeholder="Nombre..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellido del Cliente</label>
                                <input type="tel" name="apellido" id="apellidoId" class="form-control" placeholder="Apellido..." required>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Empresa</label>
                                <input type="text" name="empresa" id="empresaId" class="form-control" placeholder="Empresa..." required>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" name="telefono" id="telefonoId" class="form-control" placeholder="Telefono..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" name="telefonoC" id="telefonoCId" class="form-control" placeholder="Celular..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" name="email" id="emailId" class="form-control" placeholder="E-Mail..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="direccion" id="direccionId" class="form-control" placeholder="Dirección..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIT</label>
                                <input type="text" name="nit" id="nitId" class="form-control" placeholder="NIT..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Registro Fiscal</label>
                                <input type="text" name="registroF" id="registroFId" class="form-control" placeholder="Registro Fiscal..." required>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="btnSave" id="btnSaveId" class="btn btn-primary">Guardar Cliente</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar -->
<div class="modal fade" id="frmEditarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmEditar">

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre de Cliente</label>
                                <input type="hidden" name="idCliente">
                                <input type="text" name="nombreE" id="nombreIdE" class="form-control" placeholder="Nombre..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellido del Cliente</label>
                                <input type="tel" name="apellidoE" id="apellidoIdE" class="form-control" placeholder="Apellido..." required>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Empresa</label>
                                <input type="text" name="empresaE" id="empresaIdE" class="form-control" placeholder="Empresa..." required>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" name="telefonoE" id="telefonoIdE" class="form-control" placeholder="Telefono..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" name="telefonoCE" id="telefonoCIdE" class="form-control" placeholder="Celular..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" name="emailE" id="emailIdE" class="form-control" placeholder="E-Mail..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="direccionE" id="direccionIdE" class="form-control" placeholder="Dirección..." required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIT</label>
                                <input type="text" name="nitE" id="nitIdE" class="form-control" placeholder="NIT..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Registro Fiscal</label>
                                <input type="text" name="registroFE" id="registroFIdE" class="form-control" placeholder="Registro Fiscal..." required>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="btnEditar" id="btnEditId" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalRecu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Recuperación Info. Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive-lg width="100%" cellspacing="0" id="dataClienteRest">
                <thead style="background-color: rgba(11, 23, 41 , 0.6);">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Empresa</th>
                <th>Direccion</th>
                <th>E-Mail</th>
                <th>N° Registro Fiscal</th>
                <th>Acciones</th>
                </thead>
                <tfoot>
                <th>Nombre</th>
                <th>Apellido</th>
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
    <button class="btn btn-outline-secondary" id="rest">Restaurar Info. Cliente</button>
</div>
<div class="md-overlay"></div><!-- the overlay element -->








