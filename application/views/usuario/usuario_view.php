<script src="<?php echo base_url("resources/src/js/usuario/usuario.js")?>"></script>

<script>

    function validarFile(all)
    {

        var extensiones_permitidas = [".png", ".PNG", ".jpg", ".JPG",".jpeg"];
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

<style>
    .errores{
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

    <table class="table table-bordered" width="100%" cellspacing="0" id="dataUsuario">
        <thead style="background-color: rgba(11, 23, 41 , 0.6); color: #f0f0f0">
        <td>Nombre de Usuario</td>
        <td>Tipo de Usuario</td>
        <td>Correo Electronico</td>
        <td>Foto de Perfil</td>
        <td>Opciones</td>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
        <th>Username</th>
        <th>Type of User</th>
        <th>E-Mail</th>
        <th>Profile Picture</th>
        <th>Options</th>
        </tfoot>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="frmInsertarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insertar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUserId">

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Nombre de Usuario &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span id="error" style="color: red;font-size: 12px;">ERROR:Este Usuario ya está registrado!</span></label>
                            <input type="text" name="nombre" id="nombres" placeholder="Nombre de Usuario..." class="form-control" autocomplete='off' required>
                            <div id="msjNombre" class="errores"> Nombre de Usuario... </div>
                        </div>
                    </div>

                    <div id="inputs">


                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="email" name="email" id="emailId" placeholder="E-Mail..." class="form-control" autocomplete='off' required>
                            <div id="msjEmail" class="errores"> E-Mail... </div>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="pass" id="passId" placeholder="Contraseña..." autocomplete='off'  class="form-control" required>
                            <div id="msjPass" class="errores"> Contraseña... </div>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="rol" id="rolId" class="form-control" required>

                            </select>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Imagen de Perfil</label>
                            <input type="file" name="imagen" id="imagenId" class="form-control" onchange="validarFile(this)" required>
                            <div id="msjImg" class="errores"> Imagen... </div>
                        </div>
                    </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="btnSaveUser" id="btnSaveUserId" class="btn btn-primary">Guardar Usuario</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar -->

<div class="modal fade" id="frmEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
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
                            <input type="text" name="nombreE" placeholder="Nombre de Usuario..." id="nombresId" class="form-control" required>
                            <div id="msjNombreE" class="errores"> Nombre de Usuario... </div>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="text" name="emailE" id="emailEId" placeholder="E-Mail..." class="form-control" required>
                            <div id="msjEmailE" class="errores"> E-Mail... </div>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="passE" id="passEId" placeholder="Contraseña..." class="form-control" required>
                            <div id="msjPassE" class="errores"> Contraseña... </div>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="rolE" id="rolEId" class="form-control" required>
                                <option disabled="true">Seleccione</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Imagen de Perfil</label>
                            <input type="file" name="imagenE" id="imagenEId" class="form-control" onchange="validarFile(this)" required>
                            <div id="msjImgE" class="errores"> Imagen... </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="btnEditUser" id="btnEditUserId" class="btn btn-primary">Editar Usuario</button>
            </div>
        </div>
    </div>
</div>



