<?php 
require_once('qcubed.inc.php');

/* @var $objPiezMani GuiaPiezas */

$intIdxxMani = $_GET['id'];
$objManiSele = Containers::Load($intIdxxMani);
$strNumeMani = $objManiSele->Numero;
$strTituPagi = "Manif. $strNumeMani";
$strImagOkey = __RUTA_IMAGE__.'/icons-svg/check-white.svg';
$strImagPend = __RUTA_IMAGE__.'/icons-svg/clock-white.svg';
$intCantOkey = $objManiSele->CantidadOk;
$intCantTota = $objManiSele->Piezas;
$intCantPend = $intCantTota - $intCantOkey;
$decPorcPend = nf0($intCantPend * 100 / $intCantTota);
$decPorcEntr = nf0($intCantOkey * 100 / $intCantTota);
$strLinkPend = "lista_de_guias.php?id=$intIdxxMani&tg=NO";
$strLinkEntr = "lista_de_guias.php?id=$intIdxxMani&tg=OK";
?>
<?php include('layout/header.inc.php'); ?>

    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">

            <ul data-role="listview" data-inset="true">
                <a href="lista_manifiestos.php" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
                <li data-role="list-divider"><br><span class="ui-li-count"><?= $decPorcPend ?>%</span></li>
                <li>
                    <a href="<?= $strLinkPend ?>">
                        <img src="<?= $strImagPend ?>" width="40px" height="40px" style="margin-top: 1em; margin-left: 1em">
                        <h2 style="margin-top: 1em">Pendientes: <?= $intCantPend ?></h2>
                    </a>
                </li>
                <li data-role="list-divider"><br><span class="ui-li-count"><?= $decPorcEntr ?>%</span></li>
                <li>
                    <a href="<?= $strLinkEntr ?>">
                        <img src="<?= $strImagOkey ?>" width="40px" height="40px" style="margin-top: 1em; margin-left: 1em">
                        <h2 style="margin-top: 1em">Entregadas: <?= $intCantOkey ?></h2>
                    </a>
                </li>
            </ul>

        </div>


        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

