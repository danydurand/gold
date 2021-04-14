<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_GET['pid'])) {
    $intNumeGuia  = $_GET['gid'];
    $intPagoIdxx  = $_GET['pid'];
    $objPagoSele  = Pago::Load($intPagoIdxx);
    $strPagoConf  = $objPagoSele->Confirmado ? 'SI' : 'NO';

    $strDetaPago = '
    <div data-role="collapsible-set" data-inset="true" data-theme="b">
        <div data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles de los Pagos</h3>
            <table border="0.5px" width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Nro. Documento:</td>
                        <td class="valor">'.$objPagoSele->Documento.'</td>                        
                    </tr>
                    <tr>
                        <td class="etiqueta">Fecha del Pago:</td>
                        <td class="valor">'.$objPagoSele->Fecha.'</td> 
                    </tr>
                    <tr>
                        <td class="etiqueta">Guia(s):</td>
                        <td class="valor">'.$objPagoSele->Guias.'</td> 
                    </tr>
                    <tr>
                        <td class="etiqueta">Monto del Pago:</td>
                        <td class="valor">'.$objPagoSele->Monto.' Bs</td> 
                    </tr>
                    <tr>
                        <td class="etiqueta">Banco:</td>
                        <td class="valor">'.$objPagoSele->Banco->Nombre.'</td> 
                    </tr>
                    <tr>
                        <td class="etiqueta">Registrado El:</td>
                        <td class="valor">'.$objPagoSele->RegistradoEl.'</td> 
                    </tr>
                    <tr>
                        <td class="etiqueta">Confirmado?</td>
                        <td class="valor">'.$strPagoConf.'</td> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>';
} else {
    $strDetaPago = '    
    <center>
        No se encontraron pagos para esta guía <br>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
    </center>';
}
?>

    <div data-role="page" id="resultado">

        <?php include('layout/header_deta_guia.inc.php') ?>

        <div data-role="content" >
            <?= $strDetaPago ?>
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
                width: 50%;
            }
            .valor {
                text-align: left;
                padding: 3px;
            }
        </style>
        <?php include('layout/page_footer_deta.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 
