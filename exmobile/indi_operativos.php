<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');
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
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content">
            <div data-role="collapsible-set" data-inset="true" data-theme="a">
                <div data-role="collapsible" data-collapsed="false" data-theme="a">
                    <h3>Operativos</h3>
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
            </div>
        </div>
        <?php include('layout/page_footer.inc.php') ?>
    </div>
<?php include('layout/footer.inc.php') ?> 

