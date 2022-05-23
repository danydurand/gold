<?php
$strPageTitle = QApplication::Translate('Carga Masiva Piezas');
require('inc/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-12 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>&nbsp;&nbsp;<?php $this->objDefaultWaitIcon->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-6 col-lg-6" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnErroProc->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid" data-aos="fade-in">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.4em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-2 col-xs-3">
                <?php $this->lblNumeGuia->RenderWithName(); ?>
            </div>
            <div class="col-xs-6">
                <?php $this->lblNombRemi->RenderWithName(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-2 col-xs-3">
                <?php $this->lblDestGuia->RenderWithName(); ?>
            </div>
            <div class="col-xs-6">
                <?php $this->lblNombDest->RenderWithName(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em">
            <div class="col-xs-offset-3 col-xs-6">
                <?php $this->lstUnidMedi->RenderWithName(); ?>
                <?php $this->txtCargArch->RenderWithName(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="col-xs-offset-1 col-xs-10">
                <?php include('carga_masiva_piezas_instrucciones.tpl.php'); ?>
            </div>
        </div>
    </div>
</div>
<style>
    .req {
        font-weight: bold;
        color: red;
    }
</style>
<?php require('inc/footer.inc.php'); ?>
