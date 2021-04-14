<?php
//----------------------------------------------------------
// Programa       : crear_nota_credito.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 27/07/16 04:34 PM
// Proyecto       : newliberty
// Descripcion    : 
//----------------------------------------------------------
$strPageTitle = 'Crear Nota de Crédito';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <!-- ------- -->
    <!-- Botones -->
    <!-- ------- -->
    <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
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
                    <div class="titulo">Pre-Nota y Datos Fiscales</div>
                </div>
                <div class="row">
                    <?php $this->lblNumeNota->RenderWithName(); ?>
                    <?php $this->lblCeduRifx->RenderWithName(); ?>
                    <?php $this->lblRazoSoci->RenderWithName(); ?>
                    <?php $this->lblDireFisc->RenderWithName(); ?>
                    <?php $this->lblNumeTele->RenderWithName(); ?>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Nota de Crédito</div>
                </div>
                <div class="row">
                    <?php $this->lblFechNota->RenderWithName(); ?>
                    <?php $this->lblCreaPorx->RenderWithName(); ?>
                    <?php $this->lblDocuFisc->RenderWithName(); ?>
                    <?php $this->lblNotaImpr->RenderWithName(); ?>
                    <?php $this->txtConcNota->RenderWithName(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 0.5em; ">
                <div class="row" style="padding: 0.1em">
                    <div class="titulo">Items</div>
                </div>
                <div class="row">
                    <!--Información de Items de la Nota de Crédito-->
                    <div class="table-responsive">
                        <?php $this->dtgItemNdcx->Render(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="margin-top: 0.5em; ">
                <div class="row">
                    <div class="titulo">Montos</div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3" style="margin-top: 0.5em; ">
                <div class="row">
                    <?php $this->lblMontBase->RenderWithName(); ?>
                    <?php $this->lblMontDcto->RenderWithName(); ?>
                    <?php $this->lblMontFran->RenderWithName(); ?>
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 0.5em; ">
                <div class="row">
                    <div class="row">
                    <?php $this->lblMontSgro->RenderWithName(); ?>
                    <?php $this->lblMontMiva->RenderWithName(); ?>
                    <?php $this->lblMontTota->RenderWithName(); ?>
                </div>
                </div>
            </div>
            <div class="col-md-3"></div>
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
</style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>