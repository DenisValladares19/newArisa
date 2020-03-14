

    <!-- Nav lateral -->
    <section class="full-box nav-lateral">
        <div class="full-box nav-lateral-bg show-nav-lateral"></div>
        <div class="full-box nav-lateral-content">
            <figure class="full-box nav-lateral-avatar">
                <i class="far fa-times-circle show-nav-lateral"></i>
                <img src="<?php echo base_url()?>resources/images/uploads/<?php echo $this->session->userdata("image")?>" class="img-fluid" alt="Avatar">
                <figcaption class="roboto-medium text-center">
                    <?php echo $this->session->userdata("nombre");?> <br><small class="roboto-condensed-light">  <?php echo $this->session->userdata("rol");?></small>
                </figcaption>
            </figure>
            <div class="full-box nav-lateral-bar"></div>



            <nav class="full-box nav-lateral-menu">


                    <ul>



                        <?php $rol = $this->session->userdata('rol');
                        if($rol=='Vendedor'){
                            ?>

                            <li>
                                <a href="Cliente" id="cli"><i class="fas fa-users fa-fw"></i> &nbsp; Clientes</a>

                            </li>

                            <!-- Proveedor -->
                            <li>
                                <a href="Proveedor" id="prov"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Proveedores</a>

                            </li>





                            <li>
                                <a href="Cotizacion" id="cot"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Cotizaciones</a>
                            </li>


                            <?php
                        }
                        ?>


                        <?php
                        if($rol=='Diseñador') {
                            ?>


                            <li>
                                <a href="Muestra" id="mues"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Muestra</a>
                            </li>
                            <li>
                                <a href="Cotizacion" id="cot"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Cotizaciones</a>
                            </li>

                            <?php
                        }
                        ?>

                        <?php
                        if($rol=='Administrador') {
                            ?>



                            <li>
                                <a href="Dashboard" id="dash"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
                            </li>

                            <li>
                                <a href="Usuario" id="dash"><i class="fas fa-user-tie"></i> &nbsp; &nbsp;Usuario</a>
                            </li>

                            <li>
                                <a href="Cliente" id="cli"><i class="fas fa-users fa-fw"></i> &nbsp; Clientes</a>
                            </li>

                            <!-- Proveedor -->
                            <li>
                                <a href="Proveedor" id="prov"><i class="fas fa-users-cog"></i> &nbsp; Proveedores</a>

                            </li>

                            <!-- Inventario -->
                            <li>
                                <a href="Inventario" id="inv"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Inventario</a>
                            </li>

                            <li>
                                <a href="Cotizacion" id="cot"><i class="fas fa-hand-holding-usd"></i>&nbsp; Cotizaciones</a>
                            </li>

                            <li>
                                <a href="Muestra" id="mues"><i class="fas fa-cloud-upload-alt"></i> &nbsp; Muestra</a>
                            </li>

                            <li>
                                <a href="Orden" id="orden"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Orden de trabajo</a>
                            <li>
                            <!--
                            <li>
                                <a href="Historial" id="his"><i class="fas fa-list-ul"></i> &nbsp; Registro de actividad</a>
                            </li>-->

                            <li>
                                <a href="#" class="nav-btn-submenu" id="rep"><i class="fas fa-file-signature"></i> &nbsp; Reportes <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="Reporte"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Órdenes</a>
                                    </li>
                                    <li>
                                        <a href="Reporte_cotizacion"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Cotización</a>
                                    </li>
                                </ul>
                            </li>


                            <?php
                        }
                        ?>


                    </ul>

            </nav>


        </div>
    </section>

