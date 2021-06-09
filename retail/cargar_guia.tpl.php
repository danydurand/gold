<?php
//----------------------------------------------------------
// Programa       : cargar_guia.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 21/04/16 06:05 PM
// Proyecto       : newliberty
// Descripcion    : 
//----------------------------------------------------------
$strPageTitle = QApplication::Translate('Guia Expreso Nacional');
require(__APP_INCLUDES__ . '/header.inc.php');
?>

    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-8 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnCalcTari->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->lblBotoPopu->Render(); ?>
            <?php $this->btnMasxAcci->Render(); ?>
            <?php $this->btnErroProc->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 0.5em; line-height: 0.5em">
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Remitente</div>
                </div>
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Destinatario</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="margin-top: 0.5em;">
                    <?php $this->txtNumeGuia->RenderWithName(); ?>
                    <?php $this->calFechGuia->RenderWithName(); ?>
                    <?php $this->txtNumeCedu->RenderWithName(); ?>
                    <?php $this->txtNombClie->RenderWithName(); ?>
                    <?php $this->txtTeleFijo->RenderWithName(); ?>
                    <?php $this->txtTeleMovi->RenderWithName(); ?>
                    <?php $this->txtDireClie->RenderWithName(); ?>
                </div>
                <div class="col-md-6" style="margin-top: 0.5em;">
                    <?php $this->lstSucuDest->RenderWithName(); ?>
                    <?php $this->rdbReceDomi->RenderWithName(); ?>
                    <?php $this->lstReceDest->RenderWithName(); ?>
                    <?php $this->txtCeduDest->RenderWithName(); ?>
                    <?php $this->txtNombDest->RenderWithName(); ?>
                    <?php $this->txtTeleDest->RenderWithName(); ?>
                    <?php $this->txtDireDest->RenderWithName(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 0.5em; line-height: 0.5em">
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Envio</div>
                </div>
                <div class="col-md-3" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Costos del Servicio</div>
                </div>
                <div class="col-md-3" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Facturacion</div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 1em">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-4" style="margin-left: 8.5em">
                            <?php $this->txtCantPiez->RenderWithName(); ?>
                        </div>
                        <div class="col-md-4" style="margin-left: 2em">
                            <?php $this->txtPesoGuia->RenderWithName(); ?>
                        </div>
                    </div>
                    <?php $this->txtDescCont->RenderWithName(); ?>
                    <?php $this->txtValoDecl->RenderWithName(); ?>
                    <div class="row">
                        <div class="col-md-5" style="margin-left: 7.2em">
                            <?php $this->rdbModaPago->RenderWithName(); ?>
                        </div>
                        <div class="col-md-4">
                            <?php $this->txtPorcDcto->RenderWithName(); ?>
                        </div>
                    </div>
                    <?php $this->chkConsDcto->RenderWithName(); ?>
                </div>
                <div class="col-md-3">
                    <?php $this->lblMontBase->RenderWithName(); ?>
                    <?php $this->lblMontDcto->RenderWithName(); ?>
                    <?php $this->lblMontIvax->RenderWithName(); ?>
                    <?php $this->lblMontFran->RenderWithName(); ?>
                    <?php $this->lblMontSegu->RenderWithName(); ?>
                    <?php $this->lblMontTota->RenderWithName(); ?>
                </div>
            </div>
            <?php $this->lblPopuModa->Render(); ?>
        </div>
    </div>

    <style type="text/css" media="all">
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            font-weight: bold;
            padding: 0.4em;
            text-align: center;
        }
        .form-controls {
            line-height: 0.8;
        }
        .form-name {
            width: 31%;
        }
        .form-field {
            width: 55%;
        }
    </style>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>