<?php 
require_once('qcubed.inc.php');

$strTituPagi = "Gerencia Mobile";

if (isset($_GET['m'])) {
   $_SESSION['menu'] = $_GET['m'];
} else {
   $_SESSION['menu'] = 'o';
}
?>

<?php include('layout/header.inc.php'); ?>

<div data-role="page" id="inicio">

    <?php include('layout/page_header.inc.php'); ?>

    <div data-role="content" style="text-align: center; min-height: 400px; padding-top: 10%">
        <img src="images/LogoGold_MED.png" alt="" style="margin-top: 2em; opacity:0.5;">
    </div>

    <?php include('layout/page_footer.inc.php'); ?>

</div>

<?php include('layout/footer.inc.php'); ?>
