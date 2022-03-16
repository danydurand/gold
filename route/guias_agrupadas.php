<?php 
require_once('qcubed.inc.php');

tc('==============================');
tc('Llegando a las guias agrupadas');
$intIdxxMani = $_GET['id'];

/* @var $objManiSele ContainerMobile */
$objManiSele = ContainerMobile::Load($intIdxxMani);

/* @var $objChofCone Chofer */
$objChofCone = unserialize($_SESSION['User']);
$objChofCone->grabarLogMobile('Entrando al Grupo de Guias del Manif: '.$objManiSele->Container->Numero);
//$objManiSele->ResumeDeEntrega();
$intCantPiez = $objManiSele->CantPiezas;
$intCantOkey = $objManiSele->Entregadas;
$intCantPend = $objManiSele->Pendientes;
$intCantDevu = $objManiSele->Devueltas;
$intCantSing = $objManiSele->SinGestionar;

$decPorcOkey  = nf0($intCantOkey * 100 / $intCantPiez);
$decPorcPend  = nf0($intCantPend * 100 / $intCantPiez);
$decPorcDevu  = nf0($intCantDevu * 100 / $intCantPiez);
$decPorcSing  = nf0($intCantSing * 100 / $intCantPiez);

tc('4');
$strNumeMani = $objManiSele->Container->Numero;
$strTituPagi = "Manif. $strNumeMani";
$strImagOkey = __RUTA_IMAGE__.'/icons-svg/check-white.svg';
$strImagPend = __RUTA_IMAGE__.'/icons-svg/clock-white.svg';
$strImagDevu = __RUTA_IMAGE__.'/icons-svg/lock-white.svg';
$strImagSing = __RUTA_IMAGE__.'/icons-svg/camera-white.svg';
$strLinkPend = "lista_de_guias.php?id=$intIdxxMani&tg=PE";
$strLinkEntr = "lista_de_guias.php?id=$intIdxxMani&tg=OK";
$strLinkDevu = "lista_de_guias.php?id=$intIdxxMani&tg=DV";
$strLinkSing = "lista_de_guias.php?id=$intIdxxMani&tg=SG";
tc('5');
?>
<?php include('layout/header.inc.php'); ?>

    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">

            <ul data-role="listview" data-inset="true">
                <form action="lista_manifiestos.php" method="post">
                    <input type="submit" value="Volver">
                </form>
<!--                <a href="lista_manifiestos.php" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>-->
                <li data-role="list-divider"><br><span class="ui-li-count"><?= $decPorcSing ?>%</span></li>
                <li>
                    <a href="<?= $strLinkSing ?>">
                        <img src="<?= $strImagSing ?>" width="40px" height="40px" style="margin-top: 1em; margin-left: 1em">
                        <h2 style="margin-top: 1em">Sin Gestionar: <?= $intCantSing ?></h2>
                    </a>
                </li>
                <li data-role="list-divider"><br><span class="ui-li-count"><?= $decPorcPend ?>%</span></li>
                <li>
                    <a href="<?= $strLinkPend ?>">
                        <img src="<?= $strImagPend ?>" width="40px" height="40px" style="margin-top: 1em; margin-left: 1em">
                        <h2 style="margin-top: 1em">Pendientes: <?= $intCantPend ?></h2>
                    </a>
                </li>
                <li data-role="list-divider"><br><span class="ui-li-count"><?= $decPorcOkey ?>%</span></li>
                <li>
                    <a href="<?= $strLinkEntr ?>">
                        <img src="<?= $strImagOkey ?>" width="40px" height="40px" style="margin-top: 1em; margin-left: 1em">
                        <h2 style="margin-top: 1em">Entregadas: <?= $intCantOkey ?></h2>
                    </a>
                </li>
                <li data-role="list-divider"><br><span class="ui-li-count"><?= $decPorcDevu ?>%</span></li>
                <li>
                    <a href="<?= $strLinkDevu ?>">
                        <img src="<?= $strImagDevu ?>" width="40px" height="40px" style="margin-top: 1em; margin-left: 1em">
                        <h2 style="margin-top: 1em">Devueltas: <?= $intCantDevu ?></h2>
                    </a>
                </li>
            </ul>

        </div>


        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

