<?php
//-----------------------------------------------------------------------------
// Realizado por  : Daniel Durand
// Fecha Elab.    : 17/03/2021
//-----------------------------------------------------------------------------
$strPageTitle = 'Containers' . ' - ' . $this->mctContainers->TitleVerb;
require(__APP_INCLUDES__ . '/header.inc.php');
//require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <!----------------------------->
    <!-- Tamaños Mediano y Largo -->
    <!-------------------------- -->
    <div class="hidden-xs hidden-sm col-md-7 col-lg-5" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnVolvList->Render(); ?>
        <?php //$this->btnNuevRegi->Render(); ?>
        <?php //$this->btnSave->Render(); ?>
        <?php //$this->btnDelete->Render(); ?>
        <?php $this->btnLogxCamb->Render(); ?>
        <?php //$this->btnTranMobi->Render(); ?>
        <?php if (isset($this->btnExpoExce)) { ?>
            <?php $this->btnExpoExce->Render(); ?>
        <?php } ?>
    </div>
    <div class="hidden-xs hidden-sm hidden-md col-lg-4 pull-right" style="text-align: right; padding-right: 3px; margin-top: -0.25em">
        <?php $this->btnPrimRegi->Render(); ?>
        <?php $this->btnRegiAnte->Render(); ?>
        <?php $this->btnProxRegi->Render(); ?>
        <?php $this->btnUltiRegi->Render(); ?>
    </div>
    <!-------------------------------------->
    <!-- Tamaños Pequeños y Extra-Pequeño -->
    <!-------------------------------------->
    <div class="col-xs-5 hidden-md hidden-lg" style="text-align: left; margin-top: -0.25em;">
        <?php $this->btnVolvSmal->Render(); ?>
        <?php $this->btnNuevSmal->Render(); ?>
        <?php $this->btnGuarSmal->Render(); ?>
        <?php $this->btnBorrSmal->Render(); ?>
        <?php $this->btnHistSmal->Render(); ?>
    </div>
    <div class="col-xs-3 col-md-4 hidden-lg pull-right" style="text-align: right; padding-right: 3px; margin-top: -1.99em">
        <?php $this->btnPrimSmal->Render(); ?>
        <?php $this->btnAnteSmal->Render(); ?>
        <?php $this->btnProxSmal->Render(); ?>
        <?php $this->btnUltiSmal->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6 title">Numero</div>
                    <div class="col-md-6 title">F.Despacho</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><?php $this->txtNumero->Render(); ?></div>
                    <div class="col-md-6"><?php $this->calFecha->Render(); ?></div>
                </div>
                <div class="title">Operación</div>
                <?php $this->lstOperacion->Render(); ?>
                <div class="row">
                    <div class="col-md-6 title">Transportista</div>
                    <div class="col-md-6 title">Estatus</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><?php $this->lstChofer->Render(); ?></div>
                    <div class="col-md-6"><?php $this->txtEstatus->Render(); ?></div>
                </div>
                <div class="row">
                    <div class="col-md-6 title">Vehiculo</div>
                    <div class="col-md-6 title">Placa</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><?php $this->txtVehiculo->Render(); ?></div>
                    <div class="col-md-6"><?php $this->txtPlaca->Render(); ?></div>
                </div>
                <div class="row">
                    <div class="col-md-6 title">Precinto Lateral</div>
                    <div class="col-md-6 title">Cant Piezas</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><?php $this->txtPrecintoLateral->Render(); ?></div>
                    <div class="col-md-6"><?php $this->txtPiezas->Render(); ?></div>
                </div>
                <div class="row">
                    <div class="col-md-6 title">Cant Entregas</div>
                    <div class="col-md-6 title">Cant Devueltas</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><?php $this->txtCantidadOk->Render(); ?></div>
                    <div class="col-md-6"><?php $this->txtDevueltas->Render(); ?></div>
                </div>
                <div class="row">
                    <div class="col-md-6 title">Cant Sin Gest.</div>
                    <div class="col-md-6 title">Cant Pendientes</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><?php $this->txtSinGestionar->Render(); ?></div>
                    <div class="col-md-6"><?php $this->txtPendientes->Render(); ?></div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="title"><?php $this->lblResuEntr->Render() ?></div>
                <?php $this->dtgPiezCont->Render(); ?>
	        </div>
        </div>
    </div>
</div>
<!-- Estilos de la Página -->
<style>
    .title {
        font-weight: bold;
    }
    .titulo {
        background-color: #CCCCCC;
        border-radius: 3px;
        font-weight: bold;
        padding: 0.2em;
        text-align: center;
    }
</style>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>