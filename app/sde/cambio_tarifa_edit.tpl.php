<?php
	// This is the HTML template include file (.tpl.php) for the cambio_tarifa_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Cambio de Tarifa' . ' - ' . $this->mctCambioTarifa->TitleVerb;
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
        <div class="hidden-xs hidden-sm col-md-8 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnVolvList->Render(); ?>
            <?php $this->btnNuevRegi->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnDelete->Render(); ?>
            <?php $this->btnLogxCamb->Render(); ?>
            <?php $this->btnListCamb->Render(); ?>
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
            <div class="row" style=" margin-top: 1em;">
                <div class="col-md-6">
                    <?php //$this->lblId->RenderWithName(); ?>
                    <?php $this->lstTarifaOrigen->RenderWithName(); ?>
                    <?php $this->lstTarifaDestino->RenderWithName(); ?>
                    <?php $this->txtExcluir->RenderWithName(); ?>
                </div>
                <div class="col-md-4">
                    <?php $this->calEjecutarEl->RenderWithName(); ?>
                    <?php $this->calRegistradoEl->RenderWithName(); ?>
                    <?php $this->txtRegistradoPor->RenderWithName(); ?>
                    <?php $this->calEjecutadoEl->RenderWithName(); ?>
                    <?php $this->calHoraEjecucion->RenderWithName(); ?>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" style="margin-top: 1em">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="titulo">Comentario/Resultado</div>
                    <?php $this->txtComentario->Render(); ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <style>
        .titulo {
            background-color: #CCC;
            border-radius: 3px;
            font-weight: bold;
            text-align: left;
            padding: 0.5em;
        }
    </style>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>