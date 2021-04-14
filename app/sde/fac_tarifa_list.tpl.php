<?php
	// This is the HTML template include file (.tpl.php) for the fac_tarifa_list.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Tarifas';
	require(__APP_INCLUDES__ . '/header.inc.php');
	//require(__APP_INCLUDES__ . '/botonera_list.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-1 col-md-1 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="col-xs-11 col-md-11" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnNuevRegi->Render() ?>
            <?php $this->btnFiltAvan->Render() ?>
            <?php $this->btnExpoExce->Render() ?>
            <?php $this->btnMasxAcci->Render() ?>
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
                    <?php $this->dtgFacTarifas->Render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>