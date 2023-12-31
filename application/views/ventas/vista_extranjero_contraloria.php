<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>dist/css/shadowbox.css">
<link href="<?= base_url() ?>dist/css/datatableNFilters.css" rel="stylesheet"/>
<body>
    <div class="wrapper">
        <?php
            if($this->session->userdata('id_rol')=="13" || $this->session->userdata('id_rol')=="17" || $this->session->userdata('id_usuario')=="2767"
                || $this->session->userdata('id_rol')=="70"){
                $this->load->view('template/sidebar');
            }
            else
            {
                echo '<script>alert("ACCESSO DENEGADO"); window.location.href="'.base_url().'";</script>';
            }
        ?>
    
        <!-- Modals -->

        <div class="modal fade modal-alertas" id="modal_colaboradores" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
            
                    <form method="post" id="form_colaboradores">
                        <div class="modal-body"></div>
                        <div class="modal-footer"></div>
                    </form>

                </div>
            </div>
        </div>

        <div class="modal fade modal-alertas" id="modal_mktd" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-red">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">EDITAR INFORMACIÓN</h4>
                    </div>
                    <form method="post" id="form_MKTD">
                        <div class="modal-body"></div>
                        <div class="modal-footer"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="seeInformationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons" onclick="cleanComments()">clear</i>
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
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal" onclick="cleanComments()"><b>Cerrar</b></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Modals -->

        <div class="content boxContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col xol-xs-12 col-sm-12 col-md-12 col-lg-12">        
                        <ul class="nav nav-tabs nav-tabs-cm" role="tablist">
                            <li class="active"><a href="#nuevas-1" role="tab" data-toggle="tab">Pagos Solicitados</a></li>
                            <li><a href="#proceso-1" role="tab" data-toggle="tab">Invoice</a></li>
                        </ul>
                        
                        <div class="card no-shadow m-0 border-conntent__tabs">
                            <div class="card-content p-0">
                                <div class="nav-tabs-custom">
                                    <div class="tab-content p-2">
                                        <div class="tab-pane active" id="nuevas-1">
                                        <div class="card-content">
                                    <div class="encabezadoBox">
                                        <h3 class="card-title center-align" >Comisiones nuevas <b>Factura Extranjero</b></h3>
                                        <p class="card-title pl-1">(Comisiones nuevas, solicitadas para proceder a pago en esquema de Factura Extranjero)</p>
                                    </div>
                                    <div class="toolbar">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group d-flex justify-center align-center">
                                                    <h4 class="title-tot center-align m-0">Disponible:</h4>
                                                    <p class="input-tot pl-1" name="totpagarextranjero" id="totpagarextranjero">$0.00</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                                <div class="form-group d-flex justify-center align-center">
                                                    <h4 class="title-tot center-align m-0">Autorizar:</h4>
                                                    <p class="input-tot pl-1" name="totpagarPen" id="totpagarPen">$0.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">          
                                                <div class="form-group">
                                                    <label class="m-0" for="filtro33">Proyecto</label>
                                                    <select name="filtro33" id="filtro33" class="selectpicker select-gral" data-style="btn " data-show-subtext="true" data-live-search="true"  title="Selecciona un proyecto" data-size="7" required>
                                                        <option value="0">Seleccione todo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">          
                                                <div class="form-group">
                                                    <label class="m-0" for="filtro44">Condominio</label>
                                                    <select class="selectpicker select-gral" id="filtro44" name="filtro44[]" data-style="btn " data-show-subtext="true" data-live-search="true" title="Selecciona un condominio" data-size="7" required/></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <div class="form-group">
                                            <div class="table-responsive">
                                                <table class="table-striped table-hover" id="tabla_extranjero" name="tabla_extranjero">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>ID</th>
                                                            <th>PROY.</th>
                                                            <th>CONDOMINIO</th>
                                                            <th>LOTE</th>
                                                            <th>REFERENCIA</th>
                                                            <th>PRECIO LOTE</th>
                                                            <th>EMP.</th>
                                                            <th>TOT. COM.</th>
                                                            <th>P. CLIENTE</th>
                                                            <th>A PAGAR</th>
                                                            <th>TIPO VENTA</th>
                                                            <th>USUARIO</th>
                                                            <th>PUESTO</th>
                                                            <th>FEC. ENVÍO</th>
                                                            <th>MÁS</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        </div>
                                        <div class="tab-pane" id="proceso-1">
                                            <div class="text-center">
                                                <h3 class="card-title center-align">Comprobantes fiscales</h3>
                                                <p class="card-title pl-1"> Correspondientes a usuarios con Nacionalidad Extranjera</p>
                                            </div>
                                            <div class="toolbar">
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group d-flex justify-center align-center">
                                                                <h4 class="title-tot center-align m-0">Total</h4>
                                                                <p class="input-tot pl-1" id="myText_proceso">$0.00</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                <table class="table-striped table-hover" id="tabla_factura" name="tabla_factura">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>USUARIO</th>
                                                        <th>TOTAL</th>
                                                        <th>FORMA DE PAGO</th>
                                                        <th>NACIONALIDAD</th>
                                                        <th>ESTATUS</th>
                                                        <th>MÁS</th>
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
            </div>
        </div>
    <?php $this->load->view('template/footer_legend');?>
    </div>
    </div><!--main-panel close-->
    <?php $this->load->view('template/footer');?>
    <!--DATATABLE BUTTONS DATA EXPORT-->
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>dist/js/shadowbox.js"></script>
    <script>
        Shadowbox.init();
    </script>
    <script>
        $(document).ready(function() {
            $("#tabla_extranjero").prop("hidden", true);

            var url = "<?=base_url()?>/index.php/";
          

            $.post("<?=base_url()?>index.php/Contratacion/lista_proyecto", function (data) {
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    var id = data[i]['idResidencial'];
                    var name = data[i]['descripcion'];
                    $("#filtro33").append($('<option>').val(id).text(name.toUpperCase()));
                }
                $("#filtro33").selectpicker('refresh');
            }, 'json');

 
        });
 
        $('#filtro33').change(function(ruta){
            residencial = $('#filtro33').val();
            $("#filtro44").empty().selectpicker('refresh');
            $.ajax({
                url: '<?=base_url()?>Asesor/getCondominioDesc/'+residencial,
                type: 'post',
                dataType: 'json',
                success:function(response){
                    var len = response.length;
                    for( var i = 0; i<len; i++){
                        var id = response[i]['idCondominio'];
                        var name = response[i]['nombre'];
                        $("#filtro44").append($('<option>').val(id).text(name));
                    }

                    $("#filtro44").selectpicker('refresh');
                }
            });
        });

 
        $('#filtro33').change(function(ruta){
            proyecto = $('#filtro33').val();
            condominio = $('#filtro44').val();
            if(condominio == '' || condominio == null || condominio == undefined){
                condominio = 0;
            }
            console.log(proyecto);
            console.log(condominio);
            getAssimilatedCommissions(proyecto, condominio);
        });

        $('#filtro44').change(function(ruta){
            proyecto = $('#filtro33').val();
            condominio = $('#filtro44').val();
            if(condominio == '' || condominio == null || condominio == undefined){
                condominio = 0;
            }
            getAssimilatedCommissions(proyecto, condominio);
        });
 
        var url = "<?=base_url()?>";
        var url2 = "<?=base_url()?>index.php/";
        var totalLeon = 0;
        var totalQro = 0;
        var totalSlp = 0;
        var totalMerida = 0;
        var totalCdmx = 0;
        var totalCancun = 0;
        var tr;
        var tabla_remanente2 ;
        var totaPen = 0;
       
        let titulos = [];
          //INICIO TABLA QUERETARO*************************************
          $('#tabla_extranjero thead tr:eq(0) th').each( function (i) {
            if(i != 0){
                var title = $(this).text();
                titulos.push(title);
                $(this).html('<input type="text" class="textoshead" placeholder="'+title+'"/>');
                $('input', this).on('keyup change', function() {
                    if (tabla_extranjero2.column(i).search() !== this.value) {
                        tabla_extranjero2
                        .column(i)
                        .search(this.value)
                        .draw();

                        var total = 0;
                        var index = tabla_extranjero2.rows({
                        selected: true,
                        search: 'applied'
                    }).indexes();

                        var data = tabla_extranjero2.rows(index).data();
                        $.each(data, function(i, v) {
                            total += parseFloat(v.impuesto);
                        });

                        var to1 = formatMoney(total);
                        document.getElementById("totpagarextranjero").textcontent = formatMoney(total);
                    }
                });
            }
            else {
                $(this).html('<input id="all" type="checkbox" style="width:20px; height:20px;" onchange="selectAll(this)"/>');
            }
        });

        function getAssimilatedCommissions(proyecto, condominio){
            $('#tabla_extranjero').on('xhr.dt', function(e, settings, json, xhr) {
                var total = 0;
                $.each(json.data, function(i, v) {
                    total += parseFloat(v.impuesto);
                });
                var to = formatMoney(total);
                document.getElementById("totpagarextranjero").textContent = '$' + to;
            });

            $("#tabla_extranjero").prop("hidden", false);
            tabla_extranjero2 = $("#tabla_extranjero").DataTable({
                dom: 'Brt'+ "<'row'<'col-xs-12 col-sm-12 col-md-6 col-lg-6'i><'col-xs-12 col-sm-12 col-md-6 col-lg-6'p>>",
                width: 'auto',
                buttons: [{
                    text: '<i class="fa fa-check"></i> ENVIAR A INTERNOMEX',
                    action: function() {
                        if ($('input[name="idTQ[]"]:checked').length > 0) {
                            $('#spiner-loader').removeClass('hide');
                            var idcomision = $(tabla_extranjero2.$('input[name="idTQ[]"]:checked')).map(function() {
                                return this.value;
                            }).get();
                            
                            var com2 = new FormData();
                            com2.append("idcomision", idcomision); 
                            $.ajax({
                                url : url2 + 'Comisiones/acepto_internomex_remanente/',
                                data: com2,
                                cache: false,
                                contentType: false,
                                processData: false,
                                type: 'POST', 
                                success: function(data){
                                    response = JSON.parse(data);
                                    if(data == 1) {
                                        $('#spiner-loader').addClass('hide');
                                        $("#totpagarPen").html(formatMoney(0));
                                        $("#all").prop('checked', false);
                                        var fecha = new Date();
                                        $("#myModalEnviadas").modal('toggle');
                                        tabla_extranjero2.ajax.reload();
                                        $("#myModalEnviadas .modal-body").html("");
                                        $("#myModalEnviadas").modal();
                                        $("#myModalEnviadas .modal-body").append("<center><img style='width: 75%; height: 75%;' src='<?= base_url('dist/img/send_intmex.gif')?>'><p style='color:#676767;'>Comisiones de esquema <b>Factura extranjero</b>, fueron enviadas a <b>INTERNOMEX</b> correctamente.</p></center>");
                                    }
                                    else {
                                        $('#spiner-loader').addClass('hide');
                                        $("#myModalEnviadas").modal('toggle');
                                        $("#myModalEnviadas .modal-body").html("");
                                        $("#myModalEnviadas").modal();
                                        $("#myModalEnviadas .modal-body").append("<center><P>ERROR AL ENVIAR COMISIONES </P><BR><i style='font-size:12px;'>NO SE HA PODIDO EJECUTAR ESTA ACCIÓN, INTÉNTALO MÁS TARDE.</i></P></center>");
                                    }
                                },
                                error: function( data ){
                                    $('#spiner-loader').addClass('hide');
                                    $("#myModalEnviadas").modal('toggle');
                                    $("#myModalEnviadas .modal-body").html("");
                                    $("#myModalEnviadas").modal();
                                    $("#myModalEnviadas .modal-body").append("<center><P>ERROR AL ENVIAR COMISIONES </P><BR><i style='font-size:12px;'>NO SE HA PODIDO EJECUTAR ESTA ACCIÓN, INTÉNTALO MÁS TARDE.</i></P></center>");
                                }
                            });
                        }
                    },
                    attr: {
                        class: 'btn btn-azure',
                        style: 'position: relative; float: right;',
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                    className: 'btn buttons-excel',
                    titleAttr: 'Descargar archivo de Excel',
                    title: 'EXTRANJERO_CONTRALORÍA_SISTEMA_COMISIONES',
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14],
                        format: {
                            header:  function (d, columnIdx) {
                                if(columnIdx == 0){
                                    return ' '+d +' ';
                                }else if(columnIdx == 1){
                                    return 'ID PAGO';
                                }else if(columnIdx == 2){
                                    return 'PROYECTO';
                                }else if(columnIdx == 3){
                                    return 'CONDOMINIO';
                                }else if(columnIdx == 4){
                                    return 'NOMBRE LOTE ';
                                }else if(columnIdx == 5){
                                    return 'REFERENCIA';
                                }else if(columnIdx == 6){
                                    return 'PRECIO LOTE';
                                }else if(columnIdx == 7){
                                    return 'EMPRESA';
                                }else if(columnIdx == 8){
                                    return 'TOT. COMISIÓN';
                                }else if(columnIdx == 9){
                                    return 'P. CLIENTE';
                                }else if(columnIdx == 10){
                                    return 'TOT. PAGAR';
                                }else if(columnIdx == 11){
                                    return 'TIPO VENTA';
                                }else if(columnIdx == 12){
                                    return 'COMISIONISTA';
                                }else if(columnIdx == 13){
                                    return 'PUESTO';
                                }else if(columnIdx == 14){
                                    return 'FECH. ENVÍO';
                                }
                                else if(columnIdx != 15 && columnIdx !=0){
                                    return ' '+titulos[columnIdx-1] +' ';
                                }
                            }
                        }
                    },
                }],
                pagingType: "full_numbers",
                fixedHeader: true,
                language: {
                    url: "<?=base_url()?>/static/spanishLoader_v2.json",
                    paginate: {
                        previous: "<i class='fa fa-angle-left'>",
                        next: "<i class='fa fa-angle-right'>"
                    }
                },
                destroy: true,
                ordering: false,
                columns: [{
                    "width": "3%" },
                {
                    "width": "5%",
                    "data": function( d ){
                        return '<p class="m-0">'+d.id_pago_i+'</p>';
                    }
                },
                {
                    "width": "5%",
                    "data": function( d ){
                        return '<p class="m-0">'+d.proyecto+'</p>';
                    }
                },
                {
                    "width": "7%",
                    "data": function( d ){
                        return '<p class="m-0">'+d.condominio+'</p>';
                    }
                },
                {
                    "width": "7%",
                    "data": function( d ){
                        return '<p class="m-0"><b>'+d.lote+'</b></p>';
                    }
                },
                {
                    "width": "7%",
                    "data": function( d ){
                        return '<p class="m-0">'+d.referencia+'</p>';
                    }
                },
                {
                    "width": "7%",
                    "data": function( d ){
                        return '<p class="m-0">$'+formatMoney(d.precio_lote)+'</p>';
                    }
                },
                {
                    "width": "5%",
                    "data": function( d ){
                        return '<p class="m-0"><b>'+d.empresa+'</p>';
                    }
                },
                {
                    "width": "7%",
                    "data": function( d ){
                        return '<p class="m-0">$'+formatMoney(d.comision_total)+'</p>';
                    }
                },
                {
                    "width": "5%",
                    "data": function( d ){
                        return '<p class="m-0">$'+formatMoney(d.pago_neodata)+'</p>';
                    }
                },

                {
                    "width": "7%",
                    "data": function( d ){
                        return '<p class="m-0"><b>$'+formatMoney(d.impuesto)+'</b></p>';
                    }
                },
                {
                    "width": "7%",
                    "data": function( d ){
                        if(d.lugar_prospeccion == 6){
                            return '<p class="m-0">COMISIÓN + MKTD <br><b> ('+d.porcentaje_decimal+'% de '+d.porcentaje_abono+'%)</b></p>';
                        }
                        else{
                            return '<p class="m-0">COMISIÓN <br><b> ('+d.porcentaje_decimal+'% de '+d.porcentaje_abono+'%)</b></p>';
                        }
                    
                    }
                },
                {
                    "width": "9%",
                    "data": function( d ){
                        return '<p class="m-0"><b>'+d.usuario+'</b></i></p>';
                    }
                },
                {
                    "width": "7%",
                    "data": function( d ){
                        return '<p class="m-0"><i> '+d.puesto+'</i></p>';
                    }
                },
                {
                    "width": "7%",
                    "data": function( d ){
                        var BtnStats1;
                        BtnStats1 =  '<p class="m-0">'+d.fecha_creacion+'</p>';
                        return BtnStats1;

                    }
                },
                {
                    "width": "8%",
                    "orderable": false,
                    "data": function( data ){
                        var BtnStats;
                        
                        BtnStats = '<button href="#" value="'+data.id_pago_i+'" data-value="'+data.lote+'" data-code="'+data.cbbtton+'" ' +'class="btn-data btn-blueMaderas consultar_logs_extranjero" title="Detalles">' +'<i class="fas fa-info"></i></button>'+

                        '<button href="#" value="'+data.id_pago_i+'" data-value="'+data.id_pago_i+'" data-code="'+data.cbbtton+'" ' + 'class="btn-data btn-warning cambiar_estatus" title="Pausar solicitud">' + '<i class="fas fa-ban"></i></button>';
                        return '<div class="d-flex justify-center">'+BtnStats+'</div>';
                    }
                }],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0,
                    searchable:false,
                    className: 'dt-body-center',
                    render: function (d, type, full, meta){
                        if(full.estatus == 4){
                            if(full.id_comision){
                                return '<input type="checkbox" name="idTQ[]" style="width:20px;height:20px;"  value="' + full.id_pago_i + '">';
                            }
                            else{
                                return '';
                            }
                        }
                        else{
                            return '';
                        }
                    },
                    select: {
                        style:    'os',
                        selector: 'td:first-child'
                    },
                }],
                ajax: {
                    "url": url2 + "Comisiones/getDatosNuevasEContraloria/" + proyecto + "/" + condominio,
                    "type": "POST",
                    cache: false,
                    "data": function( d ){
                    }
                },
            });

            $("#tabla_extranjero tbody").on("click", ".consultar_logs_extranjero", function(e){
                e.preventDefault();
                e.stopImmediatePropagation();

                id_pago = $(this).val();
                lote = $(this).attr("data-value");

                $("#seeInformationModalExtranjero").modal();
                $("#nameLote").append('<p><h5 style="color: white;">HISTORIAL DEL PAGO DE: <b>'+lote+'</b></h5></p>');
                $.getJSON("getComments/"+id_pago).done( function( data ){
                    $.each( data, function(i, v){
                        $("#comments-list-extranjero").append('<div class="col-lg-12"><p><i style="color:gray;">'+v.comentario+'</i><br><b style="color:#3982C0">'+v.fecha_movimiento+'</b><b style="color:gray;"> - '+v.nombre_usuario+'</b></p></div>');
                    });
                });
            });

            $('#tabla_extranjero').on('click', 'input', function() {
                tr = $(this).closest('tr');
                var row = tabla_extranjero2.row(tr).data();
                if (row.pa == 0) {
                    row.pa = row.impuesto;
                    totaPen += parseFloat(row.pa);
                    tr.children().eq(1).children('input[type="checkbox"]').prop("checked", true);
                }
                else {
                    totaPen -= parseFloat(row.pa);
                    row.pa = 0;
                }

                $("#totpagarPen").html(formatMoney(totaPen));
            });

            $("#tabla_extranjero tbody").on("click", ".cambiar_estatus", function(){
                var tr = $(this).closest('tr');
                var row = tabla_extranjero2.row( tr );
                id_pago_i = $(this).val();

                $("#modal_nuevas .modal-body").html("");
                $("#modal_nuevas .modal-body").append('<div class="row"><div class="col-lg-12"><p>¿Está seguro de pausar la comisión de <b>'+row.data().lote+'</b> para el <b>'+(row.data().puesto).toUpperCase()+':</b> <i>'+row.data().usuario+'</i>?</p></div></div>');
                $("#modal_nuevas .modal-body").append('<div class="row"><div class="col-lg-12"><input type="hidden" name="value_pago" value="1"><input type="hidden" name="estatus" value="6"><input type="text" class="form-control observaciones" name="observaciones" required placeholder="Describe mótivo por el cual se va activar nuevamente la solicitud"></input></div></div>');
                $("#modal_nuevas .modal-body").append('<input type="hidden" name="id_pago" value="'+row.data().id_pago_i+'">');
                $("#modal_nuevas .modal-body").append('<div class="row"><div class="col-md-6"></div><div class="col-md-3"><input type="submit" class="btn btn-primary" value="PAUSAR"></div><div class="col-md-3"><button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button></div></div>');
                $("#modal_nuevas").modal();
            });

          
        }
        //FIN TABLA  ****************************************************************************************

        $('#tabla_factura').ready(function () {
            let titulos = [];

            $('#tabla_factura thead tr:eq(0) th').each(function (i) {
                if (i !== 4 || i !== 5) {
                    const title = $(this).text();
                    titulos.push(title);
                }
            });

            $('#tabla_factura').on('xhr.dt', function (e, settings, json, xhr) {
                let total = 0;
                $.each(json.data, function (i, v) {
                    total += parseFloat(v.total);
                });
                document.getElementById('myText_proceso').textContent = `$${formatMoney(total)}`;
            });

            $('#tabla_factura').DataTable({
                dom: 'Brt'+ "<'row'<'col-xs-12 col-sm-12 col-md-6 col-lg-6'i><'col-xs-12 col-sm-12 col-md-6 col-lg-6'p>>",
                width: 'auto',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        className: 'btn buttons-excel',
                        titleAttr: 'Descargar archivo de Excel',
                        title: 'REPORTE COMPROBANTES FISCALES EXTRANJEROS',
                        exportOptions: {
                            columns: [0,1,2,3,4,5],
                            format: {
                                header: function (d, columnIndex) {
                                    return ' '+titulos[columnIndex] +' ';
                                }
                            }
                        }
                    }
                ],
                pagingType: "full_numbers",
                fixedHeader: true,
                language: {
                    url: "<?=base_url()?>/static/spanishLoader_v2.json",
                    paginate: {
                        previous: "<i class='fa fa-angle-left'>",
                        next: "<i class='fa fa-angle-right'>"
                    }
                },
                destroy: true,
                ordering: false,
                columns: [
                    {
                        "data": function(d) {
                            return `<p class="m-0"><b>${d.id_usuario}</b></p>`;
                        }
                    },
                    {
                        "data": function(d) {
                            return `<p class="m-0">${d.usuario}</p>`;
                        }
                    },
                    {
                        "data": function (d) {
                            return `<p class="m-0">$${formatMoney(d.total)}</p>`;
                        }
                    },
                    {
                        "data": function (d) {
                            return `<p class="m-0">${d.forma_pago}</p>`;
                        }
                    },
                    {
                        "data": function (d) {
                            return `<p class="m-0">${d.nacionalidad}</p>`;
                        }
                    },
                    {
                        "data": function (d) {
                            return `<p class="m-0">${d.estatus_usuario}</p>`;
                        }
                    },
                    {
                        "data": function (d) {
                            return `
                                <div class="d-flex justify-center">
                                    <button data-usuario="${d.archivo_name}"
                                        class="btn-data btn-blueMaderas consultar-archivo"
                                        title="Detalles">
                                            <i class="fas fa-file-pdf-o"></i>
                                    </button>
                                </div>`;
                        }
                    }
                ],
                ajax: {
                    "url": "getComprobantesExtranjero",
                    "type": "GET",
                    "data": function(d) {}
                },
            });

            $('#tabla_factura tbody').on('click', '.consultar-archivo', function () {
                const $itself = $(this);
                Shadowbox.open({
                    content: '<div><iframe style="overflow:hidden;width: 100%;height: 100%;position:absolute;" src="<?=base_url()?>static/documentos/extranjero/'+$itself.attr('data-usuario')+'"></iframe></div>',
                    player: "html",
                    title: "Visualizando documento fiscal: " + $itself.attr('data-usuario'),
                    width: 985,
                    height: 660
                });
            });
        });
 
        function formatMoney( n ) {
            var c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
            j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        };

        //FUNCION PARA LIMPIAR EL FORMULARIO CON DE PAGOS A PROVEEDOR.
        function resear_formulario(){
            $("#modal_formulario_solicitud input.form-control").prop("readonly", false).val("");
            $("#modal_formulario_solicitud textarea").html('');

            $("#modal_formulario_solicitud #obse").val('');
    
            var validator = $( "#frmnewsol" ).validate();
            validator.resetForm();
            $( "#frmnewsol div" ).removeClass("has-error");

        }
 
        var justificacion_globla = "";

      

        $("#form_colaboradores").submit( function(e) {
            e.preventDefault();
        }).validate({
            submitHandler: function( form ) {
                $('#loader').removeClass('hidden');
                var data = new FormData( $(form)[0] );
                let sumat=0;
                let valor = parseFloat($('#pago_mktd').val()).toFixed(3);
                let valor1 = parseFloat(valor-0.10);
                let valor2 = parseFloat(valor)+0.010;
            
                for(let i=0;i<$('#cuantos').val();i++){
                    sumat += parseFloat($('#abono_marketing_'+i).val());
                }
                
                let sumat2 =  parseFloat((sumat).toFixed(3));
                document.getElementById('Sumto').innerHTML= ''+ parseFloat(sumat2.toFixed(3)) +'';
                if(parseFloat(sumat2.toFixed(3)) < valor1){
                    alerts.showNotification("top", "right", "Falta dispersar", "warning");
                }
                else{
                    if(parseFloat(sumat2.toFixed(3)) >= valor1 && parseFloat(sumat2.toFixed(3)) <= valor2 ){
                        $.ajax({
                            url: url2 + "Comisiones/nueva_mktd_comision",
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            method: 'POST',
                            type: 'POST', // For jQuery < 1.9
                            success: function(data){
                                if(true){
                                    $('#loader').addClass('hidden');
                                    $("#modal_colaboradores").modal('toggle');
                                    plaza_2.ajax.reload();
                                    plaza_1.ajax.reload();
                                    alert("¡Se agregó con éxito!");
                                }else{
                                    alert("NO SE HA PODIDO COMPLETAR LA SOLICITUD");
                                    $('#loader').addClass('hidden');
                                }
                            },error: function( ){
                                alert("ERROR EN EL SISTEMA");
                            }
                        });
                    }
                    else if(parseFloat(sumat2.toFixed(3)) > valor1 && parseFloat(sumat2.toFixed(3)) > valor2 ){
                        alerts.showNotification("top", "right", "Cantidad excedida", "danger");
                    }
                }
            }
        });

        $("#frmnewsol").submit( function(e) {
            e.preventDefault();
        }).validate({
            submitHandler: function( form ) {
                var data = new FormData( $(form)[0] );
                data.append("xmlfile", documento_xml);
                $.ajax({
                    url: url + link_post,
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    method: 'POST',
                    type: 'POST', // For jQuery < 1.9
                    success: function(data){
                        if( data.resultado ){
                            alert("LA FACTURA SE SUBIO CORRECTAMENTE");
                            $("#modal_formulario_solicitud").modal( 'toggle' );
                            tabla_nuevas.ajax.reload();
                        }else{
                            alert("NO SE HA PODIDO COMPLETAR LA SOLICITUD");
                        }
                    },error: function(){
                        alert("ERROR EN EL SISTEMA");
                    }
                });
            }
        });          

        $("#form_MKTD").submit( function(e) {
            e.preventDefault();        
        }).validate({
            rules: {
                'porcentajeUserMk[]':{
                    required: true,
                }
            },
            messages: {
                'porcentajeUserMk[]':{
                    required : "Dato requerido"
                }
            },
            submitHandler: function( form ) {
                var data = new FormData( $(form)[0] );
                $.ajax({
                    url: url + "Comisiones/save_new_mktd",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    method: 'POST',
                    type: 'POST', // For jQuery < 1.9
                    success: function(data){
                        if( data.resultado ){
                            alert("LA FACTURA SE SUBIO CORRECTAMENTE");
                                $("#modal_mktd").modal( 'toggle' );
                            //  tabla_nuevas.ajax.reload();
                        }else{
                            alert("NO SE HA PODIDO COMPLETAR LA SOLICITUD");
                        }
                    },error: function(){
                        alert("ERROR EN EL SISTEMA");
                    }
                });   
            }
        }); 

       
 
        function cleanComments() {
            var myCommentsList = document.getElementById('comments-list-asimilados');
            var myCommentsLote = document.getElementById('nameLote');
            myCommentsList.innerHTML = '';
            myCommentsLote.innerHTML = '';
        }

        // $(window).resize(function(){
        //     plaza_1.columns.adjust();
        //     plaza_2.columns.adjust();
        // });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
        });

    </script>

    <script>
        $(document).ready( function(){
            $.getJSON( url + "Comisiones/report_plazas").done( function( data ){
                $(".report_plazas").html();
                $(".report_plazas1").html();
                $(".report_plazas2").html();
                if(data[0].id_plaza == '0' || data[1].id_plaza == 0){
                    if(data[0].plaza00==null || data[0].plaza00=='null' ||data[0].plaza00==''){
                        $(".report_plazas").append('<label style="color: #6a2c70;">&nbsp;<b>Porcentaje:</b> '+data[0].plaza01+'%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Restante</b> 0%</label>');
                    }
                    else{
                        $(".report_plazas").append('<label style="color: #6a2c70;">&nbsp;<b>Porcentaje:</b> '+data[0].plaza01+'%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Restante</b> '+data[0].plaza00+'%</label>');
                    }
                }
                if(data[1].id_plaza == '1' || data[1].id_plaza == 1){
                    if(data[1].plaza10==null || data[1].plaza10=='null' ||data[1].plaza10==''){
                        $(".report_plazas1").append('<label style="color: #b83b5e;">&nbsp;<b>Porcentaje:</b> '+data[1].plaza11+'%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Restante</b> 0%</label>');
                    }
                    else{
                        $(".report_plazas1").append('<label style="color: #b83b5e;">&nbsp;<b>Porcentaje:</b> '+data[1].plaza11+'%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Restante</b> '+data[1].plaza10+'%</label>');
                    }
                }
                if(data[2].id_plaza == '2' || data[2].id_plaza == 2){
                    if(data[2].plaza20==null || data[2].plaza20=='null' ||data[2].plaza20==''){
                        $(".report_plazas2").append('<label style="color: #f08a5d;">&nbsp;<b>Porcentaje:</b> '+data[2].plaza21+'%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Restante</b> 0%</label>');
                    }
                    else{
                        $(".report_plazas2").append('<label style="color: #f08a5d;">&nbsp;<b>Porcentaje:</b> '+data[2].plaza21+'%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Restante</b> '+data[2].plaza20+'%</label>');
                    }
                }
            });
        });                                               
    </script>
</body>