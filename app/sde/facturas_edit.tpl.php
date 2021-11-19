<?php
	// This is the HTML template include file (.tpl.php) for the facturas_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Facturas' . ' - ' . $this->mctFacturas->TitleVerb;
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
        <?php $this->btnLogxCamb->Render(); ?>
        <?php $this->btnImprFact->Render(); ?>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-4">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->lstClienteCorp->RenderWithName(); ?>
                <?php $this->txtCedulaRif->RenderWithName(); ?>
                <?php $this->txtRazonSocial->RenderWithName(); ?>
                <?php $this->txtDireccionFiscal->RenderWithName(); ?>
            </div>
            <div class="col-md-4">
                <?php $this->txtTelefono->RenderWithName(); ?>
                <?php $this->lstSucursal->RenderWithName(); ?>
                <?php $this->txtEstatus->RenderWithName(); ?>
                <?php $this->txtReferencia->RenderWithName(); ?>
                <?php $this->calFecha->RenderWithName(); ?>
	        </div>
            <div class="col-md-4">
                <?php $this->txtTotal->RenderWithName(); ?>
                <?php //$this->txtEstatusPago->RenderWithName(); ?>
                <?php $this->lstEstaPago->RenderWithName(); ?>
				<?php //$this->txtMontoDscto->RenderWithName(); ?>
				<?php $this->txtMontoCobrado->RenderWithName(); ?>
				<?php $this->txtMontoPendiente->RenderWithName(); ?>
				<?php //$this->txtNumero->RenderWithName(); ?>
				<?php //$this->txtMaquinaFiscal->RenderWithName(); ?>
				<?php //$this->txtFechaImpresion->RenderWithName(); ?>
				<?php //$this->txtHoraImpresion->RenderWithName(); ?>
				<?php //$this->chkTieneRetencion->RenderWithName(); ?>
				<?php //$this->txtNotaCreditoId->RenderWithName(); ?>
	        </div>
        </div>
        <?php if ($this->mctFacturas->Facturas->CountNotaEntregasAsFactura() > 0) { ?>
            <div class="row" style="margin-top: 1em">
                <div class="col-md-6">
                    <div class="titulo">Manifiestos (click p/info detallada)</div>
                </div>
                <div class="col-md-6">
                    <div class="titulo">Pagos (click p/info detallada)</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php $this->dtgNotaFact->Render(); ?>
                </div>
                <div class="col-md-6">
                    <?php $this->dtgPagoFact->Render(); ?>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->mctFacturas->Facturas->CountNotaCreditoCorpsAsFactura() > 0) { ?>
            <div class="row" style="margin-top: 1em">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="titulo">Notas de Crédito (click p/info detallada)</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <?php $this->dtgNotaCred->Render(); ?>
                </div>
            </div>
        <?php } ?>
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

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>