<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');
$strTituPagi = "Borrar POD";
include('layout/header.inc.php');
$blnTodoOkey = true;
t('================');
t('Borrando el POD');
if (isset($_POST['idxx'])) {
    $_SESSION['idxx'] = $_POST['idxx'];
} else {
    $blnTodoOkey = false;
}

$intPiezIdxx = $_SESSION['idxx'];
t('Id: '.$intPiezIdxx);

$objPiezSele = GuiaPiezas::Load($intPiezIdxx);
$strResuRegi = '';

if ($blnTodoOkey) {
    t('Borrando el POD desde Ruta-Mobile...');
    $objPiezPodx = GuiaPiezaPod::LoadByGuiaPiezaId($intPiezIdxx);
    if ($objPiezPodx) {
        t('Voy a borrar el POD...');
        try {
            $objPiezPodx->Delete();
        } catch (Exception $e) {
            t('Error borrando el POD desde Ruta-Mobile: '.$e->getMessage());
            $blnTodoOkey = false;
        }
    }

    if ($blnTodoOkey) {
        $objCheckpoint = Checkpoints::LoadByCodigo('OK');
        //------------------------------------
        // Se borra también el checkpoint Ok
        //------------------------------------
        t('Borrando Checkpoint OK a la Pieza desde Ruta-Mobile');
        $strCadeSqlx  = 'delete ';
        $strCadeSqlx .= '  from pieza_checkpoints';
        $strCadeSqlx .= ' where pieza_id = '.$intPiezIdxx;
        $strCadeSqlx .= '   and checkpoint_id = '.$objCheckpoint->Id;
        $objDatabase  = PiezaCheckpoints::GetDatabase();
        $objDatabase->NonQuery($strCadeSqlx);
        t('Listo, lo borre');

    }


    if ($blnTodoOkey) {
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson">¡Detalle de la Entrega BORRADO!!!<hr></span>
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
