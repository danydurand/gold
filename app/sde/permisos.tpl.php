<?php
// This is the HTML template include file (.tpl.php) for the opci_grup_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.
// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = QApplication::Translate('Permisos');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 1em;">
                <div class="col-md-offset-1 col-md-5">
                    <div class="title">Grupo</div>
                    <?php $this->lstCodiGrup->Render(); ?>
                    <div class="title">Permisos</div>
                    <?php $this->lstOpciSist->Render(); ?>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-7">
                            <?php $this->txtLogiUsua->RenderWithName(); ?>
                        </div>
                        <div class="col-md-5">
                            <?php $this->btnAgreUsua->Render(); ?>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1em">
                        <?php $this->dtgUsuaGrup->Render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .title {
            font-weight: bold;
        }
    </style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>