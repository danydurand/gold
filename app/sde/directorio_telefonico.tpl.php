<?php
	// This is the HTML template include file (.tpl.php) for the estacion_list.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Directorio Telefonico';
	require(__APP_INCLUDES__ . '/header.inc.php');
//	require(__APP_INCLUDES__ . '/botonera_list.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <?php //$this->dtrSucuActi->Paginator->Render(); ?>
        <div style="margin-top: 0.5em"></div>
        <?php $this->dtrSucuActi->Render(); ?>
        <div style="margin-top: 0.5em"></div>
        <?php //$this->dtrSucuActi->PaginatorAlternate->Render(); ?>
    </div>
</div>
<style>
    .title {
        color: #A52422;
        text-align: center;
        vertical-align: top;
    }
</style>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>