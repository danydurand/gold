<?php
	// This is the HTML template include file (.tpl.php) for the sde_contenedor_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'SdeContenedor' . ' - ' . $this->mctSdeContenedor->TitleVerb;
	require(__APP_INCLUDES__ . '/header.inc.php');
	require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 1em;">
            <?php $this->txtNumeCont->RenderWithName(); ?>
				<?php $this->lstCodiOperObject->RenderWithName(); ?>
				<?php $this->calFecha->RenderWithName(); ?>
				<?php $this->txtStatCont->RenderWithName(); ?>
				<?php $this->txtNombreChofer->RenderWithName(); ?>
				<?php $this->txtCedulaChofer->RenderWithName(); ?>
				<?php $this->txtPlacaVehiculo->RenderWithName(); ?>
				<?php $this->txtDescipcionVehiculo->RenderWithName(); ?>
				<?php $this->lstProducto->RenderWithName(); ?>
				<?php $this->txtMontoFlete->RenderWithName(); ?>
				<?php $this->txtMaster->RenderWithName(); ?>
				<?php $this->txtNumeroValijas->RenderWithName(); ?>
				<?php $this->txtValijas->RenderWithName(); ?>
				<?php $this->txtPaisId->RenderWithName(); ?>
				<?php $this->txtHora->RenderWithName(); ?>
	<?php $this->dtgParentSdeContenedorsAsSdeContCont->RenderWithName(true); ?>
	<?php $this->dtgSdeContenedorsAsSdeContCont->RenderWithName(true); ?>
	<?php $this->dtgGuiaPiezasesAsGuia->RenderWithName(true); ?>
	        </div>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>