<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');

$strTituPagi = "Grabar Incidencia";

t('Llegando a grabar incidencia');
$blnTodoOkey = true;
$intCodiCkpt = '';
$intPiezIdxx = '';
if (isset($_POST['idxx'])) {
    $intPiezIdxx = $_POST['idxx'];
    $intCodiCkpt = $_POST['inci'];
} else {
    $blnTodoOkey = false;
}
t('Voy por aqui.. Pieza: '.$intPiezIdxx.' Ckpt: '.$intCodiCkpt);
if ($blnTodoOkey) {
    t('Id: '.$intPiezIdxx);
    t('Inci: '.$intCodiCkpt);

    $objPiezSele = GuiaPiezas::Load($intPiezIdxx);
    $strResuRegi = '';
    t('Grabando el POD desde Ruta-Mobile...');

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
    }


    if ($blnTodoOkey) {
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson">¡ Incidencia Registrada !<hr></span>
            <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
        </center>
        ';
    } else {
        $strResuRegi = '
            <center class="mensaje">
                <span style="color:crimson"><p>¡Ha ocurrido un error!<hr>'.$arrResuGrab['MotiNook'].' !!!</span>
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
