<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Cobranza";

$objDatabase = Proforma::GetDatabase();
//-------------------------
// Resumen Mensual (VEB) 
//-------------------------
$strCadeRebs = '';
$strCadeSqlx = '
select anio, mes, round(monto_pendiente*100/monto_total) as porc_mont
  from v_cobranza_veb
 limit (6)
';
$dbResultSet  = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro  = $dbResultSet->FetchArray()) {
    $strCadeRebs .= '
    <li>
        <a href="lista_de_facturas.php?a='.$mixRegistro['anio'].'&m='.$mixRegistro['mes'].'&d=VEB">'.$mixRegistro['anio'].'/'.$mixRegistro['mes'].'
        <span class="ui-li-count">'.$mixRegistro['porc_mont'].'%</a>
    </li>
    ';
}
//-------------------------
// Resumen Mensual (USD) 
//-------------------------
$strCadeRedo = '';
$strCadeSqlx = '
select anio, mes, round(monto_pendiente*100/monto_total) as porc_mont
  from v_cobranza_usd
 limit (6)
';
$dbResultSet  = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro  = $dbResultSet->FetchArray()) {
    $strCadeRedo .= '
    <li>
        <a href="lista_de_facturas.php?a='.$mixRegistro['anio'].'&m='.$mixRegistro['mes'].'&d=USD">'.$mixRegistro['anio'].'/'.$mixRegistro['mes'].'
        <span class="ui-li-count">'.$mixRegistro['porc_mont'].'%</a>
    </li>
    ';
}
//-------------------------
// Top 10 Deudores (VEB) 
//-------------------------
$strCadeDebs = '';
$decTotaDeud = Proforma::TotalDeuda('VEB');
$strCadeSqlx = '
select *
  from v_top_deudores_veb
';
$dbResultSet  = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro  = $dbResultSet->FetchArray()) {
    $decPorcDeud  = round($mixRegistro['mont_fact']*100/$decTotaDeud).'%';
    $decMontDeud  = round($mixRegistro['mont_fact']);
    $strCadeDebs .= '
    <li>
        <a href="lista_de_facturas.php?c='.urlencode($mixRegistro['nomb_clie']).'&d=VEB">'.$mixRegistro['nomb_clie'].'<br>
        Facturas: '.$mixRegistro['cant_fact'].'<br>
        Monto: '.$decMontDeud.' Bs
        <span class="ui-li-count">'.$decPorcDeud.'</a>
    </li>
    ';
}

//-------------------------
// Top 10 Deudores (USD) 
//-------------------------
$strCadeDedo = '';
$decTotaDeud = Proforma::TotalDeuda('USD');
$strCadeSqlx = '
select *
  from v_top_deudores_usd
';
$dbResultSet  = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro  = $dbResultSet->FetchArray()) {
    $decPorcDeud  = round($mixRegistro['mont_fact']*100/$decTotaDeud).'%';
    $decMontDeud  = round($mixRegistro['mont_fact']);
    $strCadeDedo .= '
    <li>
        <a href="lista_de_facturas.php?c='.urlencode($mixRegistro['nomb_clie']).'&d=USD">'.$mixRegistro['nomb_clie'].'<br>
        Facturas: '.$mixRegistro['cant_fact'].'<br>
        Monto: '.$decMontDeud.' $
        <span class="ui-li-count">'.$decPorcDeud.'</a>
    </li>
    ';
}
//------------------------
// Days On Street (VEB) 
//------------------------
$strCadeVebx = '';
$strCadeSqlx = '
select *
  from v_dos_veb
';
$dbResultSet  = $objDatabase->Query($strCadeSqlx);
$mixRegistro  = $dbResultSet->FetchArray();
$intCant7dia  = $mixRegistro['cant_7dia'];
$intCant15di  = $mixRegistro['cant_15di'];
$intCant30di  = $mixRegistro['cant_30di'];
$intCant45di  = $mixRegistro['cant_45di'];
$intCantPl45  = $mixRegistro['cant_pl45'];
$intCantFact  = $mixRegistro['cant_fact'];
$strCadeVebx .= '
    <li>
        <a href="lista_de_facturas.php?v=7&d=VEB">7 Dias
        <span class="ui-li-count">'.$intCant7dia.'</span></a>
    </li>
    <li>
        <a href="lista_de_facturas.php?v=15&d=VEB">15 Dias
        <span class="ui-li-count">'.$intCant15di.'</span></a>
    </li>
    <li>
        <a href="lista_de_facturas.php?v=30&d=VEB">30 Dias
        <span class="ui-li-count">'.$intCant30di.'</span></a>
    </li>
    <li>
        <a href="lista_de_facturas.php?v=45&d=VEB">45 Dias
        <span class="ui-li-count">'.$intCant45di.'</span></a>
    </li>
    <li>
        <a href="lista_de_facturas.php?v=99&d=VEB">+45 Dias
        <span class="ui-li-count">'.$intCantPl45.'</span></a>
    </li>
    <li data-theme="h">
        <a href="#">Cantidad de Facturas
        <span class="ui-li-count">'.$intCantFact.'</span></a>
    </li>
';
//------------------------
// Days On Street (USD)
//------------------------
$strCadeUsdx = '';
$strCadeSqlx = '
select *
  from v_dos_usd
'; 
$dbResultSet  = $objDatabase->Query($strCadeSqlx);
$mixRegistro  = $dbResultSet->FetchArray();
$intCant7dia  = $mixRegistro['cant_7dia'];
$intCant15di  = $mixRegistro['cant_15di'];
$intCant30di  = $mixRegistro['cant_30di'];
$intCant45di  = $mixRegistro['cant_45di'];
$intCantPl45  = $mixRegistro['cant_pl45'];
$intCantFact  = $mixRegistro['cant_fact'];
$strCadeUsdx .= '
    <li>
        <a href="#">7 Dias
        <span class="ui-li-count">'.$intCant7dia.'</span></a>
    </li>
    <li>
        <a href="#">15 Dias
        <span class="ui-li-count">'.$intCant15di.'</span></a>
    </li>
    <li>
        <a href="#">30 Dias
        <span class="ui-li-count">'.$intCant30di.'</span></a>
    </li>
    <li>
        <a href="#">45 Dias
        <span class="ui-li-count">'.$intCant45di.'</span></a>
    </li>
    <li>
        <a href="#">+45 Dias
        <span class="ui-li-count">'.$intCantPl45.'</span></a>
    </li>
    <li data-theme="h">
        <a href="#">Cantidad de Facturas
        <span class="ui-li-count">'.$intCantFact.'</span></a>
    </li>
';
?>
    <div data-role="page" id="Res">

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content">
            <center>
                <div data-role="fieldcontain">
                    <div data-role="controlgroup" data-type="horizontal">
                        <a href="" data-theme="a" data-role="button">Resumen</a>
                        <a href="#Top" data-theme="a" data-role="button">Top 10</a>
                        <a href="#Dos" data-theme="a" data-role="button">D.O.S.</a>
                    </div>
                </div>
            </center>
            <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="a" style="font-size:14px">
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Resumen Mensual en VEB (Bs)</h3>
                    <ul data-role="listview" data-inset="true">
                        <?= $strCadeRebs; ?>
                    </ul>
                </div>
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Resumen Mensual en USD ($)</h3>
                    <ul data-role="listview" data-inset="true">
                        <?= $strCadeRedo; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php include('layout/page_footer.inc.php') ?>
    </div>
    <div data-role="page" id="Top">

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content">
            <center>
                <div data-role="fieldcontain">
                    <div data-role="controlgroup" data-type="horizontal">
                        <a href="#Res" data-theme="a" data-role="button">Resumen</a>
                        <a href="" data-theme="a" data-role="button">Top 10</a>
                        <a href="#Dos" data-theme="a" data-role="button">D.O.S.</a>
                    </div>
                </div>
            </center>
            <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="a" style="font-size:14px">
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Top 10 Deudores en VEB (Bs)</h3>
                    <ul data-role="listview" data-inset="true">
                        <?= $strCadeDebs; ?>
                    </ul>
                </div>
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Top 10 Deudores en USD ($)</h3>
                    <ul data-role="listview" data-inset="true">
                        <?= $strCadeDedo; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php include('layout/page_footer.inc.php') ?>
    </div>
    <div data-role="page" id="Dos">

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content">
            <center>
                <div data-role="fieldcontain">
                    <div data-role="controlgroup" data-type="horizontal">
                        <a href="#Res" data-theme="a" data-role="button">Resumen</a>
                        <a href="#Top" data-theme="a" data-role="button">Top 10</a>
                        <a href="" data-theme="a" data-role="button">D.O.S.</a>
                    </div>
                </div>
            </center>
            <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="a" style="font-size:14px">
                <div data-role="collapsible" data-theme="a">
                    <h3>VEB - Day On Street (D.O.S.)</h3>
                    <ul data-role="listview" data-inset="true">
                        <?= $strCadeVebx; ?>
                    </ul>
                </div>
                <div data-role="collapsible" data-theme="a">
                    <h3>USD - Day On Street (D.O.S.)</h3>
                    <ul data-role="listview" data-inset="true">
                        <?= $strCadeUsdx; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php include('layout/page_footer.inc.php') ?>
    </div>

<?php include('layout/footer.inc.php') ?> 

