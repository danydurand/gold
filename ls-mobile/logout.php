<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php'); 
?>
    <div data-role="dialog" id="logout">
        <div data-role="content">
            <span class="title">Esta Seguro?</span>
            <a href="index.php" data-role="button" data-theme="b"><i class="fa fa-send pull-right"></i>Si, Deseo Salir!!!</a>
            <a href="#" data-role="button" data-theme="c" data-rel="back"><i class="fa fa-child pull-right"></i>Me quiero quedar</a>
        </div>
        <style>
            span.title { 
                display: block; 
                text-align: center; 
                margin-top: 10px; 
                margin-bottom: 20px; 
            }
        </style>
    </div>

<?php include('layout/footer.inc.php'); ?>
