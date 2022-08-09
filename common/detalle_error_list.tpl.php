<?php
// This is the HTML template include file (.tpl.php) for the detalle_error_list.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of this directory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Errores del Proceso';
require('inc/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-sm-3 col-md-3 col-lg-4 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render() ?>
            <?php $this->btnFiltAvan->Render() ?>
            <?php $this->btnExpoExce->Render() ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?php $this->lblNombProc->RenderWithName(); ?>
                    <?php $this->lblLogiUsua->RenderWithName(); ?>
                </div>
                <div class="col-sm-4">
                    <?php $this->lblFechEjec->RenderWithName(); ?>
                    <?php $this->lblComeProc->RenderWithName(); ?>
                </div>
                <div class="col-sm-4">
                    <?php $this->lblHoraInic->RenderWithName(); ?>
                    <?php $this->lblHoraFina->RenderWithName(); ?>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <?php $this->dtgDetalleErrors->Render(); ?>
                </div>
            </div>
        </div>
    </div>
    <style>
        .form-name {
            width: 34%;
        }
    </style>

<?php require('inc/footer.inc.php'); ?>