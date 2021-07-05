            <div class="col-md-2">
                <label>Forma de Pago</label>
                <?php $this->lstFormPago->Render(); ?>
            </div>
            <div class="col-md-1">
                <label>Divisa</label>
                <?php $this->lstDiviPago->Render(); ?>
            </div>
            <div class="col-md-1">
                <label>Referencia</label>
                <?php $this->txtRefePago->Render(); ?>
            </div>
            <div class="col-md-2">
                <label>Banco</label>
                <?php $this->lstBancPago->Render(); ?>
            </div>
            <div class="col-md-2">
                <label>Mto del Pago</label><br>
                <?php $this->txtMontDivi->Render(); ?>
            </div>
            <div class="col-md-2">
                <label>Pago en USD</label><br>
                <?php $this->txtMontDola->Render(); ?>
            </div>
            <div class="col-md-2">
                <label>Pago en Bs</label><br>
                <?php $this->txtMontBoli->Render(); ?>
            </div>
