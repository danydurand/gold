<?php
$strPageTitle = 'Guia NAC';
require('inc/header.inc.php');
?>

    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-8 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php //$this->btnCalcTari->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php //$this->lblBotoPopu->Render(); ?>
            <?php //$this->btnMasxAcci->Render(); ?>
            <?php //$this->btnErroProc->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="" role="tabpanel">
                    <ul class="nav nav-tabs tab-l nav-justified" role="tablist">
                        <li class="active" role="presentation">
                            <a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">
                                <i class="fa fa-user fa-lg"></i>
                                Remitente y Destinatario
                            </a>
                        </li>
                        <li class="tabs-guias" role="presentation">
                            <a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">
                                <i class="fa fa-commenting-o fa-lg"></i>
                                Información del Envío
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="seccion1">
                            <div class="row" style="margin-top: 0.5em; line-height: 0.5em">
                                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                                    <div class="titulo">Información del Envio</div>
                                </div>
                                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                                    <div class="titulo">Facturacion</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top: 0.5em;">
                                    <?php include('info_remitente.tpl.php') ?>
                                </div>
                                <div class="col-md-6" style="margin-top: 0.5em;">
                                    <?php include('info_destinatario.tpl.php') ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" role="tabpanel" id="seccion2">
                            <div class="row">
                                <div class="col-md-6" style="margin-top: 0.5em;">
                                </div>
                                <div class="col-md-6" style="margin-top: 0.5em;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css" media="all">
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            background-color: #4682B4;
        }
        .nav-tabs > li > a {
            color: #4682B4;
        }
        .etiqueta {
            font-weight: bold;
            text-align: right;
            vertical-align: middle;
        }
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            font-weight: bold;
            padding: 0.4em;
            text-align: center;
        }
        .form-controls {
            line-height: 0.8;
        }
        .form-name {
            width: 31%;
        }
        .form-field {
            width: 55%;
        }
    </style>

<?php require('inc/footer.inc.php'); ?>