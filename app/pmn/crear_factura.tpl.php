<?php
//----------------------------------------------------------
// Programa       : crear_factura.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 22/07/16 12:15 PM
// Proyecto       : newliberty
// Descripcion    : 
//----------------------------------------------------------
$strPageTitle = 'Crear Factura';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <!-- ------- -->
    <!-- Botones -->
    <!-- ------- -->
    <div class="hidden-xs hidden-sm col-md-6 col-lg-6" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnAnulFact->Render(); ?>
        <?php $this->btnCobrFact->Render(); ?>
        <?php $this->btnImprFact->Render(); ?>
        <?php $this->btnMostDxml->Render(); ?>
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
            <div class="col-md-6" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Pre-Factura y Datos Fiscales</div>
                </div>
                <div class="row">
                    <?php $this->lblNumeFact->RenderWithName(); ?>
                    <?php $this->txtCeduRifx->RenderWithName(); ?>
                    <?php $this->txtRazoSoci->RenderWithName(); ?>
                    <?php $this->txtDireFisc->RenderWithName(); ?>
                    <?php $this->txtNumeTele->RenderWithName(); ?>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Factura</div>
                </div>
                <div class="row">
                    <?php $this->chkTienRete->RenderWithName(); ?>
                    <?php $this->lblFechFact->RenderWithName(); ?>
                    <?php $this->lblCreaPorx->RenderWithName(); ?>
                    <?php $this->lblDocuFisc->RenderWithName(); ?>
                    <?php $this->lblFactImpr->RenderWithName(); ?>
                    <?php $this->lblMotiAnul->RenderWithName(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Items</div>
                </div>
                <div class="row">
                    <!--Información de Items de la Factura-->
                    <div class="table-responsive">
                        <?php $this->dtgItemFact->Render() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Retencion ISLR</div>
                </div>
                <div class="row">
                    <?php $this->txtCoreIslr->RenderWithName(); ?>
                    <?php $this->calCoreIslr->RenderWithName(); ?>
                    <?php $this->txtPorcIslr->RenderWithName(); ?>
                </div>
            </div>
            <div class="col-md-2" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Servicios</div>
                </div>
                <div class="row">
                    <?php $this->lblMontBase->RenderWithName(); ?>
                    <?php $this->lblMontDcto->RenderWithName(); ?>
                    <?php $this->lblMontFran->RenderWithName(); ?>
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Retencion IVA</div>
                </div>
                <div class="row">
                    <?php $this->txtCompRete->RenderWithName(); ?>
                    <?php $this->calCompRete->RenderWithName(); ?>
                    <?php $this->txtPorcRete->RenderWithName(); ?>
                </div>
            </div>
            <div class="col-md-2" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Otros Montos</div>
                </div>
                <div class="row">
                    <?php $this->lblMontSgro->RenderWithName(); ?>
                    <?php $this->lblMontMiva->RenderWithName(); ?>
                    <?php $this->lblMontTota->RenderWithName(); ?>
                </div>
            </div>
            <div class="col-md-2" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Cobro</div>
                </div>
                <div class="row">
                    <?php $this->lblMontAcob->RenderWithName(); ?>
                    <?php $this->lblMontCobr->RenderWithName(); ?>
                    <?php $this->lblMontRest->RenderWithName(); ?>
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
    .form-controls {
        line-height: 0.9;
    }
    .renderWithName {
        padding: 0px 0;
    }
    .form-name {
        width: 28%;
        font-size: 90%;
    }
    .form-field {
        width: 72%;
        font-size: 88%;
    }
    input[type=text] {
        padding: 1.2px;
    }
</style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
