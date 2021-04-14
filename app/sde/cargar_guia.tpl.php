<?php
//-----------------------------------------------------------------------------
// Programa       : cargar_guia.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 02/03/17 11:40 AM
// Proyecto       : newliberty
// Descripcion    :
//-----------------------------------------------------------------------------
$strPageTitle = 'Ingresar/Editar Guía';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-8 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnNuevRegi->Render(); ?>
            <?php $this->btnImprPodx->Render(); ?>
            <?php $this->btnImprEtiq->Render(); ?>
            <?php //$this->btnImprGuia->Render(); ?>
            <?php $this->btnIntercam->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                    <?php $this->objDefaultWaitIcon->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: .3em;">
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Remitente</div>
                </div>
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Destinatario</div>
                </div>
            </div>
            <div class="row" style="margin-bottom: .1em;">
                <div class="col-md-6" style="margin-top: .1em;">
                    <div class="row">
                        <div class="col-lg-1 visible-lg"></div>
                        <div class="col-md-6 col-lg-5">
                            <div class="titulo-c">Número de Guía</div>
                            <?php $this->txtNumeGuia->Render(); ?>
                        </div>
                        <div class="col-lg-1 visible-lg"></div>
                        <div class="col-md-6 col-lg-5">
                            <div class="titulo-c">Fecha de la Guía</div>
                            <div style="margin-left: 1.2em">
                                <?php $this->lblFechGuia->Render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0.5em;">
                        <div class="col-md-6 col-lg-3">
                            <div class="titulo-c">Busc. Código</div>
                            <?php $this->txtCodiInte->Render(); ?>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="titulo-c">Busc. Nombre</div>
                            <?php $this->txtNombBusc->Render(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="titulo-c">Cliente (A Facturar)</div>
                            <?php $this->lstCodiClie->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="titulo-c">Nombre/Razón Social</div>
                            <?php $this->txtNombRemi->Render(); ?>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="titulo-c">Teléfono (Solo Números)</div>
                            <?php $this->txtTeleRemi->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="titulo-c">Direción de Recolecta</div>
                            <?php $this->txtDireRemi->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="titulo-c">Origen</div>
                            <?php $this->lstCodiOrig->Render(); ?>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="titulo-c">Destino</div>
                            <?php $this->lstCodiDest->Render(); ?>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0.3em;">
                        <div class="col-md-4 col-lg-3">
                            <div class="titulo-c">Cant. Pzas</div>
                            <div style="margin-left: 1em;">
                                <?php $this->txtCantPiez->Render(); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="titulo-c" style="margin-left: 0.5em">Peso</div>
                            <?php $this->txtPesoGuia->Render(); ?>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="titulo-c">Valor Decl.</div>
                            <?php $this->txtValoDecl->Render(); ?>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="titulo-c">¿Asegurado?</div>
                            <div style="margin-left: 3em">
                                <?php $this->chkEnviSegu->Render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="titulo-c">Envío Retorno</div>
                            <?php $this->chkEnviReto->Render(); ?>&nbsp;&nbsp;
                            <?php $this->txtGuiaReto->Render(); ?>
                        </div>
                        <div class="col-md-5 col-lg-5">
                            <div class="titulo-c" style="margin-left: 4.5em">Guía Externa</div>
                            <?php $this->chkGuiaInte->Render(); ?>&nbsp;&nbsp;
                            <?php $this->txtGuiaInte->Render(); ?>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="titulo-c">¿Peso Volum.?</div>
                            <div style="margin-left: 3.3em">
                                <?php $this->chkPesoVolu->Render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top: .1em;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="titulo-c">Contenido del Envío</div>
                            <?php $this->txtDescCont->Render() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="titulo-c">Busc. Código</div>
                            <?php $this->txtCodiInt2->Render(); ?>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="titulo-c">Busc. Nombre</div>
                            <?php $this->txtNombBus2->Render(); ?>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="titulo-c">Destinatario</div>
                            <?php $this->lstDestFrec->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-7">
                            <div class="titulo-c">Nombre/Razón Social</div>
                            <?php $this->txtNombDest->Render(); ?>
                        </div>
                        <div class="col-md-12 col-lg-5">
                            <div class="titulo-c">Teléfono (Solo Números)</div>
                            <?php $this->txtTeleDest->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="titulo-c">Dirección de Entrega</div>
                            <?php $this->txtDireDest->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="titulo-c">Observación</div>
                            <?php $this->txtTextObse->Render(); ?>
                        </div>
                        <div class="col-md-8 col-lg-4">
                            <div class="titulo-c">¿Dest. Frecuente?</div>
                            <div style="margin-left: 4em">
                                <?php $this->chkDestFrec->Render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="text-align: right">
                        <div class="col-md-2 col-lg-2">
                            <div class="titulo-r">Base</div>
                            <?php $this->txtMontBase->Render(); ?>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="titulo-r">% Dscto</div>
                            <?php $this->txtPorcDcto->Render(); ?>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="titulo-r">Dscto</div>
                            <?php $this->txtMontDcto->Render(); ?>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="titulo-r">I.V.A.</div>
                            <?php $this->txtMontIvax->Render(); ?>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="titulo-r">Franqueo</div>
                            <?php $this->txtMontFran->Render(); ?>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="titulo-r">Seguro</div>
                            <?php $this->txtMontSegu->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="titulo-l">F. Direc</div>
                            <div style="margin-left: 2em">
                                <?php $this->chkFletDire->Render(); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-l">Cons Dscto</div>
                            <div style="margin-left: 3em">
                                <?php $this->chkConsDcto->Render(); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-l">Tipo Vehiculo</div>
                            <?php $this->lstVehiSuge->Render(); ?>
                        </div>
                        <div class="col-md-2">
                            <div class="titulo-c">F.Pago</div>
                            <div style="">
                                <?php $this->lstModaPago->Render(); ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="titulo-r">Total</div>
                            <div style="text-align: right">
                                <?php $this->txtMontTota->Render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        .titulo-c {
            font-weight: bold;
            padding: 0.6em;
            text-align: left;
        }
        .titulo-r {
            font-weight: bold;
            padding: 0.6em;
            text-align: right;
        }
        .titulo-l {
            font-weight: bold;
            padding: 0.6em;
            text-align: left;
        }
        .form-controls {
            line-height: 0.9;
        }
        .form-name {
            width: 31%;
        }
        .form-field {
            width: 55%;
        }
    </style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>