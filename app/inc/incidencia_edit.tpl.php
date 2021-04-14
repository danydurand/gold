<?php
	// This is the HTML template include file (.tpl.php) for the incidencia_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Incidencia' . ' - ' . $this->mctIncidencia->TitleVerb;
	require(__APP_INCLUDES__ . '/header.inc.php');
?>
	<div class="titulo-formulario">
		<div class="col-md-4" style="text-align: left">
			<?php $this->lblNotiUsua->Render(); ?>
		</div>
		<div class="col-md-4">
			<?php $this->lblTituForm->Render(); ?>
		</div>
		<div class="col-md-4" style="text-align: right">
			<?php $this->lblMensUsua->Render(); ?>
		</div>
	</div>

	<div class="form-controls">
		<div class="container-fluid">
			<div id="row">
				<div class="col-md-1" style="text-align: left; padding: 0">
					<?php $this->btnPrimRegi->Render(); ?>
					<?php $this->btnRegiAnte->Render(); ?>
				</div>
				<div class="col-md-10"></div>
				<div class="col-md-1" style="text-align: right; padding: 0">
					<?php $this->btnProxRegi->Render(); ?>
					<?php $this->btnUltiRegi->Render(); ?>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-md-12">
					<div class="" role="tabpanel">
						<ul class="nav-tabs tab-l nav-justified" role="tablist">
							<li class="active" role="presentation">
								<a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Datos de la incidencia</a>
							</li>
							<li role="presentation">
								<a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Datos del Pago</a>
							</li>
						</ul>
						<!-- ------------------------------------------------------------------------------------------------ -->
						<div class="tab-content">
							<div class="tab-pane active" role="tabpanel" id="seccion1">
								<div class="media">
									<div class="media-body"><br>
										<div class="col-md-1"></div>
										<div class="col-md-5">
											<?php $this->lblId->RenderWithName(); ?>
											<?php $this->txtCodigo->RenderWithName(); ?>
											<?php $this->txtNumero->RenderWithName(); ?>
											<?php $this->calFechaRegistro->RenderWithName(); ?>
											<?php $this->calFechaIncidencia->RenderWithName(); ?>
											<?php $this->txtClienteId->RenderWithName(); ?>
											<?php $this->txtContenidoEntregado->RenderWithName(); ?>
											<?php $this->txtContenidoEsperado->RenderWithName(); ?>
										</div>
										<div class="col-md-5">
											<?php $this->txtGuia->RenderWithName(); ?>
											<?php $this->txtTracking->RenderWithName(); ?>
											<?php $this->lstMotivo->RenderWithName(); ?>
											<?php $this->lstLugar->RenderWithName(); ?>
											<?php $this->lstSucursal->RenderWithName(); ?>
											<?php $this->lstTipoReembolso->RenderWithName(); ?>
											<?php $this->txtMontoPagado->RenderWithName(); ?>
											<?php $this->txtNroFactura->RenderWithName(); ?>
											<?php $this->txtEstatus->RenderWithName(); ?>
										</div>
										<div class="col-md-1"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane" role="tabpanel" id="seccion2">
								<div class="media">
									<div class="media-body"><br>
										<div class="col-md-12">
											<?php $this->txtNombreTitular->RenderWithName(); ?>
											<?php $this->txtCedula->RenderWithName(); ?>
											<?php $this->txtEmail->RenderWithName(); ?>
											<?php $this->txtTipoCuenta->RenderWithName(); ?>
											<?php $this->txtNroCuenta->RenderWithName(); ?>
											<?php $this->txtBanco->RenderWithName(); ?>
											<?php $this->calFechaPago->RenderWithName(); ?>
											<?php $this->txtFormaPago->RenderWithName(); ?>
											<?php $this->txtNroReferencia->RenderWithName(); ?>
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

	<div class="form-actions">
		<div class="form-save"><?php $this->btnSave->Render(); ?></div>
		<div class="form-cancel"><?php $this->btnLogxCamb->Render(); ?></div>
		<div class="form-cancel"><?php $this->btnCancel->Render(); ?></div>
		<div class="form-delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<style>
		input[type="radio"],
		input[type="checkbox"] {
			margin: 4px 0 0;
			margin-top: 8px;
			line-height: normal;
		}

		.tab-l > li > a {
			color: #23527C;
			text-decoration: none;
		}

		.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
			background-color: #A52422;
		}
	</style>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>