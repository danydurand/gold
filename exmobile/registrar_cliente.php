<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/funciones_kaizen.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_POST['nomb'])) {
    $_SESSION['nomb'] = strtoupper($_POST['nomb']);
    $_SESSION['cedu'] = $_POST['cedu'];
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['fnac'] = $_POST['fnac'];
    $_SESSION['sexo'] = $_POST['sexo'];
    $_SESSION['movi'] = $_POST['movi'];
    $_SESSION['fijo'] = $_POST['fijo'];
    $_SESSION['esta'] = $_POST['esta'];
    $_SESSION['ciud'] = $_POST['ciud'];
    $_SESSION['sucu'] = $_POST['sucu'];
    $_SESSION['dire'] = strtoupper($_POST['dire']);
}

$strNombClie = $_SESSION['nomb'];
$strCeduRifx = $_SESSION['cedu'];
$strDireMail = $_SESSION['mail'];
$strFechNaci = $_SESSION['fnac'];
$strSexoClie = $_SESSION['sexo'];
$strTeleMovi = $_SESSION['movi'];
$strTeleFijo = $_SESSION['fijo'];
$intCodiEsta = $_SESSION['esta'];
$intCodiCiud = $_SESSION['ciud'];
$intCodiSucu = $_SESSION['sucu'];
$strDireClie = $_SESSION['dire'];

// echo "Nomb: ".$strNombClie."<br>\n";
// echo "Cedu: ".$strCeduRifx."<br>\n";
// echo "Mail: ".$strDireMail."<br>\n";
// echo "Fnac: ".$strFechNaci."<br>\n";
// echo "Sexo: ".$strSexoClie."<br>\n";
// echo "Movi: ".$strTeleMovi."<br>\n";
// echo "Fijo: ".$strTeleFijo."<br>\n";
// echo "Esta: ".$intCodiEsta."<br>\n";
// echo "Ciud: ".$intCodiCiud."<br>\n";
// echo "Sucu: ".$intCodiSucu."<br>\n";
// echo "Dire: ".$strDireClie."<br>\n";

// exit;
// echo $decValoMerc."<br>\n";
// echo $decPesoLibr."<br>\n";
// echo $decAltoEnvi."<br>\n";
// echo $decAnchEnvi."<br>\n";
// echo $decLargEnvi."<br>\n";

$objCliente = new Cliente();
$objCliente->Nombre             = $strNombClie;
$objCliente->CedulaRif          = $strCeduRifx; 
$objCliente->Email              = $strDireMail; 
$objCliente->ClaveAcceso        = $strCeduRifx; 
$objCliente->TelefonoMovil      = $strTeleMovi;
$objCliente->TelefonoFijo       = $strTeleFijo;
$objCliente->FechaNacimiento    = new QDateTime($strFechNaci); 
$objCliente->Direccion          = $strDireClie; 
$objCliente->Sexo               = $strSexoClie; 
$objCliente->VendedorId         = 1;
$objCliente->EstadoId           = $intCodiEsta;
$objCliente->CiudadId           = $intCodiSucu;
$objCliente->SucursalId         = $intCodiSucu;
// $objCliente->MedioId            = $this->lstMediPubl->SelectedValue;
$objCliente->CodigoConfirmacion = generarCodigo();
$objCliente->RegistradoEl       = new QDateTime(QDateTime::Now);
$objCliente->RegistradoPor      = 'pweb';
$objCliente->Save();

// echo "Guarde la informacion<br>\n";
//--------------------------------
// Enviar Email de Confirmacion 
//--------------------------------
$objMessage = new QEmailMessage();
$objMessage->From = 'ServiExpress <locahost@serviexpress.com>';
$objMessage->To = $objCliente->__nombreYCorreo();
$objMessage->Subject = 'ServiExpress Confirmacion de Registro ';

$objMessage->HtmlBody = redactarEmailConfirmacionE2($objCliente);

// Add random/custom email headers
$objMessage->SetHeader('x-application', 'Sistema Okinawa');

// Send the Message (Commented out for obvious reasons)
QEmailServer::Send($objMessage);
        
$strResuCalc = '
<center>
    <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">
        Transacción Existosa !!!
    </a>
</center>
';
?>

<?php //include('layout/header.inc.php') ?> 

    <div data-role="page" id="resultado">';

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content" >
            <?= $strResuCalc ?>
        </div>

        <?php include('layout/page_footer.inc.php') ?>;

    </div>

<?php include('layout/footer.inc.php') ?> 

