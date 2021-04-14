<?php
/**
 * Created by PhpStorm.
 * User: ianzola
 * Date: 03/05/17
 * Time: 12:14 PM
 */
$strPageTitle = 'Modal Test';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-3 col-lg-4" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-8 col-lg-8" style="text-align: left; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <?php //$this->lblPopuModa->Render(); ?>
        <?php $this->dlgPopuModa->Render(); ?>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
