<?php
	// This is the HTML template include file (.tpl.php) for the mensaje_yamaguchi_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = $this->mctMensajeYamaguchi->TitleVerb.' Mensaje CORP';
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
	            <div class="col-xs-12 col-md-offset-1 col-md-5" style="margin-top: 1em;">
                    <?php $this->lblId->RenderWithName(); ?>
                    <?php $this->lstTipoMens->RenderWithName(); ?>
                    <?php $this->txtTexto->RenderWithName(); ?>
                    <?php $this->txtOrden->RenderWithName(); ?>
                </div>
	            <div class="col-xs-12 col-md-5" style="margin-top: 1em;">
                    <?php $this->chkTiempoIndefinido->RenderWithName(); ?>
					<?php $this->calFechInic->RenderWithName(); ?>
					<?php $this->calFechFin->RenderWithName(); ?>
					<?php $this->lstDeteClie->RenderWithName(); ?>
                    <?php $this->txtLogin->RenderWithName(); ?>
                    <?php $this->txtCodigos->RenderWithName(); ?>
		        </div>
	        </div>
            <div class="row" style="margin-top: 2em">
                <div class="col-xs-12 col-md-offset-2 col-md-9">
                    <?php $this->lblEjemMens->Render(); ?>
                </div>
            </div>
	    </div>
	</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>