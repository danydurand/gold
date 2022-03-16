<?php
require_once('qcubed.inc.php');

tc('============================');
tc('Entrando a Detalle de Guias');

if (!isset($_SESSION['GuiaSele'])) {
    QApplication::Redirect('index.php');
}

/* @var $objGuiaSele Guias */
$objGuiaSele = unserialize($_SESSION['GuiaSele']);
tc('La guia es: '.$objGuiaSele->Tracking);
$objResuEntr = $objGuiaSele->ResumenDeEntrega();
tc('Cantida de Piezas: '.$objResuEntr->TotaPiez);
$strTituPagi = "Detalle de Guia";
$arrPiezGuia = $objGuiaSele->GetGuiaPiezasAsGuiaArray();
$objCkptOkey = Checkpoints::LoadByCodigo('OK');
$strListPiez = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="false" data-split-theme="a">
';
if ($arrPiezGuia) {
    foreach ($arrPiezGuia as $objPiezGuia) {
        $strPiezGuia = $objPiezGuia->IdPieza;
        $strEtiqEsta = '';
        $strUltiCome = '';
        $strClasPara = '';
        tc('Voy a buscar el Ultimo Checkpoint');
        $arrUltiCkpt = $objPiezGuia->ultimoCheckpointTodo();
        tc('Ya regrese');
        if (isset($arrUltiCkpt)) {
            $intUltiCkpt = $arrUltiCkpt['checkpoint_id'];
            $strUltiCome = $arrUltiCkpt['comentario'];
            if ($intUltiCkpt == $objCkptOkey->Id) {
                $strUltiCome = str_replace('ENTREGADO A:','',$strUltiCome);
                $strClasPara = 'class="etiqueta_ok"';
                $strEtiqEsta = '<p class="etiqueta_ok">ENTREGADO A: </p>';
            } else {
                $strEtiqEsta = '<p class="valor1">CONTENIDO: '.$objPiezGuia->Descripcion.'</p>';
            }

        }
        tc('Id de la Pieza: '.$objPiezGuia->Id);
        $strLinkPiez = 'detalle_de_pieza_rastreo.php?id='.$objPiezGuia->Id;
        $strListPiez .= '
            <li>
                <a href="'.$strLinkPiez.'">
                    <img src="images/list.png" class="extra">
                    <h6>'.$strPiezGuia.'</h6>
                    <p><b>Destinatario:</b> '.$objPiezGuia->Guia->NombreDestinatario.'</p>
                    <p><b>Destino:</b> '.$objPiezGuia->Guia->Destino->Iata.'</p>
                    <p><b>Status:</b> '.$strUltiCome.'</p>
                </a>
            </li>
        ';
    }
    $strListPiez .= '</ul>';
} else {
    $strListPiez = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Piezas</a>
    </center>
    ';
}


$strDetaGuia = '
<a href="rastreo.php" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Buscar Otra</a>
<div data-role="collapsible-set" data-inset="true" data-theme="a">
    <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="false" style="font-size:14px;">
        <h3>Detalle de la Guía</h3>
        <table width="100%">
            <tbody>
                <tr>
                    <td class="etiqueta">Nro de Guia:</td>
                    <td class="valor">'.$objGuiaSele->Tracking.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Fecha:</td>
                    <td class="valor">'.$objGuiaSele->Fecha->__toString("DD/MM/YYYY").'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Destino:</td>
                    <td class="valor">'.$objGuiaSele->Destino->Nombre.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Remitente:</td>
                    <td class="valor">'.$objGuiaSele->NombreRemitente.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Destinatario:</td>
                    <td class="valor">'.$objGuiaSele->NombreDestinatario.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Piezas:</td>
                    <td class="valor">'.$objGuiaSele->Piezas.'</td>
                </tr>
                <tr>
                    <td class="etiqueta_verde">Pzas Entreg:</td>
                    <td class="valor etiqueta_verde">'.$objResuEntr->CantOkey.'/'.$objGuiaSele->Piezas.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Kilos:</td>
                    <td class="valor">'.$objGuiaSele->Kilos.'</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" style="font-size:14px;">
        <h3>Información de las Piezas</h3>
        '.$strListPiez.'
    </div>
</div>
';
?>
<?php include('layout/header.inc.php') ?>

    <div data-role="page" id="resultado">

        <div data-role="header">
            <h5><span style="font-size:14px"><?= $objGuiaSele->Tracking ?></span></h5>
        </div>

        <div data-role="content" style="min-height: 400px">
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
                width: 20%;
            }
            .etiqueta_ok {
                color: green;
                font-weight: bold;
                padding: 2px;
                text-align: left;
                vertical-align: top;
                width: 100%;
                font-size: 36px;
            }
            .etiqueta_verde {
                color: green;
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
            .valor1 {
                font-weight: bold;
                text-align: left;
                padding: 3px;
            }
        </style>
        <?php include('layout/page_footer.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 
