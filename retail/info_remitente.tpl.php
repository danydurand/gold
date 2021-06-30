<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="">Nro Guia</label><br>
            <?php $this->txtNumeGuia->Render(); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Fecha</label><br>
            <?php $this->calFechGuia->Render(); ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Cédula/RIF</label><br>
            <?php $this->txtNumeCedu->Render(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nombre</label><br>
            <?php $this->txtNombClie->Render(); ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Teléfono Fijo</label><br>
            <?php $this->txtTeleFijo->Render(); ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Teléfono Movil</label><br>
            <?php $this->txtTeleMovi->Render(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            <label for="">Dirección</label><br>
            <?php $this->txtDireClie->Render(); ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">F.Nacimiento</label>
            <br>
            <?php $this->calFechNaci->Render(); ?>
            <div class="form-group" style="margin-top: .1em;">
                <label for="">Sexo</label>
                <?php $this->lstSexoClie->Render(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">E-mail</label><br>
            <?php $this->txtEmaiRemi->Render(); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <b><?php $this->lblNewxProf->Render(); ?></b><br>
            <?php $this->lstProfClie->Render(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <b><?php $this->lblNuevProf->Render(); ?></b><br>
            <?php $this->txtNuevProf->Render(); ?>
        </div>
    </div>
    <div class="col-md-4" style="margin-top: 1.5em">
        <?php $this->btnSaveProf->Render(); ?>
    </div>
</div>
