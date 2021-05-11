<?php
$strPageTitle = QApplication::Translate('Sacar a Ruta');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>&nbsp;&nbsp;<?php $this->objDefaultWaitIcon->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-7 col-lg-7" style="text-align:left; margin-top: -0.25em; margin-left: 4em">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnRepoMani->Render() ?>
            <?php $this->btnRepoErro->Render() ?>
            <?php $this->btnGestChve->Render() ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 1em;">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6 title">Tipo de Operación</div>
                        <div class="col-md-6 title">BL o AWB</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><?php $this->lstTipoOper->Render(); ?></div>
                        <div class="col-md-6"><?php $this->txtNumeAwbx->Render(); ?></div>
                    </div>
                    <div class="title">Operaciones</div>
                    <?php $this->lstOperAbie->Render(); ?>
                    <div class="title">Transportista</div>
                    <?php $this->lstEmprTran->Render(); ?>
                    <div class="row">
                        <div class="col-md-6 title">Chofer</div>
                        <div class="col-md-6 title">Cédula</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><?php $this->txtNombChof->Render(); ?></div>
                        <div class="col-md-6"><?php $this->txtCeduChof->Render(); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 title">Vehículo</div>
                        <div class="col-md-6 title">Placa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><?php $this->txtDescVehi->Render(); ?></div>
                        <div class="col-md-6"><?php $this->txtPlacVehi->Render(); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 title">Precinto Trasero</div>
                        <div class="col-md-6 title">Precinto Lateral</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><?php $this->txtNumeCont->Render(); ?></div>
                        <div class="col-md-6"><?php $this->txtPrecLate->Render(); ?></div>
                    </div>
                    <div class="title">Dirección de Entrega</div>
                    <?php $this->txtDireEntr->Render(); ?>
                    <div class="title">Descripción del Contenido</div>
                    <?php $this->txtDescCont->Render(); ?>
                </div>
                <?php if ($this->blnGestChve) { ?>
                    <?php include('partials/gestion_chve.tpl.php') ?>
                <?php } else { ?>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="title">Guías o Valijas</div>
                                <?php $this->txtListNume->Render(); ?>
                            </div>
                            <div class="col-md-9">
                                <div class="title">Piezas Aptas para Manifestar</div>
                                <?php $this->dtgPiezApta->Render(); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title">Piezas Manifestadas</div>
                                <?php $this->dtgPiezMani->Render(); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 1em;">
                    <?php $this->dlgMensUsua->Render() ?>
                </div>
            </div>
        </div>
    </div>
    <style>
        .title {
            font-weight: bold;
        }
        .list_title {
            font-weight: bold;
            margin-bottom: .3em;
            margin-top: .3em;
        }
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            font-weight: bold;
            padding: 0.4em;
            text-align: center;
        }
        .renderWithName {
            padding: 0px 0;
            width: 100%;
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
                        intro: "En este formulario, Usted puede Despachar la Mercancía hacia su destino final"
                    },
                    {
                        element: '#c8',
                        intro: "Seleccione el Tipo de Operacion"
                        // position: 'up'
                    }
                    //{
                    //    element: '#fbypers',
                    //    intro: "{{__('You can filter the KPIs by Perspective. Choose one of them and press the Filter button')}}",
                    //    // position: 'right'
                    //},
                    //{
                    //    element: '#fbyobj',
                    //    intro: "{{__('You can filter the KPIs by Objective. Choose one of them and press the Filter button')}}",
                    //    // position: 'right'
                    //},
                    //{
                    //    element: '#fbyres',
                    //    intro: "{{__('You can filter the KPIs by Responsable. Choose one of them and press the Filter button')}}",
                    //    // position: 'right'
                    //},
                    //{
                    //    element: '#fbytype',
                    //    intro: "{{__('You can filter the KPIs by Type. Choose one of them and press the Filter button')}}",
                    //    // position: 'right'
                    //},
                    //{
                    //    element: '#filter',
                    //    intro: "{{__('Press this button to apply the Filter')}}",
                    //    // position: 'right'
                    //},
                ]
            });

            intro.start();
        }
    </script>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>