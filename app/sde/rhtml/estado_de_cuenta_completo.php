<?php
require_once('qcubed.inc.php');
if (!isset($_SESSION['ObjeClie'])) {
    echo "Se requiere el Cliente para imprimir el Edo Cta Completo...";
    return;
}
/* @var $objClieCorp MasterCliente */
$objClieCorp = unserialize($_SESSION['ObjeClie']);
$decSaldExce = $objClieCorp->SaldoExcedente > 0 ? $objClieCorp->SaldoExcedente : 0;
$strNombClie = $objClieCorp->NombClie;
$strNombBanc = Parametros::BP('DATOBANC','NOMBBANC','Txt1','BANK OF AMERICA');
$strNombBene = Parametros::BP('DATOBANC','NOMBBENE','Txt1','GOLD COAST CUSTOM EXPRESS CORP');
$strTipoCnta = Parametros::BP('DATOBANC','TIPOCNTA','Txt1','Business Fundamentals Chk');
$strNrodCnta = Parametros::BP('DATOBANC','NRODCNTA','Txt1','8981 1112 7602');
$strNrodSwif = Parametros::BP('DATOBANC','NRODSWIF','Txt1','026009593');
$strNrodAbax = Parametros::BP('DATOBANC','NRODABAX','Txt1','063000047');
$strCntaZell = Parametros::BP('DATOBANC','CNTAZELL','Txt1','administracion@goldcoastus.com');
$strEmaiAdmi = Parametros::BP('DATOBANC','EMAIADMI','Txt1','auxiliaradm@goldcoastus.com');

$strCadeSqlx  = 'select * ';
$strCadeSqlx .= '  from v_edo_cta ';
$strCadeSqlx .= ' where cliente_corp_id = '.$objClieCorp->CodiClie;
$strCadeSqlx .= ' order by created_at, referencia ';
$objDatabase  = MasterCliente::GetDatabase();
$objDbResult  = $objDatabase->Query($strCadeSqlx);

?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <!---------------------->
        <!-- LOGO y DIRECCION -->
        <!---------------------->
        <table>
            <tr>
                <td style="width: 350px">
                    <img src="<?= __VIRTUAL_DIRECTORY__.__APP_IMAGE_ASSETS__."/LogoGold.png" ?>" alt="LogoGold" width="310px" height="100px">
                    <br>
                </td>
                <td style="width: 315px; text-align: right">
                </td>
            </tr>
        </table>

        <table style="margin-top: 24px; width: 50%">
            <tr>
                <td colspan="2">Sres., <?= $strNombClie ?><br><br></td>
            </tr>
            <tr>
                <td colspan="2">Anexo le hacemos llegar su Estado de Cuenta actualizado a la fecha, por Servicio de Entregas Nacionales.</td>
            </tr>
            <tr>
                <td colspan="2"><br>Por favor revisar y enviar soporte de pago.<br><br></td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="font-weight: bold; color: #0A246A">IMPORTANTE: Esta es una cuenta de correo no monitoreada.
                        Para cualquier comunicación adicional, por favor escríbanos directamente a:
                        <a href="mailto:<?= $strEmaiAdmi ?>"><?= $strEmaiAdmi ?></a>.
                        <br><br>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="font-weight: bold; color: #0A246A;">
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: bold">Datos Bancarios:<br><br></td>
            </tr>
            <tr>
                <td style="font-weight: bold">Banco:</td>
                <td><?= $strNombBanc ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">Beneficiario o Titular de la Cuenta:</td>
                <td><?= $strNombBene ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">Tipo de Cuenta:</td>
                <td><?= $strTipoCnta ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">Número de Cuenta:</td>
                <td><?= $strNrodCnta ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">SWIFT:</td>
                <td><?= $strNrodSwif ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">ABA:</td>
                <td><?= $strNrodAbax ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold">ZELLE:</td>
                <td><?= $strCntaZell ?></td>
            </tr>
        </table>
        <table style="margin-top: 24px;">
            <tr style="background-color: #CCC; font-weight: bold">
                <td style="border: solid 1px black; width: 75px; text-align: center">Doc</td>
                <td style="border: solid 1px black; width: 130px; text-align: center">Referencia</td>
                <td style="border: solid 1px black; width: 120px; text-align: center">Fecha</td>
                <td style="border: solid 1px black; width: 120px; text-align: center">Estatus</td>
                <td style="border: solid 1px black; width: 110px; text-align: right">Debito</td>
                <td style="border: solid 1px black; width: 110px; text-align: right">Credito</td>
            </tr>
            <?php $decSumaDebi = 0 ?>
            <?php $decSumaCred = 0 ?>
            <?php while ($mixRegistro = $objDbResult->FetchArray()) { ?>
                <?php
                    $strMontDebi = $mixRegistro['debito'] > 0 ? nf($mixRegistro['debito']) : '';
                    $strMontCred = $mixRegistro['credito'] > 0 ? nf($mixRegistro['credito']) : '';
                ?>
                <tr>
                    <td style="border: solid 1px black; text-align: center"><?= $mixRegistro['doc'] ?></td>
                    <td style="border: solid 1px black; text-align: center"><?= $mixRegistro['referencia'] ?></td>
                    <td style="border: solid 1px black; text-align: center"><?= $mixRegistro['fecha'] ?></td>
                    <td style="border: solid 1px black; text-align: center"><?= $mixRegistro['estatus'] ?></td>
                    <td style="border: solid 1px black; text-align: right; color: red"><?= $strMontDebi ?></td>
                    <td style="border: solid 1px black; text-align: right; color: blue"><?= $strMontCred ?></td>
                </tr>
                <?php $decSumaDebi += $mixRegistro['debito'] ?>
                <?php $decSumaCred += $mixRegistro['credito'] ?>
            <?php } ?>
            <?php $decBalaTota = $decSumaDebi - $decSumaCred ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: solid 1px black; text-align: center; font-weight: bold">Totales</td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSumaDebi) ?></td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decSumaCred) ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: solid 1px black; text-align: center; font-weight: bold">Balance</td>
                <td style="border: solid 1px black; text-align: right"><?= nf($decBalaTota) ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table>
            <tr>
                <td style="width: 100%">
                </td>
            </tr>
        </table>
    </page_footer>
</page>
