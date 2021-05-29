<?php
	// This is the HTML template include file (.tpl.php) for the transportista_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Transportista' . ' - ' . $this->mctTransportista->TitleVerb;
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
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-10">
            <?php $this->lblId->RenderWithName(); ?>
				<?php $this->txtNombre->RenderWithName(); ?>
				<?php $this->txtRif->RenderWithName(); ?>
				<?php $this->chkActivo->RenderWithName(); ?>
				<?php $this->chkSecuenciaPropia->RenderWithName(); ?>
				<?php $this->txtObservacion->RenderWithName(); ?>
				<?php //$this->lblCreatedAt->RenderWithName(); ?>
				<?php //$this->lblUpdatedAt->RenderWithName(); ?>
				<?php //$this->lblDeletedAt->RenderWithName(); ?>
				<?php //$this->txtCreatedBy->RenderWithName(); ?>
				<?php //$this->txtUpdatedBy->RenderWithName(); ?>
				<?php //$this->txtDeletedBy->RenderWithName(); ?>
	        </div>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>