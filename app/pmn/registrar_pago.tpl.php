<?php
//----------------------------------------------------------
// Programa       : registrar_pago.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 25/07/16 05:19 PM
// Proyecto       : newliberty
// Descripcion    : 
//----------------------------------------------------------
$strPageTitle = 'Registrar Pago';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <!------------->
        <!-- Botones -->
        <!------------->
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="margin-top: 0.5em; ">
                    <div class="row" style="padding: 0.1em">
                        <div class="titulo">Pre-Factura</div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4" style="margin-top: 0.5em; ">
                    <div class="row">
                        <?php $this->lblNumeFact->RenderWithName(); ?>
                        <?php $this->lblCeduRifx->RenderWithName(); ?>
                        <?php $this->lblRazoSoci->RenderWithName(); ?>
                        <?php $this->lblDireFisc->RenderWithName(); ?>
                        <?php $this->lblNumeTele->RenderWithName(); ?>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5" style="margin-top: 0.5em; ">
                    <div class="row">
                        <?php $this->lblFechFact->RenderWithName(); ?>
                        <?php $this->lblCreaPorx->RenderWithName(); ?>
                        <?php $this->lblMontAcob->RenderWithName(); ?>
                        <?php $this->lblMontCobr->RenderWithName(); ?>
                        <?php $this->lblMontRest->RenderWithName(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="row" style="margin-top: 1em">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="table-responsive">
                        <?php $this->dtgPagoFact->Render(); ?>
                    </div>
                </div>
                <div class="col-md-1" style="text-align: left; padding: 0">
                    <?php $this->btnNew->Render(); ?>
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
        .form-controls {
            line-height: 0.9;
        }
        .renderWithName {
            padding: 0px 0;
        }
        .form-name {
            width: 28%;
        }
        .form-field {
            width: 72%;
            font-size: 88%;
        }
        #container {
            text-align: center;
        }
    </style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>