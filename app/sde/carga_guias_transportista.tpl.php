<?php
$strPageTitle = QApplication::Translate('Carga Guías Transp');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-12 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>&nbsp;&nbsp;<?php $this->objDefaultWaitIcon->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-6 col-lg-6" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnImpoInfo->Render(); ?>
        <?php $this->btnErroProc->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.4em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 0.8em">
            <div class="col-xs-6" style="margin-top: 1em">
                <?php $this->lstTranCarg->RenderWithName(); ?>
                <?php $this->txtCargArch->RenderWithName(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <?php include('carga_guias_transp_instrucciones.tpl.php'); ?>
        </div>
    </div>
</div>
<style>
    .req {
        font-weight: bold;
        color: red;
    }
</style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
