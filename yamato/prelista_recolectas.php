<?php
/**
 * Created by PhpStorm.
 * User: jduran
 * Date: 03/10/16
 * Time: 5:13 PM
 */
require_once('qcubed.inc.php');
include('layout/header.inc.php');

//--------------------------
// Declaración de Variables
//--------------------------
$strTituPagi = "Lista de Recolectas";
$intCodiOper = $_SESSION['CodiOper'];

//--------------------------------------------------------
// Se arma un Query para obtener las Entregas Pendientes
//--------------------------------------------------------
$intRecoChof = DspDespacho::CantidadRecolectasPorCodiOper($intCodiOper);
$intRecoOkey = DspDespacho::CantidadRecolectasRealizadasHoy($intCodiOper);
?>
    <div data-role="page">
        <?php include('layout/page_header.inc.php'); ?>
            <div data-role="content">
                <ul data-role="listview" data-inset="true" class="ui-nodisc-icon">
                    <li>
                        <a href="lista_de_recolectas.php?te=ppr">PENDIENTES
                            <span class="ui-li-count"><?= $intRecoChof ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="lista_de_recolectas.php?te=rok">RECOLECTADAS
                            <span class="ui-li-count"><?= $intRecoOkey ?></span>
                        </a>
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