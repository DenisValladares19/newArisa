<script src="<?php echo base_url("resources/src/js/reporte/reporte.js")?>"></script>

<div class="row">

    <div class="col-md-12">
        <h1>Reportería de órdenes</h1>
    </div>

    <div class="col-md-1">
        <div class="btn btn-primary" id="reporteG">Órdenes en general</div>
    </div>



    <div class="col-md-1">
        <div class="btn btn-primary" id="reporteC">Órdenes por cliente</div>
    </div>



    <div class="col-md-1">
        <div class="btn btn-primary" id="reporteF">Órdenes por fecha</div>
    </div>



    <div class="col-md-1">
        <div class="btn btn-primary" id="reporteRF">Órdenes por rango de fechas</div>
    </div>

</div>









<div class="modal fade" id="reporteCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formReporteCliente" action="Reporte_Orden_Cliente">


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="Cliente" id="clienteId" class="form-control">
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





<!-- -->

<div class="modal fade" id="reporteGModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formReporteCliente" action="Reporte_Orden">
                    <label>Todas la órdenes existentes serán visualizadas en un reporte.</label>
                    </div>

                    <button type="submit" id="btnDeleteId" name="btnDelete" class="btn btn-danger">Generar reporte</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- -->



<div class="modal fade" id="reporteFModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formReporteCliente" action="Reporte_Orden_Fecha">


                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="date" name="fecha">
                        </div>
                    </div>

                    <button type="submit" id="btnDeleteId" name="btnDelete" class="btn btn-danger">Generar Reporte</button>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- -->



<div class="modal fade" id="reporteFIModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formReporteCliente" action="Reporte_Orden_Fecha_B">



                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Fecha Inicial</label>
                            <input type="date" name="fechaI">
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Fecha Final</label>
                            <input type="date" name="fechaF">
                        </div>
                    </div>


                    <button type="submit" id="btnDeleteId" name="btnDelete" class="btn btn-danger">Generar Reporte</button>
                </form>
            </div>

        </div>
    </div>
</div>