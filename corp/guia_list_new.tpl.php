<?php
$strPageTitle = 'Lista de Guías';
require(__YAMAGUCHI__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-sm-3 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>&nbsp;&nbsp;<?php $this->objWaitIcon->Render(); ?>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-9" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnMostFilt->Render(); ?>
            <?php //$this->btnMostImpr->Render(); ?>
            <?php $this->btnFiltAvan->Render(); ?>
            <?php //$this->btnImprMani->Render(); ?>
            <?php //$this->btnImprLote->Render(); ?>
            <?php //$this->btnExpoExce->Render(); ?>
            <?php $this->btnFiltDhoy->Render(); ?>
            <?php //$this->btnFiltPend->Render(); ?>
            <?php $this->btnFiltTran->Render(); ?>
            <?php $this->btnFiltEntr->Render(); ?>
            <?php $this->btnFiltToda->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-bottom: 0.5em">
                <div class="col-lg-2 visible-lg"></div>
                <div class="col-xs-12 col-md-6 col-lg-7">
                    <?php $this->txtNumeGuia->Render(); ?>
                    <?php $this->calFechInic->Render(); ?>
                    <?php $this->calFechFina->Render(); ?>
                    <?php $this->lstCodiOrig->Render(); ?>
                    <?php $this->lstCodiDest->Render(); ?>
                </div>
                <div class="col-md-2 col-lg-3" style="text-align: left">
                    <?php $this->btnApliFilt->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <?php $this->dtgGuiaClie->Render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>