<?php
//------------------------------------------------------------------------------
// Programa      : etiqueta_pdf.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 03/09/2017
// Descripcion   : Este programa emite una etiqueta para los envios nacionales
//------------------------------------------------------------------------------
require_once ('qcubed.inc.php');
require_once (__APP_INCLUDES__.'/barcodelib.php');


function Bloque1($pdf, $intX, $intY, $objGuia, $objUsuario, $k) {

    global $strTipoLetr;

    global $decAnchPagi;
    global $decTamaGuia;
    global $decTamaRemi;
    global $decTamaDest;
    global $decTamaGui2;
    global $decTamaIdxx;
    global $decTamaFoot;
    global $decCodiBarx;
    global $decCodiBary;

    global $decSangDate;
    global $decSangGuia;
    global $decSangIdxx;
    global $decSangCodx;
    global $decSangCody;

    $pdf->SetFont($strTipoLetr, '', 9);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, 'Liberty Express C.A.', 0);

    $intDateX = $intX + $decSangDate;
    $pdf->SetXY($intDateX, $intY);
    $pdf->Cell(30, 5, date("d/m/Y"), 0);

    $intY += 11;
    $intGuiaX = $intX + $decSangGuia;
    $pdf->SetFont($strTipoLetr, 'B', $decTamaGuia);
    $pdf->SetXY($intGuiaX, $intY);
    $pdf->Cell(30, 5, $objGuia->NumeGuia, 0);

    $intY += 12;
    $pdf->SetFont($strTipoLetr, '', $decTamaRemi);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, 'Datos del Shipper/Remitente', 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, substr($objGuia->DireRemi, 0, 100), 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, substr($objGuia->DireRemi, 100, 100), 0);

//   $intY += 4;
//   $intPaisX = $intX + 90;
//   $pdf->SetFont($strTipoLetr, 'B', 98);
//   $pdf->SetXY($intPaisX, $intY);
    //$pdf->Cell(30, 5, $objGuia->Cliente->Pais->Siglas, 0);

    $pdf->SetFont($strTipoLetr, '', $decTamaRemi);
    //		$intY += 4;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, "Telefonos: " . $objGuia->TeleRemi, 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $strLineText = $objGuia->EstaOrig . "-" . $objGuia->EstaDest . "  " . $objGuia->FechGuia->__toString("DD/MM/YYYY") . "  " . $objGuia->CantPiez . " pieza(s)";
    $strLineText = "";
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $strLineText = "Peso: " . $objGuia->PesoGuia . " Kgs.";
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $strLineText = "Volumen: " . $objGuia->PesoVolumetrico;
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 5;
    $pdf->Line($intX, $intY, $intX + $decAnchPagi, $intY);

    //----------------------------------
    // Segundo bloque de informacion
    //----------------------------------

    $intY += 2;
    $pdf->SetFont($strTipoLetr, 'BI', $decTamaDest);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, 'Datos del Consignee/Destinatario', 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, trim($objGuia->NombDest) . " (COD#" . $objGuia->CodiClieObject->CodigoInterno . ")", 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, substr($objGuia->DireDest, 0, 66), 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, substr($objGuia->DireDest, 66, 66), 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, substr($objGuia->DireDest, 132, 66), 0);

    $intY += 4;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, 'Telefonos: ' . $objGuia->TeleDest, 0);

    $intY += 8;
    $pdf->Line($intX, $intY, $intX + $decAnchPagi, $intY);

    //----------------------------------
    // Tercer bloque de informacion
    //----------------------------------

    $intY += 2;
    $pdf->SetFont($strTipoLetr, 'B', $decTamaGui2);
    $strLineText = "Guia: #" . $objGuia->NumeGuia . "  " . $objGuia->EstaOrig . "-" . $objGuia->EstaDest;
    $intDataX = ((($decAnchPagi - strlen($strLineText)) / 2) - 5);
    $pdf->SetXY($intDataX - 5, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

//   $intY += 10;
//   $pdf->SetFont($strTipoLetr, 'B', 42);
//   $pdf->SetXY($intDataX - 15, $intY);
//   $strLineText = '';
//   $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 8;
    $pdf->Line($intX, $intY, $intX + $decAnchPagi, $intY);

    //----------------------------------
    // Cuarto bloque de informacion
    //----------------------------------

    $intY += 6;

    if ($objGuia->ClienteId == 2341) {
        $pdf->SetFont($strTipoLetr, 'B', 46);
//      $intIdX = 10;
        $intIdX = $decSangIdxx - 20;
        $strLineText = $objGuia->EstaDest . " NO-ID " . $k . "/" . $objGuia->CantPiez;
    } else {
        $pdf->SetFont($strTipoLetr, 'B', $decTamaIdxx);
        $intIdX = $decSangIdxx;
        $strLineText = $objGuia->EstaDest . " " . $k . "/" . $objGuia->CantPiez;
    }
    $pdf->SetXY($intIdX, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 10;
    $pdf->Line($intX, $intY, $intX + $decAnchPagi, $intY);

    //----------------------------------
    // Quinto bloque de informacion
    //----------------------------------

    $pdf->SetFont($strTipoLetr, '', $decTamaFoot);

    $intY += 6;
    $intX = 8;
    $strLineText = "Documento OFICIAL-Este documento fue generado por el agente autorizado LIBERTY EXPRESS.";
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 6;
    $strLineText = "Impreso en: " . $objUsuario->CodiEstaObject->DescEsta . " [" . date("Y-m-d H:i:s") . "]";
    $intX = ((($decAnchPagi - strlen($strLineText)) / 2) - 5);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 6;
    $strLineText = "Elaborado por: L U F E M A N, C. A.";
    $intX = ((($decAnchPagi - strlen($strLineText)) / 2) - 5);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += $decSangCody;
    $intX = $decSangCodx;
    $pdf->Codabar($intX, $intY, $objGuia->NumeGuia, 'A', 'A', $decCodiBary, $decCodiBarx);

}

//--------------------------------------
// P r o g r a m a    P r i n c i p a l
//--------------------------------------

$blnTodoOkey = true;
if (isset($_SESSION['GuiaAImprimir'])) {
    $objGuia = unserialize($_SESSION['GuiaAImprimir']);
    $arrVariGuia[] = $objGuia;
    unset($_SESSION['GuiaAImprimir']);
} else {
    if (isset($_GET['strNumeGuia'])) {
        $strNumeGuia = $_GET['strNumeGuia'];
        $objGuia = Guia::Load($strNumeGuia);
        if (!$objGuia) {
            echo "No existe la guia $strNumeGuia<br>";
            $blnTodoOkey = false;
        } else {
            $arrVariGuia[] = $objGuia;
        }
    } else {
        if (isset($_SESSION['arrGuiaLote'])) {
            $arrGuiaLote   = unserialize($_SESSION['arrGuiaLote']);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::In(QQN::Guia()->NumeGuia,$arrGuiaLote);
            $arrVariGuia   = Guia::QueryArray(QQ::AndCondition($objClauWher));
            if (!$arrVariGuia) {
                echo "No existen las guias: <br>";
                print_r($arrGuiaLote);
                $blnTodoOkey = false;
            }
        } else {
            echo "No se ha proporcionado un Numero o un Lote de Guia(s)<br>";
            $blnTodoOkey = false;
        }
    }
}

if ($blnTodoOkey) {
    if (isset($_SESSION['User'])) {
        $objUsuario = unserialize($_SESSION['User']);
    } else {
        echo "Se ha perdido la referencia al Usuario, por favor vuelva a conectarse<br>";
        $blnTodoOkey = false;
    }
}

if ($blnTodoOkey) {

    //------------------------------------------------------
    // Aqui se establecen valores globles para la impresion
    //------------------------------------------------------
    $objMediEtiq = BuscarParametro('AjusEtiq','MediEtiq','TODO',null);
    if ($objMediEtiq) {
        $decSangDate = floatval($objMediEtiq->ParaTxt1);
        $decSangGuia = floatval($objMediEtiq->ParaTxt2);
        $decSangIdxx = floatval($objMediEtiq->ParaTxt3);
        $decSangCodx = floatval($objMediEtiq->ParaTxt4);
        $decSangCody = floatval($objMediEtiq->ParaTxt5);
        $decMediPagx = $objMediEtiq->ParaVal1;
        $decMediPagy = $objMediEtiq->ParaVal2;
        $decMargIzqu = $objMediEtiq->ParaVal3;
        $decAnchPagi = $objMediEtiq->ParaVal4;
        $decMargSupe = $objMediEtiq->ParaVal5;
    } else {
        $decSangDate = 120;
        $decSangGuia = 25;
        $decSangIdxx = 30;
        $decSangCodx = 20;
        $decSangCody = 14;
        $decMediPagx = 148;
        $decMediPagy = 210;
        $decMargIzqu = 5;
        $decAnchPagi = 140;
        $decMargSupe = 10;
    }


    $objTamaEtiq = BuscarParametro('AjusEtiq','TamaEtiq','TODO',null);
    if ($objTamaEtiq) {
        $decTamaGuia = floatval($objTamaEtiq->ParaTxt1);
        $decCodiBarx = floatval($objTamaEtiq->ParaTxt2);
        $decCodiBary = floatval($objTamaEtiq->ParaTxt3);
        $decTamaRemi = $objTamaEtiq->ParaVal1;
        $decTamaDest = $objTamaEtiq->ParaVal2;
        $decTamaGui2 = $objTamaEtiq->ParaVal3;
        $decTamaIdxx = $objTamaEtiq->ParaVal4;
        $decTamaFoot = $objTamaEtiq->ParaVal5;

    } else {
        $decTamaGuia = 62;
        $decCodiBarx = 16;
        $decCodiBary = 1.3;
        $decTamaRemi = 8;
        $decTamaDest = 10;
        $decTamaGui2 = 12;
        $decTamaIdxx = 58;
        $decTamaFoot = 7;
    }

    $strTipoLetr = 'Courier';

//   $pdf = new PDF_Codabar('P', 'mm', 'A5'); // 297,420:A3 - 210,297:A4 - 148,210:A5 - 105,148:A6
    $pdf = new PDF_Codabar('P', 'mm', array($decMediPagx,$decMediPagy));
    foreach ($arrVariGuia as $objGuia) {
        $pdf->AliasNbPages();
        for($k = 1; $k <= $objGuia->CantPiez; $k++) {
            $pdf->AddPage();
            Bloque1($pdf, $decMargIzqu, $decMargSupe, $objGuia, $objUsuario, $k);
        }
    }
    $pdf->Output();
}
?>
