<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['ManiIdxx'])) {
    echo "Se requiere el Id del Manifiesto a imprimir...";
    return;
}

$intManiIdxx = $_SESSION['ManiIdxx'];
$objManiImpr = ManifiestoExp::Load($intManiIdxx);
$objUsuario  = unserialize($_SESSION['User']);
$strNombProc = 'Impresion de Manif de Exp: ' . $objManiImpr->Numero;
$objProcEjec = CrearProceso($strNombProc, true);
//-----------------------------------------------------------------
// Se seleccionan las piezas asociadas directamente al Manifiesto
//-----------------------------------------------------------------
$arrPiezMani = $objManiImpr->GetGuiaPiezasAsPiezaArray(QQ::Clause(QQ::LimitInfo(1)));

$objDatabase = GuiasManifiesto::GetDatabase();
$strCadeSqlx  = "delete ";
$strCadeSqlx .= "  from guias_manifiesto ";
$strCadeSqlx .= " where manifiesto_id = $intManiIdxx;";
try {
    $objDatabase->NonQuery($strCadeSqlx);
} catch (Exception $e) {
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
    $intGuiaIdxx = $objPiezMani->GuiaId;
    $strGuiaNume = trim($objPiezMani->Guia->Numero);
    $strGuiaTrac = trim($objPiezMani->Guia->Tracking);
    $strNombRemi = chunk_split($objPiezMani->Guia->NombreRemitente, 10, '<br>');
    $strDireRemi = chunk_split($objPiezMani->Guia->DireccionRemitente, 15, '<br>');
    $strNombDest = chunk_split($objPiezMani->Guia->NombreDestinatario, 10, '<br>');
    $strNombAlia = chunk_split($objPiezMani->Guia->ClienteRetail->Nombre, 10, '<br>');
    $strDireDest = chunk_split($objPiezMani->Guia->DireccionDestinatario, 15, '<br>');
    $strNumeTele = trim($objPiezMani->Guia->TelefonoMovilDestinatario);
    $strCorrDest = trim($objPiezMani->Guia->EmailDestinatario);
    $strDescCont = chunk_split($objPiezMani->Guia->Contenido, 10, '<br>');
    $intCantPiez = 1;
    $decPesoEnvi = $objPiezMani->PiesCub;
    $decValoEnvi = $objPiezMani->ValorDeclarado ?  $objPiezMani->ValorDeclarado : 0;
    //------------------------------------------------------------------------------
    // La tabla guias_manifiesto se usa para almacenar la informacion de las guias
    // del manifiesto
    //------------------------------------------------------------------------------
    $strCadeSqlx  = "insert ";
    $strCadeSqlx .= "  into guias_manifiesto ";
    $strCadeSqlx .= "       (manifiesto_id, guia_id, numero, tracking, remitente, ";
    $strCadeSqlx .= "        direccion_remitente, destinatario, aliado, direccion_destinatario, ";
    $strCadeSqlx .= "        telefono, email, descripcion, piezas, peso, ";
    $strCadeSqlx .= "        valor, created_at, created_by) ";
    $strCadeSqlx .= "values ($intManiIdxx, $intGuiaIdxx, '$strGuiaNume', '$strGuiaTrac', '$strNombRemi',";
    $strCadeSqlx .= "       '$strDireRemi', '$strNombDest', '$strNombAlia', '$strDireDest', ";
    $strCadeSqlx .= "       '$strNumeTele', '$strCorrDest', '$strDescCont', $intCantPiez, $decPesoEnvi, ";
    $strCadeSqlx .= "        $decValoEnvi, '$dttFechCrea', $intCodiUsua) ";
    $strCadeSqlx .= "on duplicate key update piezas = piezas + $intCantPiez,";
    $strCadeSqlx .= "                        peso = peso + $decPesoEnvi,";
    $strCadeSqlx .= "                        valor = valor + $decValoEnvi;";
    try {
        $objDatabase->NonQuery($strCadeSqlx);
    } catch (Exception $e) {
        t('SQL Upsert: ' . $strCadeSqlx);
        t('Error: ' . $e->getMessage());
        $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
        $arrParaErro['NumeRefe'] = $objPiezMani->IdPieza;
        $arrParaErro['MensErro'] = $e->getMessage();
        $arrParaErro['ComeErro'] = 'upsert en la tabla guias_manifiesto';
        GrabarError($arrParaErro);
    }
}
$arrGuiaMani = GuiasManifiesto::LoadArrayByManifiestoId($intManiIdxx);

/* @var $objGuiaMani GuiasManifiesto */
?>
<style type="text/css">
    <!--
    .titulo {
        background-color: #CCC;
        font-weight: bold
    }

    .etiqueta {
        font-weight: bold
    }

    .contenido {
        text-align: left
    }

    .centrado {
        text-align: center;
    }

    table.page_footer {
        width: 100%;
        border: none;
        background-color: #DDDDFF;
        border-top: solid 1mm #AAAADD;
        padding: 2mm
    }
    -->
</style>
<page backtop="5mm" backbottom="5mm" backleft="2mm" backright="2mm">
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right">
                    pag. [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>

    <table style="width: 100%;" border="0">
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
                </table>
            </td>
            <td style="width: 620px; text-align: center">
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
    <table style="margin-top: 6px;" border="1">
        <tr class="titulo">
            <td style="width: 055px; text-align: center">Reciept<br>Guia No.</td>
            <td style="width: 020px; text-align: center">City-State<br>Ciudad-Estado</td>
            <td style="width: 075px; text-align: center">Shipper<br>Remitente</td>
            <td style="width: 085px; text-align: center">Consignee<br>Consignatario</td>
            <td style="width: 050px; text-align: center">Partner<br>Aliado</td>
            <td style="width: 100px; text-align: center">Address<br>Direccion</td>
            <td style="width: 070px; text-align: center">Phone<br>Telefono</td>
            <td style="width: 100px; text-align: center">E-mail<br>Correo</td>
            <td style="width: 080px; text-align: center">Description<br>Descripcion</td>
            <td style="width: 035px; text-align: center">Qty<br>Pzas</td>
            <td style="width: 035px; text-align: center">Value<br>Valor</td>
            <td style="width: 045px; text-align: center">Feet<br>P-Cub</td>
        </tr>
        <?php foreach ($arrGuiaMani as $objGuiaMani) { ?>
            <tr style="font-size: small">
                <td class="centrado"><?= $objGuiaMani->Numero ?></td>
                <td class="centrado"><?= $objGuiaMani->DireccionRemitente ?></td>
                <td class="centrado"><?= $objGuiaMani->Remitente ?></td>
                <td class="centrado"><?= $objGuiaMani->Destinatario ?></td>
                <td class="centrado"><?= $objGuiaMani->Aliado ?></td>
                <td class="centrado"><?= $objGuiaMani->DireccionDestinatario ?></td>
                <td class="centrado"><?= $objGuiaMani->Telefono ?></td>
                <td class="centrado"><?= $objGuiaMani->Email ?></td>
                <td class="centrado"><?= $objGuiaMani->Descripcion ?></td>
                <td class="centrado"><?= $objGuiaMani->Piezas ?></td>
                <td style="text-align: right"><?= nf($objGuiaMani->Valor) ?></td>
                <td style="text-align: right"><?= nf3($objGuiaMani->Peso) ?></td>
            </tr>
        <?php } ?>
    </table>
</page>