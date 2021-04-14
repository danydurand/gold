<?php 
include('layout/header.inc.php'); 
?>

    <div data-role="page" id="prealerta">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?php $this->RenderBegin(); ?>
                <label for="nume">Nro. de Tracking</label>
                <?php $this->txtNumeTrac->RenderWithError(); ?>
                <label for="desc">Descripción del Artículo:</label>
                <?php $this->txtDescArti->RenderWithError(); ?>
                <label for="valo">Valor (USD):</label>
                <?php $this->txtValoMerc->RenderWithError(); ?>
                <label for="coin">Courier Internacional:</label>
                <?php $this->lstListCour->RenderWithError(); ?>
                <?php $this->btnSave->Render(); ?>
                <?php //$this->btnLimpCamp->Render(); ?>
            <?php $this->RenderEnd(); ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>



