<?php
$strPageTitle = QApplication::Translate('Estatus Manif. Exp');
require('inc/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>&nbsp;&nbsp;<?php $this->objDefaultWaitIcon->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnErroProc->Render(); ?>
        </div>
    <div class="hidden-sm col-md-3 col-lg-4"></div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.4em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10" style="margin-top: 1em;">
                    <?php $this->txtNumeCont->renderWithName(); ?>
                    <?php $this->txtDestMani->renderWithName(); ?>
                    <?php $this->txtNumeBlxx->renderWithName(); ?>
                    <?php $this->txtNumeBook->renderWithName(); ?>
                    <?php $this->lstCkptMani->renderWithName(); ?>
                    <?php $this->txtComeCkpt->renderWithName(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 1em;">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Historial de Checkpoints del Manifiesto</div>
                    <?php $this->dtgCkptMani->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Estilos de la Página -->
    <style>
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            font-weight: bold;
            padding: 0.4em;
            text-align: center;
        }
        .renderWithName {
            padding: 0px 0;
            width: 100%;
        }
    </style>
<?php require('inc/footer.inc.php'); ?>