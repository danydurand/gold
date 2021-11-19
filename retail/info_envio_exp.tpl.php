<div class="row">
    <!--<div class="col-md-2">-->
    <!--    <div class="form-group" style="text-align: center">-->
    <!--        <label for="">Seguro ?</label><br>-->
    <!--        --><?php //$this->lstEnviSgro->Render(); ?>
    <!--    </div>-->
    <!--</div>-->
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Valor Decla. Especificado</label><br>
            <?php $this->lstModoValo->Render(); ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Forma Pago</label><br>
            <?php $this->lstFormPago->Render(); ?>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <?php if (!$this->blnAliaCome) { ?>
            <label for="">Cliente CORP</label><br>
            <?php $this->lstClieCorp->Render(); ?>
            <?php } ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group" style="text-align: center">
            <label for="">Alto</label><br>
            <?php $this->txtAltoEnvi->Render(); ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group" style="text-align: center">
            <label for="">Anch</label><br>
            <?php $this->txtAnchEnvi->Render(); ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group" style="text-align: center">
            <label for="">Larg</label><br>
            <?php $this->txtLargEnvi->Render(); ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group" style="text-align: right">
            <label for="">Kilos</label><br>
            <?php $this->txtKiloEnvi->Render(); ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group" style="text-align: center">
            <label for="">Vol.</label><br>
            <?php $this->txtVoluEnvi->Render(); ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group" style="text-align: center">
            <label for="">PiesCub</label><br>
            <?php $this->txtPiesEnvi->Render(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group" style="text-align: left">
            <label for="">Contenido de la Guía</label><br>
            <?php $this->txtDescCont->Render(); ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group" style="text-align: right">
            <label for="">Pzas</label><br>
            <?php $this->txtCantPiez->Render(); ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="">V-Decl. ($)</label><br>
            <?php $this->txtValoDecl->Render(); ?>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 0.5em; line-height: 0.5em">
    <div class="col-md-4" style="border-radius: 3px; padding: 0.5em">
        <div style="cursor: pointer; text-align: center">
            <div><?php $this->lblTituPiez->Render() ?></div>
        </div>
    </div>
    <div class="col-sm-4 text-center">
        <?php $this->lstUnidMedi->Render(); ?>
    </div>
    <div class="col-sm-3 text-center">
        <?php $this->btnSavePiez->Render(); $this->btnCancPiez->Render(); $this->btnDelePiez->Render(); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if ($this->blnAgrePiez == 1) { ?>
        <div style="margin-bottom: .3em">
            <div class="row">
                <div class="col-sm-4 text-center" style="font-weight: bold; text-align: center"><?php $this->lblEmpaPiez->Render(); ?></div>
                <div class="col-sm-1 text-center" style="font-weight: bold; text-align: center"><?php $this->lblAltoPiez->Render(); ?></div>
                <div class="col-sm-1 text-center" style="font-weight: bold; text-align: center"><?php $this->lblAnchPiez->Render(); ?></div>
                <div class="col-sm-1 text-center" style="font-weight: bold; text-align: center"><?php $this->lblLargPiez->Render(); ?></div>
                <div class="col-sm-1 text-center" style="font-weight: bold; text-align: center"><?php $this->lblKiloPiez->Render(); ?></div>
                <div class="col-sm-2 text-center" style="font-weight: bold; text-align: center"><?php $this->lblVoluPiez->Render(); ?></div>
                <div class="col-sm-2 text-center" style="font-weight: bold; text-align: center"><?php $this->lblPiesPiez->Render(); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-left" style="text-align: center"><?php $this->lstEmpaPiez->Render(); ?></div>
                <div class="col-sm-1 text-left" style="text-align: center"><?php $this->txtAltoPiez->Render(); ?></div>
                <div class="col-sm-1 text-left" style="text-align: center"><?php $this->txtAnchPiez->Render(); ?></div>
                <div class="col-sm-1 text-left" style="text-align: center"><?php $this->txtLargPiez->Render(); ?></div>
                <div class="col-sm-1 text-left" style="text-align: center"><?php $this->txtKiloPiez->Render(); ?></div>
                <div class="col-sm-2 text-left" style="text-align: center"><?php $this->txtVoluPiez->Render(); ?></div>
                <div class="col-sm-2 text-left" style="text-align: center"><?php $this->txtPiesPiez->Render(); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-8 text-center" style="font-weight: bold; text-align: left"><?php $this->lblContPiez->Render(); ?></div>
                <div class="col-sm-2 text-center" style="font-weight: bold; text-align: left"><?php $this->lblValoPiez->Render(); ?></div>
                <div class="col-sm-2" style="font-weight: bold; text-align: center"><?php $this->lblRepePiez->Render(); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-8 text-center" style="text-align: left"><?php $this->txtContPiez->Render(); ?></div>
                <div class="col-sm-2 text-center" style="text-align: left"><?php $this->txtValoPiez->Render(); ?></div>
                <div class="col-sm-2" style="text-align: right"><?php $this->txtRepePiez->Render(); ?></div>
                <!--<div class="col-sm-3 text-center">--><?php //$this->btnSavePiez->Render(); $this->btnCancPiez->Render(); $this->btnDelePiez->Render(); ?><!--</div>-->
            </div>
        </div>
        <?php } ?>
        <?php $this->dtgPiezTemp->Render(); ?>
    </div>
</div>
