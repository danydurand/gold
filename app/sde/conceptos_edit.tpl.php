<?php
	// This is the HTML template include file (.tpl.php) for the conceptos_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Conceptos' . ' - ' . $this->mctConceptos->TitleVerb;
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
        <div class="row" style="margin-top: .5em">
            <div class="col-md-5">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->txtNombre->RenderWithName(); ?>
                <?php $this->txtOrden->RenderWithName(); ?>
                <?php $this->txtProductos->RenderWithName(); ?>
                <?php $this->txtMostrarComo->RenderWithName(); ?>
                <?php $this->chkActivo->RenderWithName(); ?>
                <?php $this->calFechaInicial->RenderWithName(); ?>
                <?php $this->calFechaFinal->RenderWithName(); ?>
            </div>
            <div class="col-md-4">
				<?php $this->lstOperacion->RenderWithName(); ?>
				<?php $this->lstAplicaComo->RenderWithName(); ?>
				<?php $this->lstTipo->RenderWithName(); ?>
				<?php $this->txtActuaSobre->RenderWithName(); ?>
				<?php $this->lstActuaSobre->RenderWithName(); ?>
				<?php $this->txtValor->RenderWithName(); ?>
				<?php //$this->txtDbquery->RenderWithName(); ?>
				<?php $this->txtBaseImponible->RenderWithName(); ?>
				<?php $this->txtMetodo->RenderWithName(); ?>
				<?php //$this->lblCreatedAt->RenderWithName(); ?>
				<?php //$this->lblUpdatedAt->RenderWithName(); ?>
				<?php //$this->lblDeletedAt->RenderWithName(); ?>
				<?php //$this->txtCreatedBy->RenderWithName(); ?>
				<?php //$this->txtUpdatedBy->RenderWithName(); ?>
				<?php //$this->txtDeletedBy->RenderWithName(); ?>
	        </div>
            <div class="col-md-5">

                <?php if ($this->dtgRangConc->Visible) { ?>
                    <div style="margin-bottom: .3em; cursor: pointer">
                        <div class="titulo"><?php $this->lblTituRang->Render() ?></div>
                    </div>
                    <?php if ($this->blnAgreRang == 1) { ?>
                        <div style="margin-bottom: .3em">
                            <?php include('agregar_rango.tpl.php'); ?>
                        </div>
                    <?php } ?>
                    <?php $this->dtgRangConc->Render(); ?>
                <?php } ?>

                <?php if ($this->dtgConcInvo->Visible) { ?>
                    <div style="margin-bottom: .3em">
                        <div class="titulo">Conceptos Involucrados</div>
                    </div>
                    <?php $this->dtgConcInvo->Render(); ?>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-- Estilos de la Página -->
<style>
    .titulo {
        background-color: #CCCCCC;
        border-radius: 3px;
        font-weight: bold;
        padding: 0.2em;
        text-align: center;
    }
</style>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>