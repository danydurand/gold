<?php
$strPageTitle = QApplication::Translate('Configurar Etiqueta');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6" style="margin-top: 1em;">
                    <div class="row" style="padding: 0.1em">
                        <div class="titulo">Margenes y Límites</div>
                    </div>
                    <div class="row" style="margin-top: .5em;">
                        <?php $this->txtAnchEtiq->RenderWithName(); ?>
                        <?php $this->txtAltoEtiq->RenderWithName(); ?>
                        <?php $this->txtMargIzqu->RenderWithName(); ?>
                        <?php $this->txtAnchPagi->RenderWithName(); ?>
                        <?php $this->txtMargSupe->RenderWithName(); ?>
                        <?php $this->txtSangDate->RenderWithName(); ?>
                        <?php $this->txtSangGuia->RenderWithName(); ?>
                        <?php $this->txtSangIdxx->RenderWithName(); ?>
                        <?php $this->txtSangCodx->RenderWithName(); ?>
                        <?php $this->txtSangCody->RenderWithName(); ?>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top: 1em;">
                    <div class="row" style="padding: 0.1em">
                        <div class="titulo">Tamaños de Letra y Caractéres</div>
                    </div>
                    <div class="row" style="margin-top: .5em;">
                        <?php $this->txtTamaGuia->RenderWithName(); ?>
                        <?php $this->txtCodiBarx->RenderWithName(); ?>
                        <?php $this->txtCodiBary->RenderWithName(); ?>
                        <?php $this->txtTamaRemi->RenderWithName(); ?>
                        <?php $this->txtTamaDest->RenderWithName(); ?>
                        <?php $this->txtTamaGui2->RenderWithName(); ?>
                        <?php $this->txtTamaIdxx->RenderWithName(); ?>
                        <?php $this->txtTamaFoot->RenderWithName(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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