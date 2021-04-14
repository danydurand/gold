<?php
$strPageTitle = QApplication::Translate('Incidencias');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: right; margin-top: -0.25em; margin-left: -4em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
    <div class="hidden-sm col-md-3 col-lg-4"></div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 1em; margin-left: -3em;">
                <?php $this->rdbTipoInci->RenderWithName(); ?>
                <?php $this->lstListCkpt->RenderWithName(); ?>
                <?php $this->txtNumeSeri->RenderWithName(); ?>
                <?php $this->txtTextObse->RenderWithName(); ?>
            </div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
