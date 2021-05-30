<?php
$strPageTitle = 'Establecer Ubic.';
require('inc/header.inc.php');
?>

<div class="titulo-formulario">
    <div class="col-xs-3 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11" style="margin-top: 1em;">
                <div id="spinner" style="text-align: center; margin-bottom: 1em"><?php $this->objDefaultWaitIcon->Render(); ?></div>
                <?php $this->lstSucuDisp->RenderWithName(); ?>
                <?php $this->lstReceSucu->RenderWithName(); ?>
                <?php $this->lstCajaRece->RenderWithName(); ?>
            </div>
        </div>
    </div>
</div>
<?php require('inc/footer.inc.php'); ?>


