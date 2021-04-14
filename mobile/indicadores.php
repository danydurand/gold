<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');

$objDatabase = Parametro::GetDatabase();
//------------------------
// Clientes x Vendedor 
//------------------------
$strClieVend = '';
$strCadeSqlx = '
select v.nombre as nomb, count(*) as cant
  from cliente c inner join vendedor v 
    on c.vendedor_id = v.id 
 group by 1
 order by 2 desc
';
$objDbResult = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strClieVend .= '
    <li>
        <a href="#">'.$mixRegistro['nomb'].'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}
//------------------------
// Clientes x Sexo 
//------------------------
$strClieSexo = '';
$strCadeSqlx = '
select c.sexo as sexo, count(*) as cant
  from cliente c
 group by 1
 order by 2 desc
';
$objDbResult = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objDbResult->FetchArray()) {
    if ($mixRegistro['sexo'] == 'M') {
        $strNombGene = 'HOMBRES';
    } else {
        $strNombGene = 'MUJERES';
    }
    $strClieSexo .= '
    <li>
        <a href="#">'.$strNombGene.'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}
//------------------------
// Clientes x Sucursal 
//------------------------
$strClieSucu = '';
$strCadeSqlx = '
select s.nombre as nomb, count(*) as cant
  from cliente c inner join sucursal s
    on c.sucursal_id = s.id
 group by 1
 order by 2 desc
';
$objDbResult = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strClieSucu .= '
    <li>
        <a href="#">'.$mixRegistro['nomb'].'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}
//---------------------------
// Clientes x Rango de Edad 
//---------------------------
// $strClieEdad = '';
// $strCadeSqlx = '
// select sum()
//   from cliente c inner join sucursal s
//     on c.sucursal_id = s.id
//  group by 1
//  order by 2 desc
// ';
// $objDbResult = $objDatabase->Query($strCadeSqlx);
// while ($mixRegistro = $objDbResult->FetchArray()) {
//     $strClieSucu .= '
//     <li>
//         <a href="#">'.$mixRegistro['nomb'].'</a>
//         <span class="ui-li-count">'.$mixRegistro['cant'].'
//     </li>
//     ';
// }
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content">
            <div data-role="collapsible-set" data-inset="true" data-theme="a">
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Clientes</h3>
                    <ul data-role="listview" data-inset="true">
                        <div data-role="collapsible" data-collapsed="true" data-theme="a">
                            <h4>Clientes x Vendedor</h4>
                            <ul data-role="listview" data-inset="true">
                                <?= $strClieVend ?>
                            </ul>
                        </div>
                        <div data-role="collapsible" data-collapsed="true" data-theme="a">
                            <h4>Clientes x Sexo</h4>
                            <ul data-role="listview" data-inset="true">
                                <?= $strClieSexo ?>
                            </ul>
                        </div>
                        <div data-role="collapsible" data-collapsed="true" data-theme="a">
                            <h4>Clientes x Sucursal</h4>
                            <ul data-role="listview" data-inset="true">
                                <?= $strClieSucu ?>
                            </ul>
                        </div>
                        <li>
                            <a href="#">Mejores Recomendadores<span class="ui-li-count">14</span></a>
                        </li>
                    </ul>
                </div>
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Operativas</h3>
                    <ul data-role="listview" data-inset="true">
                        <li> 
                            <a href="#">Pre-Alertas Registradas 
                            <span class="ui-li-count">15</span></a>
                        </li>
                        <li> 
                            <a href="#">Recibidas en Miami 
                            <span class="ui-li-count">125</span></a>
                        </li>
                        <li> 
                            <a href="#">Procesadas en Miami 
                            <span class="ui-li-count">97</span></a>
                        </li>
                        <li> 
                            <a href="">Guias en Transito 
                            <span class="ui-li-count">150</span></a>
                        </li>
                        <li> 
                            <a href="#">Notificaciones Enviadas 
                            <span class="ui-li-count">56</span></a>
                        </li>
                    </ul>
                </div>
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Control de Guías</h3>
                    <ul data-role="listview" data-inset="true">
                        <li> <a href="buscar_guia.php">Buscar Guía</a> </li>
                        <li> 
                            <a href="#">Pendientes de Pago
                            <span class="ui-li-count"><? //echo $intGuiaComp ?></span></a>
                        </li>
                        <li> 
                            <a href="#">Recibidas sin Entregar
                            <span class="ui-li-count"><? //echo $intGuiaReci ?></span></a>
                        </li>
                    </ul>
                </div>
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Temas de Interés</h3>
                    <ul data-role="listview" data-inset="true">
                        <li> 
                            <a href="cupones_utilizados.php?TipoRepo=U7D">Cupones Utilizados 
                            <span class="ui-li-count">62</span></a>
                        </li>
                        <li> 
                            <a href="#">Efectividad de Medios Pub.</a>
                        </li>
                        <li> <a href="#">Descuentos Otorgados</a></li>
                        <li> <a href="#">Total Cobrado</a></li>
                        <li> <a href="#">Costos</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include('layout/page_footer.inc.php') ?>
    </div>
<?php include('layout/footer.inc.php') ?> 

