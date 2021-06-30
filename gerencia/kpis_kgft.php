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
        <a href="#">'.$mixRegistro['nombre'].'
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
        <a href="#">'.$mixRegistro['nombre'].'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}

$objQuerMobi  = Parametros::LoadByIndiceCodigo('QRYRANG','RANGKILO',$objClauOrde);
$strCadeSqlx  = trim($objQuerMobi->Texto1);
$objDbResult  = $objDatabase->Query($strCadeSqlx);
$mixRegistro  = $objDbResult->FetchArray();
$strHtmlRkil  = '';
$strHtmlRkil .= '
<li>
    <a href="#">HASTA 2KG
    <span class="ui-li-count">'.$mixRegistro['H2KG'].'</a>
</li>
<li>
    <a href="#">2KG A 5KG
    <span class="ui-li-count">'.$mixRegistro['2a5KG'].'</a>
</li>
<li>
    <a href="#">5KG A 8KG
    <span class="ui-li-count">'.$mixRegistro['5a8KG'].'</a>
</li>
<li>
    <a href="#">8KG A 12KG
    <span class="ui-li-count">'.$mixRegistro['8a12KG'].'</a>
</li>
<li>
    <a href="#">12KG A 20KG
    <span class="ui-li-count">'.$mixRegistro['12a20KG'].'</a>
</li>
<li>
    <a href="#">MAS DE 20KG
    <span class="ui-li-count">'.$mixRegistro['M20KG'].'</a>
</li>
';

$objQuerMobi  = Parametros::LoadByIndiceCodigo('QRYRANG','RANGFEET',$objClauOrde);
$strCadeSqlx  = trim($objQuerMobi->Texto1);
$objDbResult  = $objDatabase->Query($strCadeSqlx);
$mixRegistro  = $objDbResult->FetchArray();
$strHtmlRfee  = '';
$strHtmlRfee .= '
<li>
    <a href="#">HASTA 2FT
    <span class="ui-li-count">'.$mixRegistro['H2FT'].'</a>
</li>
<li>
    <a href="#">2FT A 5FT
    <span class="ui-li-count">'.$mixRegistro['2a5FT'].'</a>
</li>
<li>
    <a href="#">5FT A 8FT
    <span class="ui-li-count">'.$mixRegistro['5a8FT'].'</a>
</li>
<li>
    <a href="#">8FT A 12FT
    <span class="ui-li-count">'.$mixRegistro['8a12FT'].'</a>
</li>
<li>
    <a href="#">12FT A 20FT
    <span class="ui-li-count">'.$mixRegistro['12a20FT'].'</a>
</li>
<li>
    <a href="#">MAS DE 20FT
    <span class="ui-li-count">'.$mixRegistro['M20FT'].'</a>
</li>
';

?>
<?php include('layout/header.inc.php') ?>

<div data-role="page">

    <?php include('layout/page_header.inc.php') ?>

    <div data-role="content">
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

