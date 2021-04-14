<?php
/**
 * Created by PhpStorm.
 * User: ianzola
 * Date: 15/09/16
 * Time: 02:47 PM
 */
require_once('qcubed.inc.php');
include('layout/header.inc.php');

//--------------------------
// Declaración de Variables
//--------------------------
$intCodiOper = $_SESSION['CodiOper'];

if (isset($_GET['te'])) {
    $strTipoEntr = $_GET['te'];

    switch ($strTipoEntr) {
        case 'ppe':
            $strTituPagi = "Entregas Pendientes";
            $intEntrChof = Guia::CantidadEntregasPorCodiOper($intCodiOper);
            //-------------------------------------------------------------------------------------
            // Si el query arroja algún resultado, se muestra una lista de entregas,
            // en caso contrario se notifica al usuario que no se encontraron entregas pendientes
            //-------------------------------------------------------------------------------------
            if ($intEntrChof > 0) {
                $strListEntr = '
                    <a data-rel="back" data-role="button" data-theme="b" style="align-self: center"><i class="fa fa-lg fa-mail-reply pull-left"></i>Volver</a><br>
                    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Filtrar...">
                ';
                $arrEntrChof = Guia::EntregasPorCodiOper($intCodiOper);
                foreach ($arrEntrChof as $objEntrChof) {
                    $strNumeGuia = $objEntrChof->NumeGuia;
                    $strNombRemi = $objEntrChof->NombRemi;
                    $strDireRemi = $objEntrChof->DireRemi;
                    $strTeleRemi = $objEntrChof->TeleRemi;
                    $strCodiCkpt = $objEntrChof->CodiCkpt;

                    $strListEntr .= '
                        <li>
                            <a href="detalle_de_entrega.php?o=dge&id='.$strNumeGuia.'" data-rel="dialog">
                                <img src="images/list.png" width="40px" height="40px" class="extra">
                                <p style="font-size:14px">Guía #'.$strNumeGuia.'</p>
                                <p>'.$strNombRemi.'</p>
                                <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;'.utf8_encode($strDireRemi).'</p>
                                <p><i class="fa fa-phone"></i>&nbsp;&nbsp;'.$strTeleRemi.'</p>
                            </a>
                            <a href="aplazo_entrega.php?id='.$strNumeGuia.'" data-rel="dialog">Razón de Aplazo</a>
                        </li>
                    ';
                }
                $strListEntr .= '</ul>';
            } else {
                $strListEntr = '
                    <a data-rel="back" data-role="button" data-theme="b" style="align-self: center"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Entregas</a>
                ';
            }
            break;
        case 'gok':
            $strTituPagi = "Entregas Realizadas";
            $intCantOkey = Guia::CantidadEntregasRealizadasHoy($intCodiOper);
            //-------------------------------------------------------------------------------------
            // Si el query arroja algún resultado, se muestra una lista de entregas,
            // en caso contrario se notifica al usuario que no se encontraron entregas pendientes
            //-------------------------------------------------------------------------------------
            if ($intCantOkey > 0) {
                $strListEntr = '
                    <a data-rel="back" data-role="button" data-theme="b" style="align-self: center"><i class="fa fa-lg fa-mail-reply pull-left"></i>Volver</a><br>
                    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Filtrar...">
                ';
                $arrEntrOkey = Guia::EntregasRealizadasHoy($intCodiOper);
                foreach ($arrEntrOkey as $objEntrOkey) {
                    $strNumeGuia = $objEntrOkey->NumeGuia;
                    $strNombRemi = $objEntrOkey->NombRemi;
                    $strDireRemi = $objEntrOkey->DireRemi;
                    $strTeleRemi = $objEntrOkey->TeleRemi;
                    $strCodiCkpt = $objEntrOkey->CodiCkpt;

                    $strListEntr .= '
                        <li>
                            <a href="detalle_de_entrega.php?o=dge&id='.$strNumeGuia.'" data-rel="dialog">
                                <img src="images/list.png" width="40px" height="40px" class="extra">
                                <p style="font-size:14px">Guía #'.$strNumeGuia.'</p>
                                <p>'.$strNombRemi.'</p>
                                <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;'.utf8_encode($strDireRemi).'</p>
                                <p><i class="fa fa-phone"></i>&nbsp;&nbsp;'.$strTeleRemi.'</p>
                            </a>
                        </li>
                    ';
                }
                $strListEntr .= '</ul>';
            } else {
                $strListEntr = '
                    <a data-rel="back" data-role="button" data-theme="b" style="align-self: center"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Entregas</a>
                ';
            }
            break;
        default:
            break;
    }
    $_SESSION['CodiOper'] = $intCodiOper;
}
?>
    <div data-role="page">
        <?php include('layout/page_header.inc.php'); ?>
            <div data-role="content"><?= $strListEntr; ?></div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>