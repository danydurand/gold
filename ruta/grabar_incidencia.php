<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');

/* @var $objOtraPiez GuiaPiezas */

$strTituPagi = "Grabar Incidencia";

t('Llegando a grabar incidencia');
$blnTodoOkey = true;
$intCodiCkpt = '';
$intPiezIdxx = '';
$strTipoGuia = 'PE';
$intGrupGuia = 1;
$blnOpciTrad = true;
$intManiIdxx = null;
if (isset($_POST['idxx'])) {
    $intPiezIdxx = $_POST['idxx'];
    $intCodiCkpt = $_POST['inci'];
    $intManiIdxx = $_POST['midx'];
} else {
    $blnTodoOkey = false;
}
if (isset($_POST['tipo'])) {
    $strTipoGuia = $_POST['tipo'];
} else {
    $blnOpciTrad = false;
}
if (isset($_POST['grup'])) {
    $intGrupGuia = $_POST['grup'];
} else {
    $blnOpciTrad = false;
}
$strMultInci = '';
$arrOtraProc = [];
if (isset($_POST['mult_inci'])) {
    $strMultInci = $_POST['mult_inci'];
    if ($strMultInci == 'S') {
        $arrOtraProc = unserialize($_SESSION['OtraProc']);
    }
}
t('Voy por aqui.. Pieza: '.$intPiezIdxx.' Ckpt: '.$intCodiCkpt.' Camino Tradicional: '.$blnOpciTrad);

if ($blnOpciTrad) {
    $strLinkReto = 'lista_de_guias.php?id='.$intManiIdxx.'&tg='.$strTipoGuia.'&gg='.$intGrupGuia;
} else {
    $strLinkReto = 'detalle_de_guia_rastreo.php';
}

if ($blnTodoOkey) {
    t('Id: '.$intPiezIdxx);
    t('Inci: '.$intCodiCkpt);

    $objPiezSele = GuiaPiezas::Load($intPiezIdxx);
    $strResuRegi = '';
    t('Grabando el POD desde Ruta-Mobile...');

    $intCantPiez = 0;
    $objCheckpoint = Checkpoints::Load($intCodiCkpt);
    t('Grabando Incidencia a la Pieza desde Ruta-Mobile');
    //-------------------------------------------------
    // Se registra la Incidencia a la Pieza
    //-------------------------------------------------
    $arrDatoCkpt             = array();
    $arrDatoCkpt['NumePiez'] = $objPiezSele->IdPieza;
    $arrDatoCkpt['GuiaAnul'] = $objPiezSele->Guia->Anulada();
    $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
    $arrDatoCkpt['TextCkpt'] = $objCheckpoint->Descripcion;
    $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
    $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
    if (!$arrResuGrab['TodoOkey']) {
        t('Error grabando la Incidencia desde Ruta-Mobile:'.$arrResuGrab['MotiNook']);
        $blnTodoOkey = false;
    } else {
        $intCantPiez++;
    }
    //-----------------------------------------
    // Misma Incidencia para multiples piezas
    //-----------------------------------------
    if ($strMultInci == 'S') {
        if (count($arrOtraProc) > 0) {
            foreach ($arrOtraProc as $objOtraPiez) {
                //-------------------------------------------------
                // Se registra la Incidencia a la Pieza
                //-------------------------------------------------
                $arrDatoCkpt             = array();
                $arrDatoCkpt['NumePiez'] = $objOtraPiez->IdPieza;
                $arrDatoCkpt['GuiaAnul'] = $objOtraPiez->Guia->Anulada();
                $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->Id;
                $arrDatoCkpt['TextCkpt'] = $objCheckpoint->Descripcion;
                $arrDatoCkpt['NotiCkpt'] = $objCheckpoint->Notificar;
                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                if (!$arrResuGrab['TodoOkey']) {
                    t('Error grabando la Incidencia desde Ruta-Mobile:'.$arrResuGrab['MotiNook']);
                    $blnTodoOkey = false;
                } else {
                    $intCantPiez++;
                }
            }
        }
    }

    if ($blnTodoOkey) {
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson">¡ Incidencia Registrada !<hr> Piezas Procesadas '.$intCantPiez.'</span>
            <a href="'.$strLinkReto.'" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
        </center>
        ';
    } else {
        $strResuRegi = '
            <center class="mensaje">
                <span style="color:crimson"><p>¡Ha ocurrido un error!<hr>'.$arrResuGrab['MotiNook'].' !!!</span>
            </center>
            <a href="'.$strLinkReto.'" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
        ';
    }
} else {
    $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson"><p>¡Ha ocurrido un error!<hr>Intente más tarde !!!</span>
        </center>
        <a href="'.$strLinkReto.'" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
    ';
}
//include('layout/header.inc.php');
?>

<?php include('layout/header.inc.php') ?>

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
