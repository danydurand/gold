<?php
// This is the HTML template include file (.tpl.php) for the guia_edit.php
// form DRAFT page. Remember that this is a DRAFT. It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure
// that subsequent code re-generations do not overwrite your changes.
$strPageTitle = QApplication::Translate('Planilla Ipostel');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <!-- Head del Body -->
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-6" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
        </div>
        <div class="hidden-sm col-md-3 col-lg-4"></div>
    </div>
    <!-- Contenido del Body -->
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 2em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
					<?php $this->calFechInic->RenderWithName(); ?>
					<?php $this->calFechFina->RenderWithName(); ?>
					<?php $this->lstSucuDest->RenderWithName(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>