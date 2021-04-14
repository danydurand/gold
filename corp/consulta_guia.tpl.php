<?php
//----------------------------------------------------------
// Programa       : consulta_guia.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 27/10/16 05:02 PM
// Proyecto       : newliberty
// Descripcion    :
//----------------------------------------------------------
$strPageTitle = 'Consulta de la Guía';
require(__YAMAGUCHI__APP_INCLUDES__ . '/header.inc.php');
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
        <?php $this->btnEditGuia->Render(); ?>
        <?php //$this->btnImprGuia->Render(); ?>
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
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.6em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 0.5em">
            <div class="col-md-6" style="padding: 0.1em">
                <div class="titulo">Información del Remitente</div>
            </div>
            <div class="col-md-6" style="padding: 0.1em">
                <div class="titulo">Información del Destinatario</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php include('info_remitente.tpl.php') ?>
            </div>
            <div class="col-md-6">
                <?php include('info_destinatario.tpl.php') ?>
            </div>
        </div>
        <div class="row" style="margin-top: 0.5em">
            <div class="col-md-6" style="padding: 0.1em">
                <div class="titulo">Información del Envío</div>
            </div>
            <div class="col-md-6" style="padding: 0.1em">
                <div class="titulo">Costos del Servicio</div>
            </div>
        </div>
        <div class="row">
            <!-- ----------------------------- -->
            <!-- Lado izquierdo del formulario -->
            <!-- ----------------------------- -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <div class="titulo-c">Nro Guía</div>
                    </div>
                    <div class="col-md-5">
                        <?php $this->lblNumeGuia->Render(); ?>
                    </div>
                    <div class="col-md-2">
                        <div class="titulo-c">Fecha</div>
                    </div>
                    <div class="col-md-3">
                        <?php $this->lblFechGuia->Render(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="titulo-c">Contenido</div>
                    </div>
                    <div class="col-md-5">
                        <?php $this->lblDescCont->Render(); ?>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="titulo-c">Piezas/Peso</div>
                    </div>
                    <div class="col-md-5">
                        <?php $this->lblCantPiez->Render(); ?>
                    </div>
                    <div class="col-md-2">
                        <div class="titulo-c">S. Import</div>
                    </div>
                    <div class="col-md-3">
                        <?php $this->lblServImpo->Render(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="titulo-c">V. Decl.</div>
                    </div>
                    <div class="col-md-5">
                        <?php $this->lblValoDecl->Render(); ?>
                    </div>
                    <div class="col-md-2">
                        <div class="titulo-c">Entreg. A</div>
                    </div>
                    <div class="col-md-3">
                        <?php $this->lblPersEntr->Render(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="titulo-c">Observación</div>
                    </div>
                    <div class="col-md-5">
                        <?php $this->lblTextObse->Render(); ?>
                    </div>
                    <div class="col-md-2">
                        <div class="titulo-c">F./H.Entreg.</div>
                    </div>
                    <div class="col-md-3">
                        <?php $this->lblFechEntr->Render(); ?>
                    </div>
                </div>
            </div>
            <!-- --------------------------- -->
            <!-- Lado derecho del formulario -->
            <!-- --------------------------- -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <?php include('costos_envio.tpl.php') ?>
                    </div>
                    <div class="col-md-6">
                        <?php $this->dtgConcGuia->Render(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 0.5em">
            <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                <div class="titulo">Gestion Operativa</div>
            </div>
            <div class="col-md-6" style="padding: 0.1em">
                <div class="titulo">Piezas de la Guia</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="padding: 0.1em">
                <?php $this->dtgGuiaCkpt->Render(); ?>
            </div>
            <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                <div class="table-responsive">
                    <?php $this->dtgPiezGuia->Render(); ?>
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
    .titulo-c {
        font-weight: bold;
        padding: 0.3em;
        text-align: right;
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
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
