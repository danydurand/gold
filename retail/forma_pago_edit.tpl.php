<?php
	// This is the HTML template include file (.tpl.php) for the forma_pago_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'FormaPago' . ' - ' . $this->mctFormaPago->TitleVerb;
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
            <div class="col-md-12">
            <?php $this->lblId->RenderWithName(); ?>
				<?php $this->txtDescripcion->RenderWithName(); ?>
				<?php $this->lstStatus->RenderWithName(); ?>
				<?php $this->lstRequiereDocumentoObject->RenderWithName(); ?>
				<?php $this->txtTextoDocumento->RenderWithName(); ?>
				<?php $this->lstRequiereCuentaObject->RenderWithName(); ?>
				<?php $this->txtAbreviado->RenderWithName(); ?>
				<?php $this->txtParaPagoEn->RenderWithName(); ?>
				<?php //$this->lblCreatedAt->RenderWithName(); ?>
				<?php //$this->lblUpdatedAt->RenderWithName(); ?>
				<?php //$this->lblDeletedAt->RenderWithName(); ?>
				<?php //$this->txtCreatedBy->RenderWithName(); ?>
				<?php //$this->txtUpdatedBy->RenderWithName(); ?>
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
                    intro: "Estamos trabajando en la documentaci√≥n de este formulario !!!"
                }
                //{
                //    element: '#',
                //    intro: "Aqu√≠ podr√° Cambiar su Clave de Acceso, as√≠ como acceder al su Historial de Acciones en el Sistema"
                //},
                //{
                //    element: '#',
                //    intro: "Presione aqu√≠ para volver a la pantalla principal en cualquier momento"
                //}
            ]
        });

        intro.start();
    }
</script>

<?php require('inc/footer.inc.php'); ?>