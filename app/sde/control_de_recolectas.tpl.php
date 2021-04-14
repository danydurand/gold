<?php
$strPageTitle = QApplication::Translate('Control de Recolectas');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSend->Render() ?>
            <?php $this->btnSave->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row" style="margin-top:.5em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6" style="margin-top: 1em;">
                    <?php $this->rdbCortReco->RenderWithName(); ?>
                    <?php $this->txtRangFech->RenderWithName(); ?>
                    <?php $this->txtRangInic->RenderWithName(); ?>
                    <?php $this->txtRangFina->RenderWithName(); ?>
                    <?php $this->rdbSeleSucu->RenderWithName(); ?>
                    <?php $this->lstRegiSucu->RenderWithName(); ?>
                </div>
                <div class="col-xs-12 col-md-5" style="margin-top: 1em;">
                    <?php $this->lstSucuSele->RenderWithName(); ?>
                    <?php $this->txtDireMail->RenderWithName(); ?>
                    <?php $this->chkMostQuer->RenderWithName(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>