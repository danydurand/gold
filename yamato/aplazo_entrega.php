<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Aplazo de Entrega";

//----------------------------------
// Se arma un Array de Checkpoints
//----------------------------------
$arrCkptInci   = array('DA','DE','DF','DI','DV','FA');
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::In(QQN::SdeCheckpoint()->CodiCkpt, $arrCkptInci);

$strListMoti  = '<select name="moti" id="moti" data-native-menu="false">';
$strListMoti .= '<option value="-1" selected>- Seleccione Uno -</option>';

$arrMotiApla = SdeCheckpoint::QueryArray(QQ::AndCondition($objClauWher));
$intCantCkpt = count($arrMotiApla);
if ($intCantCkpt > 0) {
    foreach ($arrMotiApla as $objMotiApla) {
        $strListMoti .= '<option value="'.$objMotiApla->CodiCkpt.'">'.$objMotiApla->DescCkpt.'</option>';
    }
} else {
    $strListMoti .= '<option value="1">Hola</option>';
}
$strListMoti .= '</select>';

if (isset($_GET['id'])) {
    $intNumeGuia = $_GET['id'];
    $objGuiaSele = Guia::Load($intNumeGuia);
    $intCodiClie = $objGuiaSele->CodiClie;
?>
    <div data-role="page" id="aplazo_recolecta">
    <?php include('layout/header_deta_guia.inc.php') ?>
        <div data-role="content">
            <p style="text-align:center;color:crimson;">Seleccione un Motivo</p>
            <form action="resultado.php" method="post">
                <div class="ui-field-contain">
                    <label for="moti">Motivos del Aplazo:</label><br><br>
                    <?= $strListMoti ?>
                </div>
                <div class="ui-field-contain">
                    <input type="submit" value="<i class='fa fa-cogs pull-left'></i>Procesar" data-theme="b">
                </div>
            </form>
        </div>
<?php } ?>
<?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>