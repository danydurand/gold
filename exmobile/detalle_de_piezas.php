<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_GET['id'])) {
    $intNumeGuia  = $_GET['id'];
    $objGuiaSele  = Guia::Load($intNumeGuia);
    $arrPiezGuia  = $objGuiaSele->GetPiezasArray();
    $decSumaLibr  = 0;
    $decSumaVolu  = 0;

    $strDetaPieza = '
    <div data-role="collapsible-set" data-inset="true" data-theme="b">
        <div data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles de las Piezas</h3>
            <table border="0.5px" width="100%">
                <tbody>
                    <tr>
                        <th class="etiqueta">Libras</th>
                        <th class="etiqueta">Al / An / La</th>
                        <th class="etiqueta">Volumen</th>
                    </tr>';
    foreach ($arrPiezGuia as $objPiezGuia) {
        $decSumaLibr += $objPiezGuia->Libras;
        $decSumaVolu += $objPiezGuia->Volumen;
        $strDetaPieza .= '
                    <tr>
                        <td class="valor">'.$objPiezGuia->Libras.'</td>
                        <td class="valor">'.$objPiezGuia->Alto.' / '.$objPiezGuia->Ancho.' / '.$objPiezGuia->Largo.'</td>
                        <td class="valor">'.$objPiezGuia->Volumen.'</td>
                    </tr>';
    }
    $strDetaPieza .= '
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th class="etiqueta" colspan="3">Total de Libras y Volumen</th>
                    </tr>
                    <tr>
                        <td class="valor" colspan="3">
                            '.$decSumaLibr.' (Lbs) / '.$decSumaVolu.' (Vol)
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>';
} else {
    $strDetaPieza = '    
    <center>
        No se encontraron piezas para esta guía <br>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
    </center>';
}
?>

    <div data-role="page" id="resultado">

        <?php include('layout/header_deta_guia.inc.php') ?>

        <div data-role="content" >
            <?= $strDetaPieza ?>
        </div>

        <style>
            a {
                text-decoration: none;
            }
            .etiqueta {
                font-weight: bold;
                padding: 2px;
            }
            .valor {
                text-align: center;
                padding: 3px;
            }
        </style>
        <?php include('layout/page_footer.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 
