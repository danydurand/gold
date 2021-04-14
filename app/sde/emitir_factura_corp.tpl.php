<?php
$strPageTitle = QApplication::Translate('Emitir Factura');
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 2em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 2em">
            <div class="col-xs-12 col-md-5">
                <?php $this->chkSeleClie->RenderWithName(); ?>
                <?php $this->lstCodiClie->RenderWithName(); ?>
                <?php $this->calFechInic->RenderWithName(); ?>
                <?php $this->calFechFina->RenderWithName(); ?>
                <?php $this->chkSeleConc->RenderWithName(); ?>
                <?php $this->lstConcFact->RenderWithName(); ?>
            </div>
            <div class="col-xs-12 col-md-7">
                <div class="titulo" style="margin-bottom: .2em">Manifiestos aptos p/Facturar</div>
                <?php $this->dtgNotaFact->Render(); ?>
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

