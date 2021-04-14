<?php
	// This is the HTML template include file (.tpl.php) for the usuario_connect_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = $this->mctUsuarioConnect->TitleVerb.' Usuario CORP';
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
	            <div class="col-md-6" style="margin-top: 1em;">
	            	<?php $this->lblId->RenderWithName(); ?>
					<?php $this->txtBuscCodi->RenderWithName(); ?>
					<?php $this->txtBuscNomb->RenderWithName(); ?>
					<?php $this->lstCliente->RenderWithName(); ?>
					<?php $this->txtNombre->RenderWithName(); ?>
					<?php $this->txtDireccion->RenderWithName(); ?>
					<?php $this->txtEmail->RenderWithName(); ?>
					<?php $this->txtTelefono->RenderWithName(); ?>
	            </div>
	            <div class="col-md-6" style="margin-top: 3.8em;">
					<?php $this->txtLogiUsua->RenderWithName(); ?>
					<?php $this->txtClaveAcceso->RenderWithName(); ?>
					<?php $this->lstSucursal->RenderWithName(); ?>
					<?php $this->lstStatus->RenderWithName(); ?>
					<?php $this->calFechaRegistro->RenderWithName(); ?>
					<?php $this->txtCodigoPostal->RenderWithName(); ?>
					<?php $this->calFechaAcceso->RenderWithName(); ?>
					<?php $this->txtCantidadIntentos->RenderWithName(); ?>
					<?php $this->txtMotivoBloqueo->RenderWithName(); ?>
		        </div>
	        </div>
	    </div>
	</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>