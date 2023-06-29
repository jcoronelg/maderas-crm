var tablaMsi;
var tablaAut;
var tablaMsiVisualizar;
var dataUpdateGeneral=[];
var flagTipoUploadMeses;
$(document).ready (function() {

    flagTipoUploadMeses = 1; //cada que se cargue la página se cargara la variable pordefecto
    let button_excel = '';

    if(id_rol_general==17 || id_rol_general==70){
        button_excel = [
            {
                className: 'btn buttons-excel color-letter',
                text: 'DESCARGAR',
                extend: 'csvHtml5',
                titleAttr: 'DESCARGAR',
                title:'Autorizaciones',
                columns: [0, 1, 2, 3],
                exportOptions: {
                    format: {
                        header:  function (d, columnIdx) {
                            if(columnIdx == 0){
                                return 'ID';
                            }else if(columnIdx == 1){
                                return 'COMENTARIO';
                            }else if(columnIdx == 2){
                                return 'ESTATUS AUT';
                            }else if(columnIdx == 3){
                                return 'MODIFICADO';
                            }else if(columnIdx == 4){
                                return '';
                            }

                        }
                    }
                }
            }]
    }
    else{
        button_excel = [
            {
                className: 'btn buttons-excel color-letter',
                text: 'DESCARGAR',
                extend: 'csvHtml5',
                titleAttr: 'DESCARGAR',
                title:'Autorizaciones',
                columns: [0, 1, 2, 3],
                exportOptions: {
                    format: {
                        header:  function (d, columnIdx) {
                            if(columnIdx == 0){
                                return 'ID';
                            }else if(columnIdx == 1){
                                return 'COMENTARIO';
                            }else if(columnIdx == 2){
                                return 'ESTATUS AUT';
                            }else if(columnIdx == 3){
                                return 'MODIFICADO';
                            }else if(columnIdx == 4){
                                return '';
                            }

                        }
                    }
                }

            },
            {
                className: 'btn btn-azure subir-msi',
                text: 'Agregar MSI',
                title:'Agregar MSI'
            }];

    }
    tablaAut = $('#tabla_aut').DataTable({
        dom: 'Brt'+ "<'container-fluid pt-1 pb-1'<'row'<'col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-center'i><'col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-center'p>>>",
        width: '100%',
        scrollX: true,
        buttons: button_excel,
        ajax: {
            "url": general_base_url+"Contraloria/todasAutorizacionesMSI",
            "dataSrc": ""
        },
        pagingType: "full_numbers",
        fixedHeader: true,
        language: {
            url: general_base_url+"/static/spanishLoader_v2.json",
            paginate: {
                previous: "<i class='fa fa-angle-left'>",
                next: "<i class='fa fa-angle-right'>"
            }
        },
        destroy: true,
        ordering: false,
        columns: [
            {
                data: 'id_autorizacion'
                // data:(data)=>{
                //     let id_aut;
                //     id_aut = '<span class="label" style="background:#AED6F1; color:#1B4F72;">'+data.id_autorizacion+'</span>';
                //     return id_aut;
                // }
            },
            {
                data: 'comentario'
            },
            {
                // data: 'estatus_autorizacion'
                data : (data)=>{
                    let estatus_label;
                    let color_estatus;
                    switch(data.estatus_id){
                        case 1: //autorizacion activa
                            color_estatus='background:#AED6F1; color:#1B4F72;';
                            break;
                        case 2://autorizacion enviada a contraloria
                            color_estatus='background:#AED6F1; color:#1B4F72;';
                            break;
                        case 3://autorizacion aprobada
                            color_estatus='background: #A5D6A7;color: #1B5E20;';
                            break;
                        case 4://autorizacion rechazada
                            color_estatus='background: #F5B7B1;color: #78281F;';
                            break;
                    }

                    estatus_label = '<span class="label" style="'+color_estatus+'">'+data.estatus_autorizacion+'</span>';
                    return estatus_label;
                }
            },
            {
                data: 'fecha_modificacion'
            },
            {
                data:function(d){
                    $('[data-toggle="tooltip"]').tooltip();
                    let botones = '';
                    //5 : Asistente subdirector
                    //17: Contraloría
                    //2 : Contraloría
                    switch(id_rol_general) {
                        case 5:
                            if (d.estatus_id == 1) {
                                botones += botonesPermiso(1, 1, 1, 0, d.id_autorizacion, d.estatus);
                            }
                            if (d.estatus_id == 3) {
                                botones += botonesPermiso(1, 0, 0, 0, d.id_autorizacion, d.estatus);
                            }
                            if (d.estatus_id == 4) {
                                botones += botonesPermiso(1, 1, 1, 0, d.id_autorizacion, d.estatus);
                            }
                            break;
                        case 17:

                            if (d.estatus_id == 2) {
                                botones += botonesPermiso(1, 0, 1, 1, d.id_autorizacion, d.estatus);
                            }
                            if (d.estatus_id == 4) {
                                botones += botonesPermiso(1, 0, 0, 0, d.id_autorizacion, d.estatus);
                            }
                            break;
                        case 70:

                            if (d.estatus_id == 2) {
                                botones += botonesPermiso(1, 0, 1, 1, d.id_autorizacion, d.estatus);
                            }
                            if (d.estatus_id == 4) {
                                botones += botonesPermiso(1, 0, 0, 0, d.id_autorizacion, d.estatus);
                            }
                            break;
                        default:
                            break;
                    }
                    botones += '<button data-idAutorizacion="'+d.id_autorizacion+'"  class="btn-data btn-gray btnHistorial" data-toggle="tooltip" data-placement="top" title="Historial"><i class="fas fa-info"></i></button>';
                    return '<div class="d-flex justify-center">' + botones + '<div>';
                }
            },
        ]
    });

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
    });

    $('input[type=radio][name=modoSubida]').change(function(e) {
        if (this.value == 1) {
            flagTipoUploadMeses=1;
            //se queda asi ta cual
            //se debe mostrar el proyecto nomás
            $('#contenedor-condominio').addClass('hide');
            $('#filtro3').attr('onChange', 'changeCondominio()');
            $('#filtro3').val('default').selectpicker('deselectAll');
            $('#filtro3').selectpicker('refresh');
            $('#filtro4').empty();
            $('#filtro4').selectpicker('refresh');
            $('#tabla_msni').DataTable().clear().destroy();
            $('#typeTransaction').val(this.value);

            $('.anclaClass').attr('placeholder', 'ID CONDOMINIO');
        }
        else if (this.value == 0) {
            flagTipoUploadMeses=0;

            //se debe mostrar el proyecto y condominio nomás
            $('#contenedor-condominio').removeClass('hide');
            $('#filtro3').attr('onChange', 'changeLote()');
            $('#filtro3').val('default').selectpicker('deselectAll');
            $('#filtro3').selectpicker('refresh');
            $('#tabla_msni').DataTable().clear().destroy();
            $('#typeTransaction').val(this.value);

            $('.anclaClass').attr('placeholder', 'ID LOTE');
        }
    });
});

$(document).on('click', '.subir-msi', function(){
    $('#subirMeses').modal('show');
});




//cosas del archivo
async function processFile(selectedFile) {
    try {
        let arrayBuffer = await readFileAsync(selectedFile);
        return arrayBuffer;
    } catch (err) {
        console.log(err);
    }
}

function readFileAsync(selectedFile) {
    return new Promise((resolve, reject) => {
        let fileReader = new FileReader();
        fileReader.onload = function (event) {
            var data = event.target.result;
            var workbook = XLSX.read(data, {
                type: "binary",
                cellDates:true,
            });
            workbook.SheetNames.forEach(sheet => {
                rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheet], {defval: '', blankrows: true});
                jsonProspectos = JSON.stringify(rowObject, null);
            });
            resolve(jsonProspectos);
        };
        fileReader.onerror = reject;
        fileReader.readAsArrayBuffer(selectedFile);
    })
}
function validateExtension(extension, allowedExtensions) {
    let allowedExtensionsArray = allowedExtensions.split(", ");
    let flag = false;
    for (let i = 0; i < allowedExtensionsArray.length; i++) {
        if (allowedExtensionsArray[i] == extension)
            flag = true;
    }
    return flag;
}
$('#tabla_msni thead tr:eq(0) th').each( function (i) {
    var title = $(this).text();
    if(i == 0){//para cambiar el nombre dinamicamente del header de ID
        let attributo_input;
        switch (i) {
            case 0:
                attributo_input = "onkeypress=\"return event.charCode >= 48 && event.charCode <= 57\"";
                break;
        }

        $(this).html('<input type="text" class="textoshead anclaClass" '+attributo_input+' placeholder="'+title+'"/>' );
    }else{
        let attributo_input;
        switch (i) {
            case 1:
                attributo_input = "onkeypress=\"return event.charCode >= 48 && event.charCode <= 122\"";
                break;
            case 2:
                attributo_input = "onkeypress=\"return event.charCode >= 48 && event.charCode <= 57\"";
                break;
        }
        $(this).html('<input type="text" class="textoshead" '+attributo_input+' placeholder="'+title+'"/>' );

    }
    $( 'input', this ).on('keyup change', function () {
        if ($('#tabla_msni').DataTable().column(i).search() !== this.value ){
            $('#tabla_msni').DataTable()
                .column(i)
                .search(this.value)
                .draw();
        }
    });
});
function lettersOnly()
{
    var charCode = event.keyCode;

    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 8)

        return true;
    else
        return false;
}

$('#tabla_aut thead tr:eq(0) th').each( function (i) {
    let title;
    let spanText;
    if(i<=3){

        let attributo_input;
        switch(i){
            case 0:
                attributo_input = "return event.charCode >= 48 && event.charCode <= 57";
                break;
            case 1:
                attributo_input = "return lettersOnly(event)";
                break;
            case 2:
                attributo_input = "return lettersOnly(event)";
                break;
            case 3:
                attributo_input = "return event.charCode >= 45 && event.charCode <= 57";
                break;
        }
        if(i==3){
            title = 'MODIFICADO';
        }else{
            title = $(this)[0].textContent;
        }
        spanText = '<span class="textoshead hide"  placeholder="'+title+'">'+title+'</span>';

        $(this).html('<input type="text" class="textoshead " placeholder="'+title+'" onkeypress="'+attributo_input+'" /> ' + spanText );
        $( 'input', this ).on('keyup change', function () {
            if ($('#tabla_aut').DataTable().column(i).search() !== this.value ){
                $('#tabla_aut').DataTable()
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    }else{
        let title = $(this).text();
        $(this).html('<span class="textoshead" placeholder="'+title+'">'+title+'</span>' );
    }

});


var getInfo3 = new Array(1);
$(document).on("click", "#loadFile", function(e){

    var idResidencial = $('#filtro3').val();
    var idCondominio = $('#filtro4').val();
    if(flagTipoUploadMeses==1){
        let validares = (idResidencial == 0 || idResidencial=='' || idResidencial==null) ? 0 : 1;
        if (validares == 0) {
            alerts.showNotification("top", "right", "Seleccione el Residencial.", "danger");
        } else {
            getInfo3[0] = idResidencial;
            getInfo3[1] = idCondominio;
            $('#addFile').modal('show');
        }
    }else if(flagTipoUploadMeses==0){
        let validaCond = ($("#filtro4").val().length == 0) ? 0 : 1;
        if (validaCond == 0) {
            alerts.showNotification("top", "right", "Seleccione el condominio.", "danger");
        } else {
            getInfo3[0] = idResidencial;
            getInfo3[1] = idCondominio;
            $('#addFile').modal('show');
        }
    }


});


$(document).on('click', '#sendFile', function(e) {
    var idResidencial = getInfo3[0];
    var idCondominio = getInfo3[1];

    var file_msni = $("#file_msni")[0].files[0];
    fileElm = document.getElementById("file_msni");
    file = fileElm.value;

    console.log('file:', file);

    var validaFile = (file_msni == undefined) ? 0 : 1;
    var dataFile = new FormData();

    if (validaFile == 0 && (idCondominio=='' || idCondominio==0)) {
        if(validaFile == 0){
            alerts.showNotification('top', 'right', 'Debes seleccionar un archivo', 'danger');
        }else if(idCondominio=='' || idCondominio==0){
            alerts.showNotification('top', 'right', 'Debes seleccionar un condominio', 'danger');
        }
    }

    if (validaFile == 1) {
        let extension = file.substring(file.lastIndexOf("."));
        let statusValidateExtension = validateExtension(extension, ".xlsx");
        let statusValidateExtension2 = validateExtension(extension, ".csv");
        if (statusValidateExtension == true || statusValidateExtension2==true) { // MJ: ARCHIVO VÁLIDO PARA CARGAR
            processFile(fileElm.files[0]).then(jsonInfo => {
                dataFile.append("idResidencial", idResidencial);
                dataFile.append("idCondominio", idCondominio);
                dataFile.append("file_msni", jsonInfo);
                dataFile.append("typeTransaction", $('#typeTransaction').val());
                $('#sendFile').prop('disabled', true);
                $.ajax({
                    url: general_base_url+"Contraloria/update_msni",
                    data: dataFile,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success : function (response) {
                        response = JSON.parse(response);
                        if(response.message == 'OK') {
                            alerts.showNotification('top', 'right', '¡Información registrada!', 'success');
                            $('#sendFile').prop('disabled', false);
                            $('#addFile').modal('hide');
                            $('#subirMeses').modal('hide');
                            $("#filtro3").selectpicker('refresh');
                            $('#tabla_msni').DataTable().ajax.reload();
                            $('#tabla_aut').DataTable().ajax.reload();
                        } else if(response.message == 'FALSE'){
                            alerts.showNotification('top', 'right', '¡Error al enviar la solicitud!', 'danger');
                            $('#sendFile').prop('disabled', false);
                            $('#addFile').modal('hide');
                            $("#filtro3").selectpicker('refresh');
                            $('#tabla_msni').DataTable().ajax.reload();
                        }
                    }
                });
            });
        }


    }
});

function changeCondominio(){
    var idProyecto = $('#filtro3').val();
    var data = new Array();
    var nombreProyecto = $('#filtro3 option:selected').attr('data-nombre');
    //1: busqueda por proyecto
    //2: busqueda por lote
    let typeBusqueda = 1;
    data["tb"] = 1;
    data["url"] = general_base_url+'Contraloria/getMsni/'+typeBusqueda+'/'+idProyecto;
    data["tituloArchivo"] = 'Plantilla del residencial-'+nombreProyecto;
    loadTable(data);
}
function changeLote(){
    $('#filtro4').empty();
    $('#filtro4').selectpicker('refresh');
    var idProyecto = $('#filtro3').val();
    $.ajax({
        url: general_base_url+'General/getCondominiosList',
        type: 'post',
        dataType: 'json',
        data: {"idResidencial": idProyecto},
        success: function(data) {
            data.map((element, index)=>{
                $("#filtro4").append($('<option data-nombre="'+element.nombre+'">').val(element.idCondominio).text(element.nombre));
                $("#filtro4").selectpicker('refresh');
            });
        },
        error: function() {
            alerts.showNotification("top", "right", "Oops, algo salió mal.", "danger");
        }
    });
}
function loadLotes(){
    var idCondominio = $('#filtro4').val();
    var data = new Array();
    //1: busqueda por proyecto
    //2: busqueda por lote
    var nombreCondominio = $('#filtro4 option:selected').attr('data-nombre');
    let typeBusqueda = 2;
    data["tb"] = 2;
    data["url"] = general_base_url+'Contraloria/getMsni/'+typeBusqueda+'/'+idCondominio;
    data["tituloArchivo"] = 'Plantilla del condominio-'+nombreCondominio;
    loadTable(data);
}
function loadTable(dataVariable){
    tablaMsi = $('#tabla_msni').DataTable({
        dom: 'Brt'+ "<'container-fluid pt-1 pb-1'<'row'<'col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-center'i><'col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-center'p>>>",
        width: 'auto',
        buttons: [{
            className: 'btn buttons-excel color-letter',
            text: 'DESCARGAR PLANTILLA',
            extend: 'csvHtml5',
            titleAttr: 'DESCARGAR PLANTILLA',
            title:dataVariable['tituloArchivo'],
            exportOptions: {
                columns: [0, 1, 2],
                format: {
                    header:  function (d, columnIdx) {

                        if(dataVariable['tb']==1){
                            if(columnIdx == 0) {
                                return 'ID';
                            } else if(columnIdx == 1){
                                return 'CONDOMINIO';
                            }else if(columnIdx == 2){
                                return 'MSNI';
                            }
                        }else if(dataVariable['tb']==2){
                            if(columnIdx == 0){
                                return 'ID';
                            }else if(columnIdx == 1){
                                return 'LOTE';
                            }else if(columnIdx == 2){
                                return 'MSNI';
                            }
                        }

                    }
                }
            },
        }],
        ajax: {
            "url": dataVariable['url'],
            "dataSrc": ""
        },
        pagingType: "full_numbers",
        fixedHeader: true,
        language: {
            url: general_base_url+"/static/spanishLoader_v2.json",
            paginate: {
                previous: "<i class='fa fa-angle-left'>",
                next: "<i class='fa fa-angle-right'>"
            }
        },
        destroy: true,
        ordering: false,
        columns: [
            {
                data: 'ID'
            },
            {
                data: 'nombre'
            },
            {
                data: 'msni'
            }
        ]
    })

    if(dataVariable['tb']==1){
        tablaMsi.columns([2]).visible(false);
    }
}

jQuery(document).ready(function(){
    jQuery('#addFile').on('hidden.bs.modal', function (e) {
        jQuery(this).removeData('bs.modal');
        jQuery(this).find('#file_msni').val('');
        jQuery(this).find('#txtexp').val('');
    })
})

function botonesPermiso(permisoVista,permisoEditar,permisoAvanzar,permisoRechazar,idAutorizacion,estatus){
    let botones = '';
    /**Permisos - FUNCIÓN PARA OBTENER LOS BOTONES POR PERMISOS DE LA DATATABLE
     * 1.- vista
     * 2.- Editar
     * 3.- Avanzar
     * 4.- Rechazar
     **/
    if(permisoVista == 1){ botones += `<button data-idAutorizacion="${idAutorizacion}"  class="btn-data btn-sky btnVer" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fas fa-eye"></i></button>`;   }
    if(permisoEditar == 1){ botones += `<button data-idAutorizacion="${idAutorizacion}"  class="btn-data btn-yellow btnEditar" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></button>`; }
    if(permisoAvanzar == 1){ botones += `<button data-idAutorizacion="${idAutorizacion}" data-tipo="1" data-estatus="${estatus}" class="btn-data btn-green btnAvanzar" data-toggle="tooltip" data-placement="top" title="Avanzar"><i class="fas fa-thumbs-up"></i></button>`;  }
    if(permisoRechazar == 1){ botones += `<button data-idAutorizacion="${idAutorizacion}" data-tipo="2" data-estatus="${estatus}" class="btn-data btn-warning btnRechazar" data-toggle="tooltip" data-placement="top" title="Rechazar"><i class="fas fa-thumbs-down"></i></button>`;  }
    return  botones;
}

$(document).on('click', '.btnVer', function(e){
    let data = [];
    data["tb"] = 2;
    let id_aut = $(this).attr('data-idautorizacion');
    // $('.anclaClass').attr('placeholder', 'ID CONDOMINIO');

    let arr = id_aut.split(' ');


    if(arr.length <= 1){
        let id = parseInt(id_aut);
        console.log('id', id);
        data["url"] = general_base_url+'Contraloria/getAutVis/'+id+'/1';
        data['edit'] = 0;
        $('.anclaClass2').attr('placeholder', 'ID LOTE');
    }else if(arr.length > 1){
        // let id = 'residencial';
        console.log('id_aut', id_aut);

        data["url"] = general_base_url+'Contraloria/getAutVis/'+id_aut+'/2';
        data['edit'] = 0;
        $('.anclaClass2').attr('placeholder', 'ID CONDOMINIO');
    }

    // data["url"] = general_base_url+'Contraloria/getAutVis/'+id_aut; //ORIGINAL
    // data['edit'] = 0;                                                //ORIGINAL
    loadTableVAUT(data);
    $('#cambiosGuardaMSI').removeClass('hide');
    $('#cambiosGuardaMSI').addClass('hide');
    $('#verAut').modal('show'); /**/
});

function loadTableVAUT(data){
    let button_excel = '';
    let dom;

    if(data['edit'] == 1){
        button_excel = [{}]
        dom =  't' + "<'container-fluid pt-1 pb-1'<'row'<'col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-center'i><'col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-center'p>>>";
    }
    else{
        dom = 'Brt'+ "<'container-fluid pt-1 pb-1'<'row'<'col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-center'i><'col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-center'p>>>";
        button_excel = [{
            className: 'btn buttons-excel color-letter',
            text: 'DESCARGAR PLANTILLA',
            extend: 'csvHtml5',
            titleAttr: 'DESCARGAR PLANTILLA',
            title:'MSI pendietes de autorización',
            exportOptions: {
                columns: [0, 1, 2],
                format: {
                    header:  function (d, columnIdx) {

                        if(data['tb']==1){
                            if(columnIdx == 0) {
                                return 'ID';
                            } else if(columnIdx == 1){
                                return 'CONDOMINIO';
                            }else if(columnIdx == 2){
                                return 'MSI';
                            }
                        }else if(data['tb']==2){
                            if(columnIdx == 0){
                                return 'ID';
                            }else if(columnIdx == 1){
                                return 'LOTE';
                            }else if(columnIdx == 2){
                                return 'MSI';
                            }
                        }

                    }
                }
            },
        }];

    }

    tablaMsiVisualizar = $('#tabla_msni_visualizacion').DataTable({
        dom: dom,
        width: 'auto',
        buttons: button_excel,
        ajax: {
            "url": data['url'],
            "dataSrc": ""
        },
        pagingType: "full_numbers",
        fixedHeader: true,
        language: {
            url: general_base_url+"/static/spanishLoader_v2.json",
            paginate: {
                previous: "<i class='fa fa-angle-left'>",
                next: "<i class='fa fa-angle-right'>"
            }
        },
        destroy: true,
        ordering: false,
        columns: [
            {
                // data: 'idLote'
                data: function(d){
                    return d.idLote+'<input class="d-none" type="text" name="id_lote" value="'+d.idLote+'"/>';
                }
            },
            {
                data: function(d){
                    return d.nombre+'<input class="d-none" type="text" name="nombre_lote" value="'+d.nombre+'"/>';
                }
            },
            {
                // data: 'msi'
                data: function(d){
                    let action_return = '';
                    if(id_rol_general==5 && data['edit'] == 1){
                        action_return = '<input type="text" class="form-control"  name="msi" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="'+d.msi+'">';
                    }else{
                        action_return = d.msi;
                    }
                    return action_return;
                }
            }
        ]
    })
}

$('#tabla_msni_visualizacion thead tr:eq(0) th').each( function (i) {
    if(i<=3){
        let attributo_input;
        let classTogle;
        switch(i){
            case 0:
                attributo_input = "onkeypress=\"return event.charCode >= 48 && event.charCode <= 57\"";
                classTogle = 'anclaClass2';
                break;
            case 1:
                attributo_input = 'onkeypress="return lettersOnly(event)"';
                classTogle = '';
                break;
            case 2:
                attributo_input = "onkeypress=\"return event.charCode >= 48 && event.charCode <= 57\"";
                classTogle = '';
        }
        let title = $(this).text();
        $(this).html('<input type="text" class="textoshead '+classTogle+'" '+attributo_input+' placeholder="'+title+'"/>' );
        $( 'input', this ).on('keyup change', function () {
            if ($('#tabla_msni_visualizacion').DataTable().column(i).search() !== this.value ){
                $('#tabla_msni_visualizacion').DataTable()
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    }else{
        let title = $(this).text();
        $(this).html('<span class="textoshead">'+title+'</span>' );
    }

});

$(document).on('click', '.btnHistorial', function () {
    let idAutorizacion = $(this).attr('data-idautorizacion');
    document.getElementById('historialAut').innerHTML = '';
    //neuvo
    let id_aut = $(this).attr('data-idautorizacion');

    let arr = id_aut.split(' ');


    if(arr.length <= 1){
        let url_action = general_base_url+'Contraloria/getHistorialAutorizacionMSI';
        $.post(url_action, {
            id_autorizacion: idAutorizacion,
            modo: 1
        }, function (data) {
            var len = data.length;
            for (var i = 0; i < len; i++) {
                let estatus=data[i]['estatus_autorizacion'];
                let comentario = data[i]['comentario'];
                let icono_show;
                let color_icono;
                let bg_color;
                if(estatus==1 || estatus==2 || estatus==3){
                    icono_show = 'fa-check';
                    color_icono= '#28B463';
                    bg_color = '#28B46318';
                }else{
                    icono_show = 'fa-close';
                    color_icono= '#c01313';
                    bg_color = '#c0131318';
                }
                $('#historialAut').append(`
                        <div class="d-flex mb-2">
                            <div class="w-10 d-flex justify-center align-center">
                                <span style="width:40px; height:40px; display:flex; justify-content:center; align-items:center; border-radius:27px; background-color: `+bg_color+`">
                                    <i class="fas `+icono_show+` fs-2" style="color: `+color_icono+` "></i>
                                </span>
                            </div>
                            <div class="w-90">
                                <b>${data[i]['creadoPor']}</b>
                                ${estatus == 1 && comentario=='' ? '' : '<p class="m-0" style="font-size:12px">'+comentario+'</p>' }
                                <p class="m-0" style="font-size:10px; line-height:12px; color:#999">${moment(data[i]['fecha_movimiento'].split('.')[0],'YYYY/MM/DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss')}</p>
                            </div>
                        </div>`)
            }
        }, 'json');
    }
    else if(arr.length > 1){
        let url_action = general_base_url+'Contraloria/getHistorialAutorizacionMSI';
        $.post(url_action, {
            id_autorizacion: idAutorizacion,
            modo: 2
        }, function (data) {
            var len = data.length;
            var contenido_acordeon;

            contenido_acordeon = ' <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">' +
                '                        <div class="panel-group" id="accordion">' +
                '                            <div class="panel panel-default">';
            for (var i = 0; i < len; i++) {

                let estatus=data[i]['estatus_autorizacion'];
                let comentario = data[i]['comentario'];
                let nombreCondominio = data[i]['nombre'];
                let idHistorial = data[i]['idHistorial'];
                let data_historial = data[i]['data_historial'];
                let icono_show;
                let color_icono;
                let bg_color;


                contenido_acordeon += `
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#historial`+idHistorial+`">
                                    <h5>`+nombreCondominio+`</h5>
                                </a>
                                </h4>
                                </div>
                                <div id="historial`+idHistorial+`" class="panel-collapse collapse ">
`;

                data_historial.map((element, index)=>{
                    if(element.estatus_autorizacion==1 || element.estatus_autorizacion==2 || element.estatus_autorizacion==3){
                        icono_show = 'fa-check';
                        color_icono= '#28B463';
                        bg_color = '#28B46318';
                    }else{
                        icono_show = 'fa-close';
                        color_icono= '#c01313';
                        bg_color = '#c0131318';
                    }
                    contenido_acordeon += `
                                   
                                        <div class="panel-body">
                                           <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="col col-xs-12 col-md-3 col-lg-3"> 
                                                    <div class="w-50 d-flex justify-center align-center">
                                                        <span style="width:40px; height:40px; display:flex; justify-content:center; align-items:center; border-radius:27px; background-color: `+bg_color+`">
                                                            <i class="fas `+icono_show+` fs-2" style="color: `+color_icono+` "></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col col-xs-12 col-md-7 col-lg-7"> 
                                                    <b>${element.creadoPor}</b>
                                                    ${element.estatus == 1 && element.comentario == '' ? '' : '<p class="m-0" style="font-size:12px">' + element.comentario + '</p>'}
                                                    <p class="m-0" style="font-size:10px; line-height:12px; color:#999">${moment(element.fecha_movimiento.split('.')[0], 'YYYY/MM/DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss')}</p>
                                                </div>
                                           </div>
                                        </div>
                                
                    `;
                });
                contenido_acordeon +=`</div>`;
            }
            contenido_acordeon += `
                            </div>
                        </div>
                    </div>`;

            $('#historialAut').append(contenido_acordeon);
        }, 'json');
    }
    //neuvo






    $("#modalHistorial").modal();
});


$(document).on('submit', '#cambiosMSIF', function(e) {
    e.preventDefault();
    var params = tablaMsiVisualizar.$('input').serialize();
    // console.log(tablaMsiVisualizar);
    // console.log(params);

    let array = createArrayEvents(params);
    if (array.length === 0)
        alerts.showNotification("top", "right", "No hay ningún registro que modificar.", "warning");
    else {
        let data = new FormData();
        data.append("data", JSON.stringify(array));
        data.append("id_aut", dataUpdateGeneral[0]);
        data.append("modo", dataUpdateGeneral[1]);
        $.ajax({
            type: 'POST',
            url: general_base_url+'Contraloria/actualizarMSI',
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#spiner-loader').removeClass('hide');
            },
            success: function(data) {
                data = JSON.parse(data);
                if(data.message == 'OK'){
                    $('#spiner-loader').addClass('hide');
                    alerts.showNotification("top", "right",'Se actualizó correctamente', "success");
                    $('#verAut').modal('hide');
                }else if(data.message == 'ERROR'){
                    $('#spiner-loader').addClass('hide');
                    alerts.showNotification("top", "right",'Ha ocurrido un error al actualizar' +
                        ' el registro, intentalo nuevamente', "error");
                }
            },
            error: function() {
                $('#spiner-loader').addClass('hide');
                alerts.showNotification("top", "right", "Oops, algo salió mal.", "danger");
            }
        });
    }

});

$(document).on('click', '.btnEditar', function(e){
    let id_aut = $(this).attr('data-idautorizacion');
    let data = [];
    // console.log(id_aut);
    let arr = id_aut.split(' ');

    if(arr.length <= 1){
        let id = parseInt(id_aut);
        data["url"] = general_base_url+'Contraloria/getAutVis/'+id+'/1';
        data['edit'] = 1;
        dataUpdateGeneral[0] = id_aut;
        dataUpdateGeneral[1] = 1;//tipo_update
    }else if(arr.length > 1){
        data["url"] = general_base_url+'Contraloria/getAutVis/'+id_aut+'/2';
        data['edit'] = 1;
        dataUpdateGeneral[0] = id_aut;
        dataUpdateGeneral[1] = 2;//tipo_update

    }
    //tipo_update: 1 NORMAL(lote), 2:condominio

    // data["url"] = general_base_url+'Contraloria/getAutVis/'+id_aut; //ORIGINAL
    // data['edit'] = 1;                                               //ORIGINAL
    $('#cambiosGuardaMSI').removeClass('hide');
    loadTableVAUT(data);
    $('#verAut').modal('show');
});

function createArrayEvents(params){
    // console.log(params);
    array = [], obj = {};
    var nameWithValue = params.split('&');
    // debugger;
    let flagJump = 3;
    let tempArray= [];
    for(i=0; i<nameWithValue.length; i++){

        var objAttr = nameWithValue[i].split('=');
        if(flagJump == 3) {
            obj.ID = objAttr[1];
        }else if(flagJump == 2){
            obj.LOTE=objAttr[1];
        }else if(flagJump == 1){
            obj.MSNI=objAttr[1];
        }
        flagJump = flagJump-1;
        if(flagJump == 0){
            flagJump = 3;
            // if(objAttr[1]!=0){
            array.push(obj);
            // }
            tempArray = [];
            obj = {};
        }
        // debugger;
    }
    return array;
}

$(document).on('click', '.btnAvanzar', function(){
    //$modo 1: LOTE 2:CONDOMINIO
    let id_aut = $(this).attr('data-idautorizacion');
    document.getElementById('comentarioAvance').value=''; //limpiar campo texto
    let arr = id_aut.split(' ');
    if(arr.length <= 1){
        dataUpdateGeneral[2] = 1; //modo al cual de va avanzar

    }
    else if(arr.length > 1){
        dataUpdateGeneral[2] = 2; //modo al cual de va avanzar

    }


    dataUpdateGeneral[0] = id_aut;
    if(id_rol_general==17 || id_rol_general==70){//revisar si es contraloria
        dataUpdateGeneral[1] = 3; //estatus de autorizacion a actualizar
        $('#tittleModal').text('¿Deseas autorizar los meses sin intereses?');
        $('#leyendaAdv').text('Al aceptar se renovarán los MSI autorizados');
    }else{
        dataUpdateGeneral[1] = 2; //estatus de autorizacion a actualizar
        $('#tittleModal').text('Avanzar autorización');
    }

    $('#avanzarAut').modal('show');
});
$(document).on('click', '#enviarAutBtn', ()=>{
    let id_aut = dataUpdateGeneral[0];
    let comentario = $('#comentarioAvance').val();
    let estatus_autorizacion = dataUpdateGeneral[1];
    let modo = dataUpdateGeneral[2];
    if(comentario==' ' || comentario.length==0){
        alerts.showNotification("top", "right",'Ingresa un comentario', "danger");
        $('#comentarioAvance').focus();
    }else{
        let data = new FormData();
        data.append("id_aut", id_aut);
        data.append("comentario", comentario);
        data.append("estatus_autorizacion", estatus_autorizacion);
        data.append("modo", modo);

        $.ajax({
            type: 'POST',
            url: general_base_url+'Contraloria/actualizaAutMSI',
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#spiner-loader').removeClass('hide');
            },
            success: function(data) {
                data = JSON.parse(data);
                if(data.message == 'OK'){
                    $('#spiner-loader').addClass('hide');
                    $('#tabla_aut').DataTable().ajax.reload();
                    $('#comentarioAvance').val();
                    alerts.showNotification("top", "right",'Se ha enviado la autorización correctamente', "success");
                    $('#avanzarAut').modal('hide');
                }else if(data.message == 'ERROR'){
                    $('#spiner-loader').addClass('hide');
                    alerts.showNotification("top", "right",'Ha ocurrido un error al avanzar' +
                        ' el registro, intentalo nuevamente', "danger");
                }
            },
            error: function() {
                $('#spiner-loader').addClass('hide');
                alerts.showNotification("top", "right", "Oops, algo salió mal.", "danger");
            }
        });

    }


});


/*Rechazar autorizacion CN*/
$(document).on('click', '.btnRechazar', function(){
    let id_aut = $(this).attr('data-idautorizacion');
    document.getElementById('comentarioAvance').value=''; //limpiar campo texto

    let arr = id_aut.split(' ');
    if(arr.length <= 1){
        dataUpdateGeneral[2] = 1; //modo al cual se va a rechazar

    }
    else if(arr.length > 1){
        dataUpdateGeneral[2] = 2; //modo al cual se va a rechazar

    }

    dataUpdateGeneral[0] = id_aut;
    dataUpdateGeneral[1] = 4; //estatus de autorizacion a actualizar

    $('#tittleModal').text('Rechazar autorización');
    $('#leyendaAdv').text('');
    $('#avanzarAut').modal('show');
});