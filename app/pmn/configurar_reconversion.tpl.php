<?php
$strPageTitle = 'Configurar Reconversion';
require(__APP_INCLUDES__ . '/header.inc.php');
?>

<div class="titulo-formulario">
    <div class="hidden-xs hidden-sm col-md-5 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="col-xs-12 col-md-7" style="text-align: left; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="col-xs-12 col-lg-offset-3 col-lg-6">
                <?php $this->chkApliReco->RenderWithName(); ?>
                <?php $this->calFechReco->RenderWithName(); ?>
            </div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>




