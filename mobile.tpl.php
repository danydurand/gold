<?php
$strPageTitle = QApplication::Translate('ServiExpress');
require(__APP_INCLUDES__ . '/header_login.inc.php');
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

<?php require(__APP_INCLUDES__.'/footer_login.inc.php'); ?>

