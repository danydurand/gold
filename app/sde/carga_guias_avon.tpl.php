<?php
//-----------------------------------------------------------------------------
// Programa       : carga_guias_avon.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 13/10/16 03:07 PM
// Proyecto       : newliberty
// Descripcion    : Este programa es el encargado de cargar guías del cliente
//                  Avon masivamente, a través de un archivo plano.
//-----------------------------------------------------------------------------
$strPageTitle = QApplication::Translate('Carga de Guías AVON');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-8 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnImpoGuia->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnAjusGuia->Render(); ?>
            <?php $this->btnErroProc->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 0.8em">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <?php $this->txtCargArch->RenderWithName(); ?>
                    <?php $this->lblNumeCarg->RenderWithName(); ?>
                    <?php $this->lblNumePend->RenderWithName(); ?>
                    <?php $this->lblNumeAjus->RenderWithName(); ?>
                    <?php $this->lblNumeProc->RenderWithName(); ?>
                    <?php $this->lblNumeErro->RenderWithName(); ?>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row" style="margin-top: 0.5em;">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="text-align: left">
                            Estructura del Archivo y sus Datos
                        </div>
                        <div class="panel-body" style="text-align: left; padding-left: 0px">
                            <ul>
                                <li class="text-info">
                                    Se espera un archivo plano con extensión ".txt", representativo de un
                                    lote de guías del Cliente AVON.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>