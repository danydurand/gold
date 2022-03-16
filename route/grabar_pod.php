<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');

/* @var $objChofCone Chofer */
$objChofCone = unserialize($_SESSION['User']);
$objChofCone->grabarLogMobile('Entrando a grabar Pod');

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
        tc('Id del Manifiesto '.$intManiIdxx);
    }
    $strPiezIdxx = $_SESSION['idxx'];
    tc('Id de la Pieza: '.$strPiezIdxx);

    $objPiezMobi = ContainerPiezaMobile::LoadByContainerMobileIdIdPieza($intManiIdxx, $strPiezIdxx);

    $strNombClie = $_SESSION['nomb'];
    $strCeduRifx = $_SESSION['cedu'];
    $strFechEntr = $_SESSION['fent'];
    $strHoraEntr = $_SESSION['hora'];

    $objChofCone->grabarLogMobile('Grabando POD de la Pieza: '.$strPiezIdxx);
    $strResuRegi = '';

    $objDatabase = ContainerMobile::GetDatabase();
    $objDatabase->TransactionBegin();

    $intCantCkpt = 0;
    $blnTodoOkey = true;
    // Se graba el Checkpoint OK a la pieza
    try {
        $objPiezMobi->Checkpoint = 'OK';
        $objPiezMobi->Fecha      = new QDateTime(QDateTime::Now);
        $objPiezMobi->Hora       = date('H:i');
        $objPiezMobi->Comentario = 'Entregado A: '.trim($strNombClie).' | '.trim($strCeduRifx).' | '.$strFechEntr.' | '.$strHoraEntr;
        $objPiezMobi->EntregadoA = $strNombClie;
        $objPiezMobi->FechaPod   = New QDateTime($strFechEntr);
        $objPiezMobi->HoraPod    = $strHoraEntr;
        $objPiezMobi->Cedula     = $strCeduRifx;
        $objPiezMobi->UpdatedAt  = new QDateTime(QDateTime::Now);
        $objPiezMobi->IsSync     = false;
        $objPiezMobi->Save();
        $intCantCkpt++;
    } catch (Exception $e) {
        tc('Error 1era Pieza: '.$e->getMessage());
        $blnTodoOkey = false;
    }

    if ($blnTodoOkey) {
        if ($strMultPodx == 'S') {
            // En caso de que existan otras piezas de la misma guía
            if (count($arrOtraProc) > 0) {
                /* @var $objOtraPiez ContainerPiezaMobile */
                foreach ($arrOtraProc as $objOtraPiez) {
                    try {
                        $objOtraPiez->Checkpoint = 'OK';
                        $objOtraPiez->Fecha      = new QDateTime(QDateTime::Now);
                        $objOtraPiez->Hora       = date('H:i');
                        $objOtraPiez->Comentario = 'Entregado A: '.trim($strNombClie).' | '.trim($strCeduRifx).' | '.$strFechEntr.' | '.$strHoraEntr;
                        // Detalle del POD
                        $objOtraPiez->EntregadoA = $strNombClie;
                        $objOtraPiez->FechaPod   = New QDateTime($strFechEntr);
                        $objOtraPiez->HoraPod    = $strHoraEntr;
                        $objOtraPiez->Cedula     = $strCeduRifx;
                        $objOtraPiez->UpdatedAt  = new QDateTime(QDateTime::Now);
                        $objOtraPiez->IsSync     = false;
                        $objOtraPiez->Save();
                        $intCantCkpt++;
                    } catch (Exception $e) {
                        tc('Error otra pieza: '.$e->getMessage());
                        $blnTodoOkey = false;
                    }
                }
            }
        }
    }
    if ($blnTodoOkey) {
        $objDatabase->TransactionCommit();
        $objPiezMobi->ContainerMobile->ResumeDeEntrega();
    } else {
        $objDatabase->TransactionRollBack();
    }

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
