<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/funciones_serviexpress.php');
include('layout/header.inc.php');
$strTituPagi = "Detalle del Cliente";

$strMensUsua = '';
$strPanePrin = 'false';
$strPaneBoto = 'true';
if (isset($_GET['ac'])) {
    $objUsuario  = unserialize($_SESSION['User']);
    $strTipoAcci = $_GET['ac'];
    switch ($strTipoAcci) {
        case 'Vipx':
            //------------------------------------------------------------------
            // Se verifica la existencia previa de la relacion Cliente-Usuario
            //------------------------------------------------------------------
            $objClieVipx = ClienteVip::LoadByClienteIdUsuarioId($_GET['id'],$objUsuario->Id);
            if (!$objClieVipx) {
                $objClieVipx = new ClienteVip();
                $objClieVipx->ClienteId = $_GET['id'];
                $objClieVipx->UsuarioId = $objUsuario->Id;
                $objClieVipx->Save();
                $strMensUsua = 'Registrado como VIP !!!';
            } else {
                $strMensUsua = 'El Cliente ya es VIP';
            }
            $strPanePrin = 'true';
            $strPaneBoto = 'false';
            break;
        case 'Test':
        case 'Con2':
        case 'Wel2':
            $intCodiClie = $_GET['id'];
            $objCliente  = Cliente::Load($intCodiClie);
            enviarCorreoAlCliente($strTipoAcci, $objCliente);
            $strMensUsua = 'Correo Enviado';
            $strPanePrin = 'true';
            $strPaneBoto = 'false';
        default:
            break;
    }
}

if (isset($_GET['id'])) {
    $intCodiClie = $_GET['id'];
    $objCliente  = Cliente::Load($intCodiClie);
    $arrClieVipx = $objCliente->GetClienteVipArray();
    $strClieVipx = '';
    if (count($arrClieVipx) > 0) {
        foreach ($arrClieVipx as $objClieVipx) {
            if (strlen($strClieVipx) > 0) {
                $strClieVipx .= ", ";
            }
            $strClieVipx .= $objClieVipx->Usuario->Login;
        }
    }
    //-------------------------------------------------
    // Se valida la existencia del Código del Cliente
    //-------------------------------------------------
    if ($objCliente->Codigo) {
        $strCodiClie = $objCliente->Codigo;
    } else {
        $strCodiClie = 'Sin Asignar';
    }
    //---------------------------------------
    // Se valida la existencia de la Cédula
    //---------------------------------------
    if (!is_null($objCliente->CedulaRif)) {
        $strNumeCedu = $objCliente->CedulaRif;
    } else {
        $strNumeCedu = 'No Disponible';
    }
    //--------------------------------------------
    // Se valida la existencia del Teléfono Fijo
    //--------------------------------------------
    if (!is_null($objCliente->TelefonoFijo)) {
        $strTeleFijo = $objCliente->TelefonoFijo;
    } else {
        $strTeleFijo = 'No Disponible';
    }
    //---------------------------------------------
    // Se valida la existencia del Teléfono Móvil
    //---------------------------------------------
    if (!is_null($objCliente->TelefonoMovil)) {
        $strTeleMovi = $objCliente->TelefonoMovil;
    } else {
        $strTeleMovi = 'No Disponible';
    }
    //-------------------------------------------------
    // Se valida la existencia del Correo Electrónico
    //-------------------------------------------------
    if (!is_null($objCliente->Email)) {
        $strMailClie = $objCliente->Email;
    } else {
        $strMailClie = 'No Disponible';
    }
    //----------------------------------------------------
    // Se valida la existencia de la Fecha de Nacimiento
    //----------------------------------------------------
    if (!is_null($objCliente->FechaNacimiento)) {
        $strFechNaci = $objCliente->FechaNacimiento->__toString('DD/MM/YYYY');
    } else {
        $strFechNaci = 'No Disponible';
    }
    //-------------------------------------
    // Se valida la existencia del Estado
    //-------------------------------------
    if (!is_null($objCliente->EstadoId)) {
        $strNombEsta = $objCliente->Estado->Nombre;
    } else {
        $strNombEsta = 'No Disponible';
    }
    //---------------------------------------
    // Se valida la existencia de la Ciudad
    //---------------------------------------
    if (!is_null($objCliente->CiudadId)) {
        $strNombCiud = $objCliente->Ciudad->Nombre;
    } else {
        $strNombCiud = 'No Disponible';
    }
    //-----------------------------------------
    // Se valida la existencia de la Sucursal
    //-----------------------------------------
    if (!is_null($objCliente->SucursalId)) {
        $strNombSucu = $objCliente->Sucursal->Nombre;
    } else {
        $strNombSucu = 'No Disponible';
    }
    //------------------------------------------
    // Se valida la existencia de la Dirección
    //------------------------------------------
    if (!is_null($objCliente->Direccion)) {
        $strDireClie = $objCliente->Direccion;
    } else {
        $strDireClie = 'No Disponible';
    }
    //---------------------------------------------
    // Se valida la existencia de la Confirmación
    //---------------------------------------------
    $strConfClie = $objCliente->Confirmado == 1 ? 'SI' : 'NO';
    if (!is_null($objCliente->FechaConfirmacion)) {
        $strFechConf = $objCliente->FechaConfirmacion;
    } else {
        $strFechConf = 'No Disponible';
    }
     
    $strDetaClie = '
        <div data-role="collapsible-set" data-inset="true" class="ui-nodisc-icon">
            <div data-role="collapsible" data-collapsed="'.$strPanePrin.'"style="font-size:14px;">
                <h3>Información Personal</h3>
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="etiqueta">Código del Cliente:</td>
                            <td class="valor">'.$strCodiClie.'</td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Cédula:</td>
                            <td class="valor">'.$strNumeCedu.'</td>
                        </tr>';
                if (strlen($strTeleFijo) > 0) {
                    $strDetaClie .= '
                        <tr>
                            <td class="etiqueta"><i class="fa fa-phone fa-lg"></i></td>
                            <td class="valor"><a href="tel:'.$strTeleFijo.'">'.$strTeleFijo.'</a></td>
                        </tr>
                    ';
                }
                if (strlen($strTeleMovi) > 0) {
                    $strDetaClie .= '
                        <tr>
                            <td class="etiqueta"><i class="fa fa-mobile fa-2x"></i></td>
                            <td class="valor"><a href="tel:'.$strTeleMovi.'">'.$strTeleMovi.'</a></td>
                        </tr>
                    ';
                }
                $strDetaClie .= '
                        <tr>
                            <td class="etiqueta"><i class="fa fa-envelope-o fa-lg"></i></td>
                            <td class="valor"><a href="mailto:'.$strMailClie.'">'.$strMailClie.'</a></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Fecha de Nacimiento:</td>
                            <td class="valor">'.$strFechNaci.'</td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Estado:</td>
                            <td class="valor">'.$strNombEsta.'</td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Ciudad:</td>
                            <td class="valor">'.$strNombCiud.'</td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Sucursal:</td>
                            <td class="valor">'.$strNombSucu.'</td>
                        </tr>
                ';
            if (strlen($strDireClie) > 0) {
                $strDetaClie .= '
                        <tr>
                            <td class="etiqueta">Dirección:</td>
                            <td class="valor">'.$strDireClie.'</td>
                        </tr>
                ';
            }
            if (strlen($strClieVipx) > 0) {
                $strDetaClie .= '
                        <tr>
                            <td class="etiqueta">VIP de:</td>
                            <td class="valor">'.$strClieVipx.'</td>
                        </tr>
                ';
            }
    $strDetaClie .= '
                    </tbody>
                </table>
            </div>
            <div data-role="collapsible" style="font-size:14px;">
                <h3>Detalle del Registro</h3>
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="etiqueta">Registrado el:</td>
                            <td class="valor">'.$objCliente->RegistradoEl.'</td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Registrado por:</td>
                            <td class="valor">'.$objCliente->RegistradoPor.'</td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Confirmado:</td>
                            <td class="valor">'.$strConfClie.'</td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Fecha Confirmado:</td>
                            <td class="valor">'.$strFechConf.'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div data-role="collapsible" data-collapsed="'.$strPaneBoto.'" style="text-align:center; font-size:14px;">
                <h3>Acciones</h3>
                <a href="detalle_del_cliente.php?id='.$intCodiClie.'&ac=Test" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"><i class="fa fa-envelope-o pull-left"></i> Correo de Prueba</a>
                <a href="detalle_del_cliente.php?id='.$intCodiClie.'&ac=Con2" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"><i class="fa fa-hand-peace-o pull-left"></i> Correo de Confimación</a>
                <a href="detalle_del_cliente.php?id='.$intCodiClie.'&ac=Wel2" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"><i class="fa fa-hand-spock-o pull-left"></i> Correo de Bienvenida</a>
                <a href="detalle_del_cliente.php?id='.$intCodiClie.'&ac=Vipx" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"><i class="fa fa-street-view pull-left"></i> Marcar como VIP</a>
                <br><br>
                <div style="text-aling: center; color: crimson; font-weight: bold">'.$strMensUsua.'</div>
            </div>
        </div>';
} else {
    $strDetaClie = '
        <center>
            <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
        </center>';
}
?>
<div data-role="page" id="resultado">
    <?php include('layout/header_deta_clie.inc.php') ?>
    <div data-role="content" >
        <?= $strDetaClie ?>
    </div>
    <style>
        a {
            text-decoration: none;
        }
        .etiqueta {
            font-weight: bold;
            padding: 2px;
            text-align: right;
            vertical-align: top;
            width: 48%;
        }
        .valor {
            text-align: left;
            padding: 3px;
        }
    </style>
    <?php // include('layout/page_footer.inc.php') ?>
</div>
<?php include('layout/footer.inc.php') ?> 