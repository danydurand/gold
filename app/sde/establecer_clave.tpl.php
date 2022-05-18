<?php
$strPageTitle = QApplication::Translate('Establecer Clave');
require(__APP_INCLUDES__ . '/header.inc.php');
?>

<div class="titulo-formulario">
    <div class="col-xs-3 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 1em;">
                <div id="spinner" style="text-align: center; margin-bottom: 1em"><?php $this->objDefaultWaitIcon->Render(); ?></div>
                <?php $this->txtNuevClav->RenderWithName(); ?>
                <?php $this->txtConfClav->RenderWithName(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 2em">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-body" style="text-align: left; padding-left: 0px">
                        <ul>
                            <li class="text-info">
                                Este formulario le permite asignar una <i>Contraseña Específica</i> al Usuario <b><?= $this->strLogiUsua ?></b>.
                            </li>
                            <li class="text-info">
                                Es una clave temporal que el Usuario deberá cambiar tan pronto como acceda al Sistema nuevamente.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>


