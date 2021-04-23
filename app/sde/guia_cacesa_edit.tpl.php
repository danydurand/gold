<?php
// This is the HTML template include file (.tpl.php) for the guia_cacesa_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = $this->mctGuiaCacesa->TitleVerb.' Guía';
require(__APP_INCLUDES__ . '/header.inc.php');
require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 1.0em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 1em;">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <?php $this->calFechCarg->RenderWithName(); ?>
                    <?php //$this->txtNumeGuia->RenderWithName(); ?>
                    <?php $this->txtGuiaExte->RenderWithName(); ?>
                    <?php $this->txtOrigGuia->RenderWithName(); ?>
                    <?php $this->lblDestGuia->RenderWithName(); ?>
                    <?php $this->lblOtroDestino->RenderWithName(); ?>
                    <?php $this->lstSucuDest->RenderWithName(); ?>
                    <?php //$this->chkAsigDest->RenderWithName(); ?>
                    <?php $this->txtNombRemi->RenderWithName(); ?>
                    <?php $this->txtNombDest->RenderWithName(); ?>
                </div>
                <div class="col-md-5">
                    <?php $this->txtDireDest->RenderWithName(); ?>
                    <?php $this->txtTeleDest->RenderWithName(); ?>
                    <?php $this->txtDescCont->RenderWithName(); ?>
                    <?php $this->txtCantPiez->RenderWithName(); ?>
                    <?php $this->txtPesoGuia->RenderWithName(); ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <style>
        .form-controls {
            line-height: 0.9;
        }
        /*.renderWithName {
            padding: 0px 0;
        }*/
        .form-name {
            width: 38%;
            font-size: 100%;
        }
        .form-field {
            width: 62%;
            font-size: 98%;
        }
        /*.panel-body > ul > .text-info {
            color: #A52422;
        }
        .panel-body > ul > li.text-info > #c6_ctl > #c69.form-label  {
            width: 95%;
        }
        .panel {
            margin: 5%;
            width: 97%;
        }
        .panel-primary {
            border-color: #A52422;
        }
        .panel-primary > .panel-heading {
            color: #fff;
            background-color: #A52422;
            border-color: #A52422;
        }*/
    </style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>