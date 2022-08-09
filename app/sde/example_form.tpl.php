<?php
$strPageTitle = QApplication::Translate('Entregas Realizadas');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-4 col-lg-4 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-5 col-lg-3" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php //$this->btnSave->Render(); 
        ?>
        <?php //$this->btnExpoPdfx->Render() 
        ?>
    </div>
    <div class="hidden-sm col-md-3 col-lg-5"></div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-2"></div>
            <div class="col-md-2 titulo">
                Chofer
            </div>
            <div class="col-md-2 titulo">
                Fecha Inicial
            </div>
            <div class="col-md-2 titulo">
                Fecha Final
            </div>
            <div class="col-md-2 titulo">
                Acción
            </div>
        </div>
        <div class="row" style="margin-top: .5em;">
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <?php $this->lstSeleChof->Render(); ?>
            </div>
            <div class="col-md-2" style="text-align: center">
                <?php $this->calFechInic->Render(); ?>
            </div>
            <div class="col-md-2" style="text-align: center">
                <?php $this->calFechFina->Render(); ?>
            </div>
            <div class="col-md-2" style="text-align: center;">
                <?php $this->btnSave->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: .5em;">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php $this->dtgDataEntr->Render(); ?>
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
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>