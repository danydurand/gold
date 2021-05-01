<?php
//------------------------------------------------------------------------------
// Programa      : etiqueta_pdf.php
// Realizado por : Irán Anzola
// Fecha Elab.   : 14/08/2013
// Descripcion   : Este programa emite una etiqueta para los envios nacionales
//------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/barcodelib.php');


function Bloque1($pdf, $intX, $intY, $objGuia, $objUsuario, $k) {

    global $strTipoLetr;
    global $intAnchPagi;

    $pdf->SetFont($strTipoLetr, '', 9);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, 'Liberty Express C.A.... http://www.goldsist.com', 0);

    $intX += 120;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, date("d/m/Y"), 0);

    $intY += 11;
    $intX -= 117;
    $pdf->SetFont($strTipoLetr, 'B', 62);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, $objGuia->NumeGuia, 0);

    $intY += 12;
    $intX = 5;
    $pdf->SetFont($strTipoLetr, '', 8);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, 'Datos del Shipper/Remitente', 0);

    $intY += 4;
    $intX = 5;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, substr($objGuia->DireRemi, 0, 100), 0);

    $intY += 4;
    $intX = 5;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, substr($objGuia->DireRemi, 100, 100), 0);

    $intY += 4;
    $intX += 90;
    $pdf->SetFont($strTipoLetr, 'B', 98);
    $pdf->SetXY($intX, $intY);
    //$pdf->Cell(30, 5, $objGuia->Cliente->Pais->Siglas, 0);

    $pdf->SetFont($strTipoLetr, '', 8);
    //		$intY += 4;
    $intX -= 90;
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, "Telefonos: " . $objGuia->TeleRemi, 0);

    $intY += 4;
    $intX = 5;
    $pdf->SetXY($intX, $intY);
    $strLineText = $objGuia->EstaOrig . "-" . $objGuia->EstaDest . "  " . $objGuia->FechGuia->__toString("DD/MM/YYYY") . "  " . $objGuia->CantPiez . " pieza(s)";
    $strLineText = "";
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 4;
    $intX = 5;
    $pdf->SetXY($intX, $intY);
    $strLineText = "Peso: " . $objGuia->PesoGuia . " Kgs.";
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 4;
    $intX = 5;
    $pdf->SetXY($intX, $intY);
    $strLineText = "Volumen: " . $objGuia->PesoVolumetrico;
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 5;
    $intX = 5;
    $pdf->Line($intX, $intY, $intX + $intAnchPagi, $intY);

    //----------------------------------
    // Segundo bloque de informacion
    //----------------------------------


    $intY += 2;
    $pdf->SetFont($strTipoLetr, 'BI', 10);
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
    $intX = 8;
    $pdf->Line($intX, $intY, $intX + $intAnchPagi, $intY);

    //----------------------------------
    // Tercer bloque de informacion
    //----------------------------------

    $intY += 2;
    $pdf->SetFont($strTipoLetr, 'B', 12);
    $strLineText = "Guia: #" . $objGuia->NumeGuia . "  " . $objGuia->EstaOrig . "-" . $objGuia->EstaDest;
    $intX = ((($intAnchPagi - strlen($strLineText)) / 2) - 5);
    $pdf->SetXY($intX - 5, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 10;
    $pdf->SetFont($strTipoLetr, 'B', 42);
    $pdf->SetXY($intX - 15, $intY);
    $strLineText = '';
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 5;
    $intX = 5;
    $pdf->Line($intX, $intY, $intX + $intAnchPagi, $intY);

    //----------------------------------
    // Cuarto bloque de informacion
    //----------------------------------

    $intY += 6;

    if ($objGuia->ClienteId == 2341) {
        $pdf->SetFont($strTipoLetr, 'B', 46);
        $intX = 10;
        $strLineText = $objGuia->EstaDest . " NO-ID " . $k . "/" . $objGuia->CantPiez;
    } else {
        $pdf->SetFont($strTipoLetr, 'B', 58);
        $intX = 30;
        $strLineText = $objGuia->EstaDest . " " . $k . "/" . $objGuia->CantPiez;
    }
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 12;
    $intX = 5;
    $pdf->Line($intX, $intY, $intX + $intAnchPagi, $intY);

    //----------------------------------
    // Quinto bloque de informacion
    //----------------------------------

    $pdf->SetFont($strTipoLetr, '', 7);

    $intY += 6;
    $intX = 8;
    $strLineText = "Documento OFICIAL-Este documento fue generado por el agente autorizado LIBERTY EXPRESS.";
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 6;
    $strLineText = "Impreso en: " . $objUsuario->CodiEstaObject->DescEsta . " [" . date("Y-m-d H:i:s") . "]";
    $intX = ((($intAnchPagi - strlen($strLineText)) / 2) - 5);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 6;
    $strLineText = "Elaborado por: L U F E M A N, C. A.";
    $intX = ((($intAnchPagi - strlen($strLineText)) / 2) - 5);
    $pdf->SetXY($intX, $intY);
    $pdf->Cell(30, 5, $strLineText, 0);

    $intY += 14;
    $intX = 1.5;
    $pdf->Codabar($intX, $intY, $objGuia->NumeGuia, 'A', 'A', 1.3, 16);

}

//--------------------------------------------------------
// P r o g r a m a    P r i n c i p a l
//--------------------------------------------------------

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

    $objLogoEmpr = BuscarParametro('88888', 'logos', 'TODO', -1);
    $objDatoEmpr = BuscarParametro('88888', 'datfisc', 'TODO', -1);
    $strLogoEmpr = $objLogoEmpr->ParaTxt1;
    $strNombEmpr = $objDatoEmpr->ParaTxt1;
    $strDireEmpr = $objDatoEmpr->ParaTxt2;
    $strTeleEmpr = $objDatoEmpr->ParaTxt4;
    $strHabiPost = $objLogoEmpr->ParaTxt5;

    $strTipoLetr = 'Courier';
    $intAnchPagi = 140;

    $pdf = new PDF_Codabar('P', 'mm', 'A5');
    foreach ($arrVariGuia as $objGuia) {
        $pdf->AliasNbPages();
        for($k = 1; $k <= $objGuia->CantPiez; $k++) {
            $pdf->AddPage();
            Bloque1($pdf, 5, 10, $objGuia, $objUsuario, $k);
        }
    }
    $pdf->Output();
}
?>