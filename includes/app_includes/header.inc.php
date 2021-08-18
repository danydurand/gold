<!DOCTYPE html>
<html lang="en">

<?php
include('datos.inc.php');
include('menu.inc.php');
if ($_SESSION['NombSist'] == 'DESPACHO DE ENVIOS') {
    $_SESSION['NombSist'] = 'SISCO';
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<?php if (isset($strPageTitle)) { ?>
	<title><?php _p($strPageTitle); ?></title>
<?php } ?>

	<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__); ?>/styles.css");</style>
	<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__); ?>/styles_plus.css");</style>

    <!-- Intro JS -->
    <link rel="stylesheet" href="<?= __VIRTUAL_DIRECTORY__ . __APP_JS_ASSETS__ .'/introjs/introjs.min.css' ?>">
    <script src="<?= __VIRTUAL_DIRECTORY__ . __APP_JS_ASSETS__ .'/introjs/intro.min.js' ?>"></script>

    <!-- Bootstrap Core CSS -->
    <link href=<?= __VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__ ."/bower_components/bootstrap/dist/css/bootstrap.css"?> rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href=<?= __VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__ ."/bower_components/metisMenu/dist/metisMenu.min.css"?> rel="stylesheet">

    <!-- Custom CSS -->
    <link href=<?= __VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__ ."/dist/css/sb-admin-2.css"?> rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=<?= __VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__ ."/bower_components/font-awesome/css/font-awesome.min.css"?> rel="stylesheet" type="text/css">
    <link href=<?= __VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__ ."/bootstrap4.css"?> rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Fusion Charts -->
    <script src="http://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src="http://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        .navbar-default {
            background: #4682B4;
        }

    </style>

</head>

<body>
	<?php $this->RenderBegin() ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color: white; text-decoration: none" href="<?= __APP__.'/mg.php'?>" id="gold">
                    GoldCoast | SISPAQ | <?= $_SESSION['NombSist'] ?> | <?= $strDatoEsta ?>
                <?php if ($_SESSION['Sistema'] == 'pmn') { ?>
                    | <?= $strDatoEsta ?> | <?= isset($_SESSION['ReceOrig']) ? unserialize($_SESSION['ReceOrig']) : '' ?>
                <?php } ?>
                </a>
            </div>
            <!-- /.navbar-header -->
            
            <ul class="nav navbar-top-links navbar-right">

                <a class="btn btn-sm btn-success"
                   style="margin-left:.5em"
                   href="javascript:void(0);"
                   title="Ayuda"
                   onclick="javascript:introJs().start();startIntro()">
                    <i class="fa fa-question-circle fa-lg"></i>
                </a>

                <li><span style="color: white"><i class="fa fa-user fa-fw"></i> <?= $strDatoGrup ?></span></li>
                <li class="dropdown"  id="user">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href=<?= __SIST__."/my_history.php"?>><i class="fa fa-history fa-fw"></i> Mi Histórico</a>
                        </li>
                        <li><a href=<?= __APP__."/cambiar_clave.php"?>><i class="fa fa-key fa-fw"></i> Cambiar Clave</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href=<?= __APP__."/logout.php"?>><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?= $strHtmlMenu; ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <span class="medio_espacio"></span>




