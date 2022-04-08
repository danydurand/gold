<?php
//-----------------------------------------------------------------------------
// Programa       : guia_invalida.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 12/09/2017
// Proyecto       : newliberty
// Descripción    :
//-----------------------------------------------------------------------------
$strPageTitle = 'Guía Invalida';
require('inc/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
        </div>
        <div class="hidden-sm col-md-3 col-lg-4"></div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php //$this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 2em; font-size:35px; min-height:120px; text-align: center;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>