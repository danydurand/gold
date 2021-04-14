<?php
	// This is the HTML template include file (.tpl.php) for the fac_vendedor_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = $this->mctFacVendedor->TitleVerb.' Vendedor';
	require(__APP_INCLUDES__ . '/header.inc.php');
	require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
	<div class="form-controls">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
	                <?php $this->lblMensUsua->Render(); ?>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-12" style="margin-top: 1em;">
	            	<?php $this->txtId->RenderWithName(); ?>
					<?php $this->txtNombre->RenderWithName(); ?>
					<?php $this->txtCedula->RenderWithName(); ?>
					<?php $this->txtDireccionEmail->RenderWithName(); ?>
					<?php $this->txtPorcentajeComision->RenderWithName(); ?>
					<?php $this->calFechaRegistro->RenderWithName(); ?>
					<?php $this->lstPais->RenderWithName(); ?>
					<?php $this->lstStatus->RenderWithName(); ?>
		        </div>
	        </div>
	    </div>
	</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>