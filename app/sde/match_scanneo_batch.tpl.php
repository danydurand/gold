<?php
$strPageTitle = 'Match Scanneo';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-2 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
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
        <div class="container-fluid" data-aos="fade-in">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.4em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 0.7em;">
                <div class="col-md-5">
                    <?php $this->txtNumePiez->RenderWithName(); ?>
                </div>
                <div class="col-md-6">
                    <div class="titulo" style="margin-bottom: .1em">Manifiestos Pendientes</div>
                    <?php $this->dtgManiPend->Render(); ?>
                    <!--<br>-->
                    <!--<div class="titulo" style="margin-bottom: .1em">Piezas x Recibir del Manifiesto</div>-->
                    <?php //$this->dtgPiezPend->Render(); ?>
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