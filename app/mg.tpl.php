<?php
$strPageTitle = ucwords(strtolower(QApplication::Translate($_SESSION['NombSist'])));
if ($_SESSION['Sistema'] == 'sde') {
    $strDescSist = "SisCO (<strong>Sis</strong>tema de <strong>C</strong>ontrol <strong>O</strong>perativo)";
    $strPageTitle = "SisCO";
} else {
    $strDescSist = "<strong>Expreso Nacional</strong>";
    $strDescSist = "Expreso Nacional";
}
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="formulario_consulta">
        <div class="row">
            <div class="col-md-12">
                <div class="hidden-xs hidden-sm hidden-md">
                    <h2 class="page-header">
                        Bienvenid@ al <?= $strDescSist ?>
                        <small style="font-size: .5em">By Lufeman Software</small>
                    </h2>
                </div>
                <div class="visible-xs visible-sm visible-md">
                    <h2 class="page-header">Bienvenid@ al <?= $strDescSist ?>
                        <small style="font-size: .4em">By Lufeman Software, C.A.</small>
                    </h2>
                </div>
                <p class="lead">
                    <!-- Usuario: <small style="font-size: .7em"><?= $strNombUsua ?></small><br>
                    Grupo: <small style="font-size: .7em"><?= $objUsuaCone->CodiGrupObject->DescGrup ?></small><br> -->
                    Ultimo Acceso: <small style="font-size: .7em"><?= $objUsuaCone->FechAcce->__toString("YYYY-MM-DD") ?></small><br>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4" style="margin-top: 1em">
                <?php $this->lstReceOrig->RenderWithName(); ?>
            </div>
            <div class="col-md-5 col-lg-4" style="margin-top: 1em">
                <?php $this->lstCajaRece->RenderWithName(); ?>
            </div>
            <div class="col-md-12 col-lg-4" style="margin-top: 1.28em" align="center">
                <?php $this->btnSave->Render(); ?>
                <?php $this->btnPlacEdit->Render(); ?>
            </div>
        </div>
    </div>
    <style>
        /*.navbar-default {*/
            /*background: #A52422;*/
        /*}*/
        .form-name {
            width: 30%;
        }
    </style>
<?php require(__APP_INCLUDES__.'/footer.inc.php'); ?>