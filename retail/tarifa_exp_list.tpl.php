<?php
	// This is the HTML template include file (.tpl.php) for the tarifa_exp_list.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Tarifa Exportacion';
    require('inc/header.inc.php');
	require(__APP_INCLUDES__ . '/botonera_list.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid" data-aos="fade-in">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: .5em;">
            <div class="table-responsive">
                <?php $this->dtgTarifaExps->Render(); ?>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>