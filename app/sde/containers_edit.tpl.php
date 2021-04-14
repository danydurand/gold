<?php
//-----------------------------------------------------------------------------
// Realizado por  : Daniel Durand
// Fecha Elab.    : 17/03/2021
//-----------------------------------------------------------------------------
$strPageTitle = 'Containers' . ' - ' . $this->mctContainers->TitleVerb;
require(__APP_INCLUDES__ . '/header.inc.php');
require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->txtNumero->RenderWithName(); ?>
                <?php $this->lstOperacion->RenderWithName(); ?>
            </div>
            <div class="col-md-4">
                <?php $this->calFecha->RenderWithName(); ?>
                <?php $this->txtHora->RenderWithName(); ?>
                <?php $this->txtEstatus->RenderWithName(); ?>
	        </div>
        </div>
        <div class="row" style="margin-top: 1em">
            <div class="col-md-6">
                <div class="titulo">Piezas Contenidas</div>
            </div>
            <div class="col-md-6">
                <div class="titulo">Checkpoints del Containers</div>
            </div>
        </div>
        <div class="row" style="margin-top: .2em">
            <div class="col-sm-6">
                <?php $this->dtgPiezCont->Render(); ?>
            </div>
            <div class="col-sm-6">
                <?php $this->dtgCkptCont->Render(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Estilos de la Página -->
<style>
    .titulo {
        background-color: #CCCCCC;
        border-radius: 3px;
        font-weight: bold;
        padding: 0.2em;
        text-align: center;
    }
</style>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>