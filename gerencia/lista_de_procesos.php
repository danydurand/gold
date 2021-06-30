<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Lista de Procesos";

/* @var $objPiezMani GuiaPiezas */
$intIdxxMani = $_GET['id'];
$objManiSele = Containers::Load($intIdxxMani);
$arrPiezMani = $objManiSele->GetGuiaPiezasAsContainerPiezaArray();
$strListGuia = '';
if ($arrPiezMani) {
    $strListGuia = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="eye" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Filtrar...">
    <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver </a>
    ';
    foreach ($arrPiezMani as $objPiezMani) {
        //--------------------
        // Ultimo Checkpoint
        //--------------------
        $strUltiCome = '';
        $arrUltiCkpt = $objPiezMani->ultimoCheckpointTodo();
        if (isset($arrUltiCkpt)) {
            $strUltiCome = $arrUltiCkpt['comentario'];
        }

        $strListGuia .= '
            <li>
                <a href="detalle_de_pieza.php?id='.$objPiezMani->Id.'" data-rel="dialog">
                    <img src="images/list.png" class="extra">
                    <h6>'.$objPiezMani->IdPieza.'</h6>
                    <p><b>Destinatario:</b> '.$objPiezMani->Guia->NombreDestinatario.'</p>
                    <p><b>Destino:</b> '.$objPiezMani->Guia->Destino->Iata.'</p>
                    <p><b>Status:</b> '.$strUltiCome.'</p>
                </a>
            </li>
        ';
    }
    $strListGuia .= '</ul>';
} else {
    $strListGuia = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Guias</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListGuia; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

