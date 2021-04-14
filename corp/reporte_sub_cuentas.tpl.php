<?php
//---------------------------------------------
// Programa      : reporte_sub_cuentas.tpl.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 09/12/2016
// Descripcion   :
//---------------------------------------------
$strPageTitle = QApplication::Translate('Reportes');
require(__YAMAGUCHI__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 0.5em">
            <?php $this->calFechInic->RenderWithName(); ?>
            <?php $this->calFechFina->RenderWithName(); ?>
            <?php $this->chkSubcPart->RenderWithName(); ?>
            <?php $this->lstSubxCuen->RenderWithName(); ?>
            <?php $this->rdbStatGuia->RenderWithName(); ?>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
