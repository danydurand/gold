<?php
$strPageTitle = 'Lista de Guías';
require(__YAMAGUCHI__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-sm-3 col-md-3 col-lg-4 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php //$this->btnNuevRegi->Render() ?>
            <?php //$this->btnFiltComu->Render() ?>
            <?php //$this->btnExpoExce->Render() ?>
            <?php //$this->btnManiDrop->Render() ?>
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
                <div class="col-lg-1 visible-lg"></div>
                <div class="col-md-6 col-lg-5" style="min-height: 2em;">
                    <?php //$this->txtNumeGuia->RenderWithName(); ?>
                    <?php //$this->calFechInic->RenderWithName(); ?>
                    <?php //$this->calFechFina->RenderWithName(); ?>
                    <?php //$this->txtNombRemi->RenderWithName(); ?>
                    <?php //$this->txtNombDest->RenderWithName(); ?>
                </div>
                <div class="col-md-6 col-lg-5" style="min-height: 2em;">
                    <?php //$this->txtPesoGuia->RenderWithName(); ?>
                    <?php //$this->txtCantPiez->RenderWithName(); ?>
                    <?php //$this->lstTipoPago->RenderWithName(); ?>
                    <?php //$this->lstCodiOrig->RenderWithName(); ?>
                    <?php //$this->lstCodiDest->RenderWithName(); ?>
                    <br>
                    <div style="text-align: center">
                        <?php //$this->btnImprMani->Render(); ?>
                        <?php //$this->btnBuscRegi->Render(); ?>
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