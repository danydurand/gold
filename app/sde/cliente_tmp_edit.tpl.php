<?php
	// This is the HTML template include file (.tpl.php) for the cliente_tmp_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'ClienteTmp' . ' - ' . $this->mctClienteTmp->TitleVerb;
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
				<?php $this->txtCodigoContrato->RenderWithName(); ?>
				<?php $this->txtNombre->RenderWithName(); ?>
				<?php $this->txtRif->RenderWithName(); ?>
				<?php $this->txtDireccion->RenderWithName(); ?>
				<?php $this->lblSucuClie->RenderWithName(); ?>
                <?php $this->lblOtraSucu->RenderWithName(); ?>
                <?php $this->lstSucuClie->RenderWithName(); ?>
                <?php $this->chkAsigSucu->RenderWithName(); ?>
                <?php $this->txtPersCona->RenderWithName(); ?>
                <?php $this->txtTeleCona->RenderWithName(); ?>
                <?php $this->calFechCarg->RenderWithName(); ?>
	        </div>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>