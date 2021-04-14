<?php 
include('layout/header.inc.php'); 
?>

    <div data-role="page" id="calculadora">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?php $this->RenderBegin(); ?>
                <label for="nomb">Nombre:</label>
                <?php $this->txtNombClie->RenderWithError(); ?>
                <label for="cedu">Cédula/RIF</label>
                <?php $this->txtNumeCedu->RenderWithError(); ?>
                <label for="mail">E-mail</label>
                <?php $this->txtDireMail->RenderWithError(); ?>
                <label for="fnac" class="form-label">Fecha de Nacimiento:</label>
                <?php $this->txtFechNaci->RenderWithError(); ?>
                <label for="sexo">Sexo:</label>
                <?php $this->rdbSexoClie->RenderWithError(); ?>
                <label for="movi">Teléfono Movil:</label>
                <?php $this->txtTeleMovi->RenderWithError(); ?>
                <label for="fijo">Teléfono Fijo:</label>
                <?php $this->txtTeleFijo->RenderWithError(); ?>
                <label for="esta" class="form-label">Estado:</label>
                <?php $this->lstEstaClie->RenderWithError(); ?>
                <label for="ciud">Ciudad:</label>
                <?php $this->lstCiudClie->RenderWithError(); ?>
                <label for="sucu">Sucursal:</label>
                <?php $this->lstSucuClie->RenderWithError(); ?>
                <label for="dire">Dirección:</label>
                <?php $this->txtDireEntr->RenderWithError(); ?>
                <?php $this->btnSave->Render(); ?>
                <?php //$this->btnLimpCamp->Render(); ?>
            <?php $this->RenderEnd(); ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>



