<link href="<?= base_url() ?>dist/css/datatableNFilters.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<body>
	<div class="wrapper">
		<?php $this->load->view('template/sidebar');?>

		<!-- Modals -->
		<div class="modal fade" id="seeInformationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Cláusulas</h4>
					</div>
					<div class="modal-body"> 
						<h4 id="clauses_content" class="modal-title">  <b id="nomLoteHistorial"></b></h4>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal"> CERRAR</button>
					</div>
				</div>
			</div>
		</div>
		<!-- END Modals -->

		<div class="content boxContent">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header card-header-icon" data-background-color="goldMaderas">
								<i class="fas fa-box fa-2x"></i>
							</div>
							<div class="card-content">
								<div class="encabezadoBox">
									<h3 class="card-title center-align">Inventario disponible</h3>
									<p class="card-title pl-1"></p>
								</div>
								<div class="toolbar">
									<div class="row">
										<form id="formFilters">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 overflow-hidden">
												<div class="form-group">
													<label class="control-label">Proyecto</label>
													<select name="filtro3"
															id="filtro3" 
															class="selectpicker select-gral m-0" 
															data-style="btn"
															data-show-subtext="true" 
															data-live-search="true" 
															title="Selecciona una opción" 
															data-size="7"
															data-container="body" required>
																<option value="0"> SELECCIONA TODO</option>
													</select>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 overflow-hidden">
												<div class="form-group  ">
													<label class="control-label">Condominio</label>
													<select id="filtro4"
															name="filtro4[]"
															class="selectpicker select-gral m-0"
															data-style="btn"
															data-show-subtext="true"
															data-live-search="true"
															multiple
															title="Selecciona una opción" 
															data-size="7"
															data-container="body"
															required>
													</select>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 overflow-hidden">
												<div class="form-group">
													<label class="control-label">Grupo</label>
													<select name="filtro5"
															id="filtro5"
															class="selectpicker select-gral m-0"
															data-style="btn"
															data-show-subtext="true"
															data-live-search="true"
															title="Selecciona una opción"
															data-size="7"
															data-container="body"
															required>
														<option value="1"> < 200m2 </option>
														<option value="2"> >= 200 y < 300 </option>
														<option value="3"> >= 300m2 </option>
													</select>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 overflow-hidden">
												<div class="form-group ">
													<label class="control-label">Superficie</label>
														<select class="selectpicker select-gral m-0"
																id="filtro6"
																name="filtro6[]"
																data-style="btn btn-primary"
																data-show-subtext="true"
																data-live-search="true"
																title="Selecciona una opción"
																data-size="7"
																data-container="body"
																required multiple>
														</select>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 overflow-hidden">
												<div class="form-group ">
													<label class="control-label">Precio por m<sup>2</sup></label>
													<select	class="selectpicker select-gral m-0" 
															id="filtro7"
															name="filtro7[]"
															data-style="btn btn-primary"
															data-show-subtext="true"
															data-live-search="true"
															title="Selecciona una opción"
															data-size="7"
															data-container="body"
															required
															multiple>
													</select>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 overflow-hidden">
												<div class="form-group ">
													<label class="control-label">Precio total</label>
													<select	class="selectpicker select-gral m-0" 
															id="filtro8"
															name="filtro8[]"
															data-style="btn btn-primary"
															data-show-subtext="true"
															data-live-search="true"
															title="Selecciona una opción"
															data-size="7"
															data-container="body"
															required
															multiple></select>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 overflow-hidden">
												<div class="form-group ">
													<label class="control-label">Meses S/N</label>
													<select	class="selectpicker select-gral m-0" 
															id="filtro9"
															name="filtro9[]"
															data-style="btn btn-primary "
															data-show-subtext="true"
															data-live-search="true"
															title="Selecciona una opción"
															data-size="7"
															data-container="body"
															required
															multiple></select>
												</div>
											</div>
										</form>
									</div>
								</div>
								<table id="addExp" class="table-striped table-hover hide">
									<thead>
										<tr>
											<th>PROYECTO</th>
											<th>CONDOMINIO</th>
											<th>LOTE</th>
											<th>SUPERFICIE</th>
											<th>PRECIO M<sup>2</sup></th>
											<th>PRECIO TOTAL</th>
											<th>MESES SIN INTERESES</th>
											<th>TIPO VENTA</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
								</table>
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
	<script src="<?=base_url()?>dist/js/controllers/general/main_services.js"></script>
	<!--script of the page-->
	<script src="<?=base_url()?>dist/js/controllers/asesores/inventario_disponible.js"></script>
</body>