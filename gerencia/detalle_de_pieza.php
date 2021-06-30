<?php
require_once('qcubed.inc.php');

include('layout/header.inc.php');

$strTituPagi = "Detalle de Pieza";
$strNumeGuia = '';
$blnTeniPodx = false;
if (isset($_GET['id'])) {
    $intPiezIdxx = $_GET['id'];
    $objPiezSele = GuiaPiezas::Load($intPiezIdxx);
    $strNumeGuia = $objPiezSele->IdPieza;

    //--------------
    // Incidencias
    //--------------
    $strListInci  = '<select name="inci" id="inci" data-native-menu="false">';
    $strListInci .= '<option value="-1" selected>- Seleccione Uno -</option>';
    $arrInciDisp = Checkpoints::LoadArrayByTipo('INCIDENCIA');
    foreach ($arrInciDisp as $objInciDisp) {
        $strListInci .= '<option value="'.$objInciDisp->Id.'">'.$objInciDisp->Descripcion.'</option>';
    }
    $strListInci .= '</select>';

    //--------------------
    // Ultimo Checkpoint
    //--------------------
    $strUltiCome = 'N/A';
    $strUltiFech = '';
    $strUltiHora = '';
    $arrUltiCkpt = $objPiezSele->ultimoCheckpointTodo();
    if (isset($arrUltiCkpt)) {
        $strUltiCome = $arrUltiCkpt['comentario'];
        $strUltiFech = $arrUltiCkpt['fecha'];
        $strUltiHora = $arrUltiCkpt['hora'];
    }

    //----------------------
    // Informacion del POD
    //----------------------
    $strQuieReci = '';
    $strCeduRifx = '';
    $strFechEntr = '';
    $strHoraEntr = '';
    t('En el detalle de la pieza: '.$intPiezIdxx);
    $objPodxPiez = GuiaPiezaPod::LoadByGuiaPiezaId($intPiezIdxx);
    if ($objPodxPiez) {
        $blnTeniPodx = true;
        t('Tiene POD...');
        $strQuieReci = $objPodxPiez->EntregadoA;
        if (strpos($strQuieReci,'|') > 0) {
            t('El nombre de la persona que recibio, contiene tambien la cedula');
            $arrQuieReci = explode('|',$strQuieReci);
            $strQuieReci = $arrQuieReci[0];
            $strCeduRifx = $arrQuieReci[1];
        }
        $strFechEntr = $objPodxPiez->FechaEntrega;
        $strHoraEntr = $objPodxPiez->HoraEntrega;
    }
    $strAcciForm = $blnTeniPodx ? 'borrar_pod.php' : 'grabar_pod.php';
    $strTextAcci = $blnTeniPodx ? 'Borrar' : 'Grabar';
    $strIconAcci = $blnTeniPodx ? 'times-circle-o' : 'check';

    $strDetaPiez = '
    <div data-role="collapsible-set" data-inset="true" data-theme="d">
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Contactar Destinatario</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Destinatario: </td>
                        <td class="valor">'.$objPiezSele->Guia->NombreDestinatario.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta"><i class="fa fa-phone fa-lg"></i></td>
                        <td class="valor"><a href="tel:'.$objPiezSele->Guia->TelefonoDestinatario.'">'.$objPiezSele->Guia->TelefonoDestinatario.'</a></td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Direccion: </td>
                        <td class="valor">'.$objPiezSele->Guia->DireccionDestinatario.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Detalles de Entrega</h3>
            <form action="'.$strAcciForm.'" method="post">
                <input type="hidden" name="idxx" value="'.$objPiezSele->Id.'">
                <div class="ui-field-contain">
                    <label for="nomb">Quién Recibió ?</label>
                    <input type="text" name="nomb" id="nomb" value="'.$strQuieReci.'" placeholder="Nombre de la Persona" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="cedu">Cédula/RIF</label>
                    <input type="text" name="cedu" id="cedu" value="'.$strCeduRifx.'" placeholder="Cedula ó RIF" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="fnac">Fecha Entrega</label>
                    <input type="text" name="fent" id="fent" value="'.$strFechEntr.'" placeholder="YYYY-MM-DD" required>
                </div>
                <div class="ui-field-contain">
                    <label for="cedu">Hora (Utilice Hora Militar)</label>
                    <input type="text" name="hora" id="hora" value="'.$strHoraEntr.'" placeholder="HH:MM" required>
                </div>
                <div class="ui-field-contain">
                    <input type="submit" value="<i class=\'fa fa-'.$strIconAcci.' pull-left\'></i>'.$strTextAcci.'" data-theme="b">
                </div>
            </form>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Reportar Incidencia</h3>
            <form action="grabar_incidencia.php" method="post">
                <input type="hidden" name="idxx" value="'.$objPiezSele->Id.'">
                <div class="ui-field-contain">
                    <label for="esta">Incidencias:</label><br>
                    '.$strListInci.'
                </div>                
                <div class="ui-field-contain">
                    <input type="submit" value="<i class=\'fa fa-check pull-left\'></i>Grabar" data-theme="b">
                </div>
            </form>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles de la Guia</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Nro de Guia:</td>
                        <td class="valor">'.$objPiezSele->Guia->Tracking.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Destinatario:</td>
                        <td class="valor">'.$objPiezSele->Guia->NombreDestinatario.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Remitente:</td>
                        <td class="valor">'.$objPiezSele->Guia->NombreRemitente.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Piezas:</td>
                        <td class="valor">'.$objPiezSele->Guia->Piezas.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Direccion: </td>
                        <td class="valor">'.$objPiezSele->Guia->DireccionDestinatario.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Ult. Status:</td>
                        <td class="valor">'.$strUltiCome.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Fecha/Hora:</td>
                        <td class="valor">'.$strUltiFech.' - '.$strUltiHora.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    ';
} else {
    $strDetaPiez = '    
    <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Volver
    ';
}
?>

    <div data-role="page" id="resultado">

        <div data-role="header">
            <h5><span style="font-size:14px"><?= $strNumeGuia ?></span></h5>
        </div>

        <div data-role="content" >
            <?= $strDetaPiez ?>
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
