<link href="<?= base_url() ?>dist/css/datatableNFilters.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<body class="">
<div class="wrapper ">
    <?php
    //se debe validar que tipo de perfil esta sesionado para poder asignarle el tipo de sidebar
    if($this->session->userdata('id_rol')=="16")//contratacion
    {
        /*-------------------------------------------------------*/
        $datos = array();
        $datos = $datos4;
        $datos = $datos2;
        $datos = $datos3;
        $this->load->view('template/sidebar', $datos);
    }
    else if($this->session->userdata('id_rol')=="6" || $this->session->userdata('id_rol')=="33" || $this->session->userdata('id_rol')=="4" || $this->session->userdata('id_rol')=="9")//ventasAsistentes
    {
        /*-------------------------------------------------------*/
        $datos = array();
        $datos = $datos4;
        $datos = $datos2;
        $datos = $datos3;
        $this->load->view('template/sidebar', $datos);
        /*--------------------------------------------------------*/
        /*$dato= array(
            'home' => 0,
            'listaCliente' => 0,
            'corridaF' => 0,
            'documentacion' => 0,
            'documentacion_ds' => 0,
            'autorizacion' => 0,
            'contrato' => 0,
            'inventario' => 0,
            'estatus8' => 0,
            'estatus14' => 0,
            'estatus7' => 0,
            'reportes' => 0,
            'DS' => 0,
            'DSConsult' => 0,
            'autoriza' => 0,
            'inventarioDisponible' => 0,
            'prospectosMktd' => 0,
            'bulkload' => 0,
            'clientsList' => 0,
            'manual' => 0,
            'aparta' => 0,
            'aparta' => 0,
            'aparta' => 0,
            'asignarVentas' => 0,
            'estatus9' => 0,
            'disponibles' => 0,
            'asesores' => 0,
            'nuevasComisiones' => 0,
            'histComisiones' => 0,
            'prospectos' => 0,
            'prospectosAlta' => 0,
             'consDepositoSeriedad' => 1,
             'altaUsuarios' => 0,
             'listaUsuarios' => 0



        );
        //$this->load->view('template/ventas/sidebar', $dato);
        $this->load->view('template/sidebar', $dato);*/
    }
    elseif($this->session->userdata('id_rol')=="11")//administracion
    {
        /*-------------------------------------------------------*/
        $datos = array();
        $datos = $datos4;
        $datos = $datos2;
        $datos = $datos3;
        $this->load->view('template/sidebar', $datos);
        /*--------------------------------------------------------*/
        /*	$dato= array(
                'home' => 0,
                'listaCliente' => 0,
                'documentacion' => 0,
                'documentacion_ds' => 1,
                'asignarVentas' => 0,
                'inventario' => 0,
                'clientsList' => 0,
                'status11' => 0,
                'nuevasComisiones'	=>	0,
                'histComisiones'	=>	0
            );
            //$this->load->view('template/administracion/sidebar', $dato);
            $this->load->view('template/sidebar', $dato);*/
    }
    elseif($this->session->userdata('id_rol')=="15")//juridico
    {
        /*-------------------------------------------------------*/
        $datos = array();
        $datos = $datos4;
        $datos = $datos2;
        $datos = $datos3;
        $this->load->view('template/sidebar', $datos);
        /*--------------------------------------------------------*/
        /*$dato= array(
            'home' => 0,
            'listaCliente' => 0,
            'documentacion' => 0,
            'documentacion_ds' => 1,
            'contrato' => 0,
            'inventario' => 0,
            'asignarVentas' => 0,
            'clientsList' => 0,
            'DS' => 0,
            'DSConsult' => 0,
            'autoriza' => 0,
            'inventarioDisponible' => 0,
            'status3' => 0,
            'status7' => 0,
            'lotesContratados' => 0,
            'nuevasComisiones'	=>	0,
            'histComisiones'	=>	0
        );
        //$this->load->view('template/juridico/sidebar', $dato);
        $this->load->view('template/sidebar', $dato);*/
    }
    elseif($this->session->userdata('id_rol')=="13" || $this->session->userdata('id_rol')=="17" || $this->session->userdata('id_rol')=="32")//contraloria
    {
        /*-------------------------------------------------------*/
        $datos = array();
        $datos = $datos4;
        $datos = $datos2;
        $datos = $datos3;
        $this->load->view('template/sidebar', $datos);
        /*--------------------------------------------------------*/
        /*$dato= array(
            'home' => 0,
            'listaCliente' => 0,
            'expediente' => 0,
            'corrida' => 0,
            'documentacion' => 0,
            'documentacion_ds' => 0,
            'historialpagos' => 0,
            'inventario' => 0,
            'estatus20' => 0,
            'estatus2' => 0,
            'estatus5' => 0,
            'clientsList' => 0,
            'estatus6' => 0,
            'asignarVentas' => 0,
            'estatus9' => 0,
            'estatus10' => 0,
            'estatus13' => 0,
            'DS' => 0,
            'DSConsult' => 0,
            'autoriza' => 0,
            'inventarioDisponible' => 0,
            'estatus15' => 0,
            'enviosRL' => 0,
            'estatus12' => 0,
            'acuserecibidos' => 0,
            'comnuevas' => 0,
            'comhistorial' => 0,
            'tablaPorcentajes' => 0,
            'lib_contraloria' => 0,
            'nuevasComisiones'	=>	0,
            'histComisiones'	=>	0,
            'integracionExpediente' => 0,
            'expRevisados' => 0,
            'estatus10Report' => 0,
            'rechazoJuridico' => 0
        );
        if($this->session->userdata("id_usuario") == 2752 || $this->session->userdata('id_usuario') == 2826)
        {
            $dato['DSContraloriaSU'] = 1;
        }
        //$this->load->view('template/contraloria/sidebar', $dato);
        $this->load->view('template/sidebar', $dato);*/
    }
    elseif($this->session->userdata('id_rol')=="7")//asesor
    {
        /*-------------------------------------------------------*/
        $datos = array();
        $datos = $datos4;
        $datos = $datos2;
        $datos = $datos3;
        $this->load->view('template/sidebar', $datos);
        /*--------------------------------------------------------*/
        /*$dato= array(
            'home' => 0,
            'listaCliente' => 0,
            'corridaF' => 0,
            'inventario' => 0,
            'prospectos' => 0,
            'prospectosAlta' => 0,
            'statistic' => 0,
            'comisiones' => 0,
            'DS'    => 0,
            'DSConsult' => 0,
            'documentacion' => 0,
            'clientsList' => 0,
            'documentacion_ds' => 1,
            'consDepositoSeriedad' => 0,
            'inventarioDisponible'  =>  0,
            'manual'    =>  0,
            'nuevasComisiones'     => 0,
            'histComisiones'       => 0,
            'sharedSales' => 0,
            'coOwners' => 0,
            'asignarVentas' => 0,
            'DS' => 0,
            'DSConsult' => 0,
            'autoriza' => 0,
            'inventarioDisponible' => 0,
            'references' => 0,
            'autoriza'	=>	0
        );
        $this->load->view('template/sidebar', $dato);*/
    }
    elseif($this->session->userdata('id_rol')=="12")//caja
    {
        /*-------------------------------------------------------*/
        $datos = array();
        $datos = $datos4;
        $datos = $datos2;
        $datos = $datos3;
        $this->load->view('template/sidebar', $datos);
        /*--------------------------------------------------------*/
        /*	$dato= array(
                'home' => 0,
                'listaCliente' => 0,
                'documentacion' => 0,
                'documentacion_ds' => 1,
                'cambiarAsesor' => 0,
                'historialPagos' => 0,
                'pagosCancelados' => 0,
                'asignarVentas' => 0,
                'altaCluster' => 0,
                'DS' => 0,
                'DSConsult' => 0,
                'autoriza' => 0,
                'inventarioDisponible' => 0,
                'clientsList' => 0,
                'altaLote' => 0,
                'inventario' => 0,
                'actualizaPrecio' => 0,
                'actualizaReferencia' => 0,
                'liberacion' => 0
            );
            //$this->load->view('template/contraloria/sidebar', $dato);
            $this->load->view('template/sidebar', $dato);*/
    }
    else
    {
        echo '<script>alert("ACCESSO DENEGADO"); window.location.href="'.base_url().'";</script>';
    }
    ?>
    <!--Contenido de la página-->


    <div class="content boxContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="goldMaderas">
                            <i class="fas fa-expand fa-2x"></i>
                        </div>
                        <div class="card-content">
                            <div class="encabezadoBox">
                                <h3 class="card-title center-align">Deposito de seriedad</h3>
                                <p class="card-title pl-1"></p>
                            </div>
                            <div  class="toolbar">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div class="form-group label-floating select-is-empty">
                                            <label class="control-label">Proyecto:</label>
                                            <select name="filtro3" id="filtro3" class="selectpicker select-gral m-0"
                                                    data-style="btn" data-show-subtext="true"  title="Selecciona proyecto"
                                                    data-live-search="true" data-size="7" required>
                                                <?php

                                                if($residencial != NULL) :

                                                    foreach($residencial as $fila) : ?>
                                                        <option value= <?=$fila['idResidencial']?> > <?=$fila['nombreResidencial']?> </option>
                                                    <?php endforeach;

                                                endif;

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div class="form-group label-floating select-is-empty">
                                            <label class="control-label">Condominio:</label>
                                            <select id="filtro4" name="filtro4" class="selectpicker select-gral m-0"
                                                    data-style="btn" data-show-subtext="true" data-live-search="true"
                                                    title="Selecciona condominio" data-size="7" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div class="form-group label-floating select-is-empty">
                                            <label class="control-label">Lote:</label>
                                            <select id="filtro5" name="filtro5" class="selectpicker select-gral m-0"
                                                    data-style="btn" data-show-subtext="true" data-live-search="true"
                                                    title="Selecciona lote" data-size="7" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="material-datatables">
                                <div class="table-responsive">
                                    <table  id="tabla_deposito_seriedad" name="tabla_deposito_seriedad"
                                            class="table-striped table-hover" style="text-align:center;">
                                        <thead>
                                        <tr>
                                            <th>PROYECTO</th>
                                            <th>CONDOMINIO</th>
                                            <th>LOTE</th>
                                            <th>CLIENTE</th>
                                            <th>FECHA APARTADO</th>
                                            <th>FECHA VENCIMIENTO</th>
                                            <th>COMENTARIO</th>
                                            <th>EXPEDIENTE</th>
                                            <th>DS</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                            <!--- modlaes --->
                            <!-- modal  ENVIA A CONTRALORIA 2-->
                            <div class="modal fade" id="modal1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <center><h4 class="modal-title"><label>Integración de Expediente - <b><span class="lote"></span></b></label></h4></center>
                                        </div>
                                        <div class="modal-body">
                                            <label>Comentario:</label>
                                            <textarea class="form-control" id="comentario" rows="3"></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="save1" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            <!-- modal  ENVIA A CONTRALORIA 5 por rechazo 1-->
                            <div class="modal fade" id="modal2" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 5 Contraloría) - <b><span class="lote"></span></b></label></h4></center>
                                        </div>
                                        <div class="modal-body">
                                            <label>Comentario:</label>
                                            <textarea class="form-control" id="comentario2" rows="3"></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="save2" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            <!-- modal  ENVIA A CONTRALORIA 5 por rechazo 1-->
                            <div class="modal fade" id="modal3" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 5 Contraloría) - <b><span class="lote"></span></b></label></h4></center>
                                        </div>
                                        <div class="modal-body">
                                            <label>Comentario:</label>
                                            <textarea class="form-control" id="comentario3" rows="3"></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="save3" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            <!-- modal  ENVIA A CONTRALORIA 6 por rechazo 1-->
                            <div class="modal fade" id="modal4" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 6 Contraloría) - <b><span class="lote"></span></b></label></h4></center>
                                        </div>
                                        <div class="modal-body">
                                            <label>Comentario:</label>
                                            <textarea class="form-control" id="comentario4" rows="3"></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="save4" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            <!-- modal  ENVIA A VENTAS 8 por rechazo 1-->
                            <div class="modal fade" id="modal5" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 8 Ventas) - <b><span class="lote"></span></b></label></h4></center>
                                        </div>
                                        <div class="modal-body">
                                            <label>Comentario:</label>
                                            <textarea class="form-control" id="comentario5" rows="3"></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="save5" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            <!-- modal  ENVIA A JURIDICO por rechazo 1-->
                            <div class="modal fade" id="modal6" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 7 Jurídico) - <b><span class="lote"></span></b></label></h4></center>
                                        </div>
                                        <div class="modal-body">
                                            <label>Comentario:</label>
                                            <textarea class="form-control" id="comentario6" rows="3"></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="save6" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            <!-- modal  ENVIA A JURIDICO por rechazo 1-->
                            <div class="modal fade" id="modal7" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 5 Contraloría) - <b><span class="lote"></span></b></label></h4></center>
                                        </div>
                                        <div class="modal-body">
                                            <label>Comentario:</label>
                                            <textarea class="form-control" id="comentario7" rows="3"></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="save7" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            <!-- modal  INSERT FILE-->
                            <div class="modal fade" id="addFile" >
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h3 class="modal-title" id="myModalLabel"><span class="lote"></span></h3></center>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group">
                                                <label class="input-group-btn">
									<span class="btn btn-primary btn-file">
									Seleccionar archivo&hellip;<input type="file" name="expediente" id="expediente" style="display: none;">
									</span>
                                                </label>
                                                <input type="text" class="form-control" id= "txtexp" readonly>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="sendFile" class="btn btn-primary"><span
                                                        class="material-icons" >send</span> Guardar documento </button>
                                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal INSERT-->
                            <!--modal que pregunta cuando se esta borrando un archivo-->
                            <div class="modal fade" id="cuestionDelete" >
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <center><h3 class="modal-title">¡Eliminar archivo!</h3></center>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row centered center-align">
                                                    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-2">
                                                        <h1 class="modal-title"> <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i></h1>
                                                    </div>
                                                    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-10">
                                                        <h4 class="modal-title">¿Está seguro de querer eliminar definivamente este archivo (<b><span class="tipoA"></span></b>)? </h4>
                                                        <h5 class="modal-title"><i> Esta acción no se puede deshacer.</i> </h5>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <br><br>
                                            <button type="button" id="aceptoDelete" class="btn btn-primary"> Si, borrar </button>
                                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"> Cancelar </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--termina el modal de cuestion-->
                            <!--- end modales --->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="content hide">
        <div class="container-fluid">




            <!-- modal  ENVIA A CONTRALORIA 2-->
            <div class="modal fade" id="modal1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <center><h4 class="modal-title"><label>Integración de Expediente - <b><span class="lote"></span></b></label></h4></center>
                        </div>
                        <div class="modal-body">
                            <label>Comentario:</label>
                            <textarea class="form-control" id="comentario" rows="3"></textarea>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="save1" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->







            <!-- modal  ENVIA A CONTRALORIA 5 por rechazo 1-->


            <div class="modal fade" id="modal2" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 5 Contraloría) - <b><span class="lote"></span></b></label></h4></center>
                        </div>
                        <div class="modal-body">
                            <label>Comentario:</label>
                            <textarea class="form-control" id="comentario2" rows="3"></textarea>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="save2" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <!-- modal  ENVIA A CONTRALORIA 5 por rechazo 1-->


            <div class="modal fade" id="modal3" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 5 Contraloría) - <b><span class="lote"></span></b></label></h4></center>
                        </div>
                        <div class="modal-body">
                            <label>Comentario:</label>
                            <textarea class="form-control" id="comentario3" rows="3"></textarea>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="save3" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <!-- modal  ENVIA A CONTRALORIA 6 por rechazo 1-->
            <div class="modal fade" id="modal4" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 6 Contraloría) - <b><span class="lote"></span></b></label></h4></center>
                        </div>
                        <div class="modal-body">
                            <label>Comentario:</label>
                            <textarea class="form-control" id="comentario4" rows="3"></textarea>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="save4" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->


            <!-- modal  ENVIA A VENTAS 8 por rechazo 1-->

            <div class="modal fade" id="modal5" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 8 Ventas) - <b><span class="lote"></span></b></label></h4></center>
                        </div>
                        <div class="modal-body">
                            <label>Comentario:</label>
                            <textarea class="form-control" id="comentario5" rows="3"></textarea>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="save5" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <!-- modal  ENVIA A JURIDICO por rechazo 1-->
            <div class="modal fade" id="modal6" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 7 Jurídico) - <b><span class="lote"></span></b></label></h4></center>
                        </div>
                        <div class="modal-body">
                            <label>Comentario:</label>
                            <textarea class="form-control" id="comentario6" rows="3"></textarea>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="save6" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <!-- modal  ENVIA A JURIDICO por rechazo 1-->

            <div class="modal fade" id="modal7" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <center><h4 class="modal-title"><label>Integración de Expediente (Rechazo estatus 5 Contraloría) - <b><span class="lote"></span></b></label></h4></center>
                        </div>
                        <div class="modal-body">
                            <label>Comentario:</label>
                            <textarea class="form-control" id="comentario7" rows="3"></textarea>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="save7" class="btn btn-success"><span class="material-icons" >send</span> </i> Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <!-- modal  INSERT FILE-->
            <div class="modal fade" id="addFile" >
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <center><h3 class="modal-title" id="myModalLabel"><span class="lote"></span></h3></center>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <label class="input-group-btn">
									<span class="btn btn-primary btn-file">
									Seleccionar archivo&hellip;<input type="file" name="expediente" id="expediente" style="display: none;">
									</span>
                                </label>
                                <input type="text" class="form-control" id= "txtexp" readonly>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" id="sendFile" class="btn btn-primary"><span
                                        class="material-icons" >send</span> Guardar documento </button>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal INSERT-->

            <!--modal que pregunta cuando se esta borrando un archivo-->
            <div class="modal fade" id="cuestionDelete" >
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <center><h3 class="modal-title">¡Eliminar archivo!</h3></center>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row centered center-align">
                                    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-2">
                                        <h1 class="modal-title"> <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i></h1>
                                    </div>
                                    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-10">
                                        <h4 class="modal-title">¿Está seguro de querer eliminar definivamente este archivo (<b><span class="tipoA"></span></b>)? </h4>
                                        <h5 class="modal-title"><i> Esta acción no se puede deshacer.</i> </h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <br><br>
                            <button type="button" id="aceptoDelete" class="btn btn-primary"> Si, borrar </button>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"> Cancelar </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--termina el modal de cuestion-->
            <div class="row">
                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <center>
                        <!--						<h3>DOCUMENTACIÓN</h3>-->
                    </center>
                    <hr>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="goldMaderas">
                            <i class="material-icons">reorder</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title" style="text-align: center">Depósitos de seriedad</h4>
                            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <label>Proyecto:</label><br>
                                    <select name="filtro3" id="filtro3" class="selectpicker" data-show-subtext="true"
                                            data-live-search="true"  data-style="btn" title="Selecciona Proyecto" data-size="7" required>
                                        <?php

                                        if($residencial != NULL) :

                                            foreach($residencial as $fila) : ?>
                                                <option value= <?=$fila['idResidencial']?> > <?=$fila['nombreResidencial']?> </option>
                                            <?php endforeach;

                                        endif;

                                        ?>
                                    </select>
                                </div>
                                <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <label>Condominio:</label><br>
                                    <select id="filtro4" name="filtro4" class="selectpicker" data-show-subtext="true"
                                            data-live-search="true"  data-style="btn" title="Selecciona Condominio" data-size="7"></select>
                                </div>
                                <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <label>Lote:</label><br>
                                    <select id="filtro5" name="filtro5" class="selectpicker" data-show-subtext="true"
                                            data-live-search="true"  data-style="btn" title="Selecciona Lote" data-size="7"></select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col xol-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <!--						<div class="card-header card-header-icon" data-background-color="goldMaderas">-->
                        <!--							<i class="material-icons">reorder</i>-->
                        <!--						</div>-->
                        <div class="card-content" style="padding: 50px 20px;">
                            <h4 class="card-title"></h4>
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered table-striped table-hover" id="tabla_deposito_seriedad" name="tabla_deposito_seriedad" style="text-align:center;">
                                            <thead>
                                            <tr>
                                                <th style="font-size: .9em;"><center>PROYECTO</center></th>
                                                <th style="font-size: .9em;"><center>CONDOMINIO</center></th>
                                                <th style="font-size: .9em;"><center>LOTE</center></th>
                                                <th style="font-size: .9em;"><center>CLIENTE</center></th>
                                                <th style="font-size: .9em;"><center>FECHA APARTADO</center></th>
                                                <th style="font-size: .9em;"><center>FECHA VENCIMIENTO</center></th>
                                                <th style="font-size: .9em;"><center>COMENTARIO</center></th>
                                                <th style="font-size: .9em;"><center>EXPEDIENTE</center></th>
                                                <th style="font-size: .9em;"><center>DS</center></th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/footer_legend');?>
</div>
</div>

</div><!--main-panel close-->
</body>
<?php $this->load->view('template/footer');?>
<!--DATATABLE BUTTONS DATA EXPORT-->
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>dist/css/shadowbox.css">
<script type="text/javascript" src="<?=base_url()?>dist/js/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>
<script>
    var miArray = new Array(6);
    var miArrayAddFile = new Array(6);

    var getInfo2A = new Array(7);
    var getInfo2_2A = new Array(7);
    var getInfo5A = new Array(7);
    var getInfo6A = new Array(7);
    var getInfo2_3A = new Array(7);
    var getInfo2_7A = new Array(7);
    var getInfo5_2A = new Array(7);


    var aut;
    $(document).ready (function() {
        $(document).on('fileselect', '.btn-file :file', function(event, numFiles, label) {
            var input = $(this).closest('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;
            if (input.length) {
                input.val(log);
            } else {
                if (log) alert(log);
            }
        });


        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
            console.log('triggered');
        });









        $('#filtro3').change(function(){

            var valorSeleccionado = $(this).val();

            // console.log(valorSeleccionado);
            //build select condominios

            $("#filtro4").empty().selectpicker('refresh');
            $.ajax({
                url: '<?=base_url()?>registroCliente/getCondominios/'+valorSeleccionado,
                type: 'post',
                dataType: 'json',
                beforeSend:function(){
                    $('#spiner-loader').removeClass('hide');
                },
                success:function(response){
                    var len = response.length;
                    for( var i = 0; i<len; i++)
                    {
                        var id = response[i]['idCondominio'];
                        var name = response[i]['nombre'];
                        $("#filtro4").append($('<option>').val(id).text(name));
                    }
                    $("#filtro4").selectpicker('refresh');
                    $('#spiner-loader').addClass('hide');
                }
            });
        });


        $('#filtro4').change(function(){
            var residencial = $('#filtro3').val();
            var valorSeleccionado = $(this).val();
            // console.log(valorSeleccionado);
            //$('#filtro5').load("<?//= site_url('registroCliente/getLotesAll') ?>///"+valorSeleccionado+'/'+residencial);
            $("#filtro5").empty().selectpicker('refresh');
            $.ajax({
                url: '<?=base_url()?>Contraloria/getLotesAllTwo/'+valorSeleccionado,
                type: 'post',
                dataType: 'json',
                beforeSend:function(){
                    $('#spiner-loader').removeClass('hide');
                },
                success:function(response){
                    var len = response.length;
                    if(len > 0){
                        for( var i = 0; i<len; i++)
                        {
                            var id = response[i]['idLote'];
                            var name = response[i]['nombreLote'];
                            $("#filtro5").append($('<option>').val(id).text(name));
                        }
                    }else{
                        $("#filtro5").append($('<option>').val(0).text('No se encontraron lotes'));
                    }

                    $("#filtro5").selectpicker('refresh');
                    $('#spiner-loader').addClass('hide');


                }
            });
        });

        $('#tabla_deposito_seriedad thead tr:eq(0) th').each(function (i) {
            if(i!=7 && i!=8){
                var title = $(this).text();
                $(this).html('<input type="text" class="textoshead"  placeholder="' + title + '"/>');
                $('input', this).on('keyup change', function () {
                    if ($('#tabla_deposito_seriedad').DataTable().column(i).search() !== this.value) {
                        $('#tabla_deposito_seriedad').DataTable()
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            }

        });


        $('#filtro5').change(function(){

            var valorSeleccionado = $(this).val();

            console.log(valorSeleccionado);
            $('#tabla_deposito_seriedad').DataTable({
                destroy: true,
                lengthMenu: [[15, 25, 50, -1], [10, 25, 50, "All"]],
                "ajax":
                    {
                        "url": '<?=base_url()?>index.php/Contraloria/getAllDsByLote/'+valorSeleccionado,
                        "dataSrc": ""
                    },
                dom: 'Brt'+ "<'row'<'col-12 col-sm-12 col-md-6 col-lg-6'i><'col-12 col-sm-12 col-md-6 col-lg-6'p>>",
                "ordering": false,
                language: {
                    url: "<?=base_url()?>/static/spanishLoader_v2.json",
                    paginate: {
                        previous: "<i class='fa fa-angle-left'>",
                        next: "<i class='fa fa-angle-right'>"
                    }
                },
                "buttons": [
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: 'Deposito de seriedad',
                        title:'Deposito de seriedad',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            format: {
                                header: function (d, columnIdx) {
                                    switch (columnIdx) {
                                        case 0:
                                            return 'PROYECTO';
                                            break;
                                        case 1:
                                            return 'CONDOMINIO';
                                            break;
                                        case 2:
                                            return 'LOTE';
                                            break;
                                        case 3:
                                            return 'CLIENTE';
                                            break;
                                        case 4:
                                            return 'FECHA APARTADO';
                                            break;
                                        case 5:
                                            return 'FECHA VENCIMIENTO';
                                            break;
                                        case 6:
                                            return 'COMENTARIO';
                                            break;
                                    }
                                }
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        titleAttr: 'Deposito de seriedad',
                        title:'Deposito de seriedad',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            format: {
                                header: function (d, columnIdx) {
                                    switch (columnIdx) {
                                        case 0:
                                            return 'PROYECTO';
                                            break;
                                        case 1:
                                            return 'CONDOMINIO';
                                            break;
                                        case 2:
                                            return 'LOTE';
                                            break;
                                        case 3:
                                            return 'CLIENTE';
                                            break;
                                        case 4:
                                            return 'FECHA APARTADO';
                                            break;
                                        case 5:
                                            return 'FECHA VENCIMIENTO';
                                            break;
                                        case 6:
                                            return 'COMENTARIO';
                                            break;
                                    }
                                }
                            }
                        }
                    }
                ],
                pagingType: "full_numbers",
                columns:
                    [
                        { "data": "nombreResidencial" },
                        { "data": "nombreCondominio" },
                        { "data": "nombreLote" },
                        {
                            "data": function( d ){
                                return d.nombre+" "+d.apellido_paterno+" "+d.apellido_materno;
                            }
                        },
                        { "data": "fechaApartado" },
                        { "data": "fechaVenc" },
                        {
                            "data": function( d ){

                                comentario = d.idMovimiento == 31 ? d.comentario + "<br> <span class='label label-success'>Nuevo apartado</span>":
                                    d.idMovimiento == 85 ?  d.comentario + "<br> <span class='label label-danger'>Rechazo Contraloria estatus 2</span>":
                                        d.idMovimiento == 20 ?  d.comentario + "<br> <span class='label label-danger'>Rechazo Contraloria estatus 5</span>":
                                            d.idMovimiento == 63 ?  d.comentario + "<br> <span class='label label-danger'>Rechazo Contraloria estatus 6</span>":
                                                d.idMovimiento == 73 ?  d.comentario + "<br> <span class='label label-danger'>Rechazo Ventas estatus 8</span>":
                                                    d.idMovimiento == 82 ?  d.comentario + "<br> <span class='label label-danger'>Rechazo Jurídico estatus 7</span>":
                                                        d.idMovimiento == 92 ?  d.comentario + "<br> <span class='label label-danger'>Rechazo Contraloria estatus 5</span>":
                                                            d.idMovimiento == 96 ?  d.comentario + "<br> <span class='label label-danger'>Rechazo Contraloria estatus 5</span>":
                                                                d.comentario;
                                return comentario;
                            }

                        },
                        {
                            "data": function( d ){

                                buttonst = d.idMovimiento == 31 ?  '<a href="#" data-nomLote="'+d.nombreLote+'" data-idCliente="'+d.id_cliente+'" data-nombreResidencial="'+d.nombreResidencial+'" data-nombreCondominio="'+d.nombreCondominio+'" data-nombreLote="'+d.nombreLote+'" data-idCondominio="'+d.idCondominio+'" data-idLote="'+d.idLote+'" data-fechavenc="'+d.fechaVenc+'" class="getInfo2 btn-data btn-green" >  <i class="fas fa-check-square" aria-hidden="true" title= "Enviar estatus"></i></a>':
                                    d.idMovimiento == 85 ?  '<a href="#" data-nomLote="'+d.nombreLote+'" data-idCliente="'+d.id_cliente+'" data-nombreResidencial="'+d.nombreResidencial+'" data-nombreCondominio="'+d.nombreCondominio+'" data-nombreLote="'+d.nombreLote+'" data-idCondominio="'+d.idCondominio+'" data-idLote="'+d.idLote+'" data-fechavenc="'+d.fechaVenc+'" class="getInfo2_2 btn-data btn-green"><i class="fas fa-check-square" aria-hidden="true" title= "Enviar estatus"></i></a>':
                                        d.idMovimiento == 20 ?  '<a href="#" data-nomLote="'+d.nombreLote+'" data-idCliente="'+d.id_cliente+'" data-nombreResidencial="'+d.nombreResidencial+'" data-nombreCondominio="'+d.nombreCondominio+'" data-nombreLote="'+d.nombreLote+'" data-idCondominio="'+d.idCondominio+'" data-idLote="'+d.idLote+'" data-fechavenc="'+d.fechaVenc+'" class="getInfo5 btn-data btn-green">  <i class="fas fa-check-square" aria-hidden="true" title= "Enviar estatus"></i></a>':
                                            d.idMovimiento == 63 ?  '<a href="#" data-nomLote="'+d.nombreLote+'" data-idCliente="'+d.id_cliente+'" data-nombreResidencial="'+d.nombreResidencial+'" data-nombreCondominio="'+d.nombreCondominio+'" data-nombreLote="'+d.nombreLote+'" data-idCondominio="'+d.idCondominio+'" data-idLote="'+d.idLote+'" data-fechavenc="'+d.fechaVenc+'" class="getInfo6 btn-data btn-green">  <i class="fas fa-check-square" aria-hidden="true" title= "Enviar estatus"></i></a>':
                                                d.idMovimiento == 73 ?  '<a href="#" data-nomLote="'+d.nombreLote+'" data-idCliente="'+d.id_cliente+'" data-nombreResidencial="'+d.nombreResidencial+'" data-nombreCondominio="'+d.nombreCondominio+'" data-nombreLote="'+d.nombreLote+'" data-idCondominio="'+d.idCondominio+'" data-idLote="'+d.idLote+'" data-fechavenc="'+d.fechaVenc+'" class="getInfo2_3 btn-data btn-green"><i class="fas fa-check-square" aria-hidden="true" title= "Enviar estatus"></i></a>':
                                                    d.idMovimiento == 82 ?  '<a href="#" data-nomLote="'+d.nombreLote+'" data-idCliente="'+d.id_cliente+'" data-nombreResidencial="'+d.nombreResidencial+'" data-nombreCondominio="'+d.nombreCondominio+'" data-nombreLote="'+d.nombreLote+'" data-idCondominio="'+d.idCondominio+'" data-idLote="'+d.idLote+'" data-fechavenc="'+d.fechaVenc+'" class="getInfo2_7 btn-data btn-green"><i class="fas fa-check-square" aria-hidden="true" title= "Enviar estatus"></i></a>':
                                                        d.idMovimiento == 92 ?  '<a href="#" data-nomLote="'+d.nombreLote+'" data-idCliente="'+d.id_cliente+'" data-nombreResidencial="'+d.nombreResidencial+'" data-nombreCondominio="'+d.nombreCondominio+'" data-nombreLote="'+d.nombreLote+'" data-idCondominio="'+d.idCondominio+'" data-idLote="'+d.idLote+'" data-fechavenc="'+d.modificado+'" class="getInfo5_2 btn-data btn-green"><i class="fas fa-check-square" aria-hidden="true" title= "Enviar estatus"></i></a>':
                                                            d.idMovimiento == 96 ?  '<a href="#" data-nomLote="'+d.nombreLote+'" data-idCliente="'+d.id_cliente+'" data-nombreResidencial="'+d.nombreResidencial+'" data-nombreCondominio="'+d.nombreCondominio+'" data-nombreLote="'+d.nombreLote+'" data-idCondominio="'+d.idCondominio+'" data-idLote="'+d.idLote+'" data-fechavenc="'+d.modificado+'" class="getInfo5_2 btn-data btn-green"><i class="fas fa-check-square" aria-hidden="true" title= "Enviar estatus"></i></a>':
                                                                d.comentario;
                                return "<div class='d-flex justify-center'>" + buttonst + "</div>";

                            }

                        },
                        {
                            "data": function( d ){
                                return '<a href="<?=base_url()?>index.php/Asesor/deposito_seriedad/'+d.id_cliente+'/0" class="btn-data btn-blueMaderas"><i class="fas fa-print" aria-hidden="true" title= "Depósito de seriedad"></i></a>';
                            }
                        }
                    ],
            });



        });/*document Ready*/




        $(document).on("click", ".getInfo2", function(e){
            e.preventDefault();

            getInfo2A[0] = $(this).attr("data-idCliente");
            getInfo2A[1] = $(this).attr("data-nombreResidencial");
            getInfo2A[2] = $(this).attr("data-nombreCondominio");
            getInfo2A[3] = $(this).attr("data-idCondominio");
            getInfo2A[4] = $(this).attr("data-nombreLote");
            getInfo2A[5] = $(this).attr("data-idLote");
            getInfo2A[6] = $(this).attr("data-fechavenc");

            nombreLote = $(this).data("nomlote");
            $(".lote").html(nombreLote);


            $('#modal1').modal('show');

        });



        $(document).on("click", ".getInfo2_2", function(e){
            e.preventDefault();

            getInfo2_2A[0] = $(this).attr("data-idCliente");
            getInfo2_2A[1] = $(this).attr("data-nombreResidencial");
            getInfo2_2A[2] = $(this).attr("data-nombreCondominio");
            getInfo2_2A[3] = $(this).attr("data-idCondominio");
            getInfo2_2A[4] = $(this).attr("data-nombreLote");
            getInfo2_2A[5] = $(this).attr("data-idLote");
            getInfo2_2A[6] = $(this).attr("data-fechavenc");

            nombreLote = $(this).data("nomlote");
            $(".lote").html(nombreLote);

            $('#modal2').modal('show');

        });


        $(document).on("click", ".getInfo5", function(e){
            e.preventDefault();

            getInfo5A[0] = $(this).attr("data-idCliente");
            getInfo5A[1] = $(this).attr("data-nombreResidencial");
            getInfo5A[2] = $(this).attr("data-nombreCondominio");
            getInfo5A[3] = $(this).attr("data-idCondominio");
            getInfo5A[4] = $(this).attr("data-nombreLote");
            getInfo5A[5] = $(this).attr("data-idLote");
            getInfo5A[6] = $(this).attr("data-fechavenc");

            nombreLote = $(this).data("nomlote");
            $(".lote").html(nombreLote);

            $('#modal3').modal('show');

        });


        $(document).on("click", ".getInfo6", function(e){
            e.preventDefault();

            getInfo6A[0] = $(this).attr("data-idCliente");
            getInfo6A[1] = $(this).attr("data-nombreResidencial");
            getInfo6A[2] = $(this).attr("data-nombreCondominio");
            getInfo6A[3] = $(this).attr("data-idCondominio");
            getInfo6A[4] = $(this).attr("data-nombreLote");
            getInfo6A[5] = $(this).attr("data-idLote");
            getInfo6A[6] = $(this).attr("data-fechavenc");

            nombreLote = $(this).data("nomlote");
            $(".lote").html(nombreLote);


            $('#modal4').modal('show');

        });



        $(document).on("click", ".getInfo2_3", function(e){
            e.preventDefault();

            getInfo2_3A[0] = $(this).attr("data-idCliente");
            getInfo2_3A[1] = $(this).attr("data-nombreResidencial");
            getInfo2_3A[2] = $(this).attr("data-nombreCondominio");
            getInfo2_3A[3] = $(this).attr("data-idCondominio");
            getInfo2_3A[4] = $(this).attr("data-nombreLote");
            getInfo2_3A[5] = $(this).attr("data-idLote");
            getInfo2_3A[6] = $(this).attr("data-fechavenc");

            nombreLote = $(this).data("nomlote");
            $(".lote").html(nombreLote);


            $('#modal5').modal('show');

        });


        $(document).on("click", ".getInfo2_7", function(e){
            e.preventDefault();

            getInfo2_7A[0] = $(this).attr("data-idCliente");
            getInfo2_7A[1] = $(this).attr("data-nombreResidencial");
            getInfo2_7A[2] = $(this).attr("data-nombreCondominio");
            getInfo2_7A[3] = $(this).attr("data-idCondominio");
            getInfo2_7A[4] = $(this).attr("data-nombreLote");
            getInfo2_7A[5] = $(this).attr("data-idLote");
            getInfo2_7A[6] = $(this).attr("data-fechavenc");

            nombreLote = $(this).data("nomlote");
            $(".lote").html(nombreLote);

            $('#modal6').modal('show');

        });



        $(document).on("click", ".getInfo5_2", function(e){
            e.preventDefault();

            getInfo5_2A[0] = $(this).attr("data-idCliente");
            getInfo5_2A[1] = $(this).attr("data-nombreResidencial");
            getInfo5_2A[2] = $(this).attr("data-nombreCondominio");
            getInfo5_2A[3] = $(this).attr("data-idCondominio");
            getInfo5_2A[4] = $(this).attr("data-nombreLote");
            getInfo5_2A[5] = $(this).attr("data-idLote");
            getInfo5_2A[6] = $(this).attr("data-fechavenc");

            nombreLote = $(this).data("nomlote");
            $(".lote").html(nombreLote);

            $('#modal7').modal('show');

        });


    });




    $(document).on('click', '#save1', function(e) {
        e.preventDefault();

        var comentario = $("#comentario").val();

        var validaComent = ($("#comentario").val().length == 0) ? 0 : 1;

        var dataExp1 = new FormData();

        dataExp1.append("idCliente", getInfo2A[0]);
        dataExp1.append("nombreResidencial", getInfo2A[1]);
        dataExp1.append("nombreCondominio", getInfo2A[2]);
        dataExp1.append("idCondominio", getInfo2A[3]);
        dataExp1.append("nombreLote", getInfo2A[4]);
        dataExp1.append("idLote", getInfo2A[5]);
        dataExp1.append("comentario", comentario);
        dataExp1.append("fechaVenc", getInfo2A[6]);

        if (validaComent == 0) {
            alerts.showNotification("top", "right", "Ingresa un comentario.", "danger");
        }

        if (validaComent == 1) {

            $('#save1').prop('disabled', true);
            $.ajax({
                url : '<?=base_url()?>index.php/asesor/intExpAsesor/',
                data: dataExp1,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    response = JSON.parse(data);

                    if(response.message == 'OK') {
                        $('#save1').prop('disabled', false);
                        $('#modal1').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Estatus enviado.", "success");
                    } else if(response.message == 'MISSING_DOCUMENTS'){
                        $('#save1').prop('disabled', false);
                        $('#modal1').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Asegúrate de incluir los documentos; IDENTIFICACIÓN OFICIAL, COMPROBANTE DE DOMICILIO y DEPÓSITO DE SERIEDAD antes de llevar a cabo el avance.", "danger");
                    } else if(response.message == 'FALSE'){
                        $('#save1').prop('disabled', false);
                        $('#modal1').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "El status ya fue registrado.", "danger");
                    } else if(response.message == 'ERROR'){
                        $('#save1').prop('disabled', false);
                        $('#modal1').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                    }
                },
                error: function( data ){
                    $('#save1').prop('disabled', false);
                    $('#modal1').modal('hide');
                    $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                    alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                }
            });

        }

    });




    $(document).on('click', '#save2', function(e) {
        e.preventDefault();

        var comentario = $("#comentario2").val();

        var validaComent = ($("#comentario2").val().length == 0) ? 0 : 1;

        var dataExp2 = new FormData();

        dataExp2.append("idCliente", getInfo2_2A[0]);
        dataExp2.append("nombreResidencial", getInfo2_2A[1]);
        dataExp2.append("nombreCondominio", getInfo2_2A[2]);
        dataExp2.append("idCondominio", getInfo2_2A[3]);
        dataExp2.append("nombreLote", getInfo2_2A[4]);
        dataExp2.append("idLote", getInfo2_2A[5]);
        dataExp2.append("comentario", comentario);
        dataExp2.append("fechaVenc", getInfo2_2A[6]);

        if (validaComent == 0) {
            alerts.showNotification("top", "right", "Ingresa un comentario.", "danger");
        }

        if (validaComent == 1) {

            $('#save2').prop('disabled', true);
            $.ajax({
                url : '<?=base_url()?>index.php/asesor/intExpAsesor/',
                data: dataExp2,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    response = JSON.parse(data);

                    if(response.message == 'OK') {
                        $('#save2').prop('disabled', false);
                        $('#modal2').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Estatus enviado.", "success");
                    } else if(response.message == 'MISSING_DOCUMENTS'){
                        $('#save1').prop('disabled', false);
                        $('#modal1').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Asegúrate de incluir los documentos; IDENTIFICACIÓN OFICIAL, COMPROBANTE DE DOMICILIO y DEPÓSITO DE SERIEDAD antes de llevar a cabo el avance.", "danger");
                    } else if(response.message == 'FALSE'){
                        $('#save2').prop('disabled', false);
                        $('#modal2').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "El status ya fue registrado.", "danger");
                    } else if(response.message == 'ERROR'){
                        $('#save2').prop('disabled', false);
                        $('#modal2').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                    }
                },
                error: function( data ){
                    $('#save2').prop('disabled', false);
                    $('#modal2').modal('hide');
                    $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                    alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                }
            });

        }

    });








    $(document).on('click', '#save3', function(e) {
        e.preventDefault();

        var comentario = $("#comentario3").val();

        var validaComent = ($("#comentario3").val().length == 0) ? 0 : 1;

        var dataExp3 = new FormData();

        dataExp3.append("idCliente", getInfo5A[0]);
        dataExp3.append("nombreResidencial", getInfo5A[1]);
        dataExp3.append("nombreCondominio", getInfo5A[2]);
        dataExp3.append("idCondominio", getInfo5A[3]);
        dataExp3.append("nombreLote", getInfo5A[4]);
        dataExp3.append("idLote", getInfo5A[5]);
        dataExp3.append("comentario", comentario);
        dataExp3.append("fechaVenc", getInfo5A[6]);


        if (validaComent == 0) {
            alerts.showNotification("top", "right", "Ingresa un comentario.", "danger");
        }

        if (validaComent == 1) {
            $('#save3').prop('disabled', true);
            $.ajax({
                url : '<?=base_url()?>index.php/asesor/editar_registro_loteRevision_asistentesAContraloria_proceceso2/',
                data: dataExp3,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    response = JSON.parse(data);
                    if(response.message == 'OK') {
                        $('#save3').prop('disabled', false);
                        $('#modal3').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Estatus enviado.", "success");
                    } else if(response.message == 'FALSE'){
                        $('#save3').prop('disabled', false);
                        $('#modal3').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "El status ya fue registrado.", "danger");
                    } else if(response.message == 'ERROR'){
                        $('#save3').prop('disabled', false);
                        $('#modal3').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                    }
                },
                error: function( data ){
                    $('#save3').prop('disabled', false);
                    $('#modal3').modal('hide');
                    $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                    alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                }
            });
        }
    });






    $(document).on('click', '#save4', function(e) {
        e.preventDefault();

        var comentario = $("#comentario4").val();

        var validaComent = ($("#comentario4").val().length == 0) ? 0 : 1;

        var dataExp4 = new FormData();

        dataExp4.append("idCliente", getInfo6A[0]);
        dataExp4.append("nombreResidencial", getInfo6A[1]);
        dataExp4.append("nombreCondominio", getInfo6A[2]);
        dataExp4.append("idCondominio", getInfo6A[3]);
        dataExp4.append("nombreLote", getInfo6A[4]);
        dataExp4.append("idLote", getInfo6A[5]);
        dataExp4.append("comentario", comentario);
        dataExp4.append("fechaVenc", getInfo6A[6]);


        if (validaComent == 0) {
            alerts.showNotification("top", "right", "Ingresa un comentario.", "danger");
        }

        if (validaComent == 1) {
            $('#save4').prop('disabled', true);
            $.ajax({
                url : '<?=base_url()?>index.php/asesor/editar_registro_loteRevision_asistentesAContraloria6_proceceso2/',
                data: dataExp4,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    response = JSON.parse(data);
                    if(response.message == 'OK') {
                        $('#save4').prop('disabled', false);
                        $('#modal4').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Estatus enviado.", "success");
                    } else if(response.message == 'FALSE'){
                        $('#save4').prop('disabled', false);
                        $('#modal4').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "El status ya fue registrado.", "danger");
                    } else if(response.message == 'ERROR'){
                        $('#save4').prop('disabled', false);
                        $('#modal4').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                    }
                },
                error: function( data ){
                    $('#save4').prop('disabled', false);
                    $('#modal4').modal('hide');
                    $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                    alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                }
            });
        }
    });



    $(document).on('click', '#save5', function(e) {
        e.preventDefault();

        var comentario = $("#comentario5").val();

        var validaComent = ($("#comentario5").val().length == 0) ? 0 : 1;

        var dataExp5 = new FormData();

        dataExp5.append("idCliente", getInfo2_3A[0]);
        dataExp5.append("nombreResidencial", getInfo2_3A[1]);
        dataExp5.append("nombreCondominio", getInfo2_3A[2]);
        dataExp5.append("idCondominio", getInfo2_3A[3]);
        dataExp5.append("nombreLote", getInfo2_3A[4]);
        dataExp5.append("idLote", getInfo2_3A[5]);
        dataExp5.append("comentario", comentario);
        dataExp5.append("fechaVenc", getInfo2_3A[6]);


        if (validaComent == 0) {
            alerts.showNotification("top", "right", "Ingresa un comentario.", "danger");
        }

        if (validaComent == 1) {
            $('#save5').prop('disabled', true);
            $.ajax({
                url : '<?=base_url()?>index.php/asesor/editar_registro_loteRevision_eliteAcontraloria5_proceceso2/',
                data: dataExp5,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    response = JSON.parse(data);
                    if(response.message == 'OK') {
                        $('#save5').prop('disabled', false);
                        $('#modal5').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Estatus enviado.", "success");
                    } else if(response.message == 'FALSE'){
                        $('#save5').prop('disabled', false);
                        $('#modal5').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "El status ya fue registrado.", "danger");
                    } else if(response.message == 'ERROR'){
                        $('#save5').prop('disabled', false);
                        $('#modal5').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                    }
                },
                error: function( data ){
                    $('#save5').prop('disabled', false);
                    $('#modal5').modal('hide');
                    $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                    alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                }
            });
        }
    });


    $(document).on('click', '#save6', function(e) {
        e.preventDefault();

        var comentario = $("#comentario6").val();

        var validaComent = ($("#comentario6").val().length == 0) ? 0 : 1;

        var dataExp6 = new FormData();

        dataExp6.append("idCliente", getInfo2_7A[0]);
        dataExp6.append("nombreResidencial", getInfo2_7A[1]);
        dataExp6.append("nombreCondominio", getInfo2_7A[2]);
        dataExp6.append("idCondominio", getInfo2_7A[3]);
        dataExp6.append("nombreLote", getInfo2_7A[4]);
        dataExp6.append("idLote", getInfo2_7A[5]);
        dataExp6.append("comentario", comentario);
        dataExp6.append("fechaVenc", getInfo2_7A[6]);


        if (validaComent == 0) {
            alerts.showNotification("top", "right", "Ingresa un comentario.", "danger");
        }

        if (validaComent == 1) {
            $('#save6').prop('disabled', true);
            $.ajax({
                url : '<?=base_url()?>index.php/asesor/envioRevisionAsesor2aJuridico7/',
                data: dataExp6,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    response = JSON.parse(data);
                    if(response.message == 'OK') {
                        $('#save6').prop('disabled', false);
                        $('#modal6').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Estatus enviado.", "success");
                    } else if(response.message == 'FALSE'){
                        $('#save6').prop('disabled', false);
                        $('#modal6').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "El status ya fue registrado.", "danger");
                    } else if(response.message == 'ERROR'){
                        $('#save6').prop('disabled', false);
                        $('#modal6').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                    }
                },
                error: function( data ){
                    $('#save6').prop('disabled', false);
                    $('#modal6').modal('hide');
                    $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                    alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                }
            });
        }
    });



    $(document).on('click', '#save7', function(e) {
        e.preventDefault();

        var comentario = $("#comentario7").val();

        var validaComent = ($("#comentario7").val().length == 0) ? 0 : 1;

        var dataExp7 = new FormData();

        dataExp7.append("idCliente", getInfo5_2A[0]);
        dataExp7.append("nombreResidencial", getInfo5_2A[1]);
        dataExp7.append("nombreCondominio", getInfo5_2A[2]);
        dataExp7.append("idCondominio", getInfo5_2A[3]);
        dataExp7.append("nombreLote", getInfo5_2A[4]);
        dataExp7.append("idLote", getInfo5_2A[5]);
        dataExp7.append("comentario", comentario);
        dataExp7.append("fechaVenc", getInfo5_2A[6]);


        if (validaComent == 0) {
            alerts.showNotification("top", "right", "Ingresa un comentario.", "danger");
        }

        if (validaComent == 1) {
            $('#save7').prop('disabled', true);
            $.ajax({
                url : '<?=base_url()?>index.php/asesor/editar_registro_loteRevision_eliteAcontraloria5_proceceso2_2/',
                data: dataExp7,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    response = JSON.parse(data);
                    if(response.message == 'OK') {
                        $('#save7').prop('disabled', false);
                        $('#modal7').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Estatus enviado.", "success");
                    } else if(response.message == 'FALSE'){
                        $('#save7').prop('disabled', false);
                        $('#modal7').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "El status ya fue registrado.", "danger");
                    } else if(response.message == 'ERROR'){
                        $('#save7').prop('disabled', false);
                        $('#modal7').modal('hide');
                        $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                        alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                    }
                },
                error: function( data ){
                    $('#save7').prop('disabled', false);
                    $('#modal7').modal('hide');
                    $('#tabla_deposito_seriedad').DataTable().ajax.reload();
                    alerts.showNotification("top", "right", "Error al enviar la solicitud.", "danger");
                }
            });
        }
    });





    jQuery(document).ready(function(){


        jQuery('#modal1').on('hidden.bs.modal', function (e) {
            jQuery(this).removeData('bs.modal');
            jQuery(this).find('#comentario').val('');
        })

        jQuery('#modal2').on('hidden.bs.modal', function (e) {
            jQuery(this).removeData('bs.modal');
            jQuery(this).find('#comentario2').val('');
        })

        jQuery('#modal3').on('hidden.bs.modal', function (e) {
            jQuery(this).removeData('bs.modal');
            jQuery(this).find('#comentario3').val('');
        })

        jQuery('#modal4').on('hidden.bs.modal', function (e) {
            jQuery(this).removeData('bs.modal');
            jQuery(this).find('#comentario4').val('');
        })

        jQuery('#modal5').on('hidden.bs.modal', function (e) {
            jQuery(this).removeData('bs.modal');
            jQuery(this).find('#comentario5').val('');
        })

        jQuery('#modal6').on('hidden.bs.modal', function (e) {
            jQuery(this).removeData('bs.modal');
            jQuery(this).find('#comentario6').val('');
        })

        jQuery('#modal7').on('hidden.bs.modal', function (e) {
            jQuery(this).removeData('bs.modal');
            jQuery(this).find('#comentario7').val('');
        })

    })

</script>

