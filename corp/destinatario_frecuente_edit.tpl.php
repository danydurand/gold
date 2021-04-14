<?php
// This is the HTML template include file (.tpl.php) for the destinatario_frecuente_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Dest. Frecuente' . ' - ' . $this->mctDestinatarioFrecuente->TitleVerb;
require(__YAMAGUCHI__APP_INCLUDES__ . '/header.inc.php');
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
                <div class="col-md-5" style="margin-top: 1em;">
                    <?php $this->txtNombre->RenderWithName(); ?>
                    <?php $this->txtDireccion->RenderWithName(); ?>
                    <?php $this->txtTelefono->RenderWithName(); ?>
                    <?php $this->txtEmail->RenderWithName(); ?>
                </div>
                <div class="col-md-5" style="margin-top: 1em;">
                    <?php $this->txtCedulaRif->RenderWithName(); ?>
                    <?php $this->txtPersonaContacto->RenderWithName(); ?>
                    <?php $this->txtCodigoPostal->RenderWithName(); ?>
                    <?php //$this->chkCambDest->RenderWithName(); ?>
                    <?php $this->lstDestino->RenderWithName(); ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>