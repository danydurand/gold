<?php
//---------------------------------------------------------------------------------------------------
// Programa       : exportar_guias.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 03/11/16 04:39 PM
// Proyecto       : newliberty
// Descripcion    : Este programa exporta una lista de guías de un Cliente Master en un archivo .XLS
//----------------------------------------------------------------------------------------------------
require('qcubed.inc.php');

$blnTodoOkey = false;
$objClauWher = QQ::Clause();
$objUsuario  = unserialize($_SESSION['User']);

if (isset($_SESSION['CritXlsx'])) {
    $objClauWher = unserialize($_SESSION['CritXlsx']);
    $blnTodoOkey = true;
}

if ($blnTodoOkey) {
    $arrEncaDato = array(
        'SubCuenta',
        'Guia Nro.',
        'Fecha',
        'Remitente',
        'Destinatario',
        'Peso',
        'Mto Base',
        'F.Postal',
        'Seguro',
        'I.V.A.',
        'Mto Total',
        'V. Decl',
        'F.Pago',
        'ORI-DES',
        'Status',
        'Fecha Status',
        'Hora Status'
    );
    $arrDatoExpo = array();
    $objClauOrde[] = QQ::OrderBy(QQN::Guia()->FechGuia, false, QQN::Guia()->NumeGuia, false);
    $arrDatoRepo = Guia::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
    foreach ($arrDatoRepo as $objDatoExpo) {
        //-------------------------------------------------------
        // Si la Guía tiene su checkpoint, se agrega al reporte.
        //-------------------------------------------------------
        $strDescCkpt = '';
        if (strlen($objDatoExpo->CodiCkpt) > 0) {
            $objCheckpoint = SdeCheckpoint::Load($objDatoExpo->CodiCkpt);
            $strDescCkpt = $objCheckpoint->DescDevo;
        }
        //----------------------------------------
        // Se arma el vector de datos del reporte
        //----------------------------------------
        $arrDatoExpo[] = array(
            $objDatoExpo->CodiClieObject->CodigoInterno,
            $objDatoExpo->NumeGuia,
            $objDatoExpo->FechGuia->__toString("DD/MM/YYYY"),
            $objDatoExpo->NombRemi,
            $objDatoExpo->NombDest,
            nf($objDatoExpo->PesoGuia),
            nf($objDatoExpo->MontoBase),
            nf($objDatoExpo->MontoFranqueo),
            nf($objDatoExpo->MontoSeguro),
            nf($objDatoExpo->MontoIva),
            nf($objDatoExpo->MontoTotal),
            nf($objDatoExpo->ValorDeclarado),
            TipoGuiaType::ToStringCorto($objDatoExpo->TipoGuia),
            $objDatoExpo->EstaOrig.' - '.$objDatoExpo->EstaDest,
            $strDescCkpt,
            $objDatoExpo->FechCkpt ? $objDatoExpo->FechCkpt->__toString("DD/MM/YYYY") : '',
            $objDatoExpo->HoraCkpt ? $objDatoExpo->HoraCkpt : ''
        );
    }

    $objValoRepo = new stdClass();
    $objValoRepo->arrEncaDato = $arrEncaDato;
    $objValoRepo->arrDatoExpo = $arrDatoExpo;
    $objValoRepo->strTituRepo = 'Guias_'.QuitarEspaciosPuntosYComas($objUsuario->Cliente->NombClie);
    $objValoRepo->blnConxBord = true;

    $objExpoDato = new ExportarDatos($objValoRepo);
    echo $objExpoDato->Exportar();
}