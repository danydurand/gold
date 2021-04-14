<!DOCTYPE html>
<html lang="en">

<?php
include('datos.mobile.inc.php');
// include('menu.inc.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__); ?>/styles.css");</style>
	<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__); ?>/styles_plus.css");</style>

    <title>Okinawa Mobile</title>

    <link href=<?= __APP_CSS_ASSETS__ ."/../mobile/css/bootstrap.css"?> rel="stylesheet">
    <link href=<?= __APP_CSS_ASSETS__ ."/../mobile/css/scrolling-nav.css"?> rel="stylesheet">
    <link href=<?= __APP_CSS_ASSETS__ ."/bower_components/font-awesome/css/font-awesome.min.css"?> rel="stylesheet" type="text/css">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

	<?php $this->RenderBegin() ?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top" style="color: white">ServiExpress | Okinawa Mobile</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top" style="color: white"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= __MOBILE__."/calculadora.php" ?>" style="color: white">Calculadora</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= __MOBILE__."/registro.php" ?>" style="color: white">Registro</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= __MOBILE__."/logout.php" ?>" style="color: white">Salir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

        




