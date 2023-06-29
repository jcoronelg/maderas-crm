
<!--<link href="--><?//= base_url() ?><!--dist/assets/css/datatableNFilters.css" rel="stylesheet"/>-->
<link href="<?= base_url() ?>dist/css/datatableNFilters.css" rel="stylesheet"/>
<link href="<?=base_url()?>dist/js/controllers/files/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<body class="">
<style>
    .active-pill{
        padding: 3px 20px;
        color: white;
        background-color: #34c759;
        border-radius: 12px;
        font-size: 0.8em;
    }
    .inactive-pill{
        padding: 3px 20px;
        color: white;
        background-color: #ff3b30;
        border-radius: 12px;
        font-size: 0.8em;
    }
</style>
<div class="wrapper ">
    <?php
    //se debe validar que tipo de perfil esta sesionado para poder asignarle el tipo de sidebar
    switch ($this->session->userdata('id_rol')) {
        case '2': // SUB VENTAS
        case '3': // GERENTE VENTAS
        case '4': // ASISTENTE DIRECCIÓN COMERCIAL
        case '5': // ASISTENTE SUBDIRECCIÓN COMERCIAL
        case '6': // ASISTENTE GERENCIA COMERCIAL
        case '7': // ASESOR
        case '9': // COORDINADOR
        case '11': // ADMINISTRACIÓN
        case '12': // CAJA
        case '13': // CONTRALORÍA
        case '15': // JURÍDICO
        case '16': // CONTRATACIÓN
        case '17': // contraloria
        case '28': // EJECUTIVO ADMINISTRATIVO MKTD
        case '32': // CONTRALORÍA CORPORATIVA
        case '33': // CONSULTA
        case '34': // FACTURACIÓN
        case '39': // CONTABILIDAD
        case '50': // GENERALISTA MKTD
        case '40': // COBRANZA
        case '53': // analista comisisones
            $datos = array();
            $datos = $datos4;
            $datos = $datos2;
            $datos = $datos3;
            $this->load->view('template/sidebar', $datos);
            break;

        default:
            echo '<script>alert("ACCESSO DENEGADO"); window.location.href="'.base_url().'";</script>';
            break;
    }
    ?>
    <!--Contenido de la página-->



    <div class="modal fade" id="avisoModal" >
        <div class="modal-dialog">
            <div class="modal-content" >
                <div class="modal-header">
                    <center><h3 class="modal-title">¡Ya existe una corrida financiera activa!</h3></center>
                </div>
                <div class="modal-body">
                    <div class="container-fluid pdt-50">
                        <div class="row centered center-align">
                            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-2">
                                <h1 class="modal-title"> <i class="fa fa-exclamation-triangle fa-1x" aria-hidden="true"></i></h1><br><br>
                            </div>
                            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-10">
                                <h3 class="modal-title" style="font-size: 2em">Actualmente ya hay una corrida financiera para este lote</h3>
                                <h5 style="font-size: 1.5rem"><i> Puedes deshabilitar la corrida financiera actual, para habilitar la corrida financiera deseada</i></h5>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <br><br>
                    <!--<button type="button" id="aceptoDelete" class="btn btn-primary"> Si, borrar </button>-->
                    <!--<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"> Cancelar </button>-->
                    <button type="button" class="btn btn-simple" data-dismiss="modal"> Aceptar </button>
                </div>
            </div>
        </div>
    </div>

    <div class="content boxContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="gray"
                             style=" background: linear-gradient(45deg, #AEA16E, #96843D);">
                            <i class="material-icons">reorder</i>
                        </div>
                        <div class="card-content" style="padding: 50px 20px;">
                            <h4 class="card-title"></h4>
                            <div class="toolbar">
                                <h3 class="card-title center-align">Corridas Financieras por lote</h3>
                                <div class="container-fluid" style="padding: 20px 0px;">
                                    <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group label-floating select-is-empty">
                                            <label class="control-label">Proyecto</label>
                                            <select name="filtro3" id="filtro3"
                                                    class="selectpicker select-gral m-0"
                                                    data-style="btn" data-show-subtext="true"
                                                    data-live-search="true"
                                                    title="Selecciona un proyecto" data-size="7" required>
                                                <?php
                                                if ($residencial != NULL) :
                                                    foreach ($residencial as $fila) : ?>
                                                        <option value=<?= $fila['idResidencial'] ?>> <?= $fila['descripcion'] ?> </option>
                                                    <?php endforeach;
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group label-floating select-is-empty">
                                            <label class="control-label">Condominio</label>
                                            <select id="filtro4" name="filtro4"
                                                    class="selectpicker select-gral m-0"
                                                    data-style="btn" data-show-subtext="true"
                                                    data-live-search="true"
                                                    title="Selecciona un condominio" data-size="7" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group label-floating select-is-empty">
                                            <label class="control-label">Lote</label>
                                            <select id="filtro5" name="filtro5"
                                                    class="selectpicker select-gral m-0"
                                                    data-style="btn" data-show-subtext="true"
                                                    data-live-search="true"
                                                    title="Selecciona un lote" data-size="7" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>

                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table id="tableDoct" class="table-striped table-hover" width="100%"
                                           style="text-align:center;">
                                        <thead>
                                        <tr>
                                            <th class="text-center">ID CORRIDA</th>
                                            <th class="text-center">ESTATUS</th>
                                            <th class="text-center">PROYECTO</th>
                                            <th class="text-center">CONDOMINIO</th>
                                            <th class="text-center">ID LOTE</th>
                                            <th class="text-center">LOTE</th>
                                            <th class="text-center">CLIENTE</th>
                                            <th class="text-center">HORA/FECHA</th>
                                            <th class="text-center">RESPONSABLE</th>
                                            <!--<th class="text-center">UBICACIÓN</th>-->
                                            <th class="text-center">CORRIDA FINANCIERA</th>
                                            <?php if($this->session->userdata('id_rol') == 17 || $this->session->userdata('id_rol') == 32){?>
                                            <?php }else{?>
                                                <th class="text-center">ESTATUS </th>
                                            <?php }?>
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
<link rel="stylesheet" type="text/css" href="<?=base_url()?>static/css/shadowbox.css">
<script type="text/javascript" src="<?=base_url()?>static/js/shadowbox.js"></script>
<script src="<?= base_url() ?>dist/assets/js/dataTables.select.js"></script>
<script src="<?= base_url() ?>dist/assets/js/dataTables.select.min.js"></script>
<script type="text/javascript">
    Shadowbox.init();
</script>
<script>
    var id_rol_current = <?php echo $this->session->userdata('id_rol')?>;
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
                success:function(response){
                    var len = response.length;
                    for( var i = 0; i<len; i++)
                    {
                        var id = response[i]['idCondominio'];
                        var name = response[i]['nombre'];
                        $("#filtro4").append($('<option>').val(id).text(name));
                    }
                    $("#filtro4").selectpicker('refresh');

                }
            });
        });

        $('#filtro4').change(function(){
            var residencial = $('#filtro3').val();
            var valorSeleccionado = $(this).val();
            $("#filtro5").empty().selectpicker('refresh');
            $.ajax({
                url: '<?=base_url()?>Corrida/getLotesWCF/'+valorSeleccionado+'/'+residencial,
                type: 'post',
                dataType: 'json',
                success:function(response){
                    console.log("back: ", response);
                    var len = response.length;
                    for( var i = 0; i<len; i++)
                    {
                        var datos = response[i]['idLote']+','+response[i]['venta_compartida'];
                        var name = response[i]['nombreLote'];
                        /*let datos = datos.split(',');
                        let id = datos[0];*/

                        $("#filtro5").append($('<option>').val(datos).text(name));
                    }
                    $("#filtro5").selectpicker('refresh');

                },
                //async: false
            });
        });



        let titulos_intxt = [];
        $('#tableDoct thead tr:eq(0) th').each( function (i) {
            $(this).css('text-align', 'center');
            var title = $(this).text();
            titulos_intxt.push(title);
            $(this).html('<input type="text" class="textoshead"  placeholder="'+title+'"/>' );
            $( 'input', this ).on('keyup change', function () {
                if ($('#tableDoct').DataTable().column(i).search() !== this.value ) {
                    $('#tableDoct').DataTable()
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#filtro5').change(function(){

            var seleccion = $(this).val();
            let datos = seleccion.split(',');
            let valorSeleccionado=datos[0];
            let ventaC = datos[1];
            //alert(ventaC);



            console.log("selección:  ", valorSeleccionado);




            $('#tableDoct').DataTable({
                destroy: true,
                lengthMenu: [[15, 25, 50, -1], [10, 25, 50, "All"]],
                "ajax":
                    {
                        "url": '<?=base_url()?>index.php/Corrida/getCorridasByLote/'+valorSeleccionado,
                        "dataSrc": ""
                    },
                dom: 'Brt'+ "<'row'<'col-12 col-sm-12 col-md-6 col-lg-6'i><'col-12 col-sm-12 col-md-6 col-lg-6'p>>",
                width: "auto",
                "ordering": false,
                "buttons": [
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        className: 'btn buttons-excel',
                        titleAttr: 'Descargar archivo de Excel',
                        title: 'CORRIDAS FINANCIERAS',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3,4,5, 7, 8 ],
                            format: {
                                header: function (d, columnIdx) {
                                    switch (columnIdx) {
                                        case 0:
                                            return 'ID CORRIDA';
                                            break;
                                        case 1:
                                            return 'ESTATUS';
                                            break;
                                        case 2:
                                            return 'PROYECTO';
                                            break;
                                        case 3:
                                            return 'CONDOMINIO';
                                            break;
                                        case 4:
                                            return 'ID LOTE';
                                            break;
                                        case 5:
                                            return 'LOTE';
                                            break;
                                        case 7:
                                            return 'CLIENTE';
                                            break;
                                        case 8:
                                            return 'HORA/FECHA';
                                            break;
                                    }
                                }
                            }
                        },
                    }
                ],
                pagingType: "full_numbers",
                language: {
                    url: "<?=base_url()?>/static/spanishLoader_v2.json",
                    paginate: {
                        previous: "<i class='fa fa-angle-left'>",
                        next: "<i class='fa fa-angle-right'>"
                    }
                },
                columnDefs: [{
                    visible: false,
                    searchable: false
                }],
                "columns":
                    [
                        {data: 'id_corrida'},
                        {
                            data: null,
                            render: function ( data, type, row )
                            {
                                let label;
                                if(data.status==1){
                                    label = '<label class="active-pill">Activa</label>';
                                }else{
                                    label = '<label class="inactive-pill">Inactiva</label>';
                                }
                                return label;
                            },
                        },
                        {data: 'nombreResidencial'},
                        {data: 'nombreCondominio'},
                        {data: 'idLote'},
                        {data: 'nombreLote'},
                        {
                            data: null,
                            render: function ( data, type, row )
                            {
                                return data.nombreCliente;
                            },
                        },
                        {
                            // data: 'creacion_corrida'
                            data: null,
                            render: function ( data, type, row )
                            {
                                // return data.creacion_corrida;
                                let d = new Date(data.creacion_corrida);
                                let month = (d.getMonth() + 1).toString().padStart(2, '0');
                                let day = d.getDate().toString().padStart(2, '0');
                                let year = d.getFullYear();
                                let hr = d.getHours().toString().padStart(2, '0');;
                                let min = d.getMinutes().toString().padStart(2, '0');;
                                let segs = d.getSeconds().toString().padStart(2, '0');;
                                let fecha = [year, month, day].join('-');
                                let hrs = [hr, min, segs].join(':');
                                return fecha+' '+hrs;
                            },
                        },
                        /*{data: 'ubic'},*/
                        {
                            data: null,
                            render: function ( data, type, row )
                            {
                                return data.nombreAsesor;
                            }
                        },
                        {
                            data: null,
                            render: function (data, type, row){
                                let container_btnc;
                                <?php if($this->session->userdata('id_rol') == 17 || $this->session->userdata('id_rol') == 32 || $this->session->userdata('id_rol') == 70){?>
                                    if((data.idStatusContratacion == 5 || data.idStatusContratacion==2) && (data.idMovimiento==35 || data.idMovimiento==22 || data.idMovimiento==62 || data.idMovimiento==75 || data.idMovimiento==94) && data.status==1){
                                        container_btnc =  '<center><a href="<?php echo base_url()?>Corrida/editacf/'+ data.id_corrida +'" target="_blank" style="padding:10px 0px"><button class="btn-data btn-green ' +
                                            'btn-fab btn-fab-mini"><i class="fas fa-money-check-alt"></i></button></a></center>';
                                    }else{
                                        container_btnc =  '<center><button class="btn-data btn-green ' +
                                            'btn-fab btn-fab-mini" disabled><i class="fas fa-money-check-alt"></i></button></center>';
                                    }
                                <?php } else{?>
                                container_btnc =  '<center><a href="<?php echo base_url()?>Corrida/editacf/'+ data.id_corrida +'" target="_blank" style="padding:10px 0px"><button class="btn-data btn-green ' +
                                    'btn-fab btn-fab-mini"><i class="fas fa-money-check-alt"></i></button></a></center>';
                                <?php }?>


                                //container_btnc =  '<center><a href="<?php //echo base_url()?>//Corrida/editacf/'+ data.id_corrida +'" target="_blank" style="padding:10px 0px"><button class="btn-data btn-green ' +
                                //     'btn-fab btn-fab-mini"><i class="fas fa-money-check-alt"></i></button></a></center>';

                                return container_btnc;
                            }
                        },
                        <?php if($this->session->userdata('id_rol') == 17 || $this->session->userdata('id_rol') == 32){?>

                        <?php } else{?>
                        {
                            data: null,
                            render: function ( data, type, row )
                            {
                                let button_action;

                                if(data.status==1){
                                    button_action = '<button class="btn-data-gral btn-warning  desactivar_corrida" data-idCorrida="'+data.id_corrida+'" data-idLote="'+data.idLote+'">Desactivar</button>';
                                }else{
                                    button_action = '<button class="btn-data-gral btn-green activar_corrida" data-idCorrida="'+data.id_corrida+'" data-idLote="'+data.idLote+'">Activar</button>';
                                }
                                return '<center>' + button_action + '</center>';
                            }
                        },
                        <?php }?>
                    ]
            });

        });

        $(document).on('click', '.desactivar_corrida', function(){
            var $itself = $(this);
            let id_corrida = $itself.attr('data-idCorrida');
            let id_lote = $itself.attr('data-idLote');

            let disabled = 0;
            console.log("Desactivar corrida: ", id_corrida);
            var formData = new FormData();
            formData.append("idLote", id_lote);
            $.ajax({
                url: "<?=base_url()?>index.php/Corrida/actionMCorrida/"+id_corrida+"/"+disabled,
                data:formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                beforeSend: function(){
                    console.log('enviando...');
                },
                success : function (response) {
                    response = JSON.parse(response);
                    console.log(response);
                    if(response.message == 'OK') {
                        alerts.showNotification('top', 'right', 'Corrida financiera deshabilitada', 'success');
                        $('#tableDoct').DataTable().ajax.reload();
                    }else if(response.message == 'ERROR'){
                        alerts.showNotification('top', 'right', 'Ocurrií un error, intentalo nuevamente', 'danger');
                    }
                }
            });
        });

        $(document).on('click', '.activar_corrida', function(){
            var $itself = $(this);
            let id_corrida = $itself.attr('data-idCorrida');
            let id_lote = $itself.attr('data-idLote');
            let enabled = 1;
            // console.log("Activar corrida: ", id_corrida);

            $('#spiner-loader').removeClass('hide');
            $.post("<?=base_url()?>index.php/Corrida/checCFActived/"+id_lote, function(data) {
                console.log(data.message);
                if(data.message >= 1){
                    //lanzar aviso de que no se pueden 2 al mismo tiempo
                    $('#avisoModal').modal();
                    $('#spiner-loader').addClass('hide');
                }else{
                    //hacer la acción puesto que no hay registros
                    var formData = new FormData();
                    formData.append("idLote", id_lote);
                    $.ajax({
                        url: "<?=base_url()?>index.php/Corrida/actionMCorrida/"+id_corrida+"/"+enabled,
                        data:formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        beforeSend: function(){
                            console.log('enviando...');
                            $('#spiner-loader').removeClass('hide');
                        },
                        success : function (response) {
                            response = JSON.parse(response);
                            console.log(response);
                            if(response.message == 'OK') {
                                alerts.showNotification('top', 'right', 'Corrida financiera habilitada', 'success');
                                $('#tableDoct').DataTable().ajax.reload();
                            }else if(response.message == 'ERROR'){
                                alerts.showNotification('top', 'right', 'Ocurrií un error, intentalo nuevamente', 'danger');
                            }
                            $('#spiner-loader').addClass('hide');
                        }
                    });
                }
            }, 'json');


        });




        $('.btn-documentosGenerales').on('click', function () {
            $('#modalFiles').modal('show');
        });

        function getFileExtension(filename) {
            validaFile =  filename == null ? 'null':
                filename == 'Depósito de seriedad' ? 'Depósito de seriedad':
                    filename == 'Autorizaciones' ? 'Autorizaciones':
                        filename.split('.').pop();
            return validaFile;
        }



    });/*document Ready*/

    $(document).on('click', '.pdfLink', function () {
        var $itself = $(this);
        Shadowbox.open({
            content:    '<div><iframe style="overflow:hidden;width: 100%;height: 100%;position:absolute;" src="<?=base_url()?>static/documentos/cliente/expediente/'+$itself.attr('data-Pdf')+'"></iframe></div>',
            player:     "html",
            title:      "Visualizando archivo: " + $itself.attr('data-nomExp'),
            width:      985,
            height:     660
        });
    });

    $(document).on('click', '.pdfLink2', function () {
        var $itself = $(this);
        Shadowbox.open({
            content:    '<div><iframe style="overflow:hidden;width: 100%;height: 100%;position:absolute;" src="<?=base_url()?>asesor/deposito_seriedad/'+$itself.attr('data-idc')+'/1/"></iframe></div>',
            player:     "html",
            title:      "Visualizando archivo: " + $itself.attr('data-nomExp'),
            width:      1600,
            height:     900
        });
    });

    $(document).on('click', '.pdfLink22', function () {
        var $itself = $(this);
        Shadowbox.open({
            content:    '<div><iframe style="overflow:hidden;width: 100%;height: 100%;position:absolute;" src="<?=base_url()?>asesor/deposito_seriedad_ds/'+$itself.attr('data-idc')+'/1/"></iframe></div>',
            player:     "html",
            title:      "Visualizando archivo: " + $itself.attr('data-nomExp'),
            width:      1600,
            height:     900
        });
    });

    $(document).on('click', '.pdfLink3', function () {
        var $itself = $(this);
        Shadowbox.open({
            content:    '<div><iframe style="overflow:hidden;width: 100%;height: 100%;position:absolute;" src="<?=base_url()?>static/documentos/cliente/contrato/'+$itself.attr('data-Pdf')+'"></iframe></div>',
            player:     "html",
            title:      "Visualizando archivo: " + $itself.attr('data-nomExp'),
            width:      985,
            height:     660
        });
    });

    $(document).on('click', '.verProspectos', function () {
        var $itself = $(this);
        let functionName = '';
        if ($itself.attr('data-lp') == 6) { // IS MKTD
            functionName = 'printProspectInfoMktd';
        } else {
            functionName = 'printProspectInfo';
        }
        Shadowbox.open({
            /*verProspectos*/
            content:    '<div><iframe style="overflow:hidden;width: 100%;height: 100%;position:absolute;" src="<?=base_url()?>clientes/'+functionName+'/'+$itself.attr('data-id-prospeccion')+'"></iframe></div>',
            player:     "html",
            title:      "Visualizando Prospecto: " + $itself.attr('data-nombreProspecto'),
            width:      985,
            height:     660

        });
    });


    /*evidencia MKTD PDF*/
    $(document).on('click', '.verEVMKTD', function () {
        var $itself = $(this);
        var cntShow = '';

        if(checaTipo($itself.attr('data-expediente')) == "pdf")
        {
            cntShow = '<div><iframe style="overflow:hidden;width: 100%;height: 100%;position:absolute;" src="<?=base_url()?>static/documentos/evidencia_mktd/'+$itself.attr('data-expediente')+'" allowfullscreen></iframe></div>';
        }else{
            cntShow = '<div><img src="<?=base_url()?>static/documentos/evidencia_mktd/'+$itself.attr('data-expediente')+'" class="img-responsive"></div>';
        }
        /*content:    '<div><iframe style="overflow:hidden;width: 100%;height: 100%;position:absolute;" src="<?=base_url()?>static/documentos/evidencia_mktd/'+$itself.attr('data-expediente')+'" allowfullscreen></iframe></div>',*/
        Shadowbox.open({
            content:    cntShow,
            player:     "html",
            title:      "Visualizando Evidencia MKTD: " + $itself.attr('data-nombreCliente'),
            width:      985,
            height:     660

        });
    });

    function checaTipo(archivo)
    {
        archivo.split('.').pop();
        return validaFile;
    }

    $(document).on('click', '.seeAuts', function (e) {
        e.preventDefault();
        var $itself = $(this);
        var idLote=$itself.attr('data-idLote');
        $.post( "<?=base_url()?>index.php/registroLote/get_auts_by_lote/"+idLote, function( data ) {
            $('#auts-loads').empty();
            var statusProceso;
            $.each(JSON.parse(data), function(i, item) {
                if(item['estatus'] == 0)
                {
                    statusProceso="<small class='label bg-green' style='background-color: #00a65a'>ACEPTADA</small>";
                }
                else if(item['estatus'] == 1)
                {
                    statusProceso="<small class='label bg-orange' style='background-color: #FF8C00'>En proceso</small>";
                }
                else if(item['estatus'] == 2)
                {
                    statusProceso="<small class='label bg-red' style='background-color: #8B0000'>DENEGADA</small>";
                }
                else if(item['estatus'] == 3)
                {
                    statusProceso="<small class='label bg-blue' style='background-color: #00008B'>En DC</small>";
                }
                else
                {
                    statusProceso="<small class='label bg-gray' style='background-color: #2F4F4F'>N/A</small>";
                }
                $('#auts-loads').append('<h4>Solicitud de autorización:  '+statusProceso+'</h4><br>');
                $('#auts-loads').append('<h4>Autoriza: '+item['nombreAUT']+'</h4><br>');
                $('#auts-loads').append('<p style="text-align: justify;"><i>'+item['autorizacion']+'</i></p>' +
                    '<br><hr>');


            });
            $('#verAutorizacionesAsesor').modal('show');
        });
    });

    <?php if($this->session->userdata('id_rol') == 7 || $this->session->userdata('id_rol') == 9 || $this->session->userdata('id_rol') == 3){?>
    /*más querys alv*/
    var miArrayAddFile = new Array(8);
    var miArrayDeleteFile = new Array(1);

    $(document).ready (function() {

        $(document).on("click", ".update", function(e){

            e.preventDefault();
            $('#txtexp').val('');

            var descdoc= $(this).data("descdoc");
            var idCliente = $(this).attr("data-idCliente");
            var nombreResidencial = $(this).attr("data-nombreResidencial");
            var nombreCondominio = $(this).attr("data-nombreCondominio");
            var idCondominio = $(this).attr("data-idCondominio");
            var nombreLote = $(this).attr("data-nombreLote");
            var idLote = $(this).attr("data-idLote");
            var tipodoc = $(this).attr("data-tipodoc");
            var iddoc = $(this).attr("data-iddoc");

            miArrayAddFile[0] = idCliente;
            miArrayAddFile[1] = nombreResidencial;
            miArrayAddFile[2] = nombreCondominio;
            miArrayAddFile[3] = idCondominio;
            miArrayAddFile[4] = nombreLote;
            miArrayAddFile[5] = idLote;
            miArrayAddFile[6] = tipodoc;
            miArrayAddFile[7] = iddoc;

            $(".lote").html(descdoc);
            $('#addFile').modal('show');
            console.log('alcuishe');

        });
    });

    $(document).on('click', '#sendFile', function(e) {
        e.preventDefault();
        var idCliente = miArrayAddFile[0];
        var nombreResidencial = miArrayAddFile[1];
        var nombreCondominio = miArrayAddFile[2];
        var idCondominio = miArrayAddFile[3];
        var nombreLote = miArrayAddFile[4];
        var idLote = miArrayAddFile[5];
        var tipodoc = miArrayAddFile[6];
        var iddoc = miArrayAddFile[7];
        var expediente = $("#expediente")[0].files[0];

        var validaFile = (expediente == undefined) ? 0 : 1;
        tipodoc = (tipodoc == 'null') ? 0 : tipodoc;


        var dataFile = new FormData();

        dataFile.append("idCliente", idCliente);
        dataFile.append("nombreResidencial", nombreResidencial);
        dataFile.append("nombreCondominio", nombreCondominio);
        dataFile.append("idCondominio", idCondominio);
        dataFile.append("nombreLote", nombreLote);
        dataFile.append("idLote", idLote);
        dataFile.append("expediente", expediente);
        dataFile.append("tipodoc", tipodoc);
        dataFile.append("idDocumento", iddoc);

        if (validaFile == 0) {
            //toastr.error('Debes seleccionar un archivo.', '¡Alerta!');
            alerts.showNotification('top', 'right', 'Debes seleccionar un archivoo', 'danger');
        }

        if (validaFile == 1) {
            $('#sendFile').prop('disabled', true);
            $.ajax({
                url: "<?=base_url()?>index.php/registroCliente/addFileAsesor",
                data: dataFile,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success : function (response) {
                    response = JSON.parse(response);
                    if(response.message == 'OK') {
                        //toastr.success('Expediente enviado.', '¡Alerta de Éxito!');
                        alerts.showNotification('top', 'right', 'Expediente enviado', 'success');
                        $('#sendFile').prop('disabled', false);
                        $('#addFile').modal('hide');
                        $('#tableDoct').DataTable().ajax.reload();
                    } else if(response.message == 'ERROR'){
                        //toastr.error('Error al enviar expediente y/o formato no válido.', '¡Alerta de error!');
                        alerts.showNotification('top', 'right', 'Error al enviar expediente y/o formato no válido', 'danger');
                        $('#sendFile').prop('disabled', false);
                    }
                }
            });
        }

    });

    $(document).ready (function() {
        $(document).on("click", ".delete", function(e){
            e.preventDefault();
            var iddoc= $(this).data("iddoc");
            var tipodoc= $(this).data("tipodoc");

            miArrayDeleteFile[0] = iddoc;

            $(".tipoA").html(tipodoc);
            $('#cuestionDelete').modal('show');

        });
    });

    $(document).on('click', '#aceptoDelete', function(e) {
        e.preventDefault();
        var id = miArrayDeleteFile[0];
        var dataDelete = new FormData();
        dataDelete.append("idDocumento", id);

        $('#aceptoDelete').prop('disabled', true);
        $.ajax({
            url: "<?=base_url()?>index.php/registroCliente/deleteFile",
            data: dataDelete,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success : function (response) {
                response = JSON.parse(response);
                if(response.message == 'OK') {
                    //toastr.success('Archivo eliminado.', '¡Alerta de Éxito!');
                    alerts.showNotification('top', 'right', 'Archivo eliminado', 'danger');
                    $('#aceptoDelete').prop('disabled', false);
                    $('#cuestionDelete').modal('hide');
                    $('#tableDoct').DataTable().ajax.reload();
                } else if(response.message == 'ERROR'){
                    //toastr.error('Error al eliminar el archivo.', '¡Alerta de error!');
                    alerts.showNotification('top', 'right', 'Error al eliminar el archivo', 'danger');
                    $('#tableDoct').DataTable().ajax.reload();
                }
            }
        });

    });

    <?php } ?>

    /*

    */
</script>

