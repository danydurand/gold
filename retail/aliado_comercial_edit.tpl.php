<?php
	// This is the HTML template include file (.tpl.php) for the aliado_comercial_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'AliadoComercial' . ' - ' . $this->mctAliadoComercial->TitleVerb;
	require('inc/header.inc.php');
	require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-6">
                <?php $this->lblId->RenderWithName(); ?>
				<?php $this->txtRazonSocial->RenderWithName(); ?>
				<?php $this->txtNroRif->RenderWithName(); ?>
				<?php $this->txtDireccionFiscal->RenderWithName(); ?>
				<?php $this->txtContacto->RenderWithName(); ?>
				<?php $this->txtTelefono->RenderWithName(); ?>
				<?php $this->txtEmail->RenderWithName(); ?>
				<?php $this->chkIsActivo->RenderWithName(); ?>
				<?php $this->lstSucursal->RenderWithName(); ?>
	        </div>
            <div class="col-md-5">
                <?php if ($this->mctAliadoComercial->EditMode) { ?>
                    <div class="row" style="margin-bottom: .2em">
                        <div class="col-md-12 text-center">
                            <?php //$this->btnAgreTari->Render(); ?>
                        </div>
                    </div>
                    <div class="row titulo">
                        <div class="col-md-4">
                            <?php $this->lblTariAlia->Render(); ?>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <?php $this->lblAcciAlia->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?php $this->lstTariAlia->Render(); ?>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4 text-center">
                            <?php $this->btnSaveTari->Render(); ?>
                            <?php $this->btnDeleTari->Render(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $this->dtgTariAlia->Render(); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<style>
    .titulo {
        background-color: #CCCCCC;
        border-radius: 3px;
        font-weight: bold;
        /*padding: 0.1em;*/
        text-align: center;
        margin-bottom: .5em;
    }
</style>
<script type="text/javascript">
    function startIntro(){
        var intro = introJs();
        intro.setOptions({
            nextLabel: "Next",
            prevLabel: "Prev",
            skipLabel: "Skip",
            doneLabel: "Done",
            steps: [
                {
                    intro: "Estamos trabajando en la documentación de este formulario !!!"
                }
                //{
                //    element: '#',
                //    intro: "Aquí podrá Cambiar su Clave de Acceso, así como acceder al su Historial de Acciones en el Sistema"
                //},
                //{
                //    element: '#',
                //    intro: "Presione aquí para volver a la pantalla principal en cualquier momento"
                //}
            ]
        });

        intro.start();
    }
</script>

<?php require('inc/footer.inc.php'); ?>