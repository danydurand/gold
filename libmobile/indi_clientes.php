<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Info de Clientes";

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
                            <span class="ui-li-count"></span></a>
                        </li>
                        <li>
                            <a href="lista_de_clientes.php?o=rc">Registrados Sin Confirmar
                            <span class="ui-li-count"></span></a>
                        </li>
                        <li>
                            <a href="lista_de_clientes.php?o=sc">Confirmados Sin Código
                            <span class="ui-li-count"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Accesos</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="#">Extranet U7D<span class="ui-li-count"></span></a>
                        </li>
                        <li>
                            <a href="#">ExMobile U7D<span class="ui-li-count"></span></a>
                        </li>
                        <li>
                            <a href="#">Visita WebSite U7D<span class="ui-li-count"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include('layout/page_footer.inc.php') ?>
    </div>
<?php include('layout/footer.inc.php') ?>