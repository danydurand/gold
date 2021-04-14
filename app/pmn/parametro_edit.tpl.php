<?php
	// This is the HTML template include file (.tpl.php) for the parametro_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Parametro') . ' - ' . $this->mctParametro->TitleVerb;
	require(__APP_INCLUDES__ . '/header.inc.php');
?>

	<div class="titulo-formulario">
		<div class="col-md-4 col-lg-4" style="text-align:left">
			<?php $this->lblNotiUsua->Render(); ?>
		</div>
		<div class="col-md-4 col-lg-4" style="text-align:center">
			<?php $this->lblTituForm->Render(); ?>
		</div>
		<div class="col-md-4 col-lg-4" style="text-align:right">
			<?php $this->lblMensUsua->Render(); ?>
		</div>
	</div>
	<div class="form-controls">
		<div id="row">
			<div class="col-md-1" style="text-align: left; padding: 0">
				<?php $this->btnPrimRegi->Render(); ?>
				<?php $this->btnRegiAnte->Render(); ?>
			</div>
			<div class="col-md-10"></div>
			<div class="col-md-1" style="text-align: right; padding: 0">
				<?php $this->btnProxRegi->Render(); ?>
				<?php $this->btnUltiRegi->Render(); ?>
			</div>
		</div>
		<div id="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<?php $this->txtIndiPara->RenderWithName(); ?>
				<?php $this->txtCodiPara->RenderWithName(); ?>
				<?php $this->txtDescPara->RenderWithName(); ?>
				<?php $this->txtParaTxt1->RenderWithName(); ?>
				<?php $this->txtParaTxt2->RenderWithName(); ?>
				<?php $this->txtParaTxt3->RenderWithName(); ?>
			</div>
			<div class="col-md-5">
				<?php $this->txtParaTxt4->RenderWithName(); ?>
				<?php $this->txtParaTxt5->RenderWithName(); ?>
				<?php $this->txtParaVal1->RenderWithName(); ?>
				<?php $this->txtParaVal2->RenderWithName(); ?>
				<?php $this->txtParaVal3->RenderWithName(); ?>
				<?php $this->txtParaVal4->RenderWithName(); ?>
				<?php $this->txtParaVal5->RenderWithName(); ?>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

	<div class="form-actions">
		<div class="form-save"><?php $this->btnSave->Render(); ?></div>
		<div class="form-cancel"><?php $this->btnLogxCamb->Render(); ?></div>
		<div class="form-cancel"><?php $this->btnCancel->Render(); ?></div>
		<div class="form-delete"><?php $this->btnDelete->Render(); ?></div>
	</div>
<style type="text/css">
	#container {
		text-align: center;
	}
	.form-name {
		width: 28%;
	}
	#f1, #f2 {
		display: inline-block;
		min-height: 400px;
		text-align: left;
		vertical-align: top;
		width: 45%;
	}
	#f2 {

	}
</style>


<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
