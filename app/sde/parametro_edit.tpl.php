<?php
// This is the HTML template include file (.tpl.php) for the parametro_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = $this->mctParametro->TitleVerb.' Parámetro';
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
                <div class="col-md-6" style="margin-top: 1em;">
                    <?php $this->txtIndiPara->RenderWithName(); ?>
                    <?php $this->txtCodiPara->RenderWithName(); ?>
                    <?php $this->txtDescPara->RenderWithName(); ?>
                    <?php $this->txtParaTxt1->RenderWithName(); ?>
                    <?php $this->txtParaTxt2->RenderWithName(); ?>
                    <?php $this->txtParaTxt3->RenderWithName(); ?>
                </div>
                <div class="col-md-6" style="margin-top: 1em;">
                    <?php $this->txtParaTxt4->RenderWithName(); ?>
                    <?php $this->txtParaTxt5->RenderWithName(); ?>
    				<?php $this->txtParaVal1->RenderWithName(); ?>
    				<?php $this->txtParaVal2->RenderWithName(); ?>
    				<?php $this->txtParaVal3->RenderWithName(); ?>
    				<?php $this->txtParaVal4->RenderWithName(); ?>
    				<?php $this->txtParaVal5->RenderWithName(); ?>
    	        </div>
            </div>
        </div>
    </div>
    <!-- Estilos de la Página -->
    <style>
        .form-name {
            width: 30%;
        }
    </style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>