<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/funciones_serviexpress.php');
include('layout/header.inc.php');
echo 1; exit;
if (isset($_GET['id'])) {
    $intCodiGast = $_GET['id'];
    $objGastMani  = GastosManifiesto::Load($intCodiGast);
    $strDetaGast = '
    <div data-role="collapsible-set" data-inset="true" data-theme="e">
        <div data-role="collapsible" data-collapsed="false">
            <h3>Detalles de: '..'</h3>
            <table border="0" width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Cédula :</td>
                        <td class="valor">'.$objGastMani->Master.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta"><i class="fa fa-phone fa-lg"></i> :</td>
                        <td class="valor"><a href="tel:'..'</a></td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>
        <div data-role="collapsible">
            <h3>Detalle del Registro</h3>
            <table border="0" width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Regist. el :</td>
                        <td class="valor">'..'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Regist. Por :</td>
                        <td class="valor">'..'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Confirmado:</td>
                        <td class="valor">'..'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">F. Conf. :</td>
                        <td class="valor">'..'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>';
} else {
    $strDetaGast = '    
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
    </center>';
}
?>

    <div data-role="page" id="resultado">

        <?php include('layout/header_simple.inc.php') ?>

        <div data-role="content" >
            <?= $strDetaGast ?>
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
        <?php include('layout/page_footer.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 
