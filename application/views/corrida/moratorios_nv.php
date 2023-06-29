<!DOCTYPE html>
<html lang="es" ng-app = "myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ciudad Maderas | Cálculo de Moratorios</title>
    <!-- Tell the browser to be responsive to screen width -->

    <link rel="shortcut icon" href="<?=base_url()?>static/images/arbol_cm.png" />


    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url()?>dist/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>dist/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url()?>dist/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url()?>dist/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=base_url()?>dist/css/moratorio-stl.css">



    <link rel="stylesheet" href="<?=base_url()?>dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>dist/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">


    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url("static/angular/datatable/dataTables.buttons.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("static/angular/datatable/angular-datatables.buttons.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("static/angular/datatable/angular-datatables.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("static/angular/datatable/buttons.html5.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("static/angular/datatable/buttons.colVis.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("static/angular/datatable/buttons.flash.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("static/angular/datatable/buttons.print.min.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("static/angular/datatable/dataTables.editor.min.js")?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?= base_url("static/angular/datatable/buttons.dataTables.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("static/angular/datatable/editor.dataTables.min.css")?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.7.0/lodash.min.js"></script>
    <script type="text/javascript" src="<?= base_url("static/js/angularjs-dropdown-multiselect.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("static/js/calcularAC.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("dist/js/funciones-generales.js")?>"></script>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/angular.checklist-model/0.1.3/checklist-model.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>






    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;800&display=swap" rel="stylesheet">
    <style type="text/css">
        .contenedorinputs {
            position: relative;
        }
        ul li{
            list-style: none;
            display: block;
            padding-bottom: 2em;
        }
        .inputradio{
            opacity: 0; /* Ocultamos el input verdadero con opacity: 0 */
            width: 20px;
            height: 20px;
            position: absolute;
            left: 0px;
        }
        .inputfalso{
            border: 5px solid #dedede;
            border-radius: 10%;
            display: inline-block;
            height: 20px;
            position: absolute;
            left: 0px;
            width: 21px;
            z-index: -1;
        }
        input[type="checkbox"]:checked + span:after {
            content: "✔";
            position: absolute;
            text-indent: 2px;
            top: -5px;
            left: -2px;
            color: black;
        }


        legend {
            background-color: #296D5D;
            color: #fff;
            padding: 3px 6px;
        }

        .output {
            font: 1rem 'Fira Sans', sans-serif;
        }

        .foreach {
            background: #4C9B79;
            height: 15.5em;
            width:auto;
            border-radius: 10px;
            padding:10px;
            font-size:15px;
            color:#fff;
            margin-bottom: 30px;

        }
        label{
            font-family: 'Open Sans', sans-serif;
            font-weight: 500;
        }
        span{
            font-family: 'Open Sans', sans-serif;
            font-weight: 500;
        }
        input select{
            font-family: 'Open Sans', sans-serif;
        }
        h3{
            font-family: 'Open Sans', sans-serif;
        }
        .pull-right{
            float: right !important;
            padding: 10px 0px;
        }
    </style>
    <style type="text/css">


        .panel-pricing {
            -moz-transition: all .3s ease;
            -o-transition: all .3s ease;
            -webkit-transition: all .3s ease;
        }
        .panel-pricing:hover {
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
        }
        .panel-pricing .panel-heading {
            padding: 20px 10px;
        }
        .panel-pricing .panel-heading .fa {
            margin-top: 10px;
            font-size: 58px;
        }
        .panel-pricing .list-group-item {
            color: #777777;
            border-bottom: 1px solid rgba(250, 250, 250, 0.5);
        }
        .panel-pricing .list-group-item:last-child {
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
        }
        .panel-pricing .list-group-item:first-child {
            border-top-right-radius: 0px;
            border-top-left-radius: 0px;
        }
        .panel-pricing .panel-body {
            background-color: #f0f0f0;
            font-size: 40px;
            color: #777777;
            padding: 20px;
            margin: 0px;
        }


        /*nuevos estilos*/
        .loader,
        .loader:before,
        .loader:after {
            background: #ffffff;
            -webkit-animation: load1 1s infinite ease-in-out;
            animation: load1 1s infinite ease-in-out;
            width: 1em;
            height: 4em;
        }
        .loader {
            color: #ffffff;
            text-indent: -9999em;
            margin: 88px auto;
            position: relative;
            font-size: 11px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }
        .loader:before,
        .loader:after {
            position: absolute;
            top: 0;
            content: '';
        }
        .loader:before {
            left: -1.5em;
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }
        .loader:after {
            left: 1.5em;
        }
        @-webkit-keyframes load1 {
            0%,
            80%,
            100% {
                box-shadow: 0 0;
                height: 4em;
            }
            40% {
                box-shadow: 0 -2em;
                height: 5em;
            }
        }
        @keyframes load1 {
            0%,
            80%,
            100% {
                box-shadow: 0 0;
                height: 4em;
            }
            40% {
                box-shadow: 0 -2em;
                height: 5em;
            }
        }

        .bkLoading
        {
            /* background:#000; *//*b3b3b3*/
            background-image: linear-gradient(to bottom, #000, #000);
            position:fixed;
            top:0%;
            left:0%;
            width:100%;
            height:100%;
            z-index:999;
            padding-top:200px;
            color:white;
            font-weight:300;
            opacity: 0.5;
            /* display:none; */
        }
        .center-align
        {
            text-align:center;
            font-size:2em;
            font-weight:lighter;
        }
        .hide
        {
            display:none !important;
        }
        .groupInputInteres input{
            text-align: center;
        }
        .ng-invalid-max
        {
            /*background-color: #ffa17f;*/
            border: 1px solid red !important;
        }
        .ng-valid-max
        {
            border: 1px solid green !important;
        }
        .btn-a {
            border-radius:19px !important;
            height: 30px !important;
            width: 30px !important;
            padding: 5px 6px !important;
        }
        .btn-circle {
            width: 50px;
            height: 50px;
            padding: 6px 0px;
            border-radius: 30px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
            background-color: rgb(52,199,89);
            color: #fff;
            border: 0px;
            transition-duration: 0.3s;
            margin:4px;
        }
        .btn-circle:hover{
            background-color: rgb(54,166,77);
            color: #fff;
            transition-duration: 0.3s;
        }
        .btn-float{
            float: right;
            bottom: 2%;
            right: 3%;
            position: fixed;
        }
        .blue{
            background-color:#337ab7;
            transition-duration: 0.3s;
            color: white;
        }
        .blue:hover{
            background-color: #003e97;
            transition-duration: 0.3s;
            color: white;
        }
        .buttons-excel {
            box-shadow: none !important;
            padding: 7px 25px !important;
            color: #209E63 !important;
            background-color: #ffffff !important;
            border: 1px solid #209E63 !important;
            border-radius: 27px !important;
            margin: -6px 18px 0px 0px !important
        }

        .buttons-excel i {
            color: #209E63 !important;
        }

        .buttons-excel:hover {
            background-color: #209E63 !important;
            border: 1px solid #209E63 !important;
            color:white !important;
            background-image: none !important;
        }

        .buttons-excel:hover i {
            color: #ffffff !important;
        }
        /*Terminan los nuevos estilos*/
        .bodyOverFlow{
            overflow-y: hidden !important;
        }
        .justify-between {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

    </style>
</head>
<body class="hold-transition" ng-controller = "myController" style="background: #e1e1e1">


<div class="bkLoading hide" id="loaderDiv">
    <div class="center-align">
        <img src="<?=base_url()?>static/images/logo_blanco_cdm.png" style="width:25%;"><br>
        Este proceso puede demorar algunos segundos, espere por favor ...
    </div>
    <div class="inner">
        <div class="load-container load1">
            <div class="loader">
            </div>
        </div>
    </div>
</div>

<section>
    <div class="col col-xs-12 col-sm-12 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1" style="background: #fff; margin-top: 60px;border-radius: 10px">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 cnt-1">
            <div class="row">
                <!--			<div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">-->
                <!--				<h3 class="font-light titleMoratorio" style="font-size: 2.5em;padding-top: 15px">-->
                <!--					Calculo de <b>Moratorios</b>-->
                <!--				</h3>-->
                <!--			</div>-->
                <!--			<div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6 right-align">-->
                <!--				<img src="--><?//=base_url()?><!--static/images/CMOF.png">-->
                <!--			</div>-->
                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 center-align " style="padding: 50px 0px 0px 0px">
                    <center><img src="https://maderascrm.gphsis.com/static/images/Logo_CM&TP_1.png" class="img-responsive" width="30%"></center>
                    <h3 class="font-light titleMoratorio" style="text-align: center;font-size: 1.5em;margin-top: 50px;background: #0a548b;color:white;padding: 7px">
                        Cálculo de <b>Moratorios</b>
                    </h3>
                </div>
                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: right;padding: 20px">
                    <a href="javascript:window.history.back();"><i class="fa fa-chevron-left"></i> Regresar</a>
                </div>
            </div>
            <div class="row">
                <div class="container-fluid center-align pdt-2">
                </div>
                <div class="container-fluid col-xs-12 col-sm-12 col-md-12 col-lg-12" ><!--style="background: #ddd;padding: 50px; border-radius: 10px" -->
                    <!--                <hr>-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <input type="hidden" ng-model="minArray" id="minValueId" name="minName">
                        <input type="hidden" ng-model="maxArray" id="maxValueId" name="maxName">


                        <input type="hidden" ng-click="addCheckToArray()" ng-model="chInPago" id="pagoChecked" name="checkPagoname">
                        <input type="hidden" ng-click="pagoACapital()" ng-model="pagoACapitalName" id="jsPagoImporte" name="importePagoJS">
                        <input type="hidden" ng-model="pagoADiasRetPosition" id="pagoADiasRetPositionJS" name="pagoDiasRetPosicionJS">
                        <input type="hidden" ng-model="diasRet" id="diasRetNumberJS" name="diasRetardoNumberJS">
                        <input type="hidden" ng-model="fechaPago" id="fechaPagoJS" name="fechaPagoJS">
                        <input type="hidden" ng-model="siPosition" id="siPosJS" name="siCurrentNameJs">

                        <div class="row">
                            <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                <label for="plazoField">Plazo</label>
                                <input type="number" class="form-control" id="plazoField" aria-describedby="plazoHelp" placeholder="30"
                                       ng-model="plazoField" max="240">
                                <small id="plazoHelp" class="form-text text-muted">Ingresa el plazo en meses.</small>
                            </div>
                            <div class="form-group  col-sm-12 col-md-3 col-lg-3">
                                <label for="fechaField">Fecha de corte</label>
                                <input type="date" class="form-control" id="fechaField" aria-describedby="dateBillHelp" placeholder="14/08/2020"
                                       ng-model="fechaField">
                                <small id="dateBillHelp" class="form-text text-muted">&nbsp;</small>
                            </div>
                            <div class="form-group  col-sm-12 col-md-4 col-lg-4">
                                <label for="fechaField">Fecha de Pago</label>
                                <input type="date" class="form-control" id="fechaPago" aria-describedby="datePayHelp" placeholder="14/08/2020"
                                       ng-model="fechaPagoField">
                                <small id="datePayHelp" class="form-text text-muted">&nbsp;</small>
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                <label for="SIField">Saldo insoluto</label>
                                <input type="tel" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency"  class="form-control"
                                       id="SIField" aria-describedby="siHelp" placeholder="230,000"
                                       ng-model="SIField">
                                <small id="siHelp" class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-xs-12 col-sm-12 col-md-offset-8 col-lg-offset-8 col-md-4 col-lg-4">
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 hide">
                                    <label>Interés Ordinario Acumulado</label><br>
                                    <input id="resOrdinarioAdeuto" style="border: 0px; border-bottom: 1px solid #ddd"
                                           type="tel" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="$0.00">
                                    <input type="hidden" id="acumuladoOrdinarioBruto">
                                </div>
                                <div class="form-group  col-sm-12 col-md-8 col-lg-8 ">
                                    <label>Interés Moratorio Acumulado</label><br>
                                    <input id="resMoratorioAdeuto" style="border: 0px; border-bottom: 1px solid #ddd"
                                           type="tel" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="$0.00" disabled>
                                    <input type="hidden" id="acumuladoBruto">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4" style="text-align: center">
                                    <br>
                                    <button class="btn btnCalcular" type="button" ng-click="showVals()">CALCULAR</button>
                                </div>
                            </div>



                            <input type="hidden" ng-model="msiField" value="0" id="msiField">
                            <div class="form-group hide">
                                <label for="msiField">MSI (meses sin intereses)</label>
                                <input type="number" class="form-control" id="msiField" aria-describedby="msiHelp" placeholder="15"
                                       ng-model="msiField" max="36">
                                <small id="msiHelp" class="form-text text-muted"></small>
                            </div>
                            <input type="hidden" ng-model="imField" value="2.5376"  id="imField">
                            <div class="form-group hide">
                                <label for="imField">I.M (Interés moratorio) </label>
                                <input type="number" class="form-control" id="imField" aria-describedby="imHelp" placeholder="2.5"
                                       ng-model="imField" max="100">
                                <small id="imHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!--            <div class="container-fluid">-->
                        <hr>
                        <br>
                        <div class="table table-responsive">
                            <table datatable="ng" class="table table-striped table-bordered table-hover table-condensed text-center" dt-options="dtoptions" dt-columns="dtColumns" dt-column-defs="dtColumnDefs" id="tblAmortizacion">
                                <!--<thead>--><!--</thead>-->
                                <!--<tbody>-->



                                <!--	<tr ng-repeat= "i in rangEds">-->
                                <!--		  <td>{{ i.fecha | date:'dd-mm-yyyy'}}</td>-->
                                <!--		  <td>{{ i.pago }}</td>              -->
                                <!--		  <td>{{ i.capital | currency }}</td>-->
                                <!--		  <td>{{ i.interes | currency }}</td>-->
                                <!--		  <td>{{ i.total | currency }}</td>-->
                                <!--		  <td>{{ i.saldo | currency }}</td>-->
                                <!--		  <td></td>-->
                                <!--	</tr>-->

                                <!--	<tr ng-repeat= "i in range">-->

                                <!--		  <td>{{ i.fecha | date:'dd-mm-yyyy'}}</td>-->
                                <!--		  <td>{{ i.pago }}</td>              -->
                                <!--		  <td>{{ i.capital | currency }}</td>-->
                                <!--		  <td>{{ i.interes | currency }}</td>-->
                                <!--		  <td>{{ i.total | currency }}</td>-->
                                <!--		  <td>{{ i.saldo | currency }}</td>-->
                                <!--		  <td></td>-->

                                <!--	</tr>-->
                                <!--</table>-->

                                <!--<table class="table table-striped table-bordered table-hover table-condensed text-center">-->
                                <!--	<tr>-->
                                <!--		  <th>Fechas</th>-->
                                <!--		  <th>Pago #</th>-->
                                <!--		  <th>Capital</th>-->
                                <!--		  <th>Intereses</th>-->
                                <!--		  <th>Total</th>-->
                                <!--		  <th>Saldo</th>-->
                                <!--		  <th>Pagos a Capital</th>-->
                                <!--	</tr>-->
                                <!--	<tr ng-repeat= "i in range2">-->

                                <!--		  <td>{{ i.fecha | date:'dd-MM-yyyy'}}</td>-->
                                <!--		  <td>{{ i.pago }}</td>              -->
                                <!--		  <td>{{ i.capital | currency }}</td>-->
                                <!--		  <td>{{ i.interes | currency }}</td>-->
                                <!--		  <td>{{ i.total | currency }}</td>-->
                                <!--		  <td>{{ i.saldo | currency }}</td>-->
                                <!--		  <td></td>-->

                                <!--	</tr>-->
                                <!--</table> -->
                                <!--<table class="table table-striped table-bordered table-hover table-condensed text-center">-->
                                <!--	<tr>-->
                                <!--		  <th>Fechas</th>-->
                                <!--		  <th>Pago #</th>-->
                                <!--		  <th>Capital</th>-->
                                <!--		  <th>Intereses</th>-->
                                <!--		  <th>Total</th>-->
                                <!--		  <th>Saldo</th>-->
                                <!--		  <th>Pagos a Capital</th>-->
                                <!--	</tr>-->
                                <!--	<tr ng-repeat= "i in range3">-->

                                <!--		  <td>{{ i.fecha | date:'dd-MM-yyyy'}}</td>-->
                                <!--		  <td>{{ i.pago }}</td>              -->
                                <!--		  <td>{{ i.capital | currency }}</td>-->
                                <!--		  <td>{{ i.interes | currency }}</td>-->
                                <!--		  <td>{{ i.total | currency }}</td>-->
                                <!--		  <td>{{ i.saldo | currency }}</td>-->
                                <!--		  <td>{{ i. }}</td>-->

                                <!--	</tr>-->
                                <!--</tbody>-->
                            </table>
                        </div>
                        <!--            </div>-->
                        <div class="row hide" style="text-align: center">
                            <div class="container-fluid">
                                <strong><span><i>Esta simulación constituye un ejercicio numérico que no implica ningún compromiso de Ciudad Maderas o de sus marcas comerciales, CIUDAD MADERAS. Solo sirve para fines de orientación.</i></span></strong>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>




<script>


    var myApp = angular.module ('myApp', ['checklist-model','datatables', 'datatables.buttons']);
    myApp.controller('myController', function ($scope, $http, $window, DTOptionsBuilder, DTColumnBuilder) {
        $scope.dtoptions = DTOptionsBuilder;
        $scope.dtColumns = [
            DTColumnBuilder.newColumn('fecha').withTitle('Fechas'),
            // DTColumnBuilder.newColumn('amc').withTitle('Pagados')
            //     .renderWith(
            //         function (data, type, full, meta) {
            //
            //             var inputCapital = '<input name="checkAd' + full["pago"] + '" type="checkbox" id="ckNoPay' + full["pago"] + '" onchange="noPayMen(' + full["pago"] + ')">';//onchange="pagoCapChange('+full["pago"]+')"
            //             return inputCapital;
            //         },
            //     ),
            DTColumnBuilder.newColumn('pago').withTitle('Pago #'),
            DTColumnBuilder.newColumn('importe').withTitle('Importe')
                .renderWith(
                    function(data, type, full, meta)
                    {
                        var input_val = full['importe'].toFixed(2);

                        // don't validate empty input
                        if (input_val === "") { return; }

                        // original length
                        var original_len = input_val.length;


                        // console.log('IMPURTE', input_val.toFixed(2));

                        // check for decimal
                        if (input_val.indexOf(".") >= 0) {

                            // get position of first decimal
                            // this prevents multiple decimals from
                            // being entered
                            var decimal_pos = input_val.indexOf(".");

                            // split number by decimal point
                            var left_side = input_val.substring(0, decimal_pos);
                            var right_side = input_val.substring(decimal_pos);

                            // add commas to left side of number
                            left_side = formatNumber(left_side);

                            // validate right side
                            right_side = formatNumber(right_side);

                            // On blur make sure 2 numbers after decimal
                            if (blur === "blur") {
                                right_side += "00";
                            }

                            // Limit decimal to only 2 digits
                            right_side = right_side.substring(0, 2);

                            // join number by .
                            input_val = "$" + left_side + "." + right_side;

                        } else {
                            // no decimal entered
                            // add commas to number
                            // remove all non-digits
                            input_val = formatNumber(input_val);
                            input_val = "$" + input_val;

                            // final formatting
                            if (blur === "blur") {
                                input_val += ".00";
                            }
                        }
                        // console.log(input_val);
                        var inputCapital_cantidad = input_val;
                        return inputCapital_cantidad;
                    },
                ),
            DTColumnBuilder.newColumn('fechaPago').withTitle('Fecha de pago')
                .renderWith(
                    function(data, type, full, meta)
                    {
                        var dateCurrent = full['fecha'];
                        var datePays = dateCurrent.split("-").reverse().join("-");

                        var dayPay;
                        var posicionDate = dateCurrent.split('-');
                        var mesPay = posicionDate[1];
                        var anioPay = posicionDate[2];
                        dayPay=daysInMonth(mesPay, anioPay);

                        // console.log(posicionDate[1]);
                        // console.log(porciones[2]);
                        let formatDate = new Date($scope.fechaPagoField);
                        let year = formatDate.getFullYear();
                        let month = ((formatDate.getMonth()+1)<10)?'0'+(formatDate.getMonth()+1) : (formatDate.getMonth()+1);
                        let day = (formatDate.getDate()<10) ? '0'+formatDate.getDate() : formatDate.getDate();
                        // return '<div class="justify-between ">'+inputCapital+currentDateRow+button_action+'</div>';
                        let formatDatePago = new Date(full["fechaDePago"]);

                        // let year = formatDatePago.getFullYear();
                        // let month = ((formatDatePago.getMonth()+1)<10)?'0'+(formatDatePago.getMonth()+1) : (formatDatePago.getMonth()+1);
                        let dayP = (formatDatePago.getDate()<10) ? '0'+formatDatePago.getDate() : formatDatePago.getDate();
                        let fechaPagoP = year+'-'+month+'-'+day;
                        let fechaPagoExcel = day+'-'+month+'-'+year;
                        var fechaExcel = '<label class="hide"><center>'+fechaPagoExcel+'</center></label>';
                        var inputDate = '<input name="dRet'+full["pago"]+'" type="date" id="idDiasRet'+full["pago"]+'" value="'+fechaPagoP+'"  class="form-control" disabled>';/*max="'+anioPay+'-'+mesPay+'-'+dayPay+'"*/
                        return inputDate+fechaExcel;

                    },
                ),
            DTColumnBuilder.newColumn('diasRetraso').withTitle('Días de retraso')
                .renderWith(
                    function(data, type, full, meta)
                    {
                        var dateCurrent = full['fecha'];
                        var datePays = dateCurrent.split("-").reverse().join("-");

                        var dayPay;
                        var posicionDate = dateCurrent.split('-');
                        var mesPay = posicionDate[1];
                        var anioPay = posicionDate[2];
                        dayPay=daysInMonth(mesPay, anioPay);

                        // console.log(porciones[0]);
                        // console.log(posicionDate[1]);
                        // console.log(porciones[2]);

                        // var inputCapital = '<input name="dRet'+full["pago"]+'" type="number" id="idDiasRet'+full["pago"]+'"  onchange="pagoCapChange('+full["pago"]+')" placeholder="Días retardo" class="form-control">';
                        var currentDateRow = '<input name="pagoDia'+full["pago"]+'" id="payDay'+full["pago"]+'" type="hidden" value="'+datePays+'"> ';
                        var inputCapital = '<input name="dRet'+full["pago"]+'" type="date" id="idDiasRet'+full["pago"]+'" onchange="pagoCapChange('+full["pago"]+')" min="'+anioPay+'-'+mesPay+'-02"   placeholder="Días retardo" class="form-control">';/*max="'+anioPay+'-'+mesPay+'-'+dayPay+'"*/
                        return '<center>'+full["diasRetraso"]+'</center>';
                    },
                ),
            DTColumnBuilder.newColumn('interesMoratorio').withTitle('Interés Moratorio').renderWith(
                function (data, type, full){
                    let interesMoratorio;

                    var input_val = full['interesMoratorio'].toFixed(2);
                    if (input_val === "") { return; }
                    var original_len = input_val.length;
                    if (input_val.indexOf(".") >= 0) {
                        var decimal_pos = input_val.indexOf(".");
                        var left_side = input_val.substring(0, decimal_pos);
                        var right_side = input_val.substring(decimal_pos);
                        left_side = formatNumber(left_side);
                        right_side = formatNumber(right_side);
                        if (blur === "blur") {
                            right_side += "00";
                        }
                        right_side = right_side.substring(0, 2);
                        input_val = "$" + left_side + "." + right_side;

                    } else {
                        input_val = formatNumber(input_val);
                        input_val = "$" + input_val;

                        // final formatting
                        if (blur === "blur") {
                            input_val += ".00";
                        }
                    }
                    return (full['interesMoratorio']).toLocaleString('es-MX', {style: 'currency', currency: 'MXN'})
                } ),
            DTColumnBuilder.newColumn('total').withTitle('Mensualidad').renderWith(function (data, type, full)
            {return (data).toLocaleString('es-MX', {style: 'currency', currency: 'MXN'})} ),
            DTColumnBuilder.newColumn('total').withTitle('Total').renderWith(function (data, type, full)
            {return (full['totalFinal']).toLocaleString('es-MX', {style: 'currency', currency: 'MXN'})} ),
        ];
        /*Others Vars*/
        $scope.mesesdiferir = 0;
        //INICIO FECHA
        var day;
        var month = (new Date().getMonth() + 1);
        var yearc = new Date().getFullYear();


        if (month == 1){
            day = '0' + 1;
        }
        if (month == 2){
            day = '0'+ 1;
        }
        if (month == 3){
            day = '0' + 3;
        }
        if (month == 4){
            day = '0' + 6;
        }
        if (month == 5){
            day = '0' + 7;
        }
        if (month == 6){
            day = '0' + 8;
        }
        if (month == 7){
            day = 11;
        }
        if (month == 8){
            day = 12;
        }
        if (month == 9){
            day = 13;
        }
        if (month == 10){
            day = 14;
        }
        if (month == 11){
            day = 16;
        }
        if (month == 12){
            day = 17;
        }
//FIN FECHA
        var mes = (new Date().getMonth() + 1);//($scope.apartado && $scope.mesesdiferir > 0) ? (new Date().getMonth() + 2) : (new Date().getMonth() + 3)

        var day;
        var month = (new Date().getMonth() + 1);
        var yearc = new Date().getFullYear();
        /**/
        $scope.showVals = function()
        {
            calculaMoratorio();
        };
        function calculaMoratorio() {
            console.log('se ejecutó el viejito');
            let fecha_input = new Date($scope.fechaField);
            let dayCorrect = (fecha_input.getDate() < 10) ? '0'+fecha_input.getDate() : fecha_input.getDate();
            let monthCorrect = ((fecha_input.getMonth()+ 1) < 10) ? '0'+(fecha_input.getMonth()+ 1) : (fecha_input.getMonth()+ 1);
            let yearCorrect = (fecha_input.getFullYear());
            console.log('fecha_input: ', fecha_input);
            console.log('día: ', dayCorrect);
            day = dayCorrect;
            mes = monthCorrect;
            yearc = yearCorrect;

            var saldoInsoluto = (document.getElementById('SIField').value).replace(/,/g, "");
            // console.log(saldoInsoluto.replace(/,/g, ""));
            // console.log('saldoInsoluto', saldoInsoluto.replace('$',''));
            //
            // var numb = saldoInsoluto.match(/\d/g);
            // numb = numb.join("");
            // var last2digts = numb.slice(-2);
            // console.log('Número', last2digts);
            // if(last2digts == "00")
            // {
            //     $scope.SIField = numb.replace(last2digts,'');
            // }
            // else
            // {
            //     $scope.SIField = numb;
            // }

            $scope.SIField = saldoInsoluto.replace('$','');


            $scope.imField = 2.5376;
            $scope.msiField = 0;
            $scope.infoMoratorio =
                {
                    plazo: $scope.plazoField,
                    im: $scope.imField,
                    si: $scope.SIField,//$scope.SIField
                    fechapago: $scope.fechaField,
                    mesesSinInteresP1: $scope.msiField,
                    mesesSinInteresP2: 120,
                    contadorInicial: 0,
                    capital: ($scope.SIField / $scope.plazoField),
                    interes_p1: 0,
                    interes_p2: 0.01,
                    interes_p3: 0.0125,
                    saldoNormal: $scope.SIField,
                };
            // console.log($scope.infoMoratorio);
            /*cálculo de mensualidades*/
            /**/
            if ($scope.infoMoratorio.plazo > 0 && $scope.infoMoratorio.plazo <= 36)
            {
                var range = [];
                ini = ($scope.mesesdiferir > 0) ? $scope.mesesdiferir : $scope.infoMoratorio.contadorInicial;
                if ($scope.infoMoratorio.plazo >= 0 && $scope.infoMoratorio.plazo <= 36) {
                    for (var i = ini; i <= $scope.infoMoratorio.mesesSinInteresP1 - 1; i++) {
                        if (mes == 13) {
                            mes = '01';
                            yearc++;
                        }
                        if (mes == 2) {
                            mes = '02';
                        }
                        if (mes == 3) {
                            mes = '03';
                        }
                        if (mes == 4) {
                            mes = '04';
                        }
                        if (mes == 5) {
                            mes = '05';
                        }
                        if (mes == 6) {
                            mes = '06';
                        }
                        if (mes == 7) {
                            mes = '07';
                        }
                        if (mes == 8) {
                            mes = '08';
                        }
                        if (mes == 9) {
                            mes = '09';
                        }
                        if (mes == 10) {
                            mes = '10';
                        }
                        if (mes == 11) {
                            mes = '11';
                        }
                        if (mes == 12) {
                            mes = '12';
                        }

                        $scope.fechapago = day + '-' + mes + '-' + yearc;
                        if (i == 0) {
                            $scope.fechaPM = $scope.fechapago;
                        }
                        var numfinalCount = i + 1;
                        // /*version 2.0*/
                        // var accessor = "" + numfinalCount + "";
                        var importeSaldoI = 0;
                        var diasRetardo = 0;
                        var checksArray = [];
                        var arrayCheckAllPost = [];

                        /*16diciembre*/
                        var max=0;
                        var min=0;
                        var check;

                        $scope.addCheckToArray = function()
                        {
                            var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                            var checkPagoname = document.getElementsByName("checkPagoname")[0].value;
                            console.log('Add to array: position ' + checkPagoname);
                            checksArray.push(checkPagoname);
                            max = Math.max.apply(null, checksArray);
                            min = Math.min.apply(null, checksArray);
                            // console.log(max);
                            // console.log(checksArray);
                            for(var x=min; x <= max; x++) {
                                var promMes = 30.4;
                                var diasRetraso = promMes * max;
                                console.log('sen a revisar los siguientes parametros');
                                document.getElementsByName('checkAd' + x)[0].checked	= true;
                                document.getElementsByName('checkAd' + x)[0].disabled	= true;
                                document.getElementsByName('importe' + x)[0].disabled	= true;
                                document.getElementsByName('dRet' + x)[0].disabled 		= true;
                                /*==ASIGN VALUE TO INPUTS==*/
                                if(document.getElementsByName('dRet' + x)[0].value =="" || document.getElementsByName('importe' + x)[0].value =="")
                                {
                                    // document.getElementsByName('dRet' + x)[0].value=30.4;
                                    // document.getElementsByName('importe' + x)[0].value=total;
                                    // console.log('se agrega a' + x);
                                }

                                if (arrayCheckAllPost.includes(x-1) == false)
                                {
                                    arrayCheckAllPost.push(x-1);
                                }
                                // $('#idDiasRet' + x).trigger('change');
                            }
                            var minInputSet =	document.getElementsByName("minName")[0];
                            var maxInputSet	=	document.getElementsByName("maxName")[0];

                            minInputSet.value=min;
                            maxInputSet.value=max;
                        }
                        $scope.pagoACapital = function () {
                            importeSaldoI = document.getElementsByName("importePagoJS")[0].value;
                            var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                            diasRetardo = document.getElementsByName("diasRetardoNumberJS")[0].value;
                            var InteresM = $scope.imField;
                            var saldoInsoluto = document.getElementsByName("siCurrentNameJs")[0].value;//$scope.SIField

                            var minVal	=	document.getElementsByName("minName")[0].value;
                            var maxVal	=	document.getElementsByName("maxName")[0].value;
                            var posPay = PositionPago - 1;
                            //var ope = ((Math.pow(((InteresM / 100) + 1), 12) - 1) * 100).toFixed(2);
                            //IM = ((importeSaldoI * (ope / 360)) * diasRetardo);
                            var intFinal = InteresM/100;
                            IM = (saldoInsoluto*intFinal/30.4)*diasRetardo;///30.4*diasRetardo

                            // console.log("este es un check de prueba: " + check);
                            <?php include("dist/js/controllers/moratorios_ca.js"); ?>
                            console.log("Interes Moratorio en esta posicion " + IM);
                            calculoMoratorioII(IM, importeSaldoI, posPay, PositionPago, diasRetardo, saldoInsoluto, minVal, maxVal, arrayCheckAllPost);
                        }

                        /*nuevo código 27 de noviembre*/
                        var disp = 0;
                        var interes = 0;
                        var total = 0;
                        var capital = 0;

                        if ($scope.infoMoratorio.mesesSinInteresP1 == 0) {
                            interes = ($scope.interes_plan = ($scope.infoMoratorio.si * $scope.infoMoratorio.interes_p2));
                            capital = ($scope.infoMoratorio.capital = (($scope.infoMoratorio.interes_p2 * Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) * $scope.infoMoratorio.si) / (Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) - 1) - $scope.interes_plan));
                            total = ($scope.infoMoratorio.interes_p2 * Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) * $scope.infoMoratorio.si) / (Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) - 1);
                        }
                        else
                        {
                            capital = $scope.infoMoratorio.capital;
                            interes = 0;
                            total = $scope.infoMoratorio.capital + $scope.infoMoratorio.interes_p1;
                        }
                        // console.log($scope.SIField);
                        let formatDateFinish = new Date($scope.fechaPagoField);
                        let year = formatDateFinish.getFullYear();
                        let month = ((formatDateFinish.getMonth()+1)<10)?'0'+(formatDateFinish.getMonth()+1) : (formatDateFinish.getMonth()+1);
                        let dayPago = (formatDateFinish.getDate()<10) ? '0'+formatDateFinish.getDate() : formatDateFinish.getDate();
                        let fechaPago = month+'-'+dayPago+'-'+year;
                        let fechaInitEnd =  new Date(mes + '-' + day + '-' + yearc);
                        let fechaFinishEnd = new Date(fechaPago);
                        let fechaPagoToArray =  dayPago+'-'+mes+'-'+yearc;


                        var difference = dateDiffInDays(fechaInitEnd, fechaFinishEnd);
                        console.log('Diferencia de ',fechaInitEnd,' y ',fechaFinishEnd,' ES:[',difference,']');
                        let diasRetraso = difference;
                        let IF = 0.601;
                        let mensualidad = total;
                        let IM = ((mensualidad * IF) / 360)*diasRetraso;
                        console.log('IF', IF);
                        console.log('mensualidad', mensualidad);
                        console.log('diasRetraso', diasRetraso);
                        console.log('IM', IM);
                        let pagoFinal = total + IM;
                        range.push({
                            "fecha": $scope.fechapago,
                            "pago": i + 1,
                            "capital": capital,
                            "interes": interes,
                            "importe": importeSaldoI,
                            "diasRetraso": diasRetardo,
                            "interesMoratorio": IM,
                            "totalFinal" : pagoFinal,
                            "fechaDePago":fechaPagoToArray,
                            "deudaMoratorio": 0,
                            "deudaOrdinario":0,
                            "max" : max,
                            "min": min,
                            "check" : check,
                            "total": total, //$scope.infoMoratorio.capital + $scope.infoMoratorio.interes_p1
                            "saldo": $scope.infoMoratorio.si = $scope.infoMoratorio.si - total+total ,//$scope.infoMoratorio.si = $scope.infoMoratorio.si - total
                            "saldoNormal":  $scope.infoMoratorio.saldoNormal=$scope.infoMoratorio.saldoNormal-total,//$scope.SIField = $scope.SIField-total
                        });
                        window['pagoCapChange' + numfinalCount] = Function("", "console.log('pagoCapChange" + numfinalCount + " el parametro es: " + document.getElementById('#idModel' + numfinalCount) + "');");//angular.element(document.querySelector('#idModel'+numfinalCount))
                        // console.log("Part of range II");
                        mes++;

                        if (i == ($scope.infoMoratorio.mesesSinInteresP1 - 1)) {
                            $scope.total2 = $scope.infoMoratorio.si;
                            $scope.totalPrimerPlan = $scope.infoMoratorio.capital + $scope.infoMoratorio.interes_p1;
                        }
                        $scope.finalMesesp1 = range.length;
                        // ini2 = ($scope.mesesdiferir > 0) ? (range.length + $scope.mesesdiferir) : range.length;
                        ini2 = ($scope.mesesdiferir > 0) ? (range.length + $scope.mesesdiferir) : range.length;
                    }
                    $scope.range = range;
                    ini2 = ($scope.mesesdiferir > 0) ? (range.length + $scope.mesesdiferir) : range.length;

                    if ($scope.infoMoratorio.mesesSinInteresP1 == 0) {
                        /*Cuanod el rango el II*/
                        $scope.addCheckToArray = function()
                        {
                            var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                            var checkPagoname = document.getElementsByName("checkPagoname")[0].value;
                            console.log('Add to array: position ' + checkPagoname);
                            console.log(checkPagoname);
                            checksArray.push(checkPagoname);
                            max = Math.max.apply(null, checksArray);
                            min = Math.min.apply(null, checksArray);
                            // console.log(max);
                            // console.log(checksArray);
                            for(var x=min; x <= max; x++) {
                                var promMes = 30.4;
                                var diasRetraso = promMes * max;
                                console.log('sen a revisar los siguientes parametros');
                                document.getElementsByName('checkAd' + x)[0].checked	= true;
                                document.getElementsByName('checkAd' + x)[0].disabled	= true;
                                document.getElementsByName('importe' + x)[0].disabled	= true;
                                document.getElementsByName('dRet' + x)[0].disabled 		= true;
                                /*==ASIGN VALUE TO INPUTS==*/
                                if(document.getElementsByName('dRet' + x)[0].value =="" || document.getElementsByName('importe' + x)[0].value =="")
                                {
                                    // document.getElementsByName('dRet' + x)[0].value=30.4;
                                    // document.getElementsByName('importe' + x)[0].value=total;
                                    // console.log('se agrega a' + x);
                                }

                                if (arrayCheckAllPost.includes(x-1) == false)
                                {
                                    arrayCheckAllPost.push(x-1);
                                }
                                // $('#idDiasRet' + x).trigger('change');
                            }
                            var minInputSet =	document.getElementsByName("minName")[0];
                            var maxInputSet	=	document.getElementsByName("maxName")[0];

                            minInputSet.value=min;
                            maxInputSet.value=max;
                        }

                        $scope.pagoACapital = function () {
                            var importeSaldoI = document.getElementsByName("importePagoJS")[0].value;
                            var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                            var diasRetardo = document.getElementsByName("diasRetardoNumberJS")[0].value;
                            var InteresM = $scope.imField;
                            var saldoInsoluto = document.getElementsByName("siCurrentNameJs")[0].value;//$scope.SIField
                            var minVal	=	document.getElementsByName("minName")[0].value;
                            var maxVal	=	document.getElementsByName("maxName")[0].value;
                            console.log("importe: " + importeSaldoI + " - Dias Retardo: " + diasRetardo + " - posicion: " + PositionPago);
                            console.log("from range II");
                            /*var ope = ((Math.pow(((InteresM / 100) + 1), 12) - 1) * 100).toFixed(2);
                            IM = ((importeSaldoI * (ope / 360)) * diasRetardo);*/
                            var intFinal = InteresM/100;
                            IM = (saldoInsoluto*intFinal/30.4)*diasRetardo;
                            $scope.total2 = saldoInsoluto;
                            console.log("interes moratorio: " + IM.toFixed(2));
                            var posPay = PositionPago - 1;
                            /*se hace el segundo calculo y se manipula la tabla*/
                            /*termina la edicion*/
                            <?php include("dist/js/controllers/moratorios_ca.js"); ?>
                            calculoMoratorioII(IM, importeSaldoI, posPay, PositionPago, diasRetardo, saldoInsoluto, minVal, maxVal, arrayCheckAllPost);
                        }
                    }
                    //////////
                    // $scope.total2 = $scope.total2 - $scope.capital2+$scope.capital2;
                    $scope.p2 = ($scope.infoMoratorio.interes_p2 * Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) * $scope.infoMoratorio.saldoNormal) / (Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) - 1);
                    var range2 = [];
                    for (var i = ini2; i < $scope.infoMoratorio.plazo; i++) {
                        if (mes == 13) {
                            mes = '01';
                            yearc++;
                        }
                        if (mes == 2) {
                            mes = '02';
                        }
                        if (mes == 3) {
                            mes = '03';
                        }
                        if (mes == 4) {
                            mes = '04';
                        }
                        if (mes == 5) {
                            mes = '05';
                        }
                        if (mes == 6) {
                            mes = '06';
                        }
                        if (mes == 7) {
                            mes = '07';
                        }
                        if (mes == 8) {
                            mes = '08';
                        }
                        /**/
                        if (mes == 9) {
                            mes = '09';
                        }
                        if (mes == 10) {
                            mes = '10';
                        }
                        if (mes == 11) {
                            mes = '11';
                        }
                        if (mes == 12) {
                            mes = '12';
                        }


                        $scope.fechapago = day + '-' + mes + '-' + yearc;
                        if (i == 0) {
                            $scope.fechaPM = $scope.fechapago;
                        }
                        $scope.interes_plan2 = $scope.infoMoratorio.saldoNormal * ($scope.infoMoratorio.interes_p2);
                        $scope.capital2 = ($scope.p2 - $scope.interes_plan2);

                        let formatDateInit = new Date( $scope.fechapago);
                        let formatDateFinish = new Date($scope.fechaPagoField);
                        let yearPago = formatDateFinish.getFullYear();
                        let monthPago = ((formatDateFinish.getMonth()+1)<10)?'0'+(formatDateFinish.getMonth()+1) : (formatDateFinish.getMonth()+1);
                        let dayPago = (formatDateFinish.getDate()<10) ? '0'+formatDateFinish.getDate() : formatDateFinish.getDate();
                        let fechaPago = monthPago+'-'+dayPago+'-'+yearPago;
                        let fechaInitEnd =  new Date(mes + '-' + day + '-' + yearc);
                        let fechaFinishEnd = new Date(fechaPago);
                        let fechaPagoToArray =  $scope.fechaPagoField;


                        var difference = dateDiffInDays(fechaInitEnd, fechaFinishEnd);
                        // console.log('Diferencia de ',fechaInitEnd,' y ',fechaFinishEnd,' ES:[',difference,']');
                        let diasRetraso = difference;
                        let IF = 0.601;
                        let mensualidad = $scope.infoMoratorio.capital;
                        let IM = ((mensualidad * IF) /360)*diasRetraso;
                        let pagoFinal = $scope.infoMoratorio.capital + IM;

                        console.log('IF', IF);
                        console.log('mensualidad', mensualidad);
                        console.log('IM', IM);
                        console.log('pagoFinal', pagoFinal);
                        console.log('diasRetraso', diasRetraso);


                        range2.push({
                            "fecha": $scope.fechapago,
                            "pago": i + 1,
                            "capital":$scope.capital = ($scope.p2 - $scope.interes_plan2),//($scope.infoMoratorio.capital = ($scope.p2 - $scope.interes_plan2))
                            "interes": $scope.infoMoratorio.saldoNormal * $scope.infoMoratorio.interes_p2,
                            "fechaDePago":fechaPagoToArray,
                            "importe":$scope.infoMoratorio.capital,
                            "diasRetraso": difference,
                            "interesMoratorio": IM,
                            "totalFinal" : pagoFinal,
                            "deudaMoratorio": 0,
                            "deudaOrdinario":0,
                            "max" : max,
                            "min": min,
                            "total": $scope.infoMoratorio.capital,
                            "saldo": $scope.infoMoratorio.si = $scope.infoMoratorio.si - $scope.p2+$scope.p2,//$scope.total2 = ($scope.total2 - $scope.capital2) //2-$scope.total2 = $scope.total2 - $scope.capital2+$scope.capital2
                            //$scope.total2 = ($scope.total2 - $scope.capital2) - $scope.interes_plan2
                            "saldoNormal":  $scope.infoMoratorio.saldoNormal=$scope.infoMoratorio.saldoNormal-$scope.capital2,
                        });
                        window['pagoCapChange' + numfinalCount] = Function("", "console.log('pagoCapChange" + numfinalCount + " el parametro es: " + document.getElementById('#idModel' + numfinalCount) + "');");//angular.element(document.querySelector('#idModel'+numfinalCount))
                        console.log("Part of range II");
                        mes++;

                        if (i == ($scope.infoMoratorio.plazo - 1)) {
                            $scope.totalSegundoPlan = $scope.p2;
                        }
                        $scope.finalMesesp2 = (range2.length);
                    }
                    $scope.range2 = range2;
                    $scope.validaEngDif = ($scope.mesesdiferir > 0) ? $scope.rangEd : [];
                    $scope.alphaNumeric = $scope.validaEngDif.concat($scope.range).concat($scope.range2);
                    // console.log($scope.alphaNumeric);
                    $scope.dtoptions = DTOptionsBuilder.newOptions().withOption('aaData', $scope.alphaNumeric).withOption('order', [1, 'asc']).withDisplayLength(240).withDOM("<'pull-right'B><l><t><'pull-left'i><p>").withButtons([
                            {extend: 'excel', text: '<i class="fa fa-file-excel-o"></i> Excel', titleAttr: 'Excel'}
                        ]
                    ).withLanguage({"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"});
                }
            }

            if ($scope.infoMoratorio.plazo >=37 && $scope.infoMoratorio.plazo <= 120)
            {
                // console.log("OLV, I'LL ENTERED HERE " + $scope.infoMoratorio.plazo);
                var range = [];
                ini = ($scope.mesesdiferir > 0) ? $scope.mesesdiferir : $scope.infoMoratorio.contadorInicial;
                if ($scope.infoMoratorio.mesesSinInteresP1 >= 0 && $scope.infoMoratorio.mesesSinInteresP1 <= 36)
                {
                    let fechaDelPago = document.getElementsByName("fechaPagoJS")[0].value;
                    for (var i = ini; i <= $scope.infoMoratorio.mesesSinInteresP1 - 1; i++) {
                        if (mes == 13) {
                            yearc++;
                        }
                        if (mes == 2) {
                            mes = '02';
                        }
                        if (mes == 3) {
                            mes = '03';
                        }
                        if (mes == 4) {
                            mes = '04';
                        }
                        if (mes == 5) {
                            mes = '05';
                        }
                        if (mes == 6) {
                            mes = '06';
                        }
                        if (mes == 7) {
                            mes = '07';
                        }
                        if (mes == 8) {
                            mes = '08';
                        }
                        if (mes == 9) {
                            mes = '09';
                        }
                        if (mes == 10) {
                            mes = '10';
                        }
                        if (mes == 11) {
                            mes = '11';
                        }
                        if (mes == 12) {
                            mes = '12';
                        }

                        $scope.fechapago = day + '-' + mes + '-' + yearc;

                        if (i == 0) {
                            $scope.fechaPM = $scope.fechapago;
                        }
                        var numfinalCount = i + 1;
                        // /*version 2.0*/
                        // var accessor = "" + numfinalCount + "";
                        var importeSaldoI = 0;
                        var diasRetardo = 0;
                        var checksArray = [];
                        var arrayCheckAllPost = [];
                        let fechaDelPago = document.getElementsByName("fechaPagoJS")[0].value;
                        // console.log($scope.alphaNumeric[i]['saldo']);

                        /*16diciembre*/
                        var max=0;
                        var min=0;
                        var check;

                        $scope.addCheckToArray = function()
                        {
                            var checksArray = [];
                            var arrayCheckAllPost = [];
                            var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                            var checkPagoname = document.getElementsByName("checkPagoname")[0].value;
                            console.log('Add to array: position ' + checkPagoname);
                            checksArray.push(checkPagoname);
                            max = Math.max.apply(null, checksArray);
                            min = Math.min.apply(null, checksArray);
                            // console.log(max);
                            // console.log(checksArray);
                            for(var x=min; x <= max; x++) {
                                var promMes = 30.4;
                                var diasRetraso = promMes * max;
                                console.log('sen a revisar los siguientes parametros');
                                document.getElementsByName('checkAd' + x)[0].checked	= true;
                                document.getElementsByName('checkAd' + x)[0].disabled	= true;
                                document.getElementsByName('importe' + x)[0].disabled	= true;
                                document.getElementsByName('dRet' + x)[0].disabled 		= true;
                                /*==ASIGN VALUE TO INPUTS==*/
                                if(document.getElementsByName('dRet' + x)[0].value =="" || document.getElementsByName('importe' + x)[0].value =="")
                                {
                                    // document.getElementsByName('dRet' + x)[0].value=30.4;
                                    // document.getElementsByName('importe' + x)[0].value=total;
                                    // console.log('se agrega a' + x);
                                }

                                if (arrayCheckAllPost.includes(x-1) == false)
                                {
                                    arrayCheckAllPost.push(x-1);
                                }
                                // $('#idDiasRet' + x).trigger('change');
                            }
                            var minInputSet =	document.getElementsByName("minName")[0];
                            var maxInputSet	=	document.getElementsByName("maxName")[0];

                            minInputSet.value=min;
                            maxInputSet.value=max;
                        }
                        //finaliza nuevo codigo 11 noviembre
                        $scope.pagoACapital = function () {
                            importeSaldoI = document.getElementsByName("importePagoJS")[0].value;
                            var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                            diasRetardo = document.getElementsByName("diasRetardoNumberJS")[0].value;
                            var InteresM = $scope.imField;
                            var saldoInsoluto = document.getElementsByName("siCurrentNameJs")[0].value;//$scope.SIField
                            let fechaDelPago = document.getElementsByName("fechaPagoJS")[0].value;

                            var minVal	=	document.getElementsByName("minName")[0].value;
                            var maxVal	=	document.getElementsByName("maxName")[0].value;
                            var posPay = PositionPago - 1;

                            //var ope = ((Math.pow(((InteresM / 100) + 1), 12) - 1) * 100).toFixed(2);
                            //IM = ((importeSaldoI * (ope / 360)) * diasRetardo);
                            var intFinal = InteresM/100;
                            IM = (saldoInsoluto*intFinal/30.4)*diasRetardo;///30.4*diasRetardo
                            // console.log("este es un check de prueba: " + check);
                            <?php include("dist/js/controllers/moratorios_ca.js"); ?>
                            console.log("Interes Moratorio en esta posicion " + IM);
                            console.log("FECHA DEL PAGO AQUI", fechaDelPago);
                            calculoMoratorioII(IM, importeSaldoI, posPay, PositionPago, diasRetardo, saldoInsoluto, minVal, maxVal, arrayCheckAllPost, fechaDelPago);
                        }
                        /*nuevo código 27  de noviembre*/
                        var disp = 0;
                        var interes = 0;
                        var total = 0;
                        var capital = 0;

                        if ($scope.infoMoratorio.mesesSinInteresP1 == 0) {
                            interes = ($scope.interes_plan = ($scope.infoMoratorio.si * $scope.infoMoratorio.interes_p2));
                            capital = ($scope.infoMoratorio.capital = (($scope.infoMoratorio.interes_p2 * Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) * $scope.infoMoratorio.si) / (Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) - 1) - $scope.interes_plan));
                            total = ($scope.infoMoratorio.interes_p2 * Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) * $scope.infoMoratorio.si) / (Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) - 1);
                        } else {
                            capital = $scope.infoMoratorio.capital;
                            interes = 0;
                            total = $scope.infoMoratorio.capital + $scope.infoMoratorio.interes_p1;
                        }

                        let formatDateFinish = new Date($scope.fechaPagoField);
                        // let year = formatDate.getFullYear();
                        // let month = ((formatDate.getMonth()+1)<10)?'0'+(formatDate.getMonth()+1) : (formatDate.getMonth()+1);
                        let dayPago = (formatDateFinish.getDate()<10) ? '0'+formatDateFinish.getDate() : formatDateFinish.getDate();
                        let fechaPago = mes+'-'+dayPago+'-'+yearc;
                        let fechaInitEnd =  new Date(mes + '-' + day + '-' + yearc);
                        let fechaFinishEnd = new Date(fechaPago);
                        let fechaPagoToArray =  dayPago+'-'+mes+'-'+yearc;


                        var difference = dateDiffInDays(fechaInitEnd, fechaFinishEnd);
                        // console.log('Diferencia de ',fechaInitEnd,' y ',fechaFinishEnd,' ES:[',difference,']');
                        let diasRetraso = difference;
                        let IF = 0.601;
                        let mensualidad = total;
                        let IM = ((mensualidad * IF) /360)*diasRetraso;
                        let pagoFinal = total + IM;
                        /***/
                        range.push({
                            "fecha": $scope.fechapago,
                            "pago": i + 1,
                            "capital": capital,
                            "interes": interes,
                            "fechaPago": fechaDelPago,
                            "importe": total,
                            "diasRetraso": difference,
                            "interesMoratorio": IM,
                            "totalFinal" : pagoFinal,
                            "fechaDePago":fechaPagoToArray,
                            "deudaMoratorio":0,
                            "deudaOrdinario":0,
                            "max" : max,
                            "min": min,
                            "check" : check,
                            "total": total, //$scope.infoMoratorio.capital + $scope.infoMoratorio.interes_p1
                            "saldo": $scope.infoMoratorio.si = $scope.infoMoratorio.si  - total+total,//$scope.infoLote.precioTotal = $scope.infoLote.precioTotal - $scope.infoLote.capital
                            "saldoNormal":  $scope.infoMoratorio.saldoNormal=$scope.infoMoratorio.saldoNormal-total,//$scope.SIField = $scope.SIField-total
                        });
                        window['pagoCapChange' + numfinalCount] = Function("", "console.log('pagoCapChange" + numfinalCount + " el parametro es: " + document.getElementById('#idModel' + numfinalCount) + "');");//angular.element(document.querySelector('#idModel'+numfinalCount))

                        // console.log("Part of range II");
                        mes++;

                        if (i == ($scope.infoMoratorio.mesesSinInteresP1 - 1)) {
                            $scope.total2 = $scope.infoMoratorio.si;
                            $scope.totalPrimerPlan = $scope.infoMoratorio.capital + $scope.infoMoratorio.interes_p1;
                        }
                        $scope.finalMesesp1 = range.length;
                        // ini2 = ($scope.mesesdiferir > 0) ? (range.length + $scope.mesesdiferir) : range.length;
                        ini2 = ($scope.mesesdiferir > 0) ? (range.length + $scope.mesesdiferir) : range.length;
                    }
                    $scope.range = range;
                    ini2 = ($scope.mesesdiferir > 0) ? (range.length + $scope.mesesdiferir) : range.length;
                    if ($scope.infoMoratorio.mesesSinInteresP1 == 0) {
                        /*Cuanod el rango el II*/
                        // $scope.total2 = $scope.infoMoratorio.si;
                        $scope.addCheckToArray = function()
                        {
                            var checksArray = [];
                            var arrayCheckAllPost = [];
                            var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                            var checkPagoname = document.getElementsByName("checkPagoname")[0].value;
                            console.log('Add to array: position ' + checkPagoname);
                            console.log(checkPagoname);
                            checksArray.push(checkPagoname);
                            max = Math.max.apply(null, checksArray);
                            min = Math.min.apply(null, checksArray);
                            // console.log(max);
                            // console.log(checksArray);
                            for(var x=min; x <= max; x++) {
                                var promMes = 30.4;
                                var diasRetraso = promMes * max;
                                console.log('sen a revisar los siguientes parametros');
                                document.getElementsByName('checkAd' + x)[0].checked	= true;
                                document.getElementsByName('checkAd' + x)[0].disabled	= true;
                                document.getElementsByName('importe' + x)[0].disabled	= true;
                                document.getElementsByName('dRet' + x)[0].disabled 		= true;
                                /*==ASIGN VALUE TO INPUTS==*/
                                if(document.getElementsByName('dRet' + x)[0].value =="" || document.getElementsByName('importe' + x)[0].value =="")
                                {
                                    // document.getElementsByName('dRet' + x)[0].value=30.4;
                                    // document.getElementsByName('importe' + x)[0].value=total;
                                    // console.log('se agrega a' + x);
                                }

                                if (arrayCheckAllPost.includes(x-1) == false)
                                {
                                    arrayCheckAllPost.push(x-1);
                                }
                                // $('#idDiasRet' + x).trigger('change');
                            }
                            var minInputSet =	document.getElementsByName("minName")[0];
                            var maxInputSet	=	document.getElementsByName("maxName")[0];

                            minInputSet.value=min;
                            maxInputSet.value=max;
                        }
                        $scope.pagoACapital = function () {


                            var importeSaldoI = document.getElementsByName("importePagoJS")[0].value;
                            var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                            var diasRetardo = document.getElementsByName("diasRetardoNumberJS")[0].value;
                            var InteresM = $scope.imField;
                            var saldoInsoluto = document.getElementsByName("siCurrentNameJs")[0].value;//$scope.SIField
                            var minVal	=	document.getElementsByName("minName")[0].value;
                            var maxVal	=	document.getElementsByName("maxName")[0].value;
                            fechaDelPago = document.getElementsByName("fechaPagoJS")[0].value;
                            /*var ope = ((Math.pow(((InteresM / 100) + 1), 12) - 1) * 100).toFixed(2);
                            IM = ((importeSaldoI * (ope / 360)) * diasRetardo);*/
                            var intFinal = InteresM/100;
                            IM = (saldoInsoluto*intFinal/30.4)*diasRetardo;
                            $scope.total2 = saldoInsoluto;
                            console.log("FECHA DEL PAGO AQUI", fechaDelPago);
                            var posPay = PositionPago - 1;
                            console.log("PositionPago:", PositionPago);
                            /*se hace el segundo calculo y se manipula la tabla*/
                            /*termina la edicion*/
                            <?php include("dist/js/controllers/moratorios_ca.js"); ?>
                            calculoMoratorioII(IM, importeSaldoI, posPay, PositionPago, diasRetardo, saldoInsoluto, minVal, maxVal, arrayCheckAllPost, fechaDelPago);

                        }
                    }
                    //////////
                    $scope.p2 = ($scope.infoMoratorio.interes_p2 * Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) * $scope.infoMoratorio.saldoNormal) / (Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) - 1);
                    var range2 = [];
                    for (var i = ini2; i < $scope.infoMoratorio.plazo; i++) {
                        if (mes == 13) {
                            mes = '01';
                            yearc++;
                        }
                        if (mes == 2) {
                            mes = '02';
                        }
                        if (mes == 3) {
                            mes = '03';
                        }
                        if (mes == 4) {
                            mes = '04';
                        }
                        if (mes == 5) {
                            mes = '05';
                        }
                        if (mes == 6) {
                            mes = '06';
                        }
                        if (mes == 7) {
                            mes = '07';
                        }
                        if (mes == 8) {
                            mes = '08';
                        }
                        /**/
                        if (mes == 9) {
                            mes = '09';
                        }
                        if (mes == 10) {
                            mes = '10';
                        }
                        if (mes == 11) {
                            mes = '11';
                        }
                        if (mes == 12) {
                            mes = '12';
                        }


                        $scope.fechapago = day + '-' + mes + '-' + yearc;
                        if (i == 0) {
                            $scope.fechaPM = $scope.fechapago;
                        }

                        $scope.interes_plan2 = $scope.infoMoratorio.saldoNormal  * ($scope.infoMoratorio.interes_p2);
                        $scope.capital2 = ($scope.p2 - $scope.interes_plan2);


                        let formatDateInit = new Date( $scope.fechapago);
                        let formatDateFinish = new Date($scope.fechaPagoField);


                        let yearPago = formatDateFinish.getFullYear();
                        let monthPago = ((formatDateFinish.getMonth()+1)<10)?'0'+(formatDateFinish.getMonth()+1) : (formatDateFinish.getMonth()+1);
                        let dayPago = (formatDateFinish.getDate()<10) ? '0'+formatDateFinish.getDate() : formatDateFinish.getDate();
                        let fechaPago = monthPago+'-'+dayPago+'-'+yearPago;
                        let fechaInitEnd =  new Date(mes + '-' + day + '-' + yearc);
                        let fechaFinishEnd = new Date(fechaPago);
                        let fechaPagoToArray =  $scope.fechaPagoField;


                        var difference = dateDiffInDays(fechaInitEnd, fechaFinishEnd);
                        // console.log('Diferencia de ',fechaInitEnd,' y ',fechaFinishEnd,' ES:[',difference,']');
                        let diasRetraso = difference;
                        let IF = 0.601;
                        let mensualidad = $scope.infoMoratorio.capital;
                        let IM = ((mensualidad * IF) /360)*diasRetraso;
                        let pagoFinal = $scope.infoMoratorio.capital + IM;


                        range2.push({
                            "fecha": $scope.fechapago,
                            "pago": i + 1,
                            "capital":$scope.infoMoratorio.capital,
                            "interes": $scope.infoMoratorio.saldoNormal * $scope.infoMoratorio.interes_p2,
                            "fechaDePago":fechaPagoToArray,
                            "importe": $scope.p2,
                            "diasRetraso": difference,
                            "interesMoratorio": IM,
                            "totalFinal" : pagoFinal,
                            "deudaMoratorio": 0,
                            "deudaOrdinario":0,
                            "total": $scope.infoMoratorio.capital,
                            "saldo":  $scope.infoMoratorio.si - $scope.p2+$scope.p2,//$scope.infoLote.precioTotal = $scope.infoLote.precioTotal - $scope.infoLote.capital
                            "saldoNormal":  $scope.infoMoratorio.saldoNormal=$scope.infoMoratorio.saldoNormal-$scope.capital2,
                        });

                        window['pagoCapChange' + numfinalCount] = Function("", "console.log('pagoCapChange" + numfinalCount + " el parametro es: " + document.getElementById('#idModel' + numfinalCount) + "');");//angular.element(document.querySelector('#idModel'+numfinalCount))

                        mes++;

                        if (i == ($scope.infoMoratorio.plazo - 1)) {
                            $scope.totalSegundoPlan = $scope.p2;
                        }
                        $scope.finalMesesp2 = (range2.length);
                    }
                    $scope.range2 = range2;
                    $scope.validaEngDif = ($scope.mesesdiferir > 0) ? $scope.rangEd : [];
                    $scope.alphaNumeric = $scope.validaEngDif.concat($scope.range).concat($scope.range2);
                    // console.log($scope.alphaNumeric);
                    $scope.dtoptions = DTOptionsBuilder.newOptions().withOption('aaData', $scope.alphaNumeric).withOption('order', [1, 'asc']).withDisplayLength(240).withDOM("<'pull-right'B><l><t><'pull-left'i><p>").withButtons([
                            {extend: 'excel', text: '<i class="fa fa-file-excel-o"></i> Excel', titleAttr: 'Excel'},
                        ]
                    ).withLanguage({"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"});
                }
                /*termina calculo de mensualidades*/
            }

            if($scope.infoMoratorio.plazo >= 121 && $scope.infoMoratorio.plazo <= 240)
            {
                {
                    // console.log("OLV, I'LL ENTERED HERE " + $scope.infoMoratorio.plazo);
                    var range = [];
                    var ini = ($scope.mesesdiferir > 0) ? $scope.mesesdiferir : $scope.infoMoratorio.contadorInicial;
                    if ($scope.infoMoratorio.mesesSinInteresP1 >= 0 && $scope.infoMoratorio.mesesSinInteresP1 <= 36)
                    {
                        let fechaDelPago = document.getElementsByName("fechaPagoJS")[0].value;
                        for (var i = ini; i <= $scope.infoMoratorio.mesesSinInteresP1 - 1; i++) {
                            if (mes == 13) {
                                mes = '01';
                                yearc++;
                            }
                            if (mes == 2) {
                                mes = '02';
                            }
                            if (mes == 3) {
                                mes = '03';
                            }
                            if (mes == 4) {
                                mes = '04';
                            }
                            if (mes == 5) {
                                mes = '05';
                            }
                            if (mes == 6) {
                                mes = '06';
                            }
                            if (mes == 7) {
                                mes = '07';
                            }
                            if (mes == 8) {
                                mes = '08';
                            }
                            if (mes == 9) {
                                mes = '09';
                            }
                            if (mes == 10) {
                                mes = '10';
                            }
                            if (mes == 11) {
                                mes = '11';
                            }
                            if (mes == 12) {
                                mes = '12';
                            }

                            $scope.fechapago = day + '-' + mes + '-' + yearc;

                            if (i == 0) {
                                $scope.fechaPM = $scope.fechapago;
                            }
                            var numfinalCount = i + 1;
                            // /*version 2.0*/
                            // var accessor = "" + numfinalCount + "";
                            var IM = 0;
                            var importeSaldoI = 0;
                            var diasRetardo = 0;
                            var checksArray = [];
                            var arrayCheckAllPost = [];

                            /*16diciembre*/
                            var max=0;
                            var min=0;
                            var check;

                            $scope.addCheckToArray = function()
                            {
                                var checksArray = [];
                                var arrayCheckAllPost = [];
                                var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                                var checkPagoname = document.getElementsByName("checkPagoname")[0].value;
                                console.log('Add to array: position ' + checkPagoname);
                                checksArray.push(checkPagoname);
                                max = Math.max.apply(null, checksArray);
                                min = Math.min.apply(null, checksArray);
                                // console.log(max);
                                // console.log(checksArray);
                                for(var x=min; x <= max; x++) {
                                    var promMes = 30.4;
                                    var diasRetraso = promMes * max;
                                    console.log('sen a revisar los siguientes parametros');
                                    document.getElementsByName('checkAd' + x)[0].checked	= true;
                                    document.getElementsByName('checkAd' + x)[0].disabled	= true;
                                    document.getElementsByName('importe' + x)[0].disabled	= true;
                                    document.getElementsByName('dRet' + x)[0].disabled 		= true;
                                    /*==ASIGN VALUE TO INPUTS==*/
                                    if(document.getElementsByName('dRet' + x)[0].value =="" || document.getElementsByName('importe' + x)[0].value =="")
                                    {
                                        // document.getElementsByName('dRet' + x)[0].value=30.4;
                                        // document.getElementsByName('importe' + x)[0].value=total;
                                        // console.log('se agrega a' + x);
                                    }

                                    if (arrayCheckAllPost.includes(x-1) == false)
                                    {
                                        arrayCheckAllPost.push(x-1);
                                    }
                                    // $('#idDiasRet' + x).trigger('change');
                                }
                                var minInputSet =	document.getElementsByName("minName")[0];
                                var maxInputSet	=	document.getElementsByName("maxName")[0];

                                minInputSet.value=min;
                                maxInputSet.value=max;
                            }
                            $scope.pagoACapital = function () {
                                var importeSaldoI = document.getElementsByName("importePagoJS")[0].value;
                                var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                                var diasRetardo = document.getElementsByName("diasRetardoNumberJS")[0].value;
                                var InteresM = $scope.imField;
                                var saldoInsoluto = document.getElementsByName("siCurrentNameJs")[0].value;//$scope.SIField
                                var minVal	=	document.getElementsByName("minName")[0].value;
                                var maxVal	=	document.getElementsByName("maxName")[0].value;
                                fechaDelPago = document.getElementsByName("fechaPagoJS")[0].value;
                                /*var ope = ((Math.pow(((InteresM / 100) + 1), 12) - 1) * 100).toFixed(2);
                                IM = ((importeSaldoI * (ope / 360)) * diasRetardo);*/
                                var intFinal = InteresM/100;
                                IM = (saldoInsoluto*intFinal/30.4)*diasRetardo;


                                // IF = 0.601
                                // IM = ((menusalidad * IF) /360)*diasRetraso
                                let IF = 0.601;
                                IM = ((importeSaldoI * IF) / 360) * diasRetardo;



                                $scope.total2 = saldoInsoluto;
                                console.log("FECHA DEL PAGO AQUI", fechaDelPago);
                                var posPay = PositionPago - 1;
                                /*se hace el segundo calculo y se manipula la tabla*/
                                /*termina la edicion*/
                                <?php include("dist/js/controllers/moratorios_ca.js"); ?>
                                calculoMoratorioII(IM, importeSaldoI, posPay, PositionPago, diasRetardo, saldoInsoluto, minVal, maxVal, arrayCheckAllPost, fechaDelPago);
                            }
                            /*nuevo código 27  de noviembre*/
                            var disp = 0;
                            var interes = 0;
                            var total = 0;
                            var capital = 0;

                            if ($scope.infoMoratorio.mesesSinInteresP1 == 0) {
                                interes = ($scope.interes_plan = ($scope.infoMoratorio.si * $scope.infoMoratorio.interes_p2));
                                capital = ($scope.infoMoratorio.capital = (($scope.infoMoratorio.interes_p2 * Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) * $scope.infoMoratorio.si) / (Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) - 1) - $scope.interes_plan));
                                total = ($scope.infoMoratorio.interes_p2 * Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) * $scope.infoMoratorio.si) / (Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) - 1);
                            } else {
                                capital = $scope.infoMoratorio.capital;
                                interes = 0;
                                total = $scope.infoMoratorio.capital + $scope.infoMoratorio.interes_p1;
                            }
                            /***/
                            range.push({
                                "fecha": $scope.fechapago,
                                "pago": i + 1,
                                "capital": capital,
                                "interes": interes,
                                "importe": 666,
                                "diasRetraso": diasRetardo,
                                "fechaPago": fechaDelPago,
                                "interesMoratorio": IM,
                                "deudaMoratorio" : 0,
                                "deudaOrdinario":0,
                                "total": total, //$scope.infoMoratorio.capital + $scope.infoMoratorio.interes_p1
                                "saldo": $scope.infoMoratorio.si = $scope.infoMoratorio.si - total+total,//$scope.infoLote.precioTotal = $scope.infoLote.precioTotal - $scope.infoLote.capital
                                "saldoNormal":  $scope.infoMoratorio.saldoNormal=$scope.infoMoratorio.saldoNormal-total,//$scope.SIField = $scope.SIField-total
                            });
                            window['pagoCapChange' + numfinalCount] = Function("", "console.log('pagoCapChange" + numfinalCount + " el parametro es: " + document.getElementById('#idModel' + numfinalCount) + "');");//angular.element(document.querySelector('#idModel'+numfinalCount))
                            // console.log("Part of range II");
                            mes++;

                            if (i == ($scope.infoMoratorio.mesesSinInteresP1 - 1)) {
                                $scope.total2 = $scope.infoMoratorio.si;
                                $scope.totalPrimerPlan = $scope.infoMoratorio.capital + $scope.infoMoratorio.interes_p1;
                            }
                            $scope.finalMesesp1 = range.length;
                            // ini2 = ($scope.mesesdiferir > 0) ? (range.length + $scope.mesesdiferir) : range.length;
                            var ini2 = ($scope.mesesdiferir > 0) ? (range.length + $scope.mesesdiferir) : range.length;
                        }
                        $scope.range = range;
                        ini2 = ($scope.mesesdiferir > 0) ? (range.length + $scope.mesesdiferir) : range.length;
                        if ($scope.infoMoratorio.mesesSinInteresP1 == 0) {
                            /*Cuanod el rango el II*/
                            // var siVal = document.getElementsByName("si"+i)[0].value
                            // $scope.total2 = siVal;
                            var checksArray = [];
                            var arrayCheckAllPost = [];

                            /*16diciembre*/
                            var max=0;
                            var min=0;
                            var check;

                            $scope.addCheckToArray = function()
                            {
                                var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                                var checkPagoname = document.getElementsByName("checkPagoname")[0].value;
                                console.log('Add to array: position ' + checkPagoname);
                                checksArray.push(checkPagoname);
                                max = Math.max.apply(null, checksArray);
                                min = Math.min.apply(null, checksArray);
                                // console.log(max);
                                // console.log(checksArray);
                                for(var x=min; x <= max; x++) {
                                    var promMes = 30.4;
                                    var diasRetraso = promMes * max;
                                    console.log('sen a revisar los siguientes parametros');
                                    document.getElementsByName('checkAd' + x)[0].checked	= true;
                                    document.getElementsByName('checkAd' + x)[0].disabled	= true;
                                    document.getElementsByName('importe' + x)[0].disabled	= true;
                                    document.getElementsByName('dRet' + x)[0].disabled 		= true;
                                    /*==ASIGN VALUE TO INPUTS==*/
                                    if(document.getElementsByName('dRet' + x)[0].value =="" || document.getElementsByName('importe' + x)[0].value =="")
                                    {
                                        // document.getElementsByName('dRet' + x)[0].value=30.4;
                                        // document.getElementsByName('importe' + x)[0].value=total;
                                        // console.log('se agrega a' + x);
                                    }

                                    if (arrayCheckAllPost.includes(x-1) == false)
                                    {
                                        arrayCheckAllPost.push(x-1);
                                    }
                                    // $('#idDiasRet' + x).trigger('change');
                                }
                                var minInputSet =	document.getElementsByName("minName")[0];
                                var maxInputSet	=	document.getElementsByName("maxName")[0];

                                minInputSet.value=min;
                                maxInputSet.value=max;
                            }
                            $scope.pagoACapital = function () {
                                var importeSaldoI = document.getElementsByName("importePagoJS")[0].value;
                                var PositionPago = document.getElementsByName("pagoDiasRetPosicionJS")[0].value;
                                var diasRetardo = document.getElementsByName("diasRetardoNumberJS")[0].value;
                                var InteresM = $scope.imField;
                                var saldoInsoluto = $scope.SIField;

                                console.log("importe: " + importeSaldoI + " - Dias Retardo: " + diasRetardo + " - posicion: " + PositionPago);
                                console.log("from range II");
                                /*var ope = ((Math.pow(((InteresM / 100) + 1), 12) - 1) * 100).toFixed(2);
                                IM = ((importeSaldoI * (ope / 360)) * diasRetardo);*/
                                var minVal	=	document.getElementsByName("minName")[0].value;
                                var maxVal	=	document.getElementsByName("maxName")[0].value;
                                var posPay = PositionPago - 1;
                                var intFinal = InteresM/100;
                                IM = (saldoInsoluto*intFinal/30.4)*diasRetardo;
                                console.log("interes moratorio: " + IM.toFixed(2));
                                /*se hace el segundo calculo y se manipula la tabla*/
                                /*termina la edicion*/
                                <?php include("dist/js/controllers/moratorios_ca.js"); ?>
                                // calculoMoratorioII(IM, importeSaldoI, posPay, PositionPago, diasRetardo, saldoInsoluto);
                                calculoMoratorioII(IM, importeSaldoI, posPay, PositionPago, diasRetardo, saldoInsoluto, minVal, maxVal, arrayCheckAllPost);

                            }
                        }
                        //////////
                        // console.log($scope.total2);
                        $scope.p2 = ($scope.infoMoratorio.interes_p2 * Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) * $scope.infoMoratorio.saldoNormal) / (Math.pow(1 + $scope.infoMoratorio.interes_p2, $scope.infoMoratorio.plazo - $scope.infoMoratorio.mesesSinInteresP1) - 1);
                        var range2 = [];
                        for (var i = ini2; i < 120; i++) {
                            if (mes == 13) {
                                mes = '01';
                                yearc++;
                            }
                            if (mes == 2) {
                                mes = '02';
                            }
                            if (mes == 3) {
                                mes = '03';
                            }
                            if (mes == 4) {
                                mes = '04';
                            }
                            if (mes == 5) {
                                mes = '05';
                            }
                            if (mes == 6) {
                                mes = '06';
                            }
                            if (mes == 7) {
                                mes = '07';
                            }
                            if (mes == 8) {
                                mes = '08';
                            }
                            /**/
                            if (mes == 9) {
                                mes = '09';
                            }
                            if (mes == 10) {
                                mes = '10';
                            }
                            if (mes == 11) {
                                mes = '11';
                            }
                            if (mes == 12) {
                                mes = '12';
                            }


                            $scope.fechapago = day + '-' + mes + '-' + yearc;
                            if (i == 0) {
                                $scope.fechaPM = $scope.fechapago;
                            }

                            $scope.interes_plan2 = $scope.infoMoratorio.saldoNormal * ($scope.infoMoratorio.interes_p2);
                            $scope.capital2 = ($scope.p2 - $scope.interes_plan2);
                            $scope.total2 = ($scope.total2 - $scope.capital2);
                            if($scope.total2 <= 0)
                            {
                                $scope.total2 =0;
                            }



                            let formatDateInit = new Date( $scope.fechapago);
                            let formatDateFinish = new Date($scope.fechaPagoField);
                            // let year = formatDate.getFullYear();
                            // let month = ((formatDate.getMonth()+1)<10)?'0'+(formatDate.getMonth()+1) : (formatDate.getMonth()+1);
                            let yearPago = formatDateFinish.getFullYear();
                            let monthPago = ((formatDateFinish.getMonth()+1)<10)?'0'+(formatDateFinish.getMonth()+1) : (formatDateFinish.getMonth()+1);
                            let dayPago = (formatDateFinish.getDate()<10) ? '0'+formatDateFinish.getDate() : formatDateFinish.getDate();
                            let fechaPago = monthPago+'-'+dayPago+'-'+yearPago;
                            let fechaInitEnd =  new Date(mes + '-' + day + '-' + yearc);
                            let fechaFinishEnd = new Date(fechaPago);
                            let fechaPagoToArray =  $scope.fechaPagoField;

                            var difference = dateDiffInDays(fechaInitEnd, fechaFinishEnd);
                            // console.log('Diferencia de ',fechaInitEnd,' y ',fechaFinishEnd,' ES:[',difference,']');
                            let diasRetraso = difference;
                            let IF = 0.601;
                            let mensualidad = $scope.infoMoratorio.capital;
                            let IM = ((mensualidad * IF) /360)*diasRetraso;
                            let pagoFinal = $scope.infoMoratorio.capital + IM;


                            range2.push({
                                "fecha": $scope.fechapago,
                                "fechaDePago":fechaPagoToArray,
                                "pago": i + 1,
                                "capital": $scope.infoMoratorio.capital,//($scope.infoMoratorio.capital = ($scope.p2 - $scope.interes_plan2))
                                "interes": ($scope.interes_plan2= ( $scope.infoMoratorio.saldoNormal * $scope.infoMoratorio.interes_p2)),
                                "importe": $scope.p2,
                                "diasRetraso": difference,
                                "interesMoratorio": IM,
                                "totalFinal" : pagoFinal,
                                "deudaOrdinario":0,
                                "max" : max,
                                "min": min,
                                "total": $scope.infoMoratorio.capital,
                                "saldo": $scope.infoMoratorio.si = $scope.infoMoratorio.si - $scope.p2+$scope.p2,//$scope.total2 = ($scope.total2 - $scope.capital2) - $scope.interes_plan2
                                "saldoNormal":  $scope.infoMoratorio.saldoNormal=$scope.infoMoratorio.saldoNormal-$scope.capital2,
                            });
                            window['pagoCapChange' + numfinalCount] = Function("", "console.log('pagoCapChange" + numfinalCount + " el parametro es: " + document.getElementById('#idModel' + numfinalCount) + "');");//angular.element(document.querySelector('#idModel'+numfinalCount))
                            console.log("Part of range II");
                            mes++;

                            // if (i == ($scope.infoMoratorio.plazo - 1)) {
                            //     $scope.totalSegundoPlan = $scope.p2;5
                            // }
                            if (i == 119){
                                $scope.total3 = $scope.total2;
                                $scope.totalSegundoPlan = $scope.p2;
                            }
                            $scope.finalMesesp2 = (range2.length);
                        }
                        $scope.range2 = range2;

                        /*Empieza range3*/
                        $scope.p3 = ($scope.infoMoratorio.interes_p3 *  Math.pow(1 + $scope.infoMoratorio.interes_p3, $scope.infoMoratorio.plazo - 120) *$scope.infoMoratorio.saldoNormal) / ( Math.pow(1 + $scope.infoMoratorio.interes_p3, $scope.infoMoratorio.plazo - 120)-1);
                        var range3=[];
                        for (var i = 121; i < $scope.infoMoratorio.plazo + 1; i++) {

                            if(mes == 13){
                                mes = '01';
                                yearc++;
                            }
                            if(mes == 2){
                                mes = '02';
                            }
                            if(mes == 3){
                                mes = '03';
                            }
                            if(mes == 4){
                                mes = '04';
                            }
                            if(mes == 5){
                                mes = '05';
                            }
                            if(mes == 6){
                                mes = '06';
                            }
                            if(mes == 7){
                                mes = '07';
                            }
                            if(mes == 8){
                                mes = '08';
                            }
                            if(mes == 9){
                                mes = '09';
                            }
                            if(mes == 10){
                                mes = '10';
                            }
                            if(mes == 11){
                                mes = '11';
                            }
                            if(mes == 12){
                                mes = '12';
                            }

                            $scope.dateCf = day + '-' + mes + '-' + yearc;


                            // alert("OK, RANGE3[] - " + $scope.infoMoratorio.saldoNormal);
                            $scope.interes_plan3 = $scope.infoMoratorio.saldoNormal*($scope.infoMoratorio.interes_p3);
                            $scope.capital3 = ($scope.p3 - $scope.interes_plan3);


                            let formatDateFinish = new Date($scope.fechaPagoField);
                            // let year = formatDate.getFullYear();
                            // let month = ((formatDate.getMonth()+1)<10)?'0'+(formatDate.getMonth()+1) : (formatDate.getMonth()+1);
                            let yearPago = formatDateFinish.getFullYear();
                            let monthPago = ((formatDateFinish.getMonth()+1)<10)?'0'+(formatDateFinish.getMonth()+1) : (formatDateFinish.getMonth()+1);
                            let dayPago = (formatDateFinish.getDate()<10) ? '0'+formatDateFinish.getDate() : formatDateFinish.getDate();
                            let fechaPago = monthPago+'-'+dayPago+'-'+yearPago;
                            let fechaInitEnd =  new Date(mes + '-' + day + '-' + yearc);
                            let fechaFinishEnd = new Date(fechaPago);
                            let fechaPagoToArray =  $scope.fechaPagoField;


                            var difference = dateDiffInDays(fechaInitEnd, fechaFinishEnd);
                            // console.log('Diferencia de ',fechaInitEnd,' y ',fechaFinishEnd,' ES:[',difference,']');
                            let diasRetraso = difference;
                            let IF = 0.601;
                            let mensualidad =  $scope.capital3;
                            let IM = ((mensualidad * IF) /360)*diasRetraso;
                            let pagoFinal = $scope.capital3+ IM;



                            range3.push({

                                "fecha" : $scope.dateCf,
                                "fechaDePago":fechaPagoToArray,
                                "pago" : i,
                                "capital" : $scope.infoMoratorio.capital,
                                "interes" : $scope.infoMoratorio.saldoNormal * $scope.infoMoratorio.interes_p3,//($scope.interes_plan3= ($scope.total3 * $scope.infoMoratorio.interes_p3))
                                "importe": $scope.p3,
                                "diasRetraso": diasRetraso,
                                "interesMoratorio": IM,
                                "deudaMoratorio": 0,
                                "deudaOrdinario":0,
                                "max" : max,
                                "min": min,
                                "total" : $scope.infoMoratorio.capital,
                                "totalFinal" : pagoFinal,
                                "saldo" : $scope.infoMoratorio.si = $scope.infoMoratorio.si - $scope.p3+$scope.p3,//($scope.total3 = ($scope.total3 -$scope.capital2))
                                "saldoNormal":  $scope.infoMoratorio.saldoNormal=$scope.infoMoratorio.saldoNormal-$scope.capital3,
                            });
                            mes++;


                            if (i == 122){
                                $scope.totalTercerPlan = $scope.p3;
                            }
                            $scope.finalMesesp3 = (range3.length);
                        }
                        /*Termina range3*/
                        $scope.range3= range3;


                        $scope.validaEngDif = ($scope.mesesdiferir > 0) ? $scope.rangEd : [];
                        $scope.alphaNumeric = $scope.validaEngDif.concat($scope.range).concat($scope.range2).concat($scope.range3);
                        console.log($scope.alphaNumeric);
                        $scope.dtoptions = DTOptionsBuilder.newOptions().withOption('aaData', $scope.alphaNumeric).withOption('order', [1, 'asc']).withDisplayLength(240).withDOM("<'pull-right'B><l><t><'pull-left'i><p>").withButtons([
                                {extend: 'excel', text: '<i class="fa fa-file-excel-o"></i> Excel', titleAttr: 'Excel'},
                            ]
                        ).withLanguage({"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"});
                    }
                    /*termina calculo de mensualidades*/
                }
            }

            sumMoratorios();
        }
        function limpiaAdeudoOrdinario()
        {
            for(var r=0; r<$scope.alphaNumeric.length; r++)
            {
                if($scope.alphaNumeric[r]['deudaOrdinario']!=0)
                {
                    // $scope.alphaNumeric[r]['deudaOrdinario'] = 0;
                    $scope.alphaNumeric.splice([r]['deudaOrdinario'], 1);
                }
                // alert($scope.alphaNumeric[r]['deudaOrdinario'] );
            }
            console.log("DESPUES DEL BORRRADO");
            console.log($scope.alphaNumeric);
            // return $scope.alphaNumeric;
        }

        function sumMoratorios(){
            let suma=0;
            $scope.alphaNumeric.map((element, index)=>{
               suma = suma + element.interesMoratorio;
            });

            $('#resMoratorioAdeuto').val( '$'+myFunctions.number_format(suma.toFixed(2)));
        }

    });

    function pagoCapChange(param)
    {
        /*
        * Asigna valores a los hidden inputs para que angular los pueda tratar
        */
        var inputVal = document.getElementById('idImporte'+param);
        var numberPay = document.getElementById('payNum'+param);
        var diasRetardo = document.getElementById('idDiasRet'+param);
        var fechaInit = document.getElementById('payDay'+param);
        var currentSI = document.getElementById('idSi' + param);


        console.log("Saldo insoluto de esta posicion: " + currentSI.value);

        console.log("fechaInit", fechaInit);
        console.log("diasRetardo", diasRetardo);
        console.log("inputVal", inputVal);

        // console.log("Fecha de pago Oficial: " + fechaInit.value);
        // console.log("Fecha elegida de retraso: " + diasRetardo.value);
        // console.log("*************************");
        // console.log("Valor de importe: " + inputVal.value);
        // console.log("Valor de paynum: " + numberPay.value);
        // console.log("Valor de dias retardo: " + diasRetardo.value);
        // console.log("*************************");
        var wer=new Date(fechaInit.value);
        var asd=new Date(diasRetardo.value);
        var difference = dateDiffInDays(wer, asd);
        console.log("Días transcurridos alv: " + difference);
        $('#siPosJS').val(currentSI.value);
        $('#jsPagoImporte').val(inputVal.value);
        $('#pagoADiasRetPositionJS').val(numberPay.value);
        $('#diasRetNumberJS').val(difference);
        $('#fechaPagoJS').val(diasRetardo.value);
        console.log("FECHA PAGO II xD:", diasRetardo.value);

        $('#jsPagoImporte').click();

        //aqui me quede, el siguiente paso es agregar la fecha de pao
        // para enviarla al caluclarMoratorio.js y que lo reciba para guardarlo en el array
    }

    function noPayMen(regParam)
    {
        var checkNum = document.getElementById('ckNoPay' + regParam);
        if(checkNum.checked)
        {
            console.log("Esta mensualidad no se pago: " + regParam);
            $('#pagoChecked').val(regParam);
            $('#pagoChecked').click();
        }
    }
    // Jquery Dependency
    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        },
        click: function() {
            formatCurrency($(this));
        },
    });

    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") { return; }

        // original length
        var original_len = input_val.length;

        // initial caret position
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = "$" + left_side + "." + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = "$" + input_val;

            // final formatting
            if (blur === "blur") {
                input_val += ".00";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
    function daysInMonth (month, year) {
        return new Date(year, month, 0).getDate();
    }
    const _MS_PER_DAY = 1000 * 60 * 60 * 24;
    // a and b are javascript Date objects
    function dateDiffInDays(a, b) {
        // Discard the time and time-zone information.
        const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
        const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

        return Math.floor((utc2 - utc1) / _MS_PER_DAY);
    }

</script>
</body>
</html>
