<?php
require_once('qcubed.inc.php');

/* @var $objChofCone Chofer */
$objChofCone = unserialize($_SESSION['User']);

/* @var $objOtraPiez GuiaPiezas */
//t('Entrando al Detalle de la Pieza...');

$strTituPagi = "Detalle de Pieza";
$strNumeGuia = '';
$blnTeniPodx = false;
$strDetaPiez = '';
$strTipoGuia = 'PE';
if (isset($_GET['tg'])) {
    $strTipoGuia = $_GET['tg'];
}
$intGrupGuia = 1;
if (isset($_GET['gg'])) {
    $intGrupGuia = $_GET['gg'];
}
if (isset($_GET['id'])) {
    $intPiezIdxx = $_GET['id'];
    $intManiIdxx = $_GET['mid'];

    $objPiezSele = GuiaPiezas::Load($intPiezIdxx);
    $objChofCone->grabarLogMobile('Entrando al Detalle de la Pieza: '.$objPiezSele->IdPieza);

    $strIdxxPiez = explode('-',$objPiezSele->IdPieza)[1];

    $objManiSele = Containers::Load($intManiIdxx);

    //----------------------
    // Informacion del POD
    //----------------------
    $strQuieReci = '';
    $strCeduRifx = '';
    $strFechEntr = '';
    $strHoraEntr = '';
    $objPodxPiez = $objPiezSele->POD();
    if ($objPodxPiez) {
        $blnTeniPodx = true;
        $strQuieReci = explode(':',$objPodxPiez->EntregadoA)[1];
        $strCeduRifx = $objPodxPiez->Cedula;
        $strFechEntr = $objPodxPiez->Fecha;
        $strHoraEntr = $objPodxPiez->Hora;
    }
    $strAcciForm = $blnTeniPodx ? 'borrar_pod.php' : 'grabar_pod.php';
    $strTextAcci = $blnTeniPodx ? 'Borrar' : 'Grabar';
    $strIconAcci = $blnTeniPodx ? 'times-circle-o' : 'check';


    $arrOtraProc = [];
    $arrOtraPiez = $objPiezSele->OtrasPiezasDeLaMismaGuia();
    foreach ($arrOtraPiez as $objOtraPiez) {
        //--------------------------------------------------------------------------------------------
        // Si existen mas piezas de la misma guia, asociadas al Manifiesto y no han sido entregadas
        //--------------------------------------------------------------------------------------------
        if ($objManiSele->IsGuiaPiezasAsContainerPiezaAssociated($objOtraPiez)) {
            if ($blnTeniPodx){
                if ($objOtraPiez->ultimoCheckpoint() == 'OK') {
                    //t('La pieza tiene OK');
                    $arrOtraProc[] = $objOtraPiez;
                }
            } else {
                if ($objOtraPiez->ultimoCheckpoint() != 'OK') {
                    //t('La pieza no tiene OK');
                    $arrOtraProc[] = $objOtraPiez;
                }
            }
        }
    }
    if (count($arrOtraProc) > 0) {
        $_SESSION['OtraProc'] = serialize($arrOtraProc);
    }


    $strNumeGuia = $objPiezSele->IdPieza;
    //----------------------------------------------------------------
    // Si tiene mas de uno, aqui se separan los numeros de telefonos
    //----------------------------------------------------------------
    $strHtmlTele = '';
    $arrVariTele = explode('/',$objPiezSele->Guia->TelefonoDestinatario);
    if (count($arrVariTele) > 0) {
        $intCantTele = 1;
        foreach ($arrVariTele as $strNumeTele) {
            if (strlen($strNumeTele) > 0) {
                $strHtmlTele .= '
                    <tr>
                        <td class="etiqueta"><i class="fa fa-phone fa-lg"></i></td>
                        <td class="valor"><a href="tel:'.$strNumeTele.'">Tel #'.$intCantTele.': '.$strNumeTele.'</a></td>
                    </tr>
                ';
                $intCantTele++;
            }
        }
    }

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
    //--------------------------------------------------------------------------------------------
    // Si se trata de una Gu??a multi-piezas, se ofrece al Usuario la posibilidad de dar el mismo
    // estatus al resto de la piezas de esa misma gu??a
    //--------------------------------------------------------------------------------------------
    $strMultInci = '';
    if (count($arrOtraProc) > 0) {
        $strMultInci .= '
        <div class="ui-field-contain">
            <label for="multinci" style="text-align: center">
            Desea asignar la misma Incidencia a todas las piezas de esta misma Gu??a !?
            </label>
            <fieldset data-role="controlgroup">
                <label for="siin">Si</label>
                <input type="radio" name="mult_inci" id="siin" value="S">
                <label for="noin">No</label>
                <input type="radio" name="mult_inci" id="noin" value="N">
            </fieldset>
        </div>
        ';
    }

    //--------------------
    // Ultimo Checkpoint
    //--------------------
    $strColoLetr = 'red';
    $strUltiCome = 'N/A';
    $strUltiFech = '';
    $strUltiHora = '';
    $arrUltiCkpt = $objPiezSele->ultimoCheckpointTodo();
    if (isset($arrUltiCkpt)) {
        t(print_r($arrUltiCkpt));
        $strUltiCome = $arrUltiCkpt['comentario'];
        $strUltiFech = $arrUltiCkpt['fecha'];
        $strUltiHora = $arrUltiCkpt['hora'];
        $strCodiCkpt = $objPiezSele->ultimoCheckpoint();
        if ($strCodiCkpt == 'OK') {
            $strColoLetr = 'green';
        }
    }

    //--------------------------------------------------------------------------------------------
    // Si se trata de una Gu??a multi-piezas, se ofrece al Usuario la posibilidad de dar el mismo
    // estatus al resto de la piezas de esa misma gu??a
    //--------------------------------------------------------------------------------------------
    $strMultPodx = '';
    if (count($arrOtraProc) > 0) {
        if (!$blnTeniPodx) {
            $strMensUsua = 'Usted esta trasladando otras Piezas de esta misma Gu??a.
            Desea grabar la misma Informaci??n de Entrega a todas ellas !?';
        } else {
            $strMensUsua = 'Otras Piezas de esta misma Gu??a tienen Informaci??n de Entrega.
            Desea eliminar la Informaci??n de Entrega de todas ellas !?';
        }
        $strMultPodx .= '
        <div class="ui-field-contain">
            <label for="multpodx" style="text-align: center">'.$strMensUsua.'</label>
            <fieldset data-role="controlgroup">
                <label for="siok">Si</label>
                <input type="radio" name="mult_podx" id="siok" value="S">
                <label for="nook">No</label>
                <input type="radio" name="mult_podx" id="nook" value="N">
            </fieldset>
        </div>
        ';
    }

    //-----------------------------------------------------------
    // Si la Empresa transportista maneja un consecutivo propio
    //-----------------------------------------------------------
    $strGuiaTran = $objPiezSele->GuiaTransportista();
    $strSecuTran = '';
    if ($strGuiaTran != $objPiezSele->IdPieza) {
        $strSecuTran = '
        <tr>
            <td class="etiqueta">Guia-Transp:</td>
            <td class="valor">'.$strGuiaTran.'</td>
        </tr>
        ';
    }

    $strDetaPiez = '
    <div data-role="collapsible-set" data-inset="true" data-theme="a">
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Contactar Destinatario</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Destinatario: </td>
                        <td class="valor">'.$objPiezSele->Guia->NombreDestinatario.'</td>
                    </tr>
                    '.$strHtmlTele.' 
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
                <input type="hidden" name="tipo" value="'.$strTipoGuia.'">
                <input type="hidden" name="grup" value="'.$intGrupGuia.'">
                <input type="hidden" name="idxx" value="'.$objPiezSele->Id.'">
                <input type="hidden" name="midx" value="'.$objManiSele->Id.'">
                <div class="ui-field-contain">
                    <label for="nomb">Qui??n Recibi?? ?</label>
                    <input type="text" name="nomb" id="nomb" value="'.$strQuieReci.'" placeholder="Nombre de la Persona" required>
                </div>
                <div class="ui-field-contain">
                    <label for="cedu">C??dula/RIF</label>
                    <input type="text" name="cedu" id="cedu" value="'.$strCeduRifx.'" placeholder="Cedula ?? RIF" required>
                </div>
                <div class="ui-field-contain">
                    <label for="fnac">Fecha Entrega</label>
                    <input type="text" name="fent" id="fent" value="'.$strFechEntr.'" placeholder="YYYY-MM-DD" required>
                </div>
                <div class="ui-field-contain">
                    <label for="cedu">Hora (Utilice Hora Militar)</label>
                    <input type="text" name="hora" id="hora" value="'.$strHoraEntr.'" placeholder="HH:MM" required>
                </div>
                '.$strMultPodx.'
                <div class="ui-field-contain">
                    <input type="submit" value="<i class=\'fa fa-'.$strIconAcci.' pull-left\'></i>'.$strTextAcci.'" data-theme="b">
                </div>
            </form>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
            <h3>Reportar Incidencia</h3>
            <form action="grabar_incidencia.php" method="post">
                <input type="hidden" name="tipo" value="'.$strTipoGuia.'">
                <input type="hidden" name="grup" value="'.$intGrupGuia.'">
                <input type="hidden" name="idxx" value="'.$objPiezSele->Id.'">
                <input type="hidden" name="midx" value="'.$objManiSele->Id.'">
                <div class="ui-field-contain">
                    <label for="esta" style="text-align: center">Seleccione el estatus que desea dar a la Gu??a:</label><br>
                    '.$strListInci.'
                </div>                
                '.$strMultInci.'
                <div class="ui-field-contain">
                    <input type="submit" value="<i class=\'fa fa-check pull-left\'></i>Grabar" data-theme="b">
                </div>
            </form>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles de la Guia</h3>
            <table width="100%">
                <tbody>
                    '.$strSecuTran.'
                    <tr>
                        <td class="etiqueta">Nro de Guia:</td>
                        <td class="valor">'.$objPiezSele->Guia->Tracking.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Pieza:</td>
                        <td class="valor">'.$strIdxxPiez.'</td>
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
                        <td class="valor" style="font-weight: bold; color: '.$strColoLetr.'">'.$strUltiCome.'</td>
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
$objChofCone->grabarLogMobile('Se cargo la informacion de la Pieza');

?>
<?php include('layout/header.inc.php'); ?>

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
