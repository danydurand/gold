<?php
$strPageTitle = QApplication::Translate('Auditoría de Carga Recibida');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-2 col-md-2 col-lg-2 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: right; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnErroProc->Render() ?>
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
                <div class="col-md-6" style="margin-top: 0.7em;">
                    <?php $this->lstTipoOper->RenderWithName(); ?>
                    <?php $this->lstOperSist->RenderWithName(); ?>
                    <?php $this->lstNumeCont->RenderWithName(); ?>
                    <?php $this->txtListNume->RenderWithName(); ?>
                </div>
                <div class="col-md-6">
                    <?php $this->dtgPiezMani->Render(); ?>
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
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>