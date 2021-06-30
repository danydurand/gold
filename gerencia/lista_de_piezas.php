<?php 
require_once('qcubed.inc.php');
$strTituPagi = "Lista de Piezas";

/* @var $objQuerMobi Parametros */
/* @var $objPiezMani GuiaPiezas */
$intIdxxSqlx = $_GET['id'];
$objQuerMobi = Parametros::Load($intIdxxSqlx);
$strTituPagi = trim($objQuerMobi->Descripcion);
$strCadeSqlx = trim($objQuerMobi->Texto2);
$blnLastCkpt = strpos($strCadeSqlx,'v_last_checkpoint');
$strListGuia = '';
$intCantRegi = 0;
$strMensUsua = 'No hay Piezas';
if (strlen($strCadeSqlx) > 0) {
    $strListGuia = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="eye" data-split-theme="d">
    <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
    ';
    $objDatabase = GuiaPiezas::GetDatabase();
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    while ($mixRegistro = $objDbResult->FetchArray()) {
        if ($blnLastCkpt) {
            $intIdxxRegi = $mixRegistro['pieza_id'];
        } else {
            $intIdxxRegi = $mixRegistro['id'];
        }
        $objPiezMani = GuiaPiezas::Load($intIdxxRegi);
        $strUltiCome = '';
        $strUltiFech = '';
        $arrUltiCkpt = $objPiezMani->ultimoCheckpointTodo();
        if (isset($arrUltiCkpt)) {
            $strUltiCome = $arrUltiCkpt['comentario'];
            $strUltiFech = $arrUltiCkpt['fecha'];
        }

        $strListGuia .= '
            <li>
                <a href="#" data-rel="dialog">
                    <h6>'.$objPiezMani->IdPieza.'</h6>
                    <p><b>Destinatario:</b> '.$objPiezMani->Guia->NombreDestinatario.'</p>
                    <p><b>Destino:</b> '.$objPiezMani->Guia->Destino->Iata.'</p>
                    <p><b>Status:</b> '.$strUltiCome.'</p>
                    <p><b>Fecha:</b> '.$strUltiFech.'</p>
                </a>
            </li>
        ';
        $intCantRegi++;
    }
    if ($intCantRegi > 0) {
        $strMensUsua = 'Usted esta viendo solo 20 piezas';
    }
    $strListGuia .= '</ul>';
} else {
    $strListGuia = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No Hay Piezas</a>
    </center>
    ';
}
?>
<?php include('layout/header.inc.php'); ?>

    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <div style="color: #0A246A; text-align: center; font-size: 20px">
                <?= $strMensUsua ?>
            </div>
            <?= $strListGuia; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

