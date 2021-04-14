<?php
//----------------------------------------------------------
// Programa       : asignar_cupon.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 03/08/16 02:27 PM
// Proyecto       : newliberty
// Descripcion    : 
//----------------------------------------------------------
$strPageTitle = 'Aplicar Cupón';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-4 col-lg-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-8 col-lg-8" style="text-align: left; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
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
            <div class="col-md-12" style="margin-top: 1em;">
                <?php $this->txtNumeCupo->RenderWithName(); ?>
                <?php $this->lblNumeCupo->RenderWithName(); ?>
                <?php $this->lblTipoCupo->RenderWithName(); ?>
                <?php $this->lblPorcDesc->RenderWithName(); ?>
                <?php $this->lblReceCupo->RenderWithName(); ?>
                <?php $this->lblNumeGuia->RenderWithName(); ?>
                <?php $this->lblMontBase->RenderWithName(); ?>
                <?php $this->lblMontDesc->RenderWithName(); ?>
                <?php $this->lblTotaDesc->RenderWithName(); ?>
            </div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
