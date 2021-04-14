<?php
	// This is the HTML template include file (.tpl.php) for the pagos_corp_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'PagosCorp' . ' - ' . $this->mctPagosCorp->TitleVerb;
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
        <div class="row" style="margin-top: 1em">
            <div class="col-md-4">
                <?php //$this->lblId->RenderWithName(); ?>
                <?php //$this->lstClienteCorp->RenderWithName(); ?>
                <?php $this->lstFormaPago->RenderWithName(); ?>
                <?php $this->txtReferencia->RenderWithName(); ?>
                <?php $this->calFecha->RenderWithName(); ?>
                <?php $this->txtMonto->RenderWithName(); ?>
                <?php //$this->txtEstatus->RenderWithName(); ?>
                <?php $this->txtObservacion->RenderWithName(); ?>
            </div>
            <div class="col-md-6">
                <div class="titulo">Facturas pendientes de Pago (click para incluir en el pago)</div>
                <?php $this->dtgFactClie->Render(); ?>
                <br>
                <div class="titulo">Facturas seleccionadas para Pagar (click para excluir del pago)</div>
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
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>