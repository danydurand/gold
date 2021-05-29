<?php
	// This is the HTML template include file (.tpl.php) for the proceso_error_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'ProcesoError' . ' - ' . $this->mctProcesoError->TitleVerb;
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
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-6">
                <?php $this->lblId->RenderWithName(); ?>
				<?php $this->txtNombre->RenderWithName(); ?>
				<?php $this->txtUsuario->RenderWithName(); ?>
				<?php $this->calFecha->RenderWithName(); ?>
				<?php $this->calHoraInicial->RenderWithName(); ?>
				<?php $this->calHoraFinal->RenderWithName(); ?>
				<?php $this->txtComentario->RenderWithName(); ?>
				<?php $this->chkNotificarAdmin->RenderWithName(); ?>
				<?php $this->chkNotificarUsuario->RenderWithName(); ?>
	        </div>
            <div class="col-md-6">
                <?php $this->dtgDetaErro->Render(); ?>
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

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>