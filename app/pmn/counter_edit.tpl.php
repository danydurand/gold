<?php
	// This is the HTML template include file (.tpl.php) for the counter_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Receptoría' . ' - ' . $this->mctCounter->TitleVerb;
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
                <div class="col-md-12" style="margin-top: 1em;">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <?php $this->lblId->RenderWithName(); ?>
                        <?php $this->txtDescripcion->RenderWithName(); ?>
                        <?php $this->lstSucursal->RenderWithName(); ?>
                        <?php $this->lstRuta->RenderWithName(); ?>
                        <?php $this->txtSiglas->RenderWithName(); ?>
                        <?php $this->txtCkptRecepcion->RenderWithName(); ?>
                        <?php $this->txtCkptConfirmacion->RenderWithName(); ?>
                    </div>
                    <div class="col-md-5">
                        <?php $this->txtCkptAlmacen->RenderWithName(); ?>
                        <?php //$this->txtStatusId->RenderWithName(); ?>
                        <?php $this->chkStatRece->RenderWithName(); ?>
                        <?php $this->lstEsRutaObject->RenderWithName(); ?>
                        <?php $this->lstSeFacturaObject->RenderWithName(); ?>
                        <?php $this->lstPermitePagoObject->RenderWithName(); ?>
                        <?php //$this->txtDomOrigen->RenderWithName(); ?>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>