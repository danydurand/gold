<?php
$strPageTitle = 'Eficiencia en Entrega por Sucursal';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-6 col-lg-4" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnExpoPdfx->Render(); ?>
        </div>
    </div>
    <!-- Form Controls -->
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: .3em">
                <div class="col-md-12">
                    <?php $this->dttFechInic->RenderWithName(); ?>
                    <?php $this->dttFechFina->RenderWithName(); ?>
                    <?php $this->lstCodiEsta->RenderWithName(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>