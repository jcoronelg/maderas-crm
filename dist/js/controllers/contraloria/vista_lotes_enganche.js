let subtitulo = ''; 
let option = '';
let ubicacion =`<div class="col-12 col-sm-4 col-md-4 col-lg-12">
<div id="ubicacion" style="display:none">
    <label class="control-label label-gral">Ubicación</label>
    <select id="ubicacion_sede" name="ubicacion_sede" class="selectpicker select-gral m-0" data-style="btn btn-round" style="text-align:center"></select>
</div>
</div>`;
let precio = `<div class="col-12 col-sm-4 col-md-4 col-lg-12">
<div id="precio" style="display:none">
    <label class="control-label label-gral">Precio total con descuento</label>
    <input type="text" id="preciodesc" name="preciodesc" class="form-control input-gral" style="text-align:center" value="">
</div>
</div>`;
let enganche = `<div class="col-12 col-sm-4 col-md-4 col-lg-12">
<div id="enganche" style="display:none">
    <label class="control-label label-gral">Enganche</label>
    <input type="text" id="enganches" name="enganches" class="form-control input-gral" style="text-align:center" value="">
</div>
</div>`;
function llenarSelectPrincipal(){
    $("#modificacion").empty().selectpicker('refresh');
    switch(id_usuario_general) {
        case 2807: //Mariela Sánchez Sánchez
        case 2826: //Ana Laura García Tovar
        case 2767: //Irene Vallejo vista_lotes_precio_enganche
            subtitulo = "En esta vista podrás hacer la actualización del precio total con descuentos y enganche de un lote apartado.";
            $('#modificacion').append('<option value="Precio">Precio total con descuento</option>');
            $('#modificacion').append('<option value="Enganche">Enganche</option>');
            document.getElementById('selects').innerHTML = precio + enganche;
        break;
        case 2754: //Gabriela Hernández Tovar vista_lotes_enganche_sede
            subtitulo = "En esta vista podrás hacer la actualización del enganche y ubicación de un lote apartado.";
            $('#modificacion').append('<option value="Ubicacion">Ubicacion</option>');
            $('#modificacion').append('<option value="Enganche">Enganche</option>');
            document.getElementById('selects').innerHTML = ubicacion + enganche;
        break;
        case 2749: //Ariadna Martínez vista_lotes_sede
            subtitulo = "En esta vista podrás hacer la actualización de la ubicación de un lote apartado.";
            $('#modificacion').append('<option value="Ubicacion">Ubicacion</option>');  
            document.getElementById('selects').innerHTML = ubicacion;      
        break;
        case 1297: //María de Jesús
        case 826: //Victor Hugo vista_lotes_apartados
        subtitulo = "En esta vista podrás hacer la actualización del precio total con descuentos, enganche y ubicación de un lote apartado.";
        $('#modificacion').append('<option label="dsfsdf" value="Ubicacion">Ubicacion</option>');
        $('#modificacion').append('<option value="Precio">Precio total con descuento</option>');
        $('#modificacion').append('<option value="Enganche">Enganche</option>');
        document.getElementById('selects').innerHTML = ubicacion + enganche + precio;
        break;
    }
}


$('#tabla_historial thead tr:eq(0) th').each( function (i) {
    var title = $(this).text();
    $(this).html('<input type="text" style="width:100%; background:#003D82; color:white; border: 0; font-weight: 500;" class="textoshead" data-toggle="tooltip" data-placement="top"  placeholder="'+title+'"/>' );
    $( 'input', this ).on('keyup change', function () {
        if ($('#tabla_historial').DataTable().column(i).search() !== this.value ) {
            $('#tabla_historial').DataTable().column(i).search(this.value).draw();
        }
    });
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function(){
    llenarSelectPrincipal();
    $.post(url + "Contraloria/lista_proyecto", function(data) {
        var len = data.length;
        for( var i = 0; i<len; i++)
        {
            var id = data[i]['idResidencial'];
            var name = data[i]['descripcion'];
            $("#proyecto").append($('<option>').val(id).text(name.toUpperCase()));
        }
        $("#proyecto").selectpicker('refresh');
    }, 'json'); 

document.getElementById('subtitulo').innerHTML = subtitulo;

});

$('#proyecto').change( function() {
    index_proyecto = $(this).val();
    $("#condominio").html("");
    $(document).ready(function(){
        $.post(url + "Contraloria/lista_condominio/"+index_proyecto, function(data) {
            var len = data.length;
            $("#condominio").append($('<option disabled selected>SELECCIONA UN CONDOMINIO</option>'));
            for( var i = 0; i<len; i++)
            {
                var id = data[i]['idCondominio'];
                var name = data[i]['nombre'];
                $("#condominio").append($('<option>').val(id).text(name.toUpperCase()));
            }
            $("#condominio").selectpicker('refresh');
        }, 'json');
    });
});


$('#condominio').change( function() {
    index_condominio = $(this).val();
    $("#lote").html("");
    $(document).ready(function(){
        $.post(url + "Contraloria/lista_lote_apartado/"+index_condominio, function(data) {
            var len = data.length;
            $("#lote").append($('<option disabled selected>SELECCIONA UN LOTE</option>'));
            for( var i = 0; i<len; i++)
            {
                var id = data[i]['idLote'];
                var name = data[i]['nombreLote'];
                $("#lote").append($('<option>').val(id).text(name.toUpperCase()));
            }
            $("#lote").selectpicker('refresh');
        }, 'json');
    });
});

$('#lote').change( function() {
    
    llenarSelectPrincipal();    
    index_lote = $(this).val();
    tabla_expediente = $("#tabla_historial").DataTable({
        dom: 'Brt'+ "<'row'<'col-12 col-sm-12 col-md-6 col-lg-6'i><'col-12 col-sm-12 col-md-6 col-lg-6'p>>",
        destroy: true,
        "buttons": [
            
        ],
        "ajax":
            {
                "url": url2+'Contraloria/get_lote_historial/'+index_lote,
                "dataSrc": ""
            },
        language: {
            url: general_base_url+"static/spanishLoader_v2.json",
            paginate: {
                previous: "<i class='fa fa-angle-left'>",
                next: "<i class='fa fa-angle-right'>"
            }
        },
        "ordering": false,
        "searching": true,
        "paging": true,

        "bAutoWidth": false,
        "bLengthChange": false,
        "scrollX": true,
        "bInfo": true,
        "fixedColumns": true,

        "columns":
            [
                {data: 'nombreLote'},
                {'data': function (d) {
                        return d.idLote
                    } 
                },
                {data: 'cliente'},
                {data: 'fechaApartado'},
                {data: 'asesor'},
                {data: 'coordinador'},
                {data: 'gerente'},
                {data: 'saldo'},
                {data: 'enganche'},
                {data: 'engancheContra'},
                {data: 'nombre_ubicacion'},
                {data: 'lote'},
                {data: 'contratacion'},
                {
                    "data": function(d){
                        $('[data-toggle="tooltip"]').tooltip();
                        opciones = `<center><button id="modificar" data-toggle="tooltip" data-placement="top" data-bandera9=${d.validacion_estatus_9} data-registroComision=${d.registro_comision} data-idLote=${d.idLote} class="btn-data btn-orangeYellow" data-toggle="tooltip" data-placement="top" title="Modificar"><i class="far fa-edit"></i></button></center>`;
                        return opciones;

                    }
                }
            ]
    });
    $('[data-toggle="tooltip"]').tooltip();

});

$(document).on('click', '#modificar', function () {
    var data = tabla_expediente.row($(this).parents('tr')).data();
    let bandera9 = $(this).attr("data-bandera9");
    let banderaComision = $(this).attr("data-registroComision");
    selectobject=document.getElementById("modificacion").getElementsByTagName("option");
   //console.log( selectobject.findIndex((element) => element.innerHTML == 'Precio'))
    //selectobject[3].disabled=true;
    let engancheContra = data.engancheContra;
    let ubicacionContra = data.ubicacion;
    getLoteApartado(data.idLote);
    $('#idLote').val(data.idLote);
    $('#bandera9').val(bandera9);
    $('#registroComision').val(banderaComision);
    engancheContra == null || engancheContra == '$0.00' ? $("#modificacion option[value='Enganche']").prop("disabled",true) : '';
    ubicacionContra == null || ubicacionContra == 0 ? $("#modificacion option[value='Ubicacion']").prop("disabled",true) : '';
    if(bandera9 == 1 && (banderaComision  == 8 || banderaComision == 0)){
        //TIENE ESTATUS 9 REGISTRADO Y RECESIÓN O NUEVA COMISIÓN => SI SE PUEDE ACTUALIZAR PRECIO
                 $("#modificacion option[value='Precio']").prop("disabled",false);
                 $('#modificacion').selectpicker('refresh');
    }else if(bandera9 == 1 && (banderaComision  != 8 && banderaComision != 0)){
        //TIENE ESTATUS 9 REGISTRADO Y COMISIÓN ACTIVA => NO SE PUEDE MODIFICAR PRECIO LOTE
            $("#modificacion option[value='Precio']").prop("disabled",true);
            $('#modificacion').selectpicker('refresh');
            $('#preciodesc').prop("disabled",true);

    }else if(bandera9 != 1 && (banderaComision  == 8 || banderaComision == 0 )){
        //NO SE TIENE ESTATUS 9 REGISTRADO Y LA COMISIÓN ES NUEVA O TIENE UNA RECESIÓN => NO SE PUEDE MODIFICAR EL PRECIO DEL LOTE 
        $("#modificacion option[value='Precio']").prop("disabled",true);
            $('#modificacion').selectpicker('refresh');
            $('#preciodesc').prop("disabled",true);
    }else{

    }
    $("#modal_aprobar").modal();
});

function getLoteApartado(idLote){
    $.get('get_lote_apartado',{
        idLote:idLote
    }, function(data) {
        $('#preciodesc').val(data.saldo);
        $('#enganches').val(data.engancheContra);
    }, 'json');   
}

$(document).on('change', '#modificacion', function () {
    $('#precio').hide();
    $('#enganche').hide();
    $('#ubicacion').hide();
    const valores = $(this).val();
    valores.forEach(str => {
        if(str === 'Precio'){
            $('#precio').show();
        }
        if(str === 'Enganche'){
            $('#enganche').show();
        }if(str === 'Ubicacion'){
            $('#ubicacion').show();
            llenarSelectUbicacion()
        }
    });
    if ($('#precio').is(':hidden')) {
        $('#preciodesc').val('');
    }
    if ($('#enganche').is(':hidden')) {
        $('#enganches').val('');
    }
    if ($('#ubicacion').is(':hidden')) {
        llenarSelectUbicacion()
    }
});
function limpiarCampos(){
    llenarSelectUbicacion()
    $('#enganches').val('');
    $('#preciodesc').val('');
    $('#modificacion').selectpicker()
}

$(document).on("submit", "#form_modificacion", function (e) {
    e.preventDefault();
    let idLote = $("#idLote").val();
    let data = new FormData($(this)[0]);
    data.append('saldo', $('#preciodesc').val() == '' || document.getElementById('preciodesc') == null ? null : $('#preciodesc').val());
    data.append('enganche', $('#enganches').val() == '' || document.getElementById('enganches') == null ? null : $('#enganches').val());
    data.append('ubicacion', $('#ubicacion_sede').val() == '' || document.getElementById('ubicacion_sede') == null ? null : $('#ubicacion_sede').val());
    
    $.ajax({
        url: "updateLotePrecioEnganche",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (response) {
            alerts.showNotification("top", "right", "El registro se ha actualizado con éxito.", "success");
            $("#modal_aprobar").modal("hide");
            limpiarCampos();
            $('#tabla_historial').DataTable().ajax.reload();
        }
    });
});
var sedes = [];
$(document).ready(function(){
    $("#ubicacion_sede").empty().selectpicker('refresh');
    $.post(url + "Contraloria/lista_sedes", function(data) {
        var len = data.length;
        $("#ubicacion_sede").append($('<option disabled selected>').val("").text("Seleccione una opción"));
        for( var i = 0; i<len; i++)
        {
            var id = data[i]['id_sede'];
            var name = data[i]['nombre'];
            $("#ubicacion_sede").append($('<option>').val(id).text(name.toUpperCase()));
            sedes[i] = {
                "id" : data[i]['id_sede'],
                "name" : data[i]['nombre']
            }
        }
        $("#ubicacion_sede").selectpicker('refresh');
    }, 'json');

});

function llenarSelectUbicacion() {
    console.log(sedes)
    $("#ubicacion_sede").empty().selectpicker('refresh');
    var len = sedes.length;
    $("#ubicacion_sede").append($('<option disabled selected>').val("").text("Seleccione una opción"));
    for( var i = 0; i<len; i++)
    {
        var id = sedes[i].id;
        var name = sedes[i].name;
        $("#ubicacion_sede").append($('<option>').val(id).text(name.toUpperCase()));
    }
    $("#ubicacion_sede").selectpicker('refresh');
}

$("#preciodesc").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});

$("#enganches").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});