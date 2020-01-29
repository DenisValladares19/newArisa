<script src="<?php echo base_url("resources/src/js/usuario/usuario.js")?>"></script>

<script>

    function validarFile(all)
    {

        var extensiones_permitidas = [".png", ".jpg", ".jpeg"];
        var tamano = 8;
        var rutayarchivo = all.value;
        var ultimo_punto = all.value.lastIndexOf(".");
        var extension = rutayarchivo.slice(ultimo_punto, rutayarchivo.length);
        if(extensiones_permitidas.indexOf(extension) == -1)
        {
            alert("Extensión de archivo no válida");
            document.getElementById(all.id).value = "";
            return;
        }
        if((all.files[0].size / 1048576) > tamano)
        {
            alert("El archivo no puede superar los "+tamano+"MB");
            document.getElementById(all.id).value = "";
            return;
        }
    }
</script>

<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Usuarios
    </h3>

</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a id="agregarCliente"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Usuario</a>
        </li>
        <li>
            <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Usuarios</a>
        </li>
    </ul>
</div>

<div class="table-responsive">

    <table class="table table-bordered" width="100%" cellspacing="0" id="data">
        <thead style="background-color: rgba(11, 23, 41 , 0.6); color: #f0f0f0">
        <td>Username</td>
        <td>Correo</td>
        <td>Profile Picture</td>
        <td>Opciones</td>
        </thead>

        <tbody id="table">

        </tbody>

        <tfoot>
        <th>Username</th>
        <th>Correo</th>
        <th>Profile Picture</th>
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
                <form method="post" id="frmUserId">

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Nombre de Usuario</label>
                            <input type="text" name="nombre" id="nombres" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="text" name="email" id="emailId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="pass" id="passId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Rol</label>
                            <select name="rol" id="rolId" class="form-control">
                            <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Imagen de Perfil</label>
                            <input type="file" name="imagen" id="imagenId" class="form-control" onchange="validarFile(this)"></input>
                        </div>
                    </div>
                    <button type="submit" name="btnSaveUser" id="btnSaveUserId" class="btn btn-primary">Guardar Usuario</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal editar -->

<div class="modal fade" id="frmEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUserIdEdit">

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Nombre de Usuario</label>
                            <input type="hidden" name="txtId" value="0">
                            <input type="text" name="nombreE" id="nombresId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="text" name="emailE" id="emailEId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="passE" id="passEId" class="form-control"></input>
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Rol</label>
                            <select name="rolE" id="rolEId" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>

                        </div>
                    </div>


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Imagen de Perfil</label>
                            <input type="file" name="imagenE" id="imagenEId" class="form-control" onchange="validarFile(this)"></input>
                        </div>
                    </div>
                    <button type="submit" name="btnEditUser" id="btnEditUserId" class="btn btn-primary">Editar Usuario</button>
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

