<?php
// This is the HTML template include file (.tpl.php) for the pagos_corp_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'PagosCorp' . ' - ' . $this->mctPagosCorp->TitleVerb;
require(__APP_INCLUDES__ . '/header.inc.php');
//require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <!----------------------------->
    <!-- Tamaños Mediano y Largo -->
    <!-------------------------- -->
    <div class="hidden-xs hidden-sm col-md-7 col-lg-5" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnVolvList->Render(); ?>
        <?php $this->btnNuevRegi->Render(); ?>
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnDelete->Render(); ?>
        <?php $this->btnExclFact->Render(); ?>
        <?php $this->btnLogxCamb->Render(); ?>
        <?php if (isset($this->btnExpoExce)) { ?>
            <?php $this->btnExpoExce->Render(); ?>
        <?php } ?>
    </div>
    <div class="hidden-xs hidden-sm hidden-md col-lg-4 pull-right" style="text-align: right; padding-right: 3px; margin-top: -0.25em">
        <?php $this->btnPrimRegi->Render(); ?>
        <?php $this->btnRegiAnte->Render(); ?>
        <?php $this->btnProxRegi->Render(); ?>
        <?php $this->btnUltiRegi->Render(); ?>
    </div>
    <!-------------------------------------->
    <!-- Tamaños Pequeños y Extra-Pequeño -->
    <!-------------------------------------->
    <div class="col-xs-5 hidden-md hidden-lg" style="text-align: left; margin-top: -0.25em;">
        <?php $this->btnVolvSmal->Render(); ?>
        <?php $this->btnNuevSmal->Render(); ?>
        <?php $this->btnGuarSmal->Render(); ?>
        <?php $this->btnBorrSmal->Render(); ?>
        <?php $this->btnHistSmal->Render(); ?>
    </div>
    <div class="col-xs-3 col-md-4 hidden-lg pull-right" style="text-align: right; padding-right: 3px; margin-top: -1.99em">
        <?php $this->btnPrimSmal->Render(); ?>
        <?php $this->btnAnteSmal->Render(); ?>
        <?php $this->btnProxSmal->Render(); ?>
        <?php $this->btnUltiSmal->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid" data-aos="fade-in">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cliente Corp</label><br>
                            <?php $this->lstClienteCorp->Render(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Forma de Pago</label><br>
                            <?php $this->lstFormaPago->Render(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fecha del Pago</label><br>
                            <?php $this->calFecha->Render(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Monto del Pago</label><br>
                            <?php $this->txtMonto->Render(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nota de Credito</label><br>
                            <?php $this->lstNotaCred->Render(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Referencia</label><br>
                            <?php $this->txtReferencia->Render(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Observacion</label><br>
                            <?php $this->txtObservacion->Render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="titulo">Facturas Pendientes de Pago <br>
                    (click para incluir en el pago)
                </div>
                <?php $this->dtgFactClie->Render(); ?>
                <br>
                <div class="titulo">Facturas Seleccionadas para Pagar <br>
                    (click en el checkbox p/excluir del pago) <br>
                    (doble-click para editar el monto abonado) <br>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php $this->txtNumeRefe->RenderWithName(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $this->txtMontAbon->RenderWithName(); ?>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <?php $this->btnSaveAbon->Render(); ?>
                        <?php $this->btnCancAbon->Render(); ?>
                    </div>
                </div>
                <?php $this->dtgFactPaga->Render(); ?>
                <br>
            </div>
        </div>
    </div>
</div>
<style>
    .titulo {
        background-color: #CCCCCC;
        border-radius: 3px;
        font-weight: bold;
        padding: 0.2em;
        text-align: center;
        margin-bottom: .1em;
    }
</style>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>