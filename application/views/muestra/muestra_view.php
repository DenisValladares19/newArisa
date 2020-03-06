<script src="<?php echo base_url("resources/src/js/muestra/muestra.js")?>"></script>


<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Muestras
    </h3>

</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a id="agregarMuestra"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Muestra</a>
        </li>
        <li>
            <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Muestras</a>
        </li>
    </ul>
</div>

<div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0" id="tabla">
        <thead style="background-color: rgba(11, 23, 41 , 0.6); color: #f0f0f0">
        <td>Cotizacion</td>
        <td>Estado</td>
        <td>Fecha</td>
        <td>URL</td>
        <td>Comentarios</td>
        <td>Opciones</td>
        </thead>
        <tbody id="table">
        </tbody>
        <tfoot>
        <td>Cotizacion</td>
        <th>Estado</th>
        <td>Cotizacion</td>
        <th>URL</th>
        <th>Comentarios</th>
        <th>Opciones</th>
        </tfoot>
    </table>
</div>



<!-- Modal -->
<div class="modal fade" id="frmInsertarMuestra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insertar Muestra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmInsertar">

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Cotizacion</label>
                            <select name="cotizacion" id="cotizacion" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>URL de Archivo (.docx)</label>
                            <input type="file" name="muestra" id="muestraId" class="form-control">
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Comentarios</label>
                            <input type="text" name="coment" id="comentId" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelar">Cancelar</button>
                <button type="submit" name="btnSave" id="btnGuardar" class="btn btn-primary">Guardar Muestra</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar -->

<div class="modal fade" id="frmEditarMuestra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Muestra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmSampleIdEdit">

                    <input type="hidden" name="txtId" id="txtIdText">


                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Cotizacion</label>
                            <select name="cotizacionE" id="cotizacionE" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Estado</label>
                            <select name="estadoE" id="estadoIdE" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>URL de Archivo</label>
                            <input type="file" name="muestraE" id="muestraIdE" class="form-control"></input>
                        </div>
                    </div>
                    <div class="form-column col-md-12">
                        <div class="form-group">
                            <label>Comentarios</label>
                            <input type="text" name="comentE" id="comentIdE" class="form-control"></input>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal" id="cancelar">Cancelar</button>
                <button type="submit" name="btnEdit" id="btnEditSampleId" class="btn btn-primary">Modificar Muestra</button>
            </div>
        </div>
    </div>
</div>




<input type="hidden" name="txtIdname" id="txtIdText"></input>