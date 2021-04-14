<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_GET['es'])) {
    $strTipoSoli = $_GET['es'];
    $intNumeGuia = $_GET['id'];
    $objGuiaSele = Guia::Load($intNumeGuia);

    switch ($strTipoSoli) {
        case 'rete':
            $objGuiaSele->Retener = true;
            $strAcciSele = "Retener => 1";
            $strTextSoli = "Retención";
            break;
        case 'reem':
            $objGuiaSele->Reempacar = true;
            $strAcciSele = "Reempacar => 1";
            $strTextSoli = "Reempaque";
            break;
        case 'mari':
            $objGuiaSele->Maritimo = true;
            $strAcciSele = "Maritimo => 1";
            $strTextSoli = "Marítimo";
            break;
    }

    $objGuiaSele->ApiModificion = '*';
    $objGuiaSele->Save();
    
    $arrLogxCamb['strNombTabl'] = 'Guia';
    $arrLogxCamb['intRefeRegi'] = $objGuiaSele->Id;
    $arrLogxCamb['strNombRegi'] = $objGuiaSele->Id;
    $arrLogxCamb['strDescCamb'] = $strAcciSele;
    $arrLogxCamb['strSistTran'] = "exmobile";
    LogDeCambios($arrLogxCamb);

    $strMensUsua = 'Solicitud de '.$strTextSoli.' Registrada';
} else {
    $strMensUsua = '';
}

if (isset($_GET['id'])) {
    $intNumeGuia = $_GET['id'];
    $objGuiaSele = Guia::Load($intNumeGuia);
    $strGuiaCanc = $objGuiaSele->Cancelada ? 'SI' : 'NO';

    $strDetaGuia = '
    <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="b">
        <div data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles de la Guia</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Tracking:</td>
                        <td class="valor">'.$objGuiaSele->Tracking.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Guia:</td>
                        <td class="valor">'.$objGuiaSele->Id.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Fecha:</td>
                        <td class="valor">'.$objGuiaSele->Fecha.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Remitente:</td>
                        <td class="valor">'.$objGuiaSele->Remitente.'</td>
                    </tr>      
                    <tr>
                        <td class="etiqueta">Proveedor:</td>
                        <td class="valor">'.$objGuiaSele->Proveedor.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Total:</td>
                        <td class="valor">'.$objGuiaSele->Total.' Bs</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Cancelado?</td>
                        <td class="valor">'.$strGuiaCanc;
    if ($strGuiaCanc == 'SI') {
        $strDetaGuia .= '<a href="detalle_de_pago.php?gid='.$objGuiaSele->Id.'&pid='.$objGuiaSele->PagoId.'" data-rel="dialog">
                            <i class="fa fa-lg fa-money" style="padding-left:0.5em"></i></a>';
    }
        $strDetaGuia .= '
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Detalles del Paquete</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Contenido:</td>
                        <td class="valor">'.$objGuiaSele->Contenido.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Valor USD:</td>
                        <td class="valor">'.$objGuiaSele->ValorDeclarado.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Piezas:</td>
                        <td class="valor">'.$objGuiaSele->CantPiezas.' <a href="detalle_de_piezas.php?id='.$objGuiaSele->Id.'" data-rel="dialog">
                        <i class="fa fa-lg fa-cubes" style="padding-left:0.5em"></i></a></td>
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
        <div data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Montos e Impuestos</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Flete:</td>
                        <td class="valor">'.$objGuiaSele->Flete.' Bs</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Manejo:</td>
                        <td class="valor">'.$objGuiaSele->Manejo.' Bs</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">I.V.A.:</td>
                        <td class="valor">'.$objGuiaSele->Iva.' Bs</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Nacionalización:</td>
                        <td class="valor">'.$objGuiaSele->Nacionalizacion.' Bs</td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Total:</td>
                        <td class="valor">'.$objGuiaSele->Total.' Bs</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div data-role="collapsible" data-collapsed="true" style="font-size:14px; text-align:center;">
            <h3>Solicitudes</h3>
            <a href="detalle_de_guia.php?id='.$intNumeGuia.'&es="rete" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"> <i class="fa fa-archive pull-left"></i>Retener</a>
            <a href="detalle_de_guia.php?id='.$intNumeGuia.'&es="reem" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"><i class="fa fa-lg fa-gift pull-left"></i>Re-Empacar</a>
            <a href="detalle_de_guia.php?id='.$intNumeGuia.'&es="mari" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"><i class="fa fa-ship pull-left"></i>Marítimo</a>
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
        <?php include('layout/page_footer_deta.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 
