<?php
	// This is the HTML template include file (.tpl.php) for the guia_list.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Guias';
	require(__APP_INCLUDES__ . '/header.inc.php');
	require(__APP_INCLUDES__ . '/botonera_list.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.7em; margin-left: -1em; margin-bottom: 0.3em">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <?php $this->txtNumeGuia->RenderWithName(); ?>
                <?php $this->txtCeduRemi->RenderWithName(); ?>
                <?php $this->txtNombRemi->RenderWithName(); ?>
                <?php $this->txtCeduDest->RenderWithName(); ?>
                <?php $this->txtNombDest->RenderWithName(); ?>
                <?php $this->calFechInic->RenderWithName(); ?>
                <?php $this->calFechFina->RenderWithName(); ?>
                <?php $this->txtNumePrec->RenderWithName(); ?>
            </div>
            <div class="col-md-5">
                <?php $this->lstTipoPago->RenderWithName(); ?>
                <?php $this->lstCodiOrig->RenderWithName(); ?>
                <?php $this->lstReceOrig->RenderWithName(); ?>
                <?php $this->lstCodiDest->RenderWithName(); ?>
                <?php $this->lstReceDest->RenderWithName(); ?>
                <?php $this->lstTienPodx->RenderWithName(); ?>
                <?php $this->lstCodiCkpt->RenderWithName(); ?>
                <?php $this->chkGuiaAnul->RenderWithName(); ?>
                <br>
                <div style="text-align: center">
                    <?php $this->btnBuscRegi->Render(); ?>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <?php $this->dtgGuias->Render(); ?>
            </div>
        </div>
    </div>
</div>
<style>
    .titulo {
        background-color: #CCCCCC;
        border-radius: 3px;
        font-weight: bold;
        padding: 0.4em;
        text-align: center;
    }
    .form-controls {
        line-height: 0.9;
    }
    .renderWithName {
        padding: 3px 0;
    }
    .form-name {
        width: 28%;
        font-size: 90%;
    }
    .form-field {
        width: 72%;
        font-size: 88%;
    }
</style>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>