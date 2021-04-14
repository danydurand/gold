<?php
	// This is the HTML template include file (.tpl.php) for the new_opcion_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Cajas';
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
        <div class="row">
            <div class="col-md-12">
                <?php $this->lblCajaIdxx->RenderWithName(); ?>
                <?php $this->txtCajaDesc->RenderWithName(); ?>
                <?php $this->lstCajaRece->RenderWithName(); ?>
                <?php //$this->txtContSeni->RenderWithName(); ?>
                <?php //$this->lstTipoCaja->RenderWithName(); ?>
                <?php $this->txtImprIdxx->RenderWithName(); ?>
                <?php $this->txtImprSeri->RenderWithName(); ?>
            </div>
        </div>
    </div>
</div>


<style>
    input[type="radio"], input[type="checkbox"] {
        margin: 4px 0 0;
        margin-top: 8px;
        line-height: normal;
    }
</style>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>