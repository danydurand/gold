<?php
//----------------------------------------------------------
// Programa       : liquidacion_masiva_facturas.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 04/08/16 01:21 PM
// Proyecto       : newliberty
// Descripcion    : 
//----------------------------------------------------------
$strPageTitle = 'Liquidación Masiva de Facturas';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-4 col-lg-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-8 col-lg-8" style="text-align: left; margin-top: -0.25em;">
        <?php $this->btnVerificar->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="margin-top: 1em;">
                <?php $this->lstFormPago->RenderWithName(); ?>
                <?php $this->txtNumeDocu->RenderWithName(); ?>
                <?php $this->lstCodiBanc->RenderWithName(); ?>
                <?php $this->txtMontPago->RenderWithName(); ?>
                <?php $this->txtNumeFact->RenderWithName(); ?>
                <?php $this->txtMontFact->RenderWithName(); ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
