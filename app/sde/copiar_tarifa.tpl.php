<?php
//--------------------------------------------
// Programa      : copiar_tarifa_peso.tpl.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 25/02/2017
// Descripcion   :
//--------------------------------------------
$strPageTitle = 'Copiar Tarifa';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-lg-1" style="margin-top: 1em;"></div>
            <div class="col-md-8 col-lg-8" style="margin-top: 1em;">
                <?php $this->txtNombOrig->RenderWithName(); ?>
                <?php $this->txtNombNuev->RenderWithName(); ?>
                <?php $this->txtTasaIvax->RenderWithName(); ?>
                <?php $this->txtPorcAume->RenderWithName(); ?>
            </div>
            <div class="col-md-3 col-lg-3" style="margin-top: 1em;"></div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
