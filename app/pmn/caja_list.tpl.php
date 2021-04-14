<?php
// This is the HTML template include file (.tpl.php) for the new_opcion_list.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of this directory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Lista de Cajas';
require(__APP_INCLUDES__ . '/header.inc.php');
require(__APP_INCLUDES__ . '/botonera_list.inc.php');
?>
    <div class="table-responsive">
        <?php $this->dtgCajas->Render(); ?>
    </div>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>