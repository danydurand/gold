<?php
//----------------------------------------------------------
// Programa       : simular_impresion.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 04/08/16 11:51 AM
// Proyecto       : newliberty
// Descripcion    : 
//----------------------------------------------------------
$strPageTitle = 'Capturar Datos Fiscales';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-5" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-7" style="text-align: left; margin-top: -0.25em;">
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
            <div class="col-md-3"></div>
            <div class="col-md-6" style="margin-top: 1em;">
                <?php $this->rdbTipoDocu->RenderWithName(); ?>
                <?php $this->txtNumeDocu->RenderWithName(); ?>
                <?php $this->txtDocuFisc->RenderWithName(); ?>
                <?php $this->txtMaquFisc->RenderWithName(); ?>
                <?php $this->txtFechImpr->RenderWithName(); ?>
                <?php $this->txtHoraImpr->RenderWithName(); ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
