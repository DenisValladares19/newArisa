<script src="<?php echo base_url("resources/src/js/reporte/reporte.js")?>"></script>

<h1>Reportes</h1>
<br><br>
<h3>Reportes  de Cotizaciónes</h3>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm" id="reporteRF">
                <button style="color: #000000; background-color: rgba(196, 211, 245 , 0.9); serif; font-size:12pt; font-family: Raavi;" class="btn btn-light">
                    <img src="<?php echo base_url("resources/images/reporte/rango.png")?>" width="37%" height="30%">
                    <br>
                    <h4>Cotizaciónes</h4>
                    <br>
                    <span style="font-size:12pt; text-transform: none;">Cotizaciónes en un Rango de Fechas</span>
                    <br>
                </button>
        </div>
        <div class="col-sm">
                <button style="color: #000000; background-color: rgba(196, 211, 245 , 0.9); serif; font-size:12pt; font-family: Raavi;" class="btn btn-light" id="reporteF">
                    <img src="<?php echo base_url("resources/images/reporte/fecha.png")?>" width="37%" height="30%">
                    <br>
                    <h4>Cotizaciónes</h4>
                    <br>
                    <span style="font-size:12pt; text-transform: none;">Cotizaciónes en una Fecha Especifica</span>
                    <br>
                </button>
        </div>
        <div class="col-sm">
                <button style="color: #000000; background-color: rgba(196, 211, 245 , 0.9); serif; font-size:12pt; font-family: Raavi;" class="btn btn-light" id="reporteC">
                    <img src="<?php echo base_url("resources/images/dashboard/clientes.png")?>" width="30%" height="30%">
                    <br>
                    <h4>Cotizaciónes</h4>
                    <br>
                    <span style="font-size:12pt; text-transform: none;">Cotizaciónes de un Cliente en Especifico</span>
                    <br>
                </button>
        </div>
        <div class="col-sm">
                <button style="color: #000000; background-color: rgba(196, 211, 245 , 0.9); serif; font-size:12pt; font-family: Raavi;" class="btn btn-light" id="reporteEstado">
                    <img src="<?php echo base_url("resources/images/dashboard/clientes.png")?>" width="30%" height="30%">
                    <br>
                    <h4>Cotizaciónes</h4>
                    <br>
                    <span style="font-size:12pt; text-transform: none;">Cotizaciónes de por estado</span>
                    <br><br>
                </button>
        </div>
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

                        <div class="form-column col-md-12">

                            <div class="form-group">
                                <label>Fecha Inicial</label>
                                <input type="text" name="fechaICliente"   autocomplete='off' id="fechaICliente" class="form-control">
                            </div>
                        </div>

                        <div class="form-column col-md-12">

                            <div class="form-group">
                                <label>Fecha Final</label>
                                <input type="text" name="fechaFCliente" autocomplete='off' class="form-control" id="fechaFCliente">
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="btnDeleteId" onclick="reporteCliente(event);" name="btnDelete" class="btn btn-danger">Generar Reporte</button>
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
                            <input type="text" name="fecha" autocomplete='off' id="fecha" class="form-control">
                        </div>
                    </div>

                    <button type="submit" id="btnDeleteId" onclick="reporteFecha(event);" name="btnDelete" class="btn btn-danger btn-block">Generar Reporte</button>
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
                            <input type="text" name="fechaI"   autocomplete='off' id="fechaI" class="form-control">
                        </div>
                    </div>

                    <div class="form-column col-md-12">



                        <div class="form-group">
                            <label>Fecha Final</label>
                            <input type="text" name="fechaF" autocomplete='off' class="form-control" id="fechaF">
                        </div>
                    </div>


                    <button type="submit" id="btnDeleteId" onclick="reporteFechaInicialFinal(event);" name="btnDelete" class="btn btn-danger text-center btn-block">Generar Reporte</button>
                </form>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="reporteEs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="formReporteCliente" action="">



                    <div class="form-column col-md-12">

                        <select id="estado" class="form-control">
                        
                        </select>       
                    </div>

                    <div class="form-column col-md-12">

                        <div class="form-group">
                            <label>Fecha Inicial</label>
                            <input type="text" name="fechaIEstado"   autocomplete='off' id="fechaIEstado" class="form-control">
                        </div>
                    </div>

                    <div class="form-column col-md-12">

                        <div class="form-group">
                            <label>Fecha Final</label>
                            <input type="text" name="fechaFEstado" autocomplete='off' class="form-control" id="fechaFEstado">
                        </div>
                    </div>

                    <button type="submit" id="btnDeleteId" onclick="reporteEstado(event);" name="btnDelete" class="btn btn-danger text-center btn-block">Generar Reporte</button>
                </form>
            </div>

        </div>
    </div>
</div>



