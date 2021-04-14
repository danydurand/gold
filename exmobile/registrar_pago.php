<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

$objCliente = unserialize($_SESSION['User']);

if (isset($_POST['docu'])) {
    $_SESSION['docu'] = $_POST['docu'];
    $_SESSION['fech'] = $_POST['fech'];
    $_SESSION['guia'] = unserialize($_SESSION['GuiaPago']);
    $_SESSION['mont'] = $_POST['mont'];
    $_SESSION['banc'] = $_POST['banc'];
}

// echo 'Print por Echo: ';
// echo 1;
// echo '<br>';
// echo 'Print por Kint: ';
// d($_SESSION);
// echo '<br>';
// echo 'Print por Print_R: ';
// print_r($_POST);
// echo '<br><br>';
// echo 'Print por Var_Dump: ';
// var_dump($_POST);
// exit;

$strDocuPago = $_SESSION['docu'];
$strFechPago = $_SESSION['fech'];
$strGuiaPago = $_SESSION['guia'];
$decMontPago = $_SESSION['mont'];
$intCodiBanc = $_SESSION['banc'];

// echo "clie: ".$objCliente->Nombre."<br>\n";
// echo "docu: ".$strDocuPago."<br>\n";
// echo "fech: ".$strFechPago."<br>\n";
// echo "guia: ".$strGuiaPago."<br>\n";
// echo "mont: ".$decMontPago."<br>\n";
// echo "banc: ".$intCodiBanc."<br>\n";
// exit;

$objPagoRegi = Pago::LoadByDocumentoBancoId($strDocuPago, $intCodiBanc);

if (!$objPagoRegi) {

    $objPago = new Pago();
    $objPago->ClienteId    = $objCliente->Id;
    $objPago->Documento    = trim($strDocuPago);
    $objPago->Fecha        = new QDateTime($strFechPago);
    $objPago->Guias        = $strGuiaPago;
    $objPago->Monto        = $decMontPago;
    $objPago->BancoId      = $intCodiBanc;
    $objPago->RegistradoEl = new QDateTime(QDateTime::Now);
    $objPago->Confirmado   = false;
    $objPago->Save();

    $arrLogxCamb['strNombTabl'] = 'Pago';
    $arrLogxCamb['intRefeRegi'] = $objPago->Id;
    $arrLogxCamb['strNombRegi'] = $objPago->Documento;
    $arrLogxCamb['strDescCamb'] = "Creado";
    $arrLogxCamb['strSistTran'] = "exmobile";
    LogDeCambios($arrLogxCamb);
    
    $strResuPago = '
    <center class="mensaje">
        <a href="mis_pagos.php" data-role="button" data-theme="b">
            <i class="fa fa-lg fa-mail-reply pull-left"></i>Pago Registrado !!!
        </a>
    </center>';

} else {
    $objBancPago = Banco::Load($intCodiBanc);
    $strResuPago = '
        <center class="mensaje">
            <span>Disculpe, este número de Voucher/Transferencia (<span style="color:crimson">'.$strDocuPago.'</span>) del Banco (<span style="color:crimson">'.$objBancPago->Nombre.'</span>) ya ha sido registrado en el sistema.</span><br><br>
            <a href="mis_pagos.php" data-role="button" data-theme="b">
                <i class="fa fa-lg fa-mail-reply pull-left"></i>Volver !!!
            </a>
        </center>';
}
        
?>
    <div data-role="page" id="resultado">

        <?php include('layout/page_header.inc.php') ?>
        <style>
            .mensaje {
                padding-top: 2em;
                padding-bottom: 2em;
            }
        </style>

        <div data-role="content" >
            <?= $strResuPago ?>
        </div>

        <?php include('layout/page_footer.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 
