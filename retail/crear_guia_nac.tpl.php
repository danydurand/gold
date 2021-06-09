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
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnNextPage->Render(); ?>
            <?php $this->btnPrevPage->Render(); ?>
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
            <?php if ($this->blnVerpUnox) { ?>
            <div class="row" style="margin-top: 0.5em; line-height: 0.5em">
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Remitente</div>
                </div>
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Informacion del Servicio</div>
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
            <?php } ?>
            <?php if (!$this->blnVerpUnox) { ?>
            <div class="row" style="margin-top: 0.5em; line-height: 0.5em">
                <div class="col-md-6" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Información del Envío</div>
                </div>
                <div class="col-md-3" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Costos del Servicio</div>
                </div>
                <div class="col-md-3" style="border-radius: 3px; padding: 0.1em">
                    <div class="titulo">Facturación</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="margin-top: 0.5em;">
                    <?php include('info_envio.tpl.php') ?>
                </div>
                <div class="col-md-3" style="margin-top: 0.5em;">
                    <?php include('info_servicio.tpl.php') ?>
                </div>
                <div class="col-md-3" style="margin-top: 0.5em;">
                    <?php include('info_facturacion.tpl.php') ?>
                </div>
            </div>
            <?php } ?>
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
            line-height: 0.9;
        }
        .form-name {
            width: 31%;
        }
        .form-field {
            width: 55%;
        }
    </style>

<?php require('inc/footer.inc.php'); ?>