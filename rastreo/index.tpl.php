<?php
$strPageTitle = QApplication::Translate('GOLD - RASTREO');
require('header.inc.php');
?>

<div class="titulo-formulario" style="min-height: 3em">
    <!--<div class="col-xs-2 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">-->
        <?php //$this->lblTituForm->Render(); ?>
    <!--</div>-->
    <div class="col-xs-5 col-md-5 col-lg-5" style="text-align: left; margin-top: -0.25em;">
        <b>Nro de Guía: </b><?php $this->txtListGuia->Render(); ?>
        <span style="margin-top: -.5em">
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnCancel->Render(); ?>
        </span>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="col-xs-12 col-md-6">
                <?php $this->lblGuiaCons->Render(); ?>
                <?php $this->dtgGuiaCons->Render(); ?>
                <div style="margin-top: 1.8em"></div>
                <?php $this->lblPiezGuia->Render(); ?>
                <?php $this->dtgPiezGuia->Render(); ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php $this->lblGuiaCkpt->Render(); ?>
                <?php $this->dtgGuiaCkpt->Render(); ?>
            </div>
        </div>
    </div>
</div>

<?php require('footer.inc.php'); ?>