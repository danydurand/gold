<?php
/**
 * Created by PhpStorm.
 * User: jduran
 * Date: 03/10/16
 * Time: 11:40 PM
 */
require_once('qcubed.inc.php');
include('layout/header.inc.php');

//--------------------------
// Declaración de Variables
//--------------------------
$strTituPagi = "Lista de Entregas";
$intCodiOper = $_SESSION['CodiOper'];

//--------------------------------------------------------
// Se arma un Query para obtener las Entregas Pendientes
//--------------------------------------------------------
$intEntrChof = Guia::CantidadEntregasPorCodiOper($intCodiOper);
$intEntrOkey = Guia::CantidadEntregasRealizadasHoy($intCodiOper);
?>
    <div data-role="page">
        <?php include('layout/page_header.inc.php'); ?>
            <div data-role="content">
                <ul data-role="listview" data-inset="true" class="ui-nodisc-icon">
                    <li>
                        <a href="lista_de_entregas.php?te=ppe">PENDIENTES
                            <span class="ui-li-count"><?= $intEntrChof ?></span></a>
                    </li>
                    <li>
                        <a href="lista_de_entregas.php?te=gok">ENTREGADAS
                            <span class="ui-li-count"><?= $intEntrOkey ?></span></a>
                    </li>
                    <!--<li>-->
                    <!--    <a href="lista_de_clientes.php?o=sc">Confirmados Sin Código-->
                    <!--        <span class="ui-li-count">--><?//= $intSinxCodi ?><!--</span></a>-->
                    <!--</li>-->
                </ul>
            </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>