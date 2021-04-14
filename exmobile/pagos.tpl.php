<?php 
include('layout/header.inc.php'); 
?>

    <div data-role="page" id="prealerta">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?php $this->RenderBegin(); ?>
                <label for="nume">Nro. de Voucher o Transferencia:</label>
                <?php $this->txtNumePago->RenderWithError(); ?>
                <label for="fech">Fecha del Pago:</label>
                <?php $this->txtFechPago->RenderWithError(); ?>
                <label for="mont">Monto (Bs):</label>
                <?php $this->txtMontPago->RenderWithError(); ?>
                <label for="banc">Banco:</label>
                <?php $this->lstListBanc->RenderWithError(); ?>
                <?php $this->btnSave->Render(); ?>
                <?php //$this->btnLimpCamp->Render(); ?>
            <?php $this->RenderEnd(); ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>



