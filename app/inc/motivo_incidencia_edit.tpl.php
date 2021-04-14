<?php
	// This is the HTML template include file (.tpl.php) for the motivo_incidencia_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Motivo Incidencia' . ' - ' . $this->mctMotivoIncidencia->TitleVerb;
	require(__APP_INCLUDES__ . '/header.inc.php');
?>
	<div class="titulo-formulario">
		<div class="col-md-4" style="text-align: left">
			<?php $this->lblNotiUsua->Render(); ?>
		</div>
		<div class="col-md-4">
			<?php $this->lblTituForm->Render(); ?>
		</div>
		<div class="col-md-4" style="text-align: right">
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
			<div class="col-md-3" style="text-align: left; padding: 0"></div>
			<div class="col-md-5">
				<?php $this->lblId->RenderWithName(); ?>
				<?php $this->txtCodigo->RenderWithName(); ?>
				<?php $this->txtNombre->RenderWithName(); ?>
				<?php $this->chkActivo->RenderWithName(); ?>
			</div>
			<div class="col-md-4" style="text-align: right; padding: 0"></div>
		</div>
	</div>

	<div class="form-actions">
		<div class="form-save"><?php $this->btnSave->Render(); ?></div>
		<div class="form-cancel"><?php $this->btnLogxCamb->Render(); ?></div>
		<div class="form-cancel"><?php $this->btnCancel->Render(); ?></div>
		<div class="form-delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

    <style>
        input[type="radio"], input[type="checkbox"] {
            margin: 4px 0 0;
            margin-top: 8px;
            line-height: normal;
        }
    </style>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>