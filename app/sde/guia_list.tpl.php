<?php
// This is the HTML template include file (.tpl.php) for the guia_list.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of this directory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Lista de Guías';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <!-- Encabezado del Body -->
    <div class="titulo-formulario">
        <div class="col-sm-3 col-md-3 col-lg-4 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render() ?>
            <?php $this->btnNuevRegi->Render() ?>
            <?php //$this->btnFiltAvan->Render() ?>
            <?php $this->btnExpoExce->Render() ?>
            <?php $this->btnImprLote->Render() ?>
        </div>
    </div>
    <!-- Contenido del Body -->
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 visible-lg"></div>
                <div class="col-md-6 col-lg-5">
                    <?php $this->txtNumeGuia->RenderWithName(); ?>
                    <?php $this->txtBuscCodi->RenderWithName(); ?>
                    <?php $this->txtBuscNomb->RenderWithName(); ?>
                    <?php $this->lstClieGuia->RenderWithName(); ?>
                    <?php $this->calFechInic->RenderWithName(); ?>
                    <?php $this->calFechFina->RenderWithName(); ?>
                    <?php $this->txtNumePrec->RenderWithName(); ?>
                </div>
                <div class="col-md-6 col-lg-5">
                    <?php $this->lstTipoPago->RenderWithName(); ?>
                    <?php $this->lstCodiOrig->RenderWithName(); ?>
                    <?php $this->lstCodiDest->RenderWithName(); ?>
                    <?php $this->lstTienPodx->RenderWithName(); ?>
                    <?php $this->lstCodiCkpt->RenderWithName(); ?>
                    <?php $this->chkGuiaAnul->RenderWithName(); ?>
                    <br>
                    <div style="text-align: center">
                        <?php $this->btnBuscRegi->Render(); ?>
                    </div>
                </div>
                <div class="col-lg-1 visible-lg"></div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <?php $this->dtgGuias->Render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>