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
select v.id as codi_vend, v.nombre as nomb, count(*) as cant
  from cliente c inner join vendedor v 
    on c.vendedor_id = v.id 
 group by 1,2
 order by 3 desc
';
$objDbResult = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strClieVend .= '
    <li>
        <a href="lista_de_clientes.php?o=cv&codi_vend='.$mixRegistro['codi_vend'].'">'.$mixRegistro['nomb'].'
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
        <a href="lista_de_clientes.php?o=cx&codi_sexo='.$mixRegistro['sexo'].'">'.$strNombGene.'
        <span class="ui-li-count">'.$mixRegistro['cant'].'</a>
    </li>
    ';
}
//------------------------
// Clientes x Sucursal 
//------------------------
$strClieSucu = '';
$strCadeSqlx = '
select s.id as codi, s.nombre as nomb, count(*) as cant
  from cliente c inner join sucursal s
    on c.sucursal_id = s.id
 group by 1
 order by 2 desc
';
$objDbResult = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objDbResult->FetchArray()) {
    $intCodiSucu  = $mixRegistro['codi'];
    $strClieSucu .= '
    <li>
        <a href="lista_de_clientes.php?o=cs&codi_sucu='.$intCodiSucu.'">'.$mixRegistro['nomb'].'
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
            </div>
        </div>
        <?php include('layout/page_footer.inc.php') ?>
    </div>
<?php include('layout/footer.inc.php') ?> 

