<?php
// This is the HTML template include file (.tpl.php) for the nota_entrega_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'NotaEntrega' . ' - ' . $this->mctNotaEntrega->TitleVerb;
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
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <?php $this->lblId->RenderWithName(); ?>
                <?php //$this->lstClienteCorp->RenderWithName(); ?>
                <?php $this->txtReferencia->RenderWithName(); ?>
                <?php $this->lstServImpo->RenderWithName(); ?>
                <?php $this->txtEstatus->RenderWithName(); ?>
                <?php //$this->txtServicioImportacion->RenderWithName(); ?>
                <?php $this->txtCargadas->RenderWithName(); ?>
                <?php $this->txtPorProcesar->RenderWithName(); ?>
                <?php $this->txtPorCorregir->RenderWithName(); ?>
                <?php $this->txtProcesadas->RenderWithName(); ?>
            </div>
            <div class="col-md-4">
                <?php $this->txtLibras->RenderWithName(); ?>
                <?php $this->txtPiesCub->RenderWithName(); ?>
                <?php $this->txtVolumen->RenderWithName(); ?>
				<?php $this->txtPiezas->RenderWithName(); ?>
				<?php $this->calFecha->RenderWithName(); ?>
				<?php $this->txtHora->RenderWithName(); ?>
				<?php $this->lstUsuario->RenderWithName(); ?>
				<?php $this->txtValorDeclarado->RenderWithName(); ?>
				<?php //$this->lblCreatedAt->RenderWithName(); ?>
				<?php //$this->lblUpdatedAt->RenderWithName(); ?>
				<?php //$this->lblDeletedAt->RenderWithName(); ?>
				<?php //$this->txtCreatedBy->RenderWithName(); ?>
				<?php //$this->txtUpdatedBy->RenderWithName(); ?>
				<?php //$this->txtDeletedBy->RenderWithName(); ?>
	        </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <?php $this->txtObservacion->RenderWithName(); ?>
            </div>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>