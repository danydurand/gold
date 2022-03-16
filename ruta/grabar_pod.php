<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');

/* @var $objChofCone Chofer */
$objChofCone = unserialize($_SESSION['User']);
$objChofCone->grabarLogMobile('Entrando al Menu Ppal');

tc('============');
tc('Grabando POD');
$strTituPagi = "Grabar POD";
$strTipoGuia = 'PE';
$intGrupGuia = 1;
$intManiIdxx = null;
$blnTodoOkey = true;
$blnOpciTrad = true;
if (isset($_POST['nomb'])) {
    tc('Hay datos en el POST del formulario');
    $_SESSION['idxx'] = $_POST['idxx'];
    $_SESSION['nomb'] = strtoupper($_POST['nomb']);
    $_SESSION['cedu'] = strtoupper($_POST['cedu']);
    $_SESSION['fent'] = $_POST['fent'];
    $_SESSION['hora'] = $_POST['hora'];
} else {
    $blnTodoOkey = false;
}
if (isset($_POST['midx'])) {
    $_SESSION['midx'] = $_POST['midx'];
} else {
    $blnOpciTrad = false;
}
if (isset($_POST['tipo'])) {
    $_SESSION['tipo'] = $_POST['tipo'];
} else {
    $blnOpciTrad = false;
}
if (isset($_POST['grup'])) {
    $_SESSION['grup'] = $_POST['grup'];
} else {
    $blnOpciTrad = false;
}
tc('Opcion Tradicional: '.$blnOpciTrad);
$strMultPodx = '';
$arrOtraProc = [];
if (isset($_POST['mult_podx'])) {
    $strMultPodx = $_POST['mult_podx'];
    if ($strMultPodx == 'S') {
        $arrOtraProc = unserialize($_SESSION['OtraProc']);
    }
}
$strMensErro = '';
if ($blnTodoOkey) {
    tc('Todo bien hasta ahora');
    if ($blnOpciTrad) {
        $strTipoGuia = $_SESSION['tipo'];
        $intGrupGuia = $_SESSION['grup'];
        $intManiIdxx = $_SESSION['midx'];
        t('Id del Manifiesto '.$intManiIdxx);
    }
    $intPiezIdxx = $_SESSION['idxx'];
    tc('Id de la Pieza: '.$intPiezIdxx);

    $strNombClie = $_SESSION['nomb'];
    $strCeduRifx = $_SESSION['cedu'];
    $strFechEntr = $_SESSION['fent'];
    $strHoraEntr = $_SESSION['hora'];

    $objPiezSele = GuiaPiezas::Load($intPiezIdxx);
    $objChofCone->grabarLogMobile('Grabando POD de la Pieza: '.$objPiezSele->IdPieza);
    $strResuRegi = '';

    $objDatabase = GuiaPiezas::GetDatabase();
    $objDatabase->TransactionBegin();

    if ($blnTodoOkey) {
        $intCantCkpt = 0;
        $objCheckpoint = Checkpoints::LoadByCodigo('OK');
        tc('Grabando Checkpoint a la Pieza desde Ruta-Mobile');
        //-------------------------------------------------
        // Se registra un Checkpoint "OK" para la pieza
        //-------------------------------------------------
        $arrDatoCkpt = array();
        $arrDatoCkpt['NumePiez'] = $objPiezSele->IdPieza;
        $arrDatoCkpt['GuiaAnul'] = $objPiezSele->Guia->Anulada();
        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
        $arrDatoCkpt['TextCkpt'] = 'Entregado A: '.trim($strNombClie).' | '.trim($strCeduRifx).' | '.$strFechEntr.' | '.$strHoraEntr;
        $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
        $arrDatoCkpt['CodiSucu'] = $objPiezSele->Guia->DestinoId;
        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
        if (!$arrResuGrab['TodoOkey']) {
            $strMensErro = $arrResuGrab['MotiNook'];
            tc('Error grabando Checkpoint OK desde Ruta-Mobile:'.$arrResuGrab['MotiNook']);
            $blnTodoOkey = false;
            $objDatabase->TransactionRollBack();
        } else {
            $intCantCkpt++;
            //-----------------------------------------
            // Misma Incidencia para multiples piezas
            //-----------------------------------------
            if ($strMultPodx == 'S') {
                if (count($arrOtraProc) > 0) {
                    foreach ($arrOtraProc as $objOtraPiez) {
                        //t('Grabando el OK a otra pieza: '.$objOtraPiez->IdPieza);
                        $arrDatoCkpt             = array();
                        $arrDatoCkpt['NumePiez'] = $objOtraPiez->IdPieza;
                        $arrDatoCkpt['GuiaAnul'] = $objOtraPiez->Guia->Anulada();
                        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
                        $arrDatoCkpt['TextCkpt'] = 'Entregado A: '.trim($strNombClie).' | '.trim($strCeduRifx).' | '.$strFechEntr.' | '.$strHoraEntr;
                        $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                        if (!$arrResuGrab['TodoOkey']) {
                            $strMensErro = $arrResuGrab['MotiNook'];
                            t('Error grabando Checkpoint OK desde Ruta-Mobile:' . $arrResuGrab['MotiNook']);
                            $blnTodoOkey = false;
                            $objDatabase->TransactionRollBack();
                        } else {
                            $intCantCkpt++;
                        }
                    }
                }
            }
            
        }
        if ($blnOpciTrad) {
            $objManiProc = Containers::Load($intManiIdxx);
            $objChofCone->grabarLogMobile('Actualizando Estadisticas del Manifiesto: '.$objManiProc->Numero);
            $objManiProc->ActualizarEstadisticasDeEntrega();
            $objChofCone->grabarLogMobile('Termino la actualizacion Estadisticas del Manifiesto');
        }
    }
    $objDatabase->TransactionCommit();
    if ($blnOpciTrad) {
        $strLinkReto = 'lista_de_guias.php?id='.$intManiIdxx.'&tg='.$strTipoGuia.'&gg='.$intGrupGuia;
    } else {
        $strLinkReto = 'detalle_de_guia_rastreo.php';
    }

    if ($blnTodoOkey) {
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson">¡El Detalle de la Entrega ha sido Registrado!!!<hr> Piezas Procesadas '.$intCantCkpt.'</span>
            <a href="'.$strLinkReto.'" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
        </center>
        ';
    } else {
        $strResuRegi = '
            <center class="mensaje">
                <span style="color:crimson"><p>¡Ha ocurrido un error!<hr>'.$strMensErro.' !!!</span>
            </center>
            <a href="lista_manifiestos.php" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
        ';
    }
} else {
    $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson"><p>¡Ha ocurrido un error!<hr>Intente más tarde !!!</span>
        </center>
        <a href="lista_manifiestos.php" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
    ';
}
?>
<?php include('layout/header.inc.php'); ?>

    <div data-role="page" id="resultado">

        <?php include('layout/page_header.inc.php') ?>
        <style>
            .mensaje {
                padding-top: 0.5em;
                padding-bottom: 2em;
            }
            .etiqueta {
                font-weight: bold;
                padding: 4px;
                text-align: right;
                vertical-align: top;
                width: 50%;
            }
            .valor {
                text-align: left;
                padding: 3px;
            }
        </style>

        <div data-role="content" >
            <?= $strResuRegi ?>
        </div>

        <?php include('layout/page_footer.inc.php') ?>;

    </div>

<?php include('layout/footer.inc.php') ?> 
