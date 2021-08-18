<?php
	// This is the HTML template include file (.tpl.php) for the tarifa_agentes_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Tarifa Agentes' . ' - ' . $this->mctTarifaAgentes->TitleVerb;
	require(__APP_INCLUDES__ . '/header.inc.php');
	require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid" data-aos="zoom-out" data-aos-duration="2000">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-5">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->txtNombre->RenderWithName(); ?>
                <?php $this->calFecha->RenderWithName(); ?>
                <?php $this->txtCreatedBy->RenderWithName(); ?>
                <?php $this->txtUpdatedBy->RenderWithName(); ?>

            </div>
            <div class="col-md-6">
                <?php if ($this->mctTarifaAgentes->EditMode) { ?>
                    <div style="margin-bottom: .3em; cursor: pointer">
                        <div class="titulo"><?php $this->lblTituTari->Render() ?></div>
                    </div>
                    <?php if ($this->blnAgreTari == 1) { ?>
                        <div style="margin-bottom: .3em">
                            <?php include('agregar_tarifa_zona.tpl.php'); ?>
                        </div>
                    <?php } ?>
                    <?php $this->dtgTariZona->Render(); ?>
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

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>