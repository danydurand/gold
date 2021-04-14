<?php
// This is the HTML template include file (.tpl.php) for the estacion_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = $this->mctEstacion->TitleVerb . ' Sucursal';
require(__APP_INCLUDES__ . '/header.inc.php');
require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="" role="tabpanel">
                <ul class="nav nav-tabs tab-l nav-justified" role="tablist">
                    <li class="active" role="presentation">
                        <a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">
                            <i class="fa fa-user fa-lg"></i>
                            Datos Generales
                        </a>
                    </li>
                    <li class="tabs-guias" role="presentation">
                        <a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">
                            <i class="fa fa-commenting-o fa-lg"></i>
                            Receptorías (<?= $this->intCantRece; ?>)
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="seccion1">
                        <div class="media">
                            <div class="media-body">
                                <div class="espacio"></div>
                                <div class="col-md-offset-1 col-md-3">
                                    <div class="title">Codigo IATA</div>
                                    <?php $this->txtCodiEsta->Render(); ?>
                                    <div class="title">Nombre o Descripción</div>
                                    <?php $this->txtDescEsta->Render(); ?>
                                    <div class="title">Estatus</div>
                                    <?php $this->lstCodiStatObject->Render(); ?>
                                    <div class="title">Dirección</div>
                                    <?php $this->txtTextObse->Render(); ?>
                                    <div class="title">Persona Contacto</div>
                                    <?php $this->txtNombCont->Render(); ?>
                                    <div class="title">Nros de Teléfono</div>
                                    <?php $this->txtNumeTele->Render(); ?>
                                </div>
                                <div class="col-md-offset-1 col-md-3">
                                    <div class="title">Se cubre en</div>
                                    <?php $this->txtNumeDias->Render(); ?>
                                    <div class="title">E-mail Principal</div>
                                    <?php $this->txtDireMailPrincipal->Render(); ?>
                                    <div class="title">Medición y Control</div>
                                    <?php $this->txtDireMail->Render(); ?>
                                    <div class="title">Región</div>
                                    <?php $this->lstRegion->Render(); ?>
                                    <div class="title">Es un Almacén ?</div>
                                    <?php $this->lstEsUnAlmacenObject->Render(); ?>
                                    <div class="title">Operación Asociada</div>
                                    <?php $this->lstOperacion->Render(); ?>
                                </div>
                                <div class="col-md-offset-1 col-md-3">
                                    <div class="title">Zona COD ?</div>
                                    <?php $this->lstZonaCodObject->Render(); ?>
                                    <div class="title">Notificar Recolectas por E-mail ?</div>
                                    <?php $this->lstNotificarRecolectaObject->Render(); ?>
                                    <div class="title">Área Metropolitana ?</div>
                                    <?php $this->lstAreaMetropolitanaObject->Render(); ?>
                                    <div class="title">Ubicada en el Estado</div>
                                    <?php $this->lstEstado->Render(); ?>
                                    <div class="title">Visible en el CORP ?</div>
                                    <?php $this->lstVisibleEnRegistro->Render(); ?>
                                    <div class="title">Se factura en ?</div>
                                    <?php $this->lstSeFacturaEnObject->Render(); ?>
                                    <div class="title">Exenta de IVA ?</div>
                                    <?php $this->lstExentaDeIva->Render(); ?>
                                </div>
                                <div class="col-md-offset-1 col-md-10" style="margin-top: 1em">
                                    <div class="title">Zonas no Cubiertas</div>
                                    <?php $this->txtZonasNc->Render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="seccion2">
                        <div class="media">
                            <div class="media-body"><br>
                                <div class="col-md-12">
                                    <div class="text-center" style="margin-bottom: .8em">
                                        <?php $this->btnNuevRece->Render(); ?>
                                    </div>
                                    <?php $this->dtgReceSucu->Render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .espacio {
        margin-top: 0.5em;
    }
    .title {
        font-weight: bold;
    }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        background-color: #a52422;
    }
    .nav-tabs > li > a {
        color: #A52422;
    }
</style>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>