<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/funciones.php');
$strTituPagi = "Registrar Cliente";
include('layout/header.inc.php');
//dd($_SESSION);
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
// exit();

$blnTodoOkey = true;
$objClieRegi = Cliente::LoadByCedulaRif($strCeduRifx);

if ($objClieRegi) {
    $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson"><p>¡El Cliente que desea registrar ya se encuentra en nuestra Base de Datos!<hr></span>
            <table width="100%">
    ';
    if ($objClieRegi->Codigo) {
        $strResuRegi .= '
                <tr>
                    <td class="etiqueta">Código:</td>
                    <td class="valor">VE'.$objClieRegi->Codigo.'</td>
                </tr>
        ';
    } else {
        $strResuRegi .= '
                <tr>
                    <td class="etiqueta">Código:</td>
                    <td class="valor">Pendiente por ser Asignado en Roxanne</td>
                </tr>
        ';
    }
        $strResuRegi .= '
                <tr>
                    <td class="etiqueta">Nombre:</td>
                    <td class="valor">'.$objClieRegi->Nombre.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Cédula:</td>
                    <td class="valor">'.$objClieRegi->CedulaRif.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Email:</td>
                    <td class="valor">'.$objClieRegi->Email.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Registrado El:</td>
                    <td class="valor">'.$objClieRegi->RegistradoEl.'</td>
                </tr>
            </table><br>
            <a href="pre_registro.php" data-role="button" data-theme="b">
                <i class="fa fa-lg fa-mail-reply pull-left"></i>Volver
            </a>
        </center>
    ';
    $blnTodoOkey = false;
}

if ($blnTodoOkey) {
    $objClieRegi = Cliente::LoadByEmail($strDireMail);
    
    if ($objClieRegi) {
        $strResuRegi = '
        <center class="mensaje">
            <span style="color:crimson"><p>¡El Cliente que desea registrar ya se encuentra en nuestra Base de Datos!<hr></span>
            <table width="100%">
        ';
    if ($objClieRegi->Codigo) {
        $strResuRegi .= '
                <tr>
                    <td class="etiqueta">Código:</td>
                    <td class="valor">VE'.$objClieRegi->Codigo.'</td>
                </tr>
        ';
    } else {
        $strResuRegi .= '
                <tr>
                    <td class="etiqueta">Código:</td>
                    <td class="valor">Pendiente por ser Asignado en Roxanne</td>
                </tr>
        ';
    }
        $strResuRegi .= '
                <tr>
                    <td class="etiqueta">Nombre:</td>
                    <td class="valor">'.$objClieRegi->Nombre.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Cédula:</td>
                    <td class="valor">'.$objClieRegi->CedulaRif.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Email:</td>
                    <td class="valor">'.$objClieRegi->Email.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Registrado El:</td>
                    <td class="valor">'.$objClieRegi->RegistradoEl.'</td>
                </tr>
            </table><br>
            <a href="pre_registro.php" data-role="button" data-theme="b">
                <i class="fa fa-lg fa-mail-reply pull-left"></i>Volver
            </a>
            </center>
        ';
        $blnTodoOkey = false;
    }
}

if ($blnTodoOkey) {
    if (isset($_SESSION['User'])) {
        $objUsuaMobi = unserialize($_SESSION['User']);
        $strLogiUsua = trim($objUsuaMobi->Login);
        $strVendUnox = 'mcamero';
        $strVendDosx = 'rlira';
        if ($strLogiUsua == $strVendUnox) {
            $objUsuaVend = Vendedor::LoadByLogin($strLogiUsua);
            $intCodiVend = $objUsuaVend->Id;
        } elseif ($strLogiUsua == $strVendDosx) {
            $objUsuaVend = Vendedor::LoadByLogin($strLogiUsua);
            $intCodiVend = $objUsuaVend->Id;
        } else {
            $intCodiVend = 1;
        }
    }
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
    $objCliente->VendedorId         = $intCodiVend;
    $objCliente->EstadoId           = $intCodiEsta;
    $objCliente->CiudadId           = $intCodiCiud;
    $objCliente->SucursalId         = $intCodiSucu;
    // $objCliente->MedioId            = $this->lstMediPubl->SelectedValue;
    $objCliente->CodigoConfirmacion = generarCodigo();
    $objCliente->RegistradoEl       = new QDateTime(QDateTime::Now);
    $objCliente->RegistradoPor      = 'OkiMob';
    $objCliente->ApiRegiId          = -1;
    $objCliente->Confirmado         = false;
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

    $objClieRegi = Cliente::Load($objCliente->Id);
    if ($objClieRegi) {
        $strResuRegi = '
            <center class="mensaje">
                <span style="color:#008080">
                    ¡El Cliente ha sido Pre-Registrado Exitosamente!!!<br>
                    No olvide que debe registrar al Cliente en Roxanne para asignarle código VE<hr>
                </span>
                <table width="100%">
                    <tr>
                        <td class="etiqueta">Nombre:</td>
                        <td class="valor">'.$objClieRegi->Nombre.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Cédula:</td>
                        <td class="valor">'.$objClieRegi->CedulaRif.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Email:</td>
                        <td class="valor">'.$objClieRegi->Email.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Registrado El:</td>
                        <td class="valor">'.$objClieRegi->RegistradoEl.'</td>
                    </tr>
                </table><br>
                <a data-rel="back" data-role="button" data-theme="b">
                    <i class="fa fa-mail-reply fa-lg pull-left"></i>Volver
                </a>
            </center>
        ';
    }
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