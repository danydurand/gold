<?php
$strPageTitle = QApplication::Translate('Guías Borradas');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-4 col-lg-4 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-5 col-lg-3" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php //$this->btnSave->Render(); ?>
            <?php $this->btnExpoPdfx->Render() ?>
        </div>
        <div class="hidden-sm col-md-3 col-lg-5"></div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 1em;">
                    <?php $this->rdbTipoBusc->RenderWithName(); ?>      
					<?php $this->dttFechInic->RenderWithName(); ?>		
					<?php $this->dttFechFina->RenderWithName(); ?>		
					<?php $this->lstCodiEsta->RenderWithName(); ?>
                </div>
            </div>
        </div>
    </div>
    <style>
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            font-weight: bold;
            padding: 0.4em;
            text-align: center;
        }
        .renderWithName {
            padding: 0px 0;
            width: 100%;
        }
    </style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>