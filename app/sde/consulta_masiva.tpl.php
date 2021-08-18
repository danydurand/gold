<?php
$strPageTitle = QApplication::Translate('Consulta Masiva');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnExpoExce->Render(); ?>
            <?php //$this->btnProcNume->RenderWithName() ?>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="form-controls">
        <div class="container-fluid" data-aos="flip-up" data-aos-duration="2000">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 visible-lg" style="margin-top: 1em;"></div>
                <div class="col-md-12 col-lg-5" style="margin-top: 1em;">
                    <?php $this->rdbTipoEnvi->RenderWithName(); ?>
                    <?php $this->txtListNume->RenderWithName(); ?>
                    <?php $this->chkMostQuer->RenderWithName(); ?>
                </div>
                <div class="col-lg-4 visible-lg" style="margin-top: 1em;"></div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>