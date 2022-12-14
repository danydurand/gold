<?php
	// This is the HTML template include file (.tpl.php) for the clientes_retail_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'ClientesRetail' . ' - ' . $this->mctClientesRetail->TitleVerb;
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
            <div class="col-md-5">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->txtCedulaRif->RenderWithName(); ?>
                <?php $this->txtNombre->RenderWithName(); ?>
                <?php $this->txtSexo->RenderWithName(); ?>
                <?php $this->lstSucursal->RenderWithName(); ?>
                <?php $this->txtEmail->RenderWithName(); ?>
                <?php $this->txtTelefonoFijo->RenderWithName(); ?>
            </div>
            <div class="col-md-5">
				<?php $this->txtTelefonoMovil->RenderWithName(); ?>
				<?php $this->txtDireccion->RenderWithName(); ?>
				<?php $this->txtEstado->RenderWithName(); ?>
				<?php $this->txtCiudad->RenderWithName(); ?>
				<?php $this->txtCodigoPostal->RenderWithName(); ?>
				<?php $this->calFechaNacimiento->RenderWithName(); ?>
				<?php $this->lstProfesion->RenderWithName(); ?>
	        </div>
        </div>
    </div>
</div>
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
                    intro: "Estamos trabajando en la documentaci??n de este formulario !!!"
                }
                //{
                //    element: '#',
                //    intro: "Aqu?? podr?? Cambiar su Clave de Acceso, as?? como acceder al su Historial de Acciones en el Sistema"
                //},
                //{
                //    element: '#',
                //    intro: "Presione aqu?? para volver a la pantalla principal en cualquier momento"
                //}
            ]
        });

        intro.start();
    }
</script>

<?php require('inc/footer.inc.php'); ?>