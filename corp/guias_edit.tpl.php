<?php
// This is the HTML template include file (.tpl.php) for the guias_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Guias' . ' - ' . $this->mctGuias->TitleVerb;
require(__YAMAGUCHI__APP_INCLUDES__ . '/header.inc.php');
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
            <div class="col-md-4" style="margin-top: 1em;">
                <?php $this->lblId->RenderWithName(); ?>
                <?php //$this->txtNumero->RenderWithName(); ?>
                <?php $this->txtTracking->RenderWithName(); ?>
                <?php $this->calFecha->RenderWithName(); ?>
                <?php //$this->lstOrigen->RenderWithName(); ?>
                <?php $this->txtServicioEntrega->RenderWithName(); ?>
                <?php $this->txtServicioImportacion->RenderWithName(); ?>
            </div>
            <div class="col-md-6" style="margin-top: 1em;">
                <?php $this->lstDestino->RenderWithName(); ?>
				<?php $this->txtNombreDestinatario->RenderWithName(); ?>
				<?php $this->txtDireccionDestinatario->RenderWithName(); ?>
				<?php $this->txtTelefonoDestinatario->RenderWithName(); ?>
                <?php $this->txtCedulaDestinatario->RenderWithName(); ?>
                <?php //$this->txtContenido->RenderWithName(); ?>
                <?php //$this->txtValorDeclarado->RenderWithName(); ?>
                <?php //$this->txtTipoExport->RenderWithName(); ?>
                <?php //$this->chkAsegurado->RenderWithName(); ?>
                <?php //$this->txtTotal->RenderWithName(); ?>
                <?php //$this->txtKilos->RenderWithName(); ?>
                <?php //$this->txtLibras->RenderWithName(); ?>
                <?php //$this->txtLargo->RenderWithName(); ?>
                <?php //$this->txtAncho->RenderWithName(); ?>
                <?php //$this->txtAlto->RenderWithName(); ?>
                <?php //$this->txtVolumen->RenderWithName(); ?>
                <?php //$this->txtPiesCub->RenderWithName(); ?>
                <?php //$this->txtMetrosCub->RenderWithName(); ?>
				<?php //$this->txtObservacion->RenderWithName(); ?>
	        </div>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>