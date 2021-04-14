<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/funciones_serviexpress.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_GET['ec'])) {
    $strTipoCorr = $_GET['ec'];
    $intCodiClie = $_GET['id'];
    $objCliente  = Cliente::Load($intCodiClie);
    enviarCorreoAlCliente($strTipoCorr, $objCliente);
    $strMensUsua = 'Correo Enviado';
} else {
    $strMensUsua = '';
}

if (isset($_GET['id'])) {
    $intCodiClie = $_GET['id'];
    $objCliente  = Cliente::Load($intCodiClie);
    $strConfClie = $objCliente->Confirmado == 1 ? 'SI' : 'NO';
    $strDetaClie = '
    <div data-role="collapsible-set" data-inset="true">
        <div data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Información Personal</h3>
            <table border="0" width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Cédula:</td>
                        <td class="valor">'.$objCliente->CedulaRif.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta"><i class="fa fa-phone fa-lg"></i></td>
                        <td class="valor"><a href="tel:'.$objCliente->TelefonoFijo.'">'.$objCliente->TelefonoFijo.'</a></td>
                    </tr>
                    <tr>
                        <td class="etiqueta"><i class="fa fa-mobile fa-2x"></i></td>
                        <td class="valor"><a href="tel:'.$objCliente->TelefonoMovil.'">'.$objCliente->TelefonoMovil.'</a></td>
                    </tr>
                    <tr>
                        <td class="etiqueta"><i class="fa fa-envelope-o fa-lg"></i></td>
                        <td class="valor"><a href="mailto:'.$objCliente->Email.'">'.$objCliente->Email.'</a></td>
                    </tr>
                    <tr>
                        <td class="etiqueta">F. Nac:</td>
                        <td class="valor">'.$objCliente->FechaNacimiento.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Estado:</td>
                        <td class="valor">'.$objCliente->Estado->Nombre.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Ciudad:</td>
                        <td class="valor">'.$objCliente->Ciudad->Nombre.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Sucu:</td>
                        <td class="valor">'.$objCliente->Sucursal->Nombre.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Dir.:</td>
                        <td class="valor">'.$objCliente->Direccion.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div data-role="collapsible" style="font-size:14px;">
            <h3>Detalle del Registro</h3>
            <table border="0" width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Regist. el:</td>
                        <td class="valor">'.$objCliente->RegistradoEl.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Regist. por:</td>
                        <td class="valor">'.$objCliente->RegistradoPor.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Confirmado:</td>
                        <td class="valor">'.$strConfClie.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Fecha Conf.:</td>
                        <td class="valor">'.$objCliente->FechaConfirmacion.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div data-role="collapsible" style="text-align:center; font-size:14px;"">
            <h3>Acciones</h3>
            <a href="detalle_del_cliente.php?id='.$intCodiClie.'&ec=Test" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"><i class="fa fa-envelope-o pull-left"></i> Correo de Prueba</a>
            <a href="detalle_del_cliente.php?id='.$intCodiClie.'&ec=Con2" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"><i class="fa fa-hand-peace-o pull-left"></i> Correo de Confimación</a>
            <a href="detalle_del_cliente.php?id='.$intCodiClie.'&ec=Wel2" data-role="button" data-inline="true" data-theme="b" style="width:180px;" data-rel="dialog"><i class="fa fa-hand-spock-o pull-left"></i> Correo de Bienvenida</a>
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
                width: 30%;
            }
            .valor {
                text-align: left;
                padding: 3px;
            }
        </style>
        <?php // include('layout/page_footer.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 

