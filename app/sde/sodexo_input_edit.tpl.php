<?php
// This is the HTML template include file (.tpl.php) for the sodexo_input_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = $this->mctSodexoInput->TitleVerb.' Guía Sodexo';
require(__APP_INCLUDES__ . '/header.inc.php');
require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
    <!-- Contenido del Body -->
	<div class="form-controls">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
	                <?php $this->lblMensUsua->Render(); ?>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-6" style="margin-top: 1em; margin-left: -3em;">
	            	<?php //$this->lblId->RenderWithName(); ?>
					<?php $this->txtCodigoTurpial->RenderWithName(); ?>
					<?php $this->txtRazonSocial->RenderWithName(); ?>
					<?php $this->txtGuiaSodexo->RenderWithName(); ?>
					<?php $this->txtCantidadEnvases->RenderWithName(); ?>
					<?php $this->txtFechaDespacho->RenderWithName(); ?>
					<?php $this->txtDireccionEntrega->RenderWithName(); ?>
					<?php $this->txtCiudad->RenderWithName(); ?>
					<?php $this->txtEstado->RenderWithName(); ?>
				</div>
	            <div class="col-md-6" style="margin-top: 1em; margin-left: -3em;">
					<?php $this->txtZonaFiscal->RenderWithName(); ?>
					<?php $this->txtTipoCliente->RenderWithName(); ?>
					<?php $this->txtRegistradoPor->RenderWithName(); ?>
					<?php $this->calFechaRegistro->RenderWithName(); ?>
					<?php $this->txtArchivoInput->RenderWithName(); ?>
					<?php $this->txtGuiaId->RenderWithName(); ?>
					<?php $this->txtProcesadoPor->RenderWithName(); ?>
					<?php $this->calFechaProceso->RenderWithName(); ?>
					<?php $this->lblCierCicl->RenderWithName(); ?>
		        </div>
	        </div>
	    </div>
	</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>