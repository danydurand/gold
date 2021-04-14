<?php
$strPageTitle = QApplication::Translate('Ajustar Consecutivo');
require(__APP_INCLUDES__ . '/header.inc.php');
?>

<div class="titulo-formulario">
    <div class="col-xs-4 col-md-4 col-lg-4 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnPropSecu->Render(); ?>
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
                <?php $this->txtSecuActu->RenderWithName(); ?>
                <?php $this->txtSecuProp->RenderWithName(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 2em">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="well">
                    El uso (manual) indiscriminado de números de guias trajo como consecuencia el
                    uso de mecanismos de validación que resultaron muy costos en terminos de tiempo.
                    Para solventar la lentitud del Sistema, se eliminó el mecanismo de validación pero quedamos
                    expuestos a "choques" entre los datos existentes y los asignados por el Sistema.
                    Este programa ajusta el consecutivo del nro de guía asignado por el Sistema,
                    colocando en la tabla generadora un número de guía más alto en la secuencia.
                </div>
            </div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>


