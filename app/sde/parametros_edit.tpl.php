<?php
	// This is the HTML template include file (.tpl.php) for the parametros_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Parametros' . ' - ' . $this->mctParametros->TitleVerb;
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
                <?php $this->txtIndice->RenderWithName(); ?>
                <?php $this->txtCodigo->RenderWithName(); ?>
                <?php $this->txtDescripcion->RenderWithName(); ?>
                <?php $this->txtTexto1->RenderWithName(); ?>
                <?php $this->txtTexto2->RenderWithName(); ?>
                <?php $this->txtTexto3->RenderWithName(); ?>
                <?php $this->txtTexto4->RenderWithName(); ?>
            </div>
            <div class="col-md-5">
				<?php $this->txtTexto5->RenderWithName(); ?>
				<?php $this->txtValor1->RenderWithName(); ?>
				<?php $this->txtValor2->RenderWithName(); ?>
				<?php $this->txtValor3->RenderWithName(); ?>
				<?php $this->txtValor4->RenderWithName(); ?>
				<?php $this->txtValor5->RenderWithName(); ?>
				<?php //$this->lblCreatedAt->RenderWithName(); ?>
				<?php //$this->lblUpdatedAt->RenderWithName(); ?>
				<?php //$this->lblDeletedAt->RenderWithName(); ?>
				<?php $this->lblCreatedBy->RenderWithName(); ?>
				<?php $this->lblUpdatedBy->RenderWithName(); ?>
				<?php //$this->txtDeletedBy->RenderWithName(); ?>
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
                    intro: "Este formulario permite Crear/Editar un Parámetro !!!"
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