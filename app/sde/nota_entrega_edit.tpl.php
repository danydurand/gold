<?php
	// This is the HTML template include file (.tpl.php) for the nota_entrega_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Manifiesto' . ' - ' . $this->mctNotaEntrega->TitleVerb;
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
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnNuevRegi->Render(); ?>
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnDelete->Render(); ?>
        <?php $this->btnCalcConc->Render(); ?>
        <?php $this->btnLogxCamb->Render(); ?>
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
        <div class="row" style="margin-top: .5em;">
            <div class="col-md-5">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->lstClienteCorp->RenderWithName(); ?>
                <?php $this->txtReferencia->RenderWithName(); ?>
                <?php $this->txtEstatus->RenderWithName(); ?>
                <?php $this->txtServicioImportacion->RenderWithName(); ?>
            </div>
            <div class="col-md-3" >
                <?php $this->txtCargadas->RenderWithName(); ?>
                <?php $this->txtProcesadas->RenderWithName(); ?>
                <?php $this->txtRecibidas->RenderWithName(); ?>
                <?php $this->txtKilos->RenderWithName(); ?>
                <?php $this->txtPiesCub->RenderWithName(); ?>
	        </div>
            <div class="col-md-3">
                <?php $this->txtTotal->RenderWithName(); ?>
                <?php $this->txtPiezas->RenderWithName(); ?>
                <?php $this->calFecha->RenderWithName(); ?>
                <?php $this->txtHora->RenderWithName(); ?>
                <?php $this->lstUsuario->RenderWithName(); ?>
	        </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <span style="margin-left: .3em"><b>Observacion:</b></span><br>
                <?php $this->lblObseNota->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em">
            <?php if ($this->mctNotaEntrega->NotaEntrega->CountGuiases() > 0) { ?>
            <div class="col-md-6">
                <?php $this->dtgGuiaNota->Render(); ?>
            </div>
            <?php } ?>
            <?php if ($this->mctNotaEntrega->NotaEntrega->CountNotaConceptoses() > 0) { ?>
            <div class="col-md-6">
                <?php $this->dtgNotaConc->Render(); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>