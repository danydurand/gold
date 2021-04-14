<?php
	// This is the HTML template include file (.tpl.php) for the counter_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Receptoria' . ' - ' . $this->mctCounter->TitleVerb;
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
        <div class="row" style="margin-top: 1em">
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
                            Cajas (<?= $this->intCantCaja; ?>)
                        </a>
                    </li>
                </ul>
                <div class="tab-content" style="margin-top: 1em">
                    <div class="tab-pane active" role="tabpanel" id="seccion1">
                        <div class="media">
                            <div class="media-body">
                                <div class="col-md-6">
                                    <?php $this->lblId->RenderWithName(); ?>
                                    <?php $this->txtDescripcion->RenderWithName(); ?>
                                    <?php $this->txtSiglas->RenderWithName(); ?>
                                    <?php $this->lstSucursal->RenderWithName(); ?>
                                    <?php $this->lstRuta->RenderWithName(); ?>
                                    <?php //$this->lstEntregaInmediataObject->RenderWithName(); ?>
                                    <?php //$this->txtLimiteDePaquetes->RenderWithName(); ?>
                                    <?php //$this->txtCantidadDePaquetes->RenderWithName(); ?>
                                    <?php //$this->txtCkptRecepcion->RenderWithName(); ?>
                                    <?php //$this->txtCkptConfirmacion->RenderWithName(); ?>
                                    <?php //$this->txtCkptAlmacen->RenderWithName(); ?>
                                    <?php //$this->txtPaisId->RenderWithName(); ?>
                                    <?php //$this->txtStatusId->RenderWithName(); ?>
                                    <?php $this->lstStatCoun->RenderWithName(); ?>
                                    <?php $this->txtDireccion->RenderWithName(); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php //$this->lstElegirServicioObject->RenderWithName(); ?>
                                    <?php $this->lstEsRutaObject->RenderWithName(); ?>
                                    <?php //$this->lstSeFacturaObject->RenderWithName(); ?>
                                    <?php //$this->lstPermitePagoObject->RenderWithName(); ?>
                                    <?php $this->txtEmailJefeAlmacen->RenderWithName(); ?>
                                    <?php //$this->txtCkptAntiguedad1->RenderWithName(); ?>
                                    <?php //$this->txtCkptAntiguedad2->RenderWithName(); ?>
                                    <?php //$this->txtCkptAntiguedad0->RenderWithName(); ?>
                                    <?php $this->lstAliadoComercial->RenderWithName(); ?>
                                    <?php $this->txtLimiteKilos->RenderWithName(); ?>
                                    <?php //$this->txtDependeDe->RenderWithName(); ?>
                                    <?php $this->chkDomOrigen->RenderWithName(); ?>
                                    <?php $this->chkDomDestino->RenderWithName(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="seccion2">
                        <div class="media">
                            <div class="media-body"><br>
                                <div class="col-md-12">
                                    <div class="text-center" style="margin-bottom: .8em">
                                        <?php $this->btnNuevCaja->Render(); ?>
                                    </div>
                                    <?php $this->dtgCajaRece->Render(); ?>
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
    .form-name {
        width: 30%;
    }
</style>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>