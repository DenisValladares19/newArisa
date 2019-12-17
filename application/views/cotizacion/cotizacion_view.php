<script src="<?php echo base_url("resources/src/js/cotizacion/cotizacion.js")?>"></script>

<div class="row">

    <div class="col-md-12">
        <h1>Gestión de Cotizaciones</h1>
    </div>

    <div class="col-md-1">
        <div class="btn btn-primary" id="agregarCliente">Agregar</div>
    </div>


</div>

<div class="table-responsive">

    <table class="table table-bordered" width="100%" cellspacing="0" id="data">
        <thead style="font-weight: bold;">
        <td>Cliente</td>
        <td>Tipo de Impresión</td>
        <td>Fecha</td>
        <td>Cantidad</td>
        <td>Precio</td>
        <td>Descripción</td>
        <td>Opciones</td>
        </thead>

        <tbody>
            <tr>
                <td>Juan Carlos</td>
                <td>Pendiente</td>
                <td>10/10/2019</td>
                <td>30</td>
                <td>$45.00</td>
                <td>Pendiente</td>
                <td><button class="btn-success">Modificar</button>
                    <button class="btn-danger">Eliminar</button></td>
            </tr>
            <tr>
                <td>Rocío Chicas</td>
                <td>Pendiente</td>
                <td>11/11/2019</td>
                <td>50</td>
                <td>$70.00</td>
                <td>Pendiente</td>
                <td><button class="btn-success">Modificar</button>
                    <button class="btn-danger">Eliminar</button></td>
            </tr>
            <tr>
                <td>Francisco Edgardo</td>
                <td>Pendiente</td>
                <td>01/01/2019</td>
                <td>40</td>
                <td>$60.00</td>
                <td>Pendiente</td>
                <td><button class="btn-success">Modificar</button>
                    <button class="btn-danger">Eliminar</button></td>
            </tr>
        </tbody>

        <tfoot>
        <td>Cliente</td>
        <td>Tipo de Impresión</td>
        <td>Fecha</td>
        <td>Cantidad</td>
        <td>Precio</td>
        <td>Descripción</td>
        <td>Opciones</td>
        </tfoot>
    </table>

</div>


<!-- Modal -->
<div class="modal fade" id="frmInsertarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insertar</h5>
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
                               <select name="cliente" id="clienteI" class="form-control-lg"><option>Seleccionar</option></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" name="fecha" id="fechaI" class="form-control"></input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo de Impresión</label>
                                <select name="tipoImprecion" id="tipoI" class="form-control"><option>Seleccionar</option></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" id="estadoI" class="form-control"><option>Seleccionar</option></select>
                            </div>
                        </div>
                    </div>
                </form>
                <form id="frmDesc">
                    <div class="row">
                            
                        <div class="col-md-12"><br>
                            <a id="addDes" class="btn btn-success">Agregar descripcion</a>
                        </div>
                    </div>
                    <div class="row" id='divDesc'>
                    <div class='col-md-4'><input type='text' name='desc' class='form-control' placeholder='Descripción'/></div>
                    <div class='col-md-2'><input type='text' name='cant' id='cantI' class='form-control' placeholder='Cantidad'/></div>
                    <div class='col-md-2'><input type='text' name='uni' class='form-control' placeholder='Unidad'/></div>
                    <div class='col-md-2'><input type='text' name='precio' id='Precio' class="form-control" placeholder="precio"/></div>
                    <div class='col-md-2'><input type='text' name='total' id='totalI' class='form-control' placeholder='total'/></div>
                    </div>
                    <button type="submit" name="btnSave" id="btnGuardar" class="btn btn-primary">Guardar Cotización</button>
                </form>
              </div>
            </div>

        </div>
    </div>


<!-- Modal para mostrar el inventario -->

<div class="modal fade bd-example-modal-lg" id="modalAdd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Inventario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <a id="addDes" class="btn btn-success">Agregar Descripcion</a>    
          <form name="frmPrueba" method="POST">
              
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

