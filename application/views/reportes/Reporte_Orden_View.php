
<div class="modal fade" id="reporteOrdenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formReporteOrden">


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="Orden" id="OrdenId" class="form-control">
                                <option disabled="true">Seleccione</option>

                            </select>
                        </div>
                    </div>

                    <button type="submit" id="btnDeleteId" name="btnDelete" class="btn btn-danger">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>