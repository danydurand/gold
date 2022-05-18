<?php
	// This is the HTML template include file (.tpl.php) for the tarifa_exp_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'TarifaExp' . ' - ' . $this->mctTarifaExp->TitleVerb;
    require(__APP_INCLUDES__ . '/header.inc.php');
    require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid" data-aos="fade-in">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em;">
            <div class="col-md-5">
                <?php $this->lblId->RenderWithName(); ?>
				<?php $this->txtNombre->RenderWithName(); ?>
				<?php $this->lstProducto->RenderWithName(); ?>
				<?php $this->chkIsPublica->RenderWithName(); ?>
				<?php $this->calFecha->RenderWithName(); ?>
<!--				--><?php //$this->txtMonto->RenderWithName(); ?>
<!--				--><?php //$this->txtMinimo->RenderWithName(); ?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($this->mctTarifaExp->EditMode) { ?>
                            <div class="row titulo">
                                <div class="col-md-3">
                                    <?php $this->lblTariDest->Render(); ?>
                                </div>
                                <div class="col-md-2">
                                    <?php $this->lblMontTari->Render(); ?>
                                </div>
                                <div class="col-md-2">
                                    <?php $this->lblMontMini->Render(); ?>
                                </div>
                                <div class="col-md-2">
                                    <?php $this->lblFechVige->Render(); ?>
                                </div>
                                <div class="col-md-3">
                                    <?php $this->lblAcciTari->Render(); ?>
                                </div>
                            </div>
                            <div class="row" style="margin-top: .3em">
                                <div class="col-md-3">
                                    <?php $this->lstTariDest->Render(); ?>
                                </div>
                                <div class="col-md-2">
                                    <?php $this->txtMontTari->Render(); ?>
                                </div>
                                <div class="col-md-2">
                                    <?php $this->txtMontMini->Render(); ?>
                                </div>
                                <div class="col-md-2">
                                    <?php $this->calFechVige->Render(); ?>
                                </div>
                                <div class="col-md-3 text-center">
                                    <?php $this->btnSaveTari->Render(); ?>
                                    <?php $this->btnDeleTari->Render(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $this->dtgTariDest->Render(); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
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
<style>
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        background-color: #4682B4;
    }
    .nav-tabs > li > a {
        color: #4682B4;
    }
    .titulo {
        background-color: #CCCCCC;
        border-radius: 3px;
        font-weight: bold;
        padding: 0.2em;
        text-align: center;
    }
    .form-label {
        padding: 0px;
    }
    .form-name {
        width: 44%;
        padding-right: 10px;
    }
    .form-field {
        width: 56%;
        padding: 1.4px;
    }
</style>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>