<?php
$strPageTitle = QApplication::Translate('Impresión en Lote de Guías/Etiquetas');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-left: 4em; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnImprEtiq->Render(); ?>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.4em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 1em;">
                    <?php $this->rdbMostLogo->RenderWithName(); ?>
                    <?php $this->txtListGuia->RenderWithName(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>