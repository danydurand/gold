<?php
if (!isset($_SESSION['menu'])) {
    $_SESSION['menu'] = 'o';
}
?>
<?php if ($_SESSION['menu'] == 'o') { ?>
    <nav data-role="navbar" name="otro" id="otro">
        <ul>
            <li><a href="kpis_operativos.php" data-theme="d" data-transition="flip"><i class="fa fa-lg fa-ticket"></i>
                    <div class="sp"></div>KPI's OPS</a>
            </li>
            <li><a href="kpis_otros.php" data-theme="d"><i class="fa fa-lg fa-tv"></i>
                    <div class="sp"></div>OTR KPI's</a>
            </li>
            <li><a href="kpis_kgft.php" data-theme="d"><i class="fa fa-lg fa-balance-scale"></i>
                    <div class="sp"></div>KG/FT</a>
            </li>
            <li><a href="rastreo.php" data-theme="d"><i class="fa fa-lg fa-search"></i>
                    <div class="sp"></div>RASTREO</a>
            </li>
        </ul>
    </nav>
<?php } ?>
<?php if ($_SESSION['menu'] == 'i') { ?>
    <nav data-role="navbar" name="indi" id="indi">
        <ul>
            <li><a href="indi_clientes.php" data-theme="b"><i class="fa fa-lg fa-users"></i>
                    <div class="sp"></div>Clientes</a>
            </li>
            <li><a href="indi_operativos.php" data-theme="b"><i class="fa fa-lg fa-black-tie"></i>
                    <div class="sp"></div>Admin</a>
            </li>
            <li><a href="indi_cobranza.php" data-theme="b" data-ajax="false"><i class="fa fa-lg fa-bar-chart"></i>
                    <div class="sp"></div>Cobranza</a>
            </li>
            <li><a href="en_construccion.php" data-theme="b"><i class="fa fa-lg fa-line-chart"></i>
                    <div class="sp"></div>Gráficos</a>
            </li>
        </ul>
    </nav>
<?php } ?>
<?php if ($_SESSION['menu'] == 'h') { ?>
    <nav data-role="navbar" name="tool" id="tool">
        <ul>
            <li><a href="calculadora.php" data-theme="a"><i class="fa fa-lg fa-calculator"></i>
                    <div class="sp"></div>Tarifa</a>
            </li>
            <li><a href="pre_registro.php" data-theme="a"><i class="fa fa-lg fa-user-plus"></i>
                    <div class="sp"></div>Registro</a>
            </li>
            <li><a href="buscar_guias.php" data-theme="a"><i class="fa fa-lg fa-binoculars"></i>
                    <div class="sp"></div>Rastreo</a>
            </li>
            <li><a href="buscar_cliente.php" data-theme="a"><i class="fa fa-lg fa-search"></i>
                    <div class="sp"></div>Clientes</a>
            </li>
        </ul>
    </nav>
<?php } ?>
