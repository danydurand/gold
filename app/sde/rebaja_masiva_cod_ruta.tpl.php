<?php
$strPageTitle = QApplication::Translate('COD de la Ruta');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnRepoCobr->Render(); ?>
            <?php $this->btnRepoErro->Render(); ?>
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
                <div class="col-md-12" style="margin-top: 1em;">    
                    <?php $this->txtNombPers->RenderWithName(); ?>
                    <?php $this->lstFormPago->RenderWithName(); ?>
                    <?php $this->txtNumeDocu->RenderWithName(); ?>
                    <?php $this->calFechPago->RenderWithName(); ?>
                    <?php $this->txtNumeMani->RenderWithName(); ?>
                    <?php $this->lstNumeGuia->RenderWithName(); ?>
                    <?php $this->txtTotaCobr->RenderWithName(); ?>
                    <?php $this->dlgMensUsua->RenderWithName(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>