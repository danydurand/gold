<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Detalle de la Entrega";
$intCodiOper = $_SESSION['CodiOper'];

if (isset($_GET['id'])) {
    $strNumeGuia = $_GET['id'];
    $objGuiaSele = Guia::Load($strNumeGuia);
    $intCodiClie = $objGuiaSele->CodiClie;
    //-----------------------------------------------------------------------------------------------------------------
    // Si la guía ya fue entregada, solamente se muestra un formulario con los datos de la entrega. En caso contrario,
    // se muestra el formulario con los campos para almacenar los datos de la entrega e invocar el evento de
    // confirmación de la misma.
    //-----------------------------------------------------------------------------------------------------------------
    if ($objGuiaSele->CodiCkpt == 'OK') {
        $strFormuEntr = '
        <table width="100%">
            <tbody>
                <tr>
                    <td class="etiqueta">Entegado a:</td>
                    <td class="valor">'.$objGuiaSele->EntregadoA.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Fecha de entrega:</td>
                    <td class="valor">'.$objGuiaSele->FechaEntrega->__toString("DD/MM/YYYY").'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Hora de entrega:</td>
                    <td class="valor">'.$objGuiaSele->HoraEntrega.'</td>
                </tr>
            </tbody>
        </table>
        ';
    } else {
        $strFormuEntr = '
        <form action="confirmacion_entrega.php?id='.$strNumeGuia.'&ac=cep" method="post">
            <div class="ui-field-contain">
                <label for="reci">Receptor:</label>
                <input type="text" name="reci" id="reci" placeholder="Persona que recibió la guía" required>
            </div>
            <div class="ui-field-contain">
                <label for="cedu">Cédula</label>
                <input type="text" name="cedu" id="cedu" placeholder="Cédula del Receptor" required>
            </div>
            <div class="ui-field-contain">
                <input type="submit" value="<i class=\'fa fa-check pull-left\'></i>Confirmar Entrega" data-theme="b" data-rel="dialog">
            </div>
        </form>';
    }
    ?>
    <div data-role="page" id="resultado">
        <?php include('layout/header_deta_guia.inc.php') ?>
        <div data-role="content" >
            <div data-role="collapsible-set" data-inset="true" data-theme="a">
                <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
                    <h3>Contactar Destinatario</h3>
                    <table width="100%">
                        <tbody>
                        <tr>
                            <td class="etiqueta"><i class="fa fa-phone fa-lg"></i></td>
    <?php if (strlen($objGuiaSele->TeleDest) > 0) { ?>
                            <td class="valor"><a href="tel:<?= $objGuiaSele->TeleDest ?>"><?= $objGuiaSele->TeleDest ?></a></td>
                        </tr>
    <?php } else { ?>
                        <td class="valor">No tiene teléfono.</td>
                        </tr>
    <?php } ?>
                        <tr>
                            <td class="etiqueta">Destinatario:</td>
                            <td class="valor"><?= $objGuiaSele->NombDest ?></td>
                        </tr>
                        <tr>
                            <td class="etiqueta">Dirección:</td>
                            <td class="valor"><?= $objGuiaSele->DireDest ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="false" style="font-size:14px;">
                    <h3>Datos de la Entrega</h3>
                    <div data-role="content">
                        <?= $strFormuEntr ?>
                    </div><br><br>
                </div>
<?php } else { ?>
                    <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
<?php } ?>
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
                width: 40%;
            }
            .valor {
                text-align: left;
                padding: 3px;
            }
        </style>
        <?php include('layout/page_footer.inc.php') ?>
    </div>
    <?php $_SESSION['CodiOper'] = $intCodiOper; ?>
<?php include('layout/footer.inc.php') ?>