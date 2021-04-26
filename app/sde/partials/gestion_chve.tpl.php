<div class="col-md-4">
    <div class="row">
        <div class="col-md-6">
            <?php $this->txtNuevChof->Render(); ?>
        </div>
        <div class="col-md-4">
            <?php $this->txtNuevCedu->Render(); ?>
        </div>
        <div class="col-md-2">
            <?php $this->btnRegiChof->Render(); ?>
        </div>
    </div>
    <div class="list_title">Choferes de la Sucursal</div>
    <?php $this->dtgChofSucu->Render(); ?>
</div>
<div class="col-md-4">
    <div class="row">
        <div class="col-md-4">
            <?php $this->lstNuevTipo->Render(); ?>
        </div>
        <div class="col-md-3">
            <?php $this->txtNuevPlac->Render(); ?>
        </div>
        <div class="col-md-3">
            <?php $this->txtNuevDesc->Render(); ?>
        </div>
        <div class="col-md-1">
            <?php $this->btnRegiVehi->Render(); ?>
        </div>
    </div>
    <div class="list_title">Vehículos de la Sucursal</div>
    <?php $this->dtgVehiSucu->Render(); ?>
</div>
