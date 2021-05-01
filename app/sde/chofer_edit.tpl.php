<?php
// This is the HTML template include file (.tpl.php) for the chofer_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.
$strPageTitle = $this->mctChofer->TitleVerb. ' Chofer';
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
				<div class="col-md-5" style="margin-top: 1em;">
					<?php $this->lblCodiChof->RenderWithName(); ?>
					<?php $this->txtNombChof->RenderWithName(); ?>
					<?php $this->txtApelChof->RenderWithName(); ?>
					<?php $this->txtNumeCedu->RenderWithName(); ?>
					<?php $this->txtTeleChof->RenderWithName(); ?>
					<?php $this->txtTextObse->RenderWithName(); ?>
				</div>
				<div class="col-md-5" style="margin-top: 1em;">
                    <br>
					<?php $this->txtLogin->RenderWithName(); ?>
					<?php $this->txtPassword->RenderWithName(); ?>
					<?php //$this->calAccesoMobile->RenderWithName(); ?>
					<?php $this->lstSucursal->RenderWithName(); ?>
					<?php $this->lstTipoMensObject->RenderWithName(); ?>
					<?php $this->lstCodiDispObject->RenderWithName(); ?>
					<?php $this->lstCodiStatObject->RenderWithName(); ?>
				</div>
				<div class="col-lg-2 visible-lg"></div>
			</div>
		</div>
	</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>