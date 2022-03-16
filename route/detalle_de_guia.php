<?php
require_once('qcubed.inc.php');

include('layout/header.inc.php');

$strTituPagi = "Detalle de Guia";
$strNumeGuia = '';
if (isset($_GET['id'])) {
    $intNumeGuia = $_GET['id'];
    $objGuiaSele  = Guias::Load($intNumeGuia);

    $strListInci  = '<select name="inci" id="inci" data-native-menu="false">';
    $strListInci .= '<option value="-1" selected>- Seleccione Uno -</option>';
    $arrInciDisp  = Checkpoints::LoadArrayByTipo('INCIDENCIA');
    foreach ($arrInciDisp as $objInciDisp) {
        $strListInci .= '<option value="'.$objInciDisp->Id.'">'.$objInciDisp->Descripcion.'</option>';
    }
    $strListInci .= '</select>';

    $strNumeGuia = $objGuiaSele->Tracking;
    $strDetaGuia = '
    <div data-role="collapsible-set" data-inset="true" data-theme="d">
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Contactar Destinatario</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Destinatario: </td>
                        <td class="valor">'.$objGuiaSele->NombreDestinatario.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta"><i class="fa fa-phone fa-lg"></i></td>
                        <td class="valor"><a href="tel:'.$objGuiaSele->TelefonoDestinatario.'">'.$objGuiaSele->TelefonoDestinatario.'</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Detalles de Entrega</h3>
            <form action="grabar_pod.php" method="post">
                <input type="hidden" name="idxx" value="'.$intNumeGuia.'">
                <div class="ui-field-contain">
                    <label for="nomb">Quién Recibió ?</label>
                    <input type="text" name="nomb" id="nomb" placeholder="Nombre de la Persona" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="cedu">Cédula/RIF</label>
                    <input type="text" name="cedu" id="cedu" placeholder="Cedula ó RIF" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="fnac">Fecha Entrega</label>
                    <input type="text" name="fent" id="fent" placeholder="YYYY-MM-DD" required>
                </div>
                <div class="ui-field-contain">
                    <label for="cedu">Hora</label>
                    <input type="text" name="hora" id="hora" placeholder="HH:MM" required>
                </div>
                <div class="ui-field-contain">
                    <input type="submit" value="<i class=\'fa fa-check pull-left\'></i>Guardar" data-theme="b">
                </div>
            </form>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Reportar Incidencia</h3>
            <form action="grabar_incidencia.php" method="post">
                <input type="hidden" name="idxx" value="'.$intNumeGuia.'">
                <div class="ui-field-contain">
                    <label for="esta">Incidencia:</label><br>
                    '.$strListEsta.'
                </div>                
            </form>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles de la Guia</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Nro de Guia:</td>
                        <td class="valor">'.$objGuiaSele->Tracking.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Fecha:</td>
                        <td class="valor">'.$objGuiaSele->Fecha.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Remitente:</td>
                        <td class="valor">'.$objGuiaSele->NombreRemitente.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Piezas:</td>
                        <td class="valor">'.$objGuiaSele->Piezas.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    ';
} else {
    $strDetaGuia = '    
    <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver
    ';
}
?>

    <div data-role="page" id="resultado">

        <div data-role="header">
            <h5><span style="font-size:14px"><?= $strNumeGuia ?></span></h5>
        </div>

        <div data-role="content" >
            <?= $strDetaGuia ?>
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

<?php include('layout/footer.inc.php') ?> 
