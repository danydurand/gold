<?php
$strPageTitle = 'Inventario de Almacén';
require('inc/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
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
                <div class="col-md-11" style="margin-top: 1em;">
                    <?php $this->txtUbicAlma->RenderWithName(); ?>
                    <?php $this->lstElimPodx->RenderWithName(); ?>
                    <?php $this->txtNumeSeri->RenderWithName(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require('inc/footer.inc.php'); ?>