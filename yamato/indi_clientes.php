<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Info de Clientes";

$objDatabase = Parametro::GetDatabase();

$intCantSema = Cliente::CantidadRegistradosLosUltimosDias(7);
$intSinxConf = Cliente::CantidadRegistradosSinConfirmar();
$intSinxCodi = Cliente::CantidadConfirmadosSinCodigoRoxanne();

$strCadeSqlx = 'select * ';
$strCadeSqlx .= '  from guia ';
$strCadeSqlx .= ' where CONDITION_NUMBER 1';
//------------------------
// Clientes por Vendedor
//------------------------
$strClieVend  = '';
$strCadeSqlx  = 'select v.id as codi_vend, v.nombre as nomb, count(*) as cant ';
$strCadeSqlx .= '  from cliente c inner join vendedor v ';
$strCadeSqlx .= '    on c.vendedor_id = v.id ';
$strCadeSqlx .= ' group by 1,2 ';
$strCadeSqlx .= ' order by 3 desc ';
$objDbResult = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strClieVend .= '<li>';
    $strClieVend .= '<a href="lista_de_clientes.php?o=cv&codi_vend='.$mixRegistro['codi_vend'].'">'.$mixRegistro['nomb'];
    $strClieVend .= '<span class="ui-li-count">'.$mixRegistro['cant'].'</a>';
    $strClieVend .= '</li>';
}
//------------------------
// Clientes por Sexo 
//------------------------
$strClieSexo  = '';
$strCadeSqlx  = 'select c.sexo as sexo, count(*) as cant ';
$strCadeSqlx .= '  from cliente c ';
$strCadeSqlx .= ' group by 1 ';
$strCadeSqlx .= ' order by 2 desc ';
$objDbResult  = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objDbResult->FetchArray()) {
    if ($mixRegistro['sexo'] == 'M') {
        $strNombGene = 'Hombres';
    } elseif ($mixRegistro['sexo'] == 'F') {
        $strNombGene = 'Mujeres';
    } else {
        $strNombGene = 'Sin Especificar';
    }
    $strClieSexo .= '<li>';
    $strClieSexo .= '<a href="lista_de_clientes.php?o=cx&codi_sexo='.$mixRegistro['sexo'].'">'.$strNombGene;
    $strClieSexo .= '<span class="ui-li-count">'.$mixRegistro['cant'].'</a>';
    $strClieSexo .= '</li>';
}
//------------------------
// Clientes por Sucursal
//------------------------
$strClieSucu  = '';
$strCadeSqlx  = 'select s.id as codi, s.nombre as nomb, count(*) as cant';
$strCadeSqlx .= '  from cliente c inner join sucursal s ';
$strCadeSqlx .= '    on c.sucursal_id = s.id ';
$strCadeSqlx .= ' group by 1 ';
$strCadeSqlx .= ' order by 2 desc ';
$objDbResult  = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objDbResult->FetchArray()) {
    $intCodiSucu  = $mixRegistro['codi'];
    $strClieSucu .= '<li>';
    $strClieSucu .= '<a href="lista_de_clientes.php?o=cs&codi_sucu='.$intCodiSucu.'">'.$mixRegistro['nomb'];
    $strClieSucu .= '<span class="ui-li-count">'.$mixRegistro['cant'].'</a>';
    $strClieSucu .= '</li>';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content">
            <div data-role="collapsible-set" data-inset="true" data-theme="a">
                <div class="ui-nodisc-icon" data-role="collapsible" data-theme="a">
                    <h3>Registrados</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="lista_de_clientes.php?o=ud&cant_dias=7">Últimos 7 Días
                            <span class="ui-li-count"><?= $intCantSema ?></span></a>
                        </li>
                        <li>
                            <a href="lista_de_clientes.php?o=rc">Registrados Sin Confirmar
                            <span class="ui-li-count"><?= $intSinxConf ?></span></a>
                        </li>
                        <li>
                            <a href="lista_de_clientes.php?o=sc">Confirmados Sin Código
                            <span class="ui-li-count"><?= $intSinxCodi ?></span></a>
                        </li>
                    </ul>
                </div>
                <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Distribución de Clientes</h3>
                    <ul data-role="listview" data-inset="true">
                        <div data-role="collapsible" data-collapsed="true" data-theme="a">
                            <h4>Por Vendedor</h4>
                            <ul data-role="listview" data-inset="true">
                                <?= $strClieVend ?>
                            </ul>
                        </div>
                        <div data-role="collapsible" data-theme="a">
                            <h4>Por Sexo</h4>
                            <ul data-role="listview" data-inset="true">
                                <?= $strClieSexo ?>
                            </ul>
                        </div>
                        <div data-role="collapsible" data-theme="a">
                            <h4>Por Sucursal</h4>
                            <ul data-role="listview" data-inset="true">
                                <?= $strClieSucu ?>
                            </ul>
                        </div>
                        <li>
                            <a href="#">Top Recomendadores<span class="ui-li-count">14</span></a>
                        </li>
                    </ul>
                </div>
                <div class="ui-nodisc-icon" data-role="collapsible" data-theme="a">
                    <h3>Información Clientes VIP</h3>
                    <ul data-role="listview" data-inset="true">
                        <li><a href="clientes_vip.php">Mis Clientes VIP</a></li>
                        <li><a href="#">Guías en Tránsito</a></li>
                        <li><a href="#">Guías en Almacén</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include('layout/page_footer.inc.php') ?>
    </div>
<?php include('layout/footer.inc.php') ?>