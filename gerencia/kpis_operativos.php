<?php
require_once('qcubed.inc.php');
$strTituPagi = "KPIs Operativos";

$objDatabase   = Parametro::GetDatabase();
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Parametros()->Valor1);
$arrQuerMobi   = Parametros::LoadArrayByIndice('QUERYDHOY',$objClauOrde);
$strHtmlDhoy   = '';
foreach ($arrQuerMobi as $objQuerMobi) {
    $strCadeSqlx  = trim($objQuerMobi->Texto1);
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    $mixRegistro  = $objDbResult->FetchArray();
    $strHtmlDhoy .= '
    <li>
        <a href="#">'.$objQuerMobi->Descripcion.'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}

$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Parametros()->Valor1);
$arrQuerMobi   = Parametros::LoadArrayByIndice('QRYMOBILE',$objClauOrde);
$strCadeHtml   = '';
foreach ($arrQuerMobi as $objQuerMobi) {
    $strCadeSqlx  = trim($objQuerMobi->Texto1);
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    $mixRegistro  = $objDbResult->FetchArray();
    $strCadeHtml .= '
    <li>
        <a href="#">'.$objQuerMobi->Descripcion.'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}

$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Parametros()->Valor1);
$arrQuerMobi   = Parametros::LoadArrayByIndice('QRYCTRL',$objClauOrde);
$strHtmlCtrl   = '';
foreach ($arrQuerMobi as $objQuerMobi) {
    $strCadeSqlx  = trim($objQuerMobi->Texto1);
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    $mixRegistro  = $objDbResult->FetchArray();
    $strHtmlCtrl .= '
    <li>
        <a href="lista_de_piezas.php?id='.$objQuerMobi->Id.'">'.$objQuerMobi->Descripcion.'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
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
                <h3>KPIs DE HOY</h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strHtmlDhoy ?>
                </ul>
            </div>
            <div data-role="collapsible" data-collapsed="true" data-theme="a">
                <h3>KPIs ULT 7 DIAS</h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strCadeHtml ?>
                </ul>
            </div>
            <div data-role="collapsible" data-collapsed="true" data-theme="a">
                <h3>KPIs CTRL</h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strHtmlCtrl ?>
                </ul>
            </div>
        </div>
    </div>

    <?php include('layout/page_footer.inc.php') ?>

</div>

<?php include('layout/footer.inc.php') ?>

