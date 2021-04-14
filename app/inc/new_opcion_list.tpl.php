<?php
// This is the HTML template include file (.tpl.php) for the new_opcion_list.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of this directory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Opciones';
require(__APP_INCLUDES__ . '/header.inc.php');
?>

<div class="titulo-formulario">
    <div class="col-md-4 col-lg-4" style="text-align: left">
        <?php $this->lblNotiUsua->Render(); ?>
    </div>
    <div class="col-md-4 col-lg-4">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="col-md-4 col-lg-4" style="text-align: right">
        <?php $this->lblMensUsua->Render(); ?>
    </div>
</div>
<div style="color:#fff; margin-top:.25em">
    <?php $this->btnCreaRegi->Render(); ?>
</div>
<div class="table-responsive">
    <?php $this->dtgNewOpcions->Render(); ?>
</div>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>