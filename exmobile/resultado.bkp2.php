<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/funciones_serviexpress.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_POST['fobx'])) {
    $_SESSION['fobx'] = floatval($_POST['fobx']);
    $_SESSION['peso'] = floatval($_POST['peso']);
    $_SESSION['alto'] = floatval($_POST['alto']);
    $_SESSION['anch'] = floatval($_POST['anch']);
    $_SESSION['larg'] = floatval($_POST['larg']);    
}
$decValoMerc = $_SESSION['fobx'];
$decPesoLibr = $_SESSION['peso'];
$decAltoEnvi = $_SESSION['alto'];
$decAnchEnvi = $_SESSION['anch'];
$decLargEnvi = $_SESSION['larg'];

// echo $decValoMerc."<br>\n";
// echo $decPesoLibr."<br>\n";
// echo $decAltoEnvi."<br>\n";
// echo $decAnchEnvi."<br>\n";
// echo $decLargEnvi."<br>\n";

$_SESSION['aran'] = 0;
if ($decValoMerc > 100) {
    // echo "Valor Alto<br>\n";
    if (isset($_POST['aran']) && strlen($_POST['aran']) > 0) {
        // echo "El Usuario definio el %<br>\n";
        $_SESSION['aran'] = floatval($_POST['aran']);
    } else {
        $_SESSION['aran'] = 20;
        // echo "Se asigno el valor por defecto<br>\n";
    }
}
$decPorcAran = $_SESSION['aran'];
// echo 4;

// echo "Arancel: ".$decPorcAran."<br>\n";

$arrDatoPeso['decAltoEnvi'] = $decAltoEnvi;
$arrDatoPeso['decAnchEnvi'] = $decAnchEnvi;
$arrDatoPeso['decLargEnvi'] = $decLargEnvi;

$arrPesoVolu = CalcularPesosVolumetricos($arrDatoPeso);

$decPesoVolu = $arrPesoVolu['decPesoVolu'];

// echo "Volumen: ".$decPesoVolu."<br>\n";

$arrDatoTari['objProdCalc'] = Producto::Load(1);
$arrDatoTari['dttFechVige'] = date('Y-m-d');
$arrDatoTari['decValoMerc'] = $decValoMerc;
$arrDatoTari['decPesoLibr'] = $decPesoLibr;
$arrDatoTari['decPesoVolu'] = $decPesoVolu;
$arrDatoTari['decPorcAran'] = $decPorcAran; 

$arrResuCalc = calcularTarifa($arrDatoTari);

$blnTodoOkey = $arrResuCalc['blnTodoOkey'];
// echo "Todo Ok: ".$blnTodoOkey."<br>\n";

$decPesoCalc = nf($arrResuCalc['decPesoCalc']);
$decCostLibr = nf($arrResuCalc['decCostLibr']);
$decMontBase = nf($arrResuCalc['decMontBase']);
$decGastMane = nf($arrResuCalc['decGastMane']);
$decMontAran = nf($arrResuCalc['decMontAran']);
$decTasaAdua = nf($arrResuCalc['decTasaAdua']);
$decIvaxImpo = nf($arrResuCalc['decIvaxImpo']);
$decImpuImpo = nf($arrResuCalc['decImpuImpo']);
$decMontTari = nf($arrResuCalc['decMontTari']);
$decTasaDola = nf($arrResuCalc['decTasaDola']);
$strTipoDola = $arrResuCalc['strTipoDola'];
$decValoBoli = nf($arrResuCalc['decValoBoli']);

$strNombImag = __APP_IMAGE_ASSETS__."/punto_venta.png";
// echo $strNombImag."<br>\n";
// exit;

$strResuCalc = '';
$strResuCalc = '
<ul data-role="listview" data-inset="true" data-split-icon="gear" data-split-theme="d">
    <li>
        <a href="">
            <img src="'.$strNombImag.'" width="40px" height="40px">
            <h2><span class="info">Flete :</span> '.$decMontBase.'</h2>
            <h2><span class="info">Gastos Manejo :</span> '.$decGastMane.'</h2>
            <h2><span class="info">Nacionalización :</span> '.$decImpuImpo.'</h2>
            <h2><span class="info">Total (Aproximado) :</span> '.$decMontTari.'</h2>
        </a>
        <a href="#info-calculo" data-rel="popup" data-position-to="window" data-transition="pop"></a>
    </li>
</ul>
<div data-role="popup" id="info-calculo" data-theme="d" class="ui-content" data-overlay-theme="b">
    <ul>
        <li><span class="info">Volumen</span> : '.$decPesoVolu.'</li>
        <li><span class="info">Peso p/cálculo</span> : '.$decPesoCalc.'</li>
        <li><span class="info">Costo x Libra</span> : '.$decCostLibr.'</li>
        <li><span class="info">Tasa USD :</span>: '.$decTasaDola.' ('.$strTipoDola.')</li>
    </ul>    
    <a href="index.html" data-role="button" data-rel="back" data-theme="b" data-icon="check"
        data-mini="true" data-inline="true">
        Regresar 
    </a>
</div>
<center>
    <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
</center>
';
?>

<?php //include('layout/header.inc.php') ?> 

    <div data-role="page" id="resultado">';

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content" >
            <?= $strResuCalc ?>
        </div>

        <style>
            .info {
                font-weight: bold;
            }
        </style>
        <?php include('layout/page_footer.inc.php') ?>;

    </div>

<?php include('layout/footer.inc.php') ?> 

