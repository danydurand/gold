<?php
//----------------------------------------------------------
// Programa       : desactivar_cliente.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 23/09/16 09:26 AM
// Proyecto       : newliberty
// Descripcion    :
//----------------------------------------------------------
$strPageTitle = 'Eliminar Clientes';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="margin-top: 1em;"></div>
                <div class="col-md-4" style="margin-top: 1em;">
                    <span class="etiqueta">Cliente(s) a Eliminar</span><br>
                    <?php $this->txtCodiClie->RenderWithError(); ?>
                    <br>
                    <span class="etiqueta">Motivo de Eliminación</span><br>
                    <?php $this->lstMotiElim->RenderWithError(); ?>
                </div>
                <div class="col-md-4" style="margin-top: 1em;"></div>
            </div>
        </div>
    </div>
    <style>
        .etiqueta {
            font-weight: bold;
        }
    </style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>