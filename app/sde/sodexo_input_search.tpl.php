<?php
$strPageTitle = QApplication::Translate('Buscar Guía Sodexo');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- Contenido del Body -->
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 2em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5" style="margin-top: -0.1em;">
                    <?php $this->txtCodiTurp->RenderWithName(); ?>
                    <?php $this->txtGuiaSode->RenderWithName(); ?>
                    <?php $this->calFechDesp->RenderWithName(); ?>
                    <?php //$this->txtCiudSode->RenderWithName(); ?>
                    <?php $this->txtEstaSode->RenderWithName(); ?>
                    <?php $this->txtRegiPorx->RenderWithName(); ?>
                </div>
                <div class="col-md-5" style="margin-top: -0.1em;">
                    <?php $this->calFechRegi->RenderWithName(); ?>
                    <?php //$this->txtArchInpu->RenderWithName(); ?>
                    <?php $this->txtGuiaIdxx->RenderWithName(); ?>
                    <?php $this->calFechProc->RenderWithName(); ?>
                    <?php $this->txtProcPorx->RenderWithName(); ?>
                    <?php //$this->lstCierCicl->RenderWithName(); ?>
                    <?php $this->rdbCierCicl->RenderWithName(); ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>