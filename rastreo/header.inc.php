<!DOCTYPE html>
<html lang="en">

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

    <!-- Bootstrap Core CSS -->
    <link href=<?= __APP_CSS_ASSETS__ ."/bower_components/bootstrap/dist/css/bootstrap.css"?> rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href=<?= __APP_CSS_ASSETS__ ."/bower_components/metisMenu/dist/metisMenu.min.css"?> rel="stylesheet">

    <!-- Custom CSS -->
    <link href=<?= __APP_CSS_ASSETS__ ."/dist/css/sb-admin-2.css"?> rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=<?= __APP_CSS_ASSETS__ ."/bower_components/font-awesome/css/font-awesome.min.css"?> rel="stylesheet" type="text/css">
    <link href=<?= __APP_CSS_ASSETS__ ."/bootstrap4.css"?> rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                <a class="navbar-brand" style="color: white; text-decoration: none">GOLD COAST | RASTREO</a>
            </div>

            <!--
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                </div>
            </div>
            -->
        </nav>

        <!-- Page Content -->
<!--        <div id="page-wrapper">-->
        <div>
            <span class="medio_espacio"></span>




