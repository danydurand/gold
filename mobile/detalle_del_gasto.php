<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Detalle del Gasto";

if (isset($_GET['id'])) {
    $intCodiGast = $_GET['id'];
    $objGastMani  = GastosManifiesto::Load($intCodiGast);
    $strDetaGast = '
    <div data-role="collapsible-set" data-inset="true" data-theme="e">
        <div data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles del Gasto</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Master:</td>
                        <td class="valor">'.$objGastMani->Master.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Fecha:</td>
                        <td class="valor">'.$objGastMani->Fecha.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Forma Pago:</td>
                        <td class="valor">'.$objGastMani->FormaPago.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Manejo LA:</td>
                        <td class="valor">'.$objGastMani->ManejoLinea.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Flete LA:</td>
                        <td class="valor">'.$objGastMani->FleteLinea.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Impuesto RMG:</td>
                        <td class="valor">'.$objGastMani->ImpuestoAgente.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Tasa Aduanal:</td>
                        <td class="valor">'.$objGastMani->TasaAduanal.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Timb. Fiscal:</td>
                        <td class="valor">'.$objGastMani->TimbreFiscal.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Otros:</td>
                        <td class="valor">'.$objGastMani->Otros.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div data-role="collapsible" style="font-size:14px;">
            <h3>Detalles de Flete e Impuesto</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Flete Facturado :</td>
                        <td class="valor">'.$objGastMani->FleteFacturado.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Flete Exonerado :</td>
                        <td class="valor">'.$objGastMani->FleteExonerado.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Imp. Facturado :</td>
                        <td class="valor">'.$objGastMani->ImpuestoFacturado.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Imp. Exonerado :</td>
                        <td class="valor">'.$objGastMani->ImpuestoExonerado.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>';
} else {
    $strDetaGast = '    
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
    </center>';
}
?>

    <div data-role="page" id="resultado">

        <?php include('layout/header_simple.inc.php') ?>

        <div data-role="content" >
            <?= $strDetaGast ?>
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
                width: 55%;
            }
            .valor {
                text-align: left;
                padding: 3px;
            }
        </style>
        <?php include('layout/page_footer.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 
