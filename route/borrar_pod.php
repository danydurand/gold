<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');

/* @var $objOtraPiez GuiaPiezas */

$strTituPagi = "Borrar POD";
$blnTodoOkey = true;
tc('================');
tc('Borrando el POD');
if (isset($_POST['idxx'])) {
    $_SESSION['idxx'] = $_POST['idxx'];
    $_SESSION['midx'] = $_POST['midx'];
} else {
    $blnTodoOkey = false;
}
$strMultPodx = '';
$arrOtraProc = [];
if (isset($_POST['mult_podx'])) {
    t('Multi POD: '.$_POST['mult_podx']);
    $strMultPodx = $_POST['mult_podx'];
    if ($strMultPodx == 'S') {
        t('Voy a borrar el POD a multiples piezas');
        $arrOtraProc = unserialize($_SESSION['OtraProc']);
    }
}

$strPiezIdxx = $_SESSION['idxx'];
$intManiIdxx = $_SESSION['midx'];
tc('Id de la Pieza: '.$strPiezIdxx);
tc('Id del Manifiesto: '.$intManiIdxx);
$strBackLink = "lista_de_guias.php?id=$intManiIdxx&tg=OK";
$intCantPiez = 0;
$objPiezMani = ContainerPiezaMobile::LoadByContainerMobileIdIdPieza($intManiIdxx, $strPiezIdxx);
tc('Borrando el POD desde Ruta-Mobile...');
try {
    $objPiezMani->EntregadoA = null;
    $objPiezMani->Cedula     = null;
    $objPiezMani->FechaPod   = null;
    $objPiezMani->HoraPod    = null;
    $objPiezMani->Checkpoint = null;
    $objPiezMani->Fecha      = null;
    $objPiezMani->Hora       = null;
    $objPiezMani->Comentario = null;
    $objPiezMani->UpdatedAt  = new QDateTime(QDateTime::Now);
    $objPiezMani->IsSync     = false;
    $objPiezMani->Save();
    $intCantPiez++;
} catch (Exception $e) {
    t('Error: '.$e->getMessage());
    $blnTodoOkey = false;
}

$strResuRegi = '';
if ($blnTodoOkey) {
    if ($strMultPodx == 'S') {
        if (count($arrOtraProc) > 0) {
            //-----------------------------------------
            // Se borra el POD para multiples piezas
            //-----------------------------------------
            foreach ($arrOtraProc as $objOtraPiez) {
                t('Borrando OK para la pieza: '.$objOtraPiez->IdPieza);
                try {
                    $objPiezMani->EntregadoA = null;
                    $objPiezMani->Cedula     = null;
                    $objPiezMani->FechaPod   = null;
                    $objPiezMani->HoraPod    = null;
                    $objPiezMani->Checkpoint = null;
                    $objPiezMani->Fecha      = null;
                    $objPiezMani->Hora       = null;
                    $objPiezMani->Comentario = null;
                    $objPiezMani->UpdatedAt  = new QDateTime(QDateTime::Now);
                    $objPiezMani->IsSync     = false;
                    $objPiezMani->Save();
                    $intCantPiez++;
                } catch (Exception $e) {
                    t('Error: '.$e->getMessage());
                    $blnTodoOkey = false;
                }
            }
        }
    }

    if ($blnTodoOkey) {
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson">¡Detalle de la Entrega BORRADO!!!<hr> Piezas Procesadas '.$intCantPiez.'</span>
            <a href="'.$strBackLink.'" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
        </center>
        ';
    } else {
        $strResuRegi = '
            <center class="mensaje">
                <span style="color:crimson"><p>¡Ha ocurrido un error!<hr>Intente más tarde !!!</span>
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
