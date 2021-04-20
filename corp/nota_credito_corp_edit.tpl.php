<?php
	// This is the HTML template include file (.tpl.php) for the nota_credito_corp_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Nota de Credito' . ' - ' . $this->mctNotaCreditoCorp->TitleVerb;
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
            <div class="col-md-5">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->txtReferencia->RenderWithName(); ?>
                <?php $this->txtTipo->RenderWithName(); ?>
                <?php //$this->lstClienteCorp->RenderWithName(); ?>
                <?php $this->lstPagoCorp->RenderWithName(); ?>
            </div>
            <div class="col-md-4">
                <?php $this->lstFactura->RenderWithName(); ?>
				<?php $this->calFecha->RenderWithName(); ?>
				<?php $this->txtMonto->RenderWithName(); ?>
				<?php $this->txtObservacion->RenderWithName(); ?>
				<?php //$this->txtNumero->RenderWithName(); ?>
				<?php //$this->txtMaquinaFiscal->RenderWithName(); ?>
				<?php //$this->txtFechaImpresion->RenderWithName(); ?>
				<?php //$this->txtHoraImpresion->RenderWithName(); ?>
				<?php //$this->lblCreatedAt->RenderWithName(); ?>
				<?php //$this->lblUpdatedAt->RenderWithName(); ?>
				<?php //$this->txtCreatedBy->RenderWithName(); ?>
				<?php //$this->txtUpdatedBy->RenderWithName(); ?>
	        </div>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>