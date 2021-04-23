<div class="row">
    <div class="col-sm-2 text-center" style="font-weight: bold"><?php $this->lblZonaTari->Render(); ?></div>
    <div class="col-sm-3 text-center" style="font-weight: bold"><?php $this->lblServTari->Render(); ?></div>
    <div class="col-sm-3 text-left" style="font-weight: bold"><?php $this->lblPrecTari->Render(); ?></div>
    <div class="col-sm-4 text-center" style="font-weight: bold"><?php $this->lblAcciTari->Render(); ?></div>
</div>
<div class="row">
    <div class="col-sm-2 text-center"><?php $this->txtZonaTari->Render(); ?></div>
    <div class="col-sm-3 text-center"><?php $this->lstServTari->Render(); ?></div>
    <div class="col-sm-3 text-left"><?php $this->txtPrecTari->Render(); ?></div>
    <div class="col-sm-4 text-center"><?php $this->btnSaveTari->Render(); $this->btnCancTari->Render(); $this->btnDeleTari->Render(); ?></div>
</div>
