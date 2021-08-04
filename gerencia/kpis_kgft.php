<?php
require_once('qcubed.inc.php');
$strTituPagi = "KPIs Kg/Ft";

$objDatabase   = Parametro::GetDatabase();
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Parametros()->Valor1);
$objQuerMobi   = Parametros::LoadByIndiceCodigo('QRYRANK','MAINKILO',$objClauOrde);
$strTituDest   = trim($objQuerMobi->Descripcion);
$strCadeSqlx   = trim($objQuerMobi->Texto1);
$objDbResult   = $objDatabase->Query($strCadeSqlx);
$strHtmlKilo   = '';
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strHtmlKilo .= '
    <li>
        <a href="#">'.substr($mixRegistro['nombre'],0,23).'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}
$objQuerMobi = Parametros::LoadByIndiceCodigo('QRYRANK','MAINFEET',$objClauOrde);
$strTituCust = trim($objQuerMobi->Descripcion);
$strCadeSqlx = trim($objQuerMobi->Texto1);
$objDbResult = $objDatabase->Query($strCadeSqlx);
$strHtmlFeet = '';
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strHtmlFeet .= '
    <li>
        <a href="#">'.substr($mixRegistro['nombre'],0,23).'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}
$strHtmlRkil  = '';
$objQuerMobi  = Parametros::LoadByIndiceCodigo('QRYRANG','RANGKILO',$objClauOrde);
$objQuerPorc  = Parametros::LoadByIndiceCodigo('QRYRANG','PORCKILO');
if ($objQuerMobi) {
    //-------------------------------------
    // Porcentajes de los Rangos de Kilos
    //-------------------------------------
    $strCadeSqlx  = trim($objQuerPorc->Texto1);
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    $mixRegistro  = $objDbResult->FetchArray();
    $decPorcH2KG  = $mixRegistro['P2KG'];
    $decPorcH5KG  = $mixRegistro['P2a5KG'];
    $decPorcH8KG  = $mixRegistro['P5a8KG'];
    $decPorc12KG  = $mixRegistro['P8a12KG'];
    $decPorc20KG  = $mixRegistro['P12a20KG'];
    $decPorcM20K  = $mixRegistro['PM20KG'];
    //------------------
    // Rangos de Kilos
    //------------------
    $strCadeSqlx  = trim($objQuerMobi->Texto1);
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    $mixRegistro  = $objDbResult->FetchArray();
    $strHtmlRkil .= '
    <li>
        <a href="#">HASTA 2KG ('.$decPorcH2KG.'%)
        <span class="ui-li-count">'.$mixRegistro['H2KG'].'</a>
    </li>
    <li>
        <a href="#">2KG A 5KG ('.$decPorcH5KG.'%)
        <span class="ui-li-count">'.$mixRegistro['2a5KG'].'</a>
    </li>
    <li>
        <a href="#">5KG A 8KG ('.$decPorcH8KG.'%)
        <span class="ui-li-count">'.$mixRegistro['5a8KG'].'</a>
    </li>
    <li>
        <a href="#">8KG A 12KG ('.$decPorc12KG.'%)
        <span class="ui-li-count">'.$mixRegistro['8a12KG'].'</a>
    </li>
    <li>
        <a href="#">12KG A 20KG ('.$decPorc20KG.'%)
        <span class="ui-li-count">'.$mixRegistro['12a20KG'].'</a>
    </li>
    <li>
        <a href="#">MAS DE 20KG ('.$decPorcM20K.'%)
        <span class="ui-li-count">'.$mixRegistro['M20KG'].'</a>
    </li>
    ';
}
$strHtmlRfee  = '';
$objQuerMobi  = Parametros::LoadByIndiceCodigo('QRYRANG','RANGFEET',$objClauOrde);
$objQuerPorc  = Parametros::LoadByIndiceCodigo('QRYRANG','PORCPIES');
if ($objQuerMobi) {
    //-------------------------------------
    // Porcentajes de los Rangos de Pies
    //-------------------------------------
    $strCadeSqlx = trim($objQuerPorc->Texto1);
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    $mixRegistro = $objDbResult->FetchArray();
    $decPorcH2FT = $mixRegistro['P2FT'];
    $decPorcH5FT = $mixRegistro['P2a5FT'];
    $decPorcH8FT = $mixRegistro['P5a8FT'];
    $decPorc12FT = $mixRegistro['P8a12FT'];
    $decPorc20FT = $mixRegistro['P12a20FT'];
    $decPorcM20F = $mixRegistro['PM20FT'];
    //------------------
    // Rangos de Pies
    //------------------
    $strCadeSqlx  = trim($objQuerMobi->Texto1);
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    $mixRegistro  = $objDbResult->FetchArray();
    $strHtmlRfee .= '
    <li>
        <a href="#">HASTA 2FT ('.$decPorcH2FT.'%)
        <span class="ui-li-count">'.$mixRegistro['H2FT'].'</a>
    </li>
    <li>
        <a href="#">2FT A 5FT ('.$decPorcH5FT.'%)
        <span class="ui-li-count">'.$mixRegistro['2a5FT'].'</a>
    </li>
    <li>
        <a href="#">5FT A 8FT ('.$decPorcH8FT.'%)
        <span class="ui-li-count">'.$mixRegistro['5a8FT'].'</a>
    </li>
    <li>
        <a href="#">8FT A 12FT ('.$decPorc12FT.'%)
        <span class="ui-li-count">'.$mixRegistro['8a12FT'].'</a>
    </li>
    <li>
        <a href="#">12FT A 20FT ('.$decPorc20FT.'%)
        <span class="ui-li-count">'.$mixRegistro['12a20FT'].'</a>
    </li>
    <li>
        <a href="#">MAS DE 20FT ('.$decPorcM20F.'%)
        <span class="ui-li-count">'.$mixRegistro['M20FT'].'</a>
    </li>
    ';
}
?>
<?php include('layout/header.inc.php') ?>

<div data-role="page">

    <?php include('layout/page_header.inc.php') ?>

    <div data-role="content" style="min-height: 380px;">
        <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="a" style="font-size:14px">
            <div data-role="collapsible" data-collapsed="false" data-theme="a">
                <h3><?= $strTituDest ?></h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strHtmlKilo ?>
                </ul>
            </div>
            <div data-role="collapsible" data-collapsed="true" data-theme="a">
                <h3><?= $strTituCust ?></h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strHtmlFeet ?>
                </ul>
            </div>
        </div>
        <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="a" style="font-size:14px">
            <div data-role="collapsible" data-collapsed="true" data-theme="a">
                <h3>RANGOS KG</h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strHtmlRkil ?>
                </ul>
            </div>
            <div data-role="collapsible" data-collapsed="true" data-theme="a">
                <h3>RANGOS FT</h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strHtmlRfee ?>
                </ul>
            </div>
        </div>
    </div>

    <?php include('layout/page_footer.inc.php') ?>

</div>

<?php include('layout/footer.inc.php') ?>

