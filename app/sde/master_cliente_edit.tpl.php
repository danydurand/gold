<?php
// This is the HTML template include file (.tpl.php) for the master_cliente_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Crear/Editar Cliente';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
	<div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
			<?php $this->lblTituForm->Render(); ?>
		</div>
		<div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="margin-top: -0.25em; text-align: center">
			<?php $this->btnCancel->Render(); ?>
			<?php $this->btnNuevClie->Render(); ?>
			<?php $this->btnSave->Render(); ?>
			<?php $this->btnDelete->Render(); ?>
			<?php $this->btnRecuClie->Render(); ?>
			<?php $this->btnCargMasi->Render(); ?>
			<?php $this->btnMasxAcci->Render(); ?>
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
	<div class="form-controls">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
					<?php $this->lblMensUsua->Render(); ?>
				</div>
			</div>
			<div class="row" style="margin-top: 0.5em;" >
				<div class="" role="tabpanel">
					<ul class="nav nav-tabs tab-l nav-justified" role="tablist">
						<li class="active" role="presentation">
							<a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">
								<i class="fa fa-user fa-lg"></i>
								  Cliente <?php echo $this->intRankClie ?>

                            </a>
						</li>
						<li class="tabs-guias" role="presentation">
							<a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">
								<i class="fa fa-commenting-o fa-lg"></i>
								  Información Adicional
                            </a>
						</li>
						<!--<li class="tabs-guias" role="presentation">-->
						<!--	<a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab">-->
						<!--		<i class="fa fa-bookmark fa-lg"></i>-->
						<!--		  Estadísticas/Dsctos-->
                         <!--   </a>-->
						<!--</li>-->
						<li class="tabs-guias" role="presentation">
							<a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">
								<i class="fa fa-cogs fa-lg"></i>
								  Configuración
                            </a>
						</li>
						<li class="tabs-guias" role="presentation">
							<a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab">
								<i class="fa fa-book fa-lg"></i>
								  Sub-Cuentas (<?= $this->intCantSubc ?>)
                            </a>
						</li>
						<li class="tabs-guias" role="presentation">
							<a href="#seccion6" aria-controls="seccion6" data-toggle="tab" role="tab">
								<i class="fa fa-chart fa-lg"></i>
								  Gráficos
                            </a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" role="tabpanel" id="seccion1">
							<div class="media">
								<div class="media-body"><br>
									<div class="col-md-6">
										<?php $this->txtCodiInte->RenderWithName(); ?>
										<?php $this->chkEsunSubc->RenderWithName(); ?>
										<?php $this->txtBuscCodi->RenderWithName(); ?>
										<?php $this->txtNombBusc->RenderWithName(); ?>
										<?php $this->lstCodiDepe->RenderWithName(); ?>
										<?php $this->txtNombClie->RenderWithName(); ?>
										<?php $this->chkCodiEsta->RenderWithName(); ?>
										<?php $this->lstCodiEsta->RenderWithName(); ?>
										<?php $this->txtDireFisc->RenderWithName(); ?>
										<?php $this->txtNumeDrif->RenderWithName(); ?>
									</div>
									<div class="col-md-6">
                                        <?php $this->chkVendClie->RenderWithName(); ?>
                                        <?php $this->lstVendClie->RenderWithName(); ?>
										<?php $this->txtEntrFact->RenderWithName(); ?>
										<?php $this->chkTariClie->RenderWithName(); ?>
										<?php $this->lstTariClie->RenderWithName(); ?>
										<?php $this->txtPersCona->RenderWithName(); ?>
										<?php $this->txtTeleCona->RenderWithName(); ?>
										<?php $this->txtDireMail->RenderWithName(); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" role="tabpanel" id="seccion2">
							<div class="media">
								<div class="media-body"><br>
									<div class="col-md-6">
                                        <?php $this->txtPersConb->RenderWithName(); ?>
                                        <?php $this->txtTeleConb->RenderWithName(); ?>
										<?php $this->txtDireReco->RenderWithName(); ?>
										<?php //$this->chkRutaReco->RenderWithName(); ?>
										<?php //$this->lstRutaReco->RenderWithName(); ?>
										<?php //$this->chkRutaEntr->RenderWithName(); ?>
										<?php //$this->lstRutaEntr->RenderWithName(); ?>
										<?php $this->rdbCodiStat->RenderWithName(); ?>
									</div>
                                    <div class="col-md-6">
                                        <?php $this->rdbEsxxFact->RenderWithName(); ?>
                                        <?php $this->lstTipoClie->RenderWithName(); ?>
                                        <?php //$this->txtPorcSgro->RenderWithName(); ?>
										<?php $this->rdbStatCred->RenderWithName(); ?>
										<?php //$this->txtClavSweb->RenderWithName(); ?>
										<?php //$this->txtCaduGuia->RenderWithName(); ?>
										<?php //$this->lstMostExte->RenderWithName(); ?>
										<?php //$this->chkCargMasi->RenderWithName(); ?>
										<?php $this->calFechElim->RenderWithName(); ?>
										<?php $this->txtMotiElim->RenderWithName(); ?>
									</div>
								</div>
							</div>
						</div>
						<!--<div class="tab-pane" role="tabpanel" id="seccion3">-->
						<!--	<div class="media">-->
						<!--		<div class="media-body">-->
                         <!--           <div class="row" style="margin-top: 2em;">-->
                         <!--               <div class="col-md-5">-->
                         <!--                   --><?php //$this->dtePrimGuia->RenderWithName(); ?>
                         <!--                   --><?php //$this->dteUltiGuia->RenderWithName(); ?>
                         <!--                   --><?php //$this->txtTiemEmpr->RenderWithName(); ?>
                         <!--                   --><?php //$this->txtCantGuia->RenderWithName(); ?>
                         <!--                   --><?php //$this->txtPesoTota->RenderWithName(); ?>
                         <!--                   --><?php //$this->txtVentTota->RenderWithName(); ?>
                         <!--               </div>-->
                         <!--               <div class="col-md-6">-->
                         <!--                   --><?php //$this->dtgDctoClie->RenderWithName(); ?>
                         <!--               </div>-->
                         <!--           </div>-->
						<!--		</div>-->
						<!--	</div>-->
						<!--</div>-->
						<div class="tab-pane" role="tabpanel" id="seccion4">
							<div class="media">
								<div class="media-body">
									<div class="col-md-6">
										<div class="row" style="padding: 0.1em">
											<div class="titulo">Sistema CORPorativo</div>
										</div>
										<div class="row" style="margin-top: .5em;">
											<?php $this->chkGuiaYama->RenderWithName(); ?>
											<?php $this->txtGuiaXcar->RenderWithName(); ?>
											<?php $this->chkDestFrec->RenderWithName(); ?>
											<?php $this->txtDestXcar->RenderWithName(); ?>
											<?php $this->txtDestXdia->RenderWithName(); ?>
											<?php $this->chkPagoPpdx->RenderWithName(); ?>
											<?php $this->chkPagoCrdx->RenderWithName(); ?>
											<?php $this->chkPagoCodx->RenderWithName(); ?>
											<?php //$this->chkGuiaReto->RenderWithName(); ?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row" style="padding: 0.1em">
											<div class="titulo">API (Interfaz Sistema-Sistema)</div>
										</div>
										<div class="row" style="margin-top: .5em;">
											<?php $this->chkManeApix->RenderWithName(); ?>
											<?php $this->txtUsuaApix->RenderWithName(); ?>
											<?php $this->txtPassApix->RenderWithName(); ?>
                                            <?php $this->txtGuiaXdia->RenderWithName(); ?>
										</div>
                                        <div class="row" style="padding: 0.1em">
                                            <div class="titulo">Descuentos</div>
                                        </div>
                                        <?php $this->txtDctoVolu->RenderWithName(); ?>
                                        <?php $this->txtVoluDcto->RenderWithName(); ?>
                                        <?php $this->txtDctoPeso->RenderWithName(); ?>
                                        <?php $this->txtPesoDcto->RenderWithName(); ?>
                                        <?php $this->dttDctoCadu->RenderWithName(); ?>
									</div>
								</div>
							</div>
						</div>
                        <div class="tab-pane" role="tabpanel" id="seccion5">
                            <div class="media">
                                <div class="media-body"><br>
                                    <div class="col-md-12">
                                        <?php $this->dtgSubcClie->Render(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="seccion6">
                            <div class="media">
                                <div class="media-body"><br>
                                    <div class="col-md-12">
                                        <?php
                                        $arrData = array(
                                            "chart" => array(
                                                "caption"   => "Consumo de: ".$this->txtNombClie->Text.' '.$this->intRankClie,
                                                "xAxisName" => "Meses",
                                                "yAxisName" => "Cantidad de Guías",
                                                "theme"     => "fusion"
                                            )
                                        );
                                        $arrData['categories'][] = array(
                                            'category' => [
                                                ['label' => 'Ene'],
                                                ['label' => 'Feb'],
                                                ['label' => 'Mar'],
                                                ['label' => 'Abr'],
                                                ['label' => 'May'],
                                                ['label' => 'Jun'],
                                                ['label' => 'Jul'],
                                                ['label' => 'Ago'],
                                                ['label' => 'Sep'],
                                                ['label' => 'Oct'],
                                                ['label' => 'Nov'],
                                                ['label' => 'Dic']
                                            ]
                                        );
                                        $arrData['dataset'] = $this->arrDataGraf;

                                        // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
                                        $jsonEncodedData = json_encode($arrData);
                                        //echo $jsonEncodedData;

                                        // chart object
                                        $Chart = new FusionCharts("msline", "MyFirstChart" , "700", "370", "chart-container", "json", $jsonEncodedData);

                                        // Render the chart
                                        $Chart->render();
                                        ?>
                                        <center>
                                            <div id="chart-container">Chart will render here!</div>
                                        </center>
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
		.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
			background-color: #4682B4;
		}

		.nav-tabs > li > a {
			color: #4682B4;
		}
		.titulo {
			background-color: #CCCCCC;
			border-radius: 3px;
			font-weight: bold;
			padding: 0.4em;
			text-align: center;
		}
        .form-label {
            padding: 0px;
        }
        .form-name {
            width: 44%;
            padding-right: 10px;
        }
        .form-field {
            width: 56%;
            padding: 1.4px;
        }
	</style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>