<?php
$strPageTitle = QApplication::Translate('Carga Masiva de Guías');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-12 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>&nbsp;&nbsp;<?php $this->objDefaultWaitIcon->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-6 col-lg-6" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnImpoGuia->Render(); ?>
        <?php $this->btnAjusGuia->Render(); ?>
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnBorrNota->Render(); ?>
        <?php $this->btnMasxAcci->Render(); ?>
        <?php //$this->btnMostSucu->Render(); ?>
        <?php $this->btnErroProc->Render(); ?>
        <?php //$this->btnImprDesp->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid" data-aos="fade-in">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.4em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 0.8em">
            <div class="col-xs-4" style="margin-top: 1em">
                <?php $this->lstClieCarg->RenderWithName(); ?>
                <?php $this->txtCargArch->RenderWithName(); ?>
                <?php $this->lstServImpo->RenderWithName(); ?>
                <?php $this->txtNumeRefe->RenderWithName(); ?>
                <?php $this->txtNombArch->RenderWithName(); ?>
            </div>
            <div class="col-xs-3">
                <?php $this->chkEnxxKilo->RenderWithName(); ?>
                <?php $this->chkManiFact->RenderWithName(); ?>
                <?php $this->lblNumeCarg->RenderWithName(); ?>
                <?php $this->lblNumePend->RenderWithName(); ?>
                <?php $this->lblNumeAjus->RenderWithName(); ?>
            </div>
            <div class="col-xs-2">
                <?php $this->lblNumeProc->RenderWithName(); ?>
                <?php $this->lblCantPiez->RenderWithName(); ?>
                <?php $this->lblCantReci->RenderWithName(); ?>
                <?php $this->lblTotaLibr->RenderWithName(); ?>
                <?php $this->lblTotaPies->RenderWithName(); ?>
            </div>
            <div class="col-xs-2">
                <?php $this->lblTotaVolu->RenderWithName(); ?>
                <?php $this->lblFechNota->RenderWithName(); ?>
                <?php $this->lblHoraNota->RenderWithName(); ?>
                <?php $this->lblUsuaNota->RenderWithName(); ?>
                <?php $this->lblEstaNota->RenderWithName(); ?>
            </div>
        </div>
        <?php if (strlen($this->lblRelaSobr->Text) > 0) { ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1" style="text-align: left;">
                <b>Sobrantes:</b><br>
                <?php $this->lblRelaSobr->Render(); ?>
            </div>
        </div>
        <?php } ?>
        <?php if ($this->lblNumeProc->Text > 0) { ?>
        <div class="row" style="margin-top: 1em;">
            <div class="col-xs-6">
                <div style="text-align: center">
                    <?php $this->btnExpoGuia->Render(); ?>
                </div>
                <?php $this->dtgGuiaMani->Render(); ?>
            </div>
            <div class="col-xs-6">
                <div style="text-align: center">
                    <?php $this->btnExpoPiez->Render(); ?>
                </div>
                <?php $this->dtgPiezMani->Render(); ?>
            </div>
        </div>
        <?php } ?>
        <?php if ($this->lblNumeCarg->Text == 0) { ?>
        <div class="row" style="margin-top: 1em;">
            <?php include('carga_masiva_instrucciones.tpl.php'); ?>
        </div>
        <?php } ?>
        <?php if ($this->lblNumeAjus->Text > 0) { ?>
        <div class="row" style="margin-top: 1em;">
            <?php include('carga_masiva_ajustes.tpl.php'); ?>
        </div>
        <?php } ?>
    </div>
</div>
<style>
    .req {
        font-weight: bold;
        color: red;
    }
</style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
