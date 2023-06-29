let tablaCanceladas;

$('#canceladas-tabla').ready(function () {
    let titulos = [];
    $('#canceladas-tabla thead tr:eq(0) th').each(function (i) {
        const title = $(this).text();
        titulos.push(title);

        $(this).html('<input type="text" class="textoshead" placeholder="' + title + '"/>');
        $('input', this).on('keyup change', function () {
            if (tablaCanceladas.column(i).search() !== this.value) {
                tablaCanceladas.column(i).search(this.value).draw();
            }
        });
    });

    tablaCanceladas = $('#canceladas-tabla').DataTable({
        dom: 'Brt'+ "<'row'<'col-xs-12 col-sm-12 col-md-6 col-lg-6'i><'col-xs-12 col-sm-12 col-md-6 col-lg-6'p>>",
        width: 'auto',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                className: 'btn buttons-excel',
                titleAttr: 'Descargar archivo de Excel',
                title: 'REPORTE COMISIONES CANCELADAS',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4,5,6],
                    format: {
                        header: function (d, columnIndex) {
                            return titulos[columnIdx - 1];
                        }
                    }
                }
            }
        ],
        pagingType: "full_numbers",
        fixedHeader: true,
        language: {
            url: url+"/static/spanishLoader_v2.json",
            paginate: {
                previous: "<i class='fa fa-angle-left'>",
                next: "<i class='fa fa-angle-right'>"
            }
        },
        destroy: true,
        ordering: false,
        columns: [
            {
                'width': '10%',
                'data': function (d) {
                    return `<p class="m-0">${d.idLote}</p>`;
                }
            },
            {
                'width': '25%',
                'data': function (d) {
                    return `<p class="m-0">${d.referencia}</p>`;
                }
            },
            {
                'width': '25%',
                'data': function (d) {
                    return `<p class="m-0">${d.nombreResidencial}</p>`;
                }
            },
            {
                'width': '25%',
                'data': function (d) {
                    return `<p class="m-0">${d.nombreLote}</p>`;
                }
            },
            {
                'width': '20%',
                'data': function (d) {
                    return `<p class="m-0">${d.nombre_cliente}</p>`;
                }
            },
            {
                'width': '25%',
                'data': function (d) {
                    return `<p class="m-0">${d.plan_descripcion}</p>`;
                }
            },
            {
                'width': '15%',
                'data': function (d) {
                    return `<p class="m-0">${formatMoney(d.comision_total)}</p>`;
                }
            },
            {
                'width': '5%',
                'data': function (d) {
                    return `
                        <div class="d-flex justify-center">
                            <button class="btn-data btn-sky"
                                title="Detalle"
                                onclick="detalleLote(${d.idLote}, ${d.idCliente})">
                                <i class="material-icons">info</i>
                            </button>
                        </div>
                    `;
                }
            }
        ],
        ajax: {
            url: url+'Comisiones/getVentasCanceladas',
            type: "GET",
            data: function (d) {}
        }
    });
});

function detalleLote(idLote, idCliente) {
    $.ajax({
        url: `${url}Comisiones/getDetailVentaCancelada/${idLote}/${idCliente}`,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            const modalBody = $('#detalle-modal .modal-body');

            modalBody.html('');

            modalBody.append(`
                <div class="row mb-3">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <h4><b>Lote: ${response.cantidades.nombreLote}</b></h4>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <h4>Total pago: <b>$${formatMoney(response.cantidades.comision_total)}</b></h4>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <h4>Total abonado: <b>$${formatMoney(response.cantidades.abonado)}</b></h4>
                    </div>
                </div>
            `);

            modalBody.append(`
                    <div class="row">
                        <div class="col-md-4">
                            <b>USUARIOS</b>
                        </div>
                        <div class="col-md-1">
                            <b>%</b>
                        </div>
                        <div class="col-md-2">
                            <b>TOT. COMISIÓN</b>
                        </div>
                        <div class="col-md-2">
                            <b>ABONADO</b>
                        </div>
                        <div class="col-md-2">
                            <b>PENDIENTE</b>
                        </div>
                    </div>
                `);

            $.each(response.detalle, function (i, row) {
                modalBody.append(`
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control ng-invalid ng-invalid-required"
                                required
                                readonly="true"
                                value="${row.colaborador}"
                                style="font-size:12px; ${row.descuento === "1" ? 'color:red;' : ''}">
                                    <b>
                                        <p style="font-size:12px;${row.descuento === '1' ? 'color:red;' : ''} ">
                                            ${row.descuento !== '1' ?  row.rol : row.rol +' Incorrecto' }
                                        </p>
                                    </b>
                        </div>
                        <div class="col-md-1">
                            <input class="form-control ng-invalid ng-invalid-required"
                                style="${row.descuento === '1' ? 'color:red;' : ''}"
                                required
                                readonly="true"
                                value="${row.porcentaje_decimal}%">
                        </div>
                        <div class="col-md-2">
                            <input class="form-control ng-invalid ng-invalid-required"
                                style="${row.descuento === '1' ? 'color:red;' : ''}"
                                required
                                readonly="true"
                                value="$${formatMoney(row.comision_total)}">
                        </div>
                        <div class="col-md-2">
                            <input class="form-control ng-invalid ng-invalid-required"
                                style="${row.descuento === '1' ? 'color:red;' : ''}"
                                required
                                readonly="true"
                                value="$${formatMoney(row.abono_pagado)}">
                        </div>
                        <div class="col-md-2">
                            <input class="form-control ng-invalid ng-invalid-required"
                                style="${row.pending < 0 ? 'color:red' : ''}"
                                required
                                readonly="true"
                                value="$${formatMoney(row.pending)}">
                        </div>
                    </div>
                `)
            })

            $('#detalle-modal').modal();
        }
    });
}

function formatMoney(n) {
    var c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = (d === undefined) ? "." : d,
        t = (t === undefined) ? "," : t,
        s = n < 0 ? "-" : "",
        i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}