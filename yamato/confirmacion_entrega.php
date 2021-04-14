<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Confirmación de Entrega";

$strMensUsua  = '<i class="fa fa-thumbs-o-up fa-2x" style="text-align: center;"></i><br><br>';
$strMensUsua .= 'La entrega ha sido confirmada exitosamente!';
$intCodiOper  = $_SESSION['CodiOper'];
if (isset($_GET['id'])) {
    $strNumeGuia = $_GET['id'];
    $objGuiaSele = Guia::Load($strNumeGuia);
    $objChofGuia = unserialize($_SESSION['User']);
    $objUsuaPodx = unserialize($_SESSION['UsuaGene']);
    $objCkptGuia = unserialize($_SESSION['CkptOkey']);

    if (isset($_GET['ac'])) {
        $strConfRepo = $_GET['ac'];

        switch ($strConfRepo) {
            case 'cep':
                $strParaConf = 's';
                $strEntrAqui = '';
                $strCeduEntr = '';
                //------------------------------------------------------------------------
                // Se valida que se tenga el nombre de la persona quien recibe la entrega
                //------------------------------------------------------------------------
                if (isset($_POST['reci'])) {
                    $strEntrAqui = $_POST['reci'];
                } else {
                    $strMensUsua = 'Se requiere el nombre de la persona a entregar para poder confirmar la guía';
                    $strParaConf = 'n';
                }
                //------------------------------------------------------------------------
                // Se valida que se tenga la cédula de la persona quien recibe la entrega
                //------------------------------------------------------------------------
                /*if (isset($_POST['cedu'])) {
                    $strCeduEntr = $_POST['cedu'];
                } else {
                    $strParaConf = 'n';
                }*/
                //------------------------------------------------------------------------------------------------------
                // Si ya se tienen los datos de la persona quien recibe la entrega, se procede entonces a grabar el POD
                //------------------------------------------------------------------------------------------------------
                if ($strParaConf != 'n') {
                    $calFechPodx = new QDateTime(QDateTime::Now);
                    $dttHoraPodx = date("H:i");
                    $intUsuaPodx = $objUsuaPodx->CodiUsua;
                    //----------------------------------------------------
                    // Vector de parametros para Grabar el POD en la Guia
                    //----------------------------------------------------
                    $arrDatoPodx['objGuiaPodx'] = $objGuiaSele;
                    $arrDatoPodx['objChecPodx'] = $objCkptGuia;
                    $arrDatoPodx['calFechPodx'] = $calFechPodx;
                    $arrDatoPodx['txtHoraPodx'] = $dttHoraPodx;
                    $arrDatoPodx['objUsuaPodx'] = $objUsuaPodx;
                    $arrDatoPodx['txtUsuaPodx'] = $intUsuaPodx;
                    $arrDatoPodx['txtEntrAqui'] = $strEntrAqui;
                    $arrDatoPodx['calFechEntr'] = $calFechPodx;
                    $arrDatoPodx['txtFechEntr'] = $calFechPodx->__toString("DD/MM/YYYY");
                    $arrDatoPodx['txtHoraEntr'] = $dttHoraPodx;
                    $arrResuPodx = GrabarPODEnLaGuia($arrDatoPodx);
                    $strMensUsua = $objGuiaSele->NumeGuia." ".$arrResuPodx['strMensUsua'];
                    if ($arrResuPodx['blnTodoOkey'] == false) {
                        $strParaConf = 'n';
                    }
                }
                break;
            default:
                $strParaConf = 'n';
        }
    }

    $strDetaGuia = '
    <div data-role="collapsible-set" data-inset="true" data-theme="a">
        <div data-role="collapsible" data-collapsed="false" style="text-align:center; font-size:14px;">
            <h3>Recolecta</h3>
    ';
    if ($strParaConf == 's') {
        $strDetaGuia .= '
                <div style="text-aling: center; padding-top: 2em; color: #5e85dc; font-weight: bold">'.$strMensUsua.'</div>
                <a href="lista_de_entregas.php?te=ppe" data-role="button" data-theme="b" style="margin-top: 2em;"><i class="fa fa-mail-reply pull-left"></i> Volver</a>
        ';
    }
    $strDetaGuia .='
            <br><br>
        </div>
    </div>';
} else {
    $strDetaGuia = '
    <div style="text-aling: center; padding-top: 2em; color: #5e85dc; font-weight: bold">'.$strMensUsua.'</div>
    <a data-rel="back" data-role="button" data-theme="b" style="align-self: center"><i class="fa fa-mail-reply pull-left"></i>Regresar</a>
    </center>';
}
?>
    <div data-role="page" id="resultado">
    <?php include('layout/header_deta_guia.inc.php') ?>
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
<?php $_SESSION['CodiOper'] = $intCodiOper; ?>
<?php include('layout/footer.inc.php') ?>