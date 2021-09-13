    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <!----------------------------->
        <!-- Tamaños Mediano y Largo -->
        <!-------------------------- -->
        <div class="hidden-xs hidden-sm col-md-7 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnVolvList->Render(); ?>
            <?php $this->btnNuevRegi->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnDelete->Render(); ?>
            <?php $this->btnLogxCamb->Render(); ?>
            <?php if (isset($this->btnExpoExce)) { ?>
                <?php $this->btnExpoExce->Render(); ?>
            <?php } ?>
        </div>
        <div class="hidden-xs hidden-sm hidden-md col-lg-4 pull-right" style="text-align: right; padding-right: 3px; margin-top: -0.25em">
            <?php $this->btnPrimRegi->Render(); ?>
            <?php $this->btnRegiAnte->Render(); ?>
            <?php $this->btnProxRegi->Render(); ?>
            <?php $this->btnUltiRegi->Render(); ?>
        </div>
        <!-------------------------------------->
        <!-- Tamaños Pequeños y Extra-Pequeño -->
        <!-------------------------------------->
        <div class="col-xs-5 hidden-md hidden-lg" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnVolvSmal->Render(); ?>
            <?php $this->btnNuevSmal->Render(); ?>
            <?php $this->btnGuarSmal->Render(); ?>
            <?php $this->btnBorrSmal->Render(); ?>
            <?php $this->btnHistSmal->Render(); ?>
        </div>
        <div class="col-xs-3 col-md-4 hidden-lg pull-right" style="text-align: right; padding-right: 3px; margin-top: -1.99em">
            <?php $this->btnPrimSmal->Render(); ?>
            <?php $this->btnAnteSmal->Render(); ?>
            <?php $this->btnProxSmal->Render(); ?>
            <?php $this->btnUltiSmal->Render(); ?>
        </div>
    </div>