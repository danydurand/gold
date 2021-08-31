<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['ManiIdxx'])) {
    echo "Se requiere el Id del Manifiesto a imprimir...";
    return;
}

//t('======================');
//t('Imprimiendo Manifiesto');
$intManiIdxx = $_SESSION['ManiIdxx'];
$objManiImpr = ManifiestoExp::Load($intManiIdxx);
$objUsuario  = unserialize($_SESSION['User']);
$strNombProc = 'Impresion de Manif de Exp: '.$objManiImpr->Numero;
$objProcEjec = CrearProceso($strNombProc,true);
//-----------------------------------------------------------------
// Se seleccionan las piezas asociadas directamente al Manifiesto
//-----------------------------------------------------------------
$arrPiezMani = $objManiImpr->GetGuiaPiezasAsPiezaArray();
//t('El Manifiesto tiene: '.count($arrPiezMani).' piezas');

$objDatabase = GuiasManifiesto::GetDatabase();
$strCadeSqlx  = "delete ";
$strCadeSqlx .= "  from guias_manifiesto ";
$strCadeSqlx .= " where manifiesto_id = $intManiIdxx;";
try {
    $objDatabase->NonQuery($strCadeSqlx);
} catch (Exception $e) {
    //t('SQL Delete: '.$strCadeSqlx);
    //t('Error: '.$e->getMessage());
    $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
    $arrParaErro['NumeRefe'] = $objManiImpr->Numero;
    $arrParaErro['MensErro'] = $e->getMessage();
    $arrParaErro['ComeErro'] = 'borrando las guias del manifiesto en la impresion';
    GrabarError($arrParaErro);
    return;
}
$dttFechCrea = date('Y-m-d H:i');
$intCodiUsua = $objUsuario->CodiUsua;
foreach ($arrPiezMani as $objPiezMani) {
    //t('Procesando la pieza: '.$objPiezMani->IdPieza);
    $intGuiaIdxx = $objPiezMani->GuiaId;
    $strGuiaNume = $objPiezMani->Guia->Numero;
    $strGuiaTrac = $objPiezMani->Guia->Tracking;
    $strNombRemi = $objPiezMani->Guia->NombreRemitente;
    $strNombDest = $objPiezMani->Guia->NombreDestinatario;
    $strDescCont = $objPiezMani->Guia->Contenido;
    $intCantPiez = 1;
    $decPesoEnvi = $objPiezMani->PiesCub;
    $decValoEnvi = $objPiezMani->ValorDeclarado ?  $objPiezMani->ValorDeclarado : 0;
    //------------------------------------------------------------------------------
    // La tabla guias_manifiesto se usa para almacenar la informacion de las guias
    // del manifiesto
    //------------------------------------------------------------------------------
    $strCadeSqlx  = "insert ";
    $strCadeSqlx .= "  into guias_manifiesto ";
    $strCadeSqlx .= "values ($intManiIdxx,$intGuiaIdxx,'$strGuiaNume','$strGuiaTrac','$strNombRemi',";
    $strCadeSqlx .= "'$strNombDest','$strDescCont',$intCantPiez,$decPesoEnvi,$decValoEnvi,";
    $strCadeSqlx .= "'$dttFechCrea',$intCodiUsua) ";
    $strCadeSqlx .= "on duplicate key update piezas = piezas + $intCantPiez,";
    $strCadeSqlx .= "                        peso = peso + $decPesoEnvi,";
    $strCadeSqlx .= "                        valor = valor + $decValoEnvi;";
    try {
        $objDatabase->NonQuery($strCadeSqlx);
    } catch (Exception $e) {
        t('SQL Upsert: '.$strCadeSqlx);
        t('Error: '.$e->getMessage());
        $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
        $arrParaErro['NumeRefe'] = $objPiezMani->IdPieza;
        $arrParaErro['MensErro'] = $e->getMessage();
        $arrParaErro['ComeErro'] = 'upsert en la tabla guias_manifiesto';
        GrabarError($arrParaErro);
    }
}
$arrGuiaMani = GuiasManifiesto::LoadArrayByManifiestoId($intManiIdxx);
//t('Ahora tengo: '.count($arrGuiaMani).' guias en el manifiesto');

/* @var $objGuiaMani GuiasManifiesto */
?>
<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    .etiqueta { font-weight: bold }
    .contenido { text-align: left }
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table style="width: 100%; margin-top: 12px" border="0">
            <tr>
                <td style="width: 100%; text-align: center; font-weight: bold">Manifiesto de Exportacion Marítima</td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 200px; text-align: right">
                    <table border="0">
                        <tr>
                            <td class="etiqueta">Manifiesto Nro:</td>
                            <td class="contenido"><?= $objManiImpr->Numero ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Cliente:</td>
                            <td class="contenido">GOLD COAST</td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Origen:</td>
                            <td class="contenido"><?= $objManiImpr->Origen->Nombre ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Transporte:</td>
                            <td class="contenido"><?= $objManiImpr->Transporte ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Guia Madre:</td>
                            <td class="contenido"><?= $objManiImpr->Master ?></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 580px; text-align: center">
                    <br>
                </td>
                <td style="width: 200px; text-align: right">
                    <table border="0">
                        <tr>
                            <td class="etiqueta">Fecha Despacho:</td>
                            <td class="contenido"><?= $objManiImpr->FechaDespacho->__toString("DD/MM/YYYY") ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Destino:</td>
                            <td class="contenido"><?= $objManiImpr->Destino->Nombre ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Valor:</td>
                            <td class="contenido"><?= nf($objManiImpr->Valor) ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Booking:</td>
                            <td class="contenido"><?= $objManiImpr->Booking ?></td>
                        </tr>
                        <tr>
                            <td><br></td>
                            <td><br></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!---------------------->
        <!--  Lista de Piezas -->
        <!---------------------->
        <table style="margin-top: 24px;" border="1">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 080px; text-align: center">Nro Guia</td>
                <td style="width: 200px; text-align: left">Remitente</td>
                <td style="width: 200px; text-align: left">Destinatario</td>
                <td style="width: 200px; text-align: left">Descripcion</td>
                <td style="width: 080px; text-align: center">Piezas</td>
                <td style="width: 080px; text-align: center">PiesCub</td>
                <td style="width: 080px; text-align: center">Valor $</td>
            </tr>
            <?php foreach ($arrGuiaMani as $objGuiaMani) { ?>
                <tr style="font-size: small">
                    <td style="text-align: center"><?= $objGuiaMani->Numero ?></td>
                    <td style="text-align: left"><?= substr($objGuiaMani->Remitente,0,25) ?></td>
                    <td style="text-align: left"><?= substr($objGuiaMani->Destinatario,0,25) ?></td>
                    <td style="text-align: left"><?= substr($objGuiaMani->Descripcion,0,25) ?></td>
                    <td style="text-align: center"><?= $objGuiaMani->Piezas ?></td>
                    <td style="text-align: right"><?= nf3($objGuiaMani->Peso) ?></td>
                    <td style="text-align: right"><?= nf($objGuiaMani->Valor) ?></td>
                </tr>
            <?php } ?>
        </table>
    </page_header>
</page>
