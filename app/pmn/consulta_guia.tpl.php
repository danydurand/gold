<?php
//----------------------------------------------------------
// Programa       : consulta_guia.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 08/07/16 05:27 PM
// Proyecto       : newliberty
// Descripcion    : 
//----------------------------------------------------------
$strPageTitle = 'Consulta Guía';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <!----------------------------->
        <!-- Tamaños Mediano y Largo -->
        <!-------------------------- -->
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnEditGuia->Render(); ?>
            <?php $this->btnDescAmpl->Render(); ?>
            <?php $this->btnMasxAcci->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm hidden-md col-lg-4 pull-right" style="text-align: right; padding-right: 3px; margin-top: -0.25em">
            <?php $this->btnPrimRegi->Render(); ?>
            <?php $this->btnRegiAnte->Render(); ?>
            <?php $this->btnProxRegi->Render(); ?>
            <?php $this->btnUltiRegi->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-4 hidden-lg pull-right" style="text-align: right; padding-right: 3px; margin-top: -0.25em">
            <?php $this->btnPrimSmal->Render(); ?>
            <?php $this->btnAnteSmal->Render(); ?>
            <?php $this->btnProxSmal->Render(); ?>
            <?php $this->btnUltiSmal->Render(); ?>
        </div>
    </div>

    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6" style="margin-top: 0.5em; ">
                            <div class="row" style="padding: 0.1em">
                                <div class="titulo">Datos del Remitente</div>
                            </div>
                            <!-- Información del Remitente  -->
                            <div class="row">
                                <?php $this->lblNumeGuia->RenderWithName() ?>
                                <?php $this->lblFechGuia->RenderWithName() ?>
                                <?php $this->lblNumeCedu->RenderWithName() ?>
                                <?php $this->lblNombClie->RenderWithName() ?>
                                <?php $this->lblTeleFijo->RenderWithName() ?>
                                <?php $this->lblTeleMovi->RenderWithName() ?>
                                <?php $this->lblDireClie->RenderWithName() ?>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 0.5em; ">
                            <div class="row" style="padding: 0.1em">
                                <div class="titulo">Datos del Destinatario</div>
                            </div>
                            <!-- Información del Destinatario -->
                            <div class="row">
                                <?php $this->lblSucuDest->RenderWithName() ?>
                                <?php $this->lblReceDomi->RenderWithName() ?>
                                <?php $this->lblReceDest->RenderWithName() ?>
                                <?php $this->lblNombDest->RenderWithName() ?>
                                <?php $this->lblCeduDest->RenderWithName() ?>
                                <?php $this->lblTeleDest->RenderWithName() ?>
                                <?php $this->lblDireDest->RenderWithName() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6" style="margin-top: 0.5em; ">
                            <div class="row" style="padding: 0.1em">
                                <div class="titulo">Datos del Envio</div>
                            </div>
                            <!--Información del Envío-->
                            <div class="row">
                                <?php $this->lblCantPiez->RenderWithName() ?>
                                <?php $this->lblDescCont->RenderWithName() ?>
                                <?php $this->lblValoDecl->RenderWithName() ?>
                                <?php $this->lblModaPago->RenderWithName() ?>
                                <?php $this->lblUbicFisi->RenderWithName() ?>
                            </div>
                            <div class="row" style="padding: 0.1em">
                                <div class="titulo">Factura</div>
                            </div>
                            <div class="row">
                                <!--Información de la Factura-->
                                <?php $this->lblTickFisc->RenderWithName() ?>
                                <?php $this->lblCeduRifx->RenderWithName() ?>
                                <?php $this->lblRazoSoci->RenderWithName() ?>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 0.5em; ">
                            <div class="row" style="padding: 0.1em">
                                <div class="titulo">Costos del Servicio</div>
                            </div>
                            <div class="row">
                                <!--Información de Costos del Servicio-->
                                <?php $this->lblMontBase->RenderWithName() ?>
                                <?php $this->lblMontIvax->RenderWithName() ?>
                                <?php $this->lblMontFran->RenderWithName() ?>
                                <?php $this->lblMontSegu->RenderWithName() ?>
                                <?php $this->lblMontTota->RenderWithName() ?>
                            </div>
                            <div class="row" style="padding: 0.1em">
                                <div class="titulo">POD</div>
                            </div>
                            <div class="row">
                                <!--Información del POD-->
                                <?php $this->lblPersEntr->RenderWithName() ?>
                                <?php $this->lblUsuaPodx->RenderWithName() ?>
                                <?php $this->lblFechEntr->RenderWithName() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="margin-top: 0.5em; ">
                    <div class="row">
                        <!--Información de CKPT/Status-->
                        <div class="table-responsive">
                            <?php $this->dtgGuiaCkpt->Render() ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top: 0.5em; ">
                    <div class="row">
                        <!--Información de Registro de Trabajo (Histórico)-->
                        <div class="table-responsive">
                            <?php $this->dtgRegiTrab->Render() ?>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------------------>
            <!-- Informacion del POD de la Guia -->
            <!------------------------------------>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-11">
                            <div class="titulo-c"><?php $this->lblDescAmpl->Render(); ?></div>
                        </div>
                        <div class="col-md-offset-1 col-md-11">
                            <?php $this->txtDescAmpl->Render(); ?>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0.3em">
                        <div class="col-md-offset-4 col-md-6">
                            <?php $this->btnSaveDesc->Render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            font-weight: bold;
            padding: 0.4em;
            text-align: center;
        }
        .form-controls {
            line-height: 0.9;
        }
        .renderWithName {
            padding: 0px 0;
        }
        .form-name {
            width: 28%;
            font-size: 90%;
        }
        .form-field {
            width: 72%;
            font-size: 88%;
        }
    </style>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>