<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label for="">Destino</label><br>
            <?php $this->lstSucuDest->Render(); ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Servicio</label><br>
            <?php $this->lstReceDomi->Render(); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Receptoría</label><br>
            <?php $this->lstReceDest->Render(); ?>
        </div>
    </div>
</div>
<div class="row" style="line-height: 0.5em; margin-bottom: .3em">
    <div class="col-md-12" style="border-radius: 3px; padding: 0.1em">
        <div class="titulo">Información del Destinatario</div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Cédula/RIF</label><br>
            <?php $this->txtCeduDest->Render(); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nombre</label><br>
            <?php $this->txtNombDest->Render(); ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="">Sexo</label><br>
            <?php $this->lstSexoDest->Render(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Teléfono Fijo</label><br>
            <?php $this->txtTlfdFijo->Render(); ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Teléfono Movil</label><br>
            <?php $this->txtTlfdMovi->Render(); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">E-mail</label><br>
            <?php $this->txtEmaiDest->Render(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Direccion de Entrega</label><br>
            <?php $this->txtDireDest->Render(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Estado</label><br>
            <?php $this->txtEstaDest->Render(); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Ciudad</label><br>
            <?php $this->txtCiudDest->Render(); ?>
        </div>
    </div>
    <div class="col-md-4" style="text-align: right">
        <div class="form-group">
            <label for="">Cod Postal</label><br>
            <?php $this->txtPostDest->Render(); ?>
        </div>
    </div>
</div>

