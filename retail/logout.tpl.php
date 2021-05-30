<?php
$strPageTitle = 'Salir: RETAIL';
require('inc/header.inc.php');
?>

<div class="formulario">
   <p style="margin-top: 15%; text-align: center; vertical-align: middle">
      <?php $this->btnLogout->Render(); ?> 
      <br><br>
      <?php $this->btnMenu->Render(); ?>     
   </p>
</div>

<?php require('inc/footer.inc.php'); ?>
