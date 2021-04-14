<?php
$strPageTitle = QApplication::Translate('Guía');
require(__YAMAGUCHI__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="hidden-xs hidden-sm col-md-4 col-lg-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="col-xs-12 col-md-8 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnCreaNuev->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->lblBotoPopu->Render(); ?>
            <?php $this->btnImprGuia->Render(); ?>
            <?php $this->btnBorrGuia->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 0.4em">
                <div class="col-md-12 col-lg-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Remitente</div>
                </div>
                <div class="col-lg-6 visible-lg" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Destinatario</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6" style="margin-top: 1em; margin-bottom: 1em;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="titulo-c">Nro de Guía</div>
                            <?php $this->txtNumeGuia->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Fecha Guía</div>
                            <?php $this->calFechGuia->Render(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="titulo-c">Origen</div>
                            <?php $this->lstSucuOrig->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="titulo-c">Nombre/Razón Social</div>
                            <?php $this->txtNombRemi->Render(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="titulo-c">Teléfono (Solo Números)</div>
                            <?php $this->txtTeleRemi->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="titulo-c">Direción de Recolecta</div>
                            <?php $this->txtDireRemi->Render(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="titulo-c">Contenido del Envío</div>
                            <?php $this->txtDescCont->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="titulo-c">Cant. Pzas</div>
                            <?php $this->txtCantPiez->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Valor Decl.</div>
                            <?php $this->txtValoDecl->Render(); ?>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="titulo-c">¿Asegurado?</div>
                            <!--<div>¿Asegurado?</div>-->
                            <?php $this->chkSeguGuia->Render(); ?>
                        </div>
                        <div class="col-md-3 text-center">
                            <?php if ($this->objCliente->GuiaRetorno) { ?>
                                <div class="titulo-c">¿Retorno?</div>
                            <?php } ?>
                            <?php $this->chkEnviReto->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ($this->objCliente->GuiaRetorno) { ?>
                                <div class="titulo-c">Describa claramente contenido e instrucciones para el Envío Retorno</div>
                            <?php } ?>
                            <?php $this->txtContReto->Render(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 visible-md" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Destinatario</div>
                </div>
                <div class="col-md-12 col-lg-6" style="margin-top: 1em; margin-bottom: 1em;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="titulo-c">Modalidad de Pago</div>
                            <?php $this->lstModaPago->Render(); ?>
                        </div>
                        <div class="col-md-6" style="text-align: center">
                            <div class="titulo-c">Fecha de la Recolecta</div>
                            <?php $this->calFechReco->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="titulo-c">Destinatario Frecuente</div>
                            <?php $this->lstDestFrec->Render(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="titulo-c">Destino</div>
                            <?php $this->lstSucuDest->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="titulo-c">Nombre/Razón Social del Destinatario</div>
                            <?php $this->txtNombDest->Render(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="titulo-c">Receptoria Destino</div>
                            <?php $this->lstReceDest->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="titulo-c">Dirección de Entrega</div>
                            <?php $this->txtDireDest->Render(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="titulo-c">Teléfono Destinatario</div>
                            <?php $this->txtTeleDest->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="titulo-c">¿Destinatario Frecuente?</div>
                            <?php $this->chkDestFrec->Render(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="titulo-c">Cédula/RIF del Destinatario</div>
                            <?php $this->lstCeduDest->Render(); ?>
                            <?php $this->txtCeduDest->Render(); ?>
                        </div>
                    </div>
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
        .titulo-c {
            font-weight: bold;
            padding: 0.6em;
            /*text-align: left;*/
        }
        .titulo-l {
            font-weight: bold;
            padding: 0.6em;
            text-align: left;
        }
        .cedu-dest {
            font-weight: bold;
            text-align: right;
            margin-right: -5.8%;
            margin-left: 4%;
            padding: 0.6em;
        }
        .info-cedu {
            padding: 0.6em;
        }
        .zona-adve {
            color: #A52422;
        }
        .f-1 {
            text-align: right;
            margin-right: -5%;
        }
        .form-controls {
            line-height: 0.9;
        }
        .form-name {
            width: 40%;
        }
        .form-field {
            width: 55%;
            font-size: 1em;
        }
    </style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>