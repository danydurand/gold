<?php
$strPageTitle = QApplication::Translate('Carga POD');
require(__APP_INCLUDES__ . '/header.inc.php');
?>

<div class="titulo-formulario">
    <div class="col-xs-4 col-md-4 col-lg-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-4 col-lg-8" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnImpoGuia->Render(); ?>
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnAjusGuia->Render(); ?>
        <?php $this->btnErroProc->Render(); ?>
    </div>
    <div class="hidden-sm col-md-4 col-lg-4"></div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 0.8em">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <?php $this->txtNumeGuia->RenderWithName(); ?>
                <?php $this->txtFechGuia->RenderWithName(); ?>
                <?php $this->txtNombRemi->RenderWithName(); ?>
                <?php $this->txtNombDest->RenderWithName(); ?>
                <?php $this->chkEntrEfec->RenderWithName(); ?>
                <?php $this->lstListCkpt->RenderWithName(); ?>
                <?php $this->txtObseCkpt->RenderWithName(); ?>
                <?php $this->txtEntrAqui->RenderWithName(); ?>
                <?php $this->calFechEntr->RenderWithName(); ?>
                <?php $this->txtHoraEntr->RenderWithName(); ?>
                <?php $this->chkVariGuia->RenderWithName(); ?>
                <?php $this->txtVariGuia->RenderDesigned(); ?>
                <?php $this->txtOtraGuia->RenderDesigned(); ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
