        <?php
            if (isset($_SESSION['User'])) {
                $objUsuaMobi = unserialize($_SESSION['User']);
                $strLogiUsua = $objUsuaMobi->Login; 
                $strAcceMobi = $objUsuaMobi->AccesoMobile; 
            } else {
                QApplication::Redirect('index.php');
            }
        ?>
        <div data-role="header">
            <h1><?= $strTituPagi ?></h1>
            <a href="menu.php" data-iconpos="notext" data-role="button" data-icon="home" title="Inicio" style="background:#2c3e50;">Inicio</a>
            <a href="#panel" data-iconpos="notext"  data-role="button" data-icon="flat-menu" title="Menu" style="background:#2c3e50;">Menu</a>
            <?php include('layout/menu.inc.php'); ?>
        </div>
        <div data-role="panel" id="panel" data-position="right" data-theme="a" data-display="overlay">
            <div class="user_p" style="text-align:center;">
                <img src="images/usr.png" style="height:80px; width:80px" alt="user">
            </div>
            <p class="user_p">Bienvenido <?= $strLogiUsua ?><br>
            <small>Ultimo Acceso: <?= $strAcceMobi ?></small></p>
            <nav>
                <div class="ui-block-a"><a href="menu.php?m=h" type="button" data-role="button" id="pbtn" data-theme="a"><i class="fa fa-wrench pull-left"></i>Herramientas</a></div>
                <!--<div class="ui-block-b"><a href="menu.php?m=i" type="button" data-role="button" id="pbtn" data-theme="b"><i class="fa fa-lg fa-pie-chart pull-left"></i>Indicadores</a></div>-->
                <!--<div class="ui-block-a"><a href="menu.php?m=o" type="button" data-role="button" id="pbtn" data-theme="d"><i class="fa fa-lg fa-list pull-left"></i>Opciones Extra</a></div>-->
                <div class="ui-block-a"><a href="acerca.php" type="button" data-role="button" id="pbtn" data-theme="e"><i class="fa fa-lg fa-briefcase pull-left"></i>Acerca</a></div>
                <div class="ui-block-a" style="position:bottom;"><a href="logout.php" type="button" data-role="button" id="pbtn" data-theme="c"><i class="fa fa-lg fa-sign-out pull-left"></i>Salir</a></div>
            </nav>
        </div>
