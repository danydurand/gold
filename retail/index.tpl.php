<?php
$_SESSION['NombPlat'] = 'Retail';
$strPageTitle = QApplication::Translate('SISPAQ - '.$_SESSION['NombPlat']);
require('inc/header_login.inc.php');
?>

    <div id="formulario_login">
        <br/>
        <?php $this->txtLogiUsua->RenderWithName(); ?>
        <?php $this->txtClavAcce->RenderWithName(); ?>
        <br />
        <div style="text-align: center; padding-bottom: 10px">
            <div class="form-save"><?php $this->btnAcceSist->Render(); ?></div>
        </div>
    </div>

<?php require('inc/footer_login.inc.php'); ?>