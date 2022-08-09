<?php
	// This is the HTML template include file (.tpl.php) for the manifiesto_exp_list.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Manif. Exp AER';
	require('inc/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-sm-3 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnNuevRegi->Render() ?>
        <?php $this->btnFiltAvan->Render() ?>
        <?php $this->btnExpoExce->Render() ?>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3"></div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: .5em;">
            <div class="table-responsive">
                <?php $this->dtgManifiestoExps->Render(); ?>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>