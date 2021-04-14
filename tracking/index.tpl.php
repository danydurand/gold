<?php
$strPageTitle = QApplication::Translate('SISPAQ - TRACKING');
require('header.inc.php');
?>

<div class="titulo-formulario">
    <div class="col-xs-2 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="col-xs-5 col-md-5 col-lg-5" style="text-align: left; margin-top: -0.25em;">
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnCancel->Render(); ?>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 1em;">
                <div class="col-xs-12 col-md-2">
                    <div class="titulo">Lista de Guías</div>
                    <?php $this->txtListGuia->Render(); ?>
                </div>
                <div class="col-xs-12 col-md-5">
                    <?php $this->lblGuiaCons->Render(); ?>
                    <?php $this->dtgGuiaCons->Render(); ?>
                </div>
                <div class="col-xs-12 col-md-5">
                    <?php $this->lblCkptGuia->Render(); ?>
                    <div style="margin-top: 1.8em"></div>
                    <?php $this->dtgCkptGuia->Render(); ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require('footer.inc.php'); ?>