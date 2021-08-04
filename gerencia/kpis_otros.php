<?php
require_once('qcubed.inc.php');
$strTituPagi = "Otros KPIs";

t('1');
$objDatabase   = Parametro::GetDatabase();
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Parametros()->Valor1);
$objQuerMobi   = Parametros::LoadByIndiceCodigo('QRYRANK','MAINDEST',$objClauOrde);
$strTituDest   = trim($objQuerMobi->Descripcion);
$strCadeSqlx   = trim($objQuerMobi->Texto1);
$objDbResult   = $objDatabase->Query($strCadeSqlx);
$strHtmlDest   = '';
t('2');
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strHtmlDest .= '
    <li>
        <a href="#">'.$mixRegistro['nombre'].'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}
t('3');
$objQuerMobi   = Parametros::LoadByIndiceCodigo('QRYRANK','MAINCUST',$objClauOrde);
$strTituCust   = trim($objQuerMobi->Descripcion);
$strCadeSqlx   = trim($objQuerMobi->Texto1);
$objDbResult   = $objDatabase->Query($strCadeSqlx);
$strHtmlCust   = '';
t('4');
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strHtmlCust .= '
    <li>
        <a href="#">'.$mixRegistro['nombre'].'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}
t('5');
$objQuerMobi   = Parametros::LoadByIndiceCodigo('QRYRANK','MAINTRAN',$objClauOrde);
$strTituTran   = trim($objQuerMobi->Descripcion);
$strCadeSqlx   = trim($objQuerMobi->Texto1);
$objDbResult   = $objDatabase->Query($strCadeSqlx);
$strHtmlTran   = '';
t('6');
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strHtmlTran .= '
    <li>
        <a href="#">'.$mixRegistro['nombre'].'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}
t('7');
?>
<?php include('layout/header.inc.php') ?>

<div data-role="page">

    <?php include('layout/page_header.inc.php') ?>

    <div data-role="content" style="min-height: 380px;">
        <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="a" style="font-size:14px">
            <div data-role="collapsible" data-collapsed="false" data-theme="a">
                <h3><?= $strTituDest ?></h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strHtmlDest ?>
                </ul>
            </div>
            <div data-role="collapsible" data-collapsed="true" data-theme="a">
                <h3><?= $strTituCust ?></h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strHtmlCust ?>
                </ul>
            </div>
            <div data-role="collapsible" data-collapsed="true" data-theme="a">
                <h3><?= $strTituTran ?></h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strHtmlTran ?>
                </ul>
            </div>
        </div>
    </div>

    <?php include('layout/page_footer.inc.php') ?>

</div>

<?php include('layout/footer.inc.php') ?>

