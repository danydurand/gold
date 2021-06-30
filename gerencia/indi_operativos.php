<?php
require_once('qcubed.inc.php');
$strTituPagi = "KPIs Operativos";

$objDatabase = Parametro::GetDatabase();
//-----------------------------------
// Manifiestos de la ultima semana
//-----------------------------------
$strManiSema = '';
$strCadeSqlx = '
select count(*) as mani_last_week
  FROM nota_entrega ne 
 where fecha >= CURRENT_DATE() - 7
   and estatus = \'RECIBID@\';
';
$objDbResult = $objDatabase->Query($strCadeSqlx);
$mixRegistro = $objDbResult->FetchArray();
$strManiSema .= '
<li>
    <a href="#">Manif. Ultimos 7 Días
    <span class="ui-li-count">'.$mixRegistro['mani_last_week'].'</a>
</li>
';
//------------------------------------------------
// Recibidas en el Almacen en la ultima semana
//------------------------------------------------
$strReciSema = '';
$strCadeSqlx = '
select count(*) as piez_last_week
  FROM pieza_checkpoints pc 
       inner join checkpoints c 
    on pc.checkpoint_id = c.id
 where pc.fecha >= CURRENT_DATE() - 7
   and c.codigo = \'RA\'
';
$objDbResult = $objDatabase->Query($strCadeSqlx);
$mixRegistro = $objDbResult->FetchArray();
$strReciSema .= '
<li>
    <a href="#">Recibidas Ultimos 7 Días
    <span class="ui-li-count">'.$mixRegistro['piez_last_week'].'</a>
</li>
';
//-------------------------------------------
// Piezas Despachadas en la ultima semana
//-------------------------------------------
$strDespSema = '';
$strCadeSqlx = '
select count(*) as desp_last_week
  FROM pieza_checkpoints pc 
       inner join checkpoints c 
    on pc.checkpoint_id = c.id
 where pc.fecha >= CURRENT_DATE() - 7
   and c.codigo = \'TR\';
';
$objDbResult = $objDatabase->Query($strCadeSqlx);
$mixRegistro = $objDbResult->FetchArray();
$strDespSema .= '
<li>
    <a href="#">Despachadas Ultimos 7 Días
    <span class="ui-li-count">'.$mixRegistro['desp_last_week'].'</a>
</li>
';
//-------------------------------------------
// Piezas Entregadas en la ultima semana
//-------------------------------------------
$strEntrSema = '';
$strCadeSqlx = '
select count(*) as entr_last_week
  FROM pieza_checkpoints pc 
       inner join checkpoints c 
    on pc.checkpoint_id = c.id
 where pc.fecha >= CURRENT_DATE() - 7
   and c.codigo = \'OK\';
';
$objDbResult = $objDatabase->Query($strCadeSqlx);
$mixRegistro = $objDbResult->FetchArray();
$strDespSema .= '
<li>
    <a href="#">Entregadas Ultimos 7 Días
    <span class="ui-li-count">'.$mixRegistro['entr_last_week'].'</a>
</li>
';
?>
<?php include('layout/header.inc.php') ?>

<div data-role="page">

    <?php include('layout/page_header.inc.php') ?>

    <div data-role="content">
        <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="a" style="font-size:14px">
            <div data-role="collapsible" data-collapsed="false" data-theme="a">
                <h3>KPIs Operativos</h3>
                <ul data-role="listview" data-inset="true">
                    <?= $strManiSema ?>
                    <?= $strReciSema ?>
                    <?= $strDespSema ?>
                    <?= $strEntrSema ?>
                </ul>
            </div>
        </div>
    </div>

    <?php include('layout/page_footer.inc.php') ?>

</div>

<?php include('layout/footer.inc.php') ?>

