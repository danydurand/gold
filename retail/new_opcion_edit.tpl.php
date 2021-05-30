<?php
	// This is the HTML template include file (.tpl.php) for the new_opcion_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = $this->mctNewOpcion->TitleVerb.' Opción';
	require('inc/header.inc.php');
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
                    <?php $this->txtNombre->RenderWithName(); ?>
                    <?php $this->lstSistema->RenderWithName(); ?>
                    <?php $this->chkEsMenu->RenderWithName(); ?>
                    <?php $this->txtPrograma->RenderWithName(); ?>
                    <?php $this->chkActivo->RenderWithName(); ?>
                </div>
                <div class="col-xs-12 col-md-5" style="margin-top: 1em;">
                    <?php $this->txtDirectorio->RenderWithName(); ?>
                    <?php $this->lstDependenciaObject->RenderWithName(); ?>
                    <?php $this->txtPosicion->RenderWithName(); ?>
                    <?php $this->txtImagen->RenderWithName(); ?>
                    <?php $this->txtNivel->RenderWithName(); ?>
                    <?php $this->chkUsoGeneral->RenderWithName(); ?>
	            </div>
    	    </div>
	    </div>
	</div>

<?php require('inc/footer.inc.php'); ?>