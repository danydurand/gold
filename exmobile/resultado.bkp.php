<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/funciones_serviexpress.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

$decValoMerc = floatval($_POST['fobx']);
$decPesoLibr = floatval($_POST['peso']);
$decAltoEnvi = floatval($_POST['alto']);
$decAnchEnvi = floatval($_POST['anch']);
$decLargEnvi = floatval($_POST['larg']);

$decPorcAran = 0;
if ($decValoMerc > 100) {
   // echo "Valor Alto<br>\n";
   if (isset($_POST['aran'])) {
      // echo "El Usuario definio el %<br>\n";
      $decPorcAran = floatval($_POST['aran']);
   } else {
      $decPorcAran = 20;
      // echo "Se asigno el valor por defecto<br>\n";
   }
}

// echo "Arancel: ".$decPorcAran."<br>\n";

$arrDatoPeso['decAltoEnvi'] = $decAltoEnvi;
$arrDatoPeso['decAnchEnvi'] = $decAnchEnvi;
$arrDatoPeso['decLargEnvi'] = $decLargEnvi;

$arrPesoVolu = CalcularPesosVolumetricos($arrDatoPeso);

$decPesoVolu = $arrPesoVolu['decPesoVolu'];

$arrDatoTari['objProdCalc'] = Producto::Load(1);
$arrDatoTari['dttFechVige'] = date('Y-m-d');
$arrDatoTari['decValoMerc'] = $decValoMerc;
$arrDatoTari['decPesoLibr'] = $decPesoLibr;
$arrDatoTari['decPesoVolu'] = $decPesoVolu;
$arrDatoTari['decPorcAran'] = $decPorcAran; 

$arrResuCalc = calcularTarifa($arrDatoTari);

$blnTodoOkey = $arrResuCalc['blnTodoOkey'];

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

$strPartUnox = '
<div class="ui-grid-a">
    <div class="ui-block-a">
        <div class="ui-bar ui-bar-b etiqueta">Volumen:</div>
    </div>
    <div class="ui-block-b">
        <div class="ui-bar ui-bar-b campo">'.$decPesoVolu.'</div>
    </div>
</div>
<div class="ui-grid-a">
    <div class="ui-block-a">
        <div class="ui-bar ui-bar-b etiqueta">Peso p/Calculo:</div>
    </div>
    <div class="ui-block-b">
        <div class="ui-bar ui-bar-b campo">'.$decPesoCalc.'</div>
    </div>
</div>
<div class="ui-grid-a">
    <div class="ui-block-a">
        <div class="ui-bar ui-bar-b etiqueta">Costo x Libra:</div>
    </div>
    <div class="ui-block-b">
        <div class="ui-bar ui-bar-b campo">'.$decCostLibr.'</div>
    </div>
</div>
<div class="ui-grid-a">
    <div class="ui-block-a">
        <div class="ui-bar ui-bar-b etiqueta">Flete:</div>
    </div>
    <div class="ui-block-b">
        <div class="ui-bar ui-bar-b campo">'.$decMontBase.'</div>
    </div>
</div>
<div class="ui-grid-a">
    <div class="ui-block-a">
        <div class="ui-bar ui-bar-b etiqueta">Gastos Manejo:</div>
    </div>
    <div class="ui-block-b">
        <div class="ui-bar ui-bar-b campo">'.$decGastMane.'</div>
    </div>
</div>
<div class="ui-grid-a">
    <div class="ui-block-a">
        <div class="ui-bar ui-bar-b etiqueta">Total a Pagar:</div>
    </div>
    <div class="ui-block-b">
        <div class="ui-bar ui-bar-b campo">'.$decMontTari.'</div>
    </div>
</div>
';

$strPartDosx = '';
if ($decValoMerc > 100) {
    $strPartDosx = '
    <center>  
        <h3>Informacion Adicional</h3>
    </center>  
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-b etiqueta">Tasa USD:</div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-b campo">'.$decTasaDola.' ('.$strTipoDola.')</div>
        </div>
    </div>
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-b etiqueta">Mto Arancel:</div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-b campo">'.$decMontAran.'</div>
        </div>
    </div>
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-b etiqueta">Tasa Aduana:</div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-b campo">'.$decTasaAdua.'</div>
        </div>
    </div>
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-b etiqueta">Iva Imp.:</div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-b campo">'.$decIvaxImpo.'</div>
        </div>
    </div>
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <div class="ui-bar ui-bar-b etiqueta">Nacionalización:</div>
        </div>
        <div class="ui-block-b">
            <div class="ui-bar ui-bar-b campo">'.$decImpuImpo.'</div>
        </div>
    </div>
    ';
}
?>

<?php include('layout/header.inc.php') ?> 

    <div data-role="page" id="resultado">';

        <?php include('layout/header_simple.inc.php') ?>

        <div data-role="content" >
            <?= $strPartUnox ?>
            <?= $strPartDosx ?>
            <center>
                <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
            </center>
        </div>
        <style>
            .etiqueta {
                height: 20px;
                text-align: right;
            }        
            .campo {
                height: 20px;
                text-align: right;
            }        
        </style>
        <?php include('layout/page_footer.inc.php') ?>;

    </div>

<?php include('layout/footer.inc.php') ?> 

