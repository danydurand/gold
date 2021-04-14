<?php
// This is the HTML template include file (.tpl.php) for the sodexo_input_list.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of this directory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Lista de Guías Sodexo';
require(__APP_INCLUDES__ . '/header.inc.php');
require(__APP_INCLUDES__ . '/botonera_list.inc.php');
?>
    <!-- Contenido del Body -->
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row" style="padding-top: .5em; padding-bottom: .5em;">
                <div class="col-lg-1 visible-lg"></div>
                <div class="col-md-6 col-lg-5">
                    <?php $this->txtCodiTurp->RenderWithName(); ?>
                    <?php $this->txtGuiaSode->RenderWithName(); ?>
                    <?php $this->calFechDesp->RenderWithName(); ?>
                    <?php $this->txtEstaSode->RenderWithName(); ?>
                    <?php $this->txtRegiPorx->RenderWithName(); ?>
                </div>
                <div class="col-md-6 col-lg-5">
                    <?php $this->calFechRegi->RenderWithName(); ?>
                    <?php $this->txtGuiaIdxx->RenderWithName(); ?>
                    <?php $this->calFechProc->RenderWithName(); ?>
                    <?php $this->txtProcPorx->RenderWithName(); ?>
                    <?php $this->rdbCierCicl->RenderWithName(); ?>
                    <div class="col-md-5"></div>
                    <div class="col-md-5">
                        <?php $this->btnBuscRegi->Render() ?>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="col-lg-1 visible-lg"></div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <?php $this->dtgSodexoInputs->Render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>