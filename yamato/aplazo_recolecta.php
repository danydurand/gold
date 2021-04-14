<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Aplazo Recolecta";
//-------------------------------------------------------------------------------------
// Se comienza a armar el listbox que contendrá los motivos del aplazo de la recolecta
//-------------------------------------------------------------------------------------
$strListMoti  = '<select name="moti" id="moti" data-native-menu="false">';
$strListMoti .= '<option value="-1" selected>- Seleccione Uno -</option>';
//-------------------------------------------------------------------------------------
// A través de un arreglo o vector, se obtienen los motivos del aplazo de la recolecta
//-------------------------------------------------------------------------------------
$arrMotiNoco = DspMotivoNoco::LoadAll();
//-------------------------------
// Se recorre o itera el arreglo
//-------------------------------
foreach ($arrMotiNoco as $objMotiNoco) {
    if ($objMotiNoco->MotiNoco != 'SM') {
        //-------------------------------------------------------------------------------
        // Se va agregando al listbox los motivos de aplazo de la recolecta, uno por uno
        //-------------------------------------------------------------------------------
        $strListMoti .= '<option value="'.$objMotiNoco->MotiNoco.'">'.utf8_encode($objMotiNoco->DescMoti).'</option>';
    }
}
//------------------------------------
// Fin de la construcción del listbox
//------------------------------------
$strListMoti .= '</select>';
if (isset($_GET['intCodiDesp'])) {
    $intCodiDesp = $_GET['intCodiDesp'];
    $objRecoSele = DspDespacho::LoadByCodiDesp($intCodiDesp);
    $_SESSION['objRecoSele'] = serialize($objRecoSele);
?>
    <div data-role="page" id="aplazo_recolecta">
        <?php include('layout/header_deta_reco.inc.php'); ?>

        <div data-role="content">
            <form action="resultado_aplazo_recolecta.php" method="post">
                <div class="ui-field-contain">
                    <label for="moti">Motivos del Aplazo:</label><br><br>
                    <?= $strListMoti ?>
                </div>
                <div class="ui-field-contain">
                    <input type="submit" value="<i class='fa fa-hand-paper-o pull-left'></i>Aplazar" data-theme="b">
                </div>
            </form>
        </div>
<?php } ?>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
    
<?php include('layout/footer.inc.php'); ?>