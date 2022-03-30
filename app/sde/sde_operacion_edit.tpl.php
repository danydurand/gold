<?php
// This is the HTML template include file (.tpl.php) for the sde_operacion_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = $this->mctSdeOperacion->TitleVerb.' Operación';
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
                <div class="col-xs-12 col-md-5" style="margin-top: 1em;">
                    <?php $this->lblCodiOper->RenderWithName(); ?>
                    <?php $this->lstCodiTipoObject->RenderWithName(); ?>
                    <?php $this->lstRuta->RenderWithName(); ?>
                    <?php $this->lstCodiChofObject->RenderWithName(); ?>
                    <?php $this->lstCodiVehiObject->RenderWithName(); ?>
                    <?php $this->lstSucursal->RenderWithName(); ?>
                    <?php $this->lstExpresoNacionalObject->RenderWithName(); ?>
                </div>
                <div class="col-xs-12 col-md-5" style="margin-top: 1em;">
                    <?php $this->dtgSucuAsoc->Render(); ?>
                    <?php //$this->dtgSucursalesesAsOperacionDestino->Render(true); ?>
                </div>
            </div>
        </div>
    </div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>