<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');

/* @var $objOtraPiez GuiaPiezas */

$strTituPagi = "Borrar POD";
$blnTodoOkey = true;
t('================');
t('Borrando el POD');
if (isset($_POST['idxx'])) {
    $_SESSION['idxx'] = $_POST['idxx'];
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

$intPiezIdxx = $_SESSION['idxx'];
t('Id: '.$intPiezIdxx);

$objPiezSele = GuiaPiezas::Load($intPiezIdxx);
$strResuRegi = '';
$intCantPiez = 0;
if ($blnTodoOkey) {
    t('Borrando el POD desde Ruta-Mobile...');
    //$objPiezPodx = GuiaPiezaPod::LoadByGuiaPiezaId($intPiezIdxx);
    //if ($objPiezPodx) {
    //    t('Voy a borrar el POD...');
    //    try {
    //        $objPiezPodx->Delete();
    //        $intCantPiez++;
    //        if ($strMultPodx == 'S') {
    //            if (count($arrOtraProc) > 0) {
    //                //-----------------------------------------
    //                // Se borra el POD para multiples piezas
    //                //-----------------------------------------
    //                foreach ($arrOtraProc as $objOtraPiez) {
    //                    $intPiezIdxx = $objOtraPiez->Id;
    //                    t('Borrando POD para otra pieza: '.$intPiezIdxx);
    //                    $objPiezPodx = GuiaPiezaPod::LoadByGuiaPiezaId($intPiezIdxx);
    //                    $objOtraPiez->Delete();
    //                    $intCantPiez++;
    //                }
    //            }
    //        }
    //
    //    } catch (Exception $e) {
    //        t('Error borrando el POD desde Ruta-Mobile: '.$e->getMessage());
    //        $blnTodoOkey = false;
    //    }
    //}

    if ($blnTodoOkey) {
        $objCheckpoint = Checkpoints::LoadByCodigo('OK');
        //---------------------------
        // Se borra Checkpoint Ok
        //---------------------------
        t('Borrando Checkpoint OK a la Pieza desde Ruta-Mobile');
        $strCadeSqlx  = 'delete ';
        $strCadeSqlx .= '  from pieza_checkpoints';
        $strCadeSqlx .= ' where pieza_id = '.$intPiezIdxx;
        $strCadeSqlx .= '   and checkpoint_id = '.$objCheckpoint->Id;
        $objDatabase  = PiezaCheckpoints::GetDatabase();
        $objDatabase->NonQuery($strCadeSqlx);
        t('Listo, borre Ok de la Pieza Principal');
        $intCantPiez++;
        if ($strMultPodx == 'S') {
            if (count($arrOtraProc) > 0) {
                //-----------------------------------------
                // Se borra el POD para multiples piezas
                //-----------------------------------------
                foreach ($arrOtraProc as $objOtraPiez) {
                    t('Borrando OK para la pieza: '.$objOtraPiez->Id);
                    $intPiezIdxx = $objOtraPiez->Id;
                    $strCadeSqlx  = 'delete ';
                    $strCadeSqlx .= '  from pieza_checkpoints';
                    $strCadeSqlx .= ' where pieza_id = '.$intPiezIdxx;
                    $strCadeSqlx .= '   and checkpoint_id = '.$objCheckpoint->Id;
                    $objDatabase  = PiezaCheckpoints::GetDatabase();
                    $objDatabase->NonQuery($strCadeSqlx);
                    $intCantPiez++;
                }
            }
        }

    }


    if ($blnTodoOkey) {
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson">¡Detalle de la Entrega BORRADO!!!<hr> Piezas Procesadas '.$intCantPiez.'</span>
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