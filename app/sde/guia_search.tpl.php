<?php
$strPageTitle = QApplication::Translate('Buscar Guía');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-6" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnExpoExce->Render(); ?>
        </div>
        <div class="hidden-sm col-md-3 col-lg-4"></div>
    </div>
    <!-- Contenido del Body -->
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 2em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <?php $this->txtNumeGuia->RenderWithName(); ?>
                    <?php $this->txtGuiaExte->RenderWithName(); ?>
                    <?php $this->txtNumeMast->RenderWithName(); ?>
                    <?php $this->txtCodiInte->RenderWithName(); ?>
                    <?php $this->txtNombBusc->RenderWithName(); ?>
                    <?php $this->lstCodiClie->RenderWithName(); ?>
                    <?php $this->chkInclSubc->RenderWithName(); ?>
                    <?php $this->calFechInic->RenderWithName(); ?>
                    <?php $this->calFechFina->RenderWithName(); ?>
                </div>
                <div class="col-xs-12 col-md-4">
                    <?php $this->txtNumePrec->RenderWithName(); ?>
                    <?php $this->lstTipoPago->RenderWithName(); ?>
                    <?php $this->txtUbicFisi->RenderWithName(); ?>
                    <?php $this->lstCodiOrig->RenderWithName(); ?>
                    <?php $this->lstReceOrig->RenderWithName(); ?>
                    <?php $this->lstCodiDest->RenderWithName(); ?>
                    <?php $this->lstCodiRece->RenderWithName(); ?>
                    <?php $this->lstCodiVend->RenderWithName(); ?>
                    <?php $this->chkPesoVolu->RenderWithName(); ?>
                    <?php $this->calEntrInic->RenderWithName(); ?>
                    <?php $this->calEntrFina->RenderWithName(); ?>
                </div>
                <div class="col-xs-12 col-md-4">
                    <?php $this->rdbTienPodx->RenderWithName(); ?>
                    <?php $this->lstTariIdxx->RenderWithName(); ?>
                    <?php //$this->calFechTrx1->RenderWithName(); ?>
                    <?php //$this->calFechTrx2->RenderWithName(); ?>
                    <?php $this->txtUsuaPodx->RenderWithName(); ?>
                    <?php $this->lstCodiCkpt->RenderWithName(); ?>
                    <?php $this->txtSepaColu->RenderWithName(); ?>
                    <?php $this->chkConxDesc->RenderWithName(); ?>
                    <?php $this->chkMostQuer->RenderWithName(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>

