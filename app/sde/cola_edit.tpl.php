<?php
	// This is the HTML template include file (.tpl.php) for the cola_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Cola' . ' - ' . $this->mctCola->TitleVerb;
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
            <div class="col-md-5">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->txtNombProc->RenderWithName(); ?>
                <?php $this->calFechaInicio->RenderWithName(); ?>
                <?php $this->calFechaFin->RenderWithName(); ?>
                <?php $this->chkEjecutado->RenderWithName(); ?>
            </div>
            <div class="col-md-6">
                <?php $this->txtResultado->RenderWithName(); ?>
                <?php $this->calCreatedAt->RenderWithName(); ?>
				<?php $this->calUpdatedAt->RenderWithName(); ?>
				<?php $this->lstCreatedByObject->RenderWithName(); ?>
				<?php $this->lstUpdatedByObject->RenderWithName(); ?>
	        </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <?php $this->dtgErroProc->Render(); ?>
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