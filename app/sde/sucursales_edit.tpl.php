<?php
	// This is the HTML template include file (.tpl.php) for the sucursales_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Sucursales' . ' - ' . $this->mctSucursales->TitleVerb;
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
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->txtNombre->RenderWithName(); ?>
                <?php $this->txtIata->RenderWithName(); ?>
                <?php $this->txtTelefono->RenderWithName(); ?>
                <?php $this->lstEstado->RenderWithName(); ?>
                <?php $this->txtZona->RenderWithName(); ?>
                <?php $this->chkEsExport->RenderWithName(); ?>
                <?php $this->chkEsExenta->RenderWithName(); ?>
                <?php $this->chkEsPrincipal->RenderWithName(); ?>
            </div>
            <div class="col-md-5">
				<?php $this->chkEsAreaMetropolitana->RenderWithName(); ?>
				<?php $this->chkEsAlmacen->RenderWithName(); ?>
				<?php $this->chkEsTienda->RenderWithName(); ?>
				<?php $this->txtEmailPrincipal->RenderWithName(); ?>
				<?php $this->txtEmailAlmacen->RenderWithName(); ?>
				<?php $this->txtZonaNc->RenderWithName(); ?>
				<?php $this->txtComisionVenta->RenderWithName(); ?>
				<?php $this->txtComisionEntrega->RenderWithName(); ?>
				<?php //$this->lblCreatedAt->RenderWithName(); ?>
				<?php //$this->lblUpdatedAt->RenderWithName(); ?>
				<?php //$this->lblDeletedAt->RenderWithName(); ?>
				<?php //$this->txtCreatedBy->RenderWithName(); ?>
				<?php //$this->txtUpdatedBy->RenderWithName(); ?>
				<?php //$this->txtDeletedBy->RenderWithName(); ?>
            	<?php //$this->dtgSdeOperacionsAsOperacionDestino->RenderWithName(true); ?>
	        </div>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>