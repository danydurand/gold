<?php
	// This is the HTML template include file (.tpl.php) for the asistente_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Cargar Datos Fiscales');
	require(__APP_INCLUDES__ . '/header.inc.php');
?>

<div class="titulo-formulario">
    <div class="col-md-4 col-lg-4" style="text-align: left">
        <?php $this->lblNotiUsua->Render(); ?>
    </div>
    <div class="col-md-4 col-lg-4">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="col-md-4 col-lg-4" style="text-align: right">
        <?php $this->lblMensUsua->Render(); ?>
    </div>
</div>

<div class="form-controls">
    <br>
    <?php $this->txtNumeFact->RenderWithName(); ?>
    <?php $this->txtNumeDocu->RenderWithName(); ?>
    <?php $this->txtMaquFisc->RenderWithName(); ?>
    <?php $this->txtFechImpr->RenderWithName(); ?>
    <?php $this->txtHoraImpr->RenderWithName(); ?>
    <?php $this->txtFactImpr->RenderWithName(); ?>
</div>
<div class="form-actions">
    <div class="form-save"><?php $this->btnSave->Render(); ?></div>
    <div class="form-cancel"><?php $this->btnCancel->Render(); ?></div>
</div>

<?php require(__APP_INCLUDES__.'/footer.inc.php'); ?>

