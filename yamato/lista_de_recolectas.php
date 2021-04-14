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
        case 'ppr':
            $strTituPagi = "Lista de Recolectas";
            $intRecoChof = DspDespacho::CantidadRecolectasPorCodiOper($intCodiOper);
            //------------------------------------------------------------------------------------------
            // Si el query arroja algún resultado, se muestra un formulario con la lista de recolectas,
            // Sino, se notifica al usuario que no se encontraron recolectas por hacer.
            //------------------------------------------------------------------------------------------
            if ($intRecoChof > 0) {
                $strListReco = '
                <a data-rel="back" data-role="button" data-theme="b" style="align-self:center;"><i class="fa fa-lg fa-mail-reply pull-left"></i>Volver</a>
                <br>
                <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d"
                    data-filter="true" data-filter-placeholder="Filtrar...">
                ';
                $arrRecoChof = DspDespacho::RecolectasPorCodiOper($intCodiOper);
                foreach ($arrRecoChof as $objRecoChof) {
                    $intCodiDesp = $objRecoChof->CodiDesp;
                    $strNombClie = $objRecoChof->NombClie;
                    $strDireClie = $objRecoChof->DireClie;
                    $strTeleClie = $objRecoChof->TeleClie;
                    $intCantPiez = $objRecoChof->CantBult;
                    $strContReco = $objRecoChof->TextObse;
                    $strListReco .= '
                            <li>
                                <a href="confirmacion_recolecta.php?id='.$intCodiDesp.'&ac=crp" data-rel="dialog">
                                    <h6>'.$strNombClie.'</h6>
                                    <p style="font-size:0.7em">'.$strDireClie.'</p>
                                    <p style="font-size:0.8em">Teléfono: '.$strTeleClie.'</p>
                                    <p style="font-size:1em">Piezas: '.$intCantPiez.'</p>
                                    <p style="font-size:0.8em">'.$strContReco.'</p>
                                </a>
                                <a href="aplazo_recolecta.php?id='.$intCodiOper.'">Razón de Aplazo</a>
                            </li>
                        ';
                }
                $strListReco .= '</ul>';
            } else {
                $strListReco = '
                <a data-rel="back" data-role="button" data-theme="b" style="align-self: center;"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Recolectas</a>
                ';
            }
            break;
        case 'rok':
            $strTituPagi = "Recolectas Realizadas";
            $intCantOkey = DspDespacho::CantidadRecolectasRealizadasHoy($intCodiOper);
            //-------------------------------------------------------------------------------------
            // Si el query arroja algún resultado, se muestra una lista de entregas,
            // en caso contrario se notifica al usuario que no se encontraron entregas pendientes
            //-------------------------------------------------------------------------------------
            if ($intCantOkey > 0) {
                $strListReco = '
                    <a data-rel="back" data-role="button" data-theme="b" style="align-self: center"><i class="fa fa-lg fa-mail-reply pull-left"></i>Volver</a><br>
                    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Filtrar...">
                ';
                $arrRecoOkey = DspDespacho::RecolectasRealizadasHoy($intCodiOper);
                foreach ($arrRecoOkey as $objRecoOkey) {
                    $intCodiDesp = $objRecoOkey->NombClie;
                    $strNombClie = $objRecoOkey->NombClie;
                    $strDireClie = $objRecoOkey->DireClie;
                    $strTeleClie = $objRecoOkey->TeleClie;
                    $intCantPiez = $objRecoOkey->CantBult;
                    $strContReco = $objRecoOkey->TextObse;

                    $strListReco .= '
                        <li>
                            <a href="detalle_de_recolecta.php?&id='.$intCodiDesp.'" data-rel="dialog">
                                <h6>'.$strNombClie.'</h6>
                                <p style="font-size:0.7em">'.$strDireClie.'</p>
                                <p style="font-size:0.8em">Teléfono: '.$strTeleClie.'</p>
                                <p style="font-size:1em">Piezas: '.$intCantPiez.'</p>
                                <p style="font-size:0.8em">'.$strContReco.'</p>
                            </a>
                        </li>
                    ';
                }
                $strListReco .= '</ul>';
            } else {
                $strListReco = '
                    <a data-rel="back" data-role="button" data-theme="b" style="align-self: center"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Recolectas</a>
                ';
            }
            break;
        default:
            break;
    }
}
?>
    <div data-role="page">
        <?php include('layout/page_header.inc.php'); ?>
            <div data-role="content">
                <?= $strListReco; ?>
            </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>