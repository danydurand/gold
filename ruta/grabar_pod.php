<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');
$strTituPagi = "Grabar POD";
include('layout/header.inc.php');
$blnTodoOkey = true;

if (isset($_POST['nomb'])) {
    $_SESSION['idxx'] = $_POST['idxx'];
    $_SESSION['nomb'] = strtoupper($_POST['nomb']);
    $_SESSION['cedu'] = strtoupper($_POST['cedu']);
    $_SESSION['fent'] = $_POST['fent'];
    $_SESSION['hora'] = $_POST['hora'];
} else {
    $blnTodoOkey = false;
}

if ($blnTodoOkey) {
    $intPiezIdxx = $_SESSION['idxx'];
    t('Id: '.$intPiezIdxx);
    $strNombClie = $_SESSION['nomb'];
    $strCeduRifx = $_SESSION['cedu'];
    $strFechEntr = $_SESSION['fent'];
    $strHoraEntr = $_SESSION['hora'];

    t("Fech: ".$strFechEntr);

    $objPiezSele = GuiaPiezas::Load($intPiezIdxx);
    $strResuRegi = '';

    t('Grabando el POD desde Ruta-Mobile...');
    $objDatabase = GuiaPiezaPod::GetDatabase();
    $objDatabase->TransactionBegin();
    $objPiezPodx = GuiaPiezaPod::LoadByGuiaPiezaId($intPiezIdxx);
    if ($objPiezPodx) {
        t('Ya tenía POD, lo voy a borrar...');
        $objPiezPodx->Delete();
    }

    try {
        $objPiezPodx = new GuiaPiezaPod();
        $objPiezPodx->GuiaPiezaId  = $intPiezIdxx;
        $objPiezPodx->EntregadoA   = trim($strNombClie).' | '.$strCeduRifx;
        $objPiezPodx->FechaEntrega = $strFechEntr;
        $objPiezPodx->HoraEntrega  = $strHoraEntr;
        $objPiezPodx->Save();
    } catch (Exception $e) {
        t('Error grabando POD desde Ruta-Mobile: '.$e->getMessage());
        $blnTodoOkey = false;
        $objDatabase->TransactionRollBack();
    }

    if ($blnTodoOkey) {
        $objCheckpoint = Checkpoints::LoadByCodigo('OK');
        t('Grabando Checkpoint a la Pieza desde Ruta-Mobile');
        //-------------------------------------------------
        // Se registra un checkpoint "OK" para la pieza
        //-------------------------------------------------
        $arrDatoCkpt             = array();
        $arrDatoCkpt['NumePiez'] = $objPiezSele->IdPieza;
        $arrDatoCkpt['GuiaAnul'] = $objPiezSele->Guia->Anulada();
        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
        $arrDatoCkpt['TextCkpt'] = 'ENTREGADO A: '.trim($strNombClie).' | C.I.: '.trim($strCeduRifx).' | '.$strFechEntr.' | '.$strHoraEntr;
        $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
        if (!$arrResuGrab['TodoOkey']) {
            t('Error grabando Checkpoint OK desde Ruta-Mobile:'.$arrResuGrab['MotiNook']);
            $blnTodoOkey = false;
            $objDatabase->TransactionRollBack();
        }

    }
    $objDatabase->TransactionCommit();

    if ($blnTodoOkey) {
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson">¡El Detalle de la Entrega ha sido Registrado!!!<hr></span>
            <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
        </center>
        ';
    } else {
        $strResuRegi = '
            <center class="mensaje">
                <span style="color:crimson"><p>¡Ha ocurrido un error!<hr>Intente más tarde !!!</span>
            </center>
            <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
        ';
    }
} else {
    $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson"><p>¡Ha ocurrido un error!<hr>Intente más tarde !!!</span>
        </center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
    ';
}
?>

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
