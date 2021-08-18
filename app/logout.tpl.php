<?php

$strPageTitle = QApplication::Translate('Salir: '.$_SESSION['NombSist']);
require(__APP_INCLUDES__ . '/header.inc.php');
?>

<div class="formulario" data-aos="slide-up" data-aos-duration="2000">
   <p style="margin-top: 15%; text-align: center; vertical-align: middle">
      <?php $this->btnLogout->Render(); ?> 
      <br><br>
      <?php $this->btnMenu->Render(); ?>     
   </p>
</div>

<?php require(__APP_INCLUDES__.'/footer.inc.php'); ?>
