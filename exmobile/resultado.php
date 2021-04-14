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
// exit;

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


$strResuCalc = '
<div data-role="collapsible-set" data-inset="true" data-theme="e" class="ui-nodisc-icon">
    <div data-role="collapsible" data-collapsed="false" style="font-size:14px;">
        <h3>Resumen de los Cálculos</h3>
        <table>
            <tbody>
                <tr>
                    <td class="etiqueta">Flete:</td>
                    <td class="valor">'.$decMontBase.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Gastos Manejo:</td>
                    <td class="valor">'.$decGastMane.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Nacionalización:</td>
                    <td class="valor">'.$decImpuImpo.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Total (Aproximado):</td>
                    <td class="valor">'.$decMontTari.'</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div data-role="collapsible" style="font-size:14px;">
        <h3>Detalle para el Cálculo</h3>
        <table>
            <tbody>
                <tr>
                    <td class="etiqueta">Valor Mercancía:</td>
                    <td class="valor">'.$decValoMerc.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Peso Libras:</td>
                    <td class="valor">'.$decPesoLibr.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Alto/Anch/Larg:</td>
                    <td class="valor">'.$decAltoEnvi."/".$decAnchEnvi."/".$decLargEnvi.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Volumen:</td>
                    <td class="valor">'.$decPesoVolu.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Se Cálcula sobre:</td>
                    <td class="valor">'.$decPesoCalc.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Costo x Libra:</td>
                    <td class="valor">'.$decCostLibr.'</td>
                </tr>
                <tr>
                    <td class="etiqueta">Tasa USD:</td>
                    <td class="valor">'.$decTasaDola.' ('.$strTipoDola.')</td>
                </tr>
                <tr>
                    <td class="etiqueta">Valor en Bs:</td>
                    <td class="valor">'.$decValoBoli.'</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<center>
    <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>Regresar</a>
</center>
';
?>

<?php //include('layout/header.inc.php') ?> 

    <div data-role="page" id="resultado">

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content" >
            <?= $strResuCalc ?>
        </div>

        <style>
            .etiqueta {
                font-weight: bold;
                padding: 3px;
                text-align: right;
            }
            .valor {
                text-align: right;
                padding: 3px;
            }
            #uno, #dos, #tres {
                display: inline-block;
            }
            #dos, #tres {
                margin-left: 2em;
            }
        </style>
        <?php include('layout/page_footer.inc.php') ?>;

    </div>

<?php include('layout/footer.inc.php') ?> 

