<?php
	// This is the HTML template include file (.tpl.php) for the facturas_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Factura' . ' - ' . $this->mctFacturas->TitleVerb;
	require('inc/header.inc.php');
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
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnDelete->Render(); ?>
        <?php //$this->btnVerxPago->Render(); ?>
        <?php $this->btnMasxAcci->Render(); ?>
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
        <?php //$this->btnNuevSmal->Render(); ?>
        <?php $this->btnGuarSmal->Render(); ?>
        <?php $this->btnBorrSmal->Render(); ?>
        <?php //$this->btnHistSmal->Render(); ?>
    </div>
    <div class="col-xs-3 col-md-4 hidden-lg pull-right" style="text-align: right; padding-right: 3px; margin-top: -1.99em">
        <?php $this->btnPrimSmal->Render(); ?>
        <?php $this->btnAnteSmal->Render(); ?>
        <?php $this->btnProxSmal->Render(); ?>
        <?php $this->btnUltiSmal->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid" data-aos="fade-in">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-6">
                <div class="row">
                    <div class="titulo">Pre-Factura y Datos Fiscales</div>
                </div>
                <?php if (!$this->blnVerxPago) { ?>
                <?php include('partials/prefac_datos_fiscales.tpl.php'); ?>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="titulo">Retenciones</div>
                </div>
                <?php if (!$this->blnVerxPago) { ?>
                <div class="row">
                    <?php $this->chkTieneRetencion->RenderWithName(); ?>
                </div>
                <?php } ?>
	        </div>
        </div>
        <div class="row" style="margin-top: .3em">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titulo">Guias Facturadas</div>
                        <?php $this->dtgGuiaFact->Render(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titulo">Importes</div>
                        <?php $this->dtgImpoFact->Render(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titulo">Cobro</div>
                    </div>
                </div>
                <?php include('partials/resumen_cobro_tabla.tpl.php'); ?>
            </div>
        </div>
        <?php if ($this->blnVerxPago) { ?>
            <div class="row" style="margin-top: .3em">
                <div class="col-md-12">
                    <div class="titulo"><?php $this->lblTituPago->Render() ?></div>
                </div>
            </div>
            <?php if ($this->blnMostCamp) { ?>
            <div class="row">
                <div class="col-md-12">
                    <?php include('partials/campos_del_pago_tabla.tpl.php'); ?>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <?php $this->dtgPagoFact->Render(); ?>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
<style>
    .etiqueta {
        font-weight: bold;
    }
    .titulo {
        background-color: #CCCCCC;
        border-radius: 3px;
        font-weight: bold;
        padding: 0.2em;
        text-align: center;
        margin-bottom: .1em;
    }
</style>
<script type="text/javascript">
    function startIntro(){
        var intro = introJs();
        intro.setOptions({
            nextLabel: "Next",
            prevLabel: "Prev",
            skipLabel: "Skip",
            doneLabel: "Done",
            steps: [
                {
                    intro: "Estamos trabajando en la documentación de este formulario !!!"
                }
                //{
                //    element: '#',
                //    intro: "Aquí podrá Cambiar su Clave de Acceso, así como acceder al su Historial de Acciones en el Sistema"
                //},
                //{
                //    element: '#',
                //    intro: "Presione aquí para volver a la pantalla principal en cualquier momento"
                //}
            ]
        });

        intro.start();
    }
</script>

<?php require('inc/footer.inc.php'); ?>