<div class="row">
    <div class="col-md-4">
        <div class="form-group" style="text-align: center">
            <label for="">Desea Seguro ?</label><br>
            <?php $this->lstEnviSgro->Render(); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Valor Decl.</label><br>
            <?php $this->txtValoDecl->Render(); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Forma Pago</label><br>
            <?php $this->lstFormPago->Render(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="form-group" style="text-align: left">
            <label for="">Contenido de la Guía</label><br>
            <?php $this->txtDescCont->Render(); ?>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group" style="text-align: right">
            <label for="">Kilos</label><br>
            <?php $this->txtCantKilo->Render(); ?>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group" style="text-align: right">
            <label for="">Piezas</label><br>
            <?php $this->txtCantPiez->Render(); ?>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 0.5em; line-height: 0.5em">
    <div class="col-md-12" style="border-radius: 3px; padding: 0.5em">
        <div style="cursor: pointer; text-align: center">
            <div><?php $this->lblTituPiez->Render() ?></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if ($this->blnAgrePiez == 1) { ?>
        <div style="margin-bottom: .3em">
            <div class="row">
                <div class="col-sm-6 text-center" style="font-weight: bold; text-align: left"><?php $this->lblContPiez->Render(); ?></div>
                <div class="col-sm-3 text-center" style="font-weight: bold; text-align: right"><?php $this->lblKiloPiez->Render(); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-7 text-center" style="text-align: left"><?php $this->txtContPiez->Render(); ?></div>
                <div class="col-sm-2 text-left" style="text-align: center"><?php $this->txtKiloPiez->Render(); ?></div>
                <div class="col-sm-3 text-center"><?php $this->btnSavePiez->Render(); $this->btnCancPiez->Render(); $this->btnDelePiez->Render(); ?></div>
            </div>
        </div>
        <?php } ?>
        <?php $this->dtgPiezTemp->Render(); ?>
    </div>
</div>
