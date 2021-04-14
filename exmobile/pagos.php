<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_GET['ids'])) {
    $arrGuiaIdsx   = explode(',', $_GET['ids']);
    $objClauWher   = QQ::Clause();
    $objClauWher[] = QQ::In(QQN::Guia()->Id,$arrGuiaIdsx);
    $arrGuiaSele   = Guia::QueryArray(QQ::AndCondition($objClauWher));
    $decTotaPaga   = 0;
    foreach ($arrGuiaSele as $objGuiaSele) {
        $decTotaPaga += $objGuiaSele->Total;
    }
    $_SESSION['GuiaPago'] = serialize($_GET['ids']);
}
$strListBanc  = '<select name="banc" id="banc">';
$arrBancDispo = Banco::LoadAll();
if (count($arrBancDispo) > 1) {
    $strListBanc .= '<option value="-1" selected>- Seleccione -</option>';
}
foreach ($arrBancDispo as $objBanco) {
    $strListBanc .= '<option value="'.$objBanco->Id.'">'.$objBanco->Nombre.'</option>';
}
$strListBanc .= '</select>';

?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <form action="registrar_pago.php" method="post">
                <div class="ui-field-contain">
                    <label for="guia">Guias:</label>
                    <input type="text" name="guia" id="guia" value=<?= $_GET['ids'] ?> disabled>
                </div>
                <div class="ui-field-contain">
                    <label for="tota">Total a Pagar:</label>
                    <input type="text" name="tota" id="tota" value=<?= $decTotaPaga ?> disabled>
                </div>
                <div class="ui-field-contain">
                    <label for="docu">Nro. de Voucher o Transferencia:</label>
                    <input type="text" name="docu" id="docu" placeholder="Nro. Voucher/Transferencia" required>
                </div>
                <div class="ui-field-contain">
                    <label for="fech">Fecha del Pago</label>
                    <input type="date" name="fech" id="fech" required>
                </div>
                <div class="ui-field-contain">
                    <label for="mont">Monto (Bs)</label>
                    <input type="text" name="mont" id="mont" placeholder="Monto (Bs)" required>
                </div>
                <div class="ui-field-contain">
                    <label for="banc">Banco:</label><br>
                    <?= $strListBanc ?>
                </div>
                <div class="ui-field-contain">
                    <input type="submit" value="Pagar" data-theme="b" data-icon="check" data-iconpos="top">
                </div>
            </form>
        </div>
        <style>
            #tota {
                color: #000;
                font-weight: bold;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -o-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
        </style>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
