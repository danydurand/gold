<?php
	// This is the HTML template include file (.tpl.php) for the cambio_tarifa_list.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'CambioTarifas';
	require(__APP_INCLUDES__ . '/header.inc.php');
	//require(__APP_INCLUDES__ . '/botonera_list.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-sm-3 col-md-3 col-lg-4 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnVolvList->Render() ?>
            <?php $this->btnNuevRegi->Render() ?>
            <?php $this->btnFiltAvan->Render() ?>
            <?php $this->btnExpoExce->Render() ?>
        </div>
    </div>

    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <?php $this->dtgCambioTarifas->Render(); ?>
                </div>
            </div>
        </div>
    </div>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>