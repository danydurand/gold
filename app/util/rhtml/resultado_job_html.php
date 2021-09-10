<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['JobsEjec'])) {
    echo "Se requiere el Id del Proceso cuyos errores desea imprimir...";
    return;
}
/* @var $objJobsEjec ProcesoError */
$objJobsEjec = $_SESSION['JobsEjec'];
$objClauWher = QQ::Equal(QQN::DetalleError()->ProcesoId,$objJobsEjec->Id);
$arrErroProc = DetalleError::QueryArray(QQ::AndCondition($objClauWher));
$strFechHora = date('Y-m-d H:i');
?>
<style type="text/css">
    <!--
    .titulo { background-color: #CCC; font-weight: bold }
    -->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table>
            <tr>
                <td style="width: <?= $strLimiDere; ?>">
                    <img src="<?= __VIRTUAL_DIRECTORY__.__APP_IMAGE_ASSETS__."/LogoGold.png" ?>" alt="LogoGold" width="130px" height="50px">
                </td>
                <td style="width: 350px; text-align: right">
                    <table border="1">
                        <tr>
                            <td style="width: 200px; text-align: right"><b>FECHA y HORA:</b></td>
                            <td style="width: 120px; text-align: center"><?= $strFechHora ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!----------------------->
        <!--  Lista de Errores -->
        <!----------------------->
        <table style="margin-top: 24px;" border="1">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="width: 40px; text-align: center">Id</td>
                <td style="width: 100px; text-align: left">Referencia</td>
                <td style="width: 150px; text-align: center">Mensaje</td>
                <td style="width: 150px; text-align: center">Comentario</td>
            </tr>
            <?php foreach ($arrErroProc as $objErroProc) { ?>
                <tr>
                    <td style="text-align: center "><?= $objErroProc->Id ?></td>
                    <td><?= $objErroProc->Referencia ?></td>
                    <td><?= $objErroProc->MensajeError ?></td>
                    <td><?= $objErroProc->Comentario ?></td>
                </tr>
            <?php } ?>
        </table>
    </page_header>
</page>
