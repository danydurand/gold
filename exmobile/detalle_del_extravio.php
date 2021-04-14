<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_GET['id'])) {
    $intCodiExtr = $_GET['id'];
    $objEnviExtr  = Extravio::Load($intCodiExtr);
    $strSepaGoxx  = $objEnviExtr->SePago == 1 ? "SI" : "NO";
    $strEstaExtr  = $objEnviExtr->Cerrado == 1 ? "CERRADO" : "PENDIENTE";
    $strSedeVolv  = $objEnviExtr->SeDevolvio == 1 ? "SI" : "NO";

    $strDetaExtr = '
    <div data-role="collapsible-set" data-inset="true" data-theme="e">
        <div data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles del Extravío</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Tracking :</td>
                        <td class="valor">'.$objEnviExtr->Tracking.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Fecha :</td>
                        <td class="valor">'.$objEnviExtr->Fecha.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Pagado :</td>
                        <td class="valor">'.$strSepaGoxx.'</td>
                    </tr>';
    if ($strSepaGoxx == 'SI') {
        $strDetaExtr .= '        
                    <tr>
                        <td class="etiqueta">Mto Pago :</td>
                        <td class="valor">'.$objEnviExtr->MontoPagado.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Q. Pagó?:</td>
                        <td class="valor">'.$objEnviExtr->QuienPago.'</td>
                    </tr>';
    }
    $strDetaExtr .= '
                    <tr>
                        <td class="etiqueta">Proc.Por :</td>
                        <td class="valor">'.$objEnviExtr->ProcesadoPor.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Se Devolvió ? :</td>
                        <td class="valor">'.$strSedeVolv.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Estatus :</td>
                        <td class="valor">'.$strEstaExtr.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Descrip. :</td>
                        <td class="valor">'.$objEnviExtr->Descripcion.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>';
} else {
    $strDetaExtr = '    
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
    </center>';
}
?>

    <div data-role="page" id="resultado">

        <?php include('layout/header_simple.inc.php') ?>

        <div data-role="content" >
            <?= $strDetaExtr ?>
        </div>

        <style>
            a {
                text-decoration: none;
            }
            .etiqueta {
                font-weight: bold;
                padding: 2px;
                text-align: right;
                vertical-align: top;
                width: 40%;
            }
            .valor {
                text-align: left;
                padding: 3px;
            }
        </style>
        <?php include('layout/page_footer.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 
