<?php
$strPageTitle = QApplication::Translate('Sacar a Ruta');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnManiCarg->Render() ?>
            <?php $this->btnHojaEntr->Render() ?>
            <?php $this->btnRepoErro->Render() ?>
            <?php //$this->btnImprReto->Render() ?>
        </div>
        <div class="hidden-sm col-md-3 col-lg-4"></div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 1em;">
                <div class="col-md-4">
                    <div class="title">Tipo de Operación</div>
                    <?php $this->lstTipoOper->Render(); ?>
                    <div class="title">Operaciones</div>
                    <?php $this->lstOperAbie->Render(); ?>
                    <div style="margin-top: 1em"></div>
                    <?php $this->txtNombChof->Render(); ?>
                    <?php $this->txtCeduChof->Render(); ?>
                    <?php $this->txtDescVehi->Render(); ?>
                    <?php $this->txtPlacVehi->Render(); ?>
                    <?php $this->txtNumeCont->Render(); ?>
                    <?php $this->txtListNume->Render(); ?>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <?php $this->txtNuevChof->Render(); ?>
                        </div>
                        <div class="col-md-4">
                            <?php $this->txtNuevCedu->Render(); ?>
                        </div>
                        <div class="col-md-2">
                            <?php $this->btnRegiChof->Render(); ?>
                        </div>
                    </div>
                    <div class="list_title">Choferes de la Sucursal</div>
                    <?php $this->dtgChofSucu->Render(); ?>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4">
                            <?php $this->lstNuevTipo->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <?php $this->txtNuevPlac->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <?php $this->txtNuevDesc->Render(); ?>
                        </div>
                        <div class="col-md-1">
                            <?php $this->btnRegiVehi->Render(); ?>
                        </div>
                    </div>
                    <div class="list_title">Vehículos de la Sucursal</div>
                    <?php $this->dtgVehiSucu->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 1em;">
                    <?php $this->dlgMensUsua->Render() ?>
                </div>
            </div>
        </div>
    </div>
    <style>
        .title {
            font-weight: bold;
        }
        .list_title {
            font-weight: bold;
            margin-bottom: .3em;
            margin-top: .3em;
        }
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