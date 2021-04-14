<?php
	// This is the HTML template include file (.tpl.php) for the asistente_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = $this->mctAsistente->TitleVerb . ' Asistente';
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
            <?php $this->lblCodiAsis->RenderWithName(); ?>
				<?php $this->txtNombAsis->RenderWithName(); ?>
				<?php $this->txtApelAsis->RenderWithName(); ?>
				<?php $this->txtNumeCedu->RenderWithName(); ?>
				<?php $this->txtNumeTele->RenderWithName(); ?>
				<?php $this->txtTextObse->RenderWithName(); ?>
				<?php $this->lstCodiEstaObject->RenderWithName(); ?>
				<?php $this->lstCodiDispObject->RenderWithName(); ?>
				<?php $this->lstCodiStatObject->RenderWithName(); ?>
	        </div>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>