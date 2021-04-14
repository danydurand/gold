<?php
$strPageTitle = QApplication::Translate('Incidencias');
require(__APP_INCLUDES__ . '/header.inc.php');
?>

<div class="titulo-formulario">
    <div class="col-xs-4 col-md-4 col-lg-4 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
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
                <?php $this->txtNumeGuia->RenderWithName(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-offset-2 col-md-8" style="margin-top: 1em;">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="text-align: left">
                        Posibles Errores y sus Significados
                    </div>
                    <div class="panel-body" style="text-align: left; padding-left: 0px">
                        <ul>
                            <li class="text-info">
                                El proceso de Devolución de una Guía realiza varias validaciones, estos son sus códigos y significados:
                            </li>
                        </ul>
                        <ol>
                            <div class="col-xs-12 col-md-offset-1 col-md-10">
                                <li class="text-info">La Guía indicada No Existe</li>
                                <li class="text-info">La Guía fue Eliminada</li>
                                <li class="text-info">La Guía fue Entregada</li>
                                <li class="text-info">La Guía tiene el monto en cero (0)</li>
                                <li class="text-info">La Guía ya fue Devuelta al Remitente</li>
                                <li class="text-info">La Guía tiene como Destino una Sucursal fuera de su Rango</li>
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>


