<?php
$strPageTitle = QApplication::Translate($_SESSION['NombSist']);

require('inc/header.inc.php');
?>
<div class="formulario_consulta">
    <div class="row">
        <div class="col-md-12">
            <div class="hidden-xs hidden-sm hidden-md">
                <h2 class="page-header">Bienvenid@ al Sistema <strong>Retail</strong>
                    <small style="font-size: .5em">By Lufeman Software, C.A.</small></h2>
            </div>
            <div class="visible-xs visible-sm visible-md">
                <h2 class="page-header">Bienvenid@ al Sistema <strong>Retail</strong>
                    <small style="font-size: .5em">By Lufeman Software, C.A.</small></h2>
            </div>
            <p class="lead">
                Ultimo Acceso: <small style="font-size: .7em"><?= $objUsuaCone->FechAcce->__toString("YYYY-MM-DD") ?></small><br>
            </p>
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

    .well {
        font-size: 16px;
    }

</style>

<?php require('inc/footer.inc.php'); ?>

