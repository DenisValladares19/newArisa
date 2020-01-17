<script src="<?php echo base_url("resources/src/js/cliente/cliente.js")?>"></script>

  <?php $rol = $this->session->userdata('rol');
                        if($rol=='Vendedor'){

                            ?>

<link rel="stylesheet type="text/css" href="<?php echo base_url("resources/src/css/dashboard_hide1.css")?>">


<?php

                        }


?>

    <div class="col-md-12">
        <h1>Gestión de Clientes</h1>
    </div>

    <div class="col-md-1">
        <div class="btn btn-primary" id="agregarCliente">Agregar</div>
    </div>


</div>

<div class="table-responsive">

    <table class="table table-bordered" width="100%" cellspacing="0" id="data">
        <thead style="font-weight: bold;">
            <td>ID</td>
            <td>Nombre</td>
            <td>Empresa</td>
            <td>Telefono</td>
            <td>Celular</td>
            <td>Correo</td>
            <td>Dirección</td>
            <td>NIT</td>
            <td>Registro Fiscal</td>
            <td>Opciones</td>
        </thead>

        <tbody id="table">



        </tbody>

        <tfoot>
        <th>ID</th>
        <th>Nombre</th>
        <th>Empresa</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Correo</th>
        <th>Dirección</th>
        <th>NIT</th>
        <th>Registro Fiscal</th>
        <th>Opciones</th>
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
                <form method="post" id="frmCliente">

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Nombre de Cliente</label>
                            <input type="text" name="nombre" id="nombreId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Empresa perteneciente</label>
                            <input type="text" name="empresa" id="empresaId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Teléfono Oficina</label>
                            <input type="text" name="telefono" id="telefonoId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Teléfono Celular</label>
                            <input type="text" name="telefonoC" id="telefonoCId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" name="email" id="emailId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="direccion" id="direccionId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>NIT</label>
                            <input type="text" name="nit" id="nitId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Registro Fiscal</label>
                            <input type="text" name="registroF" id="registroFId" class="form-control"></input>
                        </div>
                    </div>
                    <button type="submit" name="btnSave" id="btnSaveId" class="btn btn-primary">Guardar Cliente</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal editar -->
<div class="modal fade" id="frmEditarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmEditar">

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Nombre de Cliente</label>
                            <input type="hidden" name="idCliente">
                            <input type="text" name="nombreE" id="nombreIdE" class="form-control"></input>

                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Empresa perteneciente</label>
                            <input type="text" name="empresaE" id="empresaIdE" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Teléfono Oficina</label>
                            <input type="text" name="telefonoE" id="telefonoIdE" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Teléfono Celular</label>
                            <input type="text" name="telefonoCE" id="telefonoCEId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" name="emailE" id="emailIdE" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="direccionE" id="direccionIdE" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>NIT</label>
                            <input type="text" name="nitE" id="nitIdE" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Registro Fiscal</label>
                            <input type="text" name="registroFE" id="registroFIdE" class="form-control"></input>
                        </div>
                    </div>
                    <button type="submit" name="btnEditar" id="btnEditId" class="btn btn-primary">Guardar Cambios</button>
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
                <form method="post" id="formCliente">


                    <div class="form-column col-md-12">

                        ¿Eliminar este registro?
                    </div>

                    <button type="submit" id="btnDeleteId" name="btnDelete" class="btn btn-danger">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>





