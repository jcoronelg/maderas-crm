<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link href="<?= base_url() ?>dist/css/datatableNFilters.css" rel="stylesheet"/>
<body>
    <div class="wrapper">
        <?php
            if (in_array($this->session->userdata('id_rol'), array(13,17,32,11,70))){
                $this->load->view('template/sidebar');
            }
            else{
                echo '<script>alert("ACCESSO DENEGADO"); window.location.href="' . base_url() . '";</script>';
            }
        ?>

        <div class="content boxContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col xol-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="goldMaderas">
                                <i class="fas fa-wallet fa-2x"></i>
                            </div>
                            <div class="card-content">
                                <div class="encabezadoBox">
                                    <h3 class="card-title center-align" >Estatus comisiones</h3>
                                    <p class="card-title pl-1">(Comisiones sin pago reflejado en NEODATA)</p>
                                </div>
                                <div class="toolbar">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label class="m-0" for="proyecto">Proyecto</label>
                                                    <select name="proyecto" id="proyecto" class="selectpicker select-gral" data-style="btn btn-second"data-show-subtext="true" data-live-search="true" title="Selecciona una opción" data-size="7" required>
                                                        <option value="0">Selecciona una opción</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label class="m-0" for="condominio">Condominio</label>
                                                    <select name="condominio" id="condominio" class="selectpicker select-gral" data-style="btn btn-second"data-show-subtext="true" data-live-search="true"  title="Selecciona una opción" data-size="7" required>
                                                        <option disabled selected>Selecciona una opción</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="material-datatables">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            <table class="table-striped table-hover" id="tabla_comisiones_sin_pago" name="tabla_comisiones_sin_pago">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>PROYECTO</th>
                                                        <th>CONDOMINIO</th>
                                                        <th>LOTE</th>
                                                        <th>CLIENTE</th>
                                                        <th>ASESOR</th>
                                                        <th>COORDINADOR</|th>
                                                        <th>GERENTE</th>
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
                </div>
            </div>
        </div>
        <?php $this->load->view('template/footer_legend'); ?>
    </div>
    </div>
    <!--main-panel close-->

    <?php $this->load->view('template/footer'); ?>
    <!--DATATABLE BUTTONS DATA EXPORT-->

    <script>
        userType = <?= $this->session->userdata('id_rol') ?> ;     
        var url = "<?= base_url() ?>";
        var url2 = url;
    </script>

    <script src="<?= base_url() ?>dist/js/controllers/comisiones/commissions_without_payment.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

</body>