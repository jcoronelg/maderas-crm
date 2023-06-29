<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link href="<?= base_url() ?>dist/css/datatableNFilters.css" rel="stylesheet" />
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>

<body>
    <div class="wrapper">
        <?php
        if (in_array($this->session->userdata('id_rol'), array('1', '2', '3', '4', '7', '9', '17', '18', '28', '31', '32', '63', '70'))) {
            $this->load->view('template/sidebar');
        } else {
            echo '<script>alert("ACCESSO DENEGADO"); window.location.href="' . base_url() . '";</script>';
        }
        ?>

        <div class="modal fade" id="seeInformationModalAsimilados" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons" onclick="cleanCommentsAsimilados()">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist" style="background: #949494;">
                                <div id="nameLote"></div>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="changelogTab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-plain">
                                                <div class="card-content">
                                                    <ul class="timeline timeline-simple" id="comments-list-asimilados"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal" onclick="cleanCommentsAsimilados()"><b>Cerrar</b></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-alertas" id="modal_nuevas" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="post" id="form_interes">
                        <div class="modal-body"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-alertas" id="modal_informacion" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                        <h3 class="text-center">Detalle</h3>
                    </div>
                    <div class="modal-body">
                        <div class="material-datatables">
                            <div class="form-group">
                                <table class="table-striped table-hover" id="tabla_modal" name="tabla_modal">
                                    <thead>
                                        <tr>
                                            <th>ID PAGO</th>
                                            <th>LOTE</th>
                                            <th>MONTO</th>
                                            <th>FECHA APLICADO</th>
                                            <th>MONTO ANTERIOR</th>
                                            <th>ESTATUS</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content boxContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col xol-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="nav nav-tabs nav-tabs-cm">
                            <li class="active">
                                <a href="#solicitudesCRM" role="tab" data-toggle="tab">CRM por lotes</a>
                            </li>

<<<<<<< HEAD
                            <li><a href="#solicitudesCanceladas" role="tab" data-toggle="tab">Historial Canceladas</a>
=======
                            <li>
                                <a href="#solicitudesCanceladas" role="tab" data-toggle="tab">CRM por lotes</a>
>>>>>>> ff689f3fe4e968e59d364cb441ab472f7e3aad44
                            </li>

                            <?php if ($this->session->userdata('id_rol') == 1 || $this->session->userdata('id_rol') == 2 || $this->session->userdata('id_rol') == 3 || $this->session->userdata('id_rol') == 7 || $this->session->userdata('id_rol') == 9) { ?>
                                <li>
                                    <a href="#solicitudesSUMA" role="tab" data-toggle="tab">Historial SUMA</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="card no-shadow m-0">
                            <div class="card-content p-0">
                                <div class="nav-tabs-custom">
                                    <div class="tab-content p-2">
                                        <div class="tab-pane active" id="solicitudesCRM">
                                            <div class="encabezadoBox">
                                                <h3 class="card-title center-align">Historial Activos</h3>
                                                <p class="card-title pl-1">(Listado de todos los pagos aplicados, en proceso de lotes contratados y activos)</p>
                                            </div>
                                            <div class="toolbar">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
<<<<<<< HEAD
                                                        <div class="form-group  select-is-empty">
                                                            <label class="control-label">
                                                                AÑO
                                                            </label>
                                                            <select name="filtro33" 
                                                                    id="filtro33" 
                                                                    class="selectpicker select-gral"
                                                                    data-style="btn" 
                                                                    data-show-subtext="true" 
                                                                    data-live-search="true" 
                                                                    title="Selecciona una opción"
                                                                    data-size="7"
                                                                    required>
=======
                                                        <div class="form-group label-floating select-is-empty">
                                                            <label class="control-label">AÑO</label>
                                                            <select name="filtro33" id="filtro33" class="selectpicker select-gral" data-style="btn" data-show-subtext="true" data-live-search="true" title="Selecciona una opción" data-size="7" required>
>>>>>>> ff689f3fe4e968e59d364cb441ab472f7e3aad44
                                                                <?php
                                                                setlocale(LC_ALL, 'es_ES');
                                                                for ($i = 2019; $i <= 2023; $i++) {
                                                                    $yearName  = $i;
                                                                    echo '<option value="' . $i . '">' . $yearName . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                                        <div class="form-group  select-is-empty">
                                                            <label for="proyecto" class="control-label">PROYECTO</label>
                                                            <select name="filtro44" id="filtro44" class="selectpicker select-gral" data-style="btn" data-show-subtext="true" data-live-search="true" title="Selecciona una opción" data-size="7" required></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="material-datatables">
                                                <div class="form-group">
<<<<<<< HEAD
                                                    <div class="table-responsive">
                                                        <table class="table-striped table-hover hide " id="tabla_historialGral" name="tabla_historialGral">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>PROYECTO</th>
                                                                    <th>CONDOMINIO</th>
                                                                    <th>LOTE</th>
                                                                    <th>REFERENCIA</th>
                                                                    <th>PRECIO LOTE</th>
                                                                    <th>TOTAL COMISIÓN</th>
                                                                    <th>PAGO CLIENTE</th>
                                                                    <th>DISPERSADO</th>
                                                                    <th>PAGADO</th>
                                                                    <th>PENDIENTE</th>
                                                                    <th>USUARIO</th>
                                                                    <th>PUESTO</th>
                                                                    <th>DETALLE</th>
                                                                    <th>ESTATUS</th>
                                                                    <th>MÁS</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
=======
                                                    <table class="table-striped table-hover" id="tabla_historialGral" name="tabla_historialGral">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>PROYECTO</th>
                                                                <th>CONDOMINIO</th>
                                                                <th>LOTE</th>
                                                                <th>REFERENCIA</th>
                                                                <th>PRECIO LOTE</th>
                                                                <th>TOTAL COMISIÓN</th>
                                                                <th>PAGO CLIENTE</th>
                                                                <th>DISPERSADO</th>
                                                                <th>PAGADO</th>
                                                                <th>PENDIENTE</th>
                                                                <th>USUARIO</th>
                                                                <th>PUESTO</th>
                                                                <th>DETALLE</th>
                                                                <th>ESTATUS</th>
                                                                <th>MÁS</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
>>>>>>> ff689f3fe4e968e59d364cb441ab472f7e3aad44
                                                </div>
                                            </div>
                                        </div>

                                        <!-- INICIO tab CANCELADAS validado -->

                                        <div class="tab-pane" id="solicitudesCanceladas">
                                            <div class="encabezadoBox">
                                                <h3 class="card-title center-align">Historial Canceladas</h3>
                                                <p class="card-title pl-1">(Listado de todos los pagos aplicados, en proceso de lotes cancelados con recisión)</p>
                                            </div>
                                            <div class="toolbar">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="proyecto">Año</label>
                                                            <select name="filtro35" id="filtro35" class="selectpicker select-gral" data-style="btn " data-show-subtext="true" data-live-search="true" title="Selecciona año" data-size="7" required>
                                                                <?php
                                                                setlocale(LC_ALL, 'es_ES');
                                                                for ($i = 2019; $i <= 2023; $i++) {
                                                                    $yearName  = $i;
                                                                    echo '<option value="' . $i . '">' . $yearName . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                                        <div class="form-group">
                                                            <label for="proyecto">Proyecto</label>
                                                            <select name="filtro45" id="filtro45" class="selectpicker select-gral" data-style="btn " data-show-subtext="true" data-live-search="true" title="Selecciona un proyecto" data-size="7" required>
                                                                <option value="0">Seleccione todo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="material-datatables">
                                                <div class="form-group">
<<<<<<< HEAD
                                                    <div class="table-responsive">
                                                        <table class="table-striped table-hover hide " id="tabla_comisiones_canceladas" name="tabla_comisiones_canceladas">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>PROYECTO</th>
                                                                    <th>CONDOMINIO</th>
                                                                    <th>LOTE</th>
                                                                    <th>REFERENCIA</th>
                                                                    <th>PRECIO LOTE</th>
                                                                    <th>TOTAL COMISIÓN</th>
                                                                    <th>PAGO CLIENTE</th>
                                                                    <th>DISPERSADO</th>
                                                                    <th>PAGADO</th>
                                                                    <th>PENDIENTE</th>
                                                                    <th>USUARIO</th>
                                                                    <th>PUESTO</th>
                                                                    <th>DETALLE</th>
                                                                    <th>ESTATUS</th>
                                                                    <th>MÁS</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
=======
                                                    <table class="table-striped table-hover" id="tabla_comisiones_canceladas" name="tabla_comisiones_canceladas">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>PROYECTO</th>
                                                                <th>CONDOMINIO</th>
                                                                <th>LOTE</th>
                                                                <th>REFERENCIA</th>
                                                                <th>PRECIO LOTE</th>
                                                                <th>TOTAL COMISIÓN</th>
                                                                <th>PAGO CLIENTE</th>
                                                                <th>DISPERSADO</th>
                                                                <th>PAGADO</th>
                                                                <th>PENDIENTE</th>
                                                                <th>USUARIO</th>
                                                                <th>PUESTO</th>
                                                                <th>DETALLE</th>
                                                                <th>ESTATUS</th>
                                                                <th>MÁS</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
>>>>>>> ff689f3fe4e968e59d364cb441ab472f7e3aad44
                                                </div>
                                            </div>
                                        </div><!-- End tab CANCELADAS validado -->


                                        <?php if ($this->session->userdata('id_rol') == 1 || $this->session->userdata('id_rol') == 2 || $this->session->userdata('id_rol') == 3 || $this->session->userdata('id_rol') == 7 || $this->session->userdata('id_rol') == 9) { ?>
                                            <div class="tab-pane" id="solicitudesSUMA">
                                                <div class="encabezadoBox">
                                                    <h3 class="card-title center-align">Historial general SUMA</h3>
                                                </div>
                                                <div class="toolbar">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
<<<<<<< HEAD
                                                            <div class="form-group  select-is-empty">
                                                                <label for="anio" class="control-label">
                                                                    AÑO
                                                                </label>
                                                                <select name="anio"
                                                                        id="anio"
                                                                        class="selectpicker select-gral"
                                                                        data-style="btn"
                                                                        data-show-subtext="true" 
                                                                        data-live-search="true"
                                                                        title="Selecciona una opción"
                                                                        data-size="7"
                                                                        required>
                                                                </select>
=======
                                                            <div class="form-group label-floating select-is-empty">
                                                                <label for="anio" class="control-label">AÑO</label>
                                                                <select name="anio" id="anio" class="selectpicker select-gral" data-style="btn" data-show-subtext="true" data-live-search="true" title="Selecciona una opción" data-size="7" required></select>
>>>>>>> ff689f3fe4e968e59d364cb441ab472f7e3aad44
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="material-datatables">
                                                    <div class="form-group">
<<<<<<< HEAD
                                                        <div class="table-responsive">
                                                            <table class="table-striped table-hover hide" id="tabla_comisiones_suma" name="tabla_comisiones_suma">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID PAGO</th>
                                                                        <th>REFERENCIA</th>
                                                                        <th>NOMBRE</th>
                                                                        <th>SEDE</th>
                                                                        <th>FORMA PAGO</th>
                                                                        <th>TOTAL COMISION</th>
                                                                        <th>IMPUESTO</th>
                                                                        <th>% COMISION</th>
                                                                        <th>ESTATUS</th>
                                                                        <th>MÁS</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
=======
                                                        <table class="table-striped table-hover" id="tabla_comisiones_suma" name="tabla_comisiones_suma">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID PAGO</th>
                                                                    <th>REFERENCIA</th>
                                                                    <th>NOMBRE</th>
                                                                    <th>SEDE</th>
                                                                    <th>FORMA PAGO</th>
                                                                    <th>TOTAL COMISION</th>
                                                                    <th>IMPUESTO</th>
                                                                    <th>% COMISION</th>
                                                                    <th>ESTATUS</th>
                                                                    <th>MÁS</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
>>>>>>> ff689f3fe4e968e59d364cb441ab472f7e3aad44
                                                    </div>
                                                </div>
                                            </div><!-- End tab SUMA  validado solo para ventas-->
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('template/footer_legend'); ?>
    </div>
    </div><!--main-panel close-->

    <?php $this->load->view('template/footer'); ?>
    <!--DATATABLE BUTTONS DATA EXPORT-->
    <script src="<?= base_url()?>dist/js/funciones-generales.js"></script>
    <script src="<?= base_url() ?>dist/js/controllers/comisiones/historial_colaborador.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

</body>