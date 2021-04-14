<?php
	// This is the HTML template include file (.tpl.php) for the parametro_list.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Parametro';
	require(__APP_INCLUDES__ . '/header.inc.php');
?>

	<div class="titulo-formulario">
		<div class="col-md-5" style="text-align:left">
			<?php $this->lblNotiUsua->Render(); ?>
		</div>
		<div class="col-md-2" style="text-align:center">
			<?php $this->lblTituForm->Render(); ?>
		</div>
		<div class="col-md-5" style="text-align:right">
			<?php $this->lblMensUsua->Render(); ?>
		</div>
	</div>
	<a href="parametro_edit.php" class="btn btn-primary" style="color:#fff; margin-top:.25em"><i class="fa fa-plus-circle fa-lg"></i> <?php _t('Crear'); ?></a>
	<br>
	<?php $this->dtgParametros->Render(); ?>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>
