<?php
require_once('qcubed.inc.php');
$strTituPagi = "KPIs Operativos";

$objDatabase   = Parametro::GetDatabase();
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Parametros()->Valor1);
$arrQuerMobi   = Parametros::LoadArrayByIndice('QRYSIST',$objClauOrde);
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
?>
<?php include('layout/header.inc.php') ?>

<div data-role="page">

    <?php include('layout/page_header.inc.php') ?>

    <div data-role="content">
        <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="a" style="font-size:14px">
            <div data-role="collapsible" data-collapsed="false" data-theme="a">
                <h3>KPIs Sistemas</h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strCadeHtml ?>
                </ul>
            </div>
        </div>
    </div>

    <?php include('layout/page_footer.inc.php') ?>

</div>

<?php include('layout/footer.inc.php') ?>

