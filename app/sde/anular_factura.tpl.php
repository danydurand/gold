<?php
$strPageTitle = QApplication::Translate('Anular Factura');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-5 col-lg-6" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
    <div class="hidden-sm col-md-3 col-lg-4"></div>
</div>
<div class="form-controls">
    <div class="container-fluid" data-aos="fade-in">
        <div class="row">
            <div class="col-sm-12" style="min-height: 2em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 2em">
            <div class="col-xs-12 col-md-11">
                <?php $this->txtNombClie->RenderWithName(); ?>
                <?php $this->txtRefeFact->RenderWithName(); ?>
                <?php $this->txtMontFact->RenderWithName(); ?>
                <?php $this->txtMotiAnul->RenderWithName(); ?>
                <?php $this->txtAnulPorx->RenderWithName(); ?>
                <?php $this->calFechAnul->RenderWithName(); ?>
            </div>
        </div>
    </div>
</div>
<style>
    .titulo {
        background-color: #CCCCCC;
        border-radius: 3px;
        font-weight: bold;
        padding: 0.2em;
        text-align: center;
    }
</style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>

