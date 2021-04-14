<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Detalle de la Guía";

// $objUsuario  = unserialize($_SESSION['User']);
// $arrClieVipx = $objUsuario->GetClienteVipArray();
// if ($arrClieVipx) {
//     $strClieVipx = '
//     <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Buscar...">
//     ';
//     foreach ($arrClieVipx as $objClieVipx) {
//         } else {
//         }

if (isset($_GET['id'])) {
    $intNumeGuia = $_GET['id'];
    $objGuiaSele  = Guia::Load($intNumeGuia);

    $objUltiCkpt = $objGuiaSele->GetUltiCkpt();
    if ($objUltiCkpt) {
        $strUltiCkpt = $objUltiCkpt->Observacion;
    } else {
        $strUltiCkpt = '';
    }

    $strDetaGuia = '
    <div data-role="collapsible-set" data-inset="true" data-theme="e">
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Contactar Cliente</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Cliente: </td>
                        <td class="valor">'.$objGuiaSele->Cliente->Nombre.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta"><i class="fa fa-phone fa-lg"></i></td>
                        <td class="valor"><a href="tel:'.$objGuiaSele->Cliente->TelefonoFijo.'">'.$objGuiaSele->Cliente->TelefonoFijo.'</a></td>
                    </tr>
                    <tr>
                        <td class="etiqueta"><i class="fa fa-mobile fa-2x"></i></td>
                        <td class="valor"><a href="tel:'.$objGuiaSele->Cliente->TelefonoMovil.'">'.$objGuiaSele->Cliente->TelefonoMovil.'</a></td>
                    </tr>
                    <tr>
                        <td class="etiqueta"><i class="fa fa-envelope-o fa-lg"></i></td>
                        <td class="valor"><a href="mailto:'.$objGuiaSele->Cliente->Email.'">'.$objGuiaSele->Cliente->Email.'</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles de la Guia</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Tracking:</td>
                        <td class="valor">'.$objGuiaSele->Tracking.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Fecha:</td>
                        <td class="valor">'.$objGuiaSele->Fecha.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Sub-Cliente:</td>
                        <td class="valor">'.$objGuiaSele->SubclienteId.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Contenido:</td>
                        <td class="valor">'.$objGuiaSele->Contenido.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Remitente:</td>
                        <td class="valor">'.$objGuiaSele->Remitente.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Total:</td>
                        <td class="valor">'.$objGuiaSele->Total.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Estatus:</td>
                        <td class="valor">'.$strUltiCkpt.'</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Detalles del Contenido</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Proveedor:</td>
                        <td class="valor">'.$objGuiaSele->Proveedor.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Valor USD:</td>
                        <td class="valor">'.$objGuiaSele->ValorDeclarado.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Piezas:</td>
                        <td class="valor">'.$objGuiaSele->CantPiezas.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Libras:</td>
                        <td class="valor">'.$objGuiaSele->Libras.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Medidas:</td>
                        <td class="valor">'.$objGuiaSele->Alto.'/'.$objGuiaSele->Ancho.'/'.$objGuiaSele->Largo.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Volumen:</td>
                        <td class="valor">'.$objGuiaSele->Volumen.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Montos e Impuestos</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Flete:</td>
                        <td class="valor">'.$objGuiaSele->Flete.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Manejo:</td>
                        <td class="valor">'.$objGuiaSele->Manejo.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">I.V.A.:</td>
                        <td class="valor">'.$objGuiaSele->Iva.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Nac.:</td>
                        <td class="valor">'.$objGuiaSele->Nacionalizacion.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Total:</td>
                        <td class="valor">'.$objGuiaSele->Total.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>';
} else {
    $strDetaGuia = '    
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
    </center>';
}
?>

    <div data-role="page" id="resultado">

        <?php include('layout/header_deta_guia.inc.php') ?>

        <div data-role="content" >
            <?= $strDetaGuia ?>
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
