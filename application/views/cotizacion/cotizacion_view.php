<script src="<?php echo base_url("resources/src/js/cotizacion/cotizacion.js")?>"></script>

<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Cotización
    </h3>

</div>
    <input type="hidden" id="rol" value="<?php echo $this->session->userdata('rol');?>">
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
    <?php $rol = $this->session->userdata('rol');
        if($rol!="Diseñador"){

        
    ?>
        <li>
            <a id="agregarCliente"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Cotización</a>
        </li>
    <?php 
        }
    ?>
        <li>
            <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Cotizaciónes</a>
        </li>
    </ul>
</div>

<div class="table-responsive" id="tablaCot">


</div>


<!-- Modal insertar -->
<div class="modal fade" id="frmInsertarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insertar Cotización #<spam id="nCot"></spam> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formModal">
                    <div class="row">
                        <div class="form-column col-md-6">
                           <div class="form-group">
                               <label>Nombre de Cliente</label>
                               <select name="cliente" id="clienteI" class="form-control-lg"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" name="fecha" id="fechaI" class="form-control" autocomplete='off' required ></input>
                            </div>
                        </div>
                    </div>
                        <div class='row'>
                            <div class='col-md-12'>
                                <textarea class='form-control' name='descripcion' id='descripcionI' placeholder='Descripcion corta(para Diseñador).' required></textarea>
                            </div>
                        </div>
                    
                </form>
                    <div class="row">
                            
                        <div class="col-md-12"><br>
                            <a id="addDes" class="btn btn-success">Agregar descripcion</a>
                        </div>
                    </div>
                    <div id='divDesc'>
                        <form id="frmDesc">
                            <div class="row" id="inputDesc">
                                <div class='col-md-6'>
                                <input 
                                    type='text' 
                                    name='desc' 
                                    id='descI'
                                    class='form-control' 
                                    onKeypress="validarCampo(event)"  
                                    placeholder='Descripción' 
                                    maxlength="100"
                                    required
                                /></div>
                                <div class='col-md-3'>
                                <input 
                                    type='text' 
                                    name='cant' 
                                    id='cantI' 
                                    class='form-control' 
                                    placeholder='Cantidad' 
                                    required 
                                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                /></div>
                                <div class='col-md-3'>
                                <input 
                                    type='text' 
                                    name='total' 
                                    id='totalI' 
                                    class="form-control" 
                                    placeholder="Total" 
                                    required
                                    onkeypress="var pattern = /[^0-9\.]/g; this.value = this.value.replace(pattern, '');"
                                /></div>
                                <div class="col-md-6" id="caracter">
                            <p style="color:red;">Numero de caracteres (<span id="nCaracter">0</span> - 100)</p>
                        </div>
                            </div>
                            <!-- cargar tabla de la descripcion -->
                            <div class="row mt-4">
                                <div class='col-md-12'>
                                    <div id="tablaDesc"></div>
                                </div>
                            </div>
                            <button type="submit" name="btnSave" id="btnGuardar" class="btn btn-primary mt-5">Guardar Cotización</button>
                        </form> 
                    </div>
              </div>
            </div>

        </div>
    </div>
        
    <!-- Modal para editar una descripcion -->
<div class="modal fade" id="frmEditDesc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmDescE">
                    <div class="row" id='divDesc'>
                    <div class='col-md-6'>
                    <input 
                        type='text' 
                        name='desc' 
                        id='descE'
                        class='form-control desc' 
                        onKeyup="validarCampo(event)"  
                        placeholder='Descripción' 
                        required
                    /></div>
                    <div class='col-md-3'>
                    <input 
                        type='text' 
                        name='cant' 
                        id='cantE' 
                        class='form-control' 
                        placeholder='Cantidad' 
                        required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    /></div>
                    <div class='col-md-3'>
                    <input 
                        type='text' 
                        name='total' 
                        id='totalE' 
                        class="form-control" 
                        placeholder="Total" 
                        required
                        onkeypress="var pattern = /[^0-9\.]/g; this.value = this.value.replace(pattern, '');"
                    /></div>
                    <div class="col-md-6" id="caracter">
                            <p style="color:red;">Numero de caracteres (<span id="nCaracter">0</span> - 100)</p>
                        </div>
                    <input type="hidden" id="idDescE" name="idDetalle"/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" id="btnGuardarE">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar -->
<div class="modal fade" id="modalCotizacionEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formModalEditar">
                    <div class="row">
                        <div class="form-column col-md-6">
                           <div class="form-group">
                               <label>Nombre de Cliente</label>
                               <select name="cliente" id="clienteE" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" name="fecha" id="fechaE" class="form-control" autocomplete='off' ></input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" id="estadoE" class="form-control"></select>
                            </div>
                        </div>
                    </div>
                    
                        <div class='row'>
                            <div class='col-md-12'>
                                <textarea class='form-control' name='descripcion' id='descripcionE' placeholder='Descripcion corta(para Diseñador).'></textarea>
                            </div>
                        </div>
                
                    <div class="row">      
                        <div class="col-md-12"><br>
                            <a class="btn btn-success" id="btnCambios">guardar cambios</a><a id="btnNext" class="btn btn-info">siguiente  <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </form>
                <form id="frmDescEditar">
                <div class="nada">
                <div class="row"> 
                        <div class="col-md-12"><br>
                            <a id="addDesEdit" class="btn btn-success">Agregar descripcion</a>
                        </div>
                    </div>
                    <div class="row" id='divDescEditar'>
                    <div class='col-md-6'>
                    <input 
                        type='text' 
                        name='desc' 
                        id='descEdit'
                        class='form-control desc' 
                        onKeyup="validarCampo(event)" 
                        placeholder='Descripción' 
                        required
                    /></div>
                    <div class='col-md-3'>
                    <input 
                        type='text' 
                        name='cant' 
                        id='cantEdit' 
                        class='form-control' 
                        placeholder='Cantidad' 
                        required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    /></div>
                    <div class='col-md-3'>
                    <input 
                        type='text' 
                        name='total' 
                        id='totalEdit' 
                        class="form-control" 
                        placeholder="Total" 
                        required
                        onkeypress="var pattern = /[^0-9\.]/g; this.value = this.value.replace(pattern, '');"
                    /></div>
                    <div class="col-md-6" id="caracter">
                            <p style="color:red;">Numero de caracteres (<span id="nCaracter">0</span> - 100)</p>
                        </div>
                    </div>
                    
                    <!-- cargar tabla de la descripcion -->
                    <div class="row mt-1">
                        <div class='col-md-12'>
                            <div id="tablaDescEditar"></div>
                        </div>
                    </div>
                    <button type="submit" name="btnSave" id="btnGuardarEdit" class="btn btn-primary mt-5">Guardar Cotización</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>

    
