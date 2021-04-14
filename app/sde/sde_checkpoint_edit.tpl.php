<?php
// This is the HTML template include file (.tpl.php) for the sde_checkpoint_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = $this->mctSdeCheckpoint->TitleVerb.' Checkpoint';
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
					<?php $this->txtCodiCkpt->RenderWithName(); ?>
					<?php $this->txtDescCkpt->RenderWithName(); ?>
					<?php $this->txtDescDevo->RenderWithName(); ?>
					<?php //$this->txtComentarioIvr->RenderWithName(); ?>
					<?php $this->lstTipoTermObject->RenderWithName(); ?>
					<?php $this->lstTipoCkptObject->RenderWithName(); ?>
					<?php //$this->txtTextObse->RenderWithName(); ?>
                    <?php $this->lstCodiStatObject->RenderWithName(); ?>
                    <?php $this->lstCodiCcatObject->RenderWithName(); ?>
                    <?php $this->lstCodiInadObject->RenderWithName(); ?>
				</div>
				<div class="col-md-6" style="margin-top: 1em;">
					<?php $this->lstNotificarObject->RenderWithName(); ?>
					<?php $this->txtCodigoSodexo->RenderWithName(); ?>
					<?php $this->txtDescripcionSodexo->RenderWithName(); ?>
					<?php $this->lstPais->RenderWithName(); ?>
					<?php //$this->txtImagen->RenderWithName(); ?>
                    <?php $this->lstNombImag->RenderWithName(); ?>
                    <?php //$this->txtColor->RenderWithName(); ?>
                    <?php $this->lstColoImag->RenderWithName(); ?>
                    <?php $this->lblMuesImag->RenderWithName(); ?>
                    <?php //$this->chkNotificacionSms->RenderWithName(); ?>
				</div>
			</div>
		</div>
	</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>