<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');
include('layout/header.inc.php');

$strResuCalc = '
<center>
    <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">
        Transacción Existosa !!!
    </a>
</center>
';
?>

<?php //include('layout/header.inc.php') ?> 

    <div data-role="page" id="resultado">

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content" >
            <?= $strResuCalc ?>
        </div>

        <?php include('layout/page_footer.inc.php') ?>;

    </div>

<?php include('layout/footer.inc.php') ?> 

