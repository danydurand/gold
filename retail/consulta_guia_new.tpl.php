<?php
//-----------------------------------------------------------------------------
// Programa       : consulta_guia.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 08/02/17 10:47 AM
// Proyecto       : newliberty
// Descripción    :
//-----------------------------------------------------------------------------
$strPageTitle = 'Consulta de la Guía';
require('inc/header.inc.php');
?>
    <!-- Encabezado del Body -->
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <!----------------------------->
        <!-- Tamaños Mediano y Largo -->
        <!-------------------------- -->
        <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnEditGuia->Render(); ?>
            <?php //$this->btnImprGuia->Render(); ?>
            <?php //$this->btnInfoPodx->Render(); ?>
            <?php $this->btnGuiaOrig->Render(); ?>
            <?php $this->btnMasxAcci->Render(); ?>
            <?php $this->lblBotoPopu->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm hidden-md col-lg-4 pull-right" style="text-align: right; padding-right: 3px; margin-top: -0.25em">
            <?php $this->btnPrimRegi->Render(); ?>
            <?php $this->btnRegiAnte->Render(); ?>
            <?php $this->btnProxRegi->Render(); ?>
            <?php $this->btnUltiRegi->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-3 hidden-lg pull-right" style="text-align: right; padding-right: 3px; margin-top: -0.25em">
            <?php $this->btnPrimSmal->Render(); ?>
            <?php $this->btnAnteSmal->Render(); ?>
            <?php $this->btnProxSmal->Render(); ?>
            <?php $this->btnUltiSmal->Render(); ?>
        </div>
    </div>
    <!-- Contenido del Body -->
    <div class="form-controls">
        <div class="container-fluid" data-aos="fade-in">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.6em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 0.4em">
                <div class="col-md-6" style="padding: 0.1em">
                    <div class="titulo">Información del Remitente</div>
                </div>
                <div class="col-md-6" style="padding: 0.1em">
                    <div class="titulo">Información del Destinatario</div>
                </div>
            </div>
            <div class="row">
                <!-- Lado izquierdo del formulario -->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="titulo-c">Origen</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblSucuOrig->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Teléfono</div>
                        </div>
                        <div class="col-md-4">
                            <?php $this->lblTeleRemi->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="titulo-c">Nombre</div>
                        </div>
                        <div class="col-md-10">
                            <?php $this->lblNombRemi->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="titulo-c">Dirección</div>
                        </div>
                        <div class="col-md-10">
                            <?php $this->lblDireRemi->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="titulo-c">E-mail</div>
                        </div>
                        <div class="col-md-5">
                            <?php $this->lblEmaiRemi->Render(); ?>
                        </div>
                        <div class="col-md-2">
                            <div class="titulo-c">Profesión</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblProfRemi->Render(); ?>
                        </div>
                    </div>
                </div>
                <!-- Lado derecho del formulario -->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="titulo-c">Destino</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblSucuDest->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Teléfono</div>
                        </div>
                        <div class="col-md-4">
                            <?php $this->lblTeleDest->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="titulo-c">Nombre</div>
                        </div>
                        <div class="col-md-10">
                            <?php $this->lblNombDest->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="titulo-c">Dirección</div>
                        </div>
                        <div class="col-md-10">
                            <?php $this->lblDireDest->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="titulo-c">Estado</div>
                        </div>
                        <div class="col-md-2">
                            <?php $this->lblEstaDest->Render(); ?>
                        </div>
                        <div class="col-md-2">
                            <div class="titulo-c">Ciudad</div>
                        </div>
                        <div class="col-md-2">
                            <?php $this->lblCiudDest->Render(); ?>
                        </div>
                        <div class="col-md-2">
                            <div class="titulo-c">C.Postal</div>
                        </div>
                        <div class="col-md-2">
                            <?php $this->lblCodiPost->Render(); ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row" style="margin-top: 0.3em">
                <div class="col-md-6" style="padding: 0.1em">
                    <div class="titulo">Información del Envío</div>
                </div>
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Costos del Servicio</div>
                </div>
            </div>
            <div class="row">
                <!-- Lado izquierdo del formulario -->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="titulo-c">Guía (<?= $this->lblSistGuia->Text ?>)#</div>
                        </div>
                        <div class="col-md-3 text-left enlace">
                            <?php $this->lblNumeGuia->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Fecha Guía</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblFechGuia->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="titulo-c">Contenido</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblDescCont->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Forma Pago</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblFormPago->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="titulo-c">Pzas / Kgs <?= $this->strPesoAlte ?></div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblPiezPeso->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Producto</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblCodiProd->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="titulo-c">Valor Decl.</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblValoDecl->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Entregado A</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblPersEntr->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="titulo-c">Alt / Anc / Lar</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblMediEnvi->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Fecha Entrega</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblFechEntr->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="titulo-c">Creado Por</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblCreaPorx->Render(); ?>
                        </div>
                        <div class="col-md-3">
                            <div class="titulo-c">Creada el</div>
                        </div>
                        <div class="col-md-3">
                            <?php $this->lblFechHora->Render(); ?>
                        </div>
                    </div>
                </div>
                <!-- Lado derecho del formulario -->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="titulo-c">Tarifa</div>
                                </div>
                                <div class="col-md-6">
                                    <?php $this->lblTipoTari->Render(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="titulo-c">Seguro?</div>
                                </div>
                                <div class="col-md-6">
                                    <?php $this->lblSeguGuia->Render(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="titulo-c">Manifiesto</div>
                                </div>
                                <div class="col-md-6">
                                    <?php $this->lblNotaEntr->Render(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="titulo-c">Serv. Entr.</div>
                                </div>
                                <div class="col-md-6">
                                    <?php $this->lblServEntr->Render(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="titulo-c">Nro Factura</div>
                                </div>
                                <div class="col-md-6">
                                    <?php $this->lblNumeFact->Render(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="titulo-c">Monto Total</div>
                                </div>
                                <div class="col-md-6">
                                    <?php $this->lblMontTota->Render(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <?php $this->dtgConcGuia->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
            <!--<div class="row" style="margin-top: 0.3em">-->
            <!--    <div class="col-md-12" style="border-radius: 3px; padding: 0.1em">-->
            <!--        <div class="titulo">Comentario</div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="row" style="margin-top: 0.5em; margin-bottom: 0.5em;">
                <div class="col-md-11">
                    <?php $this->txtTextCome->Render(); ?>
                </div>
                <div class="col-md-1 text-left">
                    <?php $this->btnSaveCome->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 0.5em">
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Gestion Interna</div>
                </div>
                <div class="col-md-6" style="padding: 0.1em">
                    <div class="titulo">Piezas de la Guia</div>
                </div>
            </div>
            <div class="row">
                <!-- Lado izquierdo del formulario -->
                <div class="col-md-6">
                    <div class="row" style="padding-right: 1px; padding-left: 1px;">
                        <div class="table-responsive">
                            <?php $this->dtgRegiTrab->Render(); ?>
                        </div>
                    </div>
                </div>
                <!-- Lado derecho del formulario -->
                <div class="col-md-6">
                    <div class="row" style="padding-left: 1px; padding-right: 1px;">
                        <div class="table-responsive">
                            <?php $this->dtgPiezGuia->Render(); ?>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0.5em">
                        <div style="border-radius: 3px; padding: 0.1em">
                            <div class="titulo">Historial de Checkpoints</div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: .1em; padding-left: 1px; padding-right: 1px;">
                        <div class="table-responsive">
                            <?php $this->dtgGuiaCkpt->Render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------------------>
            <!-- Informacion del POD de la Guia -->
            <!------------------------------------>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-3">
                            <div class="titulo-c"><?php $this->lblQuieReci->Render(); ?></div>
                        </div>
                        <div class="col-md-5">
                            <?php $this->txtQuieReci->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-3">
                            <div class="titulo-c"><?php $this->lblFechEnt1->Render(); ?></div>
                        </div>
                        <div class="col-md-6">
                            <?php $this->dttFechEntr->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-3">
                            <div class="titulo-c"><?php $this->lblHoraEntr->Render(); ?></div>
                        </div>
                        <div class="col-md-6">
                            <?php $this->txtHoraEntr->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-0 col-md-5">
                            <div class="titulo-c"><?php $this->lblVariGuia->Render(); ?></div>
                        </div>
                        <div class="col-md-6">
                            <?php $this->chkVariGuia->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-5 col-md-6">
                            <?php $this->btnGrabPodx->Render(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="titulo-c"><?php $this->lblOtraGuia->Render() ?></div>
                        </div>
                        <div class="col-md-6">
                            <?php $this->txtOtraGuia->Render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->lblPopuModa->Render(); ?>
        </div>
    </div>
    <!-- Estilos de la Página -->
    <style>
        body {
            line-height: 1.2;
        }
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            font-weight: bold;
            padding: 0.2em;
            text-align: center;
        }
        .titulo-c {
            font-weight: bold;
            padding: 0.3em;
            text-align: right;
        }
        .enlace {
            color: blue;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        .nro_guia {
            color: #A52422;
            font-weight: bold;
        }
        .form-field {
            width: 70%;
            /*font-size: 88%;*/
        }
        .form-label {
            width: 100%;
            /*font-size: 88%;*/
        }
    </style>
<?php require('inc/footer.inc.php'); ?>