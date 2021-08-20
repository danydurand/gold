<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');

t('============');
t('Grabando POD');
$strTituPagi = "Grabar POD";
$blnTodoOkey = true;

if (isset($_POST['nomb'])) {
    t('Hay datos en el POST del formulario');
    $_SESSION['idxx'] = $_POST['idxx'];
    $_SESSION['midx'] = $_POST['midx'];
    $_SESSION['nomb'] = strtoupper($_POST['nomb']);
    $_SESSION['cedu'] = strtoupper($_POST['cedu']);
    $_SESSION['fent'] = $_POST['fent'];
    $_SESSION['hora'] = $_POST['hora'];
} else {
    $blnTodoOkey = false;
}
$strMultPodx = '';
$arrOtraProc = [];
if (isset($_POST['mult_podx'])) {
    //t('Multi POD: '.$_POST['mult_podx']);
    $strMultPodx = $_POST['mult_podx'];
    if ($strMultPodx == 'S') {
        //t('Voy a grabar el POD a multiples piezas');
        $arrOtraProc = unserialize($_SESSION['OtraProc']);
    }
}

if ($blnTodoOkey) {
    t('Todo bien hasta ahora');
    $intPiezIdxx = $_SESSION['idxx'];
    $intManiIdxx = $_SESSION['midx'];
    t('Id de la Pieza: '.$intPiezIdxx);
    t('Id del Manifiesto '.$intManiIdxx);
    $strNombClie = $_SESSION['nomb'];
    $strCeduRifx = $_SESSION['cedu'];
    $strFechEntr = $_SESSION['fent'];
    $strHoraEntr = $_SESSION['hora'];

    //t("Fech: ".$strFechEntr);

    $objPiezSele = GuiaPiezas::Load($intPiezIdxx);
    $strResuRegi = '';

    $objDatabase = GuiaPiezas::GetDatabase();
    $objDatabase->TransactionBegin();
    t('Grabando el POD desde Ruta-Mobile...');

    if ($blnTodoOkey) {
        $intCantCkpt = 0;
        $objCheckpoint = Checkpoints::LoadByCodigo('OK');
        t('Grabando Checkpoint a la Pieza desde Ruta-Mobile');
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
            t('Error grabando Checkpoint OK desde Ruta-Mobile:'.$arrResuGrab['MotiNook']);
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
        $objManiProc = Containers::Load($intManiIdxx);
        $objManiProc->ActualizarEstadisticasDeEntrega();
    }
    $objDatabase->TransactionCommit();

    if ($blnTodoOkey) {
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson">¡El Detalle de la Entrega ha sido Registrado!!!<hr> Piezas Procesadas '.$intCantCkpt.'</span>
            <a href="lista_de_guias.php?id='.$intManiIdxx.'&tg=NO" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
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
