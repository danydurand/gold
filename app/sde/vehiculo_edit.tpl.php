<?php
// This is the HTML template include file (.tpl.php) for the vehiculo_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = $this->mctVehiculo->TitleVerb . ' Vehículo';
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
            <div class="row" style="margin-top: 1em;">
                <div class="col-md-5">
                    <?php $this->lblCodiVehi->RenderWithName(); ?>
                    <?php $this->txtDescVehi->RenderWithName(); ?>
                    <?php $this->txtNumePlac->RenderWithName(); ?>
                    <?php $this->lstSucursal->RenderWithName(); ?>
                </div>
                <div class="col-md-5">
                    <?php $this->lstTipoVehiObject->RenderWithName(); ?>
                    <?php $this->lstCodiDispObject->RenderWithName(); ?>
                    <?php $this->lstCodiStatObject->RenderWithName(); ?>
                    <?php $this->txtTextObse->RenderWithName(); ?>
                </div>
            </div>
        </div>
    </div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>