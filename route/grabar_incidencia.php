<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');

/* @var $objOtraPiez GuiaPiezas */

$strTituPagi = "Grabar Incidencia";

tc('============================');
tc('Llegando a Grabar Incidencia');
$blnTodoOkey = true;
$intCodiCkpt = '';
$strPiezIdxx = '';
$strTipoGuia = 'PE';
$intGrupGuia = 1;
$blnOpciTrad = true;
$intManiIdxx = null;
if (isset($_POST['idxx'])) {
    tc('1');
    $strPiezIdxx = $_POST['idxx'];
    $intCodiCkpt = $_POST['inci'];
    $intManiIdxx = $_POST['midx'];
} else {
    tc('2');
    $blnTodoOkey = false;
}
tc('Uno');
if (isset($_POST['tipo'])) {
    $strTipoGuia = $_POST['tipo'];
} else {
    $blnOpciTrad = false;
}
tc('Dos');
if (isset($_POST['grup'])) {
    $intGrupGuia = $_POST['grup'];
} else {
    $blnOpciTrad = false;
}
tc('Tres');
$strMultInci = '';
$arrOtraProc = [];
if (isset($_POST['mult_inci'])) {
    $strMultInci = $_POST['mult_inci'];
    if ($strMultInci == 'S') {
        $arrOtraProc = unserialize($_SESSION['OtraProc']);
    }
}
tc('Voy por aqui.. Pieza: '.$strPiezIdxx.' Ckpt: '.$intCodiCkpt.' Camino Tradicional: '.$blnOpciTrad);
$objPiezMani = ContainerPiezaMobile::LoadByContainerMobileIdIdPieza($intManiIdxx, $strPiezIdxx);
if ($blnOpciTrad) {
    $strLinkReto = 'lista_de_guias.php?id='.$intManiIdxx.'&tg='.$strTipoGuia.'&gg='.$intGrupGuia;
} else {
    $strLinkReto = 'detalle_de_guia_rastreo.php';
}
tc('Cuatro');
if ($blnTodoOkey) {
    tc('Id: '.$strPiezIdxx);
    tc('Inci: '.$intCodiCkpt);

    //$objPiezMani = ContainerPiezaMobile::LoadByContainerMobileIdIdPieza($intManiIdxx, $strPiezIdxx);

    //$objPiezSele = GuiaPiezas::Load($strPiezIdxx);
    $strResuRegi = '';
    t('Grabando el POD desde Ruta-Mobile...');

    $intCantPiez = 0;
    $objCheckpoint = Checkpoints::Load($intCodiCkpt);
    t('Grabando Incidencia a la Pieza desde Ruta-Mobile');
    //-------------------------------------------------
    // Se registra la Incidencia a la Pieza
    //-------------------------------------------------
    try {
        $objPiezMani->Checkpoint = $objCheckpoint->Codigo;
        $objPiezMani->Fecha      = new QDateTime(QDateTime::Now);
        $objPiezMani->Hora       = date('H:i');
        $objPiezMani->Comentario = $objCheckpoint->Descripcion;
        $objPiezMani->EntregadoA = null;
        $objPiezMani->FechaPod   = null;
        $objPiezMani->HoraPod    = null;
        $objPiezMani->Cedula     = null;
        $objPiezMani->UpdatedAt  = new QDateTime(QDateTime::Now);
        $objPiezMani->IsSync     = false;
        $objPiezMani->Save();
        $intCantPiez++;
    } catch (Exception $e) {
        $strTextMens = $e->getMessage();
        tc('Error: '.$e->getMessage());
    }
    //-----------------------------------------
    // Misma Incidencia para multiples piezas
    //-----------------------------------------
    if ($strMultInci == 'S') {
        if (count($arrOtraProc) > 0) {
            /* @var $objOtraPiez ContainerPiezaMobile */
            foreach ($arrOtraProc as $objOtraPiez) {
                //-------------------------------------------------
                // Se registra la Incidencia a la Pieza
                //-------------------------------------------------
                try {
                    $objOtraPiez->Checkpoint = $objCheckpoint->Codigo;
                    $objOtraPiez->Fecha      = new QDateTime(QDateTime::Now);
                    $objOtraPiez->Hora       = date('H:i');
                    $objOtraPiez->Comentario = $objCheckpoint->Descripcion;
                    $objOtraPiez->EntregadoA = null;
                    $objOtraPiez->FechaPod   = null;
                    $objOtraPiez->HoraPod    = null;
                    $objOtraPiez->Cedula     = null;
                    $objOtraPiez->UpdatedAt  = new QDateTime(QDateTime::Now);
                    $objOtraPiez->IsSync     = false;
                    $objOtraPiez->Save();
                    $intCantPiez++;
                } catch (Exception $e) {
                    $strTextMens = $e->getMessage();
                    tc('Error: '.$e->getMessage());
                }
            }
        }
    }

    if ($blnTodoOkey) {
        $objPiezMani->ContainerMobile->ResumeDeEntrega();
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson">¡ Incidencia Registrada !<hr> Piezas Procesadas '.$intCantPiez.'</span>
            <a href="'.$strLinkReto.'" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
        </center>
        ';
    } else {
        $strResuRegi = '
            <center class="mensaje">
                <span style="color:crimson"><p>¡Ha ocurrido un error!<hr>'.$strTextMens.' !!!</span>
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
