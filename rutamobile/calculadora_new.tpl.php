<?php 
// require_once('qcubed.inc.php');
include('layout/header.inc.php'); 
?>

    <div data-role="page" id="calculadora">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?php $this->RenderBegin(); ?>
                <label for="fobx">Valor de la Mercancía:</label>
                <?php $this->txtValoMerc->RenderWithError(); ?>
                <label for="peso">Peso en Libras:</label>
                <?php $this->txtPesoLibr->RenderWithError(); ?>
                <label for="alto">Alto:</label>
                <?php $this->txtAltoEnvi->RenderWithError(); ?>
                <label for="anch">Ancho:</label>
                <?php $this->txtAnchEnvi->RenderWithError(); ?>
                <label for="larg">Largo:</label>
                <?php $this->txtLargEnvi->RenderWithError(); ?>
                <label for="aran">% Arancel:</label>
                <?php $this->txtPorcAran->RenderWithError(); ?>
                <?php $this->btnSave->Render(); ?>
                <?php $this->btnLimpCamp->Render(); ?>
            <?php $this->RenderEnd(); ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
