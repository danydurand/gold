<?php
	// This is the HTML template include file (.tpl.php) for the guia_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('AR sin OK +48 Hrs');
	require(__INCLUDES__ . '/header.inc.php');
	require(__INCLUDES__ . '/menuopci.inc.php');
?>

<?php $this->RenderBegin() ?>
	
<div id="formulario">

<table width="100%" border="0" align="center" cellpadding="2">
	<th colspan="3" class="boxtitle"><?php $this->lblTituForm->Render(); ?></th>
</table>
<table width="100%" border="0" align="center" cellpadding="2">
	<tr>
		<td colspan="3" class="boxtitle"><?php $this->lblMensUsua->Render(); ?></td>
	</tr>
</table>

		<?php //$this->dttFechDhoy->RenderDesigned(); ?>
		<?php $this->lstCodiEsta->RenderDesigned(); ?>

<center>
<p>
<?php $this->btnExpoPdfx->Render() ?>
&nbsp;&nbsp;&nbsp;
<?php $this->btnCancel->Render() ?>
&nbsp;&nbsp;&nbsp;

<?php $this->RenderEnd() ?>	

<?php require('../util/includes/footer.tpl.php'); ?>