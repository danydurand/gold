<?php
	// This is the HTML template include file (.tpl.php) for the fac_tarifa_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = $this->mctFacTarifa->TitleVerb.' Tarifa';
	require(__APP_INCLUDES__ . '/header.inc.php');
	//require(__APP_INCLUDES__ . '/botonera_edit.inc.php');

    $blnMuesGrid = false;
    //if ($this->lstTipoTarifaObject->SelectedName == 'POR PESO') {
        $blnMuesGrid = true;
    //}
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <!----------------------------->
        <!-- Tamaños Mediano y Largo -->
        <!-------------------------- -->
        <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnVolvList->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnDelete->Render(); ?>
            <?php if ($blnMuesGrid) { ?>
            <?php $this->btnMasxAcci->Render(); ?>
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
            <?php if ($blnMuesGrid) { ?>
            <?php $this->btnMasxSmal->Render(); ?>
            <?php } ?>
        </div>
        <div class="col-xs-3 col-md-3 hidden-lg pull-right" style="text-align: right; padding-right: 3px; margin-top: -0.25em">
            <?php $this->btnPrimSmal->Render(); ?>
            <?php $this->btnAnteSmal->Render(); ?>
            <?php $this->btnProxSmal->Render(); ?>
            <?php $this->btnUltiSmal->Render(); ?>
        </div>
    </div>
    <!-- ################################################################################## -->
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 1em;">
                <div class="col-sm-6">
                    <?php $this->lblId->RenderWithName(); ?>
                    <?php $this->txtDescripcion->RenderWithName(); ?>
                    <?php $this->txtMedidaIncremento->RenderWithName(); ?>
                    <?php $this->txtCantClie->RenderWithName(); ?>
                    <?php $this->txtPesoInicial->RenderWithName(); ?>
                    <?php $this->txtValorIncremento->RenderWithName(); ?>
                </div>
                <div class="col-sm-6">
                    <?php if ($blnMuesGrid) { ?>
                        <div class="row" style="margin-top: 2em">
                            <div class="col-sm-10 text-center" style="margin-bottom: .3em">
                                <span class="titulo">Tarifa Nacional</span>
                                <?php $this->btnNuevNaci->Render(); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 text-center" style="margin-bottom: .3em">
                                <div class="table-responsive">
                                    <?php $this->dtgTariNaci->Render(); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
               </div>
           </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>