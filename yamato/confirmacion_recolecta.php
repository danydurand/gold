<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Confirmación de Recolecta";

$strMensUsua  = '<i class="fa fa-thumbs-o-up fa-2x" style="text-align: center;"></i><br><br>';
if (isset($_GET['id'])) {
    $intCodiDesp = $_GET['id'];
    $objRecoSele = DspDespacho::LoadByCodiDesp($intCodiDesp);
    $objChofReco = unserialize($_SESSION['User']);

    if (isset($_GET['ac'])) {
        $strConfRepo = $_GET['ac'];

        switch ($strConfRepo) {
            case 'crp':
                if ($objRecoSele->CodiCkpt == 'RR') {
                    $strParaConf = 'r';
                    $strMensUsua .= 'La recolecta ya ha sido realizada!';
                } else {
                    $strParaConf = 's';
                }
                break;
            case 'nsc':
                $strParaConf = 'n';
                $objRecoSele->CodiCkpt = 'RR';
                $objRecoSele->HoraEfec = date("H:i");
                $objRecoSele->FechModi = new QDateTime(QDateTime::Now);
                $objRecoSele->UsuaModi = $objChofReco->CodiChof;
                $objRecoSele->Save();
                $strMensUsua .= 'La recolecta ha sido confirmada exitosamente!';
                break;
            default:
                $strParaConf = 'n';
        }
    }

    $strDetaReco = '
    <div data-role="collapsible-set" data-inset="true" data-theme="a">
        <div data-role="collapsible" data-collapsed="false" style="text-align:center; font-size:14px;">
            <h3>Recolecta</h3>
    ';
    if ($strParaConf == 's') {
        $strDetaReco .= '
                <a href="confirmacion_recolecta.php?id='.$intCodiDesp.'&ac=nsc" data-role="button" data-inline="true" data-theme="b" style="margin-top: 2em; wintCodiDespth:180px;" data-rel="dialog"><i class="fa fa-check pull-left"></i> Confirmar</a>
        ';
    } elseif ($strParaConf == 'r') {
        $strDetaReco .= '
                <div style="text-aling: center; padding-top: 2em; color: #5e85dc; font-weight: bold">' .$strMensUsua.'</div>
                <a href="lista_de_recolectas.php?te=ppr" data-role="button" data-inline="true" data-theme="b" style="margin-top: 2em; width:180px;" data-rel="dialog"><i class="fa fa-mail-reply pull-left"></i> Volver</a>
        ';
    } else {
        $strDetaReco .= '
                <div style="text-aling: center; padding-top: 2em; color: #5e85dc; font-weight: bold">' .$strMensUsua.'</div>
                <a href="lista_de_recolectas.php?te=ppr" data-role="button" data-inline="true" data-theme="b" style="margin-top: 2em; width:180px;" data-rel="dialog"><i class="fa fa-mail-reply pull-left"></i> Volver</a>
        ';
        /*$strDetaReco .= '
                <div style="text-aling: center; padding-top: 2em; color: #5e85dc; font-weight: bold">' .$strMensUsua.'</div>
                <a href="lista_de_guias.php?o=grp&cid='.$objRecoSele->CodiClie.'" data-role="button" data-inline="true" data-theme="b" style="margin-top: 2em; width:180px;" data-rel="dialog"><i class="fa fa-mail-reply pull-left"></i> Volver</a>
        ';*/
    }
    $strDetaReco .='
            <br><br>
        </div>
    </div>';
} else {
    $strDetaReco = '    
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
    </center>';
}
?>

<div data-role="page" id="resultado">

    <?php include('layout/header_deta_reco.inc.php') ?>

    <div data-role="content" >
        <?= $strDetaReco ?>
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
